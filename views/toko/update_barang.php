<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 mb-3">
			<i class="fa fa-plus"></i> Halaman Update Data Barang
		</div>
	</div>
	<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan') ?>"></div>
	<div class="flash-data-gagal" data-flashdata="<?php echo $this->session->flashdata('pesan-gagal') ?>"></div>
	<hr>


	<div class="row">
		<div class="col-md-7">
			<form method="post" action="<?php echo base_url('toko/stok_barang/update_barang') ?>">
				<?php foreach($barang as $row): ?>
					<div class="row">
						<div class="col">

							<div class="form-group">
								<label>Tanggal Masuk</label>
								<input type="hidden" name="id_barang" value="<?php echo $row['id_barang'] ?>" class="form-control">
								<input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" value="<?php echo $row['tanggal_masuk'] ?>">
							</div>

							<div class="form-group">
								<label>Nama Barang</label>
								<input type="text" name="nama_barang" class="form-control" value="<?php echo $row['nama_barang'];?>">
							</div>

							<div class="form-group">
								<label for="exampleFormControlSelect1">Satuan</label>
								<select class="form-control" name="satuan" id="exampleFormControlSelect1">
									<?php echo $row['satuan'];?>
									<option value="Kg">Kg</option>
									<option value="Pcs">Pcs</option>
									<option Value="Meter">Meter</option>
								</select>
							</div>


							<div class="form-group">
								<label for="exampleFormControlSelect1">Nama Supplier</label>
								<select class="form-control" name="id_supplier" id="exampleFormControlSelect1">
									<?php echo $row['nama_supplier'];?>
									<?php foreach($supplier as $row): ?>
										<option value="<?php echo $row['id_supplier'] ?>"><?php echo $row['nama_supplier'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<!-- Kolom 2 -->
						<div class="col">

							<div class="form-group">
								<?php foreach($barang as $row): ?>
									<label for="exampleFormControlSelect1">Jenis Barang</label>
									<select class="form-control" name="jenis_barang" id="exampleFormControlSelect1">
										<?php echo $row['jenis_barang'];?>
										<?php foreach($jenis as $baris): ?>
											<option value="<?php echo $baris['id_jenis_barang'] ?>"><?php echo $baris['jenis_barang'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>

								<div class="form-group">
									<label>Jumlah Beli</label>
									<input type="number_format" name="jumlah" class="form-control" value="<?php echo $row['jumlah'];?>"  readonly>
								</div>

								<div class="form-group">
									<label>Harga Beli</label>
									<input type="number_format" name="harga_beli" class="form-control" value="<?php echo $row['harga_beli'];?>">
								</div>

								<div class="form-group">
									<label>Harga Jual</label>
									<input type="number_format" name="harga_jual" class="form-control" value="<?php echo $row['harga_jual'];?>">
								</div>

								<div>
									<a href="<?php echo base_url('toko/stok_barang') ?>" class="btn btn-warning btn-md" style="margin-right: 15px; margin-left: 100px;">Kembali</a>
									<button type="submit" class="btn btn-primary btn-md" >Submit</button>
								</div>
							<?php endforeach; ?>
						<?php endforeach; ?>
					</div>
				</div>
			</form>
		</div>
	</div>