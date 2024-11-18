<?php
    //Start the session.
    session_start();
    if(!isset($_SESSION['user'])) header('location: login.php');

    $user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Package Labels - Inventory Management System</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="http://use.fontawesome.com/0c7a3095b5.js"></script>
</head>
<body>
    <div id="dashboardMainContainer">
        <?php include('partials/app-sidebar.php') ?>
        <div class="dashboard_content_container" id="dashboard_content_container">
            <?php include('partials/app-topnav.php') ?>
            <div class="dashboard_content">
                <div class="dashboard_content_main">
                    <br></br>
                    <table style="width:70%">
                        <tr style="height:200px">
                            <td style="font-size:60px">
                                <div style="text-align:left">
                                    <p style="font-size:20px">Destinatario:</p>
                                    <div>
                                    <b>TRANSBA-MADARIAGA</b>
                                    <div>
                                    <p style="font-size:30px">
                                    Jose Ingenieros y Cuba - MADARIAGA, Prov. de Buenos Aires (CP 7163)
                                    </p>
                                    <div>
                                    <b style="text-align:right">
                                        <p style="font-size:45px">
                                        RTTO 4596 - OC 4600012282
                                        </p>
                                    </b>
                                </div>
                            </td>
                        </tr>
                        <tr style="height:80px">
                            <td>
                                <div style="text-align:left">
                                    <p style="font-size:20px">Remitente:</p>
                                    <div>
                                        <p style="font-size:18px">
                                        <b style="font-size:30px">DYNALAB SRL</b> - Bouchard 3432, San Andres - GRAL SAN MARTIN, Prov. de Buenos Aires, Argentina (CP 1651)
                                        </p>
                                        <p style="font-size:18px">Tel: +54 011 4713-0391</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:right"><p style="font-size:25px">BOLSA 1 / 1</p></td>
                        </tr>
                    </table>
                    <br>
                    <button type="submit">PRINT <i class="fa fa-print"></i></button>
                </div>
            </div>
        </div>
    </div>

<script> src="js/script.js"></script>
</body>
</html>