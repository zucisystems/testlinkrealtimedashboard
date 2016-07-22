<?php
class Buildfunction extends CI_Model { 
public function __construct() {
 $this -> load -> database(); 
}
function getplan($testroject = null){
 $this->db->select('id,name');
 if($testroject != NULL){
$array = array('parent_id' => $testroject, 'node_type_id' => 5);
$this->db->where($array); 

 //$this->db->where('parent_id', $testroject and 'node_type_id' ='5') ;
 } 
 $query = $this->db->get('nodes_hierarchy');
 $plan = array();
 if($query->result()){
 foreach ($query->result() as $city) {
 $plan[$city->id] = $city->name;
 }
 return $plan;
 }else{
 return FALSE;
 }
}
 
}
?>