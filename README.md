# Simple-Order-Management-System-using-SQL-PHP-and-HTML

# SQL + PHP Orders Database Project
### 📚 University Project – Database System CA

This project was completed during my **second year** of the **BSc in Mathematics and Data Science** at **Dundalk Institute of Technology**, as part of the continuous assessment for the **Database Systems** module. The objective was to build a simple order management system using SQL, PHP and HTML

## 📦 Project Overview

This project is a simple **web-based order management system** using HTML, PHP, and MySQL. Users can add new orders and view existing orders through a basic web interface.

---

## 📁 Project Structure

| File Name | Type | Description |
|-----------|------|-------------|
| `databaseproject.txt` | Text File | Contains SQL queries to create the database, tables, and insert sample data. Used once to set up your MySQL database. |
| `index.html` | HTML | Home page of the project with navigation links to other parts like adding/viewing orders. |
| `neworder.html` | HTML | Form where users can input new order details. Submits to `addorder.php`. |
| `addorder.php` | PHP | Receives form input from `neworder.html` and inserts the data into the database. |
| `allorders.php` | PHP | Displays a list of all orders stored in the database using a SELECT query. |
| `oneorder.php` | PHP | Shows details of a single order (may require editing to pass an order ID). |
| `someorder_customer.php` | PHP | Shows orders for a specific customer (filters results by customer ID). |

---

## 🚀 How to Run the Project

### 1. 🛠 Set Up the Database

1. Open **phpMyAdmin** or **MySQL Workbench**.
2. Create a new database, e.g., `orders_db`.
3. Open `databaseproject.txt`, copy all SQL code, and run it inside your MySQL interface.
4. This will:
   - Create necessary tables (e.g., orders, customers).
   - Insert sample data.

### 2. 🌐 Set Up the Web Server

To run the PHP files, you need a local web server. The easiest option is using **XAMPP**:

#### Using XAMPP:

1. Install [XAMPP]
2. Copy the whole project folder into `htdocs` 
3. Start **Apache** and **MySQL** from the XAMPP Control Panel.
4. In your browser, will open `index.html`and`neworder.html` where you can:
- Add new orders via an HTML form.
- Insert orders into the database using PHP and SQL.
- View all existing orders.
- View individual orders and filter by customer or product name.
- Make sure your PHP files include the correct database connection info (`host`, `username`, `password`, `dbname`).


This is a **simple student project** — it does not include advanced validation, security, or styling.

