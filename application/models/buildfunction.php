<?php
class Buildfunction extends CI_Model { 
public function __construct() {
 $this -> load -> database(); 
}
function getbuild($testplan = null){
 $this->db->select('id,name');
 if($testplan != NULL){
 $this->db->where('testplan_id', $testplan);
 } 
 $query = $this->db->get('builds');
 $build = array();
 if($query->result()){
 foreach ($query->result() as $city) {
 $build[$city->id] = $city->name;
 }
 return $build;
 }else{
 return FALSE;
 }
}
 
}
?>