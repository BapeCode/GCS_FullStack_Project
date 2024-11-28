CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO articles (title, content) VALUES
('Welcome to Cybernova', 'Explore the world of Cybernova.'),
('Latest Tech News', 'All about the latest technology advancements.'),
('Cybersecurity Tips', 'Learn how to protect yourself online.');
