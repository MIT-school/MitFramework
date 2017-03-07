<?php

$app->get('/hello/{name}', function ($request, $response, $args) {
    $controller = new Shoop\Controllers\HelloController($this);
    return $controller->getHello($request, $response, $args);
});

$app->get('/users/add','Mit\Controllers\UserController:add');
$app->get('/article','Mit\Controllers\ArticleController:index')->setName('article');
$app->get('/article/add','Mit\Controllers\ArticleController:getAdd')->setName('article.add');
$app->post('/article/add','Mit\Controllers\ArticleController:add')->setName('article.add.post');
?>
