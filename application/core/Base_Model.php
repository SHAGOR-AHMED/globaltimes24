<?php

class Base_Model extends CI_Model{

    public function debug($data){

        echo "<pre>";
        print_r($data);
        exit();
    }

    public function commonInsert($tbl, $data){

        return $this->db->insert($tbl, $data);
    }

}//Base_Model

?>