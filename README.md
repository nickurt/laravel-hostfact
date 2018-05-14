## Laravel HostFact
HostFact is an easy-to-use billing and automation solution for hosting companies
### Table of contents
- [Installation](#installation)
- [Usage](#usage)
- [Tests](#tests)
### Installation
Install this package with composer:
```
composer require nickurt/laravel-hostfact:1.*
```
Add the provider to `config/app.php` file
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
Add the HostFact credentials to your `.env` file
```
HOSTFACT_DEFAULT_URL=
HOSTFACT_DEFAULT_KEY=
```
### Usage
#### Authentication [debtors]
It's possible to use a custom `hostfact` authentication driver to login debtors in your application, by default the UserProfile will be cached for 60 minutes
```php
// config/auth.php
'providers' => [
    'hostfact' => [
        'driver' => 'hostfact'
    ],
]

// Auth::attempt
if(Auth::attempt(['username' => $username, 'password' => $password]))
{
    dd(Auth::user(), Auth::id());
}
```
#### Multiple Panels [config]
If you want to work with more HostFact panels, you can define more panels in the `config/hostfact.php` file
```php
// config/hostfact.php
'panels' => [

    'default' => [
        'url' => env('HOSTFACT_DEFAULT_URL'),
        'key' => env('HOSTFACT_DEFAULT_KEY'),
    ],

    'ppe' => [
        'url' => env('HOSTFACT_PPE_URL'),
        'key' => env('HOSTFACT_PPE_KEY'),
    ],

],
```
#### Multiple Panels [normal usage]
To use another panel than your default one, you can specify it with the panel-method
```php
// DebtorsController
public function getIndex()
{
    $debtors = \HostFact::panel('ppe')->debtors()->all([
        'Sort' => 'DebtorCode',
        'limit' => 20
    ]);

    //
}
```
#### Multiple Panels [dependency injection]
```php
// Route
Route::get('/hostfact/{hostFact}/debtors', ['as' => 'hostfact/debtors', 'uses' => 'DebtorsController@getIndex']);

Route::bind('hostFact', function ($value, $route) {
    app('HostFact')->panel($value);

    return app('HostFact');
});

// DebtorsController
public function getIndex(HostFact $hostFact)
{
    $debtors = $hostFact->debtors()->all([
        'Sort' => 'DebtorCode',
        'limit' => 20
    ]);

    //
}
```
#### Attachments
```php
\HostFact::attachments()->add(array $params)
\HostFact::attachments()->delete(array $params)
\HostFact::attachments()->download(array $params)
```
#### CreditInvoices
```php
\HostFact::creditinvoices()->add(array $params)
\HostFact::creditinvoices()->delete(array $params)
\HostFact::creditinvoices()->edit(array $params)
\HostFact::creditinvoices()->list(array $params)
\HostFact::creditinvoices()->markAsPaid(array $params)
\HostFact::creditinvoices()->partPayment(array $params)
\HostFact::creditinvoices()->show(array $params)
```
#### Creditors
```php
\HostFact::creditors()->add(array $params)
\HostFact::creditors()->delete(array $params)
\HostFact::creditors()->edit(array $params)
\HostFact::creditors()->list(array $params)
\HostFact::creditors()->show(array $params)
```
#### Debtors
```php
\HostFact::debtors()->add(array $params)
\HostFact::debtors()->checkLogin(array $params)
\HostFact::debtors()->edit(array $params)
\HostFact::debtors()->generatePdf(array $params)
\HostFact::debtors()->list(array $params)
\HostFact::debtors()->sendEmail(array $params)
\HostFact::debtors()->show(array $params)
\HostFact::debtors()->updateLoginCredentials(array $params)
```
#### Domains
```php
\HostFact::domains()->add(array $params)
\HostFact::domains()->autoRenew(array $params)
\HostFact::domains()->changeNameServer(array $params)
\HostFact::domains()->check(array $params)
\HostFact::domains()->delete(array $params)
\HostFact::domains()->edit(array $params)
\HostFact::domains()->editDnsZone(array $params)
\HostFact::domains()->editWhois(array $params)
\HostFact::domains()->getDnsZone(array $params)
\HostFact::domains()->getToken(array $params)
\HostFact::domains()->list(array $params)
\HostFact::domains()->listDnsTemplates(array $params)
\HostFact::domains()->lock(array $params)
\HostFact::domains()->register(array $params)
\HostFact::domains()->show(array $params)
\HostFact::domains()->syncWhois(array $params)
\HostFact::domains()->terminate(array $params)
\HostFact::domains()->transfer(array $params)
\HostFact::domains()->unlock(array $params)
```
#### Groups
```php
\HostFact::groups()->add(array $params)
\HostFact::groups()->delete(array $params)
\HostFact::groups()->edit(array $params)
\HostFact::groups()->list(array $params)
\HostFact::groups()->show(array $params)
```
#### Handles
```php
\HostFact::handles()->add(array $params)
\HostFact::handles()->delete(array $params)
\HostFact::handles()->edit(array $params)
\HostFact::handles()->list(array $params)
\HostFact::handles()->listDomain(array $params)
\HostFact::handles()->show(array $params)
```
#### Hosting
```php
\HostFact::hosting()->add(array $params)
\HostFact::hosting()->create(array $params)
\HostFact::hosting()->delete(array $params)
\HostFact::hosting()->edit(array $params)
\HostFact::hosting()->getDomainList(array $params)
\HostFact::hosting()->list(array $params)
\HostFact::hosting()->removeFromServer(array $params)
\HostFact::hosting()->sendAccountInfoByEmail(array $params)
\HostFact::hosting()->show(array $params)
\HostFact::hosting()->suspend(array $params)
\HostFact::hosting()->terminate(array $params)
\HostFact::hosting()->unsuspend(array $params)
\HostFact::hosting()->upDownGrade(array $params)
```
#### Invoices
```php
\HostFact::invoices()->add(array $params)
\HostFact::invoices()->block(array $params)
\HostFact::invoices()->cancelSchedule(array $params)
\HostFact::invoices()->credit(array $params)
\HostFact::invoices()->delete(array $params)
\HostFact::invoices()->download(array $params)
\HostFact::invoices()->edit(array $params)
\HostFact::invoices()->list(array $params)
\HostFact::invoices()->markAsPaid(array $params)
\HostFact::invoices()->markAsUnpaid(array $params)
\HostFact::invoices()->partPayment(array $params)
\HostFact::invoices()->paymentProcessPause(array $params)
\HostFact::invoices()->paymentProcessReactivate(array $params)
\HostFact::invoices()->schedule(array $params)
\HostFact::invoices()->sendByEmail(array $params)
\HostFact::invoices()->sendReminderByEmail(array $params)
\HostFact::invoices()->sendSummationByEmail(array $params)
\HostFact::invoices()->show(array $params)
\HostFact::invoices()->unblock(array $params)
```
#### Orders
```php
\HostFact::orders()->add(array $params)
\HostFact::orders()->delete(array $params)
\HostFact::orders()->edit(array $params)
\HostFact::orders()->list(array $params)
\HostFact::orders()->process(array $params)
\HostFact::orders()->show(array $params)
```
#### PriceQuotes
```php
\HostFact::pricequotes()->accept(array $params)
\HostFact::pricequotes()->add(array $params)
\HostFact::pricequotes()->decline(array $params)
\HostFact::pricequotes()->delete(array $params)
\HostFact::pricequotes()->download(array $params)
\HostFact::pricequotes()->edit(array $params)
\HostFact::pricequotes()->list(array $params)
\HostFact::pricequotes()->sendByEmail(array $params)
\HostFact::pricequotes()->show(array $params)
```
#### Products
```php
\HostFact::products()->add(array $params)
\HostFact::products()->delete(array $params)
\HostFact::products()->edit(array $params)
\HostFact::products()->list(array $params)
\HostFact::products()->show(array $params)
```
#### Services
```php
\HostFact::services()->add(array $params)
\HostFact::services()->edit(array $params)
\HostFact::services()->list(array $params)
\HostFact::services()->show(array $params)
\HostFact::services()->terminate(array $params)
```
#### Ssl
```php
\HostFact::ssl()->add(array $params)
\HostFact::ssl()->download(array $params)
\HostFact::ssl()->edit(array $params)
\HostFact::ssl()->getStatus(array $params)
\HostFact::ssl()->installed(array $params)
\HostFact::ssl()->list(array $params)
\HostFact::ssl()->reissue(array $params)
\HostFact::ssl()->renew(array $params)
\HostFact::ssl()->request(array $params)
\HostFact::ssl()->resendApproverMail(array $params)
\HostFact::ssl()->revoke(array $params)
\HostFact::ssl()->show(array $params)
\HostFact::ssl()->terminate(array $params)
\HostFact::ssl()->uninstalled(array $params)
```
#### Tickets
```php
\HostFact::tickets()->add(array $params)
\HostFact::tickets()->addMessage(array $params)
\HostFact::tickets()->changeOwner(array $params)
\HostFact::tickets()->changeStatus(array $params)
\HostFact::tickets()->delete(array $params)
\HostFact::tickets()->edit(array $params)
\HostFact::tickets()->list(array $params)
\HostFact::tickets()->show(array $params)
```
#### Vps
```php
\HostFact::vps()->add(array $params)
\HostFact::vps()->create(array $params)
\HostFact::vps()->downloadAccountData(array $params)
\HostFact::vps()->edit(array $params)
\HostFact::vps()->list(array $params)
\HostFact::vps()->pause(array $params)
\HostFact::vps()->restart(array $params)
\HostFact::vps()->sendAccountDataByEmail(array $params)
\HostFact::vps()->show(array $params)
\HostFact::vps()->start(array $params)
\HostFact::vps()->suspend(array $params)
\HostFact::vps()->terminate(array $params)
\HostFact::vps()->unsuspend(array $params)
```
### Tests
```sh
phpunit
```
- - - 