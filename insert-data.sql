CREATE TABLE paintings (
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image_url VARCHAR(255) NOT NULL
);