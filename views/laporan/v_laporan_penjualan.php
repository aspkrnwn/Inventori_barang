<div class="container-fluid">


	<div class="row">
		<div class="col-md-12 mb-3">
			<i class="fas fa-university"></i> Halaman Laporan Data Penjualan <br>
		</div>
	</div>

	<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan') ?>"></div>

	<div class="mt-4">
		<a href="<?php echo base_url('laporan/cetak_laporan_penjualan/pdf/'.$tanggal_awal.'/'.$tanggal_akhir) ?>" class="btn btn-danger btn-sm btn-icon-split" style="margin-top: -50px">
			<span class="icon text-white-50">
				<i class="fas fa-file-pdf"></i>
			</span>
			<span class="text">Export PDF</span>
		</a>
	</div>

	<div class="row">
		<div class="col-md-3">
			<!-- FORM -->
			<form method="post" action="<?php echo base_url('laporan/cetak_laporan_penjualan') ?>">
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
						<a href="<?php echo base_url('laporan/cetak_laporan_penjualan') ?>">Refresh</a>
					</td>
				</tr>

			</table>

		</form>
	</div>
</div>





<table class="table table-bordered">
	<thead>
		<tr style="color: grey">
			<th style="text-align: center;">No</th>
			<th style="text-align: center;">Tanggal Transaksi</th>
			<th style="text-align: center;">Nama Barang</th>
			<th style="text-align: center;">Jenis Barang</th>
			<th style="text-align: center;">Jumlah</th>
			<th style="text-align: center;">Satuan</th>
			<th style="text-align: center;">Harga</th>
			<th style="text-align: center;">Subtotal</th>
			<th style="text-align: center;">Nama Pembeli</th>
			<th style="text-align: center;">Alamat</th>
			<!-- 	<th style="text-align: center;">Aksi</th> -->
		</tr>
	</thead>

	<tbody>
		<?php
		$no = 1;
		foreach($penjualan_c as $row):
			?>
			<tr>
				<td style="text-align: center;"><?php echo $no++; ?> </td>
				<td style="text-align: center;"><?php echo $row['tanggal_transaksi']; ?> </td>
				<td style="text-align: center;"><?php echo $row['nama_barang'] ?> </td>
				<td style="text-align: center;"><?php echo $row['jenis_barang'] ?> </td>
				<td style="text-align: center;"><?php echo $row['jumlah'] ?> </td>
				<td style="text-align: center;"><?php echo $row['satuan'] ?> </td>
				<td style="text-align: center;"><?php echo $row['harga_jual'] ?> </td>
				<td style="text-align: center;"><?php echo $row['subtotal'] ?> </td>
				<td style="text-align: center;"><?php echo $row['nama_pembeli'] ?> </td>
				<td style="text-align: center;"><?php echo $row['alamat'] ?> </td>

			
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

	</div>	