<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>CostaReservas - Contacto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Escribanos un mail para contactar con CostaReservas y solicitar una cita para mejor información e interiorizarce sobre nuestros productos.">
    <meta name="title" content="CostaReservas - Contacto"/>
    <meta name="language" content="Spanish"/>
    <meta name="distribution" content="Global"/>
    <meta name="keywords" content="pms, contacto costareservas, gestionar"/>
    <meta name="author" content="">  
    <link rel="shortcut icon" href="images/BOOKER_32x32.ico">
    <link href="scripts/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="scripts/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Icons -->
    <link href="scripts/icons/general/stylesheets/general_foundicons.css" media="screen" rel="stylesheet" type="text/css" />  
    <link href="scripts/icons/social/stylesheets/social_foundicons.css" media="screen" rel="stylesheet" type="text/css" />
    <!--[if lt IE 8]>
        <link href="scripts/icons/general/stylesheets/general_foundicons_ie7.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="scripts/icons/social/stylesheets/social_foundicons_ie7.css" media="screen" rel="stylesheet" type="text/css" />
    <![endif]-->
    <link rel="stylesheet" href="scripts/fontawesome/css/font-awesome.min.css">
    <!--[if IE 7]>
        <link rel="stylesheet" href="scripts/fontawesome/css/font-awesome-ie7.min.css">
    <![endif]-->

    <link href="styles/custom.css" rel="stylesheet" type="text/css" />
	
</head>
<body id="pageBody">

<div id="decorative2">
    <div class="container">

        <div class="divPanel topArea notop nobottom">
            <div class="row-fluid">
                <div class="span12">

                    <div id="divLogo" class="pull-left">
                        <a href="index.html" id="divSiteTitle">CostaReservas</a><br />
                        <a href="index.html" id="divTagLine">Sistema interno de gestión hotelera</a>
                    </div>

                    <div id="divMenuRight" class="pull-right">
                    <div class="navbar">
                        <button type="button" class="btn btn-navbar-highlight btn-large btn-primary" data-toggle="collapse" data-target=".nav-collapse">
                            MENU <span class="icon-chevron-down icon-white"></span>
                        </button>
                        <div class="nav-collapse collapse">
                            <ul class="nav nav-pills ddmenu">
                                <li class="dropdown"><a href="index.html">Inicio</a></li>
                                <li class="dropdown"><a href="funciones.html">Funciones</a></li>
                                <li class="dropdown"><a href="nosotros.html">Nosotros</a></li>
                                <li class="dropdown"><a href="descarga.html">Descarga</a></li>
                                <li class="dropdown active"><a href="contact.php">Contacto</a></li>
                            </ul>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
<div class="container">

    <div class="divPanel page-content">

        <div class="breadcrumbs">
                <a href="index.html">Inicio</a> &nbsp;/&nbsp; <span>Contacto</span>
            </div> 

        <div class="row-fluid">
                <div class="span8" id="divMain">

                    <h1>Contacto</h1>
                   	<h3 style="color:#FF6633;"><?php echo $_GET[msg];?></h3>
					<hr>
			<!--Start Contact form -->		                                                
<form name="enq" method="post" action="email/" onsubmit="return validation();">
  <fieldset>
	<input type="text" name="name" id="name" value=""  class="input-block-level" placeholder="Nombre" />
    <input type="text" name="email" id="email" value="" class="input-block-level" placeholder="Email" />
    <textarea rows="11" name="message" id="message" class="input-block-level" placeholder="Mensaje"></textarea>
    <div class="actions">
	<input type="submit" value="Enviar" name="submit" id="submitButton" class="btn btn-info pull-right btn-envio" title="Enviar!" />
	</div>
	
	</fieldset>
</form>  				 
			<!--End Contact form -->											 
                </div>
				
			<!--Edit Sidebar Content here-->	
                <div class="span4 sidebar">

                    <div class="sidebox">
                        <h3 class="sidebox-title">Información de contacto</h3>
                    <p>
                        <address><strong>CostaReservas</strong><br />
                        <abbr title="Phone">Telefono:</abbr> (540) 2291-46-7079</address> 
                        <address>  <strong>Email</strong><br />
                        <a href="mailto:info@costareservas.com">info@costareservas.com</a></address>  
                    </p>     
                     
					 <!-- Start Side Categories -->
        <h4 class="sidebox-title">Consulte</h4>
        <ul>
          <li>Solicite una cita personal</li>
          <li>Pregunte las intregas que tenga</li>
          <li><a href="http://www.facebook.com/costareservas">Estamos en facebook</a></li>
          <li>Estamos para ayudarle</li>
        </ul>
					<!-- End Side Categories -->
                    					
                    </div>
					
					
                    
                </div>
			<!--/End Sidebar Content-->
				
				
            </div>			

        <div id="footerInnerSeparator"></div>
    </div>

</div>

<div id="footerOuterSeparator"></div>

<div id="divFooter" class="footerArea">
    <div class="container">
        <div class="divPanel">
            <div class="row-fluid">
                <div class="span6" id="footerArea1">
                    <h3>Página</h3>
                    <p> 
                        <a href="index.html" title="Inicio">Inicio</a><br />
                        <a href="funciones.html" title="Funcionalidades">Funcionalidades</a><br />
                        <a href="nosotros.html" title="Nosotros">Nosotros</a><br />
                        <a href="descarga.html" title="Descarga">Descarga</a><br />
                        <a href="contact.html" title="Contacto">Contacto</a>
                    </p>
                </div>
                <div class="span6" id="footerArea2">
                    <h3>Contactenos</h3>                                                                 
                    <ul id="contact-info">
                    <li>                                  
                        <i class="general foundicon-phone icon"></i>
                        (+54) 2291 15-46-7079
                        <br />
                        (+57) 3209371305                                                                     
                    </li>
                    <li>
                        <i class="general foundicon-mail icon"></i>
                        <span class="field">Email:</span>
                        <br />
                        <a href="mailto:info@costareservas.com" title="Email">info@costareservas.com</a>
                    </li>
                    </ul>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <p class="copyright">
                        Copyright © 2018 CostaReservas. Todos los derechos reservados.
                    </p>

                    <p class="social_bookmarks">
                        <a href="http://www.facebook.com/costareservas"><i class="social foundicon-facebook"></i> Facebook</a>
                    </p>
                </div>
            </div>
            <br />
        </div>
    </div>
</div>

<script src="scripts/jquery.min.js" type="text/javascript"></script> 
<script src="scripts/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="scripts/default.js" type="text/javascript"></script>
<script src="email/validation.js" type="text/javascript"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-85918052-1', 'auto');
  ga('send', 'pageview');

</script>



</body>
</html>