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
		$data[] = $this->types[$req['type']];
		
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
		$data[] = $this->types[$req['type']];
		
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
			$value['type'] = $this->types[$value['type']];
			$total += $value['amount'];
		}
		return new View('dashboard/process',$data = array('html'=>$expenses,'total'=> $total,'table' => 'expenses'));
	}

	public function getIncomes(){
		$incomes = $this->model->getIncomes();
		$total = 0;
		echo "<pre>";
		var_dump($incomes[0]['type']);
		echo "</pre>";
		foreach ($incomes as $key => $value) {
//			echo $incomes[$key]['type'];
//			print_r($key);
//			print_r($value);
			$total += $value['amount'];





			$value['type'] = $this->types[$value['type']];
			var_dump($value['type']);
		}
		return new View('dashboard/process',$data = array('html'=>$incomes,'total'=>$total,'table' => 'incomes'));
	}
}
?>