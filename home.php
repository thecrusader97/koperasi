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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Biaya admin Pertransaksi </div>
                                                <?php
                                                include 'config.php';
                                                $result = mysqli_query($conn, "SELECT * FROM biaya ;");
                                                while($user_data = mysqli_fetch_array($result))
                                                {
                                                    $jml = $user_data['a_nominal'];
                                                }
                                                ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?php echo number_format($jml, 0, ',', '.');?></div>
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Anggota terdaftar</div>
                                                <?php
                                                include 'config.php';
                                                $result = mysqli_query($conn, "SELECT COUNT(kode) as jml FROM anggota WHERE trash='0';");
                                                while($user_data = mysqli_fetch_array($result))
                                                {
                                                    $jml = $user_data['jml'];
                                                }
                                                ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jml;?></div>
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Jumlah Simpanan</div>
                                                <?php
                                                include 'config.php';
                                                $result = mysqli_query($conn, "SELECT SUM(total) as akumulasi FROM anggota INNER JOIN simpanan ON simpanan.kode = anggota.kode  WHERE trash='0';");
                                                while($user_data = mysqli_fetch_array($result))
                                                {
                                                    $akumulasi = $user_data['akumulasi'];
                                                }
                                                ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?php echo number_format($akumulasi, 0, ',', '.');?></div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>

                       

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                jumlah piutang</div>
                                                <?php
                                                include 'config.php';
                                                $result = mysqli_query($conn, "SELECT SUM(s_pokok) as akumulasi FROM anggota INNER JOIN pinjaman ON pinjaman.kode = anggota.kode  WHERE trash='0';");
                                                while($user_data = mysqli_fetch_array($result))
                                                {
                                                    $akumulasi = $user_data['akumulasi'];
                                                }
                                                ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?php echo number_format($akumulasi, 0, ',', '.');?></div>
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total administrasi pinjaman</div>
                                                <?php
                                                include 'config.php';
                                                $result = mysqli_query($conn, "SELECT SUM(adm) as akumulasi FROM anggota INNER JOIN t_pinjaman ON t_pinjaman.kode = anggota.kode  WHERE trash='0';");
                                                while($user_data = mysqli_fetch_array($result))
                                                {
                                                    $akumulasi = $user_data['akumulasi'];
                                                }
                                                ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?php echo number_format($akumulasi, 0, ',', '.');?></div>
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total administrasi simpanan</div>
                                                <?php
                                                include 'config.php';
                                                $result = mysqli_query($conn, "SELECT SUM(adm) as akumulasi FROM anggota INNER JOIN t_simpanan ON t_simpanan.kode = anggota.kode  WHERE trash='0';");
                                                while($user_data = mysqli_fetch_array($result))
                                                {
                                                    $akumulasi = $user_data['akumulasi'];
                                                }
                                                ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?php echo number_format($akumulasi, 0, ',', '.');?></div>
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h1>PENTING !</h1>
                            <p>pembukaan simpanan dan pinjaman wajib membuat akun terlebih dahulu, jika akun di hapus maka data pinjaman dan simpanan terhapus!!</p>
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