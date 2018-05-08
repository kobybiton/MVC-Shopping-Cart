<?php 

class Home extends Controller {

	public function index($name = ''){

		$user = $this->model('User');
		$user->name = $name;
		
		$this->view('home/index',  ['name' => $user->name]);	
	}

	public function store(){

		$_POST = json_decode(file_get_contents('php://input'), true);
		$user_id = '06666';
		$title = $_POST['item']['title'];
		$description = $_POST['item']['description'];
		$image = $_POST['item']['imgSrc'];
		$price = $_POST['item']['price'];
		$this->db = DataBase::getInstance()->connect();		
		$query = "INSERT INTO orders (user_id, title, price, description, image) VALUES ($user_id, '$title', $price, '$description', '$image')";
		$insert = pg_query($query);   			
		
	}

	public function update(){
		$items = [];
		$this->db = DataBase::getInstance()->connect();		
		$query = "SELECT * FROM orders";
		$result = pg_query($this->db, $query);  
		while($item = pg_fetch_assoc($result)){
			array_push($items, $item);
		}
		echo json_encode($items);
	}	


}