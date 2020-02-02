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
			echo "model addExpenses function error";
			return false;
		}
	}
}
?>