<?php

class Vo_upload_handler extends CI_Controller {

      public $data = array();

      public function __construct() {
            parent::__construct();
            $this->load->model('Function_model');	
            $this->data['init'] = $this->Function_model->page_init();

      }      

      public function index() {
          
            $element = $this->input->post('element',true);
            //$this->session->set_userdata('element',$element);
            $picarea = $this->input->post('picarea',true);
            //$this->session->set_userdata('picarea',$picarea);

            $height = $this->input->post('height',true);
            $width = $this->input->post('width',true);

            //default width and height set 300*300
            if($height == ""){
              $height = 300;
            }
            if($width == ""){
              $width = 300;
            }
			
  			     if(isset($_FILES['files1']))
              {
                    if ( $_FILES['files1']['error'] == 0 && $_FILES['files1']['name'] != ''  )
                    {									
                        $pathinfo = pathinfo($_FILES['files1']['name']);
                        $ext = $pathinfo['extension'];
                        $ext = strtolower($ext);

                        $pathname = date("YmdHis")."_".rand(1000,9999);

                        $filename_original = 'pic_'.$pathname.'_ORIGINAL';
                        $uploaddata = $this->Function_model->upload($filename_original,'files1');
  					
                        $filename = 'pic_'.$pathname;
                        $path 	  = "./uploads/".$filename.'.'.$ext;
                        $save_path = base_url()."uploads/".$filename.'.'.$ext;
                        $this->Function_model->img_resize($uploaddata,$width,$height,$path);

                        $thumbfilename = 'pic_'.$pathname.'_thumb';
                        $thumbpath     = "./uploads/".$thumbfilename.'.'.$ext;
                        $thumbsave_path = base_url()."uploads/".$thumbfilename.'.'.$ext;
                        $this->Function_model->img_resize($uploaddata,$width/3,$height/3,$thumbpath);



  					 $filelist = array();
  					  
  					 $filelist['element'] = $element;
  					 $filelist['picarea'] = $picarea;	
  					 $filelist['pu'] = $save_path;
  					 $filelist['filename'] = $filename;
  					 $filelist['upload_url'] = $path;
  					 
  					 $this->data['filelist'] = $filelist;
  					 
  					 
  					 $this->load->view("vo/after_upload", $this->data);
                    }	
              } else {
                    echo "no file has been uploaded";
              }
      }

}
?>