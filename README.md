
## Introduction

This project is a REST API built with Laravel framework for a mail : web application . The API has some endpoints to manage authentication, send mails, retrieve customer mails, get a mail details. The following sections describe how to clone an run the project :

## Set-up instructions
#### 1. Server requirements
To successfully run a Laravel project, you need this requirements:
- PHP >= 7.3
- Composer

#### 2. Clone the project
Clone the project from this repository https://github.com/BorisEkue/MiniSend.git

```
    > git clone https://github.com/BorisEkue/MiniSend.git
```

#### 3. Install project dependencies
```
    > cd MiniSend
    > composer install
```

#### 4. Database settings
The project is configured to use SQLite as default database. The main purpose of using SQLite is to provide an easy and fast way to deploy and run the project. 

- The database file data is located at [/database/database.sqlite](/database/database.sqlite)
- You need to run the database migrations in order to create the database schema and related tables
and insert some testing data.

```
    > php artisan migrate
```


## Run the project
To run the project, simple type the command
```
    > php artisan serve
```

By default the project will run on http://127.0.0.1:8000

## Run feature tests
To run feature tests, type this command in the root folder
```
    > vendor\bin\phpunit
```

## API calls
The REST API calls are documented at this address [https://documenter.getpostman.com/view/463175/TWDXpHXn](https://documenter.getpostman.com/view/463175/TWDXpHXn)
