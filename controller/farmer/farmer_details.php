<?php
    require_once('../../settings/config.php');
    require_once('../../settings/database.php');
    Class Farmer{
        private function get_details($user_id){
            $database = new Connection();
            $db = $database->open();

            $sql = $db->prepare("SELECT * FROM user WHERE id = :id");
            $sql->execute(array(':id' => $user_id));
            $farmer = $sql->fetch();
            $database->close();
            
            return $farmer;
        }

        public function getFirstName($user_id){
            $farmer = $this->get_details($user_id);
            return $farmer['first_name'];
        }

        public function getFirstName2($user_id){
            $farmer = $this->get_details($user_id);
            echo $farmer['first_name'];
        }

        public function getLastName($user_id){
            $farmer = $this->get_details($user_id);
            return $farmer['last_name'];
        
        }

        public function getMiddleName($user_id){
            $farmer = $this->get_details($user_id);
            return $farmer['middle_name'];
        }

        public function getSex($user_id){
            $farmer = $this->get_details($user_id);
            return $farmer['sex'] == 1 ? 'Male' : 'Female';
        }

        public function getProgram($user_id){
            $farmer = $this->get_details($user_id);
            return $farmer['farm_type'] == 1 ? 'High Value Crops' : ($farmer['farm_type'] == 2 ? 'Corn Value Crops' : 'Corn Crops');
        }
    }
?>