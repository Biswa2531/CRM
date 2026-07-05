<?php
function check_login()
{
    if (empty($_SESSION['id'])) {
        $requestUri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
        if ($requestUri !== '' && strpos($requestUri, '//') === false) {
            $_SESSION['admin_redirect_url'] = $requestUri;
        }

        $_SESSION['alogin'] = '';
        header('Location: index.php');
        exit();
    }
}
?>