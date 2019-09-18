<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Dapurtani</title>

  <?php echo $css; ?>

</head>
<body id="header" onload="setInterval('reloadwaktu()');">

  <!-- Navigation atas -->
  <?php echo $nav; ?>
  <!-- Navigation atas -->

  <nav class="navbar fixed-bottom navbar-bottom sidebarNavigation" data-sidebarClass="navbar-light bg-light">
    <div class="container">
      <div class="nav navbar-nav navbar-left">
        <p class="harga"><?php
        if ($this->cart->total() > 0) {
          echo 'Rp. '.number_format($this->cart->total(), 0, ',', '.');
        } else {
          echo 'Rp. 0';
        }
        ?>
      </p>
    </div>
    <div class="garis-vertical"></div>
    <div class="nav navbar-nav navbar-right box-keranjang">
      <div class="keranjang">
        <button class="btn btn-success keranjang-icon leftNavbarToggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <img src="<?= base_url(); ?>assets/img/keranjang.png" alt="">&nbsp;&nbsp;<?php echo $this->cart->total_items(); ?>
        </button>

        <div class="collapse navbar-collapse">
          <?php if ($this->session->userdata('user_login')) { ?>
            Hai...
            <b><?php echo $this->session->userdata('name');
            ?></b> ... Happy Shopping
          <?php } else { ?>
            Hai...
            <b></b> ... Happy Shopping
          <?php } ?>
          <hr class="garis-keranjang">
          <div class="row">
            <div class="col-6 col-sm- col-lg-6 col-xl-6 pengantaran">
              Jam Pengantaran :
              <br>
              <b>07.00 - 10.00</b>
            </div>
            <div class="col-6 col-sm-6 col-lg-6 col-xl-6 pengiriman">
              Tanggal Pengiriman
              <br>
              <b><span id="getwaktupengiriman1"></span></b>
            </div>
          </div>

          <hr class="garis-keranjang">
          <?php
          foreach($this->cart->contents() as $key) :
          ?>
          <div class="row">
            <div class="col-3 col-sm-4 col-lg-4 col-xl-4 gambar-sayur">
              <img src="<?= base_url(); ?>assets/upload/<?= $key['picture']; ?>" alt="">
            </div>
            <div class="col-4 col-sm-4 col-lg-4 col-xl-4 detail-sayur">
              <h3 class="nama-sayur"><?= $key['name']; ?></h3>
              <p class="harga-sayur">Rp. <?= number_format($key['price'], 0, ',', '.'); ?> / <sub>500 gram</sub></p>

              <!-- <input class="input-jumlah form-control form-control-sm" type="text" name="qty" min="1" value="?=// $key['qty']; ?>" readonly> -->

              <button class="btn btn-default icon-kurang kurang" type="button"><i class="fa fa-minus"></i></button>

              <input class="input-jumlah form-control form-control-sm" id="jumlahstok" type="text" name="qty" value="1" readonly>

              <button class="btn btn-default icon-tambah tambah" type="button"><i class="fa fa-plus"></i></button>

            </div>
            <div class="col-4 col-sm-3 col-lg-3 col-xl-3 total-harga">
              Total :
              <br >
              Rp. <?= number_format($this->cart->total(), 0, ',', '.'); ?>
              <br />
              <button class="btn btn-danger icon-hapus" type="button" data-toggle="modal" data-target="#modalHapus<?= $key['rowid']; ?>"><i class="fa fa-trash"></i></button>
            </div>
          </div>
        <?php endforeach; ?>
        <div class="row">
          <div class="col-6">
            <p class="keterangan-harga">Total Belanja :</p>
          </div>
          <div class="col-6">
            <p class="harga"><b>Rp.</b><?= number_format($this->cart->total(), 0, ',', '.'); ?></p>
          </div>
        </div>
        <?php if ($this->session->userdata('promo') == 'aktif') { ?>
          <hr class="garis-keranjang">
          <div class="row">
            <div class="col-6">
              <p class="keterangan-harga">Ongkos Kirim :</p>
            </div>
            <div class="col-6">
              <p class="harga"><?php
                if ($this->cart->total() > 0) {
                  echo '<b>Rp.</b> 0';
                } else {
                  echo 'Rp. 0';
                }
                ?>
              </div>
            </div>

            <hr class="garis-keranjang">
            <div class="row">
              <div class="col-6">
                <p class="keterangan-harga">Sub Total :</p>
              </div>
              <div class="col-6">
                <p class="harga"><?php
                  if ($this->cart->total() > 0) {
                    echo '<b>Rp.</b>' .number_format($this->cart->total(), 0, ',', '.');
                  } else {
                    echo 'Rp. 0';
                  }
                  ?>
                </div>
              </div>
            <?php } else { ?>
              <hr class="garis-keranjang">
              <div class="row">
                <div class="col-6">
                  <p class="keterangan-harga">Ongkos Kirim :</p>
                </div>
                <div class="col-6">
                  <p class="harga"><?php
                    if ($this->cart->total() > 0) {
                      echo '<b>Rp.</b> 9000';
                    } else {
                      echo 'Rp. 0';
                    }
                    ?>
                  </div>
                </div>

                <hr class="garis-keranjang">
                <div class="row">
                  <div class="col-6">
                    <p class="keterangan-harga">Sub Total :</p>
                  </div>
                  <div class="col-6">
                    <p class="harga"><?php
                      if ($this->cart->total() > 0) {
                        echo '<b>Rp.</b>' .number_format($this->cart->total() + 9000, 0, ',', '.');
                      } else {
                        echo 'Rp. 0';
                      }
                      ?>
                    </div>
                  </div>
                <?php } ?>


                <hr class="garis-keranjang">
                <?php if ($this->session->userdata('promo') == 'aktif') { ?>
                  <div class="row justify-content-center pb-4">
                    <div class="col-12 col-sm-12 col-lg-12 col-xl-12">
                      <div class="card">
                        <div class="card-body text-center">

                          <p class="paket">
                            Anda berlangganan promo 1 bulan
                          </p>

                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row justify-content-center pt-4 pb-4">
                    <div class="col-7 col-sm-7 col-lg-7 col-xl-7">
                      <form action="<?= base_url(); ?>voucher" method="post">
                        <div class="input-group">
                          <input type="text" name="" class="form-control form-control-sm" placeholder="Kode Voucher" required>
                          <div class="input-group-append">
                            <input class="btn btn-block btn-success btn-sm" type="submit" name="oke" value="Oke">
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                <?php } else if ($this->session->userdata('promo') == 'habis') { ?>
                  <div class="row justify-content-center pb-4">
                    <div class="col-12 col-sm-12 col-lg-12 col-xl-12">
                      <div class="card">
                        <div class="card-body text-center">

                          <p class="paket">
                            Terima Kasih Sudah Mencoba Promo Kami.
                          </p>

                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row justify-content-center pt-4 pb-4">
                    <div class="col-7 col-sm-7 col-lg-7 col-xl-7">
                      <form action="<?= base_url(); ?>voucher" method="post">
                        <div class="input-group">
                          <input type="text" name="" class="form-control form-control-sm" placeholder="Kode Voucher" required>
                          <div class="input-group-append">
                            <input class="btn btn-block btn-success btn-sm" type="submit" name="oke" value="Oke">
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                <?php } else { ?>
                  <div class="row justify-content-center pt-4 pb-4">
                    <div class="col-7 col-sm-7 col-lg-7 col-xl-7">
                      <form action="<?= base_url(); ?>voucher" method="post">
                        <div class="input-group">
                          <input type="text" name="kd_voucher" class="form-control form-control-sm" placeholder="Kode Voucher" required>
                          <div class="input-group-append">
                            <input class="btn btn-block btn-success btn-sm" type="submit" name="submit" value="Oke">
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>

                  <p class="paket">
                    Pilih paket hemat pengiriman :
                  </p>
                  <div class="row justify-content-center pb-4">
                    <form action="<?= base_url(); ?>home/daftar" method="post">
                      <div class="col-12 col-sm-12 col-lg-12 col-xl-12">
                        <div class="card">
                          <div class="card-body text-center">
                            <a href="<?= base_url(); ?>home/daftar" class="btn btn-success btn-sm">  Rp 150.000,- / bulan</a>

                            <p class="paket">
                              Anda bisa menghemat sampai Rp 5.000 pengiriman tiap hari selama sebulan.
                            </p>

                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                <?php } ?>

                <div class="row text-center">
                  <div class="col-12 col-sm-12 col-lg-12 col-xl-12">
                    <div class="btn-masukkan">
                      <input onclick="masukkan()" class="btn btn-beli btn-success" type="submit" value="Tambah Belanjaan">
                      <?php if ($this->session->userdata('user_login')) { ?>
                        <a href="<?= base_url(); ?>checkout"  class="btn btn-beli btn-success">Lanjut Pembayaran</a>
                      <?php } else { ?>
                        <a href="javascript::" data-toggle="modal" data-target="#modalMasuk" class="btn btn-beli btn-success">Lanjut Pembayaran</a>
                      <?php } ?>
                    </div>
                  </div>
                </div>

              </form>
            </div>

          </div>
        </div>
      </nav>
      <!-- untuk waktu -->
      <div class="container-fluid" style="margin: 10px 0 0 0;">
        <div class="row text-center justify-content-center">
          <div class="col-lg-6">
            <!-- tanggal pengiriman -->
            <div class="alert alert-default" role="alert">
              <p>
                <b><span id="getwaktu"></span></b>
                <br />
                Pesan sebelum jam <span class="alert-link">18.00 WITA</span> untuk pengiriman hari <span id="getharipengiriman"></span>.
                <br />
                <b>Tanggal Pengiriman</b> : <span id="getwaktupengiriman2"></span>
              </p>
            </div>
            <!-- tanggal pengiriman -->
          </div>
        </div>
      </div>
      <!-- tanggal pengiriman -->

      <!-- untuk waktu -->

      <!-- carousel owl -->
      <div class="owl-carousel owl-theme">
        <div class="item">
          <img src="<?= base_url(); ?>assets/img/slide1.png" class="d-block w-100" />
        </div>
        <div class="item">
          <img src="<?= base_url(); ?>assets/img/slide2.png" class="d-block w-100" />
        </div>
        <div class="item">
          <img src="<?= base_url(); ?>assets/img/slide3.png" class="d-block w-100" />
        </div>
        <div class="item">
          <img src="<?= base_url(); ?>assets/img/slide4.png" class="d-block w-100" />
        </div>
        <div class="item">
          <img src="<?= base_url(); ?>assets/img/slide5.png" class="d-block w-100" />
        </div>
      </div>
      <!-- carousel owl -->

      <!-- bagian untuk promo -->
      <section class="pt-4">
        <div class="container-fluid">
          <div class="row text-center">
            <div class="col-6 col-md-6 col-sm-6 col-lg-3 col-xl-3 my-col">
              <a href="#">
                <img src="<?= base_url(); ?>assets/img/dp1.png" class="icon-promo">
              </a>
            </div>
            <div class="col-6 col-md-6 col-sm-6 col-lg-3 col-xl-3 my-col">
              <a href="#">
                <img src="<?= base_url(); ?>assets/img/dp2.png" class="icon-promo">
              </a>
            </div>
            <div class="col-6 col-md-6 col-sm-6 col-lg-3 col-xl-3 my-col">
              <a href="#">
                <img src="<?= base_url(); ?>assets/img/dp3.png" class="icon-promo">
              </a>
            </div>
            <div class="col-6 col-md-6 col-sm-6 col-lg-3 col-xl-3 my-col">
              <a href="#">
                <img src="<?= base_url(); ?>assets/img/dp4.png" class="icon-promo">
              </a>
            </div>
          </div>
        </div>
      </section>
      <!-- bagian untuk promo -->

      <!-- bagian beli sayur -->
      <section class="box-sayur text-center pt-4" id="belisayur">
        <h2>Dapur Sayur dan Buah</h2>

        <!-- untuk bagian kategori -->
        <div class="isi-box-kategori">
          <div class="box-kategori">
            <div class="box-scroll">

              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url(); ?>home/s_daun">
                    <img class="icon-kategori" src="<?= base_url(); ?>assets/img/kt1.png" alt="">
                  </a>
                  <a class="nav-link" href="<?=base_url(); ?>home/s_daun">Sayur Daun</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url(); ?>home/s_buah">
                    <img class="icon-kategori" src="<?= base_url(); ?>assets/img/kt2.png" alt="">
                  </a>
                  <a class="nav-link" href="<?= base_url(); ?>home/s_buah">Sayur Buah</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url(); ?>home/umbi_umbian">
                    <img class="icon-kategori" src="<?= base_url(); ?>assets/img/kt3.png" alt="">
                  </a>
                  <a class="nav-link" href="<?= base_url(); ?>home/umbi_umbian">Umbi - umbian</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url(); ?>home/buah">
                    <img class="icon-kategori" src="<?= base_url(); ?>assets/img/kt5.png" alt="">
                  </a>
                  <a class="nav-link" href="<?= base_url(); ?>home/buah">Buah</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url(); ?>">
                    <img class="icon-kategori" src="<?= base_url(); ?>assets/img/kt4.png" alt="">
                  </a>
                  <a class="nav-link" href="<?= base_url(); ?>">Bumbu Dapur</a>
                </li>
              </ul>

            </div>
          </div>
        </div>
        <!-- untuk bagian kategori -->

        <!-- daftar barang marketplace -->
        <div class="row isi-box-sayur">
          <?= $content; ?>
        </div>
        <!-- daftar barang marketplace -->
        <!-- button view all -->
        <div class="row justify-content-center view-all">
          <div class="col-lg-2">
            <a class="btn btn-success" href="<?= base_url(); ?>home/list_sayur">View All</a>
          </div>
        </div>
        <!-- button view all -->

      </section>

      <!-- bagian resep dapur -->
      <section class="text-center" id="belilauk">
        <h2>Dapur Lauk Pauk</h2>

        <div class="row isi-box-laukpauk">
          <div class="col-6 col-md-6 col-sm-6 col-lg-3 col-xl-3 my-col">

            <div class="work">
              <img class="sayur" src="<?= base_url(); ?>assets/img/lauk/lauk1.jpg" alt="">
              <div class="work-bottom">
                <h3>Bandeng</h3>

                <div class="row">
                  <div class="col-sm-12">
                    <table align="center">
                      <tr>
                        <td align="left">Harga</td>
                        <td align="left">: Rp. 2000 / Ikat</td>
                      </tr>
                      <tr>
                        <td align="left">Sisa Stok</td>
                        <td align="left">: 100 Ikat</td>
                      </tr>
                    </table>
                  </div>
                </div>

                <form class="" action="daftar.html" method="post">
                  <div class="btn-masukkan">
                    <input class="btn btn-beli btn-success" type="submit" value="Masukkan ke keranjang">
                  </div>
                </form>

              </div>
            </div>

          </div>
        </div>

        <!-- daftar resep dapur -->

        <!-- daftar resep dapur -->

        <!-- button view all -->
        <div class="row justify-content-center view-all">
          <div class="col-lg-2">
            <a class="btn btn-success" href="<?= base_url(); ?>home/resep">View All</a>
          </div>
        </div>
        <!-- button view all -->
      </section>

      <!-- cara pengunaan Dapurtani -->
      <section class="box-pengguna" id="pengguna">
        <div class="container">

          <h2 class="text-center">Cara Pengguna</h2>

          <div class="row isi-box-pengguna text-center">
            <div class="col-lg-3">
              <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                <div class="features-icons-icon d-flex">
                  <img class="icon icon-langkah1 m-auto text-primary" src="<?= base_url(); ?>assets/img/langkah1.png" alt="icon">
                </div>
                <p class="lead isi-langkah mb-0">Pilih sayuran sesuai keinginan atau kebutuhan Anda.</p>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                <div class="features-icons-icon d-flex">
                  <img class="icon icon-langkah2 m-auto text-primary" src="<?= base_url(); ?>assets/img/langkah2.png" alt="icon">
                </div>
                <p class="lead isi-langkah2 mb-0">Setelah itu dikeranjang belanja, lalu klik lanjutkan pembayaran jika Anda selesai memilih sayuran.</p>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="features-icons-item mx-auto mb-5 mb-lg-3">
                <div class="features-icons-icon d-flex">
                  <img class="icon icon-langkah m-auto text-primary" src="<?= base_url(); ?>assets/img/langkah3.png" alt="icon">
                </div>
                <p class="lead isi-langkah mb-0">Lalu isi data yang kami minta, lalu klik order.</p>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="features-icons-item mx-auto mb-5 mb-lg-3">
                <div class="features-icons-icon d-flex">
                  <img class="icon icon-langkah m-auto text-primary" src="<?= base_url(); ?>assets/img/langkah4.png" alt="icon">
                </div>
                <p class="lead isi-langkah mb-0">Kemudian orderan Anda akan kami kirim di alamat Anda.</p>
              </div>
            </div>
          </div>

        </div>
      </section>
      <!-- cara pengunaan Dapurtani -->

      <!-- Image Showcases -->

      <!-- bagian subcribe -->
      <section class="berlangganan text-white pt-4 pb-4" id="berlangganan">
        <div class="container">
          <div class="row justify-content-md-center">

            <div class="col-xl-9 text-center">
              <h1 class="mb-2">Dapatkan Informasi terbaru dari kami.</h1>
            </div>

            <!-- form submit -->
            <div class="col-xl-6">
              <?php echo form_open('home/add_email'); ?>
              <input type="hidden" name="iduser" id="iduser">
              <div class="input-group">
                <input class="form-control form-control" value="<?= set_value('email') ?>" type="email" name="email" id="email" class="form-control form-control-lg" aria-describedby="email" placeholder="Masukkan Email Anda" required>
                <div class="input-group-append">
                  <input class="btn btn-block btn-success" type="submit" value="Submit">
                </div>
              </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
        <!-- form submit -->

      </section>

      <!-- Footer -->
      <footer class="footer bg-light">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <ul class="list-menu">
                <li class="list-menu-item">
                  <a href="#">Tentang Kami</a>
                </li>
                <li class="list-menu-item">
                  <a href="#">Hubungi Kami</a>
                </li>
                <li class="list-menu-item">
                  <a href="#">Blog</a>
                </li>
              </ul>
            </div>

            <div class="col-lg-6">
              <ul class="list-inline mb-0">
                <li class="list-inline-item">
                  <a href="https://www.facebook.com/Dapurtani-326912511430162/?modal=admin_todo_tour" target="_blank">
                    <i class="fab fa-facebook fa-2x fa-fw"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="https://www.instagram.com/dapurtani_/?hl=id" target="_blank">
                    <i class="fab fa-instagram fa-2x fa-fw"></i>
                  </a>
                </li>
                <li class="list-inline-item mr-3">
                  <a href="https://wa.me/6282191946787" target="_blank">
                    <i class="fab fa-whatsapp fa-2x fa-fw"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="https://www.youtube.com/channel/UCF9KrxrttHN6i4b-xFkcyBA" target="_blank">
                    <i class="fab fa-youtube fa-2x fa-fw"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <a id="keatas" href="#header" class="btn js-scroll-trigger">
          <i class="fa fa-chevron-up fa-fw fa-1x"></i>
        </a>
      </footer>

      <div class="container text-center copyright">
        <p class="text-muted">&copy; Dapurtani 2018 - <span id="gettahun">.</span></p>
      </div>
      <!-- Modal masuk -->
      <div class="modal fade" id="modalMasuk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="<?= base_url(); ?>home/login" method="post">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h6>Login</h6>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Ingat Saya!</label>
                </div>
                <button type="submit" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <input type="submit" class="btn btn-success" name="submit" value="Masuk">
              </div>
              <div class="modal-footer">
                <p>Belum punya akun? <a href="<?= base_url(); ?>home/registrasi">Daftar</a> </p>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- Modal masuk -->
      <?php
      foreach($this->cart->contents() as $key) :
      ?>

      <!-- Modal hapus -->
      <div class="modal fade" id="modalHapus<?= $key['rowid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="<?= base_url(); ?>cart/delete/<?= $key['rowid']; ?>" method="post">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h6>Konfirmasi Hapus!</h6>
              </div>
              <div class="modal-body">
                Apakah Anda Yakin ingin Menghapus Barang ini dari Keranjang Belanjaan Anda?
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                <input type="submit" name="iya" value="Iya" class="btn btn-success">
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- Modal hapus -->
    <?php endforeach; ?>
    <!-- jquery -->
    <?php echo $js; ?>

    <script type="text/javascript">
    $(document).ready(function() {
      // untuk tombol tambah
      $('.tambah').click(function () {
        var tambah = $(this).siblings('#jumlahstok').attr("value");
        var jumlah = parseInt(tambah) + parseInt(1);

        if (tambah == 1) {
          // untuk menambah jumlah stok
          $(this).siblings('#jumlahstok').attr("value", jumlah);
        } else {
          // untuk menambah jumlah stok
          $(this).siblings('#jumlahstok').attr("value", jumlah);
        }

      });

      // untuk kurang
      $('.kurang').click(function () {
        var kurang = $(this).siblings("#jumlahstok").val();
        var tes = parseInt(kurang) - parseInt(1);
        if (kurang == 1) {
          $(this).siblings("#jumlahstok").attr("value", 1);
        } else {
          $(this).siblings("#jumlahstok").attr("value", tes);
        }
      });
    });
    </script>

  </body>
  </html>
