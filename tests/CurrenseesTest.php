<?php

namespace Currensees\Tests;

use PHPUnit\Framework\TestCase;
use Currensees\Currensees;

class CurrenseesTest extends TestCase
{
    protected $currensees;

    protected function setUp(): void
    {
        $this->currensees = new Currensees();
    }

    public function testLogin()
    {
        $username = 'your_username';
        $password = 'your_password';

        $result = $this->currensees->login($username, $password);
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

        $result = $this->currensees->convert($username, $date, $baseCurrency, $targetCurrency, $amount);
        $this->assertTrue(is_array($result));
    }

    public function testConvertAll()
    {
        $username = 'your_username';
        $baseCurrency = 'GBP';
        $amount = 1000;
        $date = '2023_04_05';

        $result = $this->currensees->convertAll($username, $baseCurrency, $amount, $date);
        $this->assertTrue(is_array($result));
    }

    public function testGetCurrencies()
    {
        $username = 'your_username';
        $day = '05';
        $month = '04';
        $year = '2023';

        $result = $this->currensees->getCurrencies($username, $day, $month, $year);
        $this->assertTrue(is_array($result));
    }

    public function testGetCurrency()
    {
        $uuid = 'currency_uuid';
        $username = 'your_username';
        $day = '05';
        $month = '04';
        $year = '2023';

        $result = $this->currensees->getCurrency($uuid, $username, $day, $month, $year);
        $this->assertTrue(is_array($result));
    }

    public function testGetHistoricalData()
    {
        $username = 'your_username';
        $date = '2023_04_05';
        $day = '05';
        $month = '04';
        $year = '2023';

        $result = $this->currensees->getHistoricalData($username, $date, $day, $month, $year);
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

        $result = $this->currensees->getHistoricalDataForCurrency($uuid, $username, $day, $month, $year, $date);
        $this->assertTrue(is_array($result));
    }

    public function testGetDailyAverage()
    {
        $date = '2023_04_05';
    
        $result = $this->currensees->getDailyAverage($date);
        $this->assertTrue(is_array($result));
    }
    
    public function testGetWeeklyAverage()
    {
        $from_date = '2023_04_03';
        $to_date = '2023_04_07';
    
        $result = $this->currensees->getWeeklyAverage($from_date, $to_date);
        $this->assertTrue(is_array($result));
    }

    public function testGetMarginsSpreads()
    {
        $username = 'your_username';
        $day = '19';
        $month = '04';
        $year = '2023';

        $result = $this->currensees->getMarginsSpreads($username, $day, $month, $year);
        $this->assertTrue(is_array($result));
    }

    public function testGetMarginSpread()
    {
        $uuid = 'uuid_uuid';
        $username = 'your_username';
        $day = '19';
        $month = '04';
        $year = '2023';

        $result = $this->currensees->getMarginSpread($uuid, $username, $day, $month, $year);
        $this->assertTrue(is_array($result));
    }
}
