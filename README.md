## Currency API PHP Library

[![Build Status](https://github.com/moatsystems/currensees-php/actions/workflows/ci.yml/badge.svg?branch=main)](https://github.com/moatsystems/currensees-php/actions?query=branch%3Amain)
[![Latest Stable Version](http://poser.pugx.org/moatsystems/currensees/v)](https://packagist.org/packages/moatsystems/currensees)
[![Total Downloads](https://poser.pugx.org/moatsystems/currensees/downloads.svg)](https://packagist.org/packages/moatsystems/currensees)
[![License](https://poser.pugx.org/moatsystems/currensees/license.svg)](https://packagist.org/packages/moatsystems/currensees)

The SDK provides convenient access to the [Currency API](https://moatsystems.com/currency-api/) for applications written in the [PHP](https://www.php.net/) Programming Language.

### Requirements

PHP 7.x.x and later.

### Dependencies

The library require the following extensions in order to work properly:

-   [`Guzzle`](https://docs.guzzlephp.org/en/stable/)

> If you use Composer, these dependencies should be handled automatically. If you install manually, you'll want to make sure that these extensions are available.

### Development

Instructions for installing Composer on macOS, Linux, Unix and Windows are available [here](https://getcomposer.org/doc/00-intro.md#installation-windows).

### Install dependencies:

```bash
composer install
```

### Installation

Install Currency API PHP SDK by running the following command:

```sh
composer require moatsystems/currensees
```

### Usage Example

```php
## create a file called currency_api.php
<?php
use Currensees\Currensees;

// Initialize the Currensees SDK
$currensees = new Currensees();

// Set your username and password for the Currensees API
$username = 'your_username';
$password = 'your_password';

// Log in to the API and obtain a token (if necessary)
$loginResult = $currensees->login($username, $password);
if ($loginResult) {
    echo "Login successful.\n";
} else {
    die("Login failed.\n");
}

// Set currency conversion details
$date = '2023_04_05';
$baseCurrency = 'GBP';
$targetCurrency = 'EUR';
$amount = 1000;

// Call the convert method to perform the currency conversion
$conversionResult = $currensees->convert($date, $baseCurrency, $targetCurrency, $amount);
if ($conversionResult) {
    echo "Conversion result: " . json_encode($conversionResult) . "\n";
} else {
    echo "Currency conversion failed: " . $conversionResult['error'] . "\n";
}

// Call the convertAll method to convert the base currency to all available target currencies
$convertAllResult = $currensees->convertAll($baseCurrency, $amount, $date);
if ($convertAllResult) {
    echo "Conversion to all currencies successful:\n";
    echo json_encode($convertAllResult) . "\n";
} else {
    echo "Conversion to all currencies failed: " . $convertAllResult['error'] . "\n";
}
?>
```

Execute the `currency_api.php` file:

```sh
php currency_api.php
```

### Setting up Currency API Account

Subscribe [here](https://moatsystems.com/currency-api/) for a user account.

### Using the Currency API

You can read the [API documentation](https://docs.currensees.com/) to understand what’s possible with the Currency API. If you need further assistance, don’t hesitate to [contact us](https://moatsystems.com/contact/).

### License

This project is licensed under the [BSD 3-Clause License](./LICENSE).

### Copyright

(c) 2023 [Moat Systems Limited](https://moatsystems.com).