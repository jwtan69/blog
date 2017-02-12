<?php
class Article_model extends MY_Model {
      
      protected $table_name = "article";

      public function getContent($article_variable, $lang) {
      	$article = $this->getOne(array(
      		'article_variable' => $article_variable,
      	));
      	return $article['content_'.$lang];
      }
      
}
?>