<?php
// https://www.youtube.com/watch?v=X51KOJKrofU
declare(strict_types=1);
include "credentials.php";

spl_autoload_register(function ($class) {
    require __DIR__ . "/src/$class.php";
});

set_error_handler("ErrorHandler::handleError");
set_exception_handler("ErrorHandler::handleException");
header("Content-type: application/json; charset=UTF-8");


$api_name = "products";
$parts = explode("/", $_SERVER["REQUEST_URI"]);

if ($parts[1] != $api_name) {
    http_response_code(404);
    exit;
}

$id = $parts[2] ?? null;
$database = new Database($server, $schema, $user, $pass);
$gateway = new ProductGateway($database);
$controller = new ProductController($gateway);
$controller->processRequest($_SERVER["REQUEST_METHOD"], $id);