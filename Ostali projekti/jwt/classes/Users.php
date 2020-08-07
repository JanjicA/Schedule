<?php

    class Users {
        
        public $name;
        public $email;
        public $password;

        private $conn;
        private $users;

        public function __construct($db) {
            $this->conn = $db;
            $this->users = "tbl_users";
        }

        public function create_user() {

            $user_query = "INSERT INTO tbl_users SET name = ?, email = ?, password = ?";

            $user_obj = $this->conn->prepare($user_query);

            if($user_obj->execute([ $this->name, $this->email, $this->password])) {
                return true;
            }

            return false;
        }

        public function check_login() {
            $email_query = "SELECT * FROM tbl_users WHERE email =  ?";

            $user_obj = $this->conn->prepare($email_query);

            if($user_obj->execute([$this->email])){

                // $data =  $user_obj->get_result();

               return $data = $user_obj->fetch(PDO::FETCH_ASSOC);
            }

            return array();
        }
    }
?>