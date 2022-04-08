 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Laporan</title>
 	<link rel="stylesheet" href="">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 	<style>
 		.line-title{
 			border: 0;
 			border-style: inset;
 			border-top: 1px solid #000;
 		}
 	</style>
 </head>
 <body>
 	<table style="width: 100%;">
 		<tr>
 			<td align="center">
 				<span style="line-height: 1.6; font-weight: bold;">
 					CV.SANGGAR TEKNIK PERSADA
 					<br>DIY YOGYAKARTA
 				</span>
 			</td>
 		</tr>
 	</table>

 	<hr class="line-title"> 
 	<p align="center">
 		LAPORAN DATA PENJUALAN <br>
 	</p>
 	<table class="table table-bordered">
 		<tr>
 			<th>No</th>
 			<th>Tanggal Transaksi</th>
 			<th>Barang</th>
 			<th>Jenis Barag</th>
 			<th>Jumlah Beli</th>
 			<th>Satuan</th>
 			<th>Harga</th>
 			<th>Subtotal</th>
 			<th>Pembeli</th>
 			<th>Alamat</th>
 		</tr>
 		<?php $no = 1; foreach ($laporan as $row): ?>
 		<tr>
 			<td><?php echo $no++; ?> </td>
 			<td><?php echo $row['tanggal_transaksi']; ?> </td>
 			<td><?php echo $row['nama_barang'] ?> </td>
 			<td><?php echo $row['jenis_barang'] ?> </td>
 			<td><?php echo $row['jumlah'] ?> </td>
 			<td><?php echo $row['satuan'] ?> </td>
 			<td><?php echo $row['harga_jual'] ?> </td>
 			<td><?php echo $row['subtotal'] ?> </td>
 			<td><?php echo $row['nama_pembeli'] ?> </td>
 			<td><?php echo $row['alamat'] ?> </td>
 		</tr>
 	<?php endforeach ?>

 	<?php foreach($total as $total): ?>
 		<tr>
 			<th colspan="9">Total Pendapatan</th>
 			<th ><?php echo "Rp. " . number_format($total['totalSemua']) ?></th>
 		</tr>
 	<?php endforeach ?>
 </table>

</body>
</html>