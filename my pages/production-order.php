<?php
    //Start the session.
    session_start();
    if(!isset($_SESSION['user'])) header('location: login.php');

    $user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Production Order - Inventory Management System</title>
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
                    <br>

                    <table style="width:60%; border: 2px solid; border-bottom: none">
                        <tr>
                            <td colspan="2">
                                <p style="text-align: left; font-size: 15px; font-weight: bold">PO 7.5.01.01</p>
                                <br>
                                <p style="text-align: center; font-size: 20px; font-weight: bold">PLANILLA DE PRODUCCION</p>
                            </td>
                            <td rowspan="2" style="width:15%">
                                <p>Revision:</p>
                                <br>
                                <p style="text-align: center; font-size: 25px">#01</p>
                            </td>
                            <td style="width:20%">LOGOS</td>
                        </tr>
                    </table>

                    <table style="width:60%; border: 2px solid; border-top: none">
                        <tr>
                            <td rowspan="3" style="width:15%; font-size: 20px">Cliente:</td>
                            <td rowspan="3" style="width:50%; font-size: 40px; font-weight: bold">SEG</td>
                            <td style="width:15%; text-align: right">Fecha:</td>
                            <td style="width:20%">26/09/2023</td>
                        </tr>
                        <tr>
                            <td style="width:15%; text-align: right">OC N°:</td>
                            <td style="width:20%">3062</td>
                        </tr>
                        <tr>
                            <td style="width:15%; text-align: right">Vencimiento:</td>
                            <td style="width:20%; font-weight: bold">09/11/2023</td>
                        </tr>
                        <tr>
                            <td style="font-size: 25px">1091/23</td>
                            <td style="text-align: left; font-size: 15px">Cot: 0216/23 Rev.: 1</td>
                            <td style="text-align: right">Destino:</td>
                            <td>Edenor Pantan. Aeroclub</td>
                        </tr>
                    </table>

                    <br>

                    <table style="width:60%; border: 1px solid">
                        <tr>
                            <td colspan="2">a-G13PF</td>
                            <td rowspan="4" style="width:30%">IMAGEN</td>
                            <td colspan="2" style="width:25%">ALUMINIO</td>
                            <td style="width:10%">CANTIDAD</td>
                            <td style="width:20%">ESTADO</td>
                        </tr>
                        <tr>
                            <td>Item</td>
                            <td rowspan="2" style="height:100px; font-size:15px">Caño Ø50</td>
                            <td rowspan="2" style="font-size:15px"></td>
                            <td rowspan="3" style="font-size:20px">ÑOQUI 20/22</td>
                            <td rowspan="3" style="font-size:45px">6</td>
                            <td rowspan="3">IMAGEN DEL ESTADO</td>
                        </tr>
                        <tr>
                            <td rowspan="2" style="font-size:25px">1</td>
                        </tr>
                        <tr>
                            <td style="height:100px; font-size:15px"></td>
                            <td style="font-size:15px">Zapata 100X100</td>
                        </tr>
                        <tr>
                            <td colspan="7" style="text-align:left">Notas:</td>
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