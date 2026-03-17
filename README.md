# Student Management REST API

Student Management REST API is a backend application built using the Laravel framework. This project provides a structured and scalable API for managing students, classes, subjects, semesters, and scores within an academic environment.

The application is designed following RESTful principles and implements clean architecture practices such as request validation, resource transformation, and modular controller design.

---

## Introduction

This project aims to simulate a real-world backend system used in academic institutions. It focuses on providing a well-structured API that can be consumed by frontend applications such as web or mobile clients.

The system supports authentication, data management, and relational data handling between entities like students, classes, and academic scores.

---

## Features

The application provides the following core features:

* Authentication using token-based system
* Student management (create, read, update, delete)
* Class management
* Subject management
* Semester management
* Score management with relational data
* Pagination for large datasets
* Filtering and search functionality
* Structured API responses using resource classes
* Input validation using form request classes
* Database seeding for testing and development

---

## Technology Stack

This project is built using the following technologies:

* PHP
* Laravel Framework
* MySQL Database
* Laravel Sanctum for API authentication

---

## Installation

Follow the steps below to set up the project locally:

1. Clone the repository

```
git clone https://github.com/alfinf2/System-Management-Rest-Api.git
```

2. Navigate into the project directory

```
cd student-management-rest-api
```

3. Install dependencies

```
composer install
```

4. Copy environment file

```
cp .env.example .env
```

5. Configure your database connection in the `.env` file

6. Generate application key

```
php artisan key:generate
```

7. Run migrations and seed the database

```
php artisan migrate --seed
```

8. Start the development server

```
php artisan serve
```

---

## Authentication

Authentication is handled using Laravel Sanctum.

Available endpoints:

```
POST /api/register
POST /api/login
POST /api/logout
GET  /api/me
```

Protected routes require a Bearer Token:

```
Authorization: Bearer {token}
```

---

## API Endpoints

### Students

```
GET    /api/students
POST   /api/students
GET    /api/students/{id}
PUT    /api/students/{id}
DELETE /api/students/{id}
```

Supports filtering and search:

```
GET /api/students?search=keyword
GET /api/students?class_id=1
```

---

### Classes

```
GET    /api/classes
POST   /api/classes
GET    /api/classes/{id}
PUT    /api/classes/{id}
DELETE /api/classes/{id}
```

---

### Subjects

```
GET    /api/subjects
POST   /api/subjects
GET    /api/subjects/{id}
PUT    /api/subjects/{id}
DELETE /api/subjects/{id}
```

---

### Semesters

```
GET    /api/semesters
POST   /api/semesters
GET    /api/semesters/{id}
PUT    /api/semesters/{id}
DELETE /api/semesters/{id}
```

---

### Scores

```
GET    /api/scores
POST   /api/scores
GET    /api/scores/{id}
PUT    /api/scores/{id}
DELETE /api/scores/{id}
```

---

## Data Relationships

The application is designed with relational database structure:

* A student belongs to a class
* A student has many scores
* A score belongs to a subject
* A score belongs to a semester

This structure ensures that academic data is properly organized and scalable.

---

## Development Notes

This project applies several best practices commonly used in backend development:

* Separation of concerns using controllers, requests, and resources
* Clean and maintainable code structure
* Use of pagination for performance optimization
* Consistent API response formatting
* Validation handled through dedicated request classes

---

## Usage

This API is intended to be used as a backend service. It can be integrated with:

* Frontend web applications
* Mobile applications
* Third-party systems requiring academic data

---

## License

This project is open-sourced and available for educational and development purposes.
