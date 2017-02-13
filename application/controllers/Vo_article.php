<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vo_article extends MY_Controller {
      
      public $data = array(
        'display_name' => "Article",
        'pathname' => "article",
        'view_foldername' => "vo_article",
        'id_column' => "article_id",
        'model_name' => "Article_model",
        'search_columns' => array(
              "article_variable" => "title",
            )
      );


      public function submit()
      {         
          $mode = isset($_POST['mode'])?$_POST['mode']:'';
          $id = isset($_POST['id'])?$_POST['id']:'';

          /*
          $photos = $this->input->post("photo", true);
          $tmp_photo = array();
          if(!empty($photos)) {
            foreach($photos as $v) {
              if(!empty($v)) {
                $tmp_photo[] = array(
                  'img' => $v,
                );
              }
            }
          }
          */

          $array = array(
             'category_id'  => $this->input->post("category_id", true),   
             'article_variable'  => $this->input->post("article_variable", true),   
             'author'  => $this->input->post("author", true),  
             'main_img'  => $this->input->post("main_img", true),  
             'fb_img'  => $this->input->post("fb_img", true),  
             'page_title'  => $this->input->post("page_title", true),  
             'page_keyword'  => $this->input->post("page_keyword", true),  
             'page_desc'  => $this->input->post("page_desc", true),  
             'content_cn'  => $this->input->post("content_cn", false),  

          );          
          
          if($mode == 'Add'){
              $array['created_date'] = date("Y-m-d H:i:s");
              $this->{$this->data['model_name']}->insert($array);
          }else{
              $array['modified_date'] = date("Y-m-d H:i:s");
              $this->{$this->data['model_name']}->update(array(
                $this->data['id_column'] => $id,
              ),$array);
          }                 
          
          redirect(base_url($this->data['init']['langu'].'/vo/'.$this->data['pathname'].'/list'), 'refresh');
          
      }

}

?>