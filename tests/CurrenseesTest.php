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
        $date = '2023_04_03';
        $baseCurrency = 'GBP';
        $targetCurrency = 'EUR';
        $amount = 1000;

        $result = $this->currensees->convert($date, $baseCurrency, $targetCurrency, $amount);
        $this->assertTrue(is_array($result));
    }

    public function testConvertAll()
    {
        $baseCurrency = 'GBP';
        $amount = 1000;
        $date = '2023_04_03';

        $result = $this->currensees->convertAll($baseCurrency, $amount, $date);
        $this->assertTrue(is_array($result));
    }

    public function testGetCurrencies()
    {
        $username = 'your_username';
        $day = '02';
        $month = '04';
        $year = '2023';

        $result = $this->currensees->getCurrencies($username, $day, $month, $year);
        $this->assertTrue(is_array($result));
    }

    public function testGetCurrency()
    {
        $uuid = 'currency_uuid';
        $username = 'your_username';
        $day = '02';
        $month = '04';
        $year = '2023';

        $result = $this->currensees->getCurrency($uuid, $username, $day, $month, $year);
        $this->assertTrue(is_array($result));
    }
}