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
        public function test_login_user()
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
            $element4 = $this->webDriver->findElement(WebDriverBy::id("btn-login"));
            $element4->click();
            sleep(1); 
            //TBD
            $this.assertEquals(true);
        }

        public function test_login_admin()
        {
            // TBD.
            $this.assertEquals(true);
        }
    }
?>
