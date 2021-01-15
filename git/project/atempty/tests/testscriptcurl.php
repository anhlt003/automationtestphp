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

    class testcurl extends PHPUnit_Auto_FW_TestCase
    {
        public function test_login_admin()
        {
            // // create curl resource
            // $ch = curl_init();

            // // set url
            // curl_setopt($ch, CURLOPT_URL, "example.com");
            

            // //return the transfer as a string
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            // // $output contains the output string
            // $output = curl_exec($ch);

            // // close curl resource to free up system resources
            // curl_close($ch);  


            // $ch = curl_init();
            // curl_setopt($ch, CURLOPT_URL, 'https://w3path.com');
            // // curl_setopt($ch, CURLOPT_HEADER, false);
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            // $body = curl_exec($ch);
            // sleep(10);
            // // $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            // curl_close($ch);
            
            // echo 'Status code: ', $httpCode;
            // echo "<br />";
            // echo "<br />";
            // echo 'Body content:';
            // echo "<br />";
            // print_r($body);   

            // From URL to get webpage contents. 
            $url = "https://tutorialspoint.dev/slugresolver/"; 
            
            // Initialize a CURL session. 
            $ch = curl_init();  
            
            // Return Page contents. 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            
            //grab URL and pass it to the variable. 
            curl_setopt($ch, CURLOPT_URL, $url); 
            
            $result = curl_exec($ch); 
            
            echo $result; 
        }
    }
?>
