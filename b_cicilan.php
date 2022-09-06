<?php
include 'components/head.php';
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    
    $id = $_POST['id'];
    $kode = $_POST['anggotaid'];
    $nama = $_POST['nama'];
    $n_cicilan = $_POST['n_cicilan'];
    $s_pokok= $_POST['s_pokok'];
    $s_cicilan= $_POST['s_cicilan'];
    $raw = $_POST['raw'];
    $admraw = $_POST['admin2'];
    $adm = $nominal + $admraw;
    $currentDateTime = date('Y-m-d H:i:s');
    $jml = $_POST['jml'];
    $jmlc = $s_cicilan-'1';
    $tgl = $_POST['tgl'];
    $total =  $n_cicilan+$adm2;
        
    // update user data
    if ($nominal > $raw){
        header("Location: pinjaman.php");
    }else{
    $result = mysqli_query($conn, "UPDATE pinjaman SET kode='$kode',s_pokok='$jml',s_cicilan='$jmlc' WHERE pinjamanid=$id");
    $result = mysqli_query($conn, "INSERT INTO t_pinjaman(pinjamanid,kode,tgl_bayar,n_bayar,adm) VALUES('$id','$kode','$tgl','$total','$admraw')");
    
    // Redirect to homepage to display updated user in list
    header("Location: pinjaman.php");
    }
}

?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM anggota INNER JOIN pinjaman ON pinjaman.kode = anggota.kode  WHERE trash='0' AND pinjamanid=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $id = $user_data['pinjamanid'];
    $kode = $user_data['kode'];
    $nama = $user_data['nama'];
    $instansi = $user_data['instansi'];
    $n_cicilan = $user_data['n_cicilan'];
    $currentDate = date('Y-m-d');
    $s_pokok = $user_data['s_pokok'];
    $s_cicilan = $user_data['s_cicilan'];
    $jml = $s_pokok-$n_cicilan ;
    
   
}
$result2 = mysqli_query($conn, "SELECT * FROM biaya ;");
while($data_biaya = mysqli_fetch_array($result2))
{
    $adm2 = $data_biaya['a_nominal'];
   
   
}
$total=$n_cicilan+$adm2;



?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
    <?php
        include 'components/sidebar.php';
        ?>
            

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php
                include 'components/header.php';
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Bayar cicilan</h1>
                       
                    </div>
                    <div class="card shadow mb-4">
                                <div class="card-body">

                                <form action="b_cicilan.php" method="post" name="form1">
                                <div class="form-group">
                                    <label class="form-label"> Nomor Anggota:</label>
                                    <input class="form-control" type="text" id="anggotaid" name="anggotaid" value=<?php echo $kode;?> readonly>
                                </div>
                                <div class="form-group">
                                    <label class="form-label"> atas nama:</label>
                                    <input class="form-control" type="text" id="nama" name="nama" value=<?php echo $nama;?> readonly>
                                </div>
                                <div class="form-group">
                                    <label class="form-label"> tanggal bayar:</label>
                                    <input class="form-control" type="text" id="tgl" name="tgl" value=<?php echo $currentDate;?> readonly>
                                </div>
                                <div class="form-group">
                                    <label class="form-label"> biaya admin:</label>
                                    <input class="form-control" type="text" id="admin2" name="admin2"value=<?php echo $adm2;?> readonly>
                                    
                                </div>
                                <div class="form-group">
                                    <label class="form-label"> nilai cicilan:</label>
                                    <input class="form-control" type="text" id="n_cicilan" name="n_cicilan"value=<?php echo $n_cicilan?> readonly>
                                    
                                </div>
                                
                                
                                <div class="form-group">
                                    <label class="form-label"> Total yang harus di bayar : <b>Rp. <?php echo number_format($total, 0, ',', '.');?></b> </label>
                                    
                                </div>
                                <div class="form-group">
                                    
                                    <input class="form-control" type="hidden" id="id" name="id" value=<?php echo $id;?>>
                                </div>
                                <div class="form-group">
                                    
                                    <input class="form-control" type="hidden" id="raw" name="raw" value=<?php echo $total;?>>
                                </div>
                                <div class="form-group">
                                    
                                    <input class="form-control" type="hidden" id="s_pokok" name="s_pokok" value=<?php echo $s_pokok;?>>
                                </div>
                                <div class="form-group">
                                    
                                    <input class="form-control" type="hidden" id="s_cicilan" name="s_cicilan" value=<?php echo $s_cicilan;?>>
                                </div>
                                <div class="form-group">
                                    
                                    <input class="form-control" type="hidden" id="jml" name="jml" value=<?php echo $jml;?>>
                                </div>
                                
                                
                                
                                <div class="form-group">
                                <input class="btn btn-success" type="submit" name="update" value="Bayar">
				                <a href="pinjaman.php" class="btn btn-danger">Kembali</a>
                                </div>

                                </form>
                                

                    
                        </div>
                    

                </div>
                </div>
            </div>
            <!-- End of Main Content -->
            
            <?php
            include 'components/footer.php';
            ?>

</body>

</html>