<?php

namespace Currensees;

require './vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Currensees
{
    public function login($username, $password)
    {
        $client = new Client();
        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
        $body = json_encode([
            "username" => $username,
            "password" => $password
        ]);
        $request = new Request('POST', 'https://currensees.com/v1/login', $headers, $body);
        $res = $client->send($request);

        if ($res->getStatusCode() == 200) {
            return json_decode($res->getBody(), true);
        } else {
            return false;
        }
    }

    public function convert($date, $base_currency, $target_currency, $amount)
    {
        $client = new Client();
        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
        $body = json_encode([
            "date" => $date,
            "base_currency" => $base_currency,
            "target_currency" => $target_currency,
            "amount" => $amount
        ]);
        $request = new Request('POST', 'https://currensees.com/v1/convert', $headers, $body);
        $res = $client->send($request);

        if ($res->getStatusCode() == 200) {
            return json_decode($res->getBody(), true);
        } else {
            return false;
        }
    }

    public function convertAll($base_currency, $amount, $date)
    {
        $client = new Client();
        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
        $body = json_encode([
            "base_currency" => $base_currency,
            "amount" => $amount,
            "date" => $date
        ]);
        $request = new Request('POST', 'https://currensees.com/v1/convert_all', $headers, $body);
        $res = $client->send($request);

        if ($res->getStatusCode() == 200) {
            return json_decode($res->getBody(), true);
        } else {
            return false;
        }
    }

    public function getCurrencies($username, $day, $month, $year)
    {
        $client = new Client();
        $headers = [
            'Accept' => 'application/json'
        ];
        $url = 'https://currensees.com/v1/currencies?username=' . $username . '&day=' . $day . '&month=' . $month . '&year=' . $year;
        $request = new Request('GET', $url, $headers);
        $res = $client->sendAsync($request)->wait();
    
        if ($res->getStatusCode() == 200) {
            return json_decode($res->getBody(), true);
        } else {
            return false;
        }
    }
    
    public function getCurrency($uuid, $username, $day, $month, $year)
    {
        $client = new Client();
        $headers = [
            'Accept' => 'application/json'
        ];
        $url = 'https://currensees.com/v1/currencies/' . $uuid . '?username=' . $username . '&day=' . $day . '&month=' . $month . '&year=' . $year;
        $request = new Request('GET', $url, $headers);
        $res = $client->sendAsync($request)->wait();
    
        if ($res->getStatusCode() == 200) {
            return json_decode($res->getBody(), true);
        } else {
            return false;
        }
    }

    public function getHistoricalData($username, $date, $day, $month, $year)
    {
        $client = new Client();
        $headers = [
            'Accept' => 'application/json'
        ];
        $url = 'https://currensees.com/v1/historical?username=' . $username . '&date=' . $date . '&day=' . $day . '&month=' . $month . '&year=' . $year;
        $request = new Request('GET', $url, $headers);
        $res = $client->sendAsync($request)->wait();
    
        if ($res->getStatusCode() == 200) {
            return json_decode($res->getBody(), true);
        } else {
            return false;
        }
    }    

    public function getHistoricalDataForCurrency($uuid, $username, $day, $month, $year, $date)
    {
        $client = new Client();
        $headers = [
            'Accept' => 'application/json'
        ];
        $url = 'https://currensees.com/v1/historical/' . $uuid . '?username=' . $username . '&day=' . $day . '&month=' . $month . '&year=' . $year . '&date_string=' . $date;
        $request = new Request('GET', $url, $headers);
        $res = $client->sendAsync($request)->wait();
    
        if ($res->getStatusCode() == 200) {
            return json_decode($res->getBody(), true);
        } else {
            return false;
        }
    }

    public function getDailyAverage($date)
    {
        $client = new Client();
        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
        $body = '';
        $request = new Request('GET', 'https://currensees.com/v1/daily_average/' . $date, $headers, $body);
        $res = $client->sendAsync($request)->wait();

        if ($res->getStatusCode() == 200) {
            return json_decode($res->getBody(), true);
        } else {
            return false;
        }
    }

    public function getWeeklyAverage($from_date, $to_date)
    {
        $client = new Client();
        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
        $body = '';
        $request = new Request('GET', 'https://currensees.com/v1/weekly_average/' . $from_date . '/' . $to_date, $headers, $body);
        $res = $client->sendAsync($request)->wait();

        if ($res->getStatusCode() == 200) {
            return json_decode($res->getBody(), true);
        } else {
            return false;
        }
    }

    public function getMarginsSpreads($username, $day, $month, $year)
    {
        $client = new Client();
        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
        $url = 'https://currensees.com/v1/margins_spreads?username=' . $username . '&day=' . $day . '&month=' . $month . '&year=' . $year;
        $request = new Request('GET', $url, $headers);
        $res = $client->sendAsync($request)->wait();
    
        if ($res->getStatusCode() == 200) {
            return json_decode($res->getBody(), true);
        } else {
            return false;
        }
    }

    public function getMarginSpread($uuid, $username, $day, $month, $year)
    {
        $client = new Client();
        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
        $url = 'https://currensees.com/v1/margins_spreads/' . $uuid . '?username=' . $username . '&day=' . $day . '&month=' . $month . '&year=' . $year;
        $request = new Request('GET', $url, $headers);
        $res = $client->sendAsync($request)->wait();
    
        if ($res->getStatusCode() == 200) {
            return json_decode($res->getBody(), true);
        } else {
            return false;
        }
    }
    
}
