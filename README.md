# Patchstack API

## Some taughts
I am not happy with the way I have saved Vulnerabilities' description in the database, but for this example, I think that this way is enough.

I taught about using Actions, Repositories, Services and DTOs, but it would have incremented the complexity of the project, but having a bigger project, I would definitely do it, for this situation I haven't found the need to use this resources.

I taught about implementing pagination and more query filters but, as the situation above, it would have increased the complexity, anyway, that is something I would do on a bigger project.

I haven't done TDD (Test Driven Development) because I am not 100% conformable with Testing yet, however, if I had more time I would have done Tests, even if not using TDD.
## Setup Instructions

### Install dependencies
```
composer install
yarn
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
yarn build
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
