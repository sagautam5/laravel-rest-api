
# Laravel REST API

All the setup necessary for creating restful api end points in laravel. 

## Installation

You can download this zip then make following setup.

Inside project root directory, run following command.

### composer update

Now, create .env file and setup the database configuration. Then, clear the configuration cache run the migration command.

### php artisan config:cache
### php artisan migrate

This includes following.

- Article Store API 
- Article Update API

# List of files created for this project

## Model
- app\Article.php

## Routes
- routes\api.php

## Controller
- ApiController
- ArticleController

## Request
- app\Http\Requests\ArticleRequest

## migration
- database\migration\2019_02_09_044520_create_articles_table.php
