<?php
include 'db.php';

class User extends DB{
    Private $rut;
    private $nombre;
    private $apellido;
    private $username;
    private $inst;
    private $idpermisos;
    private $nompermiso;

    

    public function userExists($user, $pass){
        $md5pass = md5($pass);
        $query = $this->connect()->prepare('SELECT * FROM usuario WHERE idrut = :user AND password = :pass');
        $query->execute(['user' => $user, 'pass' => $md5pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuario join permiso on usuario.permiso_id = permiso.idpermiso   WHERE idrut = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nombre'];
            $this->apellido = $currentUser['apaterno'];
        //    $this->amaterno = $currentUser['amaterno'];
       //     $this->usename = $currentUser['username'];
      //      $this->institu = $currentUser['idinstitucion'];
           $this->idpermisos = $currentUser['idpermiso'];
            $this->id_rut = $currentUser['idrut'];
            $this->nompermiso = $currentUser['permiso'];
            
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getUsername(){

        return $this->username;
    }
    public function getInstitu(){
        return $this->institu;
    }
 
    public function get_IDpermiso(){
        return $this->idpermisos;
    }
    public function get_nompermiso(){
        return $this->nompermiso;
    }
    public function get_Apellido(){
        return $this->apellido;
    }
    
    public function get_rut_usuario(){
        return $this->id_rut;
    }
 

}

?>