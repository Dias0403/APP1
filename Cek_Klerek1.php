<?php 
session_start();
if ( !isset($_SESSION['id'])){
  header("location:index.php");
  exit;
}
$nama =$_SESSION["user"];

 ?>


 
<?php
// ob_start();
// session_start();

include "koneksi.php";
// include "auth.php";
// include "tanggal/fungsi/fungsi_indotgl.php";

if(isset($_POST['btn'])):
    //membuat session array dengan variabel - variabel POST
    $_SESSION['pos']=$_POST;
endif;

if(isset($_SESSION['pos'])):
// $tgl_awal=$_SESSION['pos']['tgl_awal'];
// $tgl_akhir=$_SESSION['pos']['tgl_akhir'];
// $tgl1=tgl_indo($tgl_awal);
// $tgl2=tgl_indo($tgl_akhir);

else:
    // $tgl1   ='';
    // $tgl2 ='';
    $no=1;
endif;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>IT Helpdesk2024</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/h.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link type="text/css" href="tanggal/development-bundle/themes/base/ui.all.css" rel="stylesheet"/>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Javascript -->
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<!-- <script type="text/javascript" src="jquery.tablescroll.js"></script> -->

  <script type="text/javascript" src="tanggal/development-bundle/jquery-1.3.2.js"></script>
 <script type="text/javascript" src="tanggal/development-bundle/ui/ui.core.js"></script>
  <script type="text/javascript" src="tanggal/development-bundle/ui/ui.datepicker.js"></script>
  <script type="text/javascript" src="tanggal/development-bundle/ui/i18n/ui.datepicker-id.js"></script>
  

   <script type="text/javascript">
  $(document).ready(function(){
  $("#tgl_awal").datepicker({
       altFormat:"dd MM yy",
       changeMonth : true,
       changeYear : true
     });
     $("#tgl_awal").change (function(){
       $("#tgl_awal").datepicker("option","dateformat","dd-mm-yy" );
   });
   });
   </script>
   <script type="text/javascript">
   $(document).ready(function(){
     $("#tgl_akhir").datepicker({
       altFormat:"dd MM yy",
       changeMonth: true,
       changeYear:true
     });
     $("#tgl_akhir").change (function(){
       $("#tgl_akhir").datepicker("option","dateformat","dd-mm-yy" );
   });
   });
</script>

<style>
        /* Gaya untuk animasi loading */
        .loading-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }

        .loading-spinner {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }


        @keyframes blink {
            0% { opacity: 1; }
            50% { opacity: 0; }
            100% { opacity: 1; }
        }

        .blinking-text {
            font-family: Calibri, sans-serif;
            font-weight: bold;
            color: red;
            font-size: 20px;
            animation: blink 1s infinite;
        }
  

    </style>

     <script>
        // Menampilkan overlay loading saat form disubmit
        function showLoading() {
            document.getElementById('loadingOverlay').style.display = 'flex';
        }
    </script>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="menu.php" class="logo d-flex align-items-center">
        <img src="assets/img/h.png" alt="">
        <span class="d-none d-lg-block">IT Helpdesk</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

   
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

             <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/user.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Hello, <?php echo $nama; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $nama; ?></h6>
              <!-- <span>Web Designer</span> -->
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            
            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Keluar</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="menu.php">
          <i class="bi bi-grid"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->

     
      <li class="nav-item">
        <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-telephone"></i><span>Contact SAT</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="tables-general.php" class="active">
              <i class="bi bi-circle"></i><span>EXT Cabang</span>
            </a>
          </li>
          <li>
            <a href="tables-data.php">
              <i class="bi bi-circle"></i><span>Telp Karyawan</span>
            </a>
          </li>
            <li>
            <a href="tables-data2.php">
              <i class="bi bi-circle"></i><span>Telp IT Cabang</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

       <li class="nav-item">
        <a class="nav-link collapsed" href="tables-data-toko.php">
          <i class="bi bi-shop"></i>
          <span>Data Toko</span>
        </a>
      </li>

           <li class="nav-heading">Pages</li>

           <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.php">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

     
      <li class="nav-item">
        <a class="nav-link " data-bs-target="#report-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-pencil-square"></i><span>Report</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="report-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
         
          
       <li>
            <a href="sla_office.php">
              <i class="bi bi-circle"></i><span>Sla Office</span>
            </a>
          </li>

           <li>
            <a href="lap_progress_office.php">
              <i class="bi bi-circle"></i><span>Lap Progress Office</span>
            </a>
          </li>

          <li>
            <a href="http://33.33.0.51/my_app/report_sla.php">
              <i class="bi bi-circle"></i><span>Report Harian</span>
            </a>
          </li>



        </ul>
      </li>

       <li class="nav-item">
        <a class="nav-link " data-bs-target="#kpi-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-file-text"></i><span>Cetak Struk</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="kpi-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">

          <li>
            <a href="struk1.php">
              <i class="bi bi-circle"></i><span>No bon</span>
            </a>
          </li>

          <li>
            <a href="member.php" >
              <i class="bi bi-circle"></i><span>Member</span>
            </a>
          </li>

           <li>
            <a href="struk-online.php" >
              <i class="bi bi-circle"></i><span>Order Online</span>
            </a>
          </li>

        </ul>
      </li> 

     
       <li class="nav-item">
        <a class="nav-link " data-bs-target="#android-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-wrench-adjustable"></i><span>Android Tools</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="android-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">

           <li>
            <a href="Varplus.php">
              <i class="bi bi-circle"></i><span>Varplus</span>
            </a>
          </li>

             <li>
            <a href="varnew.php">
              <i class="bi bi-circle"></i><span>CekVar</span>
            </a>
          </li>

           <li>
            <a href="mon-klerek.php">
              <i class="bi bi-circle"></i><span>Monitoring Klerek</span>
            </a>
          </li>

          <li>
            <a href="netlp.php">
              <i class="bi bi-circle"></i><span>NetLp</span>
            </a>
          </li>

          <li>
            <a href="retur.php" >
              <i class="bi bi-circle"></i><span>Retur</span>
            </a>
          </li>

            <li>
            <a href="Sji.php" >
              <i class="bi bi-circle"></i><span>SJI</span>
            </a>
          </li>

           <li>
            <a href="koreksi.php" >
              <i class="bi bi-circle"></i><span>Koreksi</span>
            </a>
          </li>

          <li>
            <a href="compare-selisih.php" >
              <i class="bi bi-circle"></i><span>Compare Selisih</span>
            </a>
          </li>

          <li>
            <a href="noncommerce.php" >
              <i class="bi bi-circle"></i><span>Non Commerce</span>
            </a>
          </li>

           <li>
            <a href="KlerekVsTrans.php" >
              <i class="bi bi-circle"></i><span>Cek Klerek Vs Trans</span>
            </a>
          </li>

           <li>
            <a href="promo.php" >
              <i class="bi bi-circle"></i><span>Cek Promo</span>
            </a>
          </li>

           <li>
            <a href="Voucher.php" >
              <i class="bi bi-circle"></i><span>Insert Trans Voucher Manual</span>
            </a>
          </li>

          <li>
            <a href="log_Voucher.php" >
              <i class="bi bi-circle"></i><span>Insert Transaksi Voucher</span>
            </a>
          </li>


          <li>
            <a href="GenerateWA.php" >
              <i class="bi bi-circle"></i><span>Konfirmasi Close AHO</span>
            </a>
          </li>
          

        </ul>
      </li> 

       <li class="nav-item">
        <a class="nav-link " data-bs-target="#tools-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-tools"></i><span>Tools</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tools-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="https://store-support-console.sat.co.id/"target="_blank">
              <i class="bi bi-circle"></i><span>Store Support Console</span>
            </a>
          </li>
           <li>
            <a href="https://hoiris0202.sat.co.id/"target="_blank" >
              <i class="bi bi-circle"></i><span>Iris New</span>
            </a>
          </li>
          <li>
            <a href="https://intranet.sat.co.id/offices/public/"target="_blank" >
              <i class="bi bi-circle"></i><span>Helpdesk Online</span>
            </a>
          </li>
          <li>
            <a href="https://homr0202.sat.co.id:8090/"target="_blank" >
              <i class="bi bi-circle"></i><span>Management Report</span>
            </a>
          </li>
           <li>
            <a href="https://intranet.sat.co.id/koperasi/public/"target="_blank" >
              <i class="bi bi-circle"></i><span>Koperasi Online</span>
            </a>
          </li>
          <li>
            <a href="https://asl.sat.co.id/?data=QlpoOTFBWSZTWYM1uHgAAK6fgFBn__go7w6AP-_e2jAA-1kIqemps1Q2SG9TU9EHqD1HqBkGagIpoE9EzU9DQJ6AJgAJppganqAT0iGQ9KbSaMh6QDGmkyZtgBBBVlTyiL8GzoO_GzPe9WCfePFH9ipVZF2O-1QxoZkME4pQFMBfIonDJbG0o_lpACAscb0BVWhnFDAR1MZVk1XUTgmSLw4UtMElAj2RA-zUkXBwhOWGEn1pWxiwrcwo04LNGyCrYTCHi0gOOpxU-Y8AZIBbQnStBMyh0e4bNyHzL9YnIlSw0aAhO2991URbkwtbvUe5L76A71Z6zfVkgypDj8SGvdTESdXfB0tQZxm5hIJ2NWs-NVRt-Xc8vpILNzNOapb39Y9m23aIaCmRVrGNpMihWE0vmv_b3F3JFOFCQgzW4eA="target="_blank" >
              <i class="bi bi-circle"></i><span>Human Capital</span>
            </a>
          </li>
             <li>
            <a href="https://10.231.3.66/websso/SAML2/SSO/vsphere.local?SAMLRequest=zVRdb9owFH3fr4j8njgxrFCrULGyapX6wRo2TXuZLskFLCV25usk9N%2FPCbCiqqv6uFfr3HPPx5Uv%0ALndlETRoSRk9YUkUswB1ZnKlNxP2bXkdjtnl9MMFQVlUcla7rX7E3zWSC2ZEaJ0fuzKa6hJtirZR%0AGd7oHHcT5onmHqY0uJ5661xFkvMkjsQgiQbR2RlvcUVkeDq7uxU8TR94Q9UWLUaFyaBgwbWxGfZL%0AJ2wNBSELbuYT9kvkq3w0Gn08H4khjAHGeb7CHGE8BDEQMPIwWgCRavB5kKj22siBdhMmYjEM4%2FMw%0ASZZxIpNEekn%2B6ScLFtY4k5nik9L7EGqrpQFSJDWUSNJlshMsRRTL1R5E8styuQgXD%2BmyJ2hUjvbe%0Ao32iz3blcDhgwfdj1qLL2qevSfbpvr2pOshi00MXvR%2F7fgI41sWmr1VRK96RHCsp0UEODi746bb9%0AblHJztvNfGEKlT0Fs6Iw7ZVFcN6vszX2xZXg3hbUvag8XPdQWXWxkEPtWJAuOv6vNRRqrdC%2Bfjv%2F%0AEHwaqXhvpvxgTPpTzlUXEp3SvDvYlywHksaP7E14D03Zgr%2FwzJScsi2WQBycs2FPzEWcCB4P%2Beed%0Aj6K7Ezoa2pH6y9G2bdQOImM3fiBO%2BI%2B727TnClV%2F4JmvwOOle6p8Jd16%2BYgaW1gVuPRvrxj%2Bj6TO%0AscDNqVT%2Bspzp8SxPP6TpHw%3D%3D&SigAlg=http%3A%2F%2Fwww.w3.org%2F2001%2F04%2Fxmldsig-more%23rsa-sha256&Signature=YEmHCc4Yx8TV1bqgDkQ2VstmZKRpAtiFvonbyXoin%2BRKtB5i4F5AN9Ac5QSgs52MJXtVRQXF%2FdlR%0AEV53sSCKjeGGVqFL1csmjuZJ5zrfAoIy5IC6iz2dXFhPD2rwln7xZPgoeO0N7ya6sv0YLi2r%2BAB3%0Ac48uQUbD7cCdF%2BaZaltLWPBApjnevgmTIWKGPP2r%2B5JuaTz2UkvdUOIwjdHKc4oE9BYDmESgjPw0%0ACTWX7Vrmmg0Ais%2F2%2Bd%2BFPWzbS6PEJt73VUB9AnnGQakch7wQctjmHtp9ROqPoEzfJ76TGl3%2BbB8n%0AX1RcQd%2B%2Bqjbx%2FUnsKZZLVuCYtBVzmBb66sVGeg%3D%3D"target="_blank" >
              <i class="bi bi-circle"></i><span>VMWare Autosave</span>
            </a>
          </li>
           <li>
            <a href="http://10.234.152.221/alfamart_cc/login"target="_blank" >
              <i class="bi bi-circle"></i><span>eCentriX CRM</span>
            </a>
          </li>
          <li>
            <a href="http://10.234.152.167/rrakview/public/list"target="_blank" >
              <i class="bi bi-circle"></i><span>Cek RRAK</span>
            </a>
          </li>
           <li>
            <a href="https://intranet.sat.co.id/nms/public/"target="_blank" >
              <i class="bi bi-circle"></i><span>NMS</span>
            </a>
          </li>
            <li>
            <a href="https://intranet.sat.co.id/dbms/login.php"target="_blank" >
              <i class="bi bi-circle"></i><span>DBMS</span>
            </a>
          </li>
          <li>
            <a href="https://hodbanet0101.sat.co.id/raizen_beta/"target="_blank" >
              <i class="bi bi-circle"></i><span>DBMS Raizen</span>
            </a>
          </li>
          
        </ul>
      </li>


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Cek Klerek Nik </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="menu.php">Home</a></li>
          <li class="breadcrumb-item">Cek</li>
          <li class="breadcrumb-item active">Klerek Nik</li>
          <li class="breadcrumb-item"><a href="cek-klerek.php">Cek Klerek Nik</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

         
        </div>

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Cek Klerek Nik </h5>


               <div class="content-box-left">
        <div class="content-box-left">
              <div class="content-box-left-in">
                <form method="post" onsubmit="showLoading()">
                <!--   <div> -->
                    <!-- <label for="tgl_awal">Dari Tanggal</label>
                    <input type="text" id="tgl_awal" name="tgl_awal" align="center" />
                    <label for="tgl_akhir">Sampai Tanggal</label>
                    <input type="text" id="tgl_akhir" name="tgl_akhir" align="center" /> -->
                    <!--  <label for="num_prob">No Problem</label>
                    <input type="text" id="No Problem" name="num_prob" align="center" />
                    <input type="submit" value="Proses" name="btn" />
                 </div> -->
                </form>

                <div class="loading-overlay" id="loadingOverlay">
<div class="spinner-border text-info" role="status">
  <span class="sr-only"></span>
</div>
</div>

              <!--   <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-spinner"></div>
    </div> -->



                  <?php
// Initialize variables
$store_id = null;
$user_id = null;
$date_clerk = null;
$cashnew = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $store_id = htmlspecialchars($_POST['store_id']);
    $user_id = htmlspecialchars($_POST['user_id']);
    $date_clerk = htmlspecialchars($_POST['date_clerk']);
    $cashnew = htmlspecialchars($_POST['cashnew']);


// Step 1: Establish a connection to SQL Server
include "koneksi3.php";
   
   




    // Step 3: Write and execute the SQL query
$sql = "
    SELECT 
        store_id, 
        user_id, 
        user_name, 
        date_clerk, 
        cash_clerk, 
        difference, 
         CAST($4 AS numeric) AS cash_clerk_new,
        (CAST($4 AS numeric)- amount - amount_non_commerce - charity + card + cash_out + voucher + wallet + ol_payment + round_c) AS hasil_update 
    FROM 
        tx_clerk 
    WHERE 
        store_id = $1 AND 
        user_id = $2 AND 
        date_clerk = $3
";

$result = pg_query_params($conn1, $sql, array($store_id, $user_id, $date_clerk, $cashnew));
if (!$result) {
    echo "An error occurred while executing the query.";
} else {
    // echo "<table border='1'>";
   echo "<table id='dataTable1' border='1' style='border-collapse: collapse; width: 100%; margin: left; table-layout: fixed;'>";
    echo "<tr style='background-color: #34495e; color: white; font-size: 16px; font-weight:bold; font-family: calibri;'>
              <th>store_id</th>
              <th>user_id</th>
              <th>user_name</th>
              <th>date_clerk</th>
              <th>cash_clerk</th>
              <th style='color: yellow;'>difference</th>
              <th>Setoran Seharusnya</th>
              <th style='color: red;'>HASIL UPDATE</th>
              <th>UPDATE</th>
          </tr>";
    while ($row = pg_fetch_assoc($result)) {
        // Ambil nilai difference dan hasil_update
        $difference = $row['difference'];
        $hasil_update = $row['hasil_update'];
        
        // Konversi date_clerk ke objek DateTime dan dapatkan bulan serta tahun
$dateClerk = new DateTime($row['date_clerk']);
$monthClerk = (int)$dateClerk->format('n'); // Bulan dari date_clerk (1 - 12)
$yearClerk = (int)$dateClerk->format('Y'); // Tahun dari date_clerk
        
// Dapatkan tanggal, bulan, dan tahun saat ini
$currentDay = (int)date('j'); // Tanggal saat ini (1 - 31)
$currentMonth = (int)date('n'); // Bulan saat ini (1 - 12)
$currentYear = (int)date('Y'); // Tahun saat ini
        
        // Hitung bulan + 1 dari date_clerk
        $nextMonthClerk = $monthClerk + 1;
    $nextMonthClerk2 = $monthClerk + 2;
    $nextYearClerk = $yearClerk;

if ($nextMonthClerk > 12) {
    $nextMonthClerk -= 12;
    $nextYearClerk++; // Tahun bertambah jika bulan lebih dari Desember
}

$nextMonthClerk2 = $monthClerk + 2;
$nextYearClerk2 = $yearClerk;

if ($nextMonthClerk2 > 12) {
    $nextMonthClerk2 -= 12;
    $nextYearClerk2++; // Tahun bertambah jika bulan lebih dari Desember
}

        echo "<tr style='font-size: 14px; font-weight:bold; font-family: calibri;'>
                  <td>" . htmlspecialchars($row['store_id']) . "</td>
                  <td>" . htmlspecialchars($row['user_id']) . "</td>
                  <td>" . htmlspecialchars($row['user_name']) . "</td>
                  <td>" . htmlspecialchars($row['date_clerk']) . "</td>
                  <td>" . htmlspecialchars($row['cash_clerk']) . "</td>
                  <td style='color: red;'>" . htmlspecialchars($difference) . "</td>
                  <td>" . htmlspecialchars($row['cash_clerk_new']) . "</td>
                  <td style='color: blue;'>" . htmlspecialchars($hasil_update) ."</td>
                  <td>";
                  
        // Logika untuk tombol Backup & Update
        if ($difference > 20000 && $hasil_update < 20000 && $hasil_update > -400000 &&
    !(($currentDay >= 1 && $currentMonth == $nextMonthClerk2 && $currentYear == $nextYearClerk2) ||
      ($currentDay >= 2 && $currentMonth == $nextMonthClerk && $currentYear == $nextYearClerk))) 
      {
            echo "<form action='updateklerek.php' method='POST'>
                <label style='display:none'>kode store</label><input type='text' value='".$row['store_id']."' name='stid' readonly style='display:none'/>
                <label style='display:none'>nik</label><input type='text' value='".$row['user_id']."' name='nik' readonly style='display:none' />
                <label style='display:none'>Tgl Klerek</label><input type='text' value='".$row['date_clerk']."' name='tgl' readonly style='display:none' />
                <label style='display:none'>Setoran Seharusnya</label><input type='text' value='".$row['cash_clerk_new']."' name='cashn' readonly style='display:none'/>
                <input type='submit' value='Backup&Update' >
                </form>";
        } else {
            // Tombol hidden jika hari ini tanggal 3 pada bulan + 1 dari date_clerk
            echo "<span style='color: gray;'>Backup & Update tidak tersedia</span>";
        }
        
        echo "</td>
          </tr>";
    }
    echo "</table>";
}


echo "<p class='blinking-text';style:font-family: calibri;font-weight: bold;>WARNING:</p>";
echo "<p style='color: red; font-family: calibri;font-weight: bold;'>KLIK UPDATE AKAN LANGSUNG TERUPDATE</p>";
echo "<p style='color: black; font-family: calibri;font-weight: bold;'>Tombol tidak tampil jika Diferent>=0, Hasil Update > 10000 atau < -100.000</p>";
echo "<p style='color: black; font-family: calibri;font-weight: bold;'>Tombol tidak tampil jika Bulan+1 dari bulan BAP dan tanggal hari ini>= Tanggal 2</p>";
// Close the PostgreSQL connection
pg_close($conn1);
}
?>
<BR>

<?php
// Initialize variables
$store_id = null;
$user_id = null;
$date_clerk = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $store_id = htmlspecialchars($_POST['store_id']);
    $user_id = htmlspecialchars($_POST['user_id']);
    $date_clerk = htmlspecialchars($_POST['date_clerk']);


// Step 1: Establish a connection to SQL Server
include "koneksi3.php";
   
   




    // Step 3: Write and execute the SQL query
$sql = "
    SELECT 
        store_id, 
        user_id, 
        user_name, 
        date_clerk, 
        cash_clerk, 
        difference
    FROM 
        log_bc_clerk 
    WHERE 
        store_id = $1 AND 
        user_id = $2 AND 
        date_clerk = $3
";

$result = pg_query_params($conn1, $sql, array($store_id, $user_id, $date_clerk));
if (!$result) {
    echo "An error occurred while executing the query.";
} else {
    echo "LOG_BC_CLERK";
    // echo "<table border='1'>";
    echo "<table id='dataTable1' border='1' style='border-collapse: collapse; width: 100%; margin: left; table-layout: fixed;'>";
    echo "<tr style='background-color: #34495e; color: white; font-size: 16px; font-weight:bold; font-family: calibri;'>
              <th>store_id</th>
              <th>user_id</th>
              <th>user_name</th>
              <th>date_clerk</th>
              <th>cash_clerk</th>
              <th >difference</th>
          </tr>";
    while ($row = pg_fetch_assoc($result)) {
       

        echo "<tr style='font-size: 14px; font-weight:bold; font-family: calibri;'>
                  <td>" . htmlspecialchars($row['store_id']) . "</td>
                  <td>" . htmlspecialchars($row['user_id']) . "</td>
                  <td>" . htmlspecialchars($row['user_name']) . "</td>
                  <td>" . htmlspecialchars($row['date_clerk']) . "</td>
                  <td>" . htmlspecialchars($row['cash_clerk']) . "</td>
          <td>" . htmlspecialchars($row['difference']) . "</td>
            </tr>";
    }
    echo "</table>";
}

// Close the PostgreSQL connection
pg_close($conn1);
}
?>


              </div>
          </div>
      </div>

              </div>
          </div>

    </section>

  </main><!-- End #main -->

  <script>
 // Mendapatkan referensi ke tabel
const table = document.getElementById("dataTable1");

</script>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>IT Helpdesk 2024</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <!-- <script src="assets/vendor/tinymce/tinymce.min.js"></script> -->
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  
</body>

</html>