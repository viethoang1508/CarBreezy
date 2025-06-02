carbreezy.sql
create database car_breezy;
use car_breezy;
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    gender ENUM('Men', 'Women', 'Other') DEFAULT 'Other', 
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(100),
    address TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE brands (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    country VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO brands (name, country, created_at) VALUES
('Toyota', 'Japan', NOW()),
('Honda', 'Japan', NOW()),
('Ford', 'USA', NOW()),
('Mercedes-Benz', 'Germany', NOW());
CREATE TABLE products (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    brand_id BIGINT NOT NULL,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(15,2) NOT NULL,
    type ENUM('Hatchback', 'Sedan', 'SUV', 'Convertible') NOT NULL DEFAULT 'Sedan',
    description TEXT,
    image VARCHAR(255),
    status ENUM('New', 'Used') NOT NULL DEFAULT 'New',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (brand_id) REFERENCES brands(id) ON DELETE CASCADE
);
INSERT INTO products (brand_id, name, price, type, description, image, status, created_at) VALUES
(1, 'Toyota Camry', 1220000000.00, 'Sedan', 'Dòng sedan cao cấp, rộng rãi và trang bị nhiều ...', 'sedan3.png', 'New', NOW()),
(1, 'Toyota Vios', 458000000.00, 'Sedan', 'Mẫu sedan cỡ nhỏ, phù hợp cho đô thị với khả n...', 'sedan1.png', 'Used', NOW()),
(1, 'Toyota Corolla Altis', 725000000.00, 'Sedan', 'Sedan phân khúc C với thiết kế hiện đại, vận h...', 'sedan2.png', 'New', NOW()),
(1, 'Toyota Yaris Cross', 650000000.00, 'SUV', 'Mẫu SUV cỡ nhỏ linh hoạt, tiết kiệm nhiên liệu.', 'suv1.png', 'New', NOW()),
(1, 'Toyota Corolla Cross', 820000000.00, 'SUV', 'SUV phân khúc C với công nghệ hybrid tiết kiệm...', 'suv2.png', 'New', NOW()),
(4, 'Mercedes-AMG SL 63', 6959000000.00, 'Convertible', 'Mercedes-AMG SL 63 là mẫu xe thể thao mui trần...', 'convertible1.jpg', 'New', NOW()),
(2, 'Honda CR-V', 1029000000.00, 'SUV', 'Honda CR-V là mẫu SUV phổ biến với thiết kế hợ...', 'suv3.jpg', 'New', NOW()),
(3, 'Ford Mustang', 1011000000.00, 'Convertible', 'Ford Mustang 2025 – mẫu xe thể thao mạnh mẽ...', 'convertible2.jpg', 'New', NOW()),
(3, 'Ford Explorer', 2099000000.00, 'SUV', 'Ford Explorer 2025 - SUV mạnh mẽ, hiện đại và ...', 'suv4.jpg', 'New', NOW()),
(4, 'Mercedes A Class', 2429000000.00, 'SUV', 'Mercedes-Benz A Class - Hatchback & Sedan san...', 'sedan4.jpg', 'New', NOW()),
(4, 'Mercedes-AMG A35', 2259000000.00, 'Hatchback', 'Mercedes-AMG A35 4MATIC - Hiệu suất & Đẳng ...', 'hatchback2.jpg', 'New', NOW()),
(2, 'Honda Civic', 499000000.00, 'Hatchback', 'Honda Civic - Biểu tượng thể thao và công nghệ', 'hatchback4.jpg', 'New', NOW()),
(3, 'Ford Focus', 439000000.00, 'Hatchback', 'Ford Focus Sport 2019 là một mẫu hatchback/c...', 'hatchback3.jpg', 'Used', NOW()),
(1, 'Toyota Wigo', 405000000, 'Hatchback', 'Toyota Wigo - Mẫu xe đô thị cỡ nhỏ, tiết kiệm nhiên liệu, phù hợp di chuyển trong thành phố.', 'hatchback1.png', 'New', NOW());
CREATE TABLE product_detail (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    product_id BIGINT NOT NULL,
    engine VARCHAR(100), -- Động cơ
    horsepower INT, -- Mã lực
    fuel_type ENUM('Petrol', 'Electricity', 'Hybrid') DEFAULT 'Petrol',
    dimensions VARCHAR(100), -- Kích thước (dài x rộng x cao)
    weight DECIMAL(10,2), -- Trọng lượng (kg)
    interior TEXT, -- Mô tả nội thất
    exterior TEXT, -- Mô tả ngoại thất
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);
INSERT INTO product_detail (product_id, engine, horsepower, fuel_type, dimensions, weight, interior, exterior, created_at) VALUES
(1, '2.5L 4-cylinder Hybrid', 208, 'Hybrid', '4885 x 1840 x 1445 mm', 1610.00, 'Ghế da cao cấp, màn hình cảm ứng 9 inch', 'Đèn LED tự động, lưới tản nhiệt mạ chrome', NOW()),
(2, '1.5L 4-cylinder', 107, 'Petrol', '4420 x 1730 x 1475 mm', 1085.00, 'Ghế da tổng hợp, màn hình cảm ứng 6.75 inch', 'Đèn pha LED, lưới tản nhiệt thể thao', NOW()),
(3, '1.8L 4-cylinder Hybrid', 138, 'Hybrid', '4630 x 1780 x 1435 mm', 1385.00, 'Ghế da cao cấp, màn hình cảm ứng 8 inch', 'Đèn LED projector, mâm hợp kim', NOW()),
(4, '1.5L 4-cylinder', 106, 'Petrol', '4140 x 1730 x 1475 mm', 1185.00, 'Ghế vải cao cấp, màn hình cảm ứng 7 inch', 'Đèn LED projector, lưới tản nhiệt thể thao', NOW()),
(5, '1.5L 4-cylinder Turbo', 120, 'Petrol', '4370 x 1760 x 1620 mm', 1255.00, 'Ghế da, màn hình cảm ứng 8 inch, điều hòa tự động', 'Đèn LED tự động, lưới tản nhiệt mạ chrome', NOW()),
(6, '1.8L 4-cylinder Hybrid', 140, 'Hybrid', '4555 x 1825 x 1620 mm', 1420.00, 'Ghế da tổng hợp, màn hình cảm ứng 9 inch', 'Đèn pha LED projector, cảm biến va chạm trước', NOW()),
(7, '4.0L V8 Biturbo', 585, 'Petrol', '4710 x 1910 x 1320 mm', 1770.00, 'Ghế da cao cấp AMG, màn hình kỹ thuật số', 'Đèn LED thông minh, ống xả thể thao AMG', NOW()),
(8, '2.0L 4-cylinder Turbo', 190, 'Petrol', '4625 x 1855 x 1680 mm', 1525.00, 'Ghế da, màn hình cảm ứng 10 inch, điều hòa tự động', 'Đèn LED tự động, cửa sổ trời toàn cảnh', NOW()),
(9, '5.0L V8', 450, 'Petrol', '4805 x 1915 x 1395 mm', 1650.00, 'Ghế da, bộ bodykit thể thao', 'Đèn LED, bộ bodykit thể thao', NOW()),
(10, '3.0L V6 Ecoboost', 400, 'Petrol', '5045 x 2000 x 1375 mm', 2065.00, 'Ghế da, màn hình giải trí 12 inch, cửa sổ trời', 'Đèn LED Matrix, cản trước/sau thể thao', NOW()),
(11, '2.0L 4-cylinder Turbo', 224, 'Petrol', '4635 x 1795 x 1475 mm', 1445.00, 'Ghế da cao cấp, màn hình cảm ứng 9 inch', 'Đèn LED projector, gương chiếu hậu chỉnh điện', NOW()),
(12, '1.5L 4-cylinder Turbo', 176, 'Petrol', '4670 x 1800 x 1435 mm', 1385.00, 'Ghế thể thao AMG, màn hình trung tâm 8 inch', 'Đèn LED tự động, lưới tản nhiệt thể thao', NOW()),
(13, '1.5L 4-cylinder', 120, 'Petrol', '4370 x 1820 x 1450 mm', 1275.00, 'Ghế vải, màn hình cảm ứng 7 inch', 'Đèn pha LED, gương gập điện', NOW()),
(14, '1.2L 3-cylinder', 87, 'Petrol', '3760 x 1665 x 1515 mm', 920.00, 'Ghế nỉ cao cấp, màn hình cảm ứng 7 inch, điều hòa chỉnh tay', 'Đèn pha Halogen, gương chiếu hậu chỉnh điện', NOW());
CREATE TABLE product_images (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    product_id BIGINT NOT NULL,
    image VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);
INSERT INTO product_images (product_id, image, created_at) VALUES
(1, 'camry_image1.png', NOW()),
(1, 'camry_image2.png', NOW()),
(1, 'camry_image3.png', NOW()),
(2, 'vios_image1.png', NOW()),
(2, 'vios_image2.png', NOW()),
(2, 'vios_image3.png', NOW()),
(3, 'altis_image1.png', NOW()),
(3, 'altis_image2.jpg', NOW()),
(3, 'altis_image3.jpg', NOW());

CREATE TABLE product_offer (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    product_id BIGINT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    discount DECIMAL(5,2) NOT NULL, -- Phần trăm giảm giá (0-100)
    valid_until DATE NOT NULL, -- Thời hạn ưu đãi
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);
INSERT INTO product_offer (product_id, title, description, discount, valid_until) VALUES
(1, 'Special Offer for Toyota Camry', 'Get 5% off on all Toyota Camry models this season.', 5.00, '2025-04-30'),
(2, 'Toyota Vios Exclusive Deal', 'Free insurance package when purchasing Toyota Vios.', 3.50, '2025-04-30'),
(3, 'Toyota Corolla Altis Promotion', '10% discount + special gift package for pre-orders.', 10.00, '2025-04-20'),
(4, 'Toyota Yaris Cross Limited Offer', 'Save 4% and enjoy low-interest financing.', 4.00, '2025-04-25');

select * from users


























    
    










