	<?php
/**
 * 
 */
class BudgetModel extends Model{

	public function getIncomes(){
		$sql = "SELECT * FROM incomes ORDER BY (date) DESC";
		$cevap = $this->fetchAll($sql);
		return $cevap;
	}

	public function getExpenses(){
		$sql = "SELECT * FROM expenses ORDER BY (date) DESC";
		$cevap = $this->fetchAll($sql);
		return $cevap;
	}

	public function getTYpes($data){
		$sql = "SELECT * FROM types Where id = ?";
		$cevap = $this->query($sql,$data);
		return $cevap;
	}

	public function addExpenses($data){
		$sql = "INSERT INTO expenses SET title = ?, description = ?, amount = ?, date = ?, type = ?";
		if ($this->query($sql,$data)) {
			return true;
		}else{
			echo "model addExpenses function error";
			return false;
		}
	}
	public function addIncomes($data){
		$sql = "INSERT INTO incomes SET title = ?, description = ?, amount = ?, date = ?, type = ?";
		if ($this->query($sql,$data)) {
			return true;
		}else{
			echo "model addIncomes function error";
			return false;
		}
	}

	public function addIncomesType($data){
		$sql = "INSERT INTO types SET title = ?, type = ?, owner = ?";
		if ($this->query($sql,$data)) {
			return true;
		}else{
			echo "model addIncomesType function error";
			return false;
		}
	}

	public function addExpensesType($data){
		$sql = "INSERT INTO types SET title = ?, type = ?, owner = ?";
		if ($this->query($sql,$data)) {
			return true;
		}else{
			echo "model addExpensesType function error";
			return false;
		}
	}
}
?>