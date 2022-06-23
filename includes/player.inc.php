<?php
    class Player extends Database
    {
        private $id;
        
        public function __construct($id)
        {
            $this->id = $id;
        }

        public function showPlayer()
        {
            echo '<audio src="library/'.$this->id.'.mp3" autoplay></audio>';

            $sql = "SELECT u.id, u.username, l.title FROM library AS l INNER JOIN users AS u ON l.artist_id=u.id WHERE l.id=".$this->id;
            $data = $this->connect()->query($sql)->fetch_array();

            echo '<a href="../profile.php?id='.$data[0].'" class="link-black">'.$data[1].'</a> - '.$data[2].' ';
            echo '<a href="/" class="link-black">[ STOP ]</a>';
            echo '<hr>';
        }
    }
?>