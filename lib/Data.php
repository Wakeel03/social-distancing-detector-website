<?php
    class Data{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }


        //insert tb_data
        public function insertDataTime($camera_id, $timestamp, $total_visitors, $total_violations){

            try{

                $this->db->query("INSERT INTO registered_users (camera_id, timestamp, total_visitors, total_violations) VALUES (:camera_id, :timestamp, :total_visitors, :total_violations)");

                $this->db->bind(":camera_id", $camera_id);
                $this->db->bind(":timestamp", $timestamp);
                $this->db->bind(":total_vistiors", $total_visitors);
                $this->db->bind(":total_violations", $total_violations);
                
                
                $this->db->execute();



            }catch(PDOException $e){
                return $e->getMessage();
            }
        }




    }
?>