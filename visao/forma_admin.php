<?php
require_once "menu_admin.php";
?>
  <section class="form-admin text-center">
    <h2><?php if($id != ""){ echo "Editar Forma de Pagamento";} else {echo "Adicionar Forma de Pagamento";}?></h2>
    <form action="" method="POST" class="" id="form">
      <div class="form-group col-lg-6 col-md-8 col-sm-10 col-xs-10 offset-lg-3 offset-md-2 offset-sm-1 offset-xs-1">
        <input class="form-control" type="text" name="descricao" placeholder="Descrição" value="<?php if($id != "") echo $retorno[0]->descricao;?>" />
          <input type="hidden" name="id" value="<?php if($id != "") echo $retorno[0]->id_fp;?>"/>
      </div>
      <div class="form-group col-lg-6 col-md-8 col-sm-10 col-xs-10 offset-lg-3 offset-md-2 offset-sm-1 offset-xs-1">
        <fieldset class="form-group form-check-inline">
          <legend>Forma de Pagamento Disponível?</legend>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="disponivel"  value="S">
              Sim
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="disponivel"  value="N">
              Não
            </label>
          </div>
        </fieldset>
      </div>
      <input type="button" value="Cancelar" onclick="goBack()" class="btn btn-outline-warning">
      <input type="submit" value="Salvar" class="btn btn-outline-warning">

    </form>
  </section>
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>

</html>
