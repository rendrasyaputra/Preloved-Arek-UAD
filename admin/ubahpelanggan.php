<h2>Ubah Pelanggan</h2>
<?php 
$ambil=$koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

echo "<pre>";
print_r($pecah);
echo "</pre>";
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_pelanggan']; ?>">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" name="email" class="form-control" value="<?php echo $pecah['email_pelanggan']; ?>">
	</div>
	<div class="form-group">
		<label>Telepon </label>
		<input type="text" name="telepon" class="form-control" value="<?php echo $pecah['telepon_pelanggan']; ?>">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>
<?php 
if (isset($_POST['ubah']))
{

		$koneksi->query("UPDATE pelanggan SET nama_pelanggan='$_POST[nama]', email_pelanggan='$_POST[email]', telepon_pelanggan='$_POST[telepon]' WHERE id_pelanggan='$_GET[id]'");

	echo "<script>alert('data pelanggan telah diubah');</script>";
	echo "<script>location='index.php?halaman=pelanggan';</script>";
}

?>