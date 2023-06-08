<?php 
session_start();
$koneksi= new mysqli("localhost","root","","preloved");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Preloved Arek UAD::Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <br><br>
                <h2>Login::Preloved Arek UAD</h2>

                <h5>(Login sek Mas/mbak)</h5>
                <br>
            </div>
        </div>
        <div class="row" >
             <div class="">
                 <div class="panel panel-default">
                    <div class="panel-heading" >
                        <strong>Masukan Data Untuk Login</strong>
                    </div>
                    <div class="panel-body ">
                        <form role="form" method="post">
                            
                            <div class="form-group input-group" >
                                <span class="input-group-admin"><i class="fa fa-tag"></i></span>
                                <input type="text" class="form-control" name="user"/>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-admin"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" name="pass">
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline">
                                    <input type="checkbox"/>Ingat Saya
                                </label>
                                <span class="text-center">
                                    <a href="#">Forget Password</a>
                                </span>
                            </div>
                            <button class="btn-btn primary" name="login">Login</button> <br>
                            Not Register ? <a href="registeration.html">Click Here</a>
                        </form>
                        <?php 
                        if (isset($_POST['login']))
                        {
                            $ambil = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[user]' AND password='$_POST[pass]'"); 

                            $yangcocok = $ambil->num_rows;
                            if ($yangcocok==1)
                            {
                                $_SESSION['admin']=$ambil->fetch_assoc();
                                echo "<div class='alert alert-info'>Login Sukses</div>";
                                echo "<meta http-equiv='refresh' content='1;url=index.php'>"; 
                            } 
                            else
                            {
                                echo "<div class='alert alert-danger'>Login Gagal</div>";
                                echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                            }
                        } ?>
                    </div>
                     
                 </div>
             </div>

        </div>
    </div>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
