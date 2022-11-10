<?php 
session_start();
if(!isset($_SESSION['nombre'])){
  header('location:../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <title>Document</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css'>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <link rel="stylesheet" href="../css/estilo_pantallaprincipal.css">

</head>
<body>

  <script>
    window.console = window.console || function(t) {};
  </script>
  <script>
    if (document.location.search.match(/type=embed/gi)) {
      window.parent.postMessage("resize", "*");
    }
  </script>
</head>
<body translate="no">
  <body>
    <div id="menu-overlay"></div>
    <div id="menu-toggle" class="closed" data-title="Menu">
      <i class="fa fa-bars"></i>
      <i class="fa fa-times"></i>
    </div>
    <header id="main-header">
      <nav id="sidenav">
        <div id="sidenav-header">
          <div id="profile-picture">
            
          </div>
  <a href="#" id="profile-link" ><?php echo $_SESSION['nombre']; ?></a>
        </div>

        <div id="account-actions">
          <a href="#" data-title="Home"><i class="fa fa-home"></i></a>
          <a href="#" id="messages" data-title="Messages" data-newmessages="1"><i class="fa fa-inbox"></i></a>
          <a href="#" data-title="Settings"><i class="fa fa-cog"></i></a>
        </div>
        <ul id="main-nav">
          <li class="active">
            <a href="#">
              <i class="fa fa-tachometer"></i>
              BIENVENIDO
            </a >
          </li>
          <li>
            <a href="#" onclick="hola()">
              <i class="fa fa-user"></i>
              MIS DATOS
            </a>
          </li>
          <li>
            <a href="#" onclick="hola2()">
              <i class="fa fa-shopping-cart" ></i>
              COMPRAS
            </a>
          </li>
          <li>
            <a href="../conexion/salir.php">
              <i class="fa fa-times"></i>
              CERRAR SESION
            </a>
          </li>

        </ul>
      </nav>
      <form id="admin-search">
        <input type="text" id="search-field" placeholder="Search" />
        <label for="search-field" id="search-label" title="Search"><i class="fa fa-search"></i></label>
      </form>
      <div id="header_logo">
        <a href="#">Logo</a>
      </div>
    </header>
    <section id="content">
      <header id="content-header">
        Header content
      </header>
      <nav id="tabs">
        <ul>
          <li class="active" data-target="knowledge">Knowledge</li>
          <li data-target="activity">Activity</li>
          <li data-target="friends">Friends</li>
        </ul>
      </nav>
      <div class="tab-target targeted" id="knowledge">
        <p>Knowledge Content</p>
        <p>Bushwick VHS single-origin coffee, direct trade selfies Tonx chillwave fashion axe McSweeney's roof party four loko Williamsburg ugh. Hashtag farm-to-table keytar, gentrify roof party Vice stumptown polaroid sriracha fingerstache Intelligentsia bitters. You probably haven't heard of them 8-bit pickled pug, cardigan photo booth Schlitz Kickstarter pork belly art party raw denim street art readymade single-origin coffee Carles. Banh mi Pinterest cliche, YOLO ennui quinoa salvia brunch messenger bag twee kitsch sartorial. Cornhole bitters chambray irony, wayfarers PBR&B disrupt Marfa. Austin ennui bespoke Schlitz shabby chic, meggings iPhone. Wes Anderson kale chips you probably haven't heard of them, freegan Vice scenester seitan Cosby sweater Schlitz pop-up dreamcatcher butcher artisan Truffaut roof party.</p>
        <p>Flexitarian art party keffiyeh, PBR&B seitan Carles Godard XOXO cred Brooklyn pickled. YOLO synth butcher post-ironic, pop-up organic artisan banjo PBR try-hard dreamcatcher plaid messenger bag brunch distillery. McSweeney's cray squid, roof party Blue Bottle irony kitsch before they sold out lo-fi asymmetrical shabby chic twee Tonx pickled try-hard. Artisan hella you probably haven't heard of them selvage, jean shorts locavore photo booth fanny pack mumblecore flannel before they sold out semiotics. Intelligentsia sustainable semiotics fanny pack distillery chillwave deep v, VHS dreamcatcher biodiesel synth. Locavore quinoa American Apparel, tote bag skateboard bespoke Wes Anderson pork belly cliche cred Brooklyn blog authentic flexitarian. Try-hard cray Pitchfork, hella Truffaut flexitarian sartorial sriracha Williamsburg Cosby sweater plaid meggings Helvetica.</p>
      </div>
      <div class="tab-target" id="activity">
        Activity Content
      </div>
      <div class="tab-target" id="friends">
        Friends Content
      </div>
    </section>
    <footer></footer>
  </body>
  <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script id="rendered-js">
      // This is VERY much a work in progress. Hope to complete work by mid September, but depends on spare time

      $('#menu-toggle,#menu-overlay').click(function () {
        $('body').toggleClass('open-menu');
      });

      $('#main-nav li a').click(function () {
        $('#main-nav li').removeClass('active');
        $(this).parent().addClass('active');
      });

      $('#tabs li').click(function () {
        var clickTarget = $(this).attr('data-target');
        $('.tab-target').removeClass('targeted');
        $('#' + clickTarget).addClass("targeted");
        $('#tabs li').removeClass('active');
        $(this).addClass('active');
      });

      $('#admin-search input').on('focus', function () {
        $('#header_logo').addClass('hidden');
      });
      $('#admin-search input').on('blur', function () {
        $('#header_logo').removeClass('hidden');
      });
      //# sourceURL=pen.js
    </script>
    <script>
      function hola(){
        $('#content').load('perfil_cliente.php');

      }
      function hola2(){
        $('#content').load('compras_cliente.php');

      }
      function hola3(){
        $('#content').load('ver_ventas_vendedor.php');

      }
    </script>
  </body>
  </html>

