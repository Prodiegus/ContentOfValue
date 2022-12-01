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

$nombre = $_POST['Nombre']." ".$_POST['Apellido'];
$email = $_POST['Correo'];
$marketing = $_POST['marketing'];
if($marketing=='on'){
    $marketing = 1;
}else{
    $marketing = 0;
}
$ads = $_POST['ads'];
if($ads=='on'){
    $ads = 1;
}else{
    $ads = 0;
}
$tecnologia = $_POST['tecnologia'];
if($tecnologia=='on'){
    $tecnologia = 1;
}else{
    $tecnologia = 0;
}
$publicidad = $_POST['publicidad'];
if($publicidad=='on'){
    $publicidad = 1;
}else{
    $publicidad= 0;
}
$recibir = $_POST['recibir'];
if($recibir =='on'){
    $recibir = 1;
}else{
    $recibir = 0;
}

$query = "INSERT INTO cliente (mail, marketing, publicidad, ads, tecnologia, recibir, nombre)
    VALUES ('$email', $marketing, $publicidad, $ads, $tecnologia, $recibir, '$nombre');";
$resultado = mysqli_query($con, $query);

if($recibir==1){
    $query = "INSERT INTO recibir (mail, marketing, publicidad, ads, tecnologia, recibir, nombre)
    VALUES ('$email', $marketing, $publicidad, $ads, $tecnologia, $recibir, '$nombre');";
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