# filemanager
A simple Laravel file manager
---------------------------------------------------------------------------------

INSTALLATION
---------------------------------------------------------------------------------

Clone the project, create the "filemanager" schema and run the following commands:

```bash
composer update
```

```bash
cp .env.example .env
```

```bash
php artisan key:generate
```

```bash
php artisan migrate
```

```bash
composer dump-autoload
```

```bash
php artisan db:seed
```

```bash
php artisan cache:clear
```

```bash
php artisan storage:link
```
