<?php

    class DB{

        //properti
        private $host = "127.0.0.1";
        private $user = "root";
        private $password = " ";
        private $database = "dbrestoran";

        //method
        public function __construct()
        {
            echo 'construct';
        }

        public function selectdata()
        {
            echo 'select data';
        }

        public function getDatabase()
        {
            return $this->database;
        }

        public function tampil()
        {
           $this->selectdata();
        }

        public static function insertData()
        {
            echo "static function";
        }

    }

    DB::insertData();

    //$db=new DB;

    // echo '<br>';
    // echo $db->selectdata();
    // echo '<br>';
    // echo $db->host;
    // echo '<br>';
    // echo $db->getDatabase();
    // echo '<br>';
    // echo $db->selectdata();

?>