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
                        <h1 class="h3 mb-0 text-gray-800">Riwayat cicilan</h1>
                        
                    </div>
                    <div class="card shadow mb-4">
                    <div class="card-body">
                               

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Id anggota</th>
                            <th scope="col">tanggal bayar</th>
                            <th scope="col">nominal</th>
                           
                            <!-- <th scope="col">Action</th> -->
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'config.php';
                            $id = $_GET['id'];
                         
                            $get_data = mysqli_query($conn,"SELECT * FROM t_pinjaman  WHERE pinjamanid ='$id'");		
                                    
                            $no = 1;
                            while ($data = mysqli_fetch_array($get_data)) {
                            ?>
                            <tr>
                            <th><?php echo $no++; ?></th>
                            <td><?php echo $data['kode']; ?></td>
                            <td><?php echo $data['tgl_bayar']; ?></td>
                            <td><?php echo $data['n_bayar']; ?></td>
                            
                           
                            <td>
                            <!-- <a href="add_simpanan.php?id=<?php echo $data['simpananid'] ?>" class="btn btn-success text-white">Cetak Bukti</a> -->
                       
			                
                            </td>
                            
                            </tr>
                            <?php } ?>
                           
                           
                        </tbody>
                        </table>
                        <a href="pinjaman.php" class="btn btn-danger">Kembali</a>
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