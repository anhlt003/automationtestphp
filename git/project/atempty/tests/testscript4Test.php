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
        public function test_BNW_Login()
        {
            // open page 
            $this->webDriver->get("http://bnw.test/login");
            $this->webDriver->manage()->window()->maximize();

            sleep(5);    
            
            // TBD: call api - push username/ password. 
            // set - get element.
            $p_item_1 = '12345'; 
            $p_item_2 = 'motoki_test@race.co.jp'; 
            $p_item_3 = 'Race1234';
            
            // $element1 = $this->webDriver->findElement(WebDriverBy::name("company_id"));
            // $element2 = $this->webDriver->findElement(WebDriverBy::name("email"));
            // $element3 = $this->webDriver->findElement(WebDriverBy::name("password"));

            $element1 = $this->webDriver->findElement(WebDriverBy::id("company_id"));
            $element2 = $this->webDriver->findElement(WebDriverBy::id("email"));
            $element3 = $this->webDriver->findElement(WebDriverBy::id("password"));

            // push text
            if($element1) {
                $element1->sendKeys($p_item_1);
                // $element1->submit();
              }

            if($element2) {
                $element2->sendKeys($p_item_2);
                // $element2->submit();
            }
            
            if($element3) {
                $element3->sendKeys($p_item_3);
                // $element3->submit();
            }

               
            sleep(1);  
            $element4 = $this->webDriver->findElement(WebDriverBy::class("btn-login"));
            $element4->click();
            
            $currentURL = $this->webDriver->getCurrentURL();
            Utilities::debug_to_console($currentURL);
            sleep(1);  
            $this->assertEquals('http://bnw.test/', $this->webDriver->getCurrentURL());

            $this->webDriver->takeScreenshot("tests/evidence/testscript4Test.png");

            sleep(1);     
        }
    }
?>
