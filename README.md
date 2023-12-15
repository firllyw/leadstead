# Lead Management Software (Monolith)

This project is a lead management software built using Laravel with Fortify.

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Introduction

The Lead Management Software is a web application designed to help businesses manage their leads effectively. It provides a centralized platform for capturing, tracking, and nurturing leads throughout the sales process.

## Features

- User authentication and authorization using Laravel Fortify
- Lead creation, editing, and deletion
- Lead status tracking
- Lead assignment to team members
- Lead activity logging
- Reporting and analytics

## Installation

To install and run the Lead Management Software, follow these steps:

1. Clone the repository:

    ```bash
    git clone https://github.com/your-username/lead-management.git
    ```

2. Install the dependencies:

    ```bash
    composer install
    ```

3. Configure the environment variables:

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

    Update the `.env` file with your database credentials and other necessary configurations.

4. Run the database migrations:

    ```bash
    php artisan migrate
    ```

5. Start the development server:

    ```bash
    php artisan serve
    ```

6. Access the application in your browser at `http://localhost:8000`.

## Usage

Once the application is up and running, you can start managing your leads by following these steps:

1. Register a new account or log in with an existing one.

2. Navigate to the Leads section to view, create, edit, or delete leads.

3. Use the provided features to track lead status, assign leads to team members, and log lead activities.

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, please open an issue or submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE).
