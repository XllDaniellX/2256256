<?php
class UserController{
    
    public function getVerifyPass( $user, $pass){

        try{

            $objDtoUser = new User();
            $objDtoUser -> setUser($user);
            $objDtoUser -> setPassword($pass);

            $objDaoUser = new UserModel($objDtoUser);

            if (gettype($objDaoUser -> getQueryLogin() -> fetch()) == 'boolean'){

                echo "
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Password error!'
                  })
                </script>                
                ";

            }else{
                $_SESSION['login'] = true;
                header('location: index.php');
            }

        } catch(Exception $e){
            echo "Error on the creation of the controller";
        }
    }
    public function setInsertUser($name, $lastName, $user, $pass){
        try{
            $objDtoUser = new User();
            $objDtoUser -> setName($name);
            $objDtoUser -> setLastName($lastName);
            $objDtoUser -> setUser($user);
            $objDtoUser -> setPassword($pass);

            $objDaoUser = new UserModel($objDtoUser);

            if ($objDaoUser -> mldInsertUsuario()){
                echo "<script>
                Swal.fire(
                    'Guardado',
                    'Registro insertado',
                    'success'
                  )
                </script>";
            }

        } catch(Exception $e){
            echo "Error en el controlador de insercion " . $e->getMessage();
        }

    }// FIN DEL CONTROLADOR DE INSERCION
    public function getSearchAllUser(){
        $respon = false;
        try {
            $objDtoUser = new User();
            $objDaoUser = new UserModel($objDtoUser);
            $respon = $objDaoUser -> mldSearchAllUser()->fetchAll();
        } catch (PDOException $e) {
            echo "Error on the creation of the 
            controller of show all " . $e->getMessage();
        }
        return $respon;
    }//FIN DE MOSTRAR TODOS
    public function eraseUser(){
        try {
            $objDtoUser = new User();
            $objDtoUser -> setCode($_POST['txtCodigo']);
            $objDaoUser = new UserModel($objDtoUser);
            if ( $objDaoUser -> mldEraseUser() == true ) {

                echo "<script>
                        swalWithBootstrapButtons.fire(
                            'Borrado!',
                            'El registro fue borrado.',
                            'success'
                        )
                    </scrip>";

            }

        } catch ( PDOException $e ) {
            echo "Error on the delete of the 
            controller of show all " . $e->getMessage(); 
        }


    }
}// END CLASS

//$objCtr = new UserController();
//$objCtr -> getVerifyPass('abrazo','150');

?>