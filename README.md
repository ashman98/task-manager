# Laravel Task Manager

A sleek, modern, and responsive Task Manager web application built with Laravel. Organize your tasks effortlessly with an intuitive drag-and-drop interface.

## ✨ Features

- **Drag & Drop Interface:** Intuitively organize your tasks between columns (To-Do, In Progress, Done) using the HTML5 Drag and Drop API.
- **Responsive Design:** Fully functional on desktop, tablet, and mobile devices thanks to Tailwind CSS.
- **Dynamic UI:** Enhanced user experience with Vite.js for fast asset compilation and Blade templates for seamless server-side rendering.
- **Robust Validation:** Secure and reliable form handling with built-in Laravel form validation.
- **Modern Icons:** Clean and recognizable icons provided by Font Awesome.

## 🛠️ Tech Stack

- **Backend:** Laravel 12, PHP 8.2+
- **Database:** MySQL 8.0+
- **Frontend:** Laravel Blade Templates
- **Bundler & HMR:** Vite.js
- **Styling:** Tailwind CSS (via CDN)
- **Icons:** Font Awesome (via CDN)
- **Core Feature:** HTML5 Drag and Drop API

## 🚀 Installation & Setup

Follow these steps to set up the project locally on your machine.

1.  **Clone the repository**
    ```bash
    git clone https://github.com/your-username/your-repo-name.git
    cd your-repo-name
    ```

2.  **Install PHP Dependencies**
    ```bash
    composer install
    ```

3.  **Install NPM Dependencies**
    ```bash
    npm install
    ```

4.  **Environment Setup**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
    Edit the `.env` file with your database credentials:
    ```env
    DB_DATABASE=your_database_name
    DB_USERNAME=your_mysql_username
    DB_PASSWORD=your_mysql_password
    ```

5.  **Database Migration**
    ```bash
    php artisan migrate
    ```

6.  **Build the Assets (for development)**
    ```bash
    npm run dev
    ```
    *For production, use `npm run build`.*

7.  **Start the Development Server**
    ```bash
    php artisan serve
    ```

8.  **Access the Application**
    Open your browser and go to `http://localhost:8000`.

## 📖 Usage

1.  **Viewing Tasks:** Tasks are displayed in a Kanban-style board with columns for different statuses.
2.  **Adding a Task:** Click the "Add New Task" button or similar, fill out the form, and submit.
3.  **Editing a Task:** Click on a task to edit its details.
4.  **Moving a Task:** Simply click and drag a task card from one column to another to update its status.
5.  **Deleting a Task:** Use the delete button on a task card to remove it.

## 🧪 Running Tests

To run the Laravel PHPUnit tests, use the following command:

```bash
php artisan test

task-manager-app/
├app/
    ├── Http/
    │   ├── Controllers/     # Application controllers
    │   ├── Requests/        # Form Request validation classes
    │   │   ├── Project/     # Project-specific requests
    │   │   └── Task/        # Task-specific requests
    │   └── Interfaces/      # Repository interfaces
    │       ├── Project/
    │       └── Task/
    ├── Models/
    │   ├── Base/            # BaseModel for shared logic
    │   ├── Project.php      # Project Eloquent model
    │   └── Task.php         # Task Eloquent model
    ├── Providers/           # Service providers (e.g., Repository binding)
    ├── Repositories/
    │   ├── Base/            # BaseRepository with common CRUD methods
    │   ├── Project/         # Project-specific repository
    │   └── Task/            # Task-specific repository
    └── Services/            # Business logic layer
├── routes/
│   └── web.php          # Web routes definitions
├── tests/               # Feature and Unit tests
└── ...
