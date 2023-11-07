CREATE TABLE `item` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `thumbnail` varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- CREATE TABLE `cart` (
--   `id` int(11) PRIMARY KEY AUTO_INCREMENT,
--   `item_id` int(11) NOT NULL,
--   `quantity` int(11) NOT NULL,
--   FOREIGN KEY (`item_id`) REFERENCES `items`(`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8;