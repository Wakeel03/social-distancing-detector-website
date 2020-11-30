<?php
    class Camera{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }


        //add camera ford a particular user
        public function add_user_camera($username, $camera_name){

            try{

                $this->db->query("INSERT INTO tb_cameras(camera_name, username) VALUES (:camera_name, :username)");

                $this->db->bind(":camera_name", $camera_name);
                $this->db->bind(":username", $username);

                 $this->db->execute();

                return 1;
                
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }


        //update camera name
        public function update_camera_name($camera_id, $camera_name){

            try{
                $this->db->query("UPDATE tb_cameras SET camera_name = :camera_name WHERE camera_id = :camera_id");

                $this->db->bind(":camera_name", $camera_name);
                $this->db->bind(":camera_id", $camera_id);

                $this->db->execute();

            }catch(PDOException $e){
                return $e->getMessage();
            }

        
        }

        //get camera 
        public function getCameraByUsername($username){
            try{
                $this->db->query("SELECT * FROM tb_cameras WHERE username = :username");

                $this->db->bind(":username", $username);

                $result = $this->db->resultSet();

                return $result; 
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

        //remove camera
        public function deleteCamera($camera_id){
            try{
                $this->db->query("DELETE FROM tb_cameras WHERE camera_id = :camera_id");

                $this->db->bind(":camera_id", $camera_id);

                 $this->db->execute();
            }catch(PDOException $e){
                return $e->getMessage();
            }

        }


    }
?>