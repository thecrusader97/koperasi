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
                        <h1 class="h3 mb-0 text-gray-800">Pinjaman</h1>
                        <a href="pengajuan.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Ajukan Pinjaman</a>
                        
                    </div>
                    <div class="card shadow mb-4">
                                <div class="card-body">
                                <form action="pinjaman.php" method="get">
                                    <label>Cari Berdasarkan nama :</label>
                                    <input type="text" name="cari">
                                    <input class="btn btn-warning text-white" type="submit" value="Cari">
                                </form>
                                
                                <?php 
                                if(isset($_GET['cari'])){
                                    $cari = $_GET['cari'];
                                    echo "<b>Hasil pencarian : ".$cari."</b>";
                                }
                                ?>

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID anggota</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Total pinjaman</th>
                            <th scope="col">Sisa pinjaman</th>
                            <th scope="col">Sisa cicilan</th>
                            
                            <th scope="col">Action</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'config.php';
                            
                            if(isset($_GET['cari'])){
                                $cari = $_GET['cari'];
                            $get_data = mysqli_query($conn,"SELECT * FROM anggota INNER JOIN pinjaman ON pinjaman.kode = anggota.kode WHERE anggota.nama LIKE '%".$cari."%' OR anggota.kode LIKE '%".$cari."%' AND trash='0'"  );
                                    }else{
                                        $get_data = mysqli_query($conn,"SELECT * FROM anggota INNER JOIN pinjaman ON pinjaman.kode = anggota.kode  WHERE trash='0'");		
                                    }
                                    $no = 1;
                            while ($data = mysqli_fetch_array($get_data)) {
                                
                            ?>
                            <tr>
                            <th><?php echo $no++; ?></th>
                            <td><?php echo $data['kode']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td>Rp. <?php echo number_format($data['pokok'], 0, ',', '.'); ?></td>
                            <td>Rp. <?php echo number_format($data['s_pokok'], 0, ',', '.'); ?></td>
                            
                            
                            <td><?php echo $data['s_cicilan']; ?></td>
                          
                           
                           
                            <td>
                            <a href="b_cicilan.php?id=<?php echo $data['pinjamanid'] ?>" class="btn btn-success text-white">Bayar Cicilan</a>
                            
                            
                            <a href="r_cicilan.php?id=<?php echo $data['pinjamanid'] ?>" class="btn btn-warning text-white">Riwayat transaksi</a>
			                
                            </td>
                            
                            </tr>
                            <?php } ?>
                           
                           
                        </tbody>
                        </table>
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