<?php

require_once './src/currensees.php';

use Currensees\Currensees;

// Initialize the Currensees SDK
$currensees = new Currensees();

// Set your username and password for the Currency API
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
$conversionResult = $currensees->convert($username, $date, $baseCurrency, $targetCurrency, $amount);
if ($conversionResult) {
    echo "Conversion result: " . json_encode($conversionResult) . "\n";
} else {
    echo "Currency conversion failed: " . $conversionResult['error'] . "\n";
}

// Call the convertAll method to convert the base currency to all available target currencies
$convertAllResult = $currensees->convertAll($username, $baseCurrency, $amount, $date);
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

// Call the getAllPerformances method to get all performances
$getAllPerformancesResult = $currensees->getAllPerformances($username);
if ($getAllPerformancesResult) {
    echo "Performances list:\n";
    echo json_encode($getAllPerformancesResult) . "\n";
} else {
    echo "Failed to retrieve performances.\n";
}

// Set the UUID of the performance you want to retrieve
$performanceId = 'performance_id';

// Call the getPerformanceById method to get the details of a specific performance
$getPerformanceByIdResult = $currensees->getPerformanceById($performanceId, $username);
if ($getPerformanceByIdResult) {
    echo "Performance details for " . $performanceId . ":\n";
    echo json_encode($getPerformanceByIdResult) . "\n";
} else {
    echo "Failed to retrieve performance details for the given ID.\n";
}

// Call the getAllSignals method to get all signals
$getAllSignalsResult = $currensees->getAllSignals($username);
if ($getAllSignalsResult) {
    echo "Signals list:\n";
    echo json_encode($getAllSignalsResult) . "\n";
} else {
    echo "Failed to retrieve signals.\n";
}

// Set the UUID of the signal you want to retrieve
$signalId = 'signal_id';

// Call the getSignalById method to get the details of a specific signal
$getSignalByIdResult = $currensees->getSignalById($signalId, $username);
if ($getSignalByIdResult) {
    echo "Signal details for " . $signalId . ":\n";
    echo json_encode($getSignalByIdResult) . "\n";
} else {
    echo "Failed to retrieve signal details for the given ID.\n";
}

?>
