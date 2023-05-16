<?php include 'static/html/header.html'; ?>
<body>
<?php include 'static/html/topbar.html'; ?>
    <div class="container">

    <div class="content">
      <div class="page-header">
        <h1>Automação Backbone</h1>
      </div>
      <div class="row">
        <?php include 'inventario.php'; ?>
      </div>
      <div class="row" style='border: 0px solid #ccc;'>
        <div class="span22">
          <div id="eventSpan1">Selecione um dispositivo</div>
        </div>
      </div>
    </div> <!-- content -->
    <script>
      // Verifica se o modo fullscreen está ativado e armazena o estado no localStorage
      const mapElement = document.getElementsByClassName('btn secondary');

      function toggleFullscreen() {
        if (document.fullscreenElement) {
          document.exitFullscreen();
          sessionStorage.setItem('mapFullscreen', 'false');
        } else {
          mapElement.requestFullscreen();
          sessionStorage.setItem('mapFullscreen', 'true');
        }
      }

      // Verifica se o mapa estava em fullscreen antes do refresh
      const mapFullscreen = sessionStorage.getItem('mapFullscreen');
      if (mapFullscreen === 'true') {
        mapElement.requestFullscreen();
      }
    </script>

    <?php include 'static/html/footer.html'; ?>