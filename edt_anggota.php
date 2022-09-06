<?php
include 'components/head.php';
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    
    
    $kode = $_POST['anggotaid'];
    $nama = $_POST['nama'];
    $instansi = $_POST['instansi'];
        
    // update user data
    $result = mysqli_query($conn, "UPDATE anggota SET nama='$nama',instansi='$instansi' WHERE kode=$kode");
    
    // Redirect to homepage to display updated user in list
    header("Location: anggota.php");
}

?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM anggota WHERE kode=$id");
 
while($user_data = mysqli_fetch_array($result))
{
   
    $kode = $user_data['kode'];
    $nama = $user_data['nama'];
    $instansi = $user_data['instansi'];
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

                                <form action="edt_anggota.php" method="post" name="form1">
                                <div class="form-group">
                                    <label class="form-label"> Nomor Anggota:</label>
                                    <input class="form-control" type="text" id="anggotaid" name="anggotaid" value=<?php echo $kode;?> readonly>
                                </div>
                                <div class="form-group">
                                    <label class="form-label"> nama:</label>
                                    <input class="form-control" type="text" id="nama" name="nama" value=<?php echo $nama;?>>
                                </div>
                                <div class="form-group">
                                    <label class="form-label"> Instansi:</label>
                                    <input class="form-control" type="text" id="instansi" name="instansi" value=<?php echo $instansi;?>>
                                </div>
                                
                                
                                
                                <div class="form-group">
                                <input class="btn btn-success" type="submit" name="update" value="Edit">
				                <a href="anggota.php" class="btn btn-danger">Kembali</a>
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