<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 mb-3">
			<i class="fa fa-plus"></i> Halaman Input Jenis Barang
		</div>
	</div>
	<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan') ?>"></div>
	<div class="flash-data-gagal" data-flashdata="<?php echo $this->session->flashdata('pesan-gagal') ?>"></div>
	<hr>

	<div class="row">
			<div class="col-md-7">
				<form method="post" action="<?php echo base_url('toko/jenis_barang_c/input_aksi') ?>">

					<div class="row">
						<div class="col">

					<div class="form-group">
						<label>Tambah Jenis Barang</label>
						<input type="text" name="jenis_barang" class="form-control">
						<?php echo form_error('id_jenis_barang','<small class="text-danger pl-3" style="color:red">,</small>')?>
                    </div>

                    <div>
					<a href="<?php echo base_url('toko/jenis_barang_c') ?>" class="btn btn-warning btn-md" style="margin-right: 15px; margin-left: 445px;">Kembali</a>
					<button type="submit" class="btn btn-primary btn-md" >Submit</button>
					</div>

                </div>
		</form>
	</div>
</div>