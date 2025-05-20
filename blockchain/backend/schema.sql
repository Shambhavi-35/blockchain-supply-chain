-- Create the database
CREATE DATABASE blockchain_supply;
USE blockchain_supply;

-- Table: users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user'
);

-- Table: orders
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    user_id INT NOT NULL,
    status VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Table: blockchain (tracks each status update like a blockchain block)
CREATE TABLE blockchain (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    status VARCHAR(100) NOT NULL,
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
    previous_hash TEXT,
    current_hash TEXT,
    FOREIGN KEY (product_id) REFERENCES orders(id) ON DELETE CASCADE
);

-- Sample admin user (you can log in as this)
INSERT INTO users (username, password, role) VALUES (
    'admin',
    -- Password: admin123 (hashed)
    '$2y$10$7tE0fylG9cGBf7fVKz9zQu4U6GO9mWIfAsoSFBKjW3z2DwDMahScS',
    'admin'
);

-- Optional: Sample normal user
INSERT INTO users (username, password, role) VALUES (
    'user1',
    -- Password: user123 (hashed)
    '$2y$10$Oo4Y2FMei4SRaZ3Z92kOVupbHOz0PIGIMvrcbQ4Pjv4nsEDcRAqAi',
    'user'
);

