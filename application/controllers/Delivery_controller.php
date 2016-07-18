<?php 

class Delivery_controller extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('delivery_model');

    }
    public function index()
    {

        $data['title']= 'Warehouse - Delivery';
        $data['groups'] = $this->delivery_model->getAllGroups();
       
        $this->load->view('delivery_view', $data);
        

    }


}
?>