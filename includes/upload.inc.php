<?php
    class Upload extends Database
    {
        public function uploadFile($id, $title)
        {
            $status = true;

            if (empty($title))
            {
                $status = false;
            }

            if ($_FILES["file"]["size"] == 0)
            {
                $status = false;
            }

            if ($status)
            {
                $sql = "INSERT INTO library VALUES (NULL, ".$id.", NULL, '".$title."', '".date("Y-m-d")."')";
                if ($this->connect()->query($sql))
                {
                    $getID = $this->connect()->query("SELECT id FROM library ORDER BY id DESC LIMIT 1")->fetch_array();
                    move_uploaded_file($_FILES["file"]["tmp_name"], "library/".$getID[0].".mp3");
                    header("Location: ../");
                    exit();
                }
            }
            else
            {
                header("Location: ../upload.php");
                exit();
            }
        }
    }
?>