<?php
    class User{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        // register a user
        public function register($firstname, $lastname, $username, $password, $email, $company_name){
            $encrypted_password = hash('sha256', $password);

            try{

                $this->db->query("INSERT INTO tb_user (firstname, lastname, username, password, email, company_name) VALUES (:firstname, :lastname, :username, :encrypted_password, :email, :company_name)");

                $this->db->bind(":firstname", $firstname);
                $this->db->bind(":lastname", $lastname);
                $this->db->bind(":username", $username);
                $this->db->bind(":encrypted_password", $encrypted_password);
                $this->db->bind(":email", $email);
                $this->db->bind(":company_name", $company_name);
                
                
                $this->db->execute();

                return $username;

            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

       

         //login user
         public function login($username, $password){
            $encrypted_password = hash('sha256', $password);
            try{
                $this->db->query("SELECT * FROM tb_user WHERE username = :username AND password = :encrypted_password");
                $this->db->bind(":username", $username);
                $this->db->bind(":encrypted_password", $encrypted_password);

                $result = $this->db->single();

                if ($result){
                    return $result->username;//check
                }else{
                    return -1;
                }   
            }catch(PDOException $e){
                return $e->getMessage();
            }
            

        }


        //found similar username
        public function foundSimilarUsername($username){
            $this->db->query("SELECT username FROM tb_user WHERE username = :username");
            $this->db->bind(":username", $username);

            $result = $this->db->resultSet();
            if (count($result) > 0){
                return true;
            }

            return false;
        }

        
        

        //update user limits
        public function add_user_level_limit($username, $first_level_limit, $second_level_limit, $third_level_limit, $fourth_level_limit, $fifth_level_limit){

            try{

                $this->db->query("UPDATE tb_user SET first_level_limit = :first_level_limit, second_level_limit= :second_level_limit, third_level_limit =:third_level_limit, fourth_level_limit=:fourth_level_limit, fifth_level_limit= :fifth_level_limit  WHERE username = :username");

                $this->db->bind(":username", $username);
                $this->db->bind(":first_level_limit", $first_level_limit);
                $this->db->bind(":second_level_limit", $second_level_limit);
                $this->db->bind(":third_level_limit", $third_level_limit);
                $this->db->bind(":fourth_level_limit", $fourth_level_limit);
                $this->db->bind(":fifth_level_limit", $fifth_level_limit);

                

                $this->db->execute();

                return 1;
                
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }


        //update user info
        public function updateProfile($username, $firstname, $lastname, $email, $company_name){
            try{

                $this->db->query("UPDATE tb_user SET firstname = :firstname, lastname = :lastname, email = :email, company_name = :company_name WHERE user_name = :username");

                $this->db->bind(":email", $email);
                $this->db->bind(":firstname", $firstname);
                $this->db->bind(":lastname", $lastname);
                $this->db->bind(":username", $username);
                $this->db->bind(":company_name", $company_name);
                

                 $this->db->execute();

                return 1;
                
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }


        //update user change password
        public function updatePassword($username, $newpassword){
            $encrypted_password = hash('sha256', $newpassword);
            try{

                $this->db->query("UPDATE tb_user SET passwors =:password WHERE user_name = :username");

                $this->db->bind(":password", $encrypted_password);
                $this->db->bind(":username", $username);
                

                $this->db->execute();

                return 1;
                
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

       

        

        // Get all Users
        public function getAllUsers(){
            $this->db->query("SELECT * FROM tb_user");

            // Assign result set
            $results = $this->db->resultSet();

            return $results;
        }

        //get row by username
        public function getByUsername($username){
            $this->db->query("SELECT  FROM tb_user WHERE username = :username");

            $this->db->bind(":username", $username);

            $results = $this->db->single();

            return $results->user_id;
        }

        

        // Get all User's names
        public function getAllNames(){
            $this->db->query("SELECT firstname, lastname FROM tb_user");

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