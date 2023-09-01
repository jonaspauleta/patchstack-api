# Patchstack API

## Some taughts
I'm not happy with the way I implemented the Seeder.

I am not happy with the way I have saved Vulnerabilities' description in the database.

I taught about using Actions, Repositiories, Services and DTOs but it would have incremented the complexity of the project, but having a bigger project, I would definitely do it.

I taught about implementing pagination and query filters but, as the situation above, it would have increased the complexity, anyway, that is something I would do on a bigger project.

I haven't done TDD (Test Driven Development) because I am not 100% confortable with Testing yet, however, if I had more time I would have done Tests, even if not using TDD.

## Setup Instructions

### Install dependencies
```
composer install
npm install
```

### Create .env file from .env.example
```
cp .env.example .env
```

### Generate application key
```
php artisan key:generate
```

### Create a Storage Link to Public Folder
```
php artisan storage:link
```

### Run migrations
```
php artisan migrate:fresh --seed
```

### Build assets
```
npm run build
```

### Run server
```
php artisan serve
```

### Run Larastan
```
composer larastan
```

### Run Laravel Pint
```
composer pint
```
