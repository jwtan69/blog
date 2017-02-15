<?php
class Article_model extends MY_Model {
      
      protected $table_name = "article";

      public function getContent($article_variable, $lang) {
      	$article = $this->getOne(array(
      		'article_variable' => $article_variable,
      	));
      	return $article['content_'.$lang];
      }
      
      public function viewCount($id){

      	$this->db->set('view_count', '(view_count+1)', FALSE);
      	$this->db->where('Article_id', $id);
		$this->db->update($this->table_name);

		return array();

      }

      public function groupBy($groupBy){

            $this->db->select($groupBy);
            $this->db->group_by($groupBy); 
            $query = $this->db->get($this->table_name);
            $row = $query->result_array();

            $data = array();
            if(!empty($row)){

                  foreach($row as $k => $v){
                        $data[] = $v['category_id'];
                  }

            }

            return $data;

      }

}
?>