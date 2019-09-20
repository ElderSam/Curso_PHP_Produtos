<?php

/*PDO - PHP Data Objects: Interface para acesso a dados do PHP.
 https://www.devmedia.com.br/php-pdo-como-se-conectar-ao-banco-de-dados/37211 */


$localhost = "localhost";
$DBname = "andes";
$username = "root";
$password = "";

try{
    $pdo = new PDO('mysql:host='.$localhost .';dbname='. $DBname, $username, $password);
    //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch(PDOException $e){
    echo 'ERROR: ' . $e->getMessage();
}

?>