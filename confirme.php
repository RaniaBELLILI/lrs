<?php
require_once('include/comptes.inc.php');
include_once('connect_db.php');
if (!isset($_GET['code'])){
    echo 'rien a verifier';
}
else{
    $stmt = $conn->prepare("select * from confirmation where confirmation_code=:code");
    $stmt->execute([
        'code' => $_GET['code'],
        ]);
    $code=$stmt->fetchAll();
    error_log(print_r($code, true));
    if (empty($code)) {
        echo "erreur : cette confirmation n'existe pas"; // Le compte existe déjà
        die();
    }
    else{
        $code=$code[0];
        if (time()>$code['expire_a']){
            echo 'code expired';
            die();
        }
        else{
        $stmt=$conn->prepare("insert into utilisateur (nom, password, mail) values (:nom,:password,:mail)");
        $stmt->execute([
            'nom' => $code['nom'],
            'password' => $code['password'],
            'mail' => $code['mail']
        ]);
        echo 'utilisateur enregistree';
        die();
    }
    }
}
?>