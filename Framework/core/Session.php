<?php

namespace Core;

class Session
{
    public function setName($name): void
    {
        session_name($name);
    }

    public function getName(): string
    {
        return session_name();
    }

    public function setId($id): void
    {
        session_id($id);
    }

    public function getId(): string
    {
        return session_id();
    }

    public function cookieExists(): bool
    {
        if (isset($_COOKIE)) {
            return true;
        } else {
            return false;
        }
    }

    public function sessionExists(): bool
    {
        if (isset($_SESSION)) {
            return true;
        } else {
            return false;
        }
    }

    public function start(): bool
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            return true;
        }

        return false;
    }

    public function destroy(): void
    {
        if (session_status() == PHP_SESSION_NONE) {
            header("Location: /login");
        } else {
            session_destroy();
        }
    }

    public function setSavePath($savePath): void
    {
        session_save_path($savePath);
    }

    public function set($key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    }

    public function contains($key): bool
    {
        if (isset($_SESSION[$key])) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($key): void
    {
        unset($_SESSION[$key]);
    }
}
