<?php
    class Connect{
        public $server;
        public $user;
        public $password;
        public $dbName;

        public function __construct()
        {
            $this->server ="co28d739i4m2sb7j.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
            $this->user ="bcko28xc5f5t50py";
            $this->password ="hlb4tiosv0dzbyu7";
            $this->dbName ="hgqcbynjl3loxw9a";
        }

        //option 1 : use Mysqli
        function connectToMySQL():mysqli{
            $conn_my = new mysqli($this->server,
             $this->user,$this->password,$this->dbName);
             if($conn_my->connect_error){
                die("failed".$conn_my->connect_error);
             }else{
                // echo "Connect!!!";
             }
             return $conn_my;
            }    
            //option 2: Use PDO  
            function  connectToPDO():PDO{
                try{
                    $conn_pdo = new PDO
                    ("mysql:host=$this->server;dbname=$this->dbName",$this->user,$this->password);
                    // echo"connect to PDO";
                }catch(PDOException $e){
                    die("Failed $e");
                }
                return $conn_pdo;
            } 
    }
        //test connect
$c = new Connect();
$c->connectToMySQL();
$c = new Connect();
$c->connectToPDO();
?>