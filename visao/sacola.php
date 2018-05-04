<?php
    require_once "incluir.php";
  require_once "cabec.php";
?>
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <a class="navbar-brand" href="#inicio">FAST PIZZA</a>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php?controle=inicio&metodo=inicio">Página Inicial</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contato">Contato</a>
        </li>
        <li class="nav-item"><a href="index.php?controle=sacolaControle&metodo=sacola" class="nav-link"><i class="fa fa-shopping-bag" aria-hidden="true"></i>&nbsp;Sacola</a></li>
      </ul>
      <form class="form-inline mt-2 mt-md-0">
        <a href="index.php?controle=loginControle&metodo=login" class="btn btn-outline-warning my-2 my-sm-0">Entrar ou cadastrar</a>
      </form>
    </div>
  </nav>
  <script>

      $(function(){
          $('.qtde').change(function(){

              //Pega a linha da sess�o
              var lin = $(this).attr('rel');
              //Pega a quantidade digitada
              var q = $(this).val();
              //Pega o id do produto
              var id = $(this).attr('id');

              //Fun��o ajax
              $.ajax({
                  //Tipo de envio POST ou GET
                  type: "POST",
                  //Caminho do arquivo que processa a altera��o da sess�o
                  url: "index.php?controle=sacolaControle&metodo=atualizar",
                  //dados passados via POST
                  data: "q="+q+"&lin="+lin+"&id="+id,
                  //Se der tudo ok recarrega a p�gina atual
                  success: function(){
                      location.reload();
                  }
              });
          });
      });
  </script>
<?php
//verificando se a sess�o est� "estartada"
if(!isset($_SESSION))
{
    session_start();
}
$total = 0;
  echo "<section class=\"carrinho\">";
  echo "<div class=\"container\">";
if(isset($_SESSION["carrinho"]) && count($_SESSION["carrinho"]) > 0) {
    echo "<table id = \"cart\" class=\"table table-hover table-condensed\" >
        <thead >
          <tr >
            <th style = \"width:50%\" > Produto</th >
            <th style = \"width:10%\" > Preço</th >
            <th style = \"width:8%\" class=\"text-center\" > Quantidade</th >
            <th style = \"width:22%\" class=\"text-center\" > Subtotal</th >
            <th style = \"width:10%\" class=\"text-center\" ></th >
          </tr >
        </thead >
        <tbody >";
        foreach($_SESSION["carrinho"] as $lin=>$val){
             echo "<tr>";
             echo "<td data - th = \"Produto\" >";
             echo "<div class=\"row align-items-center\" >";
             echo "<div class=\"col-sm-6 hidden-xs\" ><img src = '{$_SESSION['carrinho'][$lin]['imagem']}' /></div >";
             echo "<div class=\"col-sm-6 \" >";
             echo "<h4 class=\"nomargin\" > {$_SESSION['carrinho'][$lin]['nome']} </h4 >";
             echo "</div>";
             echo "</div>";
             echo "</td>";
             echo "<td data - th = \"Preço\" > R$".number_format($_SESSION["carrinho"][$lin]["preco"], 2, ',','.')." </td >";
             echo "<td data - th = \"Quantidade\" >";
             echo "<input type = \"number\" rel='".$lin."' id='" .$_SESSION['carrinho'][$lin]['codigo']."' name='qtde' class=\"qtde form-control text-center\" value = '{$_SESSION["carrinho"][$lin]["qtde"]}' >";
             $subtotal = $_SESSION["carrinho"][$lin]["qtde"] * $_SESSION["carrinho"][$lin]["preco"];
             $total = $total + $subtotal;
             echo "</td>";
             echo "<td data - th = \"Subtotal\" class=\"text-center\" > R$".number_format($subtotal, 2, ',','.')." </td >";
             echo "<td class=\"actions text-center\" data - th = \"\">
                  <a href='index.php?controle=sacolaControle&metodo=removerItem'> <button class=\"btn btn-danger btn-sm\" ><i class=\"fa fa-trash-o\" ></i ></button></a>
                </td>
              </tr>";
        }

         echo "</tbody >
        <tfoot >
          <tr >
            <td ><a href = \"index.php?controle=inicio&metodo=inicio\" class=\"btn btn-warning\" ><i class=\"fa fa-angle-left\" ></i > Continuar Comprando </a ></td >
            <td colspan = \"2\" class=\"hidden-xs\" ></td >
            <td class=\"hidden-xs text-center\" ><strong > Total R$".number_format($total, 2, ',','.')."  </strong ></td >
            <td ><a href = \"login.html\" class=\"btn btn-success btn-block\" > Finalizar <i class=\"fa fa-angle-right\" ></i ></a ></td >
          </tr >
        </tfoot >
      </table >";

} else{
    echo "<h1>No momento não há produtos na sacola</h1>";
}
   echo "</div>";
  echo "</section>";
  ?>
  <footer class="contato footer" id="contato">
    <h2 class="titulo text-center">Contato</h2>
    <form class="text-center" id="form">
      <div class="form-group col-lg-6 col-md-8 col-sm-10 col-xs-10 offset-lg-3 offset-md-2 offset-sm-1 offset-xs-1">
        <input class="form-control" type="text" id="example-text-input" placeholder="Nome">
      </div>
      <div class="form-group col-lg-6 col-md-8 col-sm-10 col-xs-10 offset-lg-3 offset-md-2 offset-sm-1 offset-xs-1">
        <input type="email" class="form-control" placeholder="Email">
      </div>
      <div class="form-group col-lg-6 col-md-8 col-sm-10 col-xs-10 offset-lg-3 offset-md-2 offset-sm-1 offset-xs-1">
        <input class="form-control" type="tel" placeholder="Telefone" id="example-tel-input">
      </div>
      <div class="form-group col-lg-6 col-md-8 col-sm-10 col-xs-10 offset-lg-3 offset-md-2 offset-sm-1 offset-xs-1">
        <textarea class="form-control" id="exampleTextarea" placeholder="Insira sua mensagem" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-outline-warning">Enviar</button>
    </form>
    <div class="col-sm-12 mt-5 footer">
      <p class="text-white small text-center">
        &copy; 2017 .<a href="https://jg-front.github.io/">Jonathan Gomes</a>.
      </p>
    </div>
  </footer>
  <div class="container">


  </div>

  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>

</html>
