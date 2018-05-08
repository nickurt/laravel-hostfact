## Laravel HostFact
### Installation
Install this package with composer:
```
composer require nickurt/laravel-hostfact:1.*
```

Add the provider to config/app.php file

```php
'nickurt\HostFact\ServiceProvider',
```

and the facade in the file

```php
'HostFact' => 'nickurt\HostFact\Facade',
```

Copy the config files for the HostFact-plugin

```
php artisan vendor:publish --provider="nickurt\HostFact\ServiceProvider" --tag="config"
```
Add the HostFact credentials to your .env file
```
HOSTFACT_DEFAULT_URL=
HOSTFACT_DEFAULT_KEY=
```
### Tests
```sh
phpunit
```
- - - 