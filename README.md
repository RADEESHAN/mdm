# Master Data Management (MDM) System

<p align="center">
  <img src="public/build/assets/mdm-logo.png" width="400" alt="MDM System Logo">
</p>

## About MDM System

Master Data Management (MDM) System is a comprehensive web application designed for efficient management of organizational master data, including brands, categories, and items. The application provides user authentication, role-based access control, and CRUD operations for managing master data.

## Key Features

- **User Authentication**: Secure login, registration, and profile management
- **Brand Management**: Create, view, update, and delete brand information
- **Category Management**: Organize your data with customizable categories
- **Item Management**: Track items with detailed information and file attachments
- **Data Export**: Export items to CSV format for reporting and analysis
- **Role-Based Access**: Admin users can view and manage all data
- **Search & Filters**: Find items quickly with search and status filters
- **Responsive Design**: Clean, modern interface that works on desktop and mobile devices

## Technologies Used

- **PHP 8.2**: Modern PHP version with advanced features
- **Laravel 12.x**: PHP web application framework
- **MySQL 8.0**: Database management system
- **Tailwind CSS**: Utility-first CSS framework for styling
- **Alpine.js**: Lightweight JavaScript framework for interactivity
- **Blade Templates**: Laravel's templating engine
- **Laravel Breeze**: Authentication scaffolding

## Installation

### Prerequisites

- PHP 8.2 or higher
- Composer
- MySQL 8.0 or higher
- Node.js and NPM

### Steps

1. **Clone the repository**:
   ```bash
   git clone https://github.com/yourusername/mdm.git
   cd mdm
   ```

2. **Install PHP dependencies**:
   ```bash
   composer install
   ```

3. **Install front-end dependencies**:
   ```bash
   npm install
   npm run build
   ```

4. **Create environment file**:
   ```bash
   cp .env.example .env
   ```

5. **Configure database connection** in `.env`:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=mdm_db
   DB_USERNAME=your_db_username
   DB_PASSWORD=your_db_password
   ```

6. **Generate application key**:
   ```bash
   php artisan key:generate
   ```

7. **Run database migrations**:
   ```bash
   php artisan migrate
   ```

8. **Seed the database with sample data (optional)**:
   ```bash
   php artisan db:seed
   ```

9. **Create a symbolic link for storage**:
   ```bash
   php artisan storage:link
   ```

10. **Start the development server**:
    ```bash
    php artisan serve
    ```

The application will be available at `http://localhost:8000`.

## System Requirements

- PHP >= 8.2
- MySQL >= 8.0
- BCMath PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

## Usage

See [USER_GUIDE.md](USER_GUIDE.md) for a detailed guide on how to use the MDM System.

## Project Structure

- `app/`: Core application code
  - `Http/Controllers/`: Controllers handling HTTP requests
  - `Models/`: Database models
  - `Policies/`: Authorization policies
- `resources/views/`: Blade templates for rendering HTML
  - `auth/`: Authentication views
  - `brands/`, `categories/`, `items/`: Views for each module
  - `layouts/`: Layout templates
- `database/migrations/`: Database structure
- `public/`: Publicly accessible files
- `routes/`: Application routes

## License

This project is licensed under the [MIT license](https://opensource.org/licenses/MIT).
