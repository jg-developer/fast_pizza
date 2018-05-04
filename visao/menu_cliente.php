<?php
require_once "visao/cabec.php";
?>
<link rel="stylesheet" href="css/style.css" />
<script>
    function goBack() {
        window.history.back()
    }
</script>
</head>
<body id="index" onload="initMap()">
<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#inicio">FAST PIZZA</a>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php?controle=usuarioControle&metodo=cliente">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controle=usuarioControle&metodo=cliente">Produtos</a>
            </li>
        </ul>
        <li class="form-inline mt-2 mt-md-0">
                <div class="btn-group mt-2 mt-md-0">
                        <a href="login.html" class="btn btn-outline-warning my-2 dropdown-toggle my-sm-0" data-toggle="dropdown">Olá, <?php echo $_SESSION["usuario"]?></a>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="index.php?controle=usuarioControle&metodo=pedidos&id=<?php echo $_SESSION["idusu"]?>">Meus Pedidos</a>
                          <a class="dropdown-item" href="index.php?controle=inicio&metodo=sair">Sair</a>
                        </div>
                      </div>
        </li>
    </div>
</nav>
