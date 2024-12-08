<?php

namespace App\Controllers;

use App\Session;

class SessionController
{
    private ?Session $session = null; // Alapértelmezett érték null

    public function __construct()
    {
        session_start();
        $this->auth();
    }

    public function auth(): void
    {
        // Ellenőrizzük, hogy létezik-e a 'user' kulcs
        if (isset($_SESSION["user"])) {
            $this->session = $_SESSION["user"];
        }
    }

    public function create(int $user_id): bool
    {
        // Új session létrehozása
        $_SESSION["user"] = new Session($user_id);
        $this->session = $_SESSION["user"]; // Az aktuális session beállítása

        return true;
    }

    public function destroy(): bool
    {
        // Aktív session törlése
        if (isset($_SESSION["user"])) {
            unset($_SESSION["user"]);
        }
        $this->session = null; // Session null-ra állítása

        return true;
    }

    public static function isAuth(): bool
    {
        // Ellenőrizzük, hogy a felhasználó autentikált-e
        return isset($_SESSION["user"]);
    }

    public function getSession(): ?Session
    {
        // Visszatérünk az aktuális session-nel vagy null-lal
        return $this->session;
    }
}