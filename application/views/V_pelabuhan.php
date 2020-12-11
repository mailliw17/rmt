 <div class="container" style="margin-top: 25px;">
     <div class="alert alert-primary">Keluar Pelabuhan</div>
     <hr>
     <form action="<?= base_url() ?>operator/insert_print_pelabuhan" method="POST">
         <div class="form-group">
             <label for="exampleInputPassword1">Nomor PO</label>
             <input list="nomor_po_dropdown" class="form-control" id="nomor_po" name="nomor_po" required autocomplete="off" onchange="autoFillNomorPO(this.value, 'supplier', 'nama_barang')">
             <datalist id="nomor_po_dropdown">
                 <?php
                    foreach ($nomor_po as $np) : ?>
                     <option value="<?= $np->nomor_po ?>"></option>
                 <?php endforeach; ?>
             </datalist>
         </div>
         <div class="form-group">
             <label for="exampleInputPassword1">Supplier</label>
             <input type="text" class="form-control" id="supplier" name="supplier" readonly>
         </div>
         <div class="form-group">
             <label for="exampleInputPassword1">Nama Barang</label>
             <input type="text" class="form-control" id="nama_barang" name="nama_barang" readonly>
         </div>

         <div class="form-group">
             <label for="exampleInputPassword1">ID Barcode</label>
             <input type="text" class="form-control" id="id_barcode" name="id_barcode" readonly value="<?php echo time(); ?>">
         </div>

         <input type="hidden" class="form-control" id="pelabuhan" name="pelabuhan" readonly value="<?php date_default_timezone_set("Asia/Jakarta");
                                                                                                    echo date("Y-m-d H:i:s"); ?>">
         <div class="form-group">
             <label for="exampleInputPassword1">Plat Nomor</label>
             <div class="badge badge-danger">Wajib Teliti</div>
             <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" autocomplete="off" required>
         </div>

         <div class="form-group">
             <label for="exampleInputPassword1">Nomor Segel</label>
             <div class="badge badge-warning">Nomor Segel Pertama</div>
             <input type="number" class="form-control" id="nomor_segel" name="nomor_segel" autocomplete="off" required>
         </div>
         <div class="form-group">
             <label for="exampleInputPassword1">Nomor Surat Jalan</label>
             <input type="number" class="form-control" id="nomor_sj" name="nomor_sj" autocomplete="off" required>
         </div>
         <div class="form-group">
             <label for="exampleInputPassword1">Quantity </label>
             <div class="badge badge-warning">Kilogram</div>
             <input type="number" class="form-control" id="qty" name="qty" autocomplete="off" required>
         </div>
         <button type="submit" class="btn btn-primary btn-lg btn-block" onclick="copyID()">SIMPAN</button>
     </form>
 </div>

 <script>
     function autoFillNomorPO(value, supplier, nama_barang) {
         var nomor_po = value;
         var supplier = document.getElementById(supplier);
         var nama_barang = document.getElementById(nama_barang);

         $.ajax({
             url: "<?php echo base_url(); ?>index.php/operator/get_data_nomorpo",
             method: "POST",
             data: {
                 nomor_po: nomor_po
             },
             dataType: 'json',
             success: function(data) {
                 console.log(data);
                 if (data != false) { // nim ditemukan
                     $.each(data, function(key, val) {
                         //  console.log(val.id_pelanggan);
                         supplier.value = val.supplier;
                         nama_barang.value = val.nama_barang;
                     });
                 } else {
                     console.log('Tidak ditemukan');
                     supplier.value = '';
                     nama_barang.value = '';
                 }

             }
         });
     }

     function copyID() {
         var copyText = document.getElementById("id_barcode");
         copyText.select();
         copyText.setSelectionRange(0, 99999);
         document.execCommand("copy");
         alert("Kode QR " + copyText.value + " Berhasil di Copy");
     }
 </script>