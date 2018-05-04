<?php
  require_once "menu_admin.php";
?>
  <section class="form-admin text-center">
    <h2><?php if($id != ""){ echo "Editar Produto";} else {echo "Cadastrar Produto";}?></h2>
      <div  class="col-lg-6 col-md-8 col-sm-10 col-xs-10 offset-lg-3 offset-md-2 offset-sm-1 offset-xs-1">
          <img src="<?php if($id != "") echo  $retorno[0]->imagem; else echo "img/padrao.png";?>" class="rounded-circle" id="foto" style="width: 320px; height: 300px;">
      </div>
      <br>
      <br>
    <form action="" method="POST" class="" id="form" enctype="multipart/form-data">
      <div class="form-group col-lg-6 col-md-8 col-sm-10 col-xs-10 offset-lg-3 offset-md-2 offset-sm-1 offset-xs-1">
          <input type="hidden" name="id" value="<?php if($id != "") echo $retorno[0]->id_prod;?>"/>
          <input type="hidden" name="imagem" value="<?php if($id != "") echo $retorno[0]->imagem;?>">
        <input class="form-control" type="text" name="nome" value="<?php if($id != "") echo $retorno[0]->nome;?>" placeholder="Nome do Produto">
      </div>
      <div id="preco" class="form-group col-lg-6 col-md-8 col-sm-10 col-xs-10 offset-lg-3 offset-md-2 offset-sm-1 offset-xs-1">
        <input class="form-control" type="text" name="preco" value="<?php if($id != "") echo $retorno[0]->preco;?>" placeholder="Preço">
      </div>

      <div class="form-group col-lg-6 col-md-8 col-sm-10 col-xs-10 offset-lg-3 offset-md-2 offset-sm-1 offset-xs-1">
        <label class="custom-file form-control">
        <input type="file" name="foto" accept=".jpg, .jpeg, .png" onchange="mostrar(this);" class="custom-file-input">
        <span class="custom-file-control border-0"><i class="fa fa-file-image-o" aria-hidden="true"></i>&nbsp;&nbsp;Adicionar uma imagem</span>
        </label>
      </div>
      <div class="form-group col-lg-6 col-md-8 col-sm-10 col-xs-10 offset-lg-3 offset-md-2 offset-sm-1 offset-xs-1">
        <fieldset class="form-group form-check-inline">
          <legend>Produto Disponível?</legend>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="disponivel" value="S">
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
    <script>
        function mostrar(foto)
        {

            if (foto.files && foto.files[0])
            {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#foto')//id <img>
                        .attr('src', e.target.result)
                        .width(320)
                        .height(300);
                };

                reader.readAsDataURL(foto.files[0]);
            }
        }
    </script>
</body>

</html>
