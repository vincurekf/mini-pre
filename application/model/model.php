<?php

class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Content model functions
     */
    public function getAllContents()
    {
        $sql = "SELECT id, data_id, value, last_edit FROM content";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * This function accept array of data
     * loops through it and updates new values in database or
     * if there is not an entry wit the specified data_id (pre-id attribute on element)
     * create new entry with specified data
     * 
     * @param  array $update_data
     */
    public function updateContent($update_data)
    {
        foreach ($update_data as $item) {
            // check if entry exists
            $check = "SELECT COUNT(id) AS amount FROM content WHERE data_id = :data_id";
            $query_check = $this->db->prepare($check);
            $parameters_check = array(':data_id' => $item['data_id']);
            $query_check->execute($parameters_check);
            $amount = $query_check->fetch()->amount;
            
            if($amount == '0'){
                $sql = "INSERT INTO content (id, data_id, value) VALUES ('', :data_id, :value)";
                $query = $this->db->prepare($sql);
                $parameters = array(':value' => $item['value'], ':data_id' => $item['data_id']);
                $result = $query->execute($parameters);
                if($result == '0'){
                // useful for debugging: you can see the SQL behind above construction by using:
                    echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);//  exit();
                }
            }else{
                $sql = "UPDATE content SET value = :value WHERE data_id = :data_id";
                $query = $this->db->prepare($sql);
                $parameters = array(':value' => $item['value'], ':data_id' => $item['data_id']);
                $result = $query->execute($parameters);
                if($result == '0'){
                // useful for debugging: you can see the SQL behind above construction by using:
                    echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);//  exit();
                }
            /*
            */
            }
        return $result;
        }
    }
}
