<?php
  require_once "menu_admin.php";
?>
  <script src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyA8aMtw__m3wPY0iXdoJOdJfs3WItl4F_I"></script>
  <script>
    var localizacaoPedido = <?php echo json_encode($retorno);?>;
    var localizacaoLoja = <?php echo json_encode($retornoLOC);?>;
    var rota;
    var servico = new google.maps.DirectionsService();

    function iniciar() {
      rota = new google.maps.DirectionsRenderer();
      var mapOptions = {
        zoom: 7,
        center: new google.maps.LatLng(parseFloat(localizacaoLoja[0].latitude), parseFloat(localizacaoLoja[0].longitude))
      };
      var map = new google.maps.Map(document.getElementById('mapa'),
        mapOptions);
      rota.setMap(map);
      rota.setPanel(document.getElementById('painel'));
      var origem = new google.maps.LatLng(parseFloat(localizacaoLoja[0].latitude), parseFloat(localizacaoLoja[0].longitude));
      var destino = new google.maps.LatLng(parseFloat(localizacaoPedido[0].latitude), parseFloat(localizacaoPedido[0].longitude));
      var solicitacao = {
        origin: origem,
        destination: destino,
        travelMode: google.maps.TravelMode.DRIVING
      };
      servico.route(solicitacao, function(resposta, status) {
        if (status == google.maps.DirectionsStatus.OK) {
          rota.setDirections(resposta);
        }
      });
    }

    google.maps.event.addDomListener(window, 'load', iniciar);

  </script>
  <section class="container tabela">
    <h1 class="text-center">Pedido</h1>
    <p>Cliente: <?php echo $retorno[0]->cliente?></p>
    <p>Produto : <?php echo $retorno[0]->produto?></p>
  </section>

    <div id="painel" style="height: 100%;
            float: right;
            width: 390px;
            overflow: auto;"></div>
    <div id="mapa" style="height: 100%;
            margin: 0px;
            padding: 0px;
            margin-right: 400px;"></div>
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>

</html>
