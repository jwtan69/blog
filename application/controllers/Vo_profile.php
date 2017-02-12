<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vo_profile extends CI_Controller {
      
      public $data = array();
      
      public function __construct() {
            parent::__construct();
            $this->load->model('User_model');            		    
            $this->load->model('Function_model');                  

            $this->data['init'] = $this->Function_model->page_init();
            //This section is all about user logged in information
            //we do it in constructor, so every method will call this once
            //and use in every pages
            $this->data['item_per_page'] = $this->Function_model->item_per_page();
            $this->data['webpage'] = $this->Function_model->get_web_setting();
            $this->data['islogin'] = $this->Function_model->isLogin();
            
            
            if ($this->data['islogin']) {
		    
                  $this->data['userdata'] = $this->User_model->getOne(array(
                        'user_id' => $this->data['islogin'],
                  ));              

                  if(!in_array($this->data['userdata']['role_id'], array("-1"))){                        
                        redirect($this->data['init']['langu'].'/profile','refresh');      
                  }
            }else{
                redirect('/','refresh');
            }
             
            $this->data['view_foldername'] = "vo_profile";            

      }
      
      //For listing
      public function index($page=1)
      {
            
            $this->load->view('vo/header', $this->data);
            $this->load->view($this->data['view_foldername']."/index", $this->data);
            $this->load->view('vo/footer', $this->data);
      }
      
  


}

?>
