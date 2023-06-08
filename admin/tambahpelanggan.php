<h2>Tambah Pelanggan</h2>

<form method="post" enctype="multipart/form-data">
	<div class="from-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control">
	</div>
	<div class="from-group">
		<label>Email </label>
		<input type="text" name="email" class="form-control">
	</div>
	<div class="from-group">
		<label>Telepon</label>
		<input type="text" name="telepon" class="form-control">
	</div>
	<br><button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php 
if (isset($_POST['save']))
{
	$koneksi->query("INSERT INTO pelanggan 
		(nama_pelanggan,email_pelanggan,telepon_pelanggan)
	VALUES('$_POST[nama]','$_POST[email]','$_POST[telepon]')");

	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
}
?>