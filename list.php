<?php
error_reporting(~E_NOTICE);
require_once 'isi.php';
$f = new isi();
$datas = $f->read('tabel', 'WHERE id = '.$_SESSION['user']['id']);
if (isset($_GET['delete'])) {
	$data = $f->delete('tabel',"id = '$_GET[delete]'");
	$f->redirect('list.php');
}
?>
<!-- <a href="form.php">post</a> -->
<table>
	<tr>
		<td>nama</td>
		<td>alamat</td>
		<td>username</td>
		<td>file</td>
		<!-- <td colspan="2">action</td> -->
	</tr>
	<?php foreach ($datas as $data){ ?>
	<tr>
		<td><?php echo $data['nama'] ?></td>
		<td><?php echo $data['alamat'] ?></td>
		<td><?php echo $data['username'] ?></td>
		<td><img style="max-height: 200px; max-width: 200px;" src="img/<?php echo $data['file'] ?>"></td>
		<!-- <td><a href="form.php?id=<?php echo $data['id'] ?>" title="edit">edit</a></td>
		<td><a href="list.php?delete=<?php echo $data['id'] ?>" title="delete">delete</a></td> -->
	</tr>
	<?php } ?>
</table>