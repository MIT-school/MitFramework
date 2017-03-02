<?php 

namespace Mit\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Mit\Models\User;

class UserController extends AbstractController
{
	public function getAll(Request $request, Response $response, $arg)
	{
		$user = new User($this->db);

		$users = $user->find($arg['id']);

		var_dump($users);
	}

	public function add(Request $request, Response $response)
	{
		$user = new User($this->db);
		$data = [
			'name'	=> 'test',
			'email'	=> 'test@gmail.com',
			'password'	=> 'test',
			];

		$user->createData($data);
	}
}