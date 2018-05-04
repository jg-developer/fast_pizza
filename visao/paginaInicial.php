<?php
    require_once "menu_cliente.php";
?>
  <section class="inicio text-center" id="inicio">
    <a href="index.html"><img src="img/logo_branco.png" class="logo" alt=""></a>
  </section>
  <section class="produtos container" id="produtos">
    <h1 class="text-center">Produtos</h1>
      <?php
      if(count($retorno) > 0) {
      }
      $contador = 0;
      for ($x = 0; $x < count($retorno); $x++) {
          if ($contador == 0){
              echo "<div class=\"row\">";
          }
          echo "<div class=\"produto card col-lg-2 col-md-2 col-sm-5 col-xs-10\" style=\"width: 20rem;\">";
          echo "<img class=\"card-img-top\" src='{$retorno[$x]->imagem}' alt=\"Card image cap\">";
          echo "<div class=\"card-block\">";
          echo "<h4 class=\"card-title\">{$retorno[$x]->nome}</h4>";
          echo "<p class=\"card-text\">R$ " . number_format($retorno[$x]->preco, 2, ",", ".") . "</label><br></p>";
          echo "<a href='index.php?controle=usuarioControle&metodo=finalizar&id={$retorno[$x]->id_prod}' class=\"btn btn-primary\" >Comprar</a>";
          echo "</div>";
          echo "</div>";
          $contador++;
          if ($contador == 5){
              $contador = 0;
              echo "</div>";
          }
      }

          ?>
    </section>
  <footer class="contato footer" id="contato">
    <div class="col-sm-12 mt-5 footer">
      <p class="text-white small text-center">
        &copy; 2017 .<a href="https://jg-front.github.io/">Jonathan Gomes</a>.
      </p>
    </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <script src="js/js.js"></script>
</body>

</html>
