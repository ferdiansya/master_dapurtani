<div class="x_panel">
   <div class="x_title">
      <h2>Managemen Order</h2>
     <div class="clearfix"></div>
   </div>

   <div class="x_content">
      <table class="table table-striped table-bordered dt-responsive nowrap" id="datatable">
         <thead>
            <tr>
              <th>No</th>
               <th>Nama Sayur</th>
               <th>Harga Sayur</th>
               <th>Jumlah</th>
               <th>Total</th>

            </tr>
         </thead>
         <tbody>
            <tr>
<?php
$i = 1;
    foreach ($t_detail_order->result() as $key) :

 ?>
 <tr>
                <td><?= $i++; ?></td>
               <td><?= $key->nama_sayur; ?></td>
                <td><?= $key->biaya; ?></td>
               <td><?= $key->qty; ?></td>
               <td><?= $key->sub; ?></td>

            </tr>
            <?php endforeach; ?>
            <tr>
              <th colspan="6">Total Harga Sayur =
               <?= $key->sub; ?> di tambah Ongkir = <?= $key->total; ?></th>

            </tr>
         </tbody>

      </table>
   </div>
</div>
