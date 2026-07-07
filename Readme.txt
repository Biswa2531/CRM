# 🚀 ResolveHub CRM

# 📖 Overview

ResolveHub CRM is a web-based **Customer Relationship Management (CRM)** system developed using **PHP, MySQL, Bootstrap, HTML, CSS, and JavaScript**. The system is designed to simplify customer complaint handling, support ticket management, and communication between customers, support staff, and administrators.

It provides a centralized platform where customers can register complaints, administrators can assign support tickets, and staff members can resolve issues efficiently while maintaining complete tracking and reporting.

---

# 🎯 Project Objectives

- Digitize customer complaint management.
- Reduce manual paperwork.
- Improve customer support efficiency.
- Track complaint progress in real time.
- Assign tickets to support staff.
- Generate reports for administrators.
- Maintain secure user authentication.
- Demonstrate Full Stack Web Development concepts.

---

# ✨ Key Features

## 👨‍💼 Administrator

- Secure Login
- Dashboard Analytics
- Customer Management
- Staff Management
- Complaint Management
- Ticket Assignment
- Ticket Status Tracking
- User Role Management
- Report Generation
- Profile Management

---

## 👥 Customer

- User Registration
- Secure Login
- Raise Complaints
- Submit Support Tickets
- View Complaint History
- Track Complaint Status
- Update Profile

---

## 👨‍🔧 Support Staff

- Login Authentication
- Assigned Ticket Management
- Update Complaint Status
- Add Resolution Notes
- Close Resolved Complaints

---

# 🔑 Default Login Credentials

| Role | Username / Email | Password |
|------|------------------|----------|
| Administrator | `admin` | `Test@123` |
| Customer | `amitk@gmail.com` | `Test@123` |

> **Note:** Change the default credentials after deployment.

---

# 🌐 Login URLs

| Module | URL |
|---------|-----|
| Admin Login | `http://localhost/CRM/admin/login.php` |
| Customer Login | `http://localhost/CRM/auth/login.php` |

---

# 🛠 Technology Stack

| Technology | Purpose |
|------------|---------|
| PHP | Backend Development |
| MySQL | Database |
| HTML5 | Page Structure |
| CSS3 | Styling |
| Bootstrap 5 | Responsive UI |
| JavaScript | Client-side Scripting |
| AJAX | Dynamic Requests |
| XAMPP | Local Server |

---

# 💻 System Requirements

- Windows 10/11
- XAMPP 8.x
- PHP 8.x
- MySQL
- Modern Web Browser
- Visual Studio Code (Recommended)

---

# 📂 Project Structure

```text
CRM/
│
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
│
├── config/
│   └── db.php
│
├── includes/
│   ├── header.php
│   ├── navbar.php
│   ├── sidebar.php
│   └── footer.php
│
├── admin/
│   ├── dashboard/
│   ├── customers/
│   ├── complaints/
│   ├── staff/
│   └── reports/
│
├── customer/
│   ├── dashboard/
│   ├── complaints/
│   └── profile/
│
├── staff/
│   ├── dashboard/
│   ├── tickets/
│   └── profile/
│
├── auth/
│   ├── login.php
│   ├── register.php
│   └── logout.php
│
├── database/
│   └── crm.sql
│
└── index.php
```

---

# ⚙️ Installation Guide

## 1️⃣ Clone the Repository

```bash
git clone https://github.com/yourusername/ResolveHub-CRM.git
```

or download the ZIP file.

---

## 2️⃣ Move the Project

Copy the project folder into

```text
C:\xampp\htdocs\
```

Example

```text
C:\xampp\htdocs\CRM
```

---

## 3️⃣ Start XAMPP

Start the following services:

- Apache
- MySQL

---

## 4️⃣ Create Database

Open

```text
http://localhost/phpmyadmin
```

Create a database named

```text
crm
```

Import the provided SQL file.

---

## 5️⃣ Configure Database

Update your database configuration file.

Example:

```php
$host="localhost";
$user="root";
$password="";
$database="crm";
```

---

## 6️⃣ Run the Application

Open your browser and visit

```text
http://localhost/CRM
```

---

# 🔄 Project Workflow

```text
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
Update Ticket Status
        │
        ▼
Customer Tracks Complaint
```

---

# 👥 User Modules

## Administrator

- Dashboard
- Customer Management
- Staff Management
- Complaint Management
- Ticket Assignment
- Reports
- System Settings

---

## Customer

- Register
- Login
- Raise Complaint
- Complaint History
- Track Ticket
- Update Profile

---

## Support Staff

- Login
- Assigned Tickets
- Ticket Updates
- Resolution Notes
- Close Tickets

---

# 📊 Database

The application stores the following information:

- Customer Details
- Staff Details
- User Accounts
- Complaints
- Support Tickets
- Ticket Status
- Reports

---

# 🔒 Security Features

- User Authentication
- Session Management
- Role-Based Access Control
- Password Hashing
- Form Validation
- SQL Injection Prevention
- Input Validation

---

# 📸 Screenshots

> Add screenshots inside a **screenshots** folder.

```text
screenshots/
│
├── home.png
├── admin-dashboard.png
├── customer-dashboard.png
├── complaints.png
├── tickets.png
└── reports.png
```

Example:

```markdown
## Home Page

![Home](screenshots/home.png)

## Admin Dashboard

![Dashboard](screenshots/admin-dashboard.png)

## Customer Dashboard

![Customer](screenshots/customer-dashboard.png)
```

---

# 🌟 Project Highlights

- Full Stack PHP Application
- Customer Complaint Management
- Ticket Assignment System
- Role-Based Authentication
- Dashboard Analytics
- CRUD Operations
- Responsive Bootstrap Interface
- Secure Session Management
- MySQL Database Integration
- Clean MVC-like Folder Structure

---

# 🚀 Future Enhancements

- Email Notifications
- SMS Alerts
- Live Chat Support
- AI-based Ticket Categorization
- Mobile Application
- REST API
- Cloud Deployment
- Analytics Dashboard
- Multi-language Support

---

# 🤝 Contributing

Contributions are welcome.

1. Fork the repository.
2. Create a new feature branch.
3. Commit your changes.
4. Push your branch.
5. Create a Pull Request.

---

# 👨‍💻 Author

**Biswajit Rout**

**MCA Student | Full Stack Web Developer**

📧 Email: your-email@example.com

💼 LinkedIn: https://linkedin.com/in/your-profile

🐙 GitHub: https://github.com/yourusername

---

# 📄 License

This project is developed for **educational and academic purposes only**.

---

# ⭐ Support

If you found this project useful, please consider giving it a **⭐ Star** on GitHub.

Your support motivates future improvements and helps others discover the project.
