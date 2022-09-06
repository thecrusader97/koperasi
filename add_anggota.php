<?php
include 'components/head.php';
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
                        <h1 class="h3 mb-0 text-gray-800">Tambah data Anggota</h1>
                       
                    </div>
                    <div class="card shadow mb-4">
                                <div class="card-body">

                                <form action="add_anggota.php" method="post" name="form1">
                                <div class="form-group">
                                    <label class="form-label"> Nomor Anggota:</label>
                                    <input class="form-control" type="text" id="anggotaid" name="anggotaid">
                                </div>
                                <div class="form-group">
                                    <label class="form-label"> nama:</label>
                                    <input class="form-control" type="text" id="nama" name="nama">
                                </div>
                                <div class="form-group">
                                    <label class="form-label"> Instansi:</label>
                                    <input class="form-control" type="text" id="instansi" name="instansi">
                                </div>
                             
                                
                                
                                <div class="form-group">
                                <input class="btn btn-success" type="submit" name="Submit" value="Tambah">
				                <a href="anggota.php" class="btn btn-danger">Kembali</a>
                                </div>

                                </form>
                                <?php
 
                                // Check If form submitted, insert form data into users table.
                                if(isset($_POST['Submit'])) {
                                    $kode = $_POST['anggotaid'];
                                    $nama = $_POST['nama'];
                                    $instansi = $_POST['instansi'];
                                    $currentDateTime = date('Y-m-d H:i:s');
                                    
                                    
                                    // include database connection file
                                    include_once("config.php");
                                            
                                    // Insert user data into table
                                    $result = mysqli_query($conn, "INSERT INTO anggota(kode,nama,instansi,trash) VALUES('$kode','$nama','$instansi','0')");
                                    $result = mysqli_query($conn, "INSERT INTO simpanan(kode,total,tgl) VALUES('$kode','0','$currentDateTime')");
                                    
                                    // Show message when user added
                                    echo "User berhasil di tambahkan. <a href='anggota.php'>lihat data</a>";
                                }
                                ?>

                    
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