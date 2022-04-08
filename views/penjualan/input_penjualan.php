<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 mb-3">
			<i class="fa fa-plus"></i> Halaman Input Data Penjualan
		</div>
	</div>
	<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan') ?>"></div>
	<div class="flash-data-gagal" data-flashdata="<?php echo $this->session->flashdata('pesan-gagal') ?>"></div>
	<hr>

	<div class="row">
   <div class="col-md-7">
    <form method="post" action="<?php echo base_url('toko/penjualan_c/input_aksi') ?>">

      <div class="row">
       <div class="col">

         <div class="form-group">
          <label>Tanggal Transaksi</label>
          <input type="date" name="tanggal_transaksi"  class="form-control">
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect1">Jenis Barang</label>
          <select class="form-control" name="id_jenis_barang" id="id_jenis_barang">
            <option value="0">---Pilih---</option>
            <?php foreach($stok_barang as $baris): ?>
             <option value="<?php echo $baris['id_jenis_barang'] ?>"><?php echo $baris['jenis_barang'] ?></option>
           <?php endforeach; ?>
         </select>
       </div>

       <div class="row">
         <div class="col">
          <div class="form-group">
            <label>Nama Barang :</label>
            <select class="form-control" id="id_barang" name="id_barang">
              <option value="0" selected="true" disabled="disabled">--Pilih Nama Barang--</option>
              <option></option>
            </select>
          </div>

          <div class="form-group">
           <label for="exampleFormControlSelect1">Satuan</label>
           <select class="form-control" name="satuan" id="exampleFormControlSelect1">
            <option value="0" selected="true" disabled="disabled">--Pilih Satuan--</option>
            <option value="Pcs">Pcs</option>
            <option Value="Meter">Meter</option>
          </select>
        </div>
      </div>
    </div>
  </div>

  <!-- Kolom 2 -->
  <div class="col">

    <div class="form-group">
      <label>Jumlah Beli</label>
      <input type="number" name="jumlah_beli" class="form-control">
    </div>

    <div class="form-group">
      <label>Harga</label>
      <div id="harga" class="form-control" ></div>
    </div>

                   <!--  <div class="form-group">
						<label>Subtotal</label>
						<input type="number_format" name="harga" class="form-control" id="disabled1" readonly>
          </div> -->

          <div class="form-group">
            <label>Nama Pembeli</label>
            <input type="text" name="nama_pembeli" class="form-control">
          </div>

          <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3"></textarea>
          </div>

          <div>
           <a href="<?php echo base_url('toko/penjualan_c') ?>" class="btn btn-warning btn-md" style="margin-right: 15px; margin-left: 100px;">Kembali</a>
           <button type="submit" class="btn btn-primary btn-md" >Submit</button>
         </div>
       </div>
     </div>
   </form>
 </div>
</div>

<script src="<?php echo base_url(); ?>asset/vendor/jquery/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#id_jenis_barang').change(function() {
      var id_jenis_barang = $(this).val();
      $.ajax({
        url: "<?php echo base_url(); ?>toko/penjualan_c/get_barang",
        type: "POST",
        data: { id_jenis_barang: id_jenis_barang },
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '';
          var i;
          for (i = 0; i < data.length; i++) {
            html += '<option value=" ' + data[i].id_barang + ' ">' + data[i].nama_barang + ' '
            '</option>';
          }
          $('#id_barang').html(html);
        }
      });
    });

    $('#id_barang').change(function() {
      var id_barang = $(this).val();
      $.ajax({
        url: "<?php echo base_url(); ?>toko/penjualan_c/get_harga",
        type: "POST",
        data: { id_barang: id_barang },
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '';
          var i;
          for (i = 0; i < data.length; i++) {
            html += '<input name="harga" value=" ' + data[i].harga_jual + ' " class="form-control" style="margin-left: -14px; margin-top: -7px; width: 291px;">';
          }
          $('#harga').html(html);
        }
      });
    });

  });
</script>