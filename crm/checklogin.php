<?php
function check_login()
{
    if (empty($_SESSION['login'])) {
        $requestUri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
        if ($requestUri !== '' && strpos($requestUri, '//') === false) {
            $_SESSION['redirect_url'] = $requestUri;
        }

        $_SESSION['login'] = '';
        header('Location: login.php');
        exit();
    }
}
?>