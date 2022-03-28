# company-cms
Full company management system. Includes wallet system to pay employees

# App features

Authentication (Login)

Wallet System

Employee can update personal details, password and wallet details

Employees can set withdrawal date & time of their wallets

Create Employee as an Admin

Salary Payment:

Bulk Payment-> Select the due date you want to pay, make sure the date is valid (The date exist as a due date for one or two employees).

Single Payment-> Input the email of the employee you wish to pay, make sure the email is valid (The email exist as an email of an employee).

# Running the Application

# Local 
git clone the project

composer update, update all dependencies

php artisan key:generate, to generate an app key

create your database with desired database name on your env file

php artisan migrate, to migrate all database tables

php artisan db:seed --class=AdminSeeder, to seed admin credentials to the database

php artisan serve, to start up your server

# Admin Credentials
Email: admin@admin.com

Password: password

# Navigations
Top right of the UI you will find navbar, use it to navigate to any page you want.

# Using Live Demo
This application has already been deployed live for testing, below are some guidelines to follow

# Demo Link
http://company-cms.herokuapp.com/

# Admin Credentials
Email: admin@admin.com

Password: password

# Navigations
Top right of the UI you will find navbar, use it to navigate to any page you want.

# Login as an Employee
All already created Employee has same password as "12345678", you can find the email of the particular employee you want to login as on the admin dashboard.

