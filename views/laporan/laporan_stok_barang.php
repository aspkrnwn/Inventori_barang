<div class="container-fluid">


	<div class="row">
		<div class="col-md-12 mb-3">
			<i class="fas fa-university"></i> Halaman Laporan Data Stok Barang<br>
		</div>
	</div>

	<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan') ?>"></div>

	<div class="row">
		<div class="col-md-3">
			<!-- FORM -->
			<form method="post" action="<?php echo base_url('laporan/cetak_laporan_stok_barang/tampil_laporan_stok_barang') ?>">
				<table class="table">
					<div>
						<label>Pilih Tanggal</label>
						<input type="date" name="tanggal_awal"  class="form-control">
					</div>

					<div>
						<label>Pilih Tanggal</label>
						<input type="date" name="tanggal_akhir"  class="form-control">
					</div>

					<td>
						<button type="submit">Cek</button>
					</td>
					<td>
						<a href="<?php echo base_url('laporan/cetak_laporan_stok_barang') ?>">Refresh</a>
					</td>
				</tr>

			</table>

		</form>
	</div>
</div>


<table class="table">
	<thead>
		<tr style="color: grey">
			<th style="text-align: center;">No</th>
			<th style="text-align: center;">Tanggal Masuk</th>
			<th style="text-align: center;">Nama Barang</th>
			<th style="text-align: center;">Supplier</th>
			<th style="text-align: center;">Jenis Barang</th>
			<th style="text-align: center;">Jumlah Stok 

			</th>
			<th style="text-align: center;">Satuan</th>
			<th style="text-align: center;">Harga Beli</th>
			<th style="text-align: center;">Harga Jual</th>
		</tr>
	</thead>

	<tbody>
		<?php
		$no = 1;
		foreach($stok_barang as $row):
			?>
			<tr>
				<td style="text-align: center;"><?php echo $no++; ?> </td>
				<td style="text-align: center;"><?php echo $row['tanggal_masuk']; ?> </td>
				<td style="text-align: center;"><?php echo $row['nama_barang'] ?> </td>
				<td style="text-align: center;"><?php echo $row['nama_supplier'] ?> </td>
				<td style="text-align: center;"><?php echo $row['jenis_barang'] ?> </td> 
				<td style="text-align: center;"><?php echo $row['jumlah'] ?></td>
				<td style="text-align: center;"><?php echo $row['satuan'] ?> </td>
				<td style="text-align: center;"><?php echo $row['harga_beli'] ?> </td>
				<td style="text-align: center;"><?php echo $row['harga_jual'] ?> </td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</div>
