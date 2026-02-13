CREATE DATABASE IF NOT EXISTS ababeel_hotel CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE ababeel_hotel;

CREATE TABLE IF NOT EXISTS rooms (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  description TEXT NOT NULL,
  price_per_night DECIMAL(10,2) NOT NULL,
  capacity INT NOT NULL,
  image_url VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS bookings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  room_id INT NOT NULL,
  full_name VARCHAR(120) NOT NULL,
  email VARCHAR(150) NOT NULL,
  phone VARCHAR(40) NOT NULL,
  check_in DATE NOT NULL,
  check_out DATE NOT NULL,
  guests INT NOT NULL,
  total_amount DECIMAL(10,2) NOT NULL,
  payment_status ENUM('unpaid', 'paid', 'failed') DEFAULT 'unpaid',
  booking_status ENUM('pending', 'confirmed', 'cancelled') DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_bookings_room FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS admin_users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

INSERT INTO rooms (name, description, price_per_night, capacity, image_url) VALUES
('Standard Room', 'Comfortable standard room with free Wi-Fi and workspace.', 79.99, 2, 'https://images.unsplash.com/photo-1501117716987-c8e1ecb210d9'),
('Double Room', 'Spacious double room ideal for couples or business travellers.', 109.99, 2, 'https://images.unsplash.com/photo-1590490360182-c33d57733427'),
('Suite Room', 'Premium suite with separate seating area and upgraded amenities.', 159.99, 4, 'https://images.unsplash.com/photo-1618773928121-c32242e63f39');

INSERT INTO admin_users (username, password_hash) VALUES
('admin', '$2y$12$1dPcXPfq3maD06mCiD5BzO42.ETsLIX06W/e8T8jzmNodaBuii7Mm');
