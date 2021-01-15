<?php
    class Config 
    // Config::$host_ip 
    {
        //phpunit
        static $host_ip = 'http://localhost:4444/wd/hub';

        //database
        static $dbHost = '52.76.211.26';
        static $dbName = 'racebnwdb_test';
        static $dbUser = 'leanh';
        static $dbPass = 'Race!2020';
        static $dbPort = 3306;


        // user account: 
        static $userdept ='12345'; 
        static $userpass ='Race1234';
        static $usermail ='motoki_test@race.co.jp'; 

        // admin account
        static $adminAcc ='raceAdmin_T';
        static $adminPass='12345' ;
 
    };

    class Utilities
    {
        public static function debug_to_console($data) {
            $output = $data;
            if (is_array($output))
                $output = implode(',', $output);
        
            echo " --- Console check content: ---  >>> $output >>>";
        }

    };
    class TableRows extends RecursiveIteratorIterator 
    {
        public function __construct($it) {
          parent::__construct($it, self::LEAVES_ONLY);
        }
      
        public function current() {
          return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
        }
      
        public function beginChildren() {
          echo "<tr>";
        }
      
        public function endChildren() {
          echo "</tr>" . "\n";
        }
    };
?>