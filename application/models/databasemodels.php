<?php
class Databasemodels extends CI_Model {
	function __construct() {
		$this->load->database();
		parent::__construct();
	}
 

 
 public function add_employeedepartment($employeeid, $department){
 $fields = array (
		'emp_no' => $employeeid,
		'dept_no' => $department,
		'from_date' => date("Y-m-d"),
		'to_date' => '9999-01-01'
		);
		$this->db->set($fields); 
	
	$this->db->insert('dept_emp');
 }
 
  public function add_employeetitle($employeeid, $title){
  $fields = array (
	'emp_no' => $employeeid,
	'title' => $title,
	'from_date' => date("Y-m-d"),
	'to_date' => '9999-01-01'
		);
		$this->db->set($fields); 
	
	$this->db->insert('titles');
 
 }
  public function add_employeesalary($employeeid, $salary){
  $fields = array (
	'emp_no' => $employeeid,
	'salary' => $salary,
	'from_date' => date("Y-m-d"),
	'to_date' => '9999-01-01'
		);
		$this->db->set($fields); 
	
	$this->db->insert('salaries');
 
 }
 
public function add_employee($firstname, $lastname, $gender, $DOB, $department, $title, $salary){
	
	$fields = array (
		'first_name' => $firstname,
		'last_name' => $lastname,
		'gender' => $gender,
		'birth_date' => $DOB,
		'hire_date' => date("Y-m-d"),
				
					);
	
	
	
	$this->db->set($fields); 
	
	$this->db->insert('employees');

	$employeeid = $this->db->insert_id();
	
	$this->add_employeedepartment($employeeid, $department);
	$this->add_employeesalary($employeeid, $salary);
	$this->add_employeetitle($employeeid, $title);





}


function search ($firstname,$lastname,$department,$title){
 
 // result query
	$query = $this->db->select('employees.first_name AS firstname, employees.last_name AS lastname, titles.title AS jobtitle, departments.dept_name AS dept, departments.dept_no AS deptid')
			->select('IF(`dept_manager`.`emp_no` = `employees`.`emp_no`, 1, 0) AS ismanager', false)
			->from('employees')
			->join('dept_emp', 'dept_emp.emp_no = employees.emp_no')
			->join('departments', 'departments.dept_no = dept_emp.dept_no')
			->join('titles', 'titles.emp_no = employees.emp_no')
			->join('dept_manager', 'dept_manager.emp_no = dept_emp.emp_no','left')
			->where('titles.to_date', '9999-01-01')
			->where('dept_emp.to_date', '9999-01-01');
			if (!empty($firstname)) {
			$this->db->where('employees.first_name', $firstname);
			}
			if (!empty($lastname)) {
			$this->db->where('employees.last_name', $lastname);
			}
			if (!empty($department)) {
			$this->db->where('departments.dept_name', $department);
			}
			if (!empty($title)) {
			$this->db->where('titles.title', $title);
			}
		//count
		$resultquery['rows'] = $query->get()->result();
		//$resultq['num_rows'] = $query->count_all_results();
		return $resultquery;
	
 }



function advancesearch ($firstname,$lastname,$department,$title,$DOB,$Salary,$Gender,$hire_date){
 
 // result query
	$query = $this->db->select('employees.first_name AS firstname, employees.last_name AS lastname, titles.title AS jobtitle, departments.dept_name AS dept, departments.dept_no AS deptid, employees.birth_date AS DOB, salaries.salary AS Salary, employees.gender AS Gender, employees.hire_date AS hire_date')
			->select('IF(`dept_manager`.`emp_no` = `employees`.`emp_no`, 1, 0) AS ismanager', false)
			->from('employees')
			->join('dept_emp', 'dept_emp.emp_no = employees.emp_no')
			->join('departments', 'departments.dept_no = dept_emp.dept_no')
			->join('titles', 'titles.emp_no = employees.emp_no')
			->join('dept_manager', 'dept_manager.emp_no = dept_emp.emp_no','left')
			->where('titles.to_date', '9999-01-01')
			->where('dept_emp.to_date', '9999-01-01')
			->where('employees.hire_date', '9999-01-01');



			if (!empty($firstname)) {
			$this->db->where('employees.first_name', $firstname);
			}
			if (!empty($lastname)) {
			$this->db->where('employees.last_name', $lastname);
			}
			if (!empty($department)) {
			$this->db->where('departments.dept_name', $department);
			}
			if (!empty($title)) {
			$this->db->where('titles.title', $title);
			}
			if (!empty($hire_date)) {
			$this->db->where('employees.hire_date', $hire_date);
			}


		//count
		$resultquery['rows'] = $query->get()->result();
		//$resultq['num_rows'] = $query->count_all_results();
		return $resultquery;
	
 }




public function delete_employee($employeeno){
$tables = array ('employees', 'dept_manager','dept_emp','titles','salaries');
		
		
		$this->db->where('emp_no', $employeeno); 
	
	$this->db->delete($tables);



}


 public function change_title($employeeno,$oldtitle,$newtitle){
	$updatetitle = array ('to_date' => date("Y-m-d"));
	$query = $this->db->where('emp_no', $employeeno)
		->where('title', $oldtitle)
		->update('titles', $updatetitle);
 
 
		$row = array(
			'emp_no' => $employeeno,
			'title' => $newtitle,
			'from_date' => date("Y-m-d"),
			'to_date' => '9999-01-01'
		);
 
		$this->db->set($row)
			->insert('titles');
		
		
}


 public function change_salary($employeeno,$oldsalary,$newsalary){
	$updatesalary = array ('to_date' => date("Y-m-d"));
	$query = $this->db->where('emp_no', $employeeno)
		->where('salaries', $oldsalary)
		->set('salaries', $updatesalary);
 
 
		$row = array(
			'emp_no' => $employeeno,
			'title' => $newsalary,
			'from_date' => date("Y-m-d"),
			'to_date' => '9999-01-01'
		);
 
		$this->db->set($row)
			->insert('salaries');
		
		
}



 public function gettitlebyid($employeeno){
	
 $query = $this->db->select('title')
	->from('titles')
	->where('emp_no',$employeeno)
	->where ('to_date', '9999-01-01')
	->get();
 
return $query->result();
}
 
 
 public function getsalarybyid($employeeno){
	
 $query = $this->db->select('salary')
	->from('salaries')
	->where('emp_no',$employeeno)
	->where ('to_date', '9999-01-01')
	->get();
 
return $query->result();
}
 


}
