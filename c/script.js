let cart = {};

// Handle 'Add to Cart' button click
document.querySelectorAll('.add-to-cart').forEach((button) => {
    button.addEventListener('click', async () => {
        const id = button.dataset.id;
        const name = button.dataset.name;
        const quantity = parseInt(button.previousElementSibling.value, 10);

        const response = await fetch('add_to_cart.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                'id': id,
                'quantity': quantity
            }),
        });

        if (!response.ok) {
            alert('An error occurred');
            console.error('Error:', response.status);
        } else {
            const data = await response.text();
            alert(data);

            // Add product to cart object
            if (cart[name]) {
                cart[name] += quantity;
            } else {
                cart[name] = quantity;
            }

            // Update cart info div
            document.querySelector('#cart-info').innerText = Object.entries(cart).map(([name, quantity]) => `${name}: ${quantity}`).join('\n');
        }
    });
});

// Handle 'Checkout' button click
document.querySelector('#checkout').addEventListener('click', async () => {
    const password = prompt('Enter your password to checkout');

    if (password === 'pw') { // Replace 'yourPassword' with the actual password
        // AJAX request to checkout
        const response = await fetch('checkout.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(cart),
        });

        if (!response.ok) {
            alert('An error occurred during checkout');
            console.error('Error:', response.status);
        } else {
            // Clear the `#cart` element
            cart = {};
            document.querySelector('#cart-info').innerText = '';

            // Display the saved information
            const savedInfo = await response.text();
            document.querySelector('#saved-info').innerText = savedInfo;
        }
    }
});