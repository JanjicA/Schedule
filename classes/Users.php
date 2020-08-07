<?php

    class Users {
        
        public $name;
        public $username;
        public $email;
        public $password;

        private $conn;
        private $users;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function create_user() {

            $user_query = "INSERT INTO fww SET name = ?, username = ?, email = ?, password = ?";

            $user_obj = $this->conn->prepare($user_query);

            if($user_obj->execute([ $this->name, $this->email, $this->password])) {
                return true;
            }

            return false;
        }

        public function check_login() {
            $username_query = "SELECT * FROM fww WHERE username =  ?";

            $user_obj = $this->conn->prepare($username_query);

            if($user_obj->execute([$this->username])){

                // $data =  $user_obj->get_result();

               return $data = $user_obj->fetch(PDO::FETCH_ASSOC);
            }

            return array();
        }
    }
?>