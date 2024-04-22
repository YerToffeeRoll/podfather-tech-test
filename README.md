
# podfather-tech-test
A tech test based on creating an application for importing a Excel file, populating a database and creating a searchable table.  It uses Laravel Breeze for authentication.

#Overview

The general idea is that we ingest an excel file into the database, thus storing it for use in the application using an OOP (object orientated programming) approach. We can then use the MVC pattern in Laravel, which uses a controller to handle the business logic. Using blade templates for our view and the Model class as our interface to the database. 

#### Issues encountered
We can't always rely on the data in the excel file being reliable, so i had to implement some validation and data correction in the Excel import class. 

#### Extras
I have implemented a prototype application which implements basic authentication and an admin panel. Users can also update their profile and their login details, including password and deletion of their account. I have also implemented a basic test for the searching and displaying of the customer waste data table. 

#### Potential Upgrades
- Use some sort of real-time javascript library like ajax to refresh the table on the fly instead of using the refresh facility.
- Create a command which fetches the excel file data from source/server via a console command.
- Setup the console commands to run at a certain time using the Laravel task scheduler - e.g. once a day at a certain time 1AM.


## System Requirements

- PHP >= 8.3
- Composer
- Node.js and npm
- A database system like MySQL or PostgreSQL
- Laravel environment requirements

## Installation Instructions

### 1. Clone the Repository

Clone this repository to your local machine:

```bash
git clone https://github.com/YerToffeeRoll/podfather-tech-test.git
cd podfather-tech-test
```

### 3. Environment Setup
Copy the .env.example file to .env and modify it according to your environment:

```bash
cp .env.example .env
```

Adjust the following settings in your .env file:

    DB_CONNECTION (e.g., mysql)
    DB_HOST (typically localhost)
    DB_PORT (default is 3306 for MySQL)
    DB_DATABASE (your database name)
    DB_USERNAME (your database username)
    DB_PASSWORD (your database password)

### 4. Generate Application Key
Generate a new application key which is used for session and other encrypted data:
```bash
php artisan key:generate

```

###  5. Run Database Migrations
Set up your database tables:

```bash
php artisan migrate

```

### 6. Start the Application
Run the Laravel development server:
```bash
php artisan serve

```
The server will start, and you can access the application at http://localhost:8000.



### 7. Importing Data
To import waste data from an Excel file:

```bash
php artisan import:excel "path/to/your/excel/file.xlsx"

```

This command will ingest data from the specified Excel file into your application's database.

### 8. Create a user account
You will need to create a user account to login and see the data table. 

- Visit the url  http://your_local_url/register
- Sign up as a user
- Login into the http://your_local_url/login
- Navigate to  http://your_local_url/customer
- View and search the customer waste table



### Features
- User authentication using Laravel Breeze
- CRUD operations on waste records
- Excel file import for waste data
- Searchable and paginated waste records interface
- Additional Resources
- For more detailed information about Laravel, refer to Laravel's official documentation.

### Running Tests
Execute the PHPUnit tests to ensure the application's functionality:

```bash
./vendor/bin/phpunit

```
### Contact
For any issues, feature requests, or contributions, please contact the repository owner or open an issue on the GitHub repository page.

Thank you for using or contributing to the Waste Management System!


### Explanation and Usage

- **Instructions**: This `README.md` provides complete setup instructions, from installation to running the application.
- **Commands**: Includes commands to run migrations, start the server, and run tests.
- **Console Command for Import**: Detailed how to use the custom console command for importing data from an Excel file.
- **Running Tests**: Included instructions on how to run PHPUnit tests to ensure the application behaves as expected.

This comprehensive README will help any new developer or user set up the project quickly and understand how to use its various features effectively.




