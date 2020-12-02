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

        public function getRecord($username, $date, $cam){
            try{
                $this->db->query("SELECT hour, sum(total_violations) as tot_vio FROM tb_data where camera_id = :cam and date = :current_date group by hour");
                $this->db->bind(":current_date", $date);
                $this->db->bind(":cam", $cam);

                return $this->db->resultSet();

            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

    }
?>