<?php 
    // require_once('config.php');
    // require_once('database.php');

    Class Process {
        private $return_value = 'true';

        public function insert_data($database, $table_name, $array_data){
            $db = $database->open();
            // try {
            //     $data_keys = array_keys($array_data);
            //     $fields = implode(', ', $data_keys);

            //     $array_values = [];
            //     foreach($data_keys as $key => $value){
            //         $array_values[$key] = ':'.$value;
            //     }

            //     $values = implode(', ', $array_values);
            //     $sql = $db->prepare("INSERT INTO $table_name (". $fields  .") VALUES (". $values .")");

            //     // Bind
            //     foreach($array_data as $key => $value){
            //         $sql->bindParam($array_values[$key], $value[$key]);
            //     }
            //     $return_value = 'true';
            //     ($sql->execute()) ? $return_value = 'true' : $return_value = 'Something went wrong. Cannot save record.';

            // } catch (PDOException $e) {
            //     $return_value = $e->getMessage();
            //     return $return_value;
            // }

            $database->close();
            return $return_value;
        }
    }
?>