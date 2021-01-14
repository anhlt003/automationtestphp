<?php
require 'vendor/autoload.php';
require "config.php";

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Chrome\ChromeDriver;
use Facebook\WebDriver\Firefox\FirefoxDriver;
use Facebook\WebDriver\Firefox\FirefoxProfile;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;


class PHPUnit_Auto_FW_TestCase extends TestCase
{
    protected $webDriver;
    protected $ini ;

    // protected function __construct()
    // {
    //     TODO:  
    // }

    public function setUp(): void
    {
        $host = Config::$host_ip ;
        $this->webDriver = RemoteWebDriver::create($host,DesiredCapabilities::chrome());

    }
    public function tearDown(): void
    {
        $this->webDriver->quit();
    }

}

?>