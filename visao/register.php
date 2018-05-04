<?php
    require_once "visao/cabec.php";
?>
        <link rel="stylesheet" href="css/login.css" />
    </head>
    <body>
        <!--hero section-->
        <section class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-xs-12">
                        <div class="card border-none">
                            <div class="card-block">
                                <div class="mt-2 text-center">
                                    <h2>Criar sua conta</h2>
                                </div>
                                <div class="mt-4">
                                    <form method="POST">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" value="" placeholder="Insira seu email">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="nome" value="" placeholder="Insira seu nome">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="senha" value="" placeholder="Insira sua senha">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Criar conta</button>
                                    </form>
                                    <div class="clearfix"></div>
                                    <p class="content-divider center mt-4"><span>OU</span></p>
                                </div>
                                <p class="text-center">
                                    Já possui uma conta? <a href="index.php?controle=inicio&metodo=inicio">Fazer login</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-12 mt-5 footer">
                        <p class="text-white small text-center">
                            &copy; 2017 .<a href="https://jg-front.github.io/">Jonathan Gomes</a>.
                        </p>
                    </div>
                </div>
            </div>
        </section>

    </body>
</html>
