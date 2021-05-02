<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Fortify Role
Basic Multi Roles authentication package for Fortify.

## Requirement
- Laravel ^8.x
- Laravel/Fortify ^1.x

## Installation
I recommended you to install this package only on a fresh project.

Install the package using composer
```
composer require akunbeben/fortify-role
```

## Usage
Before continuing the process, please make sure the `FortifyServiceProvider.php` is registered in `config/app.php`. If it's already registered, you can skip this.

```php
'providers' => [
    ...
    App\Providers\FortifyServiceProvider::class,
],
```
Then publish the package's vendor files. It's need `--force` because it will replace the `RedirectIfAuthenticated` middleware.
```
php artisan vendor:publish --provider="Akunbeben\FortifyRole\FortifyRoleServiceProvider" --force
```
And then, add `HasRole` traits to your `User` model.
```php
<?php

namespace App\Models;

use Akunbeben\FortifyRole\Traits\HasRole;
...

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRole;
    ...
}
```
Now you need to run the migration, I suggest to migrate with the seeder. Or if you want to modify the seeder you can find the seeder file on `database/seeders/RoleSeeder.php` and `database/seeders/UserSeeder.php`

### Notes
- On the roles table migration file, there is a default value to assign the role to registered user. You can adjust it to your need.