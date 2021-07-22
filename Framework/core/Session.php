<?php

class Session{
    
    public function setName($name): void{
       session_name($name);
    }
    
    public function getName(): string{
        echo session_name();
    }
    
    public function setId($id): void{
        session_id($id);
    }
    
    public function getId(): string{
        echo session_id();
    }
    
    public function cookieExists(): bool{
            if(isset($_COOKIE)){
                return TRUE;
            }else{
                return FALSE;
            }
    }
    
    public function sessionExists(): bool{
        if(isset($_SESSION)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function start(): bool{
        if (session_status()==PHP_SESSION_NONE)
        {
            session_start();
            return TRUE;
        }
    
        return FALSE;
    
    }
    
    public function destroy(): void{
        if (session_status()==PHP_SESSION_NONE)
        {
            session_start();
        }else {
            session_destroy();
        }
    }
    
    public function setSavePath($savePath): void{
        session_save_path($savePath);
    }
    
    public function set($key, $value): void{
        $_SESSION[$key] = $value;
    }
    
    public function get($key){
        if(isset($_SESSION[$key]))
        {
            return $_SESSION[$key];
        }
    }
    
    public function contains($key): bool{
        if(isset($_SESSION[$key]))
        {
            return TRUE;
        }else
        {
            return FALSE;
        }
    }
    
    public function delete($key): void{
        unset($_SESSION[$key]);
    }
    
}