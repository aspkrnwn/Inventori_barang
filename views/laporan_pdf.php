<!DOCTYPE html>
<html><head>
	<title></title>
</head><body>
	<h2 style="text-align: center;">Laporan Aset</h2>
	<table style="table-layout: center">
		<tr>
			<th>No</th>
			<th>Kode Aset</th>
			<th>Nama Aset</th>
		</tr>		

		<?php 
		$no = 1;
		foreach($aset as $row) :
		 ?>

		 <tr>
		 	<td><?php echo $no++; ?></td>
		 	<td><?php echo $row['kode_aset']; ?></td>
		 	<td><?php echo $row['nama_aset']; ?></td>
		 </tr>
		<?php endforeach; ?>
	</table>
</body></html>