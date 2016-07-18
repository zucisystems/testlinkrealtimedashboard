<?php class reportdashboardfunction extends CI_Model {
function testplan($tpid)
{

$this->db->select('*');
$this->db->where('id', '3');
$q = $this->db->get('testplans');
$data = $q->result_array();

 return $data;
}











}
?>