# ResolveHub CRM - Customer Relationship Management System

![PHP](https://img.shields.io/badge/PHP-8.x-blue)
![MySQL](https://img.shields.io/badge/MySQL-Database-orange)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-purple)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-yellow)
![License](https://img.shields.io/badge/License-MIT-green)

## 📌 Overview

ResolveHub CRM is a web-based Customer Relationship Management (CRM) system developed to simplify customer complaint handling and support ticket management. The application enables organizations to efficiently manage customers, support staff, complaints, ticket assignments, and resolution tracking through a centralized dashboard.

The system improves communication between customers and support teams while providing administrators with complete control over user management, ticket monitoring, reporting, and system operations.

---

# 🔑 Default Login Credentials

The project comes with pre-configured user accounts for testing and demonstration purposes.

| Role | Username / Email | Password |
|------|-------------------|----------|
| Administrator | `admin` | `Test@123` |
| Customer/User | `amitk@gmail.com` | `Test@123` |

> **Note:** Change the default passwords after deployment for security reasons.

---

# 🌐 Login URLs

| Module | URL |
|---------|-----|
| Admin Login | `http://localhost/CRM/admin/login.php` |
| Customer Login | `http://localhost/CRM/auth/login.php` |

---
---

# ✨ Features

### 👨‍💼 Administrator

* Secure Admin Login
* Dashboard with Analytics
* Customer Management
* Staff Management
* Complaint Management
* Ticket Assignment
* Ticket Status Tracking
* User Role Management
* Reports Generation
* Profile Management

### 👥 Customer

* User Registration
* Secure Login
* Create Support Tickets
* Submit Complaints
* View Complaint History
* Track Ticket Status
* Update Profile

### 👨‍🔧 Support Staff

* Login Authentication
* View Assigned Tickets
* Update Ticket Status
* Add Resolution Notes
* Close Resolved Complaints

---

# 🛠 Technology Stack

| Technology | Purpose                   |
| ---------- | ------------------------- |
| PHP        | Backend Development       |
| MySQL      | Database                  |
| HTML5      | Structure                 |
| CSS3       | Styling                   |
| Bootstrap  | Responsive UI             |
| JavaScript | Client-side Functionality |
| AJAX       | Dynamic Requests          |
| XAMPP      | Local Development Server  |

---

# 📂 Project Structure

```
CRM/
│
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
│
├── config/
│   └── database configuration
│
├── includes/
│   ├── header
│   ├── sidebar
│   ├── navbar
│   └── footer
│
├── admin/
│   ├── Dashboard
│   ├── Customers
│   ├── Complaints
│   ├── Staff
│   └── Reports
│
├── customer/
│   ├── Dashboard
│   ├── Raise Complaint
│   └── Track Ticket
│
├── staff/
│   ├── Dashboard
│   ├── Assigned Tickets
│   └── Ticket Updates
│
├── auth/
│   ├── Login
│   ├── Registration
│   └── Logout
│
└── index.php
```

---

# ⚙ Installation

## 1. Clone the Repository

```bash
git clone https://github.com/yourusername/ResolveHub-CRM.git
```

or download the ZIP file and extract it.

---

## 2. Move Project

Copy the project folder into

```
xampp/htdocs/
```

Example

```
C:\xampp\htdocs\CRM
```

---

## 3. Start XAMPP

Start

* Apache
* MySQL

---

## 4. Create Database

Open

```
http://localhost/phpmyadmin
```

Create a database

```
crm
```

Import the SQL file provided with the project.

---

## 5. Configure Database

Open the database configuration file and update

```php
Host
Username
Password
Database Name
```

Example

```php
localhost
root
""
crm
```

---

## 6. Run the Project

Open

```
http://localhost/CRM
```

---

# 👥 User Modules

## Administrator

* Manage Users
* Manage Customers
* Manage Staff
* View Dashboard
* Assign Tickets
* Generate Reports
* System Configuration

---

## Customer

* Register Account
* Login
* Raise Complaint
* View Complaint History
* Track Complaint Status

---

## Support Staff

* Login
* View Assigned Tickets
* Update Complaint Status
* Add Resolution Notes
* Close Tickets

---

# 🔄 Workflow

```
Customer Registration
        │
        ▼
Customer Login
        │
        ▼
Raise Complaint
        │
        ▼
Complaint Stored in Database
        │
        ▼
Admin Reviews Complaint
        │
        ▼
Assign Ticket to Staff
        │
        ▼
Staff Resolves Complaint
        │
        ▼
Status Updated
        │
        ▼
Customer Tracks Resolution
```

---

# 📊 Database

The project uses MySQL to store

* Customer Information
* User Accounts
* Staff Details
* Complaints
* Support Tickets
* Ticket Status
* Reports

---

# 🔒 Security Features

* User Authentication
* Session Management
* Password Protection
* Role-Based Access Control
* Form Validation
* SQL Injection Prevention
* Input Validation

---

# 🚀 Future Enhancements

* Email Notifications
* SMS Alerts
* Live Chat Support
* AI-based Ticket Categorization
* Mobile Application
* Data Analytics Dashboard
* REST API Integration
* Cloud Deployment

---

# 🤝 Contributing

Contributions are welcome.

1. Fork the repository
2. Create a feature branch
3. Commit your changes
4. Push to your branch
5. Create a Pull Request

---

# 👨‍💻 Developer

**Developed as a Full Stack CRM Project**

ResolveHub CRM is designed for educational purposes and demonstrates full-stack web development concepts including authentication, role management, CRUD operations, complaint tracking, and customer support management.
