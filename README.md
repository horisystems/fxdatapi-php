## Currency API PHP Library

[![Build Status](https://github.com/horisystems/fxdatapi-php/actions/workflows/ci.yml/badge.svg?branch=main)](https://github.com/horisystems/fxdatapi-php/actions?query=branch%3Amain)
[![Latest Stable Version](http://poser.pugx.org/horisystems/fxdatapi/v)](https://packagist.org/packages/horisystems/fxdatapi)
[![Total Downloads](https://poser.pugx.org/horisystems/fxdatapi/downloads.svg)](https://packagist.org/packages/horisystems/fxdatapi)
[![License](https://poser.pugx.org/horisystems/fxdatapi/license.svg)](https://packagist.org/packages/horisystems/fxdatapi)

The SDK provides convenient access to the [Currency API](https://horisystems.com/currency-api/) for applications written in the [PHP](https://www.php.net/) Programming Language.

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
composer require horisystems/fxdatapi
```

### Usage Example

```php
## create a file called currency_api.php
<?php
use Fxdatapi\Fxdatapi;

// Initialize the Fxdatapi SDK
$fxdatapi = new Fxdatapi();

// Set your username and password for the Currency API
$username = 'your_username';
$password = 'your_password';

// Log in to the API and obtain a token (if necessary)
$loginResult = $fxdatapi->login($username, $password);
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

// Set the UUID of the performance you want to retrieve
$performanceId = 'performance_id';

// Set the UUID of the signal you want to retrieve
$signalId = 'signal_id';

// Call the convert method to perform the currency conversion
$conversionResult = $fxdatapi->convert($username, $date, $baseCurrency, $targetCurrency, $amount);
if ($conversionResult) {
    echo "Conversion result: " . json_encode($conversionResult) . "\n";
} else {
    echo "Currency conversion failed: " . $conversionResult['error'] . "\n";
}

// Call the convertAll method to convert the base currency to all available target currencies
$convertAllResult = $fxdatapi->convertAll($username, $baseCurrency, $amount, $date);
if ($convertAllResult) {
    echo "Conversion to all currencies successful:\n";
    echo json_encode($convertAllResult) . "\n";
} else {
    echo "Conversion to all currencies failed: " . $convertAllResult['error'] . "\n";
}

// Call the getCurrencies method to get the available currencies for the given date
$currenciesResult = $fxdatapi->getCurrencies($username, $day, $month, $year);
if ($currenciesResult) {
    echo "Currencies for " . $day . "/" . $month . "/" . $year . ":\n";
    echo json_encode($currenciesResult) . "\n";
} else {
    echo "Failed to retrieve currencies for the given date.\n";
}

// Call the getCurrency method to get the details of the specific currency for the given date
$currencyResult = $fxdatapi->getCurrency($uuid, $username, $day, $month, $year);
if ($currencyResult) {
    echo "Currency details for " . $day . "/" . $month . "/" . $year . ":\n";
    echo json_encode($currencyResult) . "\n";
} else {
    echo "Failed to retrieve currency details for the given date.\n";
}

// Call the getHistoricalData method to get historical data for all currencies for the given date
$historicalDataResult = $fxdatapi->getHistoricalData($username, $date, $day, $month, $year);
if ($historicalDataResult) {
    echo "Historical data for " . $date . ":\n";
    echo json_encode($historicalDataResult) . "\n";
} else {
    echo "Failed to retrieve historical data for the given date.\n";
}

// Call the getHistoricalDataForCurrency method to get historical data for a specific currency
$historicalDataForCurrencyResult = $fxdatapi->getHistoricalDataForCurrency($uuid, $username, $day, $month, $year, $date);
if ($historicalDataForCurrencyResult) {
    echo "Historical data for currency " . $uuid . " on " . $date . ":\n";
    echo json_encode($historicalDataForCurrencyResult) . "\n";
} else {
    echo "Failed to retrieve historical data for the given currency and date.\n";
}

// Call the getDailyAverage method to get the daily average for the given date
$dailyAverageResult = $fxdatapi->getDailyAverage($dailyAverageDate);
if ($dailyAverageResult) {
    echo "Daily average for " . $dailyAverageDate . ":\n";
    echo json_encode($dailyAverageResult) . "\n";
} else {
    echo "Failed to retrieve daily average for the given date.\n";
}

// Call the getWeeklyAverage method to get the weekly average for the given date range
$weeklyAverageResult = $fxdatapi->getWeeklyAverage($weeklyAverageFromDate, $weeklyAverageToDate);
if ($weeklyAverageResult) {
    echo "Weekly average from " . $weeklyAverageFromDate . " to " . $weeklyAverageToDate . ":\n";
    echo json_encode($weeklyAverageResult) . "\n";
} else {
    echo "Failed to retrieve weekly average for the given date range.\n";
}

// Call the getMonthlyAverage method to get the monthly average for the given year and month
$monthlyAverageResult = $fxdatapi->getMonthlyAverage($monthlyAverageYear, $monthlyAverageMonth);
if ($monthlyAverageResult) {
    echo "Monthly average for " . $monthlyAverageYear . " and " . $monthlyAverageMonth . ":\n";
    echo json_encode($monthlyAverageResult) . "\n";
} else {
    echo "Failed to retrieve monthly average for the given year and month.\n";
}

// Call the getMarginsSpreads method to get the margins and spreads for the given date
$marginsSpreadsResult = $fxdatapi->getMarginsSpreads($username, $day, $month, $year);
if ($marginsSpreadsResult) {
    echo "Margins and spreads for " . $day . "/" . $month . "/" . $year . ":\n";
    echo json_encode($marginsSpreadsResult) . "\n";
} else {
    echo "Failed to retrieve margins and spreads for the given date.\n";
}

// Call the getMarginSpread method to get the details of the specific margin or spread for the given date
$marginSpreadResult = $fxdatapi->getMarginSpread($uuid, $username, $day, $month, $year);
if ($marginSpreadResult) {
    echo "Margin or spread details for " . $day . "/" . $month . "/" . $year . ":\n";
    echo json_encode($marginSpreadResult) . "\n";
} else {
    echo "Failed to retrieve margin or spread details for the given date.\n";
}

// Call the getAllPerformances method to get all performances
$getAllPerformancesResult = $fxdatapi->getAllPerformances($username);
if ($getAllPerformancesResult) {
    echo "Performances list:\n";
    echo json_encode($getAllPerformancesResult) . "\n";
} else {
    echo "Failed to retrieve performances.\n";
}

// Call the getPerformanceById method to get the details of a specific performance
$getPerformanceByIdResult = $fxdatapi->getPerformanceById($performanceId, $username);
if ($getPerformanceByIdResult) {
    echo "Performance details for " . $performanceId . ":\n";
    echo json_encode($getPerformanceByIdResult) . "\n";
} else {
    echo "Failed to retrieve performance details for the given ID.\n";
}

// Call the getAllSignals method to get all signals
$getAllSignalsResult = $fxdatapi->getAllSignals($username);
if ($getAllSignalsResult) {
    echo "Signals list:\n";
    echo json_encode($getAllSignalsResult) . "\n";
} else {
    echo "Failed to retrieve signals.\n";
}

// Call the getSignalById method to get the details of a specific signal
$getSignalByIdResult = $fxdatapi->getSignalById($signalId, $username);
if ($getSignalByIdResult) {
    echo "Signal details for " . $signalId . ":\n";
    echo json_encode($getSignalByIdResult) . "\n";
} else {
    echo "Failed to retrieve signal details for the given ID.\n";
}

?>
```

Execute the `currency_api.php` file:

```sh
php currency_api.php
```

### Setting up Currency API Account

Subscribe [here](https://horisystems.com/currency-api/) for a user account.

### Using the Currency API

You can read the [API documentation](https://docs.fxdatapi.com/) to understand what’s possible with the Currency API. If you need further assistance, don’t hesitate to [contact us](https://horisystems.com/contact/).

### License

This project is licensed under the [BSD 3-Clause License](./LICENSE).

### Copyright

(c) 2023 [Hori Systems Limited](https://horisystems.com).