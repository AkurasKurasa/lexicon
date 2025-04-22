-- categories table query 
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(255) NOT NULL
);

-- roles table query
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE
);
-- users table query
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    gender ENUM('Male', 'Female', 'Other', 'Prefer not to say') NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role) REFERENCES roles(name)
);

-- products table query
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    description TEXT,
    category INT,
    author INT,
    average_rating INT,
    reviewers INT,
    is_archived BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (category) REFERENCES categories(id)
        ON DELETE SET NULL,

    FOREIGN KEY (author) REFERENCES users(id)
        ON DELETE SET NULL
);

-- ingredients table query
CREATE TABLE ingredients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT
);

-- product_ingredients
CREATE TABLE product_ingredients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    ingredient_id INT,
    quantity VARCHAR(100),

    FOREIGN KEY (product_id) REFERENCES products(id)
        ON DELETE CASCADE,

    FOREIGN KEY (ingredient_id) REFERENCES ingredients(id)
        ON DELETE CASCADE
);

-- product_instructions 
CREATE TABLE product_instructions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    step INT,
    description TEXT,

    FOREIGN KEY (product_id) REFERENCES products(id)
        ON DELETE CASCADE
);

-- product_review_comments table query
CREATE TABLE product_review_comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    comment TEXT NOT NULL,
    rating INT NOT NULL CHECK (rating >= 1 AND rating <= 5),
    product_id INT NOT NULL,
    authored_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
    FOREIGN KEY (authored_by) REFERENCES users(id) ON DELETE SET NULL
);

-- sentiments table query
CREATE TABLE sentiments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    comment_id INT NOT NULL,
    positive INT DEFAULT 0,
    negative INT DEFAULT 0,
    FOREIGN KEY (comment_id) REFERENCES product_review_comments(id) ON DELETE CASCADE
);


-- activity_logs table query
CREATE TABLE activity_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    activity TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    activity_by INT NOT NULL,
    FOREIGN KEY (activity_by) REFERENCES users(id)
);


