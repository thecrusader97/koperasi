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
    $instansi = $_POST['instansi'];
    $nominal = $_POST['nominal'];
    $admraw = $_POST['admin2'];
    $raw = $_POST['raw'];
    $adm = $nominal - $admraw;
    $currentDateTime = date('Y-m-d H:i:s');
    $total = $raw + $adm;
    
        
    // update user data
    $result = mysqli_query($conn, "UPDATE simpanan SET kode='$kode',total='$total' WHERE simpananid=$id");
    $result = mysqli_query($conn, "INSERT INTO t_simpanan(idsimpanan,kode,nominal,adm,sub,kategori,tgl) VALUES('$id','$kode','$nominal','$admraw','$adm','simpanan','$currentDateTime')");
    
    // Redirect to homepage to display updated user in list
    header("Location: simpanan.php");
}

?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id

$result = mysqli_query($conn, "SELECT * FROM anggota INNER JOIN simpanan ON simpanan.kode = anggota.kode  WHERE trash='0' AND simpananid=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $id = $user_data['simpananid'];
    $kode = $user_data['kode'];
    $nama = $user_data['nama'];
    $instansi = $user_data['instansi'];
    $total = $user_data['total'];
   
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
                        <h1 class="h3 mb-0 text-gray-800">Edit data Anggota</h1>
                       
                    </div>
                    <div class="card shadow mb-4">
                                <div class="card-body">

                                <form action="add_simpanan.php" method="post" name="form1">
                                <div class="form-group">
                                    <label class="form-label"> Nomor Anggota:</label>
                                    <input class="form-control" type="text" id="anggotaid" name="anggotaid" value=<?php echo $kode;?> readonly>
                                </div>
                                <div class="form-group">
                                    <label class="form-label"> atas nama:</label>
                                    <input class="form-control" type="text" id="nama" name="nama" value=<?php echo $nama;?> readonly>
                                </div>
                                <div class="form-group">
                                    <label class="form-label"> biaya admin:</label>
                                    <input class="form-control" type="text" id="admin2" name="admin2"value=<?php echo $adm2;?> readonly>
                                    
                                </div>
                                <div class="form-group">
                                    <label class="form-label"> nominal Yang mau di tambahkan:</label>
                                    <input class="form-control" type="text" id="nominal" name="nominal">
                                </div>
                                
                                <div class="form-group">
                                    
                                    <input class="form-control" type="hidden" id="id" name="id" value=<?php echo $id;?>>
                                </div>
                                <div class="form-group">
                                    
                                    <input class="form-control" type="hidden" id="raw" name="raw" value=<?php echo $total;?>>
                                </div>
                                
                                
                                
                                <div class="form-group">
                                <input class="btn btn-success" type="submit" name="update" value="Add">
				                <a href="simpanan.php" class="btn btn-danger">Kembali</a>
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