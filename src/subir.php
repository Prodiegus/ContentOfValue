<?php

$con = mysqli_init(); 
mysqli_ssl_set($con,NULL,NULL, "..\certificacion para data base\DigiCertGlobalRootCA.crt.pem", NULL, NULL); 
mysqli_real_connect(
    $con, "contentofvalue.mysql.database.azure.com", 
    "ovni", 
    "ContentOfValue#2022", "cov", 3306, MYSQLI_CLIENT_SSL);

if (!$con) {
    echo "Error en conexión.";
}
/*
$nombre = $_POST['Nombre']." ".$_POST['Apellido'];
$email = $_POST['Correo'];
$marketing = $_POST['marketing'];*/
$query = "SELECT * FROM cliente";
$resultado =mysqli_query($con, $query);

foreach ($resultado as $columna){
    echo $columna ['nombre'] . " ". $columna ['mail'];
}

/*
if(isset($_POST['enviar'])){
    if(!empty($_POST['nombre'])&&!empty($_POST['email'])){
        $name = $_POST['nombre']." ".$_POST('Apellido');
        $asunto = $_POST["Bienvenido a COV."];
        $msg = $_POST["Bienvenido, nos da mucho gusto que nos hayas elejido."];
        $email = $_POST['email'];
        $header = "FROM: noreply@cov.com"."\r\n";
        $header.= "Reply-To: noreply@cov.com"."\r\n";
        $header.= "X-Mailer: PHP/".phpversion();
        $mail = mail($email,$asunto,$msg,$header);
        if($email){
            echo "<h4>¡Mail enviado correctamente!</h4>";
        }
    }
}*/
?>