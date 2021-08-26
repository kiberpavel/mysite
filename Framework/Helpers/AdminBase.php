<?php

namespace Core\Helpers;

use Core\Authentication\Authentication;

class AdminBase
{
    public static function checkAdmin()
    {
        $auth = new Authentication();
        $user = $auth->getUser();
        if (!$auth->isGuest()) {
            $userStatus = $user->getStatus();
            if ($userStatus == 1) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }
}
