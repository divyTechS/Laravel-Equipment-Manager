# Equipment Manager

A full-stack **Equipment Management System** built with **Laravel 13**, **PHP**, **MySQL**, **Blade**, and **Tailwind CSS**. The application allows organizations to efficiently manage office and laboratory equipment with category management, status tracking, filtering, and a complete CRUD interface.

## 🚀 Features

- 📦 Complete CRUD operations for equipment
- 🗂️ Category management using Eloquent relationships
- 🔍 Filter equipment by category and status
- ✅ Server-side validation using Laravel Form Requests
- 📊 Status tracking (Available, In Use, Maintenance)
- 🎨 Responsive UI built with Blade & Tailwind CSS
- 🗄️ Database migrations and seeders
- 🧪 PHPUnit feature tests
- ⚡ Resource Controllers following Laravel best practices
- 📄 Pagination for equipment listings

---

## 🛠️ Tech Stack

- **Backend:** Laravel 13, PHP 8
- **Database:** MySQL
- **Frontend:** Blade Templates, Tailwind CSS
- **ORM:** Eloquent ORM
- **Testing:** PHPUnit
- **Architecture:** MVC

---

## 📂 Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   └── Requests/
├── Models/

database/
├── factories/
├── migrations/
├── seeders/

resources/
└── views/

routes/
└── web.php
```

---

## 📸 Screenshots

> Add screenshots here after deployment.

| Equipment List | Add Equipment |
|----------------|---------------|
| ![](screenshots/index.png) | ![](screenshots/create.png) |

---

## ⚙️ Installation

### Clone the repository

```bash
git clone https://github.com/your-username/equipment-manager.git
cd equipment-manager
```

### Install dependencies

```bash
composer install
```

### Configure environment

```bash
cp .env.example .env
php artisan key:generate
```

Update your database credentials inside the `.env` file.

### Run migrations and seeders

```bash
php artisan migrate --seed
```

### Start the development server

```bash
composer run dev
```

Visit:

```
http://localhost:8000
```

---

## 🧪 Running Tests

Run the PHPUnit test suite using:

```bash
php artisan test
```

---

## 🗄️ Database Schema

### Categories

- id
- name
- description
- timestamps

### Equipment

- id
- name
- description
- serial_number
- status
- category_id
- purchase_date
- timestamps

---

## 📚 Laravel Concepts Used

- MVC Architecture
- Resource Controllers
- Eloquent ORM
- Model Relationships
- Query Scopes
- Form Request Validation
- Database Migrations
- Database Seeders
- Model Factories
- Blade Templating
- PHPUnit Feature Testing
- Route Model Binding
- RESTful Routing

---

## 🎯 Future Improvements

- User Authentication
- Role-Based Access Control (RBAC)
- QR Code / Barcode Support
- Equipment Reservation System
- Email Notifications
- Asset Maintenance Scheduling
- Dashboard Analytics
- Excel/PDF Export
- REST API
- Docker Deployment

---

## 👨‍💻 Author

**Divyesh Swarge**

- GitHub: https://github.com/divyTechS
- Portfolio: https://divytechs.vercel.app

---

