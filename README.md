### Logistics Management Application

#### Description
This project is a logistics management application built with Laravel. It allows admins and editor and customers to manage shipments, track orders, and handle email notifications.

---

### Prerequisites
Before getting started, make sure you have the following installed on your system:

- PHP >= 8.0
- Composer
- MySQL
- Node.js (for front-end build)
- Laravel 9.x

---

### Setup Instructions

#### 1. Clone the Repository
Clone the repository to your local machine using:

```bash
git clone https://github.com/Aldarandaly/logistics.git
```

#### 2. Install Dependencies
Navigate to the project directory and run the following command to install the project dependencies:

```bash
cd logistics
composer install
```

#### 3. Configure Environment Variables
Rename the `.env.example` file to `.env`:

```bash
mv .env.example .env
```

Edit the `.env` file to configure your database and email settings:

**Database Configuration:**
Set your database connection details as per your environment. For local development, you can use the following:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=final_pro
DB_USERNAME=root
DB_PASSWORD=
```

**Mail Configuration:**
Set your mail configuration for sending emails (e.g., Mailtrap for testing):

```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=167cd5283c7c02
MAIL_PASSWORD=392ecf29a53a1e
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=no-replay@example.com
MAIL_FROM_NAME="Your Company Name"
```

Update these values with your own email service details for production.

**Other Configuration:**
The default settings for other services like Redis and Queue are set to local values, which can be customized based on your environment.

#### 4. Generate Application Key
Run the following command to generate a new application key:

```bash
php artisan key:generate
```

#### 5. Set Up the Database
Make sure your MySQL server is running and create the necessary database:

```bash
mysql -u root -p
```

Then run the following SQL command to create the logistics database:

```sql
CREATE DATABASE final_pro;
```

#### 6. Run Migrations
Once your database is set up, run the migrations to create the necessary tables:

```bash
php artisan migrate
```

#### 7. Seed the Database
If you want to populate the database with some dummy data for testing, you can run the database seeder:

```bash
php artisan db:seed --class=AdminSeeder
```

#### 8. Run the Development Server
To run the Laravel development server, use the following command:

```bash
php artisan serve
```

This will start the server at `http://localhost:8000`.

#### 9. Testing
To run the application tests, use PHPUnit:

```bash
php artisan test
```

This will run all the tests and show the results in the terminal.

#### 10. Build Front-End Assets
If your application has front-end assets (e.g., JavaScript or CSS files), you can build them using Laravel Mix. Run the following commands:

```bash
npm install
npm run dev  # For development
npm run production  # For production
```

#### 11. Additional Information

**Mailtrap:** If you want to test emails, you can use Mailtrap for SMTP testing in development. Replace the credentials in the `.env` file with the ones provided by Mailtrap.

**Production:** For production deployments, make sure to update the `.env` file with proper production database, mail, and other services' credentials.

---

### License
This project is licensed under the MIT License - see the LICENSE file for details.




