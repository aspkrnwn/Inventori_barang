<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 mb-3">
			<!-- <div class="alert alert-success" role="alert"> -->
				<i class="fa fa-plus"></i> Halaman Edit Akun 
				<!-- 	</div> -->
			</div>
		</div><hr>

		<div class="row">
			<div class="col-md-7">
				<form method="post" action="<?php echo base_url('admin/data_admin/update_user') ?>">
					<?php foreach($users as $row){ ?>
						<div class="form-group">
							<label>Nama Lengkap</label>
							<input type="hidden" name="id_user"   value="<?php echo $row['id_user']?>">
							<input type="text" name="nama_user" class="form-control" value="<?php echo $row['nama_user'];?>">
						</div>

						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" class="form-control" value="<?php echo $row['username'];?>">
						</div>

						<div class="form-group">
							<label>Password</label>
							<input  type="password" name="password" class="form-control" value="<?php echo $row['password'];?>">
						</div>

						<div class="form-group">
							<label for="exampleFormControlSelect1">Bagian</label>
							<select class="form-control" name="hak_akses" id="exampleFormControlSelect1">
								<?php echo $row['Bagian'];?>
								<option value="Admin">Admin</option>
								<option Value="Pemilik">Pemlilik</option>
							</select>
						</div>

						<div>
							<a href="<?php echo base_url('admin/data_admin') ?>" class="btn btn-warning btn-md" style="margin-right: 15px; margin-left: 440px;">Kembali</a>
							<button type="submit" class="btn btn-primary btn-md">Submit</button>
						</div>
					<?php } ?>
				</form>
			</div>
		</div>
	</div>
