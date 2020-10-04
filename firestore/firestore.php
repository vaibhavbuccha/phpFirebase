<?php

/*
	@https://github.com/arthimann/firebase-php/blob/master/Firestore.php
	#myapp-247610
*/

require_once "vendor/autoload.php";
use Google\Cloud\Firestore\FirestoreClient;


class firestore{

	protected $db;
	protected $name;

	public function __construct(string $collection)
	{
		$this->db = new FirestoreClient([
			'projectId' => 'myapp-247610'
		]);
		$this->name = $collection;
	}


#                           "view record of database"
#----------------------------------------------------------------------------------
	public function getDocument(string $name)
	{
		try {
            if (empty($name)) throw new Exception('Document name missing');
            if ($this->db->collection($this->name)->document($name)->snapshot()->exists()) {
                return $this->db->collection($this->name)->document($name)->snapshot()->data();
            } else {
                throw new Exception('Document are not exists');
            }
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
	}

#                           "insert record in firebase database"
#----------------------------------------------------------------------------------
	public function insert(string $name,array $data)
	{
		$docRef = $this->db->collection($this->name)->document($name);
		$docRef->set($data);
		printf('Added data to the aturing document in the users collection.' . PHP_EOL);

	}

#                           "delete record from firebase database"
#----------------------------------------------------------------------------------

	public function dropDocument(string $name)
    {
    	try {
            if (empty($name)) throw new Exception('Document name missing');
            if ($this->db->collection($this->name)->document($name)->snapshot()->exists()) {
        		return $this->db->collection($this->name)->document($name)->delete();
        		} else {
                throw new Exception('Document are not exists');
            }
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }


}
