<?php
    class Database
    {
        private $host = 'localhost';
        private $username = 'root';
        private $password = '';
        private $database = 'parkingsystem_ponte';

        protected $connection;

        function connect()
        {
            try {
                $this->connection = new PDO(
                    "mysql:host=$this->host;dbname=$this->database",
                    $this->username,
                    $this->password
                );
            } catch (PDOException $e) {
                echo 'scriptConnection error' . $e->getMessage();
            }
            return $this->connection;
        }
    }
?>
