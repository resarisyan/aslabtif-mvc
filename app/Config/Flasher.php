<?php

class Flasher
{
    public static function setFlash($message, $action, $type)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['flash'] = [
            'message' => htmlspecialchars($message),
            'action' => htmlspecialchars($action),
            'type' => htmlspecialchars($type)
        ];
    }

    public static function flash()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show" role="alert">
            <strong>' . $_SESSION['flash']['message'] . '</strong> ' . $_SESSION['flash']['action'] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            unset($_SESSION['flash']);
        }
    }
}
