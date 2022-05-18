<?php
    print "done";
    //eraseUser();
        function eraseUser(){
            try {
                
                $objDtoUser = new User();
                $objDtoUser -> setCode($_GET["codigo"]);
                $objDaoUser = new UserModel($objDtoUser);
                if ( $objDtoUser -> mldEraseUser() == true) {
                    echo "<script>
                            Swal.fire(
                                'Borrado!',
                                'El registro ha sido borrado',
                                'success'
                            )
                        </script>";
                }

            } catch ( PDOException $e) {
                echo "Error on the delete of the
                controller of show all" . $e -> getMessage();
            }
        }


?>