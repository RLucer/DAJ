<?php


class UserSession{

    public function __construct(){
        session_start();
    }

    public function setCurrentUser($user,$userut,$nompermiso,$nom,$apellido){
        $_SESSION['user'] = $user;
        $_SESSION['rut']=$userut;
        $_SESSION['permiso'] = $nompermiso;
        $_SESSION['nom'] = $nom;
        $_SESSION['apellido'] = $apellido;
    }

    public function getCurrentUser(){
        return $_SESSION['user'];
    }
    public function getCurrentPermiso(){
        return $_SESSION['permiso'];
    }
    public function getCurrentRut(){
        return $_SESSION['rut'];
    }
    public function getCurrentNom(){
        return $_SESSION['nom'];
    }
    public function getCurrentApe(){
        return $_SESSION['apellido'];
    }




    public function closeSession(){
        session_unset();
        session_destroy();
    }
}

?>