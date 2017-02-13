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
	}
	

	public function index()
	{

		$this->load->view('frontend/header',$this->data);
		$this->load->view('frontend/index',$this->data);
		$this->load->view('frontend/footer',$this->data);
	}

	public function category()
	{

		$this->load->view('frontend/header',$this->data);
		$this->load->view('frontend/category',$this->data);
		$this->load->view('frontend/footer',$this->data);
	}

	public function details()
	{

		$this->load->view('frontend/header',$this->data);
		$this->load->view('frontend/details',$this->data);
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


}
