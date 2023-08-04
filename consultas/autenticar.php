<?php
session_start();
include "conexion.php";

$conn=conectarse();

//  SI SE CONECTO Y SI SE ENVIARON AMBOS DATOS SE PROCEDE CON LA CONSULTA DE EXISTENCIA DEL USUARIO EVITANDO INYECCIONES SQL ?
if ($stmt = $conn->prepare('SELECT iduser, correo,pass,idrol,nombre FROM usuarios WHERE correo = ?'))
 {
  $stmt->bind_param('s', $_POST['username']);
  $stmt->execute();
  $stmt->store_result();
     
     // SI EL USUARIO EXISTE EN LA TABLA SE EXTRAE Y SE APUNTA SU DNI Y SU CLAVE
     if ($stmt->num_rows > 0)
      {
    $stmt->bind_result($dni,$user, $clave,$permisos,$nombre);
    $stmt->fetch();

      // AHORA VERIFICA SI LA CLAVE QUE SE EXTRAJO DE LA TABLA ES IGUAL A LA QUE SE ENVIA DESDE EL FORMULARIO         
        if (md5($_POST['password']) === $clave) 
          //  if(password_verify( $_POST['password'],$clave))
            {
            // SI COINICIDEN AMBAS CONTRASEÑAS SE INICIA LA SESION Y SE LE DA LA BIENVENIDA AL USUARIO CON ECHO
          session_regenerate_id();
          $_SESSION['loggedin'] = TRUE;
          $_SESSION['name'] = $_POST['username'];
          $_SESSION['userid'] = $dni;
          $_SESSION['permisos'] = $permisos;

          header('Location: ../page/portal.php');
                  
        } 
           
              // SI EL USUARIO EXISTE PERO EL PASSWORD NO COINCIDE IMPRIMIR EN PANTALLA PASSWORD INCORRECTO
       
            else { echo "  <p> </p>   <p style=text-align:center;> <img src=/img/logos/no.gif?type=webp&to=min&r=640 style=width:200px;height:220px;></p>
                        <p> </p>     <table border=1 cellspacing=0 cellpading=0 align=center BORDER BGCOLOR=#b0dfce>
                        <tr align=center > <td ><font color=darkred><h2>¡PASSWORD INCORRECTO !</h2>  <a href='../index.php' >SALIR</a>  </td>    </tr>
                        </table>"; }
        }  
      
      
               // SI EL USUARIO NO EXISTE MOSTRAR USUARIO INCORRECTO
            else { echo "  <p> </p>   <p style=text-align:center;> <img src=/img/logos/no.gif?type=webp&to=min&r=640 style=width:200px;height:220px;></p>
                        <p> </p>     <table border=1 cellspacing=0 cellpading=0 align=center BORDER BGCOLOR=white>
                        <tr align=center > <td ><font color=darkred><h2>¡USUARIO INCORRECTO !</h2>  <a href='../index.php' >SALIR</a>  </td>    </tr>
                        </table>"; }

  $stmt->close();
}
?>