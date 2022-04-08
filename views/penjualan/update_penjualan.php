<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 mb-3">
            <i class="fa fa-plus"></i> Halaman Update Data Penjualan
        </div>
    </div>
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan') ?>"></div>
    <div class="flash-data-gagal" data-flashdata="<?php echo $this->session->flashdata('pesan-gagal') ?>"></div>
    <hr>

    <div class="row">
        <div class="col-md-7">
            <form method="post" action="<?php echo base_url('toko/penjualan_c/update_penjualan') ?>">
                <?php foreach ($barang as $row) :?>
                    <div class="row">
                        <div class="col">

                            <div class="form-group">
                                <label>Tanggal Transaksi</label>
                                <input type="hidden" name="id_transaksi" value="<?php echo $row['id_transaksi'] ?>" class="form-control">
                                <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" class="form-control" value="<?php echo $row['tanggal_transaksi'] ?>">
                            </div>

                           <!--  <div class="col"> -->
                                <div class="form-group">
                                    <label>Nama Barang :</label>
                                    <input type="text" class="form-control" name="nama_barang" value="<?php echo $row['nama_barang'] ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Stuan :</label>
                                    <input type="text" class="form-control" name="satuan" value="<?php echo $row['satuan'] ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Jumlah Beli</label>
                                    <input type="number" name="jumlah_beli" class="form-control" value="<?php echo $row['jumlah'] ?>">
                                </div>
                            <!-- </div> -->
                        </div>

                        <!-- Kolom 2 -->
                        <div class="col">
                            <div class="form-group">
                                <label>harga</label>
                                <input type="number_format" name="harga" class="form-control" id="disabled1" readonly value="<?php echo $row['harga_jual'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Subtotal</label>
                                <input type="number_format" name="subtotal" class="form-control" id="disabled1" readonly value="<?php echo $row['subtotal'] ?>">
                            </div>

                            <div class="form-group">
                                <label>Nama Pembeli</label>
                                <input type="number_format" name="nama_pembeli" class="form-control" id="disabled1" value="<?php echo $row['nama_pembeli'] ?>">
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" value="<?php echo $row['alamat'] ?>"  >
                                </textarea>
                            </div>

                            <div>
                                <a href="<?php echo base_url('toko/penjualan_c') ?>" class="btn btn-warning btn-md" style="margin-right: 15px; margin-left: 100px;">Kembali</a>
                                <button type="submit" class="btn btn-primary btn-md" >Submit</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </form>
        </div>
    </div>
