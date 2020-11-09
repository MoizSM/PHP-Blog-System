<?php 
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

        public function displaySingleUserPosts($uname){
<<<<<<< HEAD
<<<<<<< HEAD
            $query = "SELECT blogs.id, title, body, first_name, last_name, username, blogs.date_created, displayType FROM blogs INNER JOIN users ON users.id = userId WHERE username = '$uname' AND displayType = 1";
=======
            $query = "SELECT blogs.id, title, body, first_name, last_name, username, blogs.date_created FROM blogs INNER JOIN users ON users.id = userId WHERE username = '$uname'";
>>>>>>> parent of 14a91ac (Added display type functionality to blogs)
=======
            $query = "SELECT blogs.id, title, body, first_name, last_name, username, blogs.date_created, displayType FROM blogs INNER JOIN users ON users.id = userId WHERE username = '$uname' AND displayType = 1";
>>>>>>> d8ab328096714dc6bd80db114e0246ad08b81e62
            $res = mysqli_query($this->conn, $query);
            if(!$res){
              echo mysqli_error($this->conn);
            }
            $rec = mysqli_fetch_all($res, MYSQLI_ASSOC);
            return $rec;
        }

        public function deleteBlogs($deleteID){
            $query = "DELETE FROM blogs WHERE id = $deleteID";
            $rec = mysqli_query($this->conn, $query);
            if(!$rec){
                echo mysqli_error($this->conn);
                return;
            }

            return 'THE BLOG HAS BEEN DELETED';
        }
    }
?>