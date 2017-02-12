<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Vo extends CI_Controller {
	
	public $data = array();
	
	public function __construct() {
            parent::__construct();
            $this->load->model('User_model');
            $this->load->model('Function_model');
            
            $this->data['init'] = $this->Function_model->page_init();

            $this->data['webpage'] = $this->Function_model->get_web_setting();
            $this->data['islogin'] = $this->Function_model->isLogin();
            //如果使用者是登入狀態，直接帶去後台的首頁
            if ($this->data['islogin']) {                  

                  $this->data['userdata'] = $this->User_model->getOne(array(
                        'user_id' => $this->data['islogin'],
                    ));

                  if(in_array($this->data['userdata']['role_id'], array("-1"))){
                        redirect($this->data['init']['langu'].'/vo/profile','refresh');      
                  } else {
                        redirect('/','refresh');      
                  }

                  
            } else {
                  redirect($this->data['init']['langu'].'/vo/login','refresh');   
            }
      }

      public function index(){
            
      }
		
}