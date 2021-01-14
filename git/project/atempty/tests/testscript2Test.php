<?php
require_once './vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\WebDriverBy;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Chrome\ChromeDriver;

class testscript2 extends TestCase
{
    protected $webDriver;
    public function test_searchGoogleChrome()
    {
        // 初期化関数
        $host = 'http://localhost:4444/wd/hub';
        $this->webDriver = RemoteWebDriver::create($host,DesiredCapabilities::chrome());
        // $this->webDriver = RemoteWebDriver::create($host,DesiredCapabilities::microsoftEdge());
        $this->webDriver->get("https://www.google.com/ncr");
        $this->webDriver-> manage()->window()->maximize();

        sleep(1);

        // ブラウザのGOOGLEページを開く、テキスト入力する。
        $element = $this->webDriver->findElement(WebDriverBy::name("q"));
        if($element) {
            $element->sendKeys("LambdaTest");
            $element->submit();
          }
        
        // タイトルを取得する。
        print $this->webDriver->getTitle();
        $this->assertEquals('LambdaTest - Google Search', $this->webDriver->getTitle());

        // キャプチャ
        // $file = __DIR__ . '/' .'evidence'.'/'.__METHOD__ ."_chrome_".date('Y_m_d_H_i_s').".png";
        $this->webDriver->takeScreenshot("tests/evidence/testscript2Test.png");

        sleep(1);
        // ブラウザを閉じる。
        // $this->webDriver->quit();
    }
}
?>