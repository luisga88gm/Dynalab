<?php
    //Start the session.
    session_start();
    if(!isset($_SESSION['user'])) header('location: login.php');

    $user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Packing List - Inventory Management System</title>
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
                    <table style="width:70%; border: 2px solid; border-bottom: none">
                        <tr style="height:100px">
                            <td style="width:15%; border-right:none">LOGO</td>
                            <td colspan="2" style="border-left:none">
                                Bouchard 3432 (B1651BVD) - San Martin - Buenos Aires, Argentina
                                <br>
                                Tel/Fax: 54 11 4713-0391   E-Mail: dynalab@dynalab.com.ar
                            </td>
                        </tr>
                        <tr style="height:40px">
                            <td style="width:5%">Cliente:</td>
                            <td style="width:60%">TRANSBA OLAVARRIA</td>
                            <td>OC 101721</td>
                        </tr>
                        <tr>
                            <td colspan="3">Destino: ET Olavarria 132 kV - Ruta 51 y Av Sarmiento, Olavarria Buenos Aires</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="border-top: 2px solid; border-bottom: 2px solid">LISTA DE EMPAQUE</td>
                        </tr>
                    </table>
                    <table style="width:70%; border: 2px solid; border-top: none">
                        <tr>
                            <td style="width:5%">PALLET N°</td>
                            <td style="width:5%">PESO (Kg)</td>
                            <td style="width:15%">Dimensiones (Mts)</td>
                            <td style="width:5%">CANT.</td>
                            <td style="width:10%">ITEM</td>
                            <td>DESCRIPCION</td>
                        </tr>
                        <tr>
                            <td rowspan="8">1</td>
                            <td rowspan="8">24</td>
                            <td rowspan="8">1,20 x 2,00 x 0,6</td>
                            <td>66</td>
                            <td>10</td>
                            <td>GRILLETE BASE PLANA (MSE 01 100 P)</td>
                        </tr>
                        <tr>
                            <td>66</td>
                            <td>20</td>
                            <td>PREF. INTERIOR RET.(funda) P/CABLE Ø14,6mm (RPO 15 2 180)</td>
                        </tr>
                        <tr>
                            <td>66</td>
                            <td>30</td>
                            <td>PREF. INTERIOR RET.(lazo) P/CABLE Ø14,6mm (RPO 15 2 180)</td>
                        </tr>
                        <tr>
                            <td>32</td>
                            <td>40</td>
                            <td>PROLONGACION FIJA A 90° Ø1/2" X 200 (PF 02 G)</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>50</td>
                            <td>MENSULA SUSP PARA ESTRUCTURA METALICA (MSM 04 150)</td>
                        </tr>
                        <tr>
                            <td>43</td>
                            <td>60</td>
                            <td>GUARDACABO ALUMINIO C/PERNO (GGC 01 2 A)</td>
                        </tr>
                        <tr>
                            <td>80</td>
                            <td>70</td>
                            <td>Tornillo M12 x L=140mm C/2 Ar. Planas + 1 Ar. Grower + Tuerca - p/Sop. Suspension Torre</td>
                        </tr>
                        <tr>
                            <td>46</td>
                            <td>80</td>
                            <td>AMORTIGUADOR SVD P/CABLE Ø14,6mm (AV TOR)</td>
                        </tr>
                        <tr style="border-top: 2px solid">
                            <td colspan="2">Peso Total (Kg):</td>
                            <td>250</td>
                            <td colspan="2">Cantidad de Bultos:</td>
                            <td>2 Bultos</td>
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