<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
	<div class="from-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control">
	</div>
	<div class="from-group">
		<label>Kondisi</label>
		<input type="text" name="kondisi" class="form-control">
	</div>
	<div class="from-group">
		<label>Harga(Rp)</label>
		<input type="number" name="harga" class="form-control">
	</div>
	<div class="from-group">
		<label>Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<div class="from-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"></textarea>
	</div>
	<br><button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php 
if (isset($_POST['save']))
{
	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_produk/".$nama);
	$koneksi->query("INSERT INTO produk 
		(nama_produk,kondisi,harga_produk,foto_produk,deskripsi_produk)
	VALUES( '$_POST[nama]','$_POST[kondisi]','$_POST[harga]','$nama','$_POST[deskripsi]')");

	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
?>