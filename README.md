This is a user management system implemented using object-oriented PHP. It includes user registration, login, and a user profile page. The project also integrates jQuery validation for improved user experience and Bootstrap for responsive design.

## Features

- User Registration: New users can create accounts by providing their information.
- Login: Registered users can log in using their credentials.
- View User Page: Authenticated users can view their profile details on a dedicated page.
- jQuery Validation: Form inputs are validated using jQuery to ensure accurate data submission.
- Bootstrap: The project is styled using Bootstrap for a clean and responsive design.

## Table of Contents

- [Setup Instructions](#setup-instructions)
- [Project Structure](#project-structure)
- [Dependencies](#dependencies)
- [Acknowledgements](#acknowledgements)
- [License](#license)

## Setup Instructions

1. **Create User Table**: Before running the project, make sure to set up the user table in your database. You can use the provided `create_table.php` file to create the required table structure.

    ```bash
    php create_table.php
    ```

2. **Configure Database Connection**: Open `config.php` and update the database connection details according to your environment.

3. **Run the Application**: Start a local development server (e.g., Apache, PHP built-in server) and navigate to the project's root directory.

4. **Register Page**: Access the `register.php` page in your browser to create a new user account.

5. **Login Page**: Once registered, use your credentials to log in via the `login.php` page.

6. **User Profile Page**: After logging in, you'll be able to view your profile information on the `profile.php` page.

## Project Structure

- `create_table.php`: Script to create the user table in the database.
- `config.php`: Contains the database configuration settings.
- `db.php`: Handles database connections and queries.
- `User.php`: Represents the User class with methods for user-related operations.
- `register.php`: User registration form and logic.
- `login.php`: User login form and logic.
- `profile.php`: User profile page with logged-in user details.
- `js/`: Contains jQuery validation scripts.
- `css/`: Contains Bootstrap and custom CSS styles.
- `images/`: Store images and icons.

## Dependencies

- PHP 7.x
- MySQL (or your preferred database)
- jQuery
- Bootstrap

## Acknowledgements

This project was developed as part of a learning exercise. Feel free to modify, expand, and use it as needed.

## License

This project is licensed under the [MIT License](LICENSE).
