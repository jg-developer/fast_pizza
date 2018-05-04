<!DOCTYPE html>
<html>
<?php
    if(!isset($_SESSION)){
        session_start();
        $_SESSION["tipo"]="";
        $_SESSION["nome"]="";
        $_SESSION["id"]="";
        $_SESSION["logado"] = "";
        $_SESSION["sacola"] = "";
    }
?>
<head>
  <meta charset="utf-8">
  <title>Fast Pizza</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/4e063d3792.js"></script>
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />

