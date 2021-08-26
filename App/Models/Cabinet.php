<?php

namespace Models;

class Cabinet
{
    public function update($id): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $password =  md5($_POST['password']) ?? 0;
            User::updatePassword($password, $id);
        }
    }
}
