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
		$this->load->model('DeviceToken_model');	

		$this->data['init'] = $this->Function_model->page_init();
        $this->data['item_per_page'] = $this->Function_model->item_per_page();
        $this->data['webpage'] = $this->Function_model->get_web_setting();

        $this->data['category'] = $this->Category_article_model->get_where(array('is_deleted'=>0));

        $this->data['metaData'] = array(
        	'title' => 'Banana866',
        	'description' => 'Banana866',
        	'keywords' => 'Banana866',
        	'subject' => 'Banana866',
        	'abstract' => 'Banana866',
        	'copyright' => 'Banana866',
        	'og_title' => '',
        	'og_description' => '',
        	'og_image' => base_url('assets/images/bananabanner.jpg'),
        );


        //popular article
        $articleCount= $this->Article_model->record_count(array('is_deleted'=>0), array());
        $randomStart = ($articleCount>=6)?rand(0,$articleCount-6):0;
        $popularArticle = $this->Article_model->fetch(6, $randomStart, array('is_deleted'=>0), array());
        $this->data["popularArticle"] = $popularArticle;


        $this->data["fbSharePageCode"] ='<div style="margin:20px 0px;" class="fb-page" data-href="https://www.facebook.com/Banana866" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Banana866" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Banana866">Banana866</a></blockquote></div>';

	}

	public function apitest(){

		$data = array(
			'send_to_all' => 1,
			//'tokens' => 'esGGOogvzUI:APA91bFb6D4EfaOi5Wh-_OaRF0AbAm8rjbyCpRxoDuoXsTh5-Qr1NfV9NasfxyDYj3KTPjB8ks_-vvEvh-C3vS-2GpyhCuI3FSywKZ6Gp743A2BF7T5vbym3dHzhKpySqR5puenbVk_D',
			"profile" => "jw_app_dev",
			"notification" => array(
				'message' => 'Hello api test send all',
			),
	    );
      
		$content = json_encode($data);



		$curl = curl_init();
		$token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiJlYThmNjE5Yi0zNTljLTQ4MzgtYTdiMy1jOWQ3ZTYzNzE4NWYifQ.R5evZp6-cozGoVd6wcE-dOKHnSTjulLynkjwGCGo_fY";

		curl_setopt_array($curl, array(
		  CURLOPT_SSL_VERIFYPEER => false,
		  CURLOPT_URL => "https://api.ionic.io/push/notifications",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $content,
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Bearer $token",
		    "Content-Type: application/json"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  $res = json_decode($response,true);
		  print_r($res);
		}

	}

	public function upload(){

		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
		
		//$target_path = "uploads/";
		 
		//$target_path = $target_path . basename( $_FILES['file']['name']);
		 

		////////////////////////
		if(isset($_FILES['file'])){

			if ($_FILES['file']['name'] != ''){

				$pathinfo = pathinfo($_FILES['file']['name']);
                $ext = $pathinfo['extension'];
                $ext = strtolower($ext);

                $pathname = date("YmdHis")."_".rand(1000,9999);

                $filename_original = 'pic_'.$pathname.'_ORIGINAL';
                $uploaddata = $this->Function_model->upload($filename_original,'file');
				           
                //resize
                $filename = 'pic_'.$pathname;
                $path 	  = "./uploads/".$filename.'.'.$ext;
                $save_path = base_url()."uploads/".$filename.'.'.$ext;
                $this->Function_model->img_resize($uploaddata,300,300,$path);

                //刪除原本的圖片
                unlink("./uploads/".$filename_original.'.'.$ext);

                $status = "Upload and move success";

			}else{

				$status = "There was an error uploading the file, please try again!";

			}				

	    }else{

	    	$status = "There was an error uploading the file, please try again!";

	    }




		////////////////////////



		/*

		$status = '';
		if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {

		    //echo "Upload and move success";
			$status = "Upload and move success";

		} else {
			//echo $target_path;
		    //echo "There was an error uploading the file, please try again!";
		    $status = "There was an error uploading the file, please try again!";
		}

		*/

		
		$json = array(
			'status' => $status,
			'imgUrl' => $save_path,
			'postData' => json_encode($_FILES),
			'reqData' => json_encode($_REQUEST),
		);

		echo json_encode($json);exit;
		

	}

	public function uploadImgs(){


		header('Content-Type: application/json; charset=utf-8');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

		if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
            $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));

            /*
			$postdata = file_get_contents("php://input");
			if (isset($postdata)) {
	 			$postdata2 = json_decode($postdata);
	 		}else{
	 			$postdata2 = 'none';
	 		}
	 		*/

	 		foreach($_POST['token'] as $v){

	 			$output_file = "register_".date("YmdHis").rand(1000,9999).".jpg";                                 
                $this->base64_to_jpeg($v,"./uploads/".$output_file);

	 		}


	 		$postdata2 = $this->input->post("token", true);

	 		//$data = $_REQUEST;

			$json = array(
				'token'=>json_encode($_POST),
			);

			$this->DeviceToken_model->insert($json);

			$respone = array('status'=>'ok');

 		}else{

 			$respone = array('status'=>'fail');
 		}

		
		echo json_encode($respone);

		exit;



	}

	public function base64_to_jpeg($base64_string, $output_file) {
        $ifp = fopen($output_file, "wb"); 
        
        if(strpos($base64_string,",") !== false) {
            $data = explode(',', $base64_string);           
            fwrite($ifp, base64_decode($data[1])); 
        } else {
            fwrite($ifp, base64_decode($base64_string));    
        }
        fclose($ifp); 
    
        return $output_file; 
    }


	public function apiUploadCheck(){

		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');

		  $scan = scandir('uploads');

		  $status = '';
		  $apiArray = array();


		  if(!empty($scan)){

		  	foreach($scan as $file){

			    if (!is_dir($file))
			    {

			    	$apiArray[] = array(
			    		'name' => $file,
			    		'imgUrl' => base_url().'uploads/'.$file,
			    	);

			    }
			  
			  }

			  $status = 'success';

		  }else{

		  		$status = 'fail';

		  }


		  $json = array(
		  	'status' => $status,
		  	'respone' => $apiArray,
		  );

		  echo json_encode($json);exit;
		  

	}

	public function uploadCheck(){

		$this->load->view('frontend/uploadCheck',$this->data);

	}

	public function saveToken(){

		header('Content-Type: application/json; charset=utf-8');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

		if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
            $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));

            /*
			$postdata = file_get_contents("php://input");
			if (isset($postdata)) {
	 			$postdata2 = json_decode($postdata);
	 		}else{
	 			$postdata2 = 'none';
	 		}
	 		*/

	 		$postdata2 = $this->input->post("token", true);

	 		//$data = $_REQUEST;

			$json = array(
				'token'=>json_encode($_POST),
			);

			$this->DeviceToken_model->insert($json);

			$respone = array('status'=>'ok');

 		}else{

 			$respone = array('status'=>'fail');
 		}

		
		echo json_encode($respone);

		exit;

	}

	

	public function phpinfo(){

		echo phpinfo();
	}

	public function index()
	{	

		$categoryGroup = $this->Article_model->groupBy('category_id');

		$randNo = 3;
		if(count($categoryGroup)<3){
			$randNo = count($categoryGroup);
		}

		if($randNo!=0){
			$rand_keys = array_rand($categoryGroup, $randNo);
		}else{
			$rand_keys = array();
		}

		//print_r($rand_keys);exit;
		//echo $randNo;exit;

		if(is_array($rand_keys)){
			foreach($rand_keys as $k => $v){
				$tmpNo = $k+1;
				$tmpVar = "artResult{$tmpNo}";
				$tmpArtId = $categoryGroup[$v];
				$this->data[$tmpVar] = $this->Article_model->fetch($tmpNo, 0,array('category_id'=>$tmpArtId ));
			}
		}else{

			$tmpNo = 1;
			$tmpVar = "artResult{$tmpNo}";
			$tmpArtId = $categoryGroup[$rand_keys];
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
		$csv = array_map('str_getcsv', file('./assets/Toto663.txt'));
		array_walk($csv, function(&$a) use ($csv) {
      		$a = array_combine($csv[0], $a);
    	});
    	array_shift($csv); # remove column header

    	//print_r($csv);exit;

		$totalRow = count($csv)-1;

		$noAppear= array();
		$noTotalValue = array();
		foreach($csv as $k => $v){

			//if($k != 0){

				$noAppear[] = $v['DrawnNo1'];
				$noAppear[] = $v['DrawnNo2'];
				$noAppear[] = $v['DrawnNo3'];
				$noAppear[] = $v['DrawnNo4'];
				$noAppear[] = $v['DrawnNo5'];
				$noAppear[] = $v['DrawnNo6'];

				//$noTotalValue[] = $v['9'];

			//}

		}

		

		//show no appear count
		$noAppearCount = array_count_values($noAppear);
		arsort($noAppearCount);

		$maxApp = max($noAppearCount);
		$minApp = min($noAppearCount);

		$avgApp = ($maxApp+$minApp)/2; 

		$top = array();
		$low = array();
		$counter = 0;
		foreach($noAppearCount as $k => $v){
			$counter++;
			switch($counter){

				case ($v >= $avgApp):
					$top[] = $k;
					break;
				case ($v < $avgApp):
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
					case ($noListCount <= 4):
						
						$tmpRand = rand(0,count($top)-1);
						$tmpNo = $top[$tmpRand];

						if(!in_array($tmpNo, $noList)){
							$noList[] = $tmpNo;
							$noListTotal += $tmpNo;
						}

						break;
					
					case ($noListCount > 4):
						
						$tmpRand = rand(0,count($low)-1);
						$tmpNo = $low[$tmpRand];

						if(!in_array($tmpNo, $noList)){
							$noList[] = $tmpNo;
							$noListTotal += $tmpNo;
						}

						break;
				}

			}

		if($noListTotal < 160 || $noListTotal > 250){

			echo'<script>location.reload();</script>';

		}

		asort($noList);
		foreach($noList as $k => $v){
			echo 'Draw No : '.$v.' Appear Count : '.$noAppearCount[$v].'<br>';
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

	//angular js
	public function angularJS(){

		$this->load->view('frontend/angularJS',$this->data);

	}

	public function todoJson(){

		$json = '[{ "action": "Buy Flowers", "done": false },
		 { "action": "Get Shoes", "done": false },
		 { "action": "Collect Tickets", "done": true },
		 { "action": "Call Joe", "done": false }]';


 		$this->output->set_content_type('application/json')->set_output($json);
 		//echo $json;

	}
}
