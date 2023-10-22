let cart = [];

// Handle 'Add to Cart' button click
document.querySelectorAll('.add-to-cart').forEach((button) => {
    button.addEventListener('click', async () => {
        const id = button.dataset.id;
        const quantity = button.previousElementSibling.value;

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

            // Add product to cart array
            cart.push({id, quantity});

            // Update cart info div
            document.querySelector('#cart-info').innerText = cart.map(item => `Product ID: ${item.id}, Quantity: ${item.quantity}`).join('\n');
        }
    });
});

// Handle 'Checkout' button click
document.querySelector('#checkout').addEventListener('click', () => {
    const password = prompt('Enter your password to checkout');

    if (password === 'yourPassword') { // Replace 'yourPassword' with the actual password
        // AJAX request to checkout
        // Clear the `#cart` element

        // After successful checkout, clear the cart array and the cart info div
        cart = [];
        document.querySelector('#cart-info').innerText = '';
    }
});