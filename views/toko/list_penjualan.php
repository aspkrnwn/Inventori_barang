<div class="container-fluid">

    <div class="row">
      <div class="col-md-12 mb-3">
         <i class="fas fa-database mr-1"></i> Halaman Penjualan <br>
         <a class="btn btn-outline-primary btn-sm" style="margin: -40px 0px -50px 80%; width: 18%;" href="<?php echo base_url('toko/penjualan_c/input_form') ?>"><i class="fas fa-plus"></i> Tambah Data</a><br>
         <!-- 	</div> -->
     </div>
 </div>
 <br>
 <table class="table table-striped table-responsive" id="tbl">
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
            <th style="text-align: center;">Admin</th>
            <th style="text-align: center;">Aksi</th>
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
                <td style="text-align: center;"><?php echo $row['nama_user'] ?> </td>

                <td style="text-align: center;">

                    <a href="<?php echo base_url('toko/penjualan_c/edit/').$row['id_transaksi'];;?>"
                        class="badge" style="color:black;"><i class="fa fa-edit fa-1x"></i></a>

                        <a href="<?php echo base_url('toko/penjualan_c/delete/').$row['id_transaksi'];?>"
                            class="badge tombol-hapus-sek" style="color:red;"><i class="fa fa-trash-alt fa-1x"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>