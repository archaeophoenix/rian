<?php
error_reporting(~E_NOTICE);
require_once 'isi.php';
$f = new isi();
if (isset($_POST['submit'])) {
	$_SESSION['user'] = $f->one('tabel',' WHERE username = "'.$_POST['username'].'" AND password = "'.$_POST['password'].'"');
	// echo "<pre>";print_r($_SESSION);die();
	$f->redirect('list.php');
}
?>
<form method="post" action="#" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
	<table>
		<tr>
			<td>nama</td>
			<td><input type="text" name="username" value=""></td>
		</tr>
		<tr>
			<td>password</td>
			<td><input type="text" name="password" value=""></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit"></td>
		</tr>
	</table>
</form>