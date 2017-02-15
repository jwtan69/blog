<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	
	public $data = array();
	public function __construct() {
		parent::__construct();
		$this->load->model('Function_model');	
		$this->load->model('Article_model');
		$this->load->model('Category_article_model');		

		$this->data['init'] = $this->Function_model->page_init();
        $this->data['item_per_page'] = $this->Function_model->item_per_page();
        $this->data['webpage'] = $this->Function_model->get_web_setting();

        $this->data['category'] = $this->Category_article_model->get_where(array('is_deleted'=>0));

        $this->data['metaData'] = array(
        	'title' => '',
        	'description' => '',
        	'keywords' => '',
        	'subject' => '',
        	'abstract' => '',
        	'copyright' => '',
        	'og_title' => '',
        	'og_description' => '',
        	'og_image' => '',
        );


        //popular article
        $articleCount= $this->Article_model->record_count(array(), array());
        $randomStart = ($articleCount>=6)?rand(0,$articleCount-6):0;
        $popularArticle = $this->Article_model->fetch(6, $randomStart, array(), array());
        $this->data["popularArticle"] = $popularArticle;


        $this->data["fbSharePageCode"] ='<div style="margin:20px 0px;" class="fb-page" data-href="https://www.facebook.com/Banana866" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Banana866" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Banana866">Banana866</a></blockquote></div>';

	}
	

	public function index()
	{	

		$categoryGroup = $this->Article_model->groupBy('category_id');

		$randNo = 3;
		if(count($categoryGroup)<3){
			$randNo = count($categoryGroup);
		}

		$rand_keys = array_rand($categoryGroup, $randNo);

		foreach($rand_keys as $k => $v){
			$tmpNo = $k+1;
			$tmpVar = "artResult{$tmpNo}";
			$tmpArtId = $categoryGroup[$v];
			$this->data[$tmpVar] = $this->Article_model->fetch($tmpNo, 0,array('category_id'=>$tmpArtId ));
		}

		$this->load->view('frontend/header',$this->data);
		$this->load->view('frontend/index',$this->data);
		$this->load->view('frontend/footer',$this->data);
	}

	public function category($id,$slug,$page=1)
	{

		$this->data['categoryData'] = $this->Category_article_model->getOne(array('Category_article_id'=>$id));
		if(empty($this->data['categoryData'])){
			$this->error();
		}


		//article list
		$this->data['item_per_page'] = 6;
		$this->data['page'] = $page;
        $limit_start = ($page-1)*$this->data['item_per_page'];    

        $sql_where = array();
        $sql_where['category_id'] = $id; 
        $sql_where['is_deleted'] = 0;            

        $sql_like = array();
        
        $this->data["total"] = $this->Article_model->record_count($sql_where, $sql_like);
        
        $results = array();
        $results = $this->Article_model->fetch($this->data['item_per_page'], $limit_start, $sql_where, $sql_like);
        $this->data["results"] = $results;
        

        $url = base_url().$this->data['init']['langu'].'/category/'.$this->data['categoryData']['category_article_id'].'/'.$this->data['categoryData']['title'].'/';

        $this->data['paging'] = $this->Function_model->get_paging_fronted($this->data['item_per_page'],10,$this->data['total'],$page,$url);

		$this->load->view('frontend/header',$this->data);
		$this->load->view('frontend/category',$this->data);
		$this->load->view('frontend/footer',$this->data);
	}

	public function details($id)
	{

		
		//echo $this->db->last_query();exit;
		$this->data['articleData'] = $this->Article_model->getOne(array('Article_id'=>$id));
		if(empty($this->data['articleData'])){
			$this->error();
		}

		$this->data['metaData'] = array(
        	'title' => $this->data['articleData']['article_variable'],
        	'description' => $this->data['articleData']['page_desc'],
        	'keywords' => $this->data['articleData']['page_keyword'],
        	'subject' => $this->data['articleData']['article_variable'],
        	'abstract' => $this->data['articleData']['page_keyword'],
        	'copyright' => '',
        	'og_title' => $this->data['articleData']['article_variable'],
        	'og_description' => $this->data['articleData']['page_desc'],
        	'og_image' => $this->data['articleData']['main_img'],
        );


		//view count
		$this->Article_model->viewCount($id);

		$this->load->view('frontend/header',$this->data);
		$this->load->view('frontend/details',$this->data);
		$this->load->view('frontend/footer',$this->data);


	}


	public function search($q='',$page=1)
	{

		//$this->data['categoryData'] = array();

		//article list
		$this->data['item_per_page'] = 1;
		$this->data['page'] = $page;
        $limit_start = ($page-1)*$this->data['item_per_page'];    

        $sql_where = array();
        $sql_where['is_deleted'] = 0;            

        $sql_like = array();
        $sql_like['article_variable'] = $q; 
        $sql_like['content_cn'] = $q; 
        
        $this->data["total"] = $this->Article_model->record_count($sql_where, $sql_like);
        
        $results = array();
        $results = $this->Article_model->fetch($this->data['item_per_page'], $limit_start, $sql_where, $sql_like);
        $this->data["results"] = $results;
        

        $url = base_url().$this->data['init']['langu'].'/search/'.$q.'/';

        $this->data['paging'] = $this->Function_model->get_paging_fronted($this->data['item_per_page'],10,$this->data['total'],$page,$url);

		$this->load->view('frontend/header',$this->data);
		$this->load->view('frontend/search',$this->data);
		$this->load->view('frontend/footer',$this->data);
	}

	public function error(){

		$articleCount= $this->Article_model->record_count(array(), array());
		$randomStart = ($articleCount>=6)?rand(0,$articleCount-6):0;
        $popularArticle = $this->Article_model->fetch(6, $randomStart, array(), array());
        $this->data["results"] = $popularArticle;

		$this->load->view('frontend/header',$this->data);
		$this->load->view('frontend/error',$this->data);
		$this->load->view('frontend/footer',$this->data);

	}

	public function index2()
	{
		//phpinfo();
		$this->load->view('vo/header', $this->data);
        $this->load->view('vo/footer', $this->data);
	}

	public function crontab(){

		$this->Function_model->insertCrontab(array(
			'created_date' => date('Y-m-d H:i:s'),
		));

	}

	public function toto(){

		//$data = file_get_contents('./assets/toto.csv');

		$csv = array_map('str_getcsv', file('./assets/toto.csv'));

		$totalRow = count($csv)-1;

		$noAppear= array();
		$noTotalValue = array();
		foreach($csv as $k => $v){

			if($k != 0){

				$noAppear[] = $v['2'];
				$noAppear[] = $v['3'];
				$noAppear[] = $v['4'];
				$noAppear[] = $v['5'];
				$noAppear[] = $v['6'];
				$noAppear[] = $v['7'];

				$noTotalValue[] = $v['9'];

			}

		}

		//show no appear count
		$noAppearCount = array_count_values($noAppear);
		arsort($noAppearCount);

		$top = array();
		$middle = array();
		$low = array();
		$counter = 0;
		foreach($noAppearCount as $k => $v){
			$counter++;
			switch($counter){

				case ($counter <= 10):
					$top[] = $k;
					break;
				case ($counter > 10 && $counter <= 53):
					$middle[] = $k;
					break;
				case ($counter > 53):
					$low[] = $k;
					break;
			}

		}

		//print_r($noAppearCount);

		$noList = array();


		
			$noListTotal = 0;
			while(count($noList)<6){

				$noListCount = count($noList);
				switch ($noListCount) {
					case ($noListCount < 2):
						
						$tmpRand = rand(0,9);
						$tmpNo = $top[$tmpRand];

						if(!in_array($tmpNo, $noList)){
							$noList[] = $tmpNo;
							$noListTotal += $tmpNo;
						}

						break;
					
					case ($noListCount >= 2 && $noListCount <= 4):
						
						$tmpRand = rand(0,42);
						$tmpNo = $middle[$tmpRand];

						if(!in_array($tmpNo, $noList)){
							$noList[] = $tmpNo;
							$noListTotal += $tmpNo;
						}


						break;
					case ($noListCount > 4):
						
						$tmpRand = rand(0,9);
						$tmpNo = $low[$tmpRand];

						if(!in_array($tmpNo, $noList)){
							$noList[] = $tmpNo;
							$noListTotal += $tmpNo;
						}

						break;
				}

			}

		if($noListTotal < 140 || $noListTotal > 250){

			echo'<script>location.reload();</script>';

		}

		asort($noList);
		foreach($noList as $k => $v){
			echo 'No:'.$v.' appTime:'.$noAppearCount[$v].'<br>';
		}
		echo $noListTotal;
		//print_r($noList);exit;

		//print_r($low);
		//show no total value 
		//$noTotalValue = array_count_values($noTotalValue);
		//krsort($noTotalValue);
		//print_r($noTotalValue);


		//echo 'Total Row :'.$totalRow.'<br>';

	}

	public function testEmail(){

		//echo phpinfo();

		$this->Function_model->sendMail('jwtan69@gmail.com','jwtan69@gmail.com','subject','content');

	}

}
