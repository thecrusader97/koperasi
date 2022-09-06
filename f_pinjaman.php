<?php
include 'components/head.php';
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    
    $kode = $_POST['kode'];
    $pokok = $_POST['pokok'];
    
    $cicilan = $_POST['cicilan'];
    $mulai = $_POST['mulai'];
    $akhir = date('Y-m-d', strtotime(''.+$cicilan.' month', strtotime($mulai)));
    $n_cicilan = round($pokok/$cicilan);
    $result = mysqli_query($conn, "INSERT INTO pinjaman(kode,pokok,cicilan,n_cicilan,s_pokok,s_cicilan,tgl_awal,tgl_akhir) VALUES('$kode','$pokok','$cicilan','$n_cicilan','$pokok','$cicilan','$mulai','$akhir')");
    
    // Redirect to homepage to display updated user in list
    header("Location: home.php");
}

?>
<?php
// Display selected user data based on id
// Getting id from url
$kode = $_GET['kode'];
 
// Fetech user data based on id

$result = mysqli_query($conn, "SELECT * FROM anggota WHERE trash='0' AND kode=$kode");
 
while($user_data = mysqli_fetch_array($result))
{
   
    $kode = $user_data['kode'];
    $nama = $user_data['nama'];
    $instansi = $user_data['instansi'];
    $currentDate = date('Y-m-d');
    
   
}

$result2 = mysqli_query($conn, "SELECT * FROM biaya ;");
while($data_biaya = mysqli_fetch_array($result2))
{
    $adm2 = $data_biaya['a_nominal'];
   
   
}
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
                        <h1 class="h3 mb-0 text-gray-800">Form Pinjaman</h1>
                       
                    </div>
                    <div class="card shadow mb-4">
                                <div class="card-body">

                                <form action="f_pinjaman.php" method="post" name="form1">
                                <div class="form-group">
                                    <label class="form-label"> Nomor Anggota:</label>
                                    <input class="form-control" type="text" id="kode" name="kode" value=<?php echo $kode;?> readonly>
                                </div>
                                <div class="form-group">
                                    <label class="form-label"> atas nama:</label>
                                    <input class="form-control" type="text" id="nama" name="nama" value=<?php echo $nama;?> readonly>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label"> tanggal pinjam:</label>
                                    <input class="form-control" type="text" id="mulai" name="mulai" value=<?php echo $currentDate ;?> readonly>
                                </div>
                                <div class="form-group">
                                    <label class="form-label"> nominal Yang mau di pinjam:</label>
                                    <input class="form-control" type="text" id="pokok" name="pokok">
                                </div>
                                
                                <div class="form-group">
                                <label class="form-label" for="cicilan">Jumlah Cicilan:</label>
                                    <select class="form-control" name="cicilan" id="cicilan">
                                    <option value="1">1</option>
                                    <option value="6">6</option>
                                    <option value="12">12</option>
                                    <option value="32">32</option>
                                </select>
                                </div>

                                
                                <div class="form-group">
                                    
                                    <input class="form-control" type="hidden" id="id" name="id" value=<?php echo $kode;?>readonly>
                                </div>
                                
                                
                                
                                
                                <div class="form-group">
                                <input class="btn btn-success" type="submit" name="update" value="Add">
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