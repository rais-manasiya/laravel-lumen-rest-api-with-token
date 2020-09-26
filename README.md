# Laravel-Lumen Rest API with Token

> ### Lumen + MySQL codebase containing examples (CRUD, auth, advanced patterns, validation, migration, seeding, etc).

This codebase was created to demonstrate a fully functional REST API built with **Lumen + MySQL**, including CRUD operations, routing,validation, pagination, migration, seeding and more.

Hope you'll find this example helpful. Pull requests are welcome!

----------

# Getting started

## Installation

Please check the official Lumen installation guide for server requirements before you start. [Official Documentation](https://lumen.laravel.com/docs/8.x/installation)


Clone the repository

    git clone https://github.com/rais-manasiya/laravel-lumen-rest-api-with-token.git

Switch to the repo folder

    cd laravel-lumen-rest-api-with-token

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

Since Lumen doesn't have the `php artisan key:generate` command.

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run the database seeding to generate user for authentication

    php artisan db:seed

Start the local development server

    php -S localhost:8000 -t public

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/rais-manasiya/laravel-lumen-rest-api-with-token.git
    cd laravel-lumen-rest-api
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan db:seed
    php -S localhost:8000 -t public

***Note*** : First time database table will be an empty, You will have to insert data using post method

## Folders

- `app` - Contains all the Eloquent models
- `app/Http/Controllers` - Contains all the api controllers
- `app/Providers` - Contains all the service providers
- `config` - Contains all the application configuration files
- `database/migrations` - Contains all the database migrations
- `routes` - Contains all the api routes defined in web.php file

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------

# Testing API

Run the Lumen development server

    php -S localhost:8000 -t public

The api can now be accessed at

    http://localhost:8000
    
### API Routes
| HTTP Method	| Path | Action | Scope | Desciption  |
| ----- | ----- | ----- | ---- |------------- |
| POST      | /api/login | auth | users:authenticate | Get token to begin with 
| GET      | /api/participants | show | participants:list | Get all participants
| POST     | /api/participants | store | participants:create | Create an participant
| GET      | /api/participants/{id} | show | participants:read |  Fetch an participant by id
| PUT      | /api/participants/{id} | update | participants:write | Update an participant by id
| DELETE      | /api/participants/{id} | destroy | participants:delete | Delete an participant by id

### API Usage

Credentials for login api: email=rais.manasiya786@gmail.com password=123456

    POST http://localhost:8000/api/login
    
    email=rais.manasiya786@gmail.com 
    password=123456
 
To fetch all participants

    GET http://localhost:8000/api/participants
   
    headers: 
    Authorization= TOKEN (eg: bearer Abcedssd......)
    
To fetch single participant

    GET http://localhost:8000/api/participants/1
   
    headers: 
    Authorization= TOKEN (eg: bearer Abcedssd......)
   
To Add new participant
    
    Post http://localhost:8000/api/participants
   
    Headers Parameters:- 
    Authorization= TOKEN (eg: bearer Abcedssd......)
    
    Post Parameters:-
    name:Rais
    age:30 (only Integer)
    dob:1989-12-18 (Date format validation has given)
    profession:Student/Employed (Fixed value)
    locality:Mumbai
    no_of_guests:2 (Range between 1-10)
    address:Goregaon (max 50 charachter allowed)

To Edit new participant
    
    PUT http://localhost:8000/api/participants/1
   
    Headers Parameters:- 
    Authorization= TOKEN (eg: bearer Abcedssd......)
    
    Post Parameters:-
    name:Rais
    age:30 (only Integer)
    dob:1989-12-18 (Date format validation has given)
    profession:Student/Employed (Fixed value)
    locality:Mumbai
    no_of_guests:2 (Range between 1-10)
    address:Goregaon (max 50 charachter allowed)
    
To delete(soft delete) participant

    DELETE http://localhost:8000/api/participants/1
   
    headers: 
    Authorization= TOKEN (eg: bearer Abcedssd......)
    

Validation, pagination and soft delete features are added






