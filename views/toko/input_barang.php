<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 mb-3">
			<i class="fa fa-plus"></i> Halaman Input Data Barang
		</div>
	</div>
	<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan') ?>"></div>
	<div class="flash-data-gagal" data-flashdata="<?php echo $this->session->flashdata('pesan-gagal') ?>"></div>
	<hr>


	<div class="row">
		<div class="col-md-7">
			<form method="post" action="<?php echo base_url('toko/stok_barang/input_aksi') ?>">

				<div class="row">
					<div class="col">

						<div class="form-group">
							<label>Tanggal Masuk</label>
							<input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control">
						</div>

						<div class="form-group">
							<label>Nama Barang</label>
							<input type="text" name="nama_barang" class="form-control">
						</div>

						<div class="form-group">
							<label for="exampleFormControlSelect1">Satuan</label>
							<select class="form-control" name="satuan" id="exampleFormControlSelect1">
								<option value="0" selected="true" disabled="disabled">--Pilih Satuan--</option>
								<option Value="Pcs">Pcs</option>
								<option Value="Meter">Meter</option>


							</select>
						</div>

						<div class="form-group">
							<label for="exampleFormControlSelect1">Nama Supplier</label>
							<select class="form-control" name="id_supplier" id="exampleFormControlSelect1">
								<option value="0" selected="true" disabled="disabled">--Pilih Supplier--</option>
								<?php foreach($sup as $row): ?>
									<option value="<?php echo $row['id_supplier'] ?>"><?php echo $row['nama_supplier'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<!-- Kolom 2 -->
					<div class="col">

						<div class="form-group">
							<label>Jenis Barang</label>
							<select name="id_jenis_barang" class="form-control">
								<option value="0" selected="true" disabled="disabled">--Pilih Jenis Barang--</option>
								<?php foreach($jenis_barang as $jb): ?>
									<option value="<?php echo $jb['id_jenis_barang'] ?>" ><?php echo $jb['jenis_barang'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="form-group">
							<label>Jumlah Beli</label>
							<input type="number" name="jumlah_beli" class="form-control">
						</div>

						<div class="form-group">
							<label>Harga Beli</label>
							<input type="number" name="harga_beli" class="form-control">
						</div>

						<div class="form-group">
							<label>Harga Jual</label>
							<input type="number" name="harga_jual" class="form-control">
						</div>

						<div>
							<a href="<?php echo base_url('toko/stok_barang') ?>" class="btn btn-warning btn-md">Kembali</a>
							<button type="submit" class="btn btn-primary btn-md" >Submit</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>