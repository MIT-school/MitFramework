<?php

$app->get('/hello/{name}', function ($request, $response, $args) {
    $controller = new Shoop\Controllers\HelloController($this);
    return $controller->getHello($request, $response, $args);
});

?>
