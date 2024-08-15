# My Project

## Overview

This project is a basic web application that includes user login, item management, and a shopping chart feature. It uses PHP, MySQL, and Bootstrap to create a dynamic, user-friendly interface.

## Features

- **User Login**: Allows users to log in with email and password.
- **Item Display**: Shows items from the database in a Bootstrap grid layout with cards.
- **Add to Chart**: Users can add items to their chart.
- **User Chart**: Displays items added to the user's chart with an option to delete items.
- **Announcements**: Provides alerts for various messages using Bootstrap alerts.

## Requirements

- PHP
- MySQL
- Bootstrap (CSS/JS)

## Installation

1. **Clone the Repository**

    ```bash
    git clone <repository-url>
    ```

2. **Set Up Database**

    Create a database named `andrewmarketdb` and import the provided SQL scripts to set up the `users`, `items`, and `user_chart` tables.

    ```sql
    -- Create tables
    CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL
    );

    CREATE TABLE items (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        price DECIMAL(10, 2) NOT NULL
    );

    CREATE TABLE user_chart (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        item_id INT NOT NULL,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
        FOREIGN KEY (item_id) REFERENCES items(id) ON DELETE CASCADE
    );
    ```

3. **Configure PHP**

    - Update the database connection details in `config.php` (if you have a separate configuration file) or directly in your PHP scripts.
    - Ensure that the necessary PHP extensions for MySQL are installed.

4. **Run the Application**

    - Place the project files in your web server's document root.
    - Access the application through your web browser.

## Usage

- **Login Page**: Users can log in with their email and password.
- **Item Display**: View items and add them to the chart.
- **User Chart**: View items added to your chart and delete them if needed.
- **Announcements**: Alerts will show success, error, warning, or info messages.

## Files

- `login.php`: Login form and authentication logic.
- `items_display.php`: Displays items in a Bootstrap grid layout.
- `add_to_chart.php`: Handles adding items to the chart.
- `user_chart.php`: Displays items in the user’s chart with delete functionality.
- `delete_from_chart.php`: Handles the deletion of items from the chart.

## Contributing

Feel free to submit issues or pull requests. Contributions are welcome!

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Acknowledgements

- [Bootstrap](https://getbootstrap.com) for the CSS framework.
- [PHP](https://www.php.net) for server-side scripting.
- [MySQL](https://www.mysql.com) for database management.
