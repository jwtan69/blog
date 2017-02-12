<?php

/* * ***********************
 *
 * When user want to login, they send info into this page
 *
 * *********************** */

class Vo_login extends CI_Controller {

      public $data = array();

      public function __construct() {
            parent::__construct();
            $this->load->model('User_model');
            $this->load->model('function_model');

            $this->data['init'] = $this->function_model->page_init();
            //This section is all about user logged in information
            //we do it in constructor, so every method will call this once
            //and use in every pages
            $this->data['webpage'] = $this->function_model->get_web_setting();
            $this->data['islogin'] = $this->function_model->isLogin();
            if ($this->data['islogin']) {
                  redirect(base_url($init['langu'].'/vo/profile'));
                  exit;
            }
      }
      

      
      public function index() {

            $this->load->view('vo/header', $this->data);
            $this->load->view("vo/login", $this->data);
            $this->load->view('vo/footer', $this->data);            
            
      }

}

?>