<?php
  require_once "menu_cliente.php";
?>
  <script>
      function initMap() {
          var localizacao = <?php echo json_encode($retornoLOC);?>;
          var map = new google.maps.Map(document.getElementById('mapa'), {
              zoom: 17,
              center: {
                  lat: parseFloat(localizacao[0].latitude),
                  lng: parseFloat(localizacao[0].longitude)
              }
          });
          var geocoder = new google.maps.Geocoder();

          document.getElementById('pesquisa').addEventListener('click', function() {
              geocodeAddress(geocoder, map);
          });
      }

      function geocodeAddress(geocoder, resultsMap) {
          var address = document.getElementById('endereco').value;
          geocoder.geocode({
              'address': address
          }, function(results, status) {
              if (status === google.maps.GeocoderStatus.OK) {
                  document.getElementById('lat').value = results[0].geometry.location.lat();
                  document.getElementById('long').value = results[0].geometry.location.lng();
                  resultsMap.setCenter(results[0].geometry.location);
                  var marker = new google.maps.Marker({
                      map: resultsMap,
                      position: results[0].geometry.location
                  });
              } else {
                  alert('Geocode was not successful for the following reason: ' + status);
              }
          });
      }

  </script>
  <script src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyB4V_ULze40g7nYwSQ5yAr6iqvhG94Smbg"></script>
  <section class="form-admin text-center">
    <h2>Finalizar</h2>
    <p class="text-white">Produto: <?php  echo $retorno[0]->nome;?></p>
    <p class="text-white">Preço: <?php  echo $retorno[0]->preco;?></p>
    <form id="form" method="POST">
      <div class="form-group input-group col-lg-6 col-md-8 col-sm-10 col-xs-10 offset-lg-3 offset-md-2 offset-sm-1 offset-xs-1">
        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Insira seu endereço ">
        <span class="input-group-btn">
            <button class="btn btn-warning" id="pesquisa" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
          </span>
      </div>
      <div class="form-group input-group col-lg-6 col-md-8 col-sm-10 col-xs-10 offset-lg-3 offset-md-2 offset-sm-1 offset-xs-1">
        <div id="mapa"  style="height:500px; width: 100%;"></div>
      </div>
      <input type="hidden" value="" id="lat" name="latitude"/>
      <input type="hidden" value="" id="long" name="longitude"/>
      <input type="hidden" value="<?php  echo $retorno[0]->id_prod;?>" name="produto" />
      <input type="hidden" value="<?php echo $_SESSION["idusu"];?>" name="usuario" />
      <input type="hidden" value="<?php echo $retorno[0]->preco;?>" name="valor" />
      <input type="button" value="Cancelar" onclick="goBack()" class="btn btn-outline-warning" />
      <input type="submit" value="Salvar" class="btn btn-outline-warning" />
    </form>
  </section>

    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <script src="js/modal.js"></script>
</body>

</html>
