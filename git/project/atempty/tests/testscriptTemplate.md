<?php
    // strict_typesの制限
    declare(strict_types=1);

    require_once ('./vendor/autoload.php');

    // コントラクト関数を呼ぶ
    require_once ('./tests/configExecute.php');
    
    use PHPUnit\Framework\TestCase;
    use Facebook\WebDriver\Chrome\ChromeOptions;
    use Facebook\WebDriver\Chrome\ChromeDriver;
    use Facebook\WebDriver\Firefox\FirefoxDriver;
    use Facebook\WebDriver\Firefox\FirefoxProfile;
    use Facebook\WebDriver\Remote\DesiredCapabilities;
    use Facebook\WebDriver\Remote\RemoteWebDriver;
    use Facebook\WebDriver\WebDriverBy;

    class testscript4 extends PHPUnit_Auto_FW_TestCase
    {
        public function test_xxxxxx()
        {
            //TBD
            $this.assertEquals(true);
        }
    }
?>
