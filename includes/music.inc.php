<?php
    class Music extends Database
    {
        public function showMusic($sql)
        {
            $query = $this->connect()->query($sql);
            $i = 1;
            if ($query->num_rows > 0)
            {
                while($data = $query->fetch_array())
                {
                    echo '<p>'.$i.'. <a href="index.php?search='.$data[8].'" class="link-black">'.$data[8]. '</a> - '.$data[3].' ';
                    echo '<a href="../index.php?play='.$data[0].'" class="link-black">[ PLAY ]</a></p>';
                    $i += 1;
                }
            }
            else
            {
                echo 'NO RESULTS';
            }
        }
    }
?>