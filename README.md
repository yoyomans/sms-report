# 📊 SMS Report

A Laravel-based web application to ingest SMS data stored in a local JSON file. The application normalizes the data and stores it in a relational database. It also displays a simple web report for analytics on the data.

---

## Features

-   Laravel 10+ framework
-   SMS data import and management
-   Modular structure for easy extension

---

## Requirements

To run this project locally, make sure you have the following installed:

-   PHP >= 8.1
-   Composer
-   MySQL or another supported database
-   Node.js & npm (for front-end assets)

---

## Setup Instructions

1. **Clone the repository:**

```bash
git clone https://github.com/yoyomans/sms-report.git
cd sms-report
```

2. **Install the dependencies**

```bash
composer install
npm install && npm run dev
```

3. **Environment setup**

```bash
cp .env.example .env
php artisan key:generate
```

4. **Configure .env**
   Update the database environment values accordingly. You’ll likely just need to point it at an empty MySQL database.

5. **Run migrations**
   You can find the migration files in database/migrations. These will create the necessary tables in the database. Run:

```bash
php artisan migrate
```

If you need to start fresh for any reason, you can run:

```bash
php artisan migrate:fresh
```

**BUT ⚠️ Warning: This will drop all existing tables — don't use it if you have data you want to keep.**

6. **Run the development server**

```bash
php artisan serve
```

Visit http://127.0.0.1:8000 in your browser to view the (initially empty) report.

7. **Ingest the data**
   Running the below will ingest the JSON found at `storage/data/messages.json` this takes a while so go make yourself a tea or coffee you can watch the progress by viewing the messages table in the database but it takes approx 15-20minutes

```bash
php artisan db:seed
```

8. **Tests**
   Tests were written primarily for the traits due to time constraints. You can run the tests with:

```bash
./vendor/bin/pest
```
