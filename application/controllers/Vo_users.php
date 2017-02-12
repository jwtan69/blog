<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vo_users extends CI_Controller {
      
      public $data = array();
      
      public function __construct() {
            parent::__construct();
            $this->load->model('User_model');
            $this->load->model('Function_model');    
            $this->load->model('Role_model');     
            
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
                        redirect($init['langu']."/profile",'refresh');      
                  }

            }else{
                redirect('/','refresh');
            }

            $this->data['rolelist'] = $this->Role_model->getOptions();     


      }
      
      public function index($role_id="ALL", $keywords="ALL", $page=1)
      {
		                  

            $where_sql = array(
              'is_deleted' => 0,
              );
            $where_like = array();

            if($role_id!='ALL') {
              $where_sql['role_id'] = $role_id;
            }

            if($keywords!='ALL') {
              $where_like['email'] = $keywords;
            }
            $this->data['role_id'] = $role_id;
            $this->data['keywords'] = $keywords=='ALL'?'':$keywords;
        
            
            //page
            $this->data['page'] = $page;
            $limit_start = ($page-1)*$this->data['item_per_page'];
            
            $userdata = $this->data['userdata'];

            
            
            $this->data["total"] = $this->User_model->record_count($where_sql, $where_like);
            
            $results = array();
            $results = $this->User_model->fetch($this->data['item_per_page'], $limit_start,$where_sql, $where_like);
            $this->data["results"] = $results;
            
            $url = base_url().$this->data['init']['langu'].'/vo/users/list/'.$role_id.'/'.$keywords.'/';
            $this->data['paging'] = $this->Function_model->get_paging($this->data['item_per_page'],10,$this->data['total'],$page,$url);
            
            $this->load->view('vo/header', $this->data);
            $this->load->view("vo_users/list", $this->data);
            $this->load->view('vo/footer', $this->data);
      }
      
      public function add()
      {
		  
          $this->data['rolelist'] = $this->Role_model->getOptions();		      
		  
          $this->data['mode'] = 'Add';
          
             
          $this->load->view('vo/header', $this->data);
          $this->load->view("vo_users/add", $this->data);
          $this->load->view('vo/footer', $this->data);
      }
      
      public function edit($user_id)
      {

          $this->data['rolelist'] = $this->Role_model->getOptions();		      
		  
          $this->data['mode'] = 'Edit';          
          
          $this->data['results'] = $this->User_model->getOne(array(
            'user_id'=>$user_id,
          ));
           
          
          $this->load->view('vo/header', $this->data);
          $this->load->view("vo_users/add", $this->data);
          $this->load->view('vo/footer', $this->data);
      }      

      public function submit()
      {
          $mode = isset($_POST['mode'])?$_POST['mode']:'';
          $id = isset($_POST['id'])?$_POST['id']:'';
                    
          
          $array = array(             
		  	     'role_id'	=> $this->input->post("role_id", true),			               
             'email'           => isset($_POST['email'])?$_POST['email']:'',
             'mobile'          => isset($_POST['mobile'])?$_POST['mobile']:'',                          
             'gender'          => isset($_POST['gender'])?$_POST['gender']:'',
             'name'            => $this->input->post("name", true),    
             'avatar'          => $this->input->post("avatar", true),              
             
          );

          if(isset($_POST['password']) && 
            !empty($_POST['password']) &&
            $_POST['password'] == $_POST['repassword']
            ) {

            $array['password'] = $this->User_model->generateHash($_POST['password']);

          }
          
          $array['activated'] = isset($_POST['activated'])?1:0;

          
          

          
          if($mode == 'Add'){
              $this->User_model->insert($array);
              redirect(base_url($this->data['init']['langu'].'/vo/users/list'), 'refresh');
          }else{

              $userdata = $this->User_model->getOne(array(
                'user_id' => $id,
              ));
              if($userdata['role_id'] == 0 && !empty($userdata['become'])) {
                  $array['become'] = NULL;
              }


              $this->User_model->update(array('user_id'=>$id),$array);
              $lastpage = $this->session->userdata("lastpage");
              if(!empty($lastpage)) {
                  redirect(base_url($lastpage), 'refresh');
              } else {
                  redirect(base_url($this->data['init']['langu'].'/vo/users/list'), 'refresh');
              }

          }		  		  		  
          
          

          
      }      
      
      public function check_email($id)
      {
          $registeredEmail = array();
          $userdata = $this->User_model->getOne(array('user_id'=>$id));
          if(!empty($userdata)) {
            $registeredEmail[] = $userdata['email'];
          }

          $requestedEmail = isset($_REQUEST['email'])?$_REQUEST['email']:'';

          if( in_array($requestedEmail, $registeredEmail) ){
                echo 'false';
          }
          else{
                echo 'true';
          }
      }

      public function check_display_name($id)
      {
      
          $userdata = $this->User_model->getOne(array('name'=>$_REQUEST['name']));
      
          if( !empty($userdata)) {
                echo 'false';
          }
          else{
                echo 'true';
          }
      }
      
      public function delete($id)
      {
          $this->User_model->delete($id);
          redirect(base_url($this->data['init']['langu'].'/vo/users/list'), 'refresh');
      }

      public function usd_account($user_id){


        $this->data['user_details'] = $this->User_model->getOne(array(
          'user_id' => $user_id,
        )); 

        $log = $this->User_usd_account_model->get_where(array(
          'user_id' => $user_id,
          'is_deleted' => 0,
        ),"created_date", "ASC");

        $this->data['log'] = $log;

        $this->data['user_id'] = $user_id;


        $this->load->view('vo/header', $this->data);
          $this->load->view("vo_users/usd_account", $this->data);
          $this->load->view('vo/footer', $this->data);




      }


      public function silver_account($user_id){


        $this->data['user_details'] = $this->User_model->getOne(array(
          'user_id' => $user_id,
        )); 

        $log = $this->User_silver_account_model->get_where(array(
          'user_id' => $user_id,
          'is_deleted' => 0,
        ),"created_date", "ASC");

        $this->data['log'] = $log;

        $this->data['user_id'] = $user_id;


        $this->load->view('vo/header', $this->data);
          $this->load->view("vo_users/silver_account", $this->data);
          $this->load->view('vo/footer', $this->data);




      }
      


      


}

?>
