<?php

namespace Fxdatapi\Tests;

use PHPUnit\Framework\TestCase;
use Fxdatapi\Fxdatapi;

class FxdatapiTest extends TestCase
{
    protected $fxdatapi;

    protected function setUp(): void
    {
        $this->fxdatapi = new Fxdatapi();
    }

    public function testLogin()
    {
        $username = 'your_username';
        $password = 'your_password';

        $result = $this->fxdatapi->login($username, $password);
        $this->assertTrue(is_array($result));
        $this->assertArrayHasKey('message', $result);
    }

    public function testConvert()
    {
        $username = 'your_username';
        $date = '2023_04_05';
        $baseCurrency = 'GBP';
        $targetCurrency = 'EUR';
        $amount = 1000;

        $result = $this->fxdatapi->convert($username, $date, $baseCurrency, $targetCurrency, $amount);
        $this->assertTrue(is_array($result));
    }

    public function testConvertAll()
    {
        $username = 'your_username';
        $baseCurrency = 'GBP';
        $amount = 1000;
        $date = '2023_04_05';

        $result = $this->fxdatapi->convertAll($username, $baseCurrency, $amount, $date);
        $this->assertTrue(is_array($result));
    }

    public function testGetCurrencies()
    {
        $username = 'your_username';
        $day = '05';
        $month = '04';
        $year = '2023';

        $result = $this->fxdatapi->getCurrencies($username, $day, $month, $year);
        $this->assertTrue(is_array($result));
    }

    public function testGetCurrency()
    {
        $uuid = 'currency_uuid';
        $username = 'your_username';
        $day = '05';
        $month = '04';
        $year = '2023';

        $result = $this->fxdatapi->getCurrency($uuid, $username, $day, $month, $year);
        $this->assertTrue(is_array($result));
    }

    public function testGetHistoricalData()
    {
        $username = 'your_username';
        $date = '2023_04_05';
        $day = '05';
        $month = '04';
        $year = '2023';

        $result = $this->fxdatapi->getHistoricalData($username, $date, $day, $month, $year);
        $this->assertTrue(is_array($result));
    }

    public function testGetHistoricalDataForCurrency()
    {
        $uuid = 'currency_uuid';
        $username = 'your_username';
        $day = '05';
        $month = '04';
        $year = '2023';
        $date = '2023_04_05';

        $result = $this->fxdatapi->getHistoricalDataForCurrency($uuid, $username, $day, $month, $year, $date);
        $this->assertTrue(is_array($result));
    }

    public function testGetDailyAverage()
    {
        $date = '2023_04_05';
    
        $result = $this->fxdatapi->getDailyAverage($date);
        $this->assertTrue(is_array($result));
    }
    
    public function testGetWeeklyAverage()
    {
        $from_date = '2023_04_03';
        $to_date = '2023_04_07';
    
        $result = $this->fxdatapi->getWeeklyAverage($from_date, $to_date);
        $this->assertTrue(is_array($result));
    }

    public function testGetMonthlyAverage()
    {
        $year = '2023';
        $month = '04';
    
        $result = $this->fxdatapi->getMonthlyAverage($year, $month);
        $this->assertTrue(is_array($result));
    }

    public function testGetMarginsSpreads()
    {
        $username = 'your_username';
        $day = '19';
        $month = '04';
        $year = '2023';

        $result = $this->fxdatapi->getMarginsSpreads($username, $day, $month, $year);
        $this->assertTrue(is_array($result));
    }

    public function testGetMarginSpread()
    {
        $uuid = 'uuid_uuid';
        $username = 'your_username';
        $day = '19';
        $month = '04';
        $year = '2023';

        $result = $this->fxdatapi->getMarginSpread($uuid, $username, $day, $month, $year);
        $this->assertTrue(is_array($result));
    }

    public function testGetAllPerformances()
    {
        $username = 'your_username';

        $result = $this->fxdatapi->getAllPerformances($username);
        $this->assertTrue(is_array($result));
    }

    public function testGetPerformanceById()
    {
        $uuid = 'd4762c44-e3c6-11ed-8570-acde48001122';
        $username = 'your_username';

        $result = $this->fxdatapi->getPerformanceById($uuid, $username);
        $this->assertTrue(is_array($result));
    }

    public function testGetAllSignals()
    {
        $username = 'your_username';

        $result = $this->fxdatapi->getAllSignals($username);
        $this->assertTrue(is_array($result));
    }

    public function testGetSignalById()
    {
        $uuid = 'd46cc05a-e3c6-11ed-8570-acde48001122';
        $username = 'your_username';

        $result = $this->fxdatapi->getSignalById($uuid, $username);
        $this->assertTrue(is_array($result));
    }
}
