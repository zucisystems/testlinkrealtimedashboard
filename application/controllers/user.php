<?php
class User extends CI_Controller {
 
public function __construct() {
 parent::__construct();
 $this -> load -> model('country_model');
 
}
 function Register() {
 $data['countries'] = $this -> country_model -> get_countries();
 $this -> load -> view('country_view', $data);
 }
 
 function get_cities($country){
 $this->load->model('city_model');
 header('Content-Type: application/x-json; charset=utf-8');
 echo(json_encode($this->city_model->get_cities($country)));
}
 
}