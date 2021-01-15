<?php
    // strict_typesの制限
    declare(strict_types=1);   
    
    // コントラクト関数を呼ぶ
    require_once ('./tests/configExecute.php');
    require_once ('./vendor/autoload.php');
    require_once ("config.php");
    
    // SELENIUMの使用API 
    use PHPUnit\Framework\TestCase;
    use Facebook\WebDriver\Chrome\ChromeOptions;
    use Facebook\WebDriver\Chrome\ChromeDriver;
    use Facebook\WebDriver\Firefox\FirefoxDriver;
    use Facebook\WebDriver\Firefox\FirefoxProfile;
    use Facebook\WebDriver\Remote\DesiredCapabilities;
    use Facebook\WebDriver\Remote\RemoteWebDriver;
    use Facebook\WebDriver\WebDriverBy;
    use Facebook\WebDriver\WebDriverSelect;
    use Facebook\WebDriver\Actions;
    use Facebook\WebDriver\WebDriverMouse;
    use Facebook\WebDriver\Internal\WebDriverLocatable;

    // use StringBuilder;
    // Call search count with parameter. 
    // Compare count result. 
    class testscript5 extends PHPUnit_Auto_FW_TestCase
    {
        private $webDriverMouse;
        private $search_result;
        public function BNW_Login()
        {
            $this->webDriver->get("http://bnw.test/login");
            $this->webDriver->manage()->window()->maximize();
            sleep(1);    

            // set - get element.
            $p_item_1 = Config::$userdept; 
            $p_item_2 = Config::$usermail;
            $p_item_3 = Config::$userpass;
            
            $element1 = $this->webDriver->findElement(WebDriverBy::id("company_id"));
            $element2 = $this->webDriver->findElement(WebDriverBy::id("email"));
            $element3 = $this->webDriver->findElement(WebDriverBy::id("password"));
            // push text
            if($element1) {
                $element1->sendKeys($p_item_1);
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
            $element4 = $this->webDriver->findElement(WebDriverBy::id("btn-login"));
            $element4->click();
            sleep(1);     

            // unfold group search condition
            $element5 = $this->webDriver->findElement(WebDriverBy::xpath('//*[@id="containerSearchSection"]/div[1]/div/button'));
            $element5->click();
            sleep(1);

            // unfold profile search condition
            $element6 = $this->webDriver->findElement(WebDriverBy::xpath('//*[@id="profileSearchSection"]/div[1]/div/button'));
            $element6->click();
            sleep(1);

            // search lang condition 1
            $lang_cond_1 = $this->webDriver->findElement(WebDriverBy::xpath('//*[@id="profileSearchSection"]/div[2]/div[3]/div[1]/div/div[1]/div/div/div/div[1]/div'));
            $lang_cond_1->click();
            sleep(1);
            $menu_lang_1 = $this->webDriver->findElement(
                    // TBD: In IE or when chrome restart it will generate select id with different value.
                    WebDriverBy::cssSelector('#react-select-8-option-2')) 
                    ->click();
            sleep(1);
            
            // search level condition 1. //
            $level_cond_1 = $this->webDriver->findElement(
                    WebDriverBy::cssSelector('#profileSearchSection > div.card-body > div:nth-child(3) > div:nth-child(1) > div > div:nth-child(2) > div > div > div > div > div.css-1hb7zxy-IndicatorsContainer > div'));
            $level_cond_1->click();
            sleep(1);
            $menu_lang_level_1 = $this->webDriver->findElement(
                    // TBD: In IE or when chrome restart it will generate select id with different value.
                    WebDriverBy::cssSelector('#react-select-5-option-0'))
                    ->click();
            sleep(1);


            // add more condition
            $element7 = $this->webDriver->findElement(WebDriverBy::xpath('//*[@id="profileSearchSection"]/div[2]/div[3]/div[1]/div/div[2]/div/div/button'));
            $element7->click();
            sleep(1);

            // search lang condition 2
            $lang_cond_2 = $this->webDriver->findElement(
                    WebDriverBy::cssSelector('#profileSearchSection > div.card-body > div:nth-child(3) > div:nth-child(1) > div > div:nth-child(3) > div > div > div > div.css-1hb7zxy-IndicatorsContainer > div'));
            $lang_cond_2->click();
            sleep(1);
            $menu_lang_2 = $this->webDriver->findElement(
                    // TBD: In IE or when chrome restart it will generate select id with different value.
                    WebDriverBy::cssSelector('#react-select-15-option-3')) 
                    ->click();
            sleep(1);
          
            // search level condition 2. 
            $level_cond_2 = $this->webDriver->findElement(
                    WebDriverBy::cssSelector('#profileSearchSection > div.card-body > div:nth-child(3) > div:nth-child(1) > div > div:nth-child(4) > div > div > div > div > div.css-1hb7zxy-IndicatorsContainer > div'));
            $level_cond_2->click();
            sleep(1);
            $menu_lang_level_2 = $this->webDriver->findElement(
                    // TBD: In IE or when chrome restart it will generate select id with different value.
                    WebDriverBy::cssSelector('#react-select-16-option-3')) 
                    ->click();
            sleep(1);

            // click search
            $element10 = $this->webDriver->findElement(WebDriverBy::xpath('//*[@id="adviserSearchForm"]/div[1]/div[2]/div/button'));
            $element10->click();
            sleep(1);

            $this->search_result = $this->webDriver->findElement(WebDriverBy::xpath('//*[@id="root"]/div[2]/div[1]/section/div/div/div/div[1]/div/div[3]/div/b'));
            
            // send javascript call.
            $this->webDriver->executeScript("window.scrollBy(0,1000)");
            // $this->webDriver->executeAsyncScript("window.scrollBy(0,500)");

            //$scroll_bar = $this->webDriver->findElement(WebDriverBy::)
            // $this->search_result->getLocationOnScreenOnceScrolledIntoView(); 
            sleep(2);
            //TODO: Scroll screen to view search result.
            //print "{$this->result->getText()}";
            
        }

        public function test_run_all_insert_search_languages()
        {
            $dbHost = Config::$dbHost;
            $dbName = Config::$dbName;
            $dbUser = Config::$dbUser;
            $dbPass = Config::$dbPass;

            $LOOPCOUNT = 100; 
            $DUPCOUNT  = 1; 

            // SET @LANG_CODE = 1; -- 1150 records OK
            // SET @LANG_CODE = 2; -- 1130 records OK
            
            // SET @LANG_CODE1 = 3; -- 324 records OK. 
            // SET @LANG_LEVEL_CODE1 = 1 ;
            
            // SET @LANG_CODE2 = 4; -- 1096 records OK. 	
            // SET @LANG_LEVEL_CODE2 = 4 ;

            try
            {
                // -- ------------------------------
                $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser,$dbPass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "PDO connection successed!";

                // -- ---------------------------------
                // Auto generate languages data. 
                try{
                    $sql_gen_data_lang = 'CALL generate_data_languages(?,?)';
                    $stmt = $conn->prepare($sql_gen_data_lang);

                    $stmt-> bindParam(1,$LOOPCOUNT,PDO::PARAM_INPUT_OUTPUT);
                    $stmt-> bindParam(2,$DUPCOUNT ,PDO::PARAM_INPUT_OUTPUT);

                    // Utilities::debug_to_console($stmt->queryString);
                    // print "{$stmt->queryString}";
                    $stmt->execute();                     
                }
                catch(PDOException $e){
                    print($e->getText());

                }
                // print "  1: {$loop_count} 2: {$dup_count}\n";
                // -- -------------------------------------
                
                $sql_test_search_lang = 
                '   select distinct result.id 
                    from 
                    (
                    select 
                            adv.id,
                            lang.language_code,
                            lang_lev.language_ranking
                        from advisers as adv
                        left join languages as lang 
                            on adv.id = lang.adviser_id
                        left join mst_languages as m_lang
                            on lang.language_code = m_lang.language_code
                        left join mst_languages_level as lang_lev
                            on lang.language_level_code = lang_lev.language_level_code
                        where 
                        (lang.language_code = 3
                        and lang_lev.language_level_code <= 1)
                        or 
                        (lang.language_code = 4
                        and lang_lev.language_level_code <= 4)
                    ) result
                    order by result.id asc ;
                ';

                // $sql_test_search_lang = new StringBuilder();
                // $sql_test_search_lang.append(
                //                             '   select distinct result.id 
                //                                 from 
                //                                 (
                //                                 select 
                //                                         adv.id,
                //                                         lang.language_code,
                //                                         lang_lev.language_ranking
                //                                     from advisers as adv
                //                                     left join languages as lang 
                //                                         on adv.id = lang.adviser_id
                //                                     left join mst_languages as m_lang
                //                                         on lang.language_code = m_lang.language_code
                //                                     left join mst_languages_level as lang_lev
                //                                         on lang.language_level_code = lang_lev.language_level_code
                //                                     where 
                //                                     (lang.language_code = 3
                //                                     and lang_lev.language_level_code <= 1)
                //                                     or 
                //                                     (lang.language_code = 4
                //                                     and lang_lev.language_level_code <= 4)
                //                                 ) result
                //                                 order by result.id asc ;
                //                             '
                //                         );

                $stmt =$conn->prepare($sql_test_search_lang);
                $stmt->execute();
                // print($stmt->rowCount());

                // fetch result;
                // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                // foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                //   echo $v;
                // }

                // close connection and quit mode
                $conn=null;
                
                // call login from webdriver;
                $this->BNW_Login();                

                // execute PHPUNIT
                $expected = (int) filter_var($this->search_result->getText(), FILTER_SANITIZE_NUMBER_INT);  
                print('Search item count is: '.$expected);
                $this->assertEquals($stmt->rowCount() ,$expected);

                $this->webDriver->takeScreenshot("tests/evidence/testscript5Test.png");
                sleep(5);
            }
            catch(PDOException $e){
                echo "PDO connection failed: ", $e->getMessage();
            }
        }
    }
?>
