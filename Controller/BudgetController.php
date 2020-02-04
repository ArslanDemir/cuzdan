<?php

class BudgetController extends Controller{
	public $model;
	
	public function __construct(){
		$this->model = new BudgetModel(); 
	}

	public function view(){
		return new View('dashboard/index');
	}

	public $types = array(
		1 => 'Alışveriş',
		2 => 'Otogaz',
		3 => 'Fatura',
		4 => 'Maaş'
	);
	public function addExpenses(array $data){
		$req = $_POST['data'];
		$data = array();
		$data[] = $req['title'];
		$data[] = $req['description'];
		$data[] = $req['amount'];
		$data[] = date('Y-m-d',strtotime($req['date']));
		$data[] = $req['type'];
		
		if ($this->model->addExpenses($data)) {
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
		
		if ($this->model->addIncomes($data)) {
			return true;
		}else{
			echo "bir sorun oluştu";
		}	
	}

	public function getExpenses(){
		$expenses = $this->model->getExpenses();
		$total = 0;
		foreach ($expenses as $key => $value) {
			$total += $value['amount'];
			$expenses[$key]['type'] = $this->types[$value['type']];
		}
		return new View('dashboard/process',$data = array('html'=>$expenses,'total'=> $total,'table' => 'expenses'));
	}

	public function getIncomes(){
		$incomes = $this->model->getIncomes();
		$total = 0;
		foreach ($incomes as $key => $value) {
			$total += $value['amount'];
			$incomes[$key]['type'] = $this->types[$value['type']];
		}
		
		return new View('dashboard/process',$data = array('html'=>$incomes,'total'=>$total,'table' => 'incomes'));
	}
}
?>