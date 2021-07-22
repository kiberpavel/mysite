<?php

class Authentication{
    
    public $login;
    public $auth;
    
    public function __construct()
    {
        $this->logOut();
    }
    
    public function isAuth(): bool{
            if ($this->auth){
                return TRUE;
            }else{
                return FALSE;
            }
    }
    
    public function auth($login, $pass): bool{
        if (isset($login) && isset($pass)){
            $this->login = $login;
            $this->auth = true;
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function getLogin(): string{
        if(isset($this->login)){
            return $this->login;
        }else{
            return FALSE;
        }
    }
    
    public function logOut(): void{
            $this->auth =false;
            $this->login = '';
    }
}
