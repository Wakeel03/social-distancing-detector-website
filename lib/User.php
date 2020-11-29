<?php
    class User{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function register($firstname, $lastname, $username, $password, $profile_pic=NULL, $nationality=NULL, $about=NULL, $email=NULL, $sex=NULL, $dob=NULL){
            $encrypted_password = hash('sha256', $password);

            try{

                $this->db->query("INSERT INTO registered_users (first_name, last_name, username, password, profile_pic, nationality, about, email, sex, date_of_birth) VALUES (:firstname, :lastname, :username, :encrypted_password, :profile_pic, :nationality, :about, :email, :sex, :dob)");

                $this->db->bind(":firstname", $firstname);
                $this->db->bind(":lastname", $lastname);
                $this->db->bind(":username", $username);
                $this->db->bind(":encrypted_password", $encrypted_password);
                $this->db->bind(":profile_pic", $profile_pic);
                $this->db->bind(":nationality", $nationality);
                $this->db->bind(":about", $about);
                $this->db->bind(":email", $email);
                $this->db->bind(":sex", $sex);
                $this->db->bind(":dob", $dob);
                
                $this->db->execute();

                return $username;

            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function add_user_details($user_id, $nationality=NULL, $email=NULL, $sex=NULL, $dob=NULL, $profile_pic=NULL, $about=NULL){

            try{

                $this->db->query("UPDATE registered_users SET nationality = :nationality, about = :about, email = :email, sex = :sex, date_of_birth = :dob, profile_pic = :profile_pic WHERE user_id = :user_id");

                $this->db->bind(":user_id", $user_id);
                $this->db->bind(":profile_pic", $profile_pic);
                $this->db->bind(":nationality", $nationality);
                $this->db->bind(":about", $about);
                $this->db->bind(":email", $email);
                $this->db->bind(":sex", $sex);
                $this->db->bind(":dob", $dob);

                $result = $this->db->execute();

                return 1;
                
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function updateProfile($user_id, $firstname, $lastname, $username, $nationality, $about, $profile_pic_name, $email, $sex, $dob){
            try{

                $this->db->query("UPDATE registered_users SET first_name = :firstname, last_name= :lastname, username= :username, nationality = :nationality, about = :about, email = :email, sex = :sex, date_of_birth = :dob, profile_pic = :profile_pic WHERE user_id = :user_id");

                $this->db->bind(":user_id", $user_id);
                $this->db->bind(":firstname", $firstname);
                $this->db->bind(":lastname", $lastname);
                $this->db->bind(":username", $username);
                $this->db->bind(":profile_pic", $profile_pic_name);
                $this->db->bind(":nationality", $nationality);
                $this->db->bind(":about", $about);
                $this->db->bind(":email", $email);
                $this->db->bind(":sex", $sex);
                $this->db->bind(":dob", $dob);

                $result = $this->db->execute();

                return 1;
                
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function login($username, $password){
            $encrypted_password = hash('sha256', $password);
            try{
                $this->db->query("SELECT user_id FROM registered_users WHERE username = :username AND password = :encrypted_password");
                $this->db->bind(":username", $username);
                $this->db->bind(":encrypted_password", $encrypted_password);

                $result = $this->db->single();

                if ($result){
                    return $result->user_id;
                }else{
                    return -1;
                }   
            }catch(PDOException $e){
                return $e->getMessage();
            }
            

        }

        public function foundSimilarUsername($username){
            $this->db->query("SELECT username FROM registered_users WHERE username = :username");
            $this->db->bind(":username", $username);

            $result = $this->db->resultSet();
            if (count($result) > 0){
                return true;
            }

            return false;
        }

        // Get all Users
        public function getAllUsers(){
            $this->db->query("SELECT * FROM registered_users");

            // Assign result set
            $results = $this->db->resultSet();

            return $results;
        }

        public function getUserById($user_id){
            $this->db->query("SELECT * FROM registered_users WHERE user_id = :user_id");

            $this->db->bind(":user_id", $user_id);

            $results = $this->db->single();

            return $results;
        }

        public function getUserIdByUsername($username){
            $this->db->query("SELECT * FROM registered_users WHERE username = :username");

            $this->db->bind(":username", $username);

            $results = $this->db->single();

            return $results->user_id;
        }

        public function getPostsByUserId($user_id){
            $this->db->query("SELECT * FROM blog_posts WHERE user_id = :user_id");

            $this->db->bind(":user_id", $user_id);

            $result = $this->db->resultSet();

            return $result;
        }

        // Get all User's names
        public function getAllNames(){
            $this->db->query("SELECT first_name, last_name FROM registered_users");

            // Assign result set
            $results = $this->db->resultSet();

            return $results;
        }
        //Get user's name by user_id
        public function getNameById($user_id){
            $this->db->query("SELECT first_name, last_name FROM registered_users WHERE user_id = :user_id");
            
            $this->db->bind(":user_id", $user_id);
            // Assign result set
            $results = $this->db->single();

            return $results;
        }
    }
?>