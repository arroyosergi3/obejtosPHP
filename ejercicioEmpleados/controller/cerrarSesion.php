<?php
if (isset($_POST['salir'])) {
                session_destroy();
                session_unset();
                setcookie("PHPSESSID", "", time() - 1, "/");
                header("Location:../view/index.php");
                exit();
            }