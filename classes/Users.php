<?php

    class Users{
        private $conn;
        private $curr_user;

        public function __construct($conn, $user)
        {
            $this->conn = $conn;
            $userRec = mysqli_query($this->conn,"SELECT * FROM users WHERE username = '$user'");
            $this->curr_user = mysqli_fetch_array($userRec);
        }

        public function name(){
            $name = $this->curr_user['first_name'].' '.$this->curr_user['last_name'];
            return $name;
        }

        public function getEmail(){
            $email = $this->curr_user['email'];
            return $email;
        }

        public function username(){
            return $this->curr_user['username'];
        }
    }

?>