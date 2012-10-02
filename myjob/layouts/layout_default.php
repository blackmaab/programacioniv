<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Mi empleo</title>

        <link href="css/letters.css" rel="stylesheet" type="text/css" media="screen">
            <link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
            <link href="css/tipsy.css" rel="stylesheet" type="text/css" media="screen" />
            <script type="text/javascript" src="js/jquery-1.8.1.js"></script>
            <script type="text/javascript" src="js/start_validate.js"></script>
    </head>

    <body>
        <div id="wrapper">
            <div id="header-wrapper" class="container">
                <div id="header" class="container">
                    <div id="logo">
                        <h1><a href="#">mi empleo .com</a></h1>
                    </div>
                    <div id="menu">
                        <ul>
                            <li class="current_page_item"><a href="?mod=home">Inicio</a></li>
                            <li><a href="#">Mi Cuenta</a></li>
                            <li><a href="#">Trabajos</a></li>
                            <li><a href="#">Empresa</a></li>
                            <!--<li><a href="#">Contact</a></li>-->
                        </ul>
                    </div>
                </div>
                <div><img src="images/img03.png" width="1000" height="40" alt="" /></div>
            </div>
            <!-- end #header -->
            <div id="page">
                <div id="content">
                    <?php
                    include(MODULO_PATH . "/" . $conf[$modulo]['archivo']);
                    ?>

                    <div style="clear: both;">&nbsp;</div>
                </div>
                <!-- end #content -->
                <div id="sidebar">
                    <ul>
                        <li>
                            <div id="search" >
                                <form method="get" action="#">
                                    <div>
                                        <input type="text" name="s" id="search-text" value="" />
                                        <input type="submit" id="search-submit" value="Buscar" />
                                    </div>
                                </form>
                            </div>
                            <div style="clear: both;">&nbsp;</div>
                        </li>
                        <li>
                            <h2>Empleos y Trabajos</h2>
                            <p>Encuentra los mejores empleos en miemplep.com</p>
                        </li>
                        <li>
                            <h2>Categorias</h2>
                            <ul>
                                <li><a href="#">Administraci&oacute;</a></li>
                                <li><a href="#">Bancos | Finanzas</a></li>
                                <li><a href="#">Inform&aacute;tica</a></li>
                                <li><a href="#">Publicidad</a></li>
                                <li><a href="#">Puestos Profesionales</a></li>
                                <li><a href="#">Consultor&iacute;a | Asesor&iacute;a</a></li>
                                <li><a href="#">Varios</a></li>
                            </ul>
                        </li>
                        <li>
                            <h2>Empresas</h2>
                            <ul>
                                <li><a href="#">Almacenes Crecer</a></li>
                                <li><a href="#">Claro</a></li>
                                <li><a href="#">Oracle/a></li>
                                <li><a href="#">Didea</a></li>
                                <li><a href="#">Taca</a></li>
                                <li><a href="#">Constructora Roble</a></li>
                            </ul>
                        </li>
                        <li>
                            <h2>Noticias</h2>
                            <ul>
                                <li><a href="#">Empleos en America Latina</a></li>
                                <li><a href="#">Ingenieros Innovadores</a></li>
                                <li><a href="#">Doctorado en Software</a></li>
                                <li><a href="#">Tecnicas en las finanzas</a></li>
                                <li><a href="#">gana mas paga menos</a></li>

                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- end #sidebar -->
                <div style="clear: both;">&nbsp;</div>
            </div>
            <div class="container"><img src="images/img03.png" width="1000" height="40" alt="" /></div>
            <!-- end #page -->
        </div>
        <div id="footer-content"></div>
        <div id="footer">
            <p>Copyright (c) 2012 miempleo.com. Todos los Derechos Reservados.</p>
        </div>
        <!-- end #footer -->
    </body>
</html>
