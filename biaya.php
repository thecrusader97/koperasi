<?php
include 'components/head.php';
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    
    
    $id = $_POST['id'];
    $biaya = $_POST['biaya'];
   
    $currentDateTime = date('Y-m-d H:i:s');
        
    // update user data
    $result = mysqli_query($conn, "UPDATE biaya SET a_nominal='$biaya',tgl='$currentDateTime' WHERE biayaid=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: home.php");
}

?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM biaya WHERE biayaid=$id");
 
while($user_data = mysqli_fetch_array($result))
{
   
    $biaya = $user_data['a_nominal'];
    $tgl = $user_data['tgl'];
    $id = $user_data['biayaid'];
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
                        <h1 class="h3 mb-0 text-gray-800">Biaya transaksi</h1>
                       
                    </div>
                    <div class="card shadow mb-4">
                                <div class="card-body">

                                <form action="biaya.php" method="post" name="form1">
                                <div class="form-group">
                                    <label class="form-label"> Biaya admin Pertransaksi:</label>
                                    <input class="form-control" type="text" id="biaya" name="biaya" value=<?php echo $biaya;?> >
                                </div>
                                <div class="form-group">
                                    <label class="form-label"> Terakhir update:</label>
                                    <input class="form-control" type="text" id="tgl" name="tgl" value=<?php echo $tgl;?>>
                                </div>
                                <div class="form-group">
                                  
                                    <input class="form-control" type="hidden" id="id" name="id" value=<?php echo $id;?>>
                                </div>
                                
                                
                                
                                
                                <div class="form-group">
                                <input class="btn btn-success" type="submit" name="update" value="Edit">
				                <a href="home.php" class="btn btn-danger">Kembali</a>
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