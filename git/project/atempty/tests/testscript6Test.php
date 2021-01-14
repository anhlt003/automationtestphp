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

    class testscript6 extends PHPUnit_Auto_FW_TestCase
    {    
        static private $sessionId = NULL;
        public function setSearchApi(){

            $ckfile = tempnam ("/tmp", 'cookiename');
            $url = 'http://bnw.test/users/advisers?relocation_region[]=&relocation_area[]=&relocation_period[]=&qualification_type[]=&qualification[]=&language[]=&language_level[]=&special_field_large=1&special_field_small=';
            $ch = curl_init($url);

            curl_setopt ($ch, CURLOPT_COOKIEJAR, $ckfile);
            curl_setopt ($ch, CURLOPT_COOKIEFILE, $ckfile);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);

            $output = curl_exec ($ch);


        }


        public function test_call_api_curl()
        {
            //TBD
            $this.assertTrue(true);



        }
    }
?>
