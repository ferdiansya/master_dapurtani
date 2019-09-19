<div class="x_panel">
<div class="x_title">
  <h2>Status Pengiriman</h2>
  <div class="clearfix"></div>
</div>

<div class="x_content">
  <table class="table table-striped table-bordered dt-responsive nowrap" id="datatable">
    <thead>
      <tr>
        <th>#</th>
        <th>id_order</th>
        <th>Nama Pemesan</th>
        <th>Pesan</th>
        <th>pengiriman</th>
        <th>Email</th>
        <th>Kecamatan</th>
        <th>Alamat</th>
        <th>No Hp</th>
        <th>Pembayaran :</th>
        <th>Status :</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no=1;
      foreach($data->result() as $pengiriman) :
      ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $pengiriman->id_order; ?></td>
        <td><?= $pengiriman->nama; ?></td>
        <td><?= $pengiriman->tgl_pesan; ?></td>
        <td><?= $pengiriman->tgl_pengiriman; ?></td>
        <td><?= $pengiriman->email; ?></td>
        <td><?= $pengiriman->kecamatan; ?></td>
        <td><?= $pengiriman->alamat; ?></td>
        <td><?= $pengiriman->no_hp; ?></td>
        <td><?= $pengiriman->pembayaran; ?></td>
        <td>
          <?php
          if ($pengiriman->status == 1) {
            echo '<label class="label-success" style="color:white; padding:3px 5px;">Diantar</label>';
          } if ($pengiriman->status == 2) {
            echo '<label class="label-primary" style="color:white; padding:3px 5px;">Diterima</label>';
          } if ($pengiriman->status == 3) {
            echo '<label class="label-default" style="color:white; padding:3px 5px;">Batal</label>';
          }
           ?>
        </td>
        <td>
          <a href="<?= base_url(); ?>s_pengiriman/edit/<?= $pengiriman->id_order; ?>" class="btn btn-success">diantar</a>
          <a href="<?= base_url(); ?>s_pengiriman/edit_diterima/<?= $pengiriman->id_order; ?>" class="btn btn-primary">diterima</a>
          <a href="<?= base_url(); ?>s_pengiriman/edit_batal/<?= $pengiriman->id_order; ?>" class="btn btn-danger">batal</a>
          <a href="<?= base_url(); ?>s_pengiriman/detail/<?= $pengiriman->id_order; ?>" class="btn btn-primary">detail sayur</a>
          <a href="<?= base_url(); ?>s_pengiriman/hapus/<?= $pengiriman->id_order; ?>" class="btn btn-danger" onclick="return confirm('Yakin Ingin menghapus item ini dari keranjang anda ?')"><i class="fa fa-trash"></i></a>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
</div>
