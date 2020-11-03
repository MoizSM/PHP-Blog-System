<?php 
    // class UserBlogs{
    //     private $conn;
    //     private $user;
    //     public function __construct($conn, $user){
    //         $this->conn = $conn;
    //     }
    // }

    class AllBlogs{
        private $conn;

        public function __construct($conn)
        {   
            $this->conn = $conn;
        }

        public function displayPosts(){
            $query = "SELECT title, body, first_name, last_name, username, blogs.date_created FROM blogs INNER JOIN users ON users.id = userId";
            $res = mysqli_query($this->conn, $query);
            $rec = mysqli_fetch_all($res, MYSQLI_ASSOC);
            return $rec;
        }
    }
?>