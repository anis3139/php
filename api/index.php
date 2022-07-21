<?php
require __DIR__ . "/inc/bootstrap.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

require PROJECT_ROOT_PATH . "/Controller/Api/UserController.php";
$objFeedController = new UserController();

if ((isset($uri[1]) && $uri[1] == 'user') && !isset($uri[2])) {
    $parts = parse_url($_SERVER['REQUEST_URI']);
    if (isset($parts['query'])) {
        parse_str($parts['query'], $result);
        if (array_key_exists('id', $result)) {
            $strMethodNameById = $uri[1] . 'ById';
            $objFeedController->{$strMethodNameById}();
        } else {
            $strMethodName = $uri[1] . 'List';
            $objFeedController->{$strMethodName}();
        }
    } else {
        $strMethodName = $uri[1] . 'List';
        $objFeedController->{$strMethodName}();
    }
} elseif ((isset($uri[1]) && $uri[1] == 'user') && isset($uri[2])) {
    $id=intval($uri[2]);
    $strMethodName = $uri[1] . 'Delete';
    $objFeedController->{$strMethodName}($id);
} else {
    header("HTTP/1.1 404 Not Found");
    exit();
}
