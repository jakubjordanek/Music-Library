<?php
    class Login extends Database
    {
        public function loginUser($email, $password)
        {
            if (empty($email) || empty($password))
            {
                header("Location: ../index.php");
                exit();
            }
            else
            {
                if ($result = $this->connect()->query("SELECT * FROM users WHERE email='".$email."'"))
                {
                    if ($result->num_rows > 0)
                    {
                        $user = $result->fetch_assoc();

                        if (password_verify($password, $user['password']))
                        {
                            session_start();

                            $_SESSION['logged'] = true;
                            $_SESSION['id'] = $user['id'];
                            $_SESSION['email'] = $user['email'];
                            $_SESSION['username'] = $user['username'];

                            $result->free_result();
                        }
                        else
                        {
                            header("Location: ../index.php");
                            exit();
                        }
                    }
                    else
                    {
                        header("Location: ../index.php");
                        exit();
                    }
                }
            }
        }
    }
?>