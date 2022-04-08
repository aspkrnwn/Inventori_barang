<div class="container-fluid">

    <div class="row">
      <div class="col-md-12 mb-3">
       <i class="fas fa-database mr-1"></i> Halaman Stok Barang <br>
       <a class="btn btn-outline-primary btn-sm" style="margin: -40px 0px -50px 80%; width: 18%;" href="<?php echo base_url('toko/stok_barang/input_form') ?>"><i class="fas fa-plus"></i> Tambah Data</a><br>
       <!-- 	</div> -->
   </div>
</div>
<br>
<table class="table table-striped" id="tbl">
    <thead>
        <tr style="color: grey">
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Tanggal Masuk</th>
            <th style="text-align: center;">Nama Barang</th>
            <th style="text-align: center;">Supplier</th>
            <th style="text-align: center;">Jenis Barang</th>
            <th style="text-align: center;">Jumlah Stok</th>
            <th style="text-align: center;">Satuan</th>
            <th style="text-align: center;">Harga Beli</th>
            <th style="text-align: center;">Harga Jual</th>
            <th style="text-align: center;">Admin</th>
            <th style="text-align: center;">Aksi</th>
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
            <td style="text-align: center;"><?php if($row['jumlah'] < 0){ ?>
               <?php echo 'stok habis'; ?>
               <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $row['id_barang'] ?>">
                +
            </button>
        <?php }else{ ?>
                <?php echo $row['jumlah'] ?>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $row['id_barang'] ?>">
                +
            </button>
        <?php } ?>
        </td>
        <td style="text-align: center;"><?php echo $row['satuan'] ?> </td>
        <td style="text-align: center;"><?php echo $row['harga_beli'] ?> </td>
        <td style="text-align: center;"><?php echo $row['harga_jual'] ?> </td>
        <td style="text-align: center;"><?php echo $row['nama_user'] ?> </td>
        <td style="text-align: center;">

            <a href="<?php echo base_url('toko/stok_barang/edit/').$row['id_barang'];;?>"
                class="badge" style="color:black;"><i class="fa fa-edit fa-1x"></i></a>

                <a href="<?php echo base_url();?>toko/stok_barang/delete/<?php echo $row['id_barang'];?>"
                    class="badge tombol-hapus-sek" style="color:red;"><i class="fa fa-trash-alt fa-1x"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>


<!-- Modal -->
<?php foreach($stok_barang as $data){ ?>
<div class="modal fade" id="exampleModal<?php echo $data['id_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Stok</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
  <form method="post" action="<?php echo base_url('toko/stok_barang/tambah_stok') ?>">
        <div class="form-group">
            <label>Nama Barang</label>
            <input type="hidden" name="id_barang" value="<?php echo $data['id_barang'] ?>" class="form-control">
            <input type="text" name="nama_barang" value="<?php echo $data['nama_barang'] ?>" class="form-control">
        </div>

        <div class="form-group">
            <label>Tambah Stok Barang</label>
            <input type="number" min="0" name="jumlah" class="form-control">
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
</div>
</div>
</div>
<?php } ?>