<?php

class BudgetController extends Controller{
	public $model;
	public $ExpensesTypes = array();
	public $IncomesTypes = array();
	
	public function __construct(){
		$this->model = new BudgetModel();
		$this->IncomesTypes = $this->model->getTypes(array($_SESSION['id'],0));
		$this->ExpensesTypes = $this->model->getTypes(array($_SESSION['id'],1));
	}

	public function view(){
		return new View('dashboard/index');
	}


	public function addExpenses(array $data){
		$req = $_POST['data'];
		$data = array();
		$data[] = $req['title'];
		$data[] = $req['description'];
		$data[] = $req['amount'];
		$data[] = date('Y-m-d',strtotime($req['date']));
		$data[] = $req['type'];
		$data[] = $_SESSION['id'];
		
		if ($this->model->addExpenses($data)) {
			return true;
		}else{
			echo "bir sorun oluştu";
		}
	}

	function addExpensesType(){
		$data = array(); 
		$data[] = $_POST['data']['title'];
		$data[] = $_POST['data']['type'];
		$data[] = $_POST['data']['owner'];
		if ($this->model->addExpensesType($data)) {
			$this->ExpensesTypes = $this->model->getTypes(array($_SESSION['id'],1));
			return true;
		}else{
			echo "bir sorun oluştu";
		}
	}
	public function addIncomesType(){
		$data = array(); 
		$data[] = $_POST['data']['title'];
		$data[] = $_POST['data']['type'];
		$data[] = $_POST['data']['owner'];
		if ($this->model->addIncomesType($data)) {
			$this->IncomesTypes = $this->model->getTypes(array($_SESSION['id'],0));
			return true;
		}else{
			echo "bir sorun oluştu";
		}
	}

	public function addIncomes(array $data){
		$req = $_POST['data'];
		$data = array();
		$data[] = $req['title'];
		$data[] = $req['description'];
		$data[] = $req['amount'];
		$data[] = date('Y-m-d',strtotime($req['date']));
		$data[] = $req['type'];
		$data[] = $_SESSION['id'];
		
		if ($this->model->addIncomes($data)) {
			return true;
		}else{
			echo "bir sorun oluştu";
		}	
	}

	function findType($type,$data){
		foreach ($data as $key => $value) {
			if ($value['id'] == $type) {
				return $value['title'];
			}
		}
	}

	public function getExpenses(){
		$expenses = $this->model->getExpenses($_SESSION['id']);
		$total = 0;
		foreach ($expenses as $key => $value) {
			$total += $value['amount'];
			$expenses[$key]['type'] = $this->findType($value['type'],$this->ExpensesTypes);
		}
		return new View('dashboard/process',$data = array('html'=>$expenses,'total'=> $total,'table' => 'expenses'));
	}

	public function getIncomes(){
		$incomes = $this->model->getIncomes($_SESSION['id']);
		$total = 0;
		foreach ($incomes as $key => $value) {
			$total += $value['amount'];
			$incomes[$key]['type'] = $this->findType($value['type'],$this->IncomesTypes);
		}
		
		return new View('dashboard/process',$data = array('html'=>$incomes,'total'=>$total,'table' => 'incomes'));
	}

	function getIncomesTypes(){
		$IncomesTypes = $this->model->getTypes(array($_SESSION['id'],0));
		$this->IncomesTypes = $IncomesTypes;
		$_SESSION['gelirTurler'] = $IncomesTypes;
		return new View('dashboard/types',$data = array('html'=>$IncomesTypes));
	}
	function getExpensesTypes(){
		$ExpensesTypes = $this->model->getTypes(array($_SESSION['id'],1));
		$this->ExpensesTypes = $ExpensesTypes;
		$_SESSION['giderTurler'] = $ExpensesTypes;
		return new View('dashboard/types',$data = array('html'=>$ExpensesTypes));
	}
}
?>