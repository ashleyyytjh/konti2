## Setup
1) **Clone the Repository**
2) **Install dependencies** : Run **'composer install'**
3) **Environment setup** : Configure .env file to database as needed
4) **Migrate Database** : Run **'php artisan migrate'** to make necessary tables in database
5) **Seed Database** : Run **'php artisan db:seed --class=PostSeeder'** to populate tables with initial data

## API Endpoints Guide
1) **GET /posts**\
    Retrieves all post
   
2) **GET /posts/{id}**\
    Retrieves specific post of {id}
   
3) **POST /posts**\
    Creates a new post of specificed title and content

   **Parameters**:\
       **title** (required): title of new post\
       **content** (required): content of new post
   
4) **PATCH /posts/{id}**\
    Updates details of an existing post
   
    **Parameters**:\
       **id** (required): id of post to update\
       **title** (optional): title of new post\
       **content** (optional): content of new post
   
5) **DELETE /posts/{id}**\
    Deletes specific post of {id}
   
    **Parameters**:\
       **id** (required): id of post to delete

