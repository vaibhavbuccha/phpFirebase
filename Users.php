<?php

require_once "./vendor/autoload.php";

// echo "hello world";
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;


class Users{

	public function __construct()
	{
		$database;
		$dbname = 'users';
		$acc = ServiceAccount::fromJsonFile(__DIR__.'/secret/myapp-247610-a8191d2f6d8d.json');
		$firebase = (new Factory)
	    ->withServiceAccount($acc)
	    // The following line is optional if the project id in your credentials file
	    // is identical to the subdomain of your Firebase project. If you need it,
	    // make sure to replace the URL with the URL of your project.
	    // ->withDatabaseUri('https://myapp-247610.firebaseio.com/')
	    ->create();
	    $this->database = $firebase->getDatabase();
	}

	public function get(int $userId = NULL)
	{ 
		if(empty($userId) || !isset($userId)){ return false; }

		if($this->database->getReference($this->dbname)->getSnapshot()->hasChild($userId)){
			return $this->database->getReference($this->dbname)->getChild($userId)->getValue();
		}
		else{
			return false;
		}
	}

	public function insert(array $data)
	{
		if(empty($data) || !isset($data)){ return false; }

		foreach ($data as $key => $value) {
			$this->database->getReference()->getChild($key)->getChild($key)->set($value);
		}
		return true;
	}

	public function delete(int $userId)
	{
		if(empty($userId) || !isset($userId)){ return false; }

		if($this->database->getReference($this->dbname)->getSnapshot()->hasChild($userId)){
			$this->database->getReference($this->dbname)->getChild($userId)->remove();
			return true;
		}else{
			return false;
		}
	}
}

$users = new Users();

// var_dump($users->insert([
// 	'1'=>'john',
// 	'2'=>'doe',
// 	'3'=>'smith'
// ]));

var_dump($users->get(2));

// var_dump($users->delete(2));
?>