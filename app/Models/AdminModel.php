<?php
namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class AdminModel extends Model
{

	protected $table = "user";
	protected $primaryKey = "Email";
	protected $allowedFields = 
	[
		'Username','Password','FullName','Token', 'LastLogin', 'CreatedDate','CreatedBy','EditedDate','EditedBy'
	];
	public function __construct(ConnectionInterface &$db)
	{
		$this->db =& $db;
	}

	public function getDataUser($parameter)
	{
		$builder = $this->table($this->table);
		$builder->where('Username=', $parameter);
		$builder->orWhere('Email=', $parameter);
		$query = $builder->get();
		return $query->getRowArray();
	}

	public function updateDataUser($data)
	{
		$builder = $this->table($this->table);
		if($builder->save($data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	

	function saverecords_user($data)
	{
		return $this->db
					->table('user')
					->insert($data);
					return true;
	}


	function retrive_list_user()
	{
		return $this->db
					->table('user')
					->get()
					->getResult();
	}

	function getCategory($id)
	{
		return $this->db
			 ->table('category')
			 ->where('IdCategory', $id)
			 ->get()
			 ->getResult();
			 
	}

	function getDataUserEdit($id)
	{
		$builder = $this->table($this->table);
        $builder->where('IdUser', $id);
        $query = $builder->get();
        return $query->getRowArray();
	}
	
	// $builder = $this->table($this->table);
	// 	if($builder->save($data))
	// 	{
	// 		return true;
	// 	}
	// 	else
	// 	{
	// 		return false;
	// 	}

	function deleteCategory($CategoryId)
	{
	

	}

	function retrive_list_user_count_user()
	{
		return $this->db
					->table('user')
					->countAllResults();
	}

}
?>