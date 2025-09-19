CREATE DATABASE travel_website;
USE travel_website;

-- Countries table for the left sidebar options
CREATE TABLE countries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    image_url VARCHAR(255)
);

-- Enquiries table for form submissions
CREATE TABLE enquiries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT,
    country_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample data
INSERT INTO countries (name, description, image_url) VALUES
('France', 'Immerse yourself in France, a country that captivates with its blend of art, history, and stunning landscapes. Wander through the world-class museums of Paris, home to the Mona Lisa, or explore the breathtaking châteaux of the Loire Valley. Indulge in exquisite cuisine, from delicate pastries to world-renowned wines, and discover a new adventure every day, from the glamorous French Riviera beaches to the snowy peaks of the Alps.', 'france.jpg'),
('Japan', 'Journey to Japan, where futuristic cities like Tokyo with their neon-lit skyscrapers stand in harmony with the serene beauty of ancient temples and tranquil Zen gardens. Experience the peaceful magic of the cherry blossoms in spring or the vibrant colors of autumn foliage, and witness the iconic, snow-capped Mount Fuji. Indulge in the world-renowned cuisine, from traditional sushi and ramen to intricate street food, and be welcomed by the renowned hospitality of its people.', 'japan.jpg'),
('Italy', 'Discover Italy, where thousands of years of history and art converge with vibrant modern life. Explore the timeless ruins of Rome, including the Colosseum and Pantheon, or immerse yourself in the Renaissance masterpieces of Florence. Savor the simplicity and rich flavors of authentic Italian cuisine, from classic pasta dishes and Neapolitan pizza to creamy gelato, and be enchanted by the romance of Venices canals and the breathtaking beauty of the Amalfi Coast', 'italy.jpg'),
('Thailand', 'Journey to Thailand, a country of vibrant contrasts where ornate temples and ancient ruins coexist with bustling, modern cities. Discover the tranquil beauty of its famous islands, with their pristine white-sand beaches and crystal-clear turquoise waters. Immerse yourself in a culinary paradise, from the fiery street food of Bangkok to the fresh seafood of the coast, and find a sense of peace by exploring the lush northern jungles and mountainous landscapes.', 'thailand.jpg');
