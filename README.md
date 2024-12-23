
# News Aggregator Project

This project is built to fetch data from multiple news APIs, store it, and provide it through custom endpoints for front-end use. Built with Laravel framework.

# How to Run The Project

To Run the project using Docker, execute the following commands:
``` 
docker compose build
docker compose up -d 
```

After Docker finishes creating and running the containers you have to generate the `.env` file and run the migrations for the first time by logging into the container and run the following commands

```
docker exec -it news-aggregator bash
php artisan env:decrypt
```
Here you will be asked for the key to decrypt the env file, please use the one provided in the email. or generate the API keys yourself (check `.env.example`).

Then run the migrations and seed the database by executing the following commands

```
php artisan migrate
php artisan db:seed
```

Now the project should be up and running on your local machine on the following URL: http://localhost:8000/
