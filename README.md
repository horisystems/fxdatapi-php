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

// Set the date for which you want to retrieve the currencies
$day = '05';
$month = '04';
$year = '2023';

// Set the UUID of the currency you want to retrieve
$uuid = 'currency_uuid';

// Set the date for which you want to retrieve the daily average
$dailyAverageDate = '2023_04_10';

// Set the date range for which you want to retrieve the weekly average
$weeklyAverageFromDate = '2023_04_03';
$weeklyAverageToDate = '2023_04_07';

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

// Call the getCurrencies method to get the available currencies for the given date
$currenciesResult = $currensees->getCurrencies($username, $day, $month, $year);
if ($currenciesResult) {
    echo "Currencies for " . $day . "/" . $month . "/" . $year . ":\n";
    echo json_encode($currenciesResult) . "\n";
} else {
    echo "Failed to retrieve currencies for the given date.\n";
}

// Call the getCurrency method to get the details of the specific currency for the given date
$currencyResult = $currensees->getCurrency($uuid, $username, $day, $month, $year);
if ($currencyResult) {
    echo "Currency details for " . $day . "/" . $month . "/" . $year . ":\n";
    echo json_encode($currencyResult) . "\n";
} else {
    echo "Failed to retrieve currency details for the given date.\n";
}

// Call the getHistoricalData method to get historical data for all currencies for the given date
$historicalDataResult = $currensees->getHistoricalData($username, $date, $day, $month, $year);
if ($historicalDataResult) {
    echo "Historical data for " . $date . ":\n";
    echo json_encode($historicalDataResult) . "\n";
} else {
    echo "Failed to retrieve historical data for the given date.\n";
}

// Call the getHistoricalDataForCurrency method to get historical data for a specific currency
$historicalDataForCurrencyResult = $currensees->getHistoricalDataForCurrency($uuid, $username, $day, $month, $year, $date);
if ($historicalDataForCurrencyResult) {
    echo "Historical data for currency " . $uuid . " on " . $date . ":\n";
    echo json_encode($historicalDataForCurrencyResult) . "\n";
} else {
    echo "Failed to retrieve historical data for the given currency and date.\n";
}

// Call the getDailyAverage method to get the daily average for the given date
$dailyAverageResult = $currensees->getDailyAverage($dailyAverageDate);
if ($dailyAverageResult) {
    echo "Daily average for " . $dailyAverageDate . ":\n";
    echo json_encode($dailyAverageResult) . "\n";
} else {
    echo "Failed to retrieve daily average for the given date.\n";
}

// Call the getWeeklyAverage method to get the weekly average for the given date range
$weeklyAverageResult = $currensees->getWeeklyAverage($weeklyAverageFromDate, $weeklyAverageToDate);
if ($weeklyAverageResult) {
    echo "Weekly average from " . $weeklyAverageFromDate . " to " . $weeklyAverageToDate . ":\n";
    echo json_encode($weeklyAverageResult) . "\n";
} else {
    echo "Failed to retrieve weekly average for the given date range.\n";
}

// Call the getMarginsSpreads method to get the margins and spreads for the given date
$marginsSpreadsResult = $currensees->getMarginsSpreads($username, $day, $month, $year);
if ($marginsSpreadsResult) {
    echo "Margins and spreads for " . $day . "/" . $month . "/" . $year . ":\n";
    echo json_encode($marginsSpreadsResult) . "\n";
} else {
    echo "Failed to retrieve margins and spreads for the given date.\n";
}

// Call the getMarginSpread method to get the details of the specific margin or spread for the given date
$marginSpreadResult = $currensees->getMarginSpread($uuid, $username, $day, $month, $year);
if ($marginSpreadResult) {
    echo "Margin or spread details for " . $day . "/" . $month . "/" . $year . ":\n";
    echo json_encode($marginSpreadResult) . "\n";
} else {
    echo "Failed to retrieve margin or spread details for the given date.\n";
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