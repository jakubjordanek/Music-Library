<?php
    class Header
    {
        private $username;

        public function __construct($username)
        {
            $this->username = $username;
        }

        public function showHeader()
        {
            echo 'Hi, <a href="../index.php?search='.$this->username.'" class="link-black">'.$this->username.'</a>! ';
            echo '<a href="/" class="link-black">[ HOME ]</a> ';
            echo '<a href="upload.php" class="link-black">[ UPLOAD ]</a> ';
            echo '<a href="includes/logout.inc.php" class="link-black">[ LOG OUT ]</a>';
            echo '<hr>';
        }
    }
?>