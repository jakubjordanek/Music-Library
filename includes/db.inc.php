<?php
    class Database
    {
        private $host;
        private $db_user;
        private $db_password;
        private $db_name;

        protected function connect()
        {
            $this->host = "localhost";
            $this->db_user = "root";
            $this->db_password = "";
            $this->db_name = "music";

            $connect = new mysqli($this->host, $this->db_user, $this->db_password, $this->db_name);
            $connect->set_charset("utf8");
            return $connect;
        }
    }
?>