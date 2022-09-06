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
                        <h1 class="h3 mb-0 text-gray-800">Simpanan</h1>
                        
                    </div>
                    <div class="card shadow mb-4">
                    <div class="card-body">
                               

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">jumlah bayar</th>
                            <th scope="col">biaya admin</th>
                            <th scope="col">jumlah simpanan</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Tanggal dan waktu</th>
                            <!-- <th scope="col">Action</th> -->
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'config.php';
                            $id = $_GET['id'];
                         
                            $get_data = mysqli_query($conn,"SELECT * FROM t_simpanan  WHERE idsimpanan ='$id'");		
                                    
                            $no = 1;
                            while ($data = mysqli_fetch_array($get_data)) {
                            ?>
                            <tr>
                            <th><?php echo $no++; ?></th>
                            <td><?php echo $data['nominal']; ?></td>
                            <td><?php echo $data['adm']; ?></td>
                            <td><?php echo $data['sub']; ?></td>
                            <td><?php echo $data['kategori']; ?></td>
                            <td><?php echo $data['tgl']; ?></td>
                           
                            <td>
                            <!-- <a href="add_simpanan.php?id=<?php echo $data['simpananid'] ?>" class="btn btn-success text-white">Cetak Bukti</a> -->
                       
			                
                            </td>
                            
                            </tr>
                            <?php } ?>
                           
                           
                        </tbody>
                        </table>
                        <a href="simpanan.php" class="btn btn-danger">Kembali</a>
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