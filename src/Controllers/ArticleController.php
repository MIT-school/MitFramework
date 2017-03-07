<?php 

namespace Mit\Controllers;

use Mit\Models\Article;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ArticleController extends AbstractController
{
	public function index(Request $request, Response $response)
	{
		return $this->view->render($response, 'article/index.twig');
	}

	public function getAdd(Request $request, Response $response)
	{
		return $this->view->render($response, 'article/add.twig');
	}

	public function add(Request $request, Response $response)
	{
		$article = new Article($this->db);

		$this->validation->rule('required',['title','content','image']);
		$this->validation->rule('integer','user_id');

		if ($this->validation->validate()) {
			$article->add($request->getParams());
			return $response->withRedirect($this->router->pathFor('article.add'));
		} else {
			$_SESSION['errors'] = $this->validation->errors();
			$_SESSION['old'] = $request->getParams();

			return $response->withRedirect($this->router->pathFor('article.add'));
		}

	}
}