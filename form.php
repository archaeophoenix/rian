<?php
error_reporting(~E_NOTICE);
require_once 'isi.php';
$f = new isi();
if (isset($_POST['submit'])) {
	if (empty($_POST['id'])) {
		$file = $f->upload('file','img', uniqid());
		$_POST['file'] = $file['name'];
		// print_r($_POST);die();
		unset($_POST['submit']);
		$f->create('tabel',$_POST);
	} else {
		$file = $f->upload('file','img', uniqid());
		$_POST['file'] = $file['name'];
		// print_r($_POST);die();
		unset($_POST['submit']);
		$f->update('tabel','id = :id',$_POST);
	}
	$f->redirect('list.php');
}
if (isset($_GET['id'])) {
	$data = $f->one('tabel',"WHERE id = '$_GET[id]'");
}
?>
<a href="list.php">list</a>
<form method="post" action="#" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
	<table>
		<tr>
			<td>nama</td>
			<td><input type="text" name="nama" value="<?php echo $data['nama'] ?>" required oninvalid="setCustomValidity('harus diisi')"></td>
		</tr>
		<tr>
			<td>alamat</td>
			<td><input type="text" name="alamat" value="<?php echo $data['alamat'] ?>" required oninvalid="setCustomValidity('harus diisi')"></td>
		</tr>
		<tr>
			<td>alamat</td>
			<td><input type="file" name="file" required></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit"></td>
		</tr>
	</table>
</form>