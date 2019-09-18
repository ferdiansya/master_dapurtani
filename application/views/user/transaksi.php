<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table>
      <thead>
      <tr>
        <th>#</th>
        <th>Id Transaksi</th>
        <th>Tanggal Pesan</th>
        <th>Total Biaya</th>
        <th>Status</th>
        <th>Opsi</th>
      </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;

        foreach ($get->result() as $key) :
        ?>
        <tr>
          <td><?= $i++; ?></td>
          <td><?= $key->id_order; ?></td>
          <td><?= $key->tgl_pesan; ?></td>
          <td><?= $key->tgl_pengiriman; ?></td>
          <td><?= $key->status; ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </body>
</html>
