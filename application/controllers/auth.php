<?php
class Auth extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
        $this->load->library('authlib');
        $this->load->helper('url');
        $this->load->database('employees');
    }
 public function index()
{
    //redirect('/auth/login'); // url helper function
}

public function userlogin()
{
    $this->load->view('view_site',array('errmsg' => ''));
}
 
public function register()
{
    $this->load->view('register_view',array('errmsg' => ''));
}
 
public function salary()
{
    $this->load->view('view_employeesalary',array('errmsg' => ''));
}

 public function login()
{
    $data['errmsg'] = '';
    $this->load->view('login_view',$data);
}

public function title()
{

//$this->load->view('view_changetitle');

$this->load->library('form_validation');
   
    $this->form_validation->set_rules('employeeno', 'Employee No', 'required');
    
         if ($this->form_validation->run() == FALSE)


      {

         $this->change_title();
        
      }
      else
      {
     $employeeno=$this->input->post('employeeno');
     $newtitle=$this->input->post('changetitle');
     
   $this->load->model('databasemodels');
   $oldtitle = $this->databasemodels->gettitlebyid($employeeno);
   
    $this->databasemodels->change_title($employeeno, $oldtitle[0]->title, $newtitle);

    echo $msg = '<font color=red>Title has been changed </font><br />';
      $this->change_title();
}
  }


public function change_title(){
  
   $data ['title'] =  "Change Title";
   $this->load->view('view_changetitle',$data);
   
     
     
    }




public function promote()
{
    $this->load->view('view_promote',array('errmsg' => ''));
}
public function demotion()
{
    $this->load->view('view_demotion',array('errmsg' => ''));
}
public function department()
{
    $this->load->view('view_movedepartment',array('errmsg' => ''));
}
 


public function createaccount()
{


     $this->load->library('form_validation');
     
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required'); 
        $this->form_validation->set_rules('gender', 'Gender', 'required');  
       // $this->form_validation->set_rules('gender', 'Gender', 'required'); 
        $this->form_validation->set_rules('DOB', 'D.O.B.', 'required');
        $this->form_validation->set_rules('department', 'Department', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('salary', 'Salary', 'required');
      
      
       if ($this->form_validation->run() == FALSE) 
      {
      $this->add_employee();
      }
      else
      {
       $firstname=$this->input->post('firstname');
       $lastname= $this->input->post('lastname');
       $gender= $this->input->post('gender');
       $DOB= $this->input->post('DOB');
       $department= $this->input->post('department');
       $title= $this->input->post('title');
       $salary= $this->input->post('salary');
       
       
        $this->load->model('databasemodels');
        $this->databasemodels->add_employee($firstname, $lastname, $gender, $DOB, $department, $title, $salary);
        $this->load->view('register_view');
      }
      

    }
    
    public function add_employee(){
    
     $data ['title'] =  "Add Employee";
     $this->load->view('register_view',$data);
     
       
       
    }
    



    public function remove(){

    $data ['title'] =  "Delete Employee";
{
   $this->load->library('form_validation');
     
      $this->form_validation->set_rules('employeeno', 'Employee No', 'required');
      
           if ($this->form_validation->run() == FALSE)
      {
         $this->delete_employee();
      }
      else
      {
       $employeeno=$this->input->post('employeeno');
     $this->load->model('databasemodels');
        $this->databasemodels->delete_employee($employeeno);
            $this->delete_employee();
      echo $msg = '<font color=green>Employee has been deleted</font><br />';
  
      }

 }

}

public function delete_employee(){
    
     $data ['title'] =  "Delete Employee";
    $this->load->view('view_remove',$data);


}





public function authenticate()
{
  // get user input for login 
    $username = $this->security->xss_clean($this->input->post('username'));
    $password = $this->security->xss_clean($this->input->post('password'));
    $user = $this->authlib->login($username,$password);
    
    if ($user !== false) {
        $this->load->view('view_site');
    }
    else {
        $data['errmsg'] = '';
        $this->load->view('login_view',$data);

       echo $msg = '<font color=red>Invalid authentication Details</font><br />';
      
    }
 
}

public function searche()
{
//open search view 
    $data ['title'] =  "find";
    $this->load->view('view_search', $data);
    
}

public function salarychange(){
     
   $this->load->library('form_validation');
   
    $this->form_validation->set_rules('employeeno', 'Employee No', 'required');
    
         if ($this->form_validation->run() == FALSE)
      {
         $this->salary();
      }
      else
      {
     $employeeno=$this->input->post('employeeno');
     $newtitle=$this->input->post('changesalary');
     
   $this->load->model('databasemodels');
   $oldsalary = $this->databasemodels->getsalarybyid($employeeno);
   
    $this->databasemodels->change_salary($employeeno, $oldsalary[0]->salary, $newsalary);
        $this->load->view('changesalary');
    echo $msg = '<font color=red>Salary has now been changed </font><br />';
  }
   
   }

//function for doing employee search 
    function findemp () {
    $this->load->model('databasemodels');
    
    $firstname = $this->input->get('firstname');
    $lastname = $this->input->get('lastname');
    $department = $this->input->get('department');
    $title = $this->input->get('title');
    
    $results= $this->databasemodels->search($firstname,$lastname,$department,$title);
    
    $data['count'] = count($results['rows']);
    $data['results'] = $results['rows']; // inside array
    
    echo json_encode($data);
    
    //$this->load->view('databaseview', $data);
    }



}





