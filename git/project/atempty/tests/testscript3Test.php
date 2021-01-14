<?php
    require_once ('./vendor/autoload.php');
    require_once ('./tests/configExecute.php');

    use PHPUnit\Framework\TestCase;
    use Facebook\WebDriver\Chrome\ChromeOptions;
    use Facebook\WebDriver\Chrome\ChromeDriver;
    use Facebook\WebDriver\Firefox\FirefoxDriver;
    use Facebook\WebDriver\Firefox\FirefoxProfile;
    use Facebook\WebDriver\Remote\DesiredCapabilities;
    use Facebook\WebDriver\Remote\RemoteWebDriver;
    use Facebook\WebDriver\WebDriverBy;

    class testscript3 extends PHPUnit_Auto_FW_TestCase
    {
        public function test_ToDoApp()
        {
            $itemName = 'Item in Selenium PHP Tutorial';
            $this->webDriver->get("https://lambdatest.github.io/sample-todo-app/");
            $this->webDriver->manage()->window()->maximize();
            sleep(5);
            $element1 = $this->webDriver->findElement(WebDriverBy::name("li1"));
            $element1->click();
            $element2 = $this->webDriver->findElement(WebDriverBy::name("li2"));
            $element2->click();
            $element3 = $this->webDriver->findElement(WebDriverBy::id("sampletodotext"));
            $element3->sendKeys($itemName);
            $element4 = $this->webDriver->findElement(WebDriverBy::id("addbutton"));
            $element4->click();
            $this->webDriver->wait(10, 2000)->until(function($driver) {
                $elements = $this->webDriver->findElements(WebDriverBy::cssSelector("[class='list-unstyled'] li:nth-child(6) span"));
                return count($elements) > 0;
            });
            sleep(2);
            $this->assertEquals('Sample page - lambdatest.com', $this->webDriver->getTitle());
        }
    }
?>
