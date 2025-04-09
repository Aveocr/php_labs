-- Создание базы данных
CREATE DATABASE IF NOT EXISTS shop_db;
USE shop_db;

-- Таблица категорий товаров
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    image VARCHAR(255)
);

-- Таблица товаров
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255),
    stock INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

-- Таблица пользователей
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    address TEXT,
    phone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Таблица заказов
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    total_amount DECIMAL(10, 2) NOT NULL,
    status ENUM('новый', 'обработан', 'доставляется', 'выполнен', 'отменен') DEFAULT 'новый',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

-- Таблица элементов заказа
CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- Заполнение таблицы категорий
INSERT INTO categories (name, description) VALUES 
('Электроника', 'Компьютеры, телефоны и другие электронные устройства'),
('Одежда', 'Мужская и женская одежда различных стилей'),
('Книги', 'Художественная и профессиональная литература');

-- Заполнение таблицы товаров (10 товаров в 3 категориях)
INSERT INTO products (category_id, name, description, price, stock) VALUES 
-- Электроника
(1, 'Ноутбук ASUS', 'Мощный ноутбук для работы и игр', 75000.00, 15),
(1, 'Смартфон Samsung', 'Современный смартфон с отличной камерой', 45000.00, 25),
(1, 'Наушники Sony', 'Беспроводные наушники с шумоподавлением', 12000.00, 30),
(1, 'Планшет Apple', 'Планшет для работы и развлечений', 58000.00, 10),
-- Одежда
(2, 'Джинсы Levi\'s', 'Классические джинсы прямого кроя', 5500.00, 40),
(2, 'Рубашка Calvin Klein', 'Стильная мужская рубашка', 7200.00, 35),
(2, 'Платье Zara', 'Элегантное женское платье', 4800.00, 20),
-- Книги
(3, 'Мастер и Маргарита', 'Роман Михаила Булгакова', 950.00, 50),
(3, 'JavaScript для начинающих', 'Учебник по JavaScript', 1500.00, 30),
(3, 'PHP и MySQL: от новичка к профессионалу', 'Подробное руководство по PHP и MySQL', 1800.00, 25);