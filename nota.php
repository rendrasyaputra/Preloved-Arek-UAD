<?php 
session_start();
$koneksi= new mysqli("localhost","root","","preloved"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Nota Pembelian</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container">
			<ul class="nav navbar-nav">
			<li><a href="checkout.php"><img src="uad.jpg" width="50"></a></li>
			<li><a href="index.php">Home</a></li>
			<li><a href="keranjang.php">Keranjang</a></li>
			<?php if (isset($_SESSION['pelanggan'])): ?>
				<li><a href="logout.php">Logout</a></li>
			<?php else: ?>
				<li><a href="login.php">Login</a></li>
			<?php endif ?>
			
			<li><a href="checkout.php">Checkout</a></li>
		</ul>
		</div>
	</nav>

<section class="konten">
	<div class="container">
		
<h2>Detail Pembelian</h2>
<?php 
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN 
	pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();


?>

<strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
<p>
	<?php echo $detail['telepon_pelanggan']; ?>
	<?php echo $detail['email_pelanggan']; ?>
</p>

<p>
	Tanggal:<?php echo $detail['tanggal_pembelian']; ?><br>
	Total:<?php echo $detail['total_pembelian']; ?>
</p>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
		<?php while($pecah=$ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td><?php echo $pecah['harga_produk']; ?></td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td>
				<?php echo $pecah['harga_produk']*$pecah['jumlah']; ?>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>


<div class="row">
	<div class="col-md-7">
		<div class="alert alert-info">
			<p>
			Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> Ke
			</p>
			<strong>BANK MANDIRI 123-456789-009 AN. LAPAK PRELOVE UAD</strong>
		</div>
	</div>
</div>


	</div>
</section>

</body>
</html>