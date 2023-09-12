# Patchstack API

## Some taughts
Implement Service Layer

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
