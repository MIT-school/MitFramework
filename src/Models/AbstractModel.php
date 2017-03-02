<?php 

namespace Mit\Models;

abstract class AbstractModel
{

	protected $table;
	protected $db;
	// protected $column;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function getAll()
	{
		$this->db->select('*')->from($this->table);

		$query = $this->db->execute();

		return $query->fetchAll();
	}

	public function find($id)
	{
		$this->db->select('*')->from($this->table)
				  ->where('id', $id);
		$query = $this->db->execute();

		return $query->fetch();

	}

	public function createData(array $data, $id)
	{

		$valuesColumn = [];
		$valuesData = [];

		foreach ($data as $dataKey => $dataValue) {
			$valuesColumn[$dataKey] = ':'.$dataKey;
			$valuesData[$dataKey] = $dataValue;
		}
		var_dump($valuesColumn);
		$this->db->insert($this->table)
				->values($valuesColumn)
				->setParameters($valuesData);
		 		->execute();
		
	}
}
