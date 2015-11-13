<?php

include_once 'model/client_dao.php';
include_once 'view/client_view.php';
include_once 'controller/client_controller.php';

//accept GET or POST methods

$args = $_SERVER['REQUEST_METHOD'] == 'POST' ? $_POST : $_GET;

if(isset($args))
{
    $controller = new client_controller(new client_dao(), new client_view(), $args);
    $controller->handle_request();
}

?>
