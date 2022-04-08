<div class="container-fluid">

    <div class="row">
      <div class="col-md-12 mb-3">
         <i class="fas fa-database mr-1"></i> Halaman Data Supplier <br>
         <a class="btn btn-outline-primary btn-sm" style="margin: -40px 0px -50px 80%; width: 18%;" href="<?php echo base_url('toko/supplier_c/input_form') ?>"><i class="fas fa-plus"></i> Tambah Data</a><br>
         <!-- 	</div> -->
     </div>
 </div>
 <br>
 <table class="table table-striped" id="tbl">
    <thead>
        <tr style="color: grey">
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Nama Supplier</th>
            <th style="text-align: center;">Alamat</th>
            <th style="text-align: center;">Nomor Telepon</th>
            <th style="text-align: center;">Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $no = 1;
        foreach($supplier_c as $row):
            ?>
            <tr>
                <td style="text-align: center;"><?php echo $no++; ?> </td>
                <td style="text-align: center;"><?php echo $row['nama_supplier'] ?> </td>
                <td style="text-align: center;"><?php echo $row['alamat_supplier'] ?> </td>
                <td style="text-align: center;"><?php echo $row['no_tlp'] ?> </td>

                <td style="text-align: center;">

                    <a href="<?php echo base_url();?>toko/supplier_c/edit/<?php echo $row['id_supplier'];?>"
                        class="badge" style="color:black;"><i class="fa fa-edit fa-1x"></i></a>

                        <a href="<?php echo base_url();?>toko/supplier_c/delete/<?php echo $row['id_supplier'];?>"
                            class="badge tombol-hapus-sek" style="color:red;"><i class="fa fa-trash-alt fa-1x"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>