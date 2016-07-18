<?php
class Testplanfunction extends CI_Model {
 
public function __construct() {
 $this -> load -> database();
 
}
 
function get_plans() {
 $this -> db -> select('id,name');

 $this->db->where('node_type_id','5');

 $query = $this -> db -> get('nodes_hierarchy');
 
$testplans = array();
 
if ($query -> result()) {
 foreach ($query->result() as $testplan) {
 $testplans[$testplan -> id] = $testplan -> name;
 }
 return $testplans;
 } else {
 return FALSE;
 }
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