<?php
    
    class Database
    {
        private $host;
        private $user;
        private $password;
        private $db_name;
        
        public $conn;
        
        
        function __construct()
        {
            $host = '';
            $user = '';
            $password = '';
            $db_name = '';
            
            include 'info.php';
            
            $this->host = $host;
            $this->user = $user;
            $this->password = $password;
            $this->db_name = $db_name;
            
            $this->connect();
           
        }
        
        
        private function connect()
        {
            //connect to the server
             
            $conn = mysqli_connect($this->host,$this->user,$this->password,$this->db_name);
            
            $this->conn = $conn;
            mysqli_query("SET NAMES 'utf8'");
            mysqli_query('SET CHARACTER SET utf8');
            
            if (!$conn)
            {
                print("connection failed: " . $conn->connect_error);
            }
            
        }
        
        
        public function close()
        {
            mysqli_close($this->conn);
            
        }
        
    }


