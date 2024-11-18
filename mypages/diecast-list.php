<?php
    //Start the session.
    session_start();
    if(!isset($_SESSION['user'])) header('location: login.php');

    $user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Die Cast List - Inventory Management System</title>
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

                <table style="width:60%; border: 2px solid">
                    <tr>
                        <td rowspan="3" style="width:10%">Pedido de:</td>
                        <td colspan="2"style="text-align: center; font-size: 25px">ALUMINIO</td>
                        <td style="width:15%">Fecha de pedido:</td>
                        <td style="width:20%; font-size: 15px;font-weight: bold">18/09/2023</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="font-weight: bold; font-size: 30px">007/2023</td>
                        <td>PROVEEDOR:</td>
                        <td style="text-align: center; font-size: 20px">UHRIG</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; font-size: 20px">309 kilos de piezas</td>
                        <td style="font-weight: bold; font-size: 20px">40 kilos de apretadores</td>
                        <td>Vencimiento:</td>
                        <td>25/30 DIAS</td>
                    </tr>
                    <tr>
                        <td>OT N°</td>
                        <td colspan="4">SAPYC 1061/23 - TRANSBA 1063/23 - BAUZA 1064/23 - INCOPA 1082/23 - INCOPA 1059/23</td>
                    </tr>
                </table>

                <br>

                <table style="width:60%; border: 2px solid">
                    <tr>
                        <td colspan="2" style="font-weight: bold">Material: ALCOA 380</td>
                        <td style="width:30%">Cable 20/25 a Zapata 100x100</td>
                        <td style="width:10%">Fecha</td>
                        <td style="width:5%">Cant</td>
                        <td style="width:5%">OT</td>
                        <td style="width:5%">Rtto</td>
                        <td style="width:5%">QC</td>
                        <td style="width:20%">CODIGO DE PLACA</td>
                    </tr>
                    <tr>
                        <td style="width:10%">Item N°</td>
                        <td style="width:10%">Cantidad</td>
                        <td rowspan="4">IMAGEN</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td rowspan="4" style="text-align: center; font-size: 20px">R X3 Z3</td>
                    </tr>
                    <tr>
                        <td rowspan="3"><p style="font-size:30px">1</p><br>0,63</td>
                        <td rowspan="3"><p style="font-size:30px">62</p><br>39,06</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="9" style="text-align:left">Notas: SEG 1091 (12) + TAREA 1104 (27)</td>
                    </tr>
                </table>

                <br>

                <table style="width:60%; border: 2px solid">
                    <tr>
                        <td colspan="2" style="font-weight: bold">Material: ALCOA 380</td>
                        <td style="width:30%">90° Cable Ø13/19</td>
                        <td style="width:10%">Fecha</td>
                        <td style="width:5%">Cant</td>
                        <td style="width:5%">OT</td>
                        <td style="width:5%">Rtto</td>
                        <td style="width:5%">QC</td>
                        <td style="width:20%">CODIGO DE PLACA</td>
                    </tr>
                    <tr>
                        <td style="width:10%">Item N°</td>
                        <td style="width:10%">Cantidad</td>
                        <td rowspan="4">IMAGEN</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td rowspan="4" style="text-align: center; font-size: 20px">X2 90° H</td>
                    </tr>
                    <tr>
                        <td rowspan="3"><p style="font-size:30px">2</p><br>0,43</td>
                        <td rowspan="3"><p style="font-size:30px">36</p><br>15,48</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="9" style="text-align:left">Notas: TRANSBA 1023 (12) + TRANSBA 1036 (24)</td>
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