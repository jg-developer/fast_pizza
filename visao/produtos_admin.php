<?php
  require_once "menu_admin.php";
?>
  <section class="container tabela">
   <h1 class="text-center">Produtos</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Produto</th>
            <th>Disponível</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php
      if(count($retorno) > 0) {
      for ($x = 0; $x < count($retorno); $x++) {
      echo "<tr>";
          echo "<td>{$retorno[$x]->nome}</td>";
          if($retorno[$x]->disponivel == "N"){
              echo "<td>Não</td>";
          } else{
              echo "<td>Sim</td>";
          }
          echo "<td><a href=\"index.php?controle=adminControle&metodo=alterarProduto&id={$retorno[$x]->id_prod}\" class=\"btn btn-warning\"><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i></a></td>";
          echo "</tr>";
      }
      }
      ?>
      </tbody>
    </table>
  </section>
  <a href="index.php?controle=adminControle&metodo=adicionarProduto" class='add-button'><i class="fa fa-plus" aria-hidden="true"></i></a>
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>

</html>