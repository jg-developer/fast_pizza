<?php
require_once "menu_admin.php";
?>
  <section class="form-admin text-center">
    <h2><?php if($id != ""){ echo "Editar Usuário";} else {echo "Cadastrar Usuário";}?></h2>
      <?php
        if($id != ""){
            echo "<form action=\"\" method='POST' class=\"\" id=\"form\">
            <h4 class='text-white'>{$retorno[0]->nome}</h4>
      <div class=\"form-group col-lg-6 col-md-8 col-sm-10 col-xs-10 offset-lg-3 offset-md-2 offset-sm-1 offset-xs-1\">
        <select class=\"form-control custom-select mb-2 mr-sm-2 mb-sm-0\" name=\"tipo\">
          <option selected disabled>Tipo de usuario</option>
          <option value=\"1\">Administrador</option>
          <option value=\"2\">Cliente</option>
        </select>
      </div>
      <input type=\"button\" value=\"Cancelar\" onclick=\"goBack()\" class=\"btn btn-outline-warning\">
      <input type=\"submit\" value=\"Salvar\" class=\"btn btn-outline-warning\">
    </form>";
        } else {
            echo "
                    <form action=\"\" method='POST' class=\"\" id=\"form\">
                          <div class=\"form-group col-lg-6 col-md-8 col-sm-10 col-xs-10 offset-lg-3 offset-md-2 offset-sm-1 offset-xs-1\">
                            <input class=\"form-control\" type=\"text\" name=\"nome\"  placeholder=\"Nome\">
                 
                          </div>
                          <div class=\"form-group col-lg-6 col-md-8 col-sm-10 col-xs-10 offset-lg-3 offset-md-2 offset-sm-1 offset-xs-1\">
                            <input type=\"email\" class=\"form-control\" name=\"email\" placeholder=\"Email\" />
                          </div>
                          <div class=\"form-group col-lg-6 col-md-8 col-sm-10 col-xs-10 offset-lg-3 offset-md-2 offset-sm-1 offset-xs-1\">
                            <input class=\"form-control\" type=\"text\" name=\"senha\"  placeholder=\"Senha\">
                          </div>
                          <div class=\"form-group col-lg-6 col-md-8 col-sm-10 col-xs-10 offset-lg-3 offset-md-2 offset-sm-1 offset-xs-1\">
                            <select class=\"form-control custom-select mb-2 mr-sm-2 mb-sm-0\" name=\"tipo\">
                              <option selected disabled>Tipo de usuario</option>
                              <option value=\"1\">Administrador</option>
                              <option value=\"2\">Cliente</option>
                            </select>
                          </div>
                          <input type=\"button\" value=\"Cancelar\" onclick=\"goBack()\" class=\"btn btn-outline-warning\">
                          <input type=\"submit\" value=\"Salvar\" class=\"btn btn-outline-warning\">
                    </form>";
        }
      ?>
  </section>
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>

</html>
