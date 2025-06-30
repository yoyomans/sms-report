# 📊 SMS Report

A Laravel-based web application to ingest SMS data stored in a local JSON file, the application will normalise the data and store it in a relational database, it will also display a simple web report for anayaltics on the data

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
   Update database environment values accordingly, it should just be the db config you need to change, just point it at an empty MySQL database

5. **Run migrations**
   You can find the migrations at `database/migrations` these will create the tables in the database run the below to do this:

```bash
php artisan migrate
```

If you need to start fresh for whatever reason you can run

```bash
php artisan migrate:fresh
```

**BUT WARNING THIS WILL DROP ALL TABLES SO DON'T DO IT IF YOU HAVE TABLES YOU DON'T WANT TO DROP**

6. **Run the dev server**

```bash
php artisan serve
```

You should be able to go to 127.0.0.1 to see an empty report

7. **Ingest the data**
   Running the below will ingest the JSON found at `storage/data/messages.json` this takes a while so go make yourself a tea or coffee you can watch the progress by viewing the messages table in the database but it takes approx 15-20minutes

```bash
php artisan db:seed
```

8. **Tests**
   I only wrote tests for the traits as that is all time allowed for you can run the tests by running

```bash
./vendor/bin/pest
```
