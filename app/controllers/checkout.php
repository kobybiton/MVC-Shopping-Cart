<?php 

class Checkout extends Controller {

	public function index($name = ''){

		$items = [];
		$user = $this->model('User');
		$user->name = $name;

		$this->db = DataBase::getInstance()->connect();		
		$query = "SELECT * FROM orders";
		$result = pg_query($this->db, $query);  
		while($item = pg_fetch_assoc($result)){
			array_push($items, $item);
		}

		$this->view('checkout/index',  ['items' => $items]);	
	}

	public function delete($id){

		$this->db = DataBase::getInstance()->connect();		
		$query = "DELETE FROM orders WHERE id = $id";
		$result = pg_query($this->db, $query);		
	}

	public function reset(){
		
		$this->db = DataBase::getInstance()->connect();		
		$query = "TRUNCATE orders RESTART IDENTITY";
		$result = pg_query($this->db, $query);			
	}

}