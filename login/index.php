<?php
include_once 'includes/user.php';
include_once 'includes/user_session.php';
$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    // "hay sesion";
    $user->setUser($userSession->getCurrentUser());
    //debe ir un if para saber que previlegios tiene
    //el mismo switch para decir donde hay q redirigir
    
    switch ($user->get_IDpermiso()) {
        case 1:
            include_once '../mod_admin/vista/home.php';
            break;
        case 2:
            include_once '../mod_operador/vista/home.php';
            break;
    }

}else if(isset($_POST['username']) && isset($_POST['password'])){
    
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];
    

    $user = new User();
    if($user->userExists($userForm, $passForm)){
       // echo "Existe el usuario";
        $user->setUser($userForm);
        $nompermiso = $user->get_nompermiso();
        $userut = $user->get_rut_usuario();
        $nom=$user->getNombre();
        $apeo=$user->get_Apellido();
        $userSession->setCurrentUser($userForm,$userut,$nompermiso,$nom,$apeo);  //aca va $userForm
        $user->setUser($userForm);

      //  echo $user->getPermiso();
        //anotar si es adminis general enviar al mod_admin

        switch ($user->get_Idpermiso()) {
            case 1:
                include_once '../mod_admin/vista/home.php';
                break;
            case 2:
                include_once '../mod_operador/vista/home.php';
                break;
          }

    }else{
        // "No existe el usuario";
       
      
        $errorLogin = " <h5> Nombre de usuario, password </h5>";
       include_once 'vistas/login.php';
       
    }
}else{
    
    include_once 'vistas/login.php';
  
}
?>