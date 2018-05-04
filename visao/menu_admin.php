<?php
require_once "cabec.php";
?>
<link rel="stylesheet" href="css/style.css" />
<script>
    function goBack() {
        window.history.back()
    }
</script>
</head>

<body id="other" onload="initMap()">
<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#inicio">FAST PIZZA</a>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php?controle=adminControle&metodo=usuarios">Usuários</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controle=adminControle&metodo=produtos">Produtos</a>
            </li>
            <li class="nav-item"><a href="index.php?controle=adminControle&metodo=pedidos" class="nav-link">Pedidos</a></li>
            <li class="nav-item"><a href="index.php?controle=adminControle&metodo=localizacao" class="nav-link">Localização</a></li>
        </ul>
        <div class="btn-group mt-2 mt-md-0">
            <a href="" class="btn btn-outline-warning my-2 dropdown-toggle my-sm-0" data-toggle="dropdown">Olá, <?php echo "{$_SESSION["usuario"]}"?></a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="index.php?controle=inicio&metodo=sair">Sair</a>
            </div>
        </div>
    </div>
</nav>