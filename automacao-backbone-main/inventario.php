<?php include("includes.php"); ?>
<link href="/static/css/svg.css" rel="stylesheet">

<div class="span5" style='border: 0px solid #eee;'>
  <div class="well">
    <div id="eventSpan2">Selecione um dispositivo</div>
  </div>
</div>
<div class="span11" style='border: 0px solid #CCC; margin-right: 10px;'>
  <h2>Topologia da rede física (visão 1)</h2>
  <button style='float: right; margin-top: -35px;' class='btn secondary' onclick="toggleFullScreen()">Fullscreen</button>

  <div id="container" class="svg-container">
    <button id="fullscreenonly" class="only-fullscreen" style="display: none">
      This button is only visible on full screen
    </button>
    <svg width="100%" height="100%" viewBox="0 0 475 400">

      <?php
      $query = "SELECT largura_linha, cor_linha, capacidade, automacao_trecho.id, apelido_trecho, tilt_AB_x, tilt_AB_y, tilt_A_x, tilt_A_y, tilt_B_x, tilt_B_y, A.coordenada coordenada_a, curvas_meio_trecho, B.coordenada coordenada_b from automacao_trecho, automacao_estacoes A, automacao_estacoes B WHERE A.id = automacao_trecho.id_estacao_a AND B.id = automacao_trecho.id_estacao_b;";
      $resultado = fct_consulta($query);
      while ($registro = mysqli_fetch_array($resultado)) {
        $id_trecho = $registro["id"];
        $apelido_trecho = $registro["apelido_trecho"];
        $tilt_AB_x = $registro["tilt_AB_x"];
        $tilt_AB_y = $registro["tilt_AB_y"];

        $tilt_A_x = $registro["tilt_A_x"];
        $tilt_A_y = $registro["tilt_A_y"];

        $tilt_B_x = $registro["tilt_B_x"];
        $tilt_B_y = $registro["tilt_B_y"];

        $largura_linha = $registro["largura_linha"];
        $capacidade = $registro["capacidade"];
        $cor_linha = $registro["cor_linha"];

        $curvas_meio_trecho = $registro["curvas_meio_trecho"];
        $coordenada_a = $registro["coordenada_a"];
        $coordenada_b = $registro["coordenada_b"];

        $coordenada_a = explode(',', $coordenada_a);
        $coordenada_b = explode(',', $coordenada_b);

        $coordenada_a_x = trim($coordenada_a[0]) + $tilt_A_x;
        $coordenada_b_x = trim($coordenada_b[0]) + $tilt_B_x;

        $coordenada_a_y = trim($coordenada_a[1]) + $tilt_A_y;
        $coordenada_b_y = trim($coordenada_b[1]) + $tilt_B_y;

        $coordenada_a = $coordenada_a_x + $tilt_AB_x . ", " . $coordenada_a_y + $tilt_AB_y;
        $coordenada_b = $coordenada_b_x + $tilt_AB_x . ", " . $coordenada_b_y + $tilt_AB_y;
      

  if ($cor_linha == 'red') {
    $class_css = 'blink_me';
  } else if ($cor_linha == 'blue'){
    $class_css = '';
  } else {
    $class_css = 'dashed-line dash-move-opposite';
  }

  echo "<polyline points='$coordenada_a $curvas_meio_trecho $coordenada_b' onclick='evento_click_trecho($id_trecho);' fill='none' class='$class_css' stroke='$cor_linha' stroke-width='$largura_linha' />";
}
?>

        echo "<polyline points='$coordenada_a $curvas_meio_trecho $coordenada_b' onclick='evento_click_trecho($id_trecho);' fill='none' stroke='$cor_linha' stroke-width='$largura_linha' />";
      }
      ?>

      <polyline points="880,80 880,260" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="1100,80 860,260" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="990,80 870,260" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="760,270 1960,270 1960,970 1600,970" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="850,300 850,450 1350,450" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="1370,450 1770,450 1770,300" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="1370,450 1370,570 1550,570" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="1550,570 1950,570" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="1540,600 1540,980" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="1100,950 1100,840 1390,840 1390,700 1555,590" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="1550,950 910,950 790,950 790,1130 910,1130 910,1230 815,1230 640,1230 640, 1260" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- RECIFE <> ARAPIRACA-->
      <polyline points="900,1170 1200,1170" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="1550,1000 1550,1080 1210,1080 1210,1180" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="1440,1490 2300,1490 2300,2630 910,2630" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="880,2620 880,2930 1630,2930 1630,2650" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="900,2620 900,2770 1100,2770" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="900,2950 900,2785 1100,2785" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="1650,2630 1650,2800 1750,2800" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="900,2690 830,2690 830,3000 1650,3000 1650,2820 1800,2820" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="750,250 5,250 5,2650 750,2650" fill="none" stroke="#A9A9A9" stroke-width="1" /><!--TELXIUS FLA<>TELXIUS SDR-->
      <polyline points="750,2650 750, 3220 750, 3220" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="750,2650 900,2650" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="750,3220 750,3650" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="800,3670 1800,3670" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="1760,3670 1760,3200" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="1760,3200 1760,2800" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="1760,3200 1940,3200 1940,2800 1760,2800" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="1790,3670 1790,3550 2240,3550 2240,3350 1790,3350 1790,3200" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="800,3690 900,3690 900,3950 1640,3950 1640,3690 1800,3690" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="1200,1170 2050,1170" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="2050,1170 1850,1170" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="1840,1150 1840,1070" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="1860,1190 1950,1270" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="2050,1170 2250,1170" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="2040,1200 2040,1270" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="2060,1190 2150,1270" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="2240,1200 2240,1270" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="890,300 890,310 60,310 60,2590 910,2590 910,2650" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="1390,1510 1390,1530 140,1530 140,900 740,900 740,1000 740,1130 620,1130 620,1290 900,1290" fill="none" stroke="#A9A9A9" stroke-width="1" /><!--PROPRIA<>CAMPOALEGRE-->
      <polyline points="740, 1170 900, 1170" fill="none" stroke="#A9A9A9" stroke-width="1" /><!--PALMEIRA VBO<>PALMEIRA-->
      <polyline points="1500,1290 1600,1350 1810,1350 1810,1240 1600,1240 1500,1290" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="1210,1180 1700,1180 1700,1250" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="1630,1320 1700,1250" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="1180,1190 1510,1190 1510,1290 850,1290" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="640,900 640,500" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="750,900 750,700" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="730,800 830,800" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="730,700 830,700" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="750,700 750,600" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="1980,1520 1980,1600" fill="none" stroke="#A9A9A9" stroke-width="1" /><!--UMBAUBA <> INDIAROBA-->
      <polyline points="1980,1650 1980,1600" fill="none" stroke="#A9A9A9" stroke-width="1" /><!--INDIAROBA <> INDIAROBA_SERRA-->
      <polyline points="1690, 1650 1690, 1550" fill="none" stroke="#A9A9A9" stroke-width="1" /><!--URUBU <> BARRA DOS COQUEIROS-->
      <polyline points="1540, 1490 1540, 1430" fill="none" stroke="#A9A9A9" stroke-width="1" /><!--ITAPORANGA <> SAO CRISTOVAO-->
      <polyline points="1520, 2080 1650, 2220" fill="none" stroke="#A9A9A9" stroke-width="1" /><!--PORTO DA FOLHA_REP <> NOSSA SENHORA DE LOURDES-->
      <polyline points="1540, 840 1470, 770" fill="none" stroke="#A9A9A9" stroke-width="1" /><!--NAZARE DA MATA <> NAZARE DA MATA_ZON -->
      <polyline points="600,1300 520,1300 520,1420 600,1420 700,1420" 580, 1120 fill="none" stroke="#A9A9A9" stroke-width="1" /><!--ARAPIRACA <> JABOATA-->
      <polyline points="570, 1300 570, 970" 580, 1120 fill="none" stroke="#A9A9A9" stroke-width="1" /><!--ARAPIRACA <> CORURIPE_LTW-->
      <polyline points="400, 1300 500, 1300" 580, 1120 fill="none" stroke="#A9A9A9" stroke-width="1" /><!--MARABA <> CEDRO DE SAO JOAO-->
      <polyline points="500, 1300 500, 1200" 580, 1120 fill="none" stroke="#A9A9A9" stroke-width="1" /><!--MARABA <> CEDRO DE SAO JOAO-->
      <polyline points="570, 1150 290,1150 290, 1100" 580, 1120 fill="none" stroke="#A9A9A9" stroke-width="1" /><!--JUNQUEIRO<> PACATUBA-->
      <polyline points="570, 1150 660,1080" 580, 1120 fill="none" stroke="#A9A9A9" stroke-width="1" /><!--JUNQUEIRO<> PACATUBA-->
      <polyline points=" 410,1150 410, 1000" 580, 1120 fill="none" stroke="#A9A9A9" stroke-width="1" /><!--PENEDO<>NEOPOLIS-->
      <polyline points="520, 1420  450, 1420 " fill="none" stroke="#A9A9A9" stroke-width="1" /><!--MALHADA DOS BOIS <> AQUIDABA-->
      <polyline points="600, 1300 520, 1300 520,1450 " 580, 1120 fill="none" stroke="#A9A9A9" stroke-width="1" /><!--ARAPIRACA <> JABOATA-->
      <polyline points="1430,1450 1540,1650 1430,1650 1430,1450" fill="none" stroke="#A9A9A9" stroke-width="1" />
      <polyline points="1400,1450 1400,1600 585, 1605 585, 1785 " fill="none" stroke="#A9A9A9" stroke-width="1" /><!--AJU <> RIBEIRA-->
      <polyline points="1430,1650 1430,1750 2040,1750 2040,1800" fill="none" stroke="#A9A9A9" stroke-width="1" /><!--AJU_GVT <> SIRIRIZINHO-->
      <polyline points="600, 1800 2050,1800" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--RIBEIRA <> SIRIRIZINHO-->
      <polyline points="790, 1800 790, 1900" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--itabaiana <> SAO DOMINGOS-->
      <polyline points="790, 1900 790, 2000" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--SAO DOMINGOS <> LAGARTO CEN-->
      <polyline points="790, 1800 790, 2000" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--ITABAIANA <> SALGADO ZON-->
      <polyline points="585, 1800 330, 1970" fill="none" stroke="#A9A9A9" stroke-width="1" /><!--RIBEIRA <> SIMAO DIAS-->
      <polyline points="440, 1900 440, 2100" fill="none" stroke="#A9A9A9" stroke-width="1" /><!--PURURUCA <> PARIPIRANGA-->
      <polyline points="2020, 1800 2250, 1800" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--SIRIRIZINHO <> DIVINA PASTORA-->
      <polyline points="750,700 840,600" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--BELO MONTE <> TRAIPU-->
      <polyline points="400,620 400,700" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--AGUA BRANCA <> ZEBU-->
      <polyline points="400,700 400,800" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--AGUA BRANCA <> DELMIRO GOUVEIA-->
      <polyline points="400,700 340,700 340,900 400,900" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--AGUA BRANCA <> DELMIRO GOUVEIA-->
      <polyline points="2020, 1800 2250, 1700" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--SIRIRIZINHO <> SIRIRI-->
      <polyline points="2050,1800 2050,1900 2110,1900 2110, 1970" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--SIRIRIZINHO <> MALHADOR-->
      <polyline points="2030,1800 2030,1900 1980,1900 1980,1980" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--SIRIRIZINHO <> CARMOPOLIS-->
      <polyline points="2030,1815 1910,1815 1910,1850 1850,1850" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--SIRIRIZINHO <> SANTO AMARO DAS B-->
      <polyline points="2030,1815 1820,1960" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--SIRIRIZINHO <> MARUIM-->
      <polyline points="2100, 1950 2220, 1950" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--MALHADOR <> AREIA BRANCA-->
      <polyline points="2100, 1950 2230,1880" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--MALHADOR <> RIACUELO -->
      <polyline points="1980, 1950 1980, 2080" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--CARMOPOLIS <> JAPARATUBA_CEN-->
      <polyline points="1980, 1950 2100, 2070" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--CARMOPOLIS <> CAPELA-->
      <polyline points="1980, 1950 1865, 2060" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--CARMOPOLIS <> PIRAMBU_CEN-->
      <polyline points="2110, 2050 2110, 2180" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--CAPELA <> MURIBECA-->
      <polyline points="1440,1800 1440,1930" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--JENIPAPO <> NOSSA SENHORA DA GLORIA_SBA-->
      <polyline points="1432, 1920 1363, 2080" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--NOSSA SENHORA DA GLORIA_ZON <> GRACHO CARDOSO -->
      <polyline points="1456, 1920 1505, 2090" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--NOSSA SENHORA DA GLORIA_ZON <> PORTO DA FOLHA REPETIDORA -->
      <polyline points="1430, 1800 1610, 1915" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--NOSSA SENHORA DA GLORIA_ZON <> SAO MIGUEL DO ALEIXO_CEN -->
      <polyline points="1635, 1930 1683, 2080" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--SAO MIGUEL DO ALEIXO_CEN <> NOSSA SENHORA APARECIDA_CEN -->
      <polyline points="1350, 2080 1350, 2210" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--GRACHO CARDOSO <> CUMBE -->
      <polyline points="1350, 2080 1230, 2220" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--GRACHO CARDOSO <> FEIRA NOVA -->
      <polyline points="1520, 2075 1520, 2230" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--PORTO DE FOLHA REPETIDORA <> PORTO DA FOLHA -->
      <polyline points="1520, 1650 1780, 1650 1780, 1700 1810, 1700" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--ARACAJU_TIM <> MORRO R6 -->
      <polyline points="1710, 1630 1830, 1630" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!--URUBU <> LARANJEIRAS -->
      <polyline points="590, 1800 450, 1800" fill="none" stroke="#A9A9A9" stroke-width="1" /><!--RIBEIRA <> CAMPO DO BRITO-->
      <polyline points="790, 1800 690, 1900" fill="none" stroke="#A9A9A9" stroke-width="1" /><!--ITABAIANA <> MOITA BONITA-->
      <polyline points="790, 1800 890, 1900" fill="none" stroke="#A9A9A9" stroke-width="1" /><!--ITABAIANA <> MACAMBIRA-->
      <polyline points="890, 1900 890, 2020" fill="none" stroke="#A9A9A9" stroke-width="1" /><!--ITABAIANA <> PEDRA MOLE-->
      <polyline points="590, 1800  590, 2000 " fill="none" stroke="#A9A9A9" stroke-width="1" /><!--RIBEIRA <> LAGARTO_COL13-->
      <polyline points="590, 2000 590, 2100" fill="none" stroke="#A9A9A9" stroke-width="1" /><!--LAGARTO_COL13 <> PEDRINHAS_CEN-->
      <polyline points="590, 2000 690, 2100" fill="none" stroke="#A9A9A9" stroke-width="1" /><!--LAGARTO_COL13 <> SALGADO_ZON-->
      <polyline points="590, 2100 590, 2200" fill="none" stroke="#A9A9A9" stroke-width="1" /><!--PEDRINHAS_CEN <> ITABAIANINHA_CEN-->
      <polyline points="590, 2100 630,2100 630,2300 590, 2300" fill="none" stroke="#A9A9A9" stroke-width="1" /><!--PEDRINHAS_CEN <> PEDRINHAS_REPETIDORA-->
      <polyline points="690, 2100  690, 2300" fill="none" stroke="#A9A9A9" stroke-width="1" /><!--PEDRINHAS_CEN <> TOBIAS BARRETO-->
      <polyline points="1110, 1800 1050, 1900" fill="none" stroke="#A9A9A9" stroke-width="1" /><!--RIBEIROPOLIS <> CARIRA_CEN-->
      <polyline points="1130, 1800 1200, 1900" fill="none" stroke="#A9A9A9" stroke-width="1" /><!--RIBEIROPOLIS <> FREI PAULO-->
      <polyline points="600, 1800 600,1700 1125,1700 1125,1800 " fill="none" stroke="#A9A9A9" stroke-width="1" /><!--RIBEIRA <> RIBEIROPOLIS-->
      <polyline points="1130,1380 1130,1300" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- PIOS <> MARECHAL-->
      <polyline points="1610, 1340 1610,1430" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- PIOS <> MARECHAL-->
      <polyline points="860, 1290 820,1380" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- SM DOS CAMPOS <> BOCA DA MATA-->
      <polyline points="880, 1290 920,1380" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- SM DOS CAMPOS <> MARIBONDO-->
      <polyline points="1110, 1170 1110,1245 870,1245 870, 1290" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- ATALAIA <> SM DOS CAMPOS-->
      <polyline points="1110, 1170 1150,1220" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- ATALAIA <> PILAR_PINHEIROSNET-->
      <polyline points="1100, 1170 1100,1090  910, 1090 910,1050" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- ATALAIA <> CAJUEIRO-->
      <polyline points="1210,1065 1210,1030 1080,1030" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- UNIAO DOS PALMARES <> MURICI -->
      <polyline points="1230,1065 1350,1020" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- UNIAO DOS PALMARES <> UNIAO_SERRA -->
      <polyline points="1210,1075 1000,1075 1000,1050" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- UNIAO DOS PALMARES <> CAPELA -->
      <polyline points="1010, 1170 1010,1120 840, 1120 840, 1100" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- VICOSA <> QUBRANGULO -->
      <polyline points="1710, 1225 1850,1225 1850,1365 2140, 1365" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- PITANGUINHA <> SANTA LUZIA DO NORTE -->
      <polyline points="1620, 1350 1620,1385 1660,1385 1660, 1470 1760,1470 1760,1385 1920, 1385" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- MAKRO <> PINHEIRO -->
      <polyline points="1710,1350 1710, 1400" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- HU <> PILAR -->
      <polyline points="1600,960 1740,960 1740, 920" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- RECIFE <> SANTO AMARO -->
      <polyline points="1740,895 1840, 860" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- SANTO AMARO <> CASA AMARELA -->
      <polyline points="1820,845 1750, 775" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- CASA AMRELA <> MADALENA -->
      <polyline points="1730,775 1660, 840" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- MADALENA <> SANMARTINS -->
      <polyline points="1730,775 1820, 720" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- MADALENA <> HOTLINK -->
      <polyline points="1640, 840 1640,950 1600,950" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- SANMARTINS <> RECIFE -->
      <polyline points="1590,930 1590, 730 1630, 670" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- RECIFE <> GOIANA -->
      <polyline points="1650, 650 1850, 650" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- ABREU E LIMA <> IBURA -->
      <polyline points="1850,1160 1850,1120 1990, 1120 1990, 1080" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- FLEXEIRAS <> SAO LUIS DO QUITUNDE -->
      <polyline points="1865,1160 1865,1130 2120,1130 2120, 1050" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- FLEXEIRAS <> PARIPPUEIRA -->
      <polyline points="600,2100 520,2100" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- PEDRINHAS <> ARAUA -->
      <polyline points="590,2100 515,2200" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- PEDRINHAS <> BOQUIM -->
      <polyline points="2240,550 2240,650" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- JPA TIM <> MANAIRA -->
      <polyline points="2240,540 2330,540" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- JPA TIM <> ROGER -->
      <polyline points="1970,600 2150,600 2150,640 2220,640" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- JOAO PESSOA <> JPA TORRE -->
      <polyline points="1970,580 2040,580 2040,540 2240,540" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- JOAO PESSOA <> JPA TIM -->
      <polyline points="300,1880 430,1900" fill="none" stroke="#A9A9A9" stroke-width="1" /> <!-- RIACHAO DO DANTAS <> PURURUCA -->
      <?php

      $query = "select id, coordenada, estacao, tipo from automacao_estacoes";
      $resultado = fct_consulta($query);
      while ($registro = mysqli_fetch_array($resultado)) {

        $id = $registro['id'];
        $coordenada = $registro['coordenada'];
        $estacao = $registro['estacao'];
        $tipo = $registro['tipo'];

        switch ($tipo) {
          case 2:
            $tamanho = '80';
            $text_x = '50';
            $text_y = '110';
            break;
          case 3:
            $tamanho = '60';
            $text_x = '40';
            $text_y = '90';
            break;
          default:
            $tamanho = '100';
            $text_x = '60';
            $text_y = '130';
            break;
        }

        print <<<END
<g transform="translate($coordenada)" id="$id" >
<rect x="10" y="20" width="$tamanho" height="$tamanho" fill="#CCCCCC" onclick="evento_click_estacao('$id');" />
<text x="$text_x" y="$text_y" text-anchor="middle" font-size="10">$estacao</text>
</g>
END;
      }

      ?>
    </svg>
  </div>

</div>
<div class="span6" style="border: 0px solid #000;">
  <div id="eventSpan" style="border: px solid #000;">Selecione uma estação.</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<script type="text/javascript">
function evento_click_estacao(id_estacao) {
    $.ajax({
      url: "detalhes_estacao.php?id="+ id_estacao,
      success: function(html){
          if(html){
              document.getElementById('eventSpan').innerHTML = html;
          }
      }
    });

    $.ajax({
      url: "detalhes_clientes.php?id=" + id_estacao,
      success: function(html) {
        if (html) {
          document.getElementById('eventSpan2').innerHTML = html;
        }
      }
    });
  }

  function evento_click_trecho(id_trecho) {
    $.ajax({
      url: "detalhes_trecho.php?id=" + id_trecho,
      success: function(html) {
        if (html) {
          document.getElementById('eventSpan').innerHTML = html;
        }
      }
    });
  }

  function evento_click_dispositivo(id_dispositivo) {

    $.ajax({
      url: "detalhes_dispositivo.php?id=" + id_dispositivo,
      success: function(html) {
        if (html) {
          document.getElementById('eventSpan1').innerHTML = html;
        }
      }
    });
  }
</script>

<script type="text/javascript">
  async function buscarElementos() {
    const response = await fetch('busca-hosts.php');
    const elementos = await response.json();

    elementos.forEach(elemento => {
      // Localize o elemento SVG correspondente usando o ID
      const svgElemento = document.getElementById(elemento.parent_id);

      // Crie um novo elemento SVG para o elemento do banco de dados
      const novoElemento = document.createElementNS('http://www.w3.org/2000/svg', 'rect');
      novoElemento.setAttribute('x', elemento.x);
      novoElemento.setAttribute('y', elemento.y);
      novoElemento.setAttribute('width', elemento.width);
      novoElemento.setAttribute('height', elemento.height);
      novoElemento.setAttribute('fill', elemento.fill);

      // Adicione o novo elemento ao elemento SVG correspondente
      svgElemento.appendChild(novoElemento);
    });
  }

  buscarElementos();
</script>


<script>
  var svg = document.querySelector('svg');
  var container = document.querySelector('.svg-container');

  // Obtém as dimensões do SVG
  var bbox = svg.getBBox();
  var viewBoxStart = [bbox.x, bbox.y, bbox.width, bbox.height].join(' ');

  // Ajusta a viewBox para enquadrar o conteúdo do SVG
  svg.setAttribute('viewBox', viewBoxStart);


  var viewBox = svg.getAttribute('viewBox').split(' ');
  var viewBoxWidth = parseFloat(viewBox[2]) - parseFloat(viewBox[0]);
  var viewBoxHeight = parseFloat(viewBox[3]) - parseFloat(viewBox[1]);

  container.addEventListener('mousedown', function(event) {
    var startX = event.clientX;
    var startY = event.clientY;
    var startViewBox = svg.getAttribute('viewBox').split(' ');

    function onMouseMove(event) {
      var dx = event.clientX - startX;
      var dy = event.clientY - startY;
      viewBox[0] = parseFloat(startViewBox[0]) - dx * (viewBoxWidth / container.offsetWidth);
      viewBox[1] = parseFloat(startViewBox[1]) - dy * (viewBoxHeight / container.offsetHeight);
      svg.setAttribute('viewBox', viewBox.join(' '));
    }

    function onMouseUp(event) {
      document.removeEventListener('mousemove', onMouseMove);
      document.removeEventListener('mouseup', onMouseUp);
    }

    document.addEventListener('mousemove', onMouseMove);
    document.addEventListener('mouseup', onMouseUp);
  });

  container.addEventListener('wheel', function(event) {
    event.preventDefault();
    var delta = event.deltaY * 0.01;
    var scale = Math.pow(1.1, delta);
    viewBox[2] = parseFloat(viewBox[2]) / scale;
    viewBox[3] = parseFloat(viewBox[3]) / scale;
    svg.setAttribute('viewBox', viewBox.join(' '));

    //add por marlos para mover a topologia de modo simétrico
    viewBoxWidth = viewBox[2];
    viewBoxHeight = viewBox[3];
  });
</script>

<script>
  var networkfullscreen = document.getElementById("container");

  window.toggleFullScreen = function() {
    document.getElementById('fullscreenonly').style = 'display: block';
    if (!document.mozFullScreen && !document.webkitFullScreen) {
      if (networkfullscreen.mozRequestFullScreen) {
        networkfullscreen.mozRequestFullScreen();
      } else {
        networkfullscreen.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
      }
      document.getElementById('container').style = 'background-color: #FFFFFF;';
    } else {
      if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else {
        document.webkitCancelFullScreen();
      }

    }
  }

  document.addEventListener('webkitfullscreenchange', function() {
    if (document.webkitIsFullScreen === false) {
      document.getElementById('fullscreenonly').style = 'display: none';
      document.getElementById('mynetwork').style = 'height: 280px; width: 450px;';
    }

  }, false);
</script>