CREATE DATABASE IF NOT EXISTS ababeel_hotel CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE ababeel_hotel;

CREATE TABLE IF NOT EXISTS rooms (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(120) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  description TEXT NOT NULL,
  image_url VARCHAR(500) NOT NULL,
  bed_type VARCHAR(80) NOT NULL,
  size VARCHAR(80) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS bookings (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  room_id INT UNSIGNED NOT NULL,
  customer_name VARCHAR(120) NOT NULL,
  email VARCHAR(190) NOT NULL,
  check_in DATE NOT NULL,
  check_out DATE NOT NULL,
  total_price DECIMAL(10,2) NOT NULL,
  payment_status ENUM('pending','paid','failed') DEFAULT 'pending',
  stripe_session_id VARCHAR(255) DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_bookings_room FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS admin_users (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(80) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO rooms (title, price, description, image_url, bed_type, size) VALUES
('Budget Double Room', 89.00, 'Stylish and affordable room with elegant decor and modern amenities.', 'https://images.unsplash.com/photo-1590490360182-c33d57733427?q=80&w=800', '1 Double Bed', '22 m²'),
('Small Twin Room', 99.00, 'Twin-bed comfort perfect for friends or colleagues on short stays.', 'https://images.unsplash.com/photo-1618773928121-c32242e63f39?q=80&w=800', '2 Single Beds', '24 m²'),
('Economy Room', 79.00, 'Quiet and functional room tailored for value-driven travellers.', 'https://images.unsplash.com/photo-1566665797739-1674de7a421a?q=80&w=800', '1 Queen Bed', '20 m²');

-- Default admin user: admin / admin123 (change immediately in production)
INSERT INTO admin_users (username, password_hash)
VALUES ('admin', '$2y$12$swn3opdcfGGKNDV5z.Caved6y8TKUhpnZGW5GTOQ0dpRzYQhz2GQa');
