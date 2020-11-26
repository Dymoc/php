CREATE TABLE `categories` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `goods` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(22,2) NOT NULL,
  `qty` int UNSIGNED NOT NULL DEFAULT 0,
  `sale` int UNSIGNED NOT NULL DEFAULT 0,
  `category_id` int UNSIGNED NOT NULL,
  `main_img` varchar(255) NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- CREATE TABLE `goods_details` (
--   `id` int UNSIGNED NOT NULL,
--   `param1` int NOT NULL,  
--   `param_json` json not null  default '{}';
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `orders` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `user_comment` text,
  `amount` decimal(22,2) NOT NULL,
  `status` enum('new','payed', 'rejected', 'deleted') NOT NULL DEFAULT 'new',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `order_items` (
  `order_id` int UNSIGNED NOT NULL,
  `good_id` int UNSIGNED NOT NULL,
  `price` decimal(22,2) NOT NULL,
  `qty` int UNSIGNED NOT NULL,
  `sale` int UNSIGNED NOT NULL DEFAULT 0,
  `amount` decimal(22,2) NOT NULL,
  PRIMARY KEY (order_id, good_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;