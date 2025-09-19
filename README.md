# Travel Website

A complete PHP travel website with enquiry management system and admin panel for managing travel destinations and customer enquiries.

## 🌟 Features

- 🌍 **Country Destinations**: Browse different travel destinations with detailed information
- 📧 **Enquiry System**: Customers can submit travel enquiries with contact details
- 👨‍💼 **Admin Panel**: View and manage customer enquiries efficiently
- 📱 **Responsive Design**: Works seamlessly on desktop, tablet, and mobile devices
- 🎨 **Bootstrap 5**: Modern and clean user interface
- 🔒 **Secure Forms**: Protected form submissions with validation

## 🛠️ Tech Stack

- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap 5
- **Backend**: PHP 8.0+
- **Database**: MySQL 8.0 / MariaDB
- **Server**: Apache (XAMPP for local development)
- **Version Control**: Git & GitHub

## 📋 Prerequisites

Before running this project, make sure you have:

- **Web Server**: XAMPP, WAMP, or similar local server environment
- **PHP**: Version 8.0 or higher
- **MySQL**: Version 8.0 or higher
- **Web Browser**: Chrome, Firefox, Safari, or Edge

## 🚀 Installation

### Step 1: Download the Project
git clone https://github.com/thrupthi-r/travel-website.git
cd travel-website


### Step 2: Setup Local Server
1. **Download and install XAMPP**: https://www.apachefriends.org/download.html
2. **Copy project folder** to `C:\xampp\htdocs\travel-website\`
3. **Start Apache and MySQL** services in XAMPP Control Panel

### Step 3: Create Database
1. **Open phpMyAdmin**: http://localhost/phpmyadmin/
2. **Create new database** named `travel_website`
3. **Import database** using the SQL file in `database/` folder

### Step 4: Configure Database Connection
Update the database credentials in `config/database.php`:

$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "travel_website"; // Your database name


### Step 5: Access the Website
- **Homepage**: http://localhost/travel-website/
- **Admin Panel**: http://localhost/travel-website/admin/

## 📁 Project Structure

travel-website/
├── index.php # Main homepage with country selection
├── about.php # About page
├── destinations.php # Destinations listing page
├── contact.php # Contact page
├── config/
│ └── database.php # Database configuration
├── assets/
│ ├── css/ # Stylesheets
│ ├── js/ # JavaScript files
│ └── images/ # Image assets
│ └── destinations/ # Country destination images
├── process/
│ ├── enquiry.php # Form processing logic
│ └── get_country.php # API endpoints
├── admin/
│ └── index.php # Admin dashboard
└── database/
└── travel_website.sql # Database schema and sample data 


## 🎯 Key Features Explained

### Customer Features
- **Browse Destinations**: View available travel destinations
- **Submit Enquiries**: Fill out enquiry forms with personal details
- **Responsive Navigation**: Easy navigation across all pages
- **Contact Information**: Get in touch with travel agency

### Admin Features
- **Enquiry Management**: View all customer enquiries in organized table
- **Customer Details**: Access complete customer information
- **Date Tracking**: See when each enquiry was submitted
- **Easy Interface**: Simple and intuitive admin dashboard

## 📸 Screenshots

### Homepage
The main homepage displays available destinations with an enquiry form.

### Admin Panel
The admin dashboard shows all customer enquiries with filtering options.

### Destinations Page
Browse through various travel destinations with detailed information.

*(Add actual screenshots by placing images in assets/images/screenshots/ folder)*

## 🔧 Configuration

### Database Configuration
The website uses MySQL database with two main tables:

1. **countries**: Stores destination information
   - id, name, description, image_url, created_at

2. **enquiries**: Stores customer enquiries
   - id, name, email, phone, country_id, message, enquiry_date

### Adding New Destinations
To add new destinations:
1. Add destination images to `assets/images/destinations/`
2. Insert new records in the `countries` table via phpMyAdmin
3. Update the destinations page if needed

## 🌐 Deployment

### Free Hosting Options
The website can be deployed on various free PHP hosting providers:

- **InfinityFree**: Free PHP hosting with MySQL support
- **000WebHost**: Popular free hosting with easy setup
- **ByetHost**: Professional free hosting with advanced features

### Deployment Steps
1. **Upload files** to hosting provider's file manager
2. **Create MySQL database** on hosting platform
3. **Import database** using hosting's phpMyAdmin
4. **Update database credentials** in config/database.php
5. **Test website** functionality

## 🐛 Troubleshooting

### Common Issues

**Database Connection Error**
- Check database credentials in `config/database.php`
- Ensure MySQL service is running
- Verify database name exists

**Images Not Loading**
- Check image file paths in code
- Ensure images are uploaded to `assets/images/` folder
- Verify file permissions (644 for files, 755 for folders)

**Form Not Submitting**
- Check if `process/enquiry.php` file exists
- Verify database connection is working
- Ensure form action path is correct

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/new-feature`)
3. Commit your changes (`git commit -m 'Add some feature'`)
4. Push to the branch (`git push origin feature/new-feature`)
5. Open a Pull Request
