<?php 

namespace Mit\Models;

class User extends AbstractModel
{
	protected $table = 'user';

	public function create(array $data)
	{
		$data = [
			'name' => $request->getParam('name'),
			'email' => $request->getParam('email'),
			'password' => $request->getParam('password'),
		];

		$this->createData($data);

		return $data;
	}
}