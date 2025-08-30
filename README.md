# CGRD-project

## English Version

### Description
This is a simple PHP project with a MySQL database. It includes basic functionality to manage posts and users.

### Requirements
- PHP 8.x or higher
- MySQL
- Web server (Apache, Nginx, XAMPP, etc.)
- PDO extension enabled in PHP

### Installation

#1. Clone the repository:
   ```bash
   git clone https://github.com/Kamol1992/cgrd-projekt.git

#2. Navigate to the project folder:
   cd cgrd-projekt
#3. Database Setup
   1. Create a new database named cgrd in MySQL:
     CREATE DATABASE cgrd;
   2. Import the database dump located in sql/Database_cgrd.sql:
      Using MySQL Workbench: File → Open SQL Script → Execute
      Or via terminal:
        mysql -u root -p cgrd < sql/Database_cgrd.sql
#4. Check the database connection settings in Database.php:
  self::$pdo = new PDO("mysql:host=localhost;dbname=cgrd;charset=utf8", "root", "");
  Adjust username and password if needed.
#5. Copy the project folder to your web server's root (e.g., htdocs in XAMPP) and open in browser:
  http://localhost/cgrd/index.php




 
