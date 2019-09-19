<?php
 foreach($data as $key) :
   ?>
    <div class="col-6 col-md-6 col-sm-6 col-lg-3 col-xl-3 my-col">

      <div class="work">
          <img class="sayur" src="<?= base_url(); ?>assets/upload/<?= $key->gambar; ?>" alt="">
          <div class="work-bottom">
            <h3><?= $key->nama_sayur; ?></h3>

            <div class="row">
              <div class="col-sm-12">
                <table align="center">
                  <tr>
            <td align="left">Rp. <?= number_format($key->harga, 0, ',', '.'); ?></td>
            <td align="left">/ <?= $key->satuan; ?></td>
          </tr>
          <tr>
            <td align="left">Sisa Stok : </td>
            <td align="left"> <?= $key->stock; ?></td>
          </tr>
        </table>
      </div>
    </div>
          <a class="btn btn-beli btn-success" href="<?= base_url(); ?>cart/add/<?= $key->id_sayur; ?>">Masukkan ke Keranjang</a>
        </div>
      </div>

    </div>
<?php endforeach; ?>
