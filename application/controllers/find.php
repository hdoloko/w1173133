<?php
class Find extends CI_Controller {
	
    function __construct()
    {
        parent::__construct();
      
        //$this->load->helper('url');
     
    }
	function index() {
	$data ['title'] =  "search";
	
	$this->load->view('view_search', $data);
	}
	
    function advancesearch() {
	$data ['title'] =  "fullsearch";
	
	$this->load->view('advance_search', $data);
	}
	
	public function searche()
{
//open search view 
    $data ['title'] =  "find";
    $this->load->view('view_search', $data);
    
}


	function findemp () {
	$this->load->model('databasemodels');
	
	$firstname = $this->input->get('firstname');
	$lastname = $this->input->get('lastname');
	$department = $this->input->get('department');
	$title = $this->input->get('title');
	
	$results= $this->databasemodels->search($firstname,$lastname,$department,$title);
	
	$data['count'] = count($results['rows']);
	$data['results'] = $results['rows']; 
	
	echo json_encode($data);
	
	
	}


		function findempadvance () {


	$this->load->model('databasemodels');
	
	$firstname = $this->input->get('firstname');
	$lastname = $this->input->get('lastname');
	$department = $this->input->get('department');
	$title = $this->input->get('title');
	$DOB = $this->input->get('birth_date');
	$Salary = $this->input->get('salary');
	$Gender = $this->input->get('gender');
	$hire_date = $this->input->get('hire_date');

	
	$results= $this->databasemodels->advancesearch($firstname,$lastname,$department,$title,$DOB,$Salary,$Gender,$hire_date);
	
	$data['count'] = count($results['rows']);
	$data['results'] = $results['rows']; 
	
	echo json_encode($data);
	
	
	}

}



