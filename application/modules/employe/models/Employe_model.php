<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employe_model extends CI_Model{
    public function __construct(){
        parent:: __construct();
        $this->db=$this->load->database('default',true); // no need for now
    }


     # 2. Using Query Builder
    //  e.g., $return_data = $this->db_name->select('*')
    //  ->from('TABLE_NAME')
    //  ->get()
    //  ->result();

    //now execute the query

    function executeEmployeData(){
        $query=$this->db->post('EMPLOYE');
        $return_result=$this->db->query($sql)->result();

        // $return_data=$this->db->select('*')->from('EMPLOYE')->get()->result();
        return $return_result;
    }

    //save data to the table
    function getData(){
        // $this->db->select('EMPLOYENAME','EMPLOYEID','EMPLOYEMAIL')
        $query = $this->db
        ->get('EMPLOYE')
        ->result_array();
        //this method return all record from employe table
        //select all from employe
        return $query;
    }
    function getRowData($id){
        $this->db
        ->select('*')->where('EMPLOYEID',$id);
        $data = $this->db->get('EMPLOYE');
        return $data->row();
    }
    function deleteData($id){
        $this->db->where("EMPLOYEID",$id);
        $this->db->delete("employe");
    }
    function updateData($employename,$employeid,$employemail){
        $getData=$this->db->set('EMPLOYENAME',$employename)
                                ->set('EMPLOYEID',$employeid)
                                ->set('EMPLOYEMAIL',$employemail)
                                // ->set('ID',$next_id)
                                ->where('EMPLOYEID',$employeid)
                                ->update('EMPLOYE');
        
        return true;
    }

    

    function saveData($employename,$employeid,$employemail)
    {
        // $sql = "SELECT NVL(MAX(ID),0) AS MAX FROM EMPLOYE";
        // $max = $this->db->query($sql)->row();
        // $next_id = $max->MAX + 1;

        $getData=$this->db->set('EMPLOYENAME',$employename)
                                ->set('EMPLOYEID',$employeid)
                                ->set('EMPLOYEMAIL',$employemail)
                                // ->set('ID',$next_id)
                                ->insert('EMPLOYE');
        
        //checking
        if($getData){
            return true;
        }else{
            return false;
        }
    }
    
}
?>