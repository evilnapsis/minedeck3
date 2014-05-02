<?php
include "core/bootstrap.inc";
session_start();
$user=null;
if(Session::getUId()!=""){
  $user = UserData::getById(Session::getUId());
}

?>
<html>
    <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  	<title>.: MineDeck Directory :.</title>
    	<link rel='stylesheet' type='text/css' href='res/bootstrap/css/bootstrap.css'>
      <link rel='stylesheet' type='text/css' href='res/styles/main.css'>
      <script src='res/scripts/jquery.min.js'></script>
      <style>
      #map-canvas {
        height:80%;
      }
      </style>
<?php if(isset($_GET['module']) && isset($_GET["action"])): ?>
<?php if($_GET["action"]=="location"): ?>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZfXodBQluRliPJQrn_33u70BhdDa3Xaw&sensor=false">
    </script>
    <script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(17.96828290799979, -92.93609619140625),
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
        google.maps.event.addListener(map,'click',function(event) { 
          document.getElementById('lat').value = event.latLng.lat();
          document.getElementById('long').value = event.latLng.lng(); 
          });
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
<?php endif; ?>

<?php endif?>
  <?php 
  if(isset($_GET['module'])&&$_GET['module']=="deck"):
  $deck = DeckData::getById($_GET['id']);
  ?>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZfXodBQluRliPJQrn_33u70BhdDa3Xaw&sensor=false">
    </script>
<script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(17.96828290799979, -92.93609619140625),
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
<?php if($deck!=null):?>
<?php if($deck->latitud!="" && $deck->longitud!=""):?>

        var latlng = new google.maps.LatLng(<?php echo $deck->latitud; ?>,<?php echo $deck->longitud; ?>) ;
        var marker = new google.maps.Marker({
          position: latlng,
          map: map,
          title: <?php echo "\"".$deck->title."\""; ?>
      });
      }
<?php endif; ?>
<?php endif; ?>
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  <?php endif?>

    </head>
	<body>
<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="./" class="navbar-brand">MineDeck</a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">
<?php if(Session::getUID()!=""):?>
          <li><a href="index.php?module=home"><i class='glyphicon glyphicon-home'></i></a></li>
<?php endif;?>
        <li><a href="index.php?module=recent">Explorar</a></li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type='hidden' value='search' name='module'>
        <input type="text" class="form-control" name='q' placeholder="Buscar ...">
      </div>
      <button type="submit" class="btn btn-primary">&nbsp;<i class='glyphicon glyphicon-search'></i>&nbsp;</button>
    </form>
<ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php if(Session::getUID()!=""){ echo "<em>".$user->name." ".$user->lastname."</em>"; }?> <i class='glyphicon glyphicon-user'></i> <b class="caret"></b></a>
        <ul class="dropdown-menu">
<?php if(Session::getUID()!=""):?>
    <?php if($user->is_admin==1):?>
          <li><a href="admin.php">Modo Super Administrador</a></li>
    <?php endif; ?>
          <li><a href="index.php?module=admin">Modo Administrador</a></li>
          <li><a href="index.php?module=configuser">Configuracion</a></li>
          <li><a href="logout.php">Salir</a></li>
<?php else:?>
          <li><a href="index.php?module=signin">Ingresar</a></li>
          <li><a href="index.php?module=register">Registrarse</a></li>
<?php endif; ?>
        </ul>
    </nav>
  </div>
</header>
<br><br><br>
            <div class='container'>
					<?php
		if(!isset($_GET['module'])){
			include "core/view/index/modules/index/widget-default.php";
		}else {
			$module = $_GET['module'];
			if($module!="index"&& $module!="signin"&& $module!="newdeck"&& $module!="configdeck"&& $module!="selcategory" && $module!="home" && $module!="register" && $module!="wellcome" && $module!="about" && $module!="populars"&& $module!="recent"&& $module!="deck"&& $module!="admindeck"&& $module!="editdeck"&& $module!="configuration"&& $module!="admin"&& $module!="about"&& $module!="support"&& $module!="buy"&& $module!="search"&& $module!="contact"&& $module!="configuser"){

			}else {
				include "core/view/index/modules/".$module."/widget-default.php";				
			}
		}
		?>
		</div>
<div style='background:#000;color:white;'>
  <div class='container'>
    <div class='row'>
      <div class='col-md-6'>
      <center>
      <br>
        <div style='font-size:38px;'>MineDeck</div>
        <div style=''>&copy; 2014 Todos Los Derechos Reservados</div><br>
        <em><a style='color:white;text-decoration:none;' href='http://neowelder.com/'>Desarrollado y Hospedado por <b>NeoWelder Lab</b></a></em>
      </center>
      </div>
      <div class='col-md-3'>
      <h3>Redes Sociales</h3>
        <ul>
          <li><a style='color:white;text-decoration:none;' href='http://facebook.com/minedeck'>Facebook</a></li>
          <li><a style='color:white;text-decoration:none;' href='http://twitter.com/minedeck'>Twitter</a></li>
        </ul>
      </div>
      <div class='col-md-3'>
      <h3>Mas ...</h3>
        <ul>
          <li><a style='color:white;text-decoration:none;' href='index.php?module=contact'>Contactanos</a></li>
          <li><a style='color:white;text-decoration:none;' href='index.php?module=about'>Acerca de MineDeck</a></li>
          <li><a style='color:white;text-decoration:none;' href='index.php?module=support'>Soporte</a></li>
          <li><a style='color:white;text-decoration:none;' href='index.php?module=buy'>Comprar</a></li>
        </ul>
      </div>
    </div>
  </div>
<br>
</div>
		<script src='res/bootstrap/js/bootstrap.min.js'></script>
    <script>
    $(".tip").tooltip();
    </script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42845449-1', 'minedeck.com');
  ga('send', 'pageview');

</script>
	</body>
</html>