# Tullamore
Tullamore is a request management system build by Laravel/PHP.


## Build
```
cd project
composer install
cp .env.example .env -- and setup your db
php artisan key:generate
php artisan migrate
php artisan serve
```

## Often using commands
```
php artisan make:model <Modelname> -mfs
php artisan migrate:fresh --seed
php artisan tinker
```


## Specific

### Pages
- Login
- Create request
  - form |> register
- Request list
  - select all
  - to create page
  - to detail page
- Request detail
  - delete request
  - drop request
- Approval
  - approval
  - reject

### Database Tables
- requests
- approvals
- users

### Functions
- create request
- delete request
- drop request
- approval
  - insert approval 
  - complete approval |> update request when all approvaled
- reject
