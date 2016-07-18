<?php
class reportdashboard extends CI_Controller {
 
public function __construct() 
{
 parent::__construct();
 $this -> load -> model('testplanfunction');
 $this->load->helper('url'); 
}
public function index()
{
$data['testplans'] = $this -> testplanfunction ->get_plans();
//$this -> load -> view('data');
$this -> load -> view('project_chart', $data);
}
 function getbuild($testplan)
{	 
 
 //print_r($testplan);exit;
 $this->load->model('buildfunction');
 header('Content-Type: application/x-json; charset=utf-8');
 echo(json_encode($this->buildfunction->getbuild($testplan)));
}
 
}?>