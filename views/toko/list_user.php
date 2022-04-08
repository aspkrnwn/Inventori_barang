<div class="container-fluid">

<div class="row">
		<div class="col-md-12 mb-3">
			<i class="fas fa-database mr-1"></i> Halaman Data Admin <br>
			<a class="btn btn-outline-primary btn-sm" style="margin: -40px 0px -50px 80%; width: 18%;" href="<?php echo base_url('admin/data_admin/input_form') ?>"><i class="fas fa-plus"></i> Tambah Data</a><br>
			<!-- 	</div> -->
		</div>
	</div>
    <br>
<table class="table table-striped" id="tbl">
<thead>
<tr style="color: grey">
    <th style="text-align: center;">No</th>
    <th style="text-align: center;">Nama User</th>
    <th style="text-align: center;">Username</th>
    <th style="text-align: center;">Password</th>
    <th style="text-align: center;">Bagian</th>
    <th style="text-align: center;">Aksi</th>
</tr>
</thead>

<tbody>
<?php
$no = 1;
foreach($data_admin as $row):
?>
<tr>
    <td style="text-align: center;"><?php echo $no++; ?> </td>
    <td style="text-align: center;"><?php echo $row['nama_user'] ?> </td>
    <td style="text-align: center;"><?php echo $row['username'] ?> </td>
    <td style="text-align: center;"><?php echo $row['password'] ?> </td>
    <td style="text-align: center;"><?php echo $row['hak_akses'] ?> </td>

    <td style="text-align: center;">

    <a href="<?php echo base_url();?>admin/data_admin/edit/<?php echo $row['id_user'];?>"
    class="badge" style="color:black;"><i class="fa fa-edit fa-1x"></i></a>

    <a href="<?php echo base_url();?>admin/data_admin/delete/<?php echo $row['id_user'];?>"
    class="badge tombol-hapus-sek" style="color:red;"><i class="fa fa-trash-alt fa-1x"></i></a>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>