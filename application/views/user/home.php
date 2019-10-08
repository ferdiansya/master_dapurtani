<?php foreach($data as $key) : ?>
<div class="col-6 col-md-6 col-sm-6 col-lg-3 col-xl-3 my-col">

	<div class="work">
		<img class="sayur" src="<?= base_url(); ?>assets/upload/<?= $key->gambar; ?>" alt="">
		<div class="work-bottom">
			<h3><?= $key->nama_sayur; ?></h3>

			<div class="row">
				<div class="col-sm-12">
					<table align="center">
						<tr>
							<td align="left">Rp. <?= number_format($key->harga, 0, ',', '.'); ?> / <?= $key->satuan; ?></td>
						</tr>
						<tr>
							<td align="left"><?= $key->nama_petani; ?></td>
						</tr>
						<tr>
							<td align="left">
							<?php
          if ($key->k_sayur == 1) {
            echo 'Organik';
          } if ($key->k_sayur == 2) {
            echo 'Hidroponik';
          } if ($key->k_sayur == 3) {
            echo 'Bebas Pestisida';
          } if ($key->k_sayur == 4)  {
            echo 'Pertanian Lokal';
          } if ($key->k_sayur == 5)  {
            echo 'Import';
          }
           ?>
							</td>
						</tr>
						<tr>
							<td align="left">Sisa Stok : <?= $key->stock; ?></td>
						</tr>
					</table>
				</div>
			</div>
			<?php if ($key->stock  == 0) { 
      echo "<b>Stock Kosong</b>";
      ?>
			<?php } else { ?>
			<a class="btn btn-beli btn-success" href="<?= base_url(); ?>cart/add/<?= $key->id_sayur; ?>">Masukkan ke
				Keranjang</a>
			<?php } ?>
		</div>
	</div>

</div>
<?php endforeach; ?>
