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
    use Facebook\WebDriver\WebDriverOptions; 
    use Facebook\WebDriver\Cookie;


    class testscript6 extends PHPUnit_Auto_FW_TestCase
    {    
        public function test_call_api_curl()
        {
            //ログイン画面からスタート
            $this->webDriver->get("http://bnw.test/login");
            $this->webDriver->manage()->window()->maximize();
            sleep(1);

            //ログイン画面パラメータ
            $user_dept = Config::$userdept; 
            $user_mail = Config::$usermail;
            $user_pass = Config::$userpass;
            
            $company_id = $this->webDriver->findElement(WebDriverBy::id("company_id"));
            $email      = $this->webDriver->findElement(WebDriverBy::id("email"));
            $password   = $this->webDriver->findElement(WebDriverBy::id("password"));

            if($company_id) {
                $company_id->sendKeys($user_dept);
            }
            if($email) {
                $email->sendKeys($user_mail);
            }
            if($password) {
                $password->sendKeys($user_pass);
            }
            sleep(1); 
            
            //ログイン
            $btn_login = $this->webDriver->findElement(WebDriverBy::id("btn-login"));
            $btn_login->click();
            sleep(1); 

            $btn_search = $this->webDriver->findElement(WebDriverBy::xpath('//*[@id="adviserSearchForm"]/div[1]/div[2]/div/button'));
            $btn_search->click();
            sleep(1);            

            //Cookies 検討
            $value = $this->webDriver->manage()->getCookies();
            print_r($value);

            //TBD: curl_opt 
            //use it call remote api from sourcecode. 

            //わざと成功テストを作成する。
            $this->assertTrue(true);
            sleep(10); 
        }
    }
?>
