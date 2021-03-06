<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Maalari</title>
<link rel="stylesheet" href="css/foundation.css">
<link rel="stylesheet" href="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
<link href='http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="maalari.css">
 
</head>
<body>
<?
  $hinta= $_GET["Hinta"];
  $Tarjous=$_GET["Tarjous"];
?>
<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-2195009-2', 'auto');
      ga('send', 'pageview');

      ga('create', 'UA-2195009-27', 'auto', {name: "foundation"});
      ga('foundation.send', 'pageview');

</script>
<?php
  $my=mysqli_connect("localhost","data15","aJrHfybLxsLU76rV","data15");
  if($my->mysql_errno) {
    die("MySQL, virhe yhteyden luonnissa:" . $my->connect_error);
    }
    $my->set_charset("utf-8");
  $sql= "SELECT * from maalaus WHERE tarjous = '$tarjous' OR koodi = '$koodi' ";
  $sql1= "SELECT * from maalaus";
?>
<div class="top-bar">
<div class="row">
<div class="top-bar-left">
<ul class="dropdown menu" data-dropdown-menu>
<li class="menu-text">Maalaus Sandvik</li>
<li class="has-submenu">
<a href="#">Lisää</a>
<ul class="submenu menu vertical" data-submenu>
<li><a href="youtube.com">Tuotteet</a></li>
<li><a href="gmail.com">Lisää tarjous</a></li>
<li>
</ul>
</li>
</ul>
</div>
</div>
</div>
<div class="container middle">
<form action="maalari.php" method="GET">
  <div class="row">
    <div class="large-8 md-6 xs-4">
      <label>Katon pinta-ala</label>
        <input type="text" placeholder="m2" name="Hinta">
    </div>
  </div>
  <div class="row">
    <div class="large-8 md-6 xs-4">
      <label>Maalauksen tyyppi</label>
        <select name="Tarjous">
        <?
      if($tulos = $my->query($sql1)) {
        while ($d = $tulos->fetch_object()) {
      echo "<option value='".$d->tarjous."'>".$d->tarjous."</option>";
      }
      }
        ?>
        </select>
    </div>
  </div>
  <div class="row">
    <div class="large-8 md-6 xs-4">
      <label>Tarjous koodi</label>
        <input type="text" placeholder="Koodi" name="Koodi">
    </div>
    <input type="submit" value="Tarkasta">
</form>
<?
      if($tulos = $my->query($sql)) {
    $d = $tulos->fetch_object();
    } else { echo "Syötä tiedot uudestaan.";};
?>
<h3 class="subheader-1">             
  Hinta: 
    <span id="hinta">
    <?
      echo  $hinta - ($hinta *($d->prosentti/100));
    ?>  
    </span>
</div>
</div>

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
      $(document).foundation();
    </script>
<script type="text/javascript" src="https://intercom.zurb.com/scripts/zcom.js"></script>
</body>
</html>