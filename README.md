# Blog Application

This application allows users to create, edit, and manage blog posts. It offers a simple interface for publishing content, as well as viewing and managing posts.

## Features

- Create, edit, and delete blog posts
- View list of all published posts
- Comment on posts
- User-friendly interface with post categories

## Technologies

- **Laravel**: Back-end framework for the web application.
- **Bootstrap**: CSS framework for responsive design.
- **JavaScript**: For dynamic features.

## Laravel Packages and Features Used

- **Laravel UI**: For authentication and front-end scaffolding.
- **Eloquent ORM**: For database management and relationships.
- **Blade Templates**: For templating and front-end views.
- **Migrations**: For managing database schema.
- **Middleware**: For authentication and access control.
- **Form Validation**: To validate post data and comments.
- **Pagination**: To manage post lists efficiently.

## Installation

1. **Clone the repository:**
   bash
   git clone https://github.com/aydinuygar/blog-app.git
2. **Install dependencies:**
   bash
   cd blog-app
   composer install
   npm install
3. **Create the .env file:**
   bash
   cp .env.example .env
4. **Set up the database and run migrations:**
   bash
   php artisan migrate
5. **Start the application:**
   bash
   php artisan serve

## Usage

- Create a new blog post by navigating to the admin panel.
- View and manage blog posts through the dashboard.
- Users can comment on posts and interact with published content.

## Contributors

- Uygar AYDIN
