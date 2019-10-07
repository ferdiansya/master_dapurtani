<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dapurtani</title>

    <!-- icon Dapurtani -->
    <link href="<?= base_url(); ?>assets/img/logoicon.png" rel="icon" type="image/x-icon">

    <!-- Bootstrap css cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- font family cdn -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">

    <link href="<?= base_url(); ?>assets/vendor/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">

    <link href="<?= base_url(); ?>assets/css/sidebar.css" rel="stylesheet">

    <!-- scroll reveal cdn -->
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

    </head>


  <body id="header" onload="setInterval('reloadwaktu()');">

    <nav class="navbar navbar-custom navbar-expand-lg sticky-top navbar-light bg-light">
      <div class="container-fluid">
        <!-- navbar brand -->
        <a class="navbar-brand" href="<?= base_url(); ?>home/index2">
          <img class="logo" src="<?= base_url(); ?>assets/img/logo.png" alt="logo">
        </a>
        <!-- navbar toggle -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- navbar menu -->

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <?php if ($this->session->userdata('s_pemesanan') == 'diantar') { ?>
            <li class="nav-item">
              <a class="nav-link" href="javascript::" data-toggle="modal" data-target="#modalDiantar"> Status Pemesanan</a>
            </li>
          <?php } else if ($this->session->userdata('s_pemesanan') == 'proses') { ?>
            <li class="nav-item">
              <a class="nav-link" href="javascript::" data-toggle="modal" data-target="#modalDiproses"> Status Pemesanan</a>
            </li>
          <?php } if ($this->session->userdata('user_login')) { ?>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="<?= base_url(); ?>home/index2"> Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#pengguna"> Cara Pemesanan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="<?= base_url(); ?>home/transaksi">History</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>home/hubungi"> Hubungi Kami</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>home/tentang"> Tentang Kami</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="<?= base_url(); ?>home/logout">Keluar</a>
            </li>
                <?php } else { ?>
                  <li class="nav-item">
                    <a class="nav-link" href="javascript::" data-toggle="modal" data-target="#modalMasuk"><i class="fa fa-sign-in"></i> Masuk</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="<?= base_url(); ?>home/registrasi"><i class="fa fa-briefcase"></i> Daftar</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="<?= base_url(); ?>home/tentang">Tentang Kami</a>
                  </li >
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>home/hubungi">Hubungi Kami</a>
                  </li>
        <?php } ?>

          </ul>
        </div>
          <form class="form-row my-2 my-lg-0">
            <div class="col-lg-12">
            <div class="input-group">
            <input type="text" class="form-control form-control-sm pencarian" type="search" placeholder="Cari.." aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append">
              <button class="btn btn-outline-success btn-sm my-sm-0" onclick="masukkan()" type="submit">
                <i class="fa fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
          </form>
        </div>
    </nav>
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
            <div class="row control-group">
              <div class="col-3 col-sm-4 col-lg-4 col-xl-4 gambar-sayur">
              <img src="<?= base_url(); ?>assets/upload/<?= $key['picture']; ?>" alt="">
              </div>
              <div class="col-4 col-sm-4 col-lg-4 col-xl-4 detail-sayur">
                <h3 class="nama-sayur"><?= $key['name']; ?></h3>
                <p class="harga-sayur">Rp. <?= number_format($key['price'], 0, ',', '.'); ?> / <sub>500 gram</sub></p>

                <button class="btn btn-primary icon-tambah" type="button" name="button" data-toggle="modal" data-target="#modalUbah<?= $key['rowid']; ?>"><i class="fa fa-edit"></i></button>

                <input class="input-jumlah form-control form-control-sm" type="text" name="qty" min="1" value="<?= $key['qty']; ?>" readonly>

                <button class="btn btn-danger icon-kurang" type="button" name="button" data-toggle="modal" data-target="#modalHapus<?= $key['rowid']; ?>"><i class="fa fa-trash"></i></button>

              </div>
              <div class="col-4 col-sm-3 col-lg-3 col-xl-3 total-harga">
                Total :
                <br >
                Rp. <?= number_format($key['price'] * $key['qty'], 0, ',', '.'); ?>
              </div>
            </div>
<?php endforeach; ?>
    <hr class="garis-keranjang">
              <div class="row">
                <div class="col-6">
                  <p class="keterangan-harga">Total Belanja :</p>
                </div>
                <div class="col-6">
                  <p class="harga"><b>Rp.</b><?= number_format($this->cart->total(), 0, ',', '.'); ?></p>
                </div>
              </div>
              <?php if ($this->session->userdata('promo') == 'perbulan') { ?>
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
              <?php } else if ($this->session->userdata('promo') == 'perminggu') { ?>
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
                      echo '<b>Rp.</b> 2000';
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
                      echo '<b>Rp.</b>' .number_format($this->cart->total() + 2000, 0, ',', '.');
                    } else {
                      echo 'Rp. 0';
                    }
                    ?>
                  </div>
                </div>
              <?php } ?>


              <hr class="garis-keranjang">
              <?php if ($this->session->userdata('promo') == 'perbulan') { ?>
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
                    <form action="" method="post">
                      <div class="input-group">
                        <input type="text" name="" class="form-control form-control-sm" placeholder="Kode Voucher" required>
                        <div class="input-group-append">
                          <input class="btn btn-block btn-success btn-sm" type="submit" name="oke" value="Oke">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
            <?php } else if ($this->session->userdata('promo') == 'perminggu') { ?>
              <div class="row justify-content-center pb-4">
                <div class="col-12 col-sm-12 col-lg-12 col-xl-12">
                  <div class="card">
                    <div class="card-body text-center">

                        <p class="paket">
                          Anda Berlangganan Promo 1 Minggu.
                        </p>

                    </div>
                  </div>
                </div>
              </div>

              <div class="row justify-content-center pt-4 pb-4">
                <div class="col-7 col-sm-7 col-lg-7 col-xl-7">
                  <form action="" method="post">
                    <div class="input-group">
                      <input type="text" name="" class="form-control form-control-sm" placeholder="Kode Voucher" required>
                      <div class="input-group-append">
                        <input class="btn btn-block btn-success btn-sm" type="submit" name="submit" value="Oke">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            <?php } else { ?>
              <div class="row justify-content-center pt-4 pb-4">
                <div class="col-7 col-sm-7 col-lg-7 col-xl-7">
                  <form action="" method="post">
                    <div class="input-group">
                      <input type="text" name="kd_voucher" class="form-control form-control-sm" placeholder="Kode Voucher">
                      <div class="input-group-append">
                        <input class="btn btn-block btn-success btn-sm" type="submit" name="submit" value="Oke" onclick="masukkan()">
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <p class="paket">
                Pilih paket hemat pengiriman :
              </p>
              <div class="row justify-content-center pb-4">
                <div class="col-12 col-sm-12 col-lg-12 col-xl-12">
                  <div class="card">
                    <div class="card-body text-center">
                      <form action="<?= base_url(); ?>home/daftar" method="post">
                        <button class="btn btn-success btn-sm" type="button" name="button" onclick="masukkan()">
                          Berlangganan pengiriman
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>

              <div class="row text-center">
                <div class="col-12 col-sm-12 col-lg-12 col-xl-12">
                  <div class="btn-masukkan">
                    <a href="<?= base_url(); ?>home/index2"  class="btn btn-beli btn-default">Tambah Belanjaan</a>
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
            <a href="#belisayur">
              <img src="<?= base_url(); ?>assets/img/dp1.png" class="icon-promo">
            </a>
          </div>
          <div class="col-6 col-md-6 col-sm-6 col-lg-3 col-xl-3 my-col">
            <a href="<?= base_url(); ?>home/d_kebutuhan ">
              <img src="<?= base_url(); ?>assets/img/dp2.png" class="icon-promo">
            </a>
          </div>
          <div class="col-6 col-md-6 col-sm-6 col-lg-3 col-xl-3 my-col">
            <a href="#" onclick="masukkan()">
              <img src="<?= base_url(); ?>assets/img/dp3.png" class="icon-promo">
            </a>
          </div>
          <div class="col-6 col-md-6 col-sm-6 col-lg-3 col-xl-3 my-col">
            <a href="#" onclick="masukkan()">
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
                <a class="nav-link" href="<?= base_url(); ?>home/bumbu_dapur">
                  <img class="icon-kategori" src="<?= base_url(); ?>assets/img/kt4.png" alt="">
                  </a>
                  <a class="nav-link" href="<?= base_url(); ?>home/bumbu_dapur">Bumbu Dapur</a>
              </li>
            </ul>

          </div>
        </div>
      </div>
      <!-- untuk bagian kategori -->

      <!-- daftar barang marketplace -->
      <div class="row isi-box-sayur">
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
            <?php if ($key->stock  == 0) { 
      echo "<b>Stock Kosong</b>";
      ?>
       <?php } else { ?>
          <a class="btn btn-beli btn-success" href="<?= base_url(); ?>cart/add/<?= $key->id_sayur; ?>">Masukkan ke Keranjang</a>
          <?php } ?>
                </div>
              </div>

            </div>
        <?php endforeach; ?>
      </div>
      <!-- daftar barang marketplace -->
            <!-- button view all -->
      <div class="row justify-content-center view-all">
        <div class="col-lg-2">
          <a class="btn btn-success" href="<?= base_url(); ?>home/list_sayur">Lihat Semua</a>
        </div>
      </div>
      <!-- button view all -->

    </section>

    <!-- begin:: dapur kebutuhan -->
    <section class="text-center" id="belilauk">
      <!-- button view all -->
      <div class="row justify-content-center view-all">
        <div class="col-lg-12">        
            <img src="<?= base_url(); ?>assets/img/logo dapur warung.png" class="logo"><br>
Dapur warung adalah tempat belanja kebutuhan dapur lainnya yang ada di warung sekitar anda<br>
            <a class="btn btn-success" href="<?= base_url(); ?>home/d_kebutuhan">Belanja
          </a>
        </div>
      </div>
      <!-- button view all -->
    </section>
    <!-- end:: dapur kebutuhan -->

    <!-- cara pengunaan Dapurtani -->
    <section class="box-pengguna" id="pengguna">
      <div class="container">

        <h2 class="text-center">Cara Pemesanan</h2>

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
                  <input class="form-control form-control" value="<?= set_value('email') ?>" type="email" name="email" class="form-control form-control-lg" aria-describedby="email" placeholder="Masukkan Email Anda" required>
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
                <a href="https://wa.me/6281244065453" target="_blank">
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
                <input type="text" class="form-control" name="email" placeholder="Email">
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



    <!-- Modal ubah -->
    <div class="modal fade" id="modalUbah<?= $key['rowid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="<?= base_url(); ?>cart/update/<?= $key['rowid']; ?>" method="post">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6>Mengubah jumlah beli!</h6>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label for="qty<?= $key['rowid']; ?>">Jumlah Pesan</label>
                <input type="number" name="qty" min="1" max="<?= $key['stock']; ?>" class="form-control" value="<?= $key['qty']; ?>" id="qty<?= $key['qty']; ?>" autofocus>

              </div>
              <button type="submit" class="btn btn-danger" data-dismiss="modal">Batal</button>
              <button type="submit" name="submit" value="Submit" class="btn btn-success">Ubah</button>

          </div>
        </div>
      </div>
      </form>
    </div>
    <!-- Modal ubah -->

    <!-- Modal berlangganan -->
    <div class="modal fade" id="modalBerlangganan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6>Pilih paket pengiriman</h6>
          </div>
          <div class="modal-body">
            <form action="">
              <div class="form-group">
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
              <a href="<?= base_url(); ?>home/perminggu"><b>-> Paket perminggu Rp. 50.000,- </b></a>
                    <br />
                    <i>Ongkos Kirim hanya Rp. 7.000/hari selama seminggu</i>
                  </label>
                </div>
                <div class="form-check form-check-inline">
                 <br>
                  <label class="form-check-label">
                  <a href="<?= base_url(); ?>home/perbulan">  <b>-> Paket perbulan Rp. 150.000,-</b></a>
                    <br />
                    <i>Ongkos Kirim hanya Rp. 5.000/hari selama sebulan</i>
                  </label>
                </div>
              </div>
              <button type="submit" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal berlangganan -->

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

<!-- Modal status pemesanan -->
<div class="modal fade" id="modalDiproses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6>Status Pemesanan</h6>
      </div>
      <div class="modal-body">
        Pengiriman : <b><span id="getwaktupengiriman3"></span></b>
        <div class="row text-center pt-2">
          <div class="col-12">
            <img class="pesanan-proses text-center" src="<?= base_url(); ?>assets/img/iconproses.png">
            <h2 style="margin-bottom: 0; color: #73C089; font-size: 25px;">Pesanan diproses</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modalDiantar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6>Status Pemesanan</h6>
      </div>
      <div class="modal-body">
        Pengiriman : <b><span id="getwaktupengiriman4"></span></b>
        <div class="row text-center pt-2">
          <div class="col-12">
            <img class="pesanan-proses text-center" src="<?= base_url(); ?>assets/img/iconkirim.png">
            <h2 style="margin-bottom: 0; color: #73C089; font-size: 25px;">Pesanan dikirim</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal status pemesanan -->
    <!-- jquery -->
    <!-- jquery -->
      <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <!-- popper js cdn -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <!-- bootstrap js cdn -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="<?= base_url(); ?>assets/vendor/owlcarousel/owl.carousel.js"></script>

    <!-- jquery-easing -->
    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>


    <!-- Pemanggilan Tanpa Scroll -->
    <script src="<?= base_url(); ?>assets/vendor/js/dinamis.js"></script>

    <!-- Pemanggilan Animasi -->
    <script src="<?= base_url(); ?>assets/vendor/js/animasi.js"></script>

    <script src="<?= base_url(); ?>assets/vendor/js/carousel.js"></script>

    <!-- Pemanggilan Tanggal -->
    <script src="<?= base_url(); ?>assets/vendor/js/tanggal.js"></script>

    <script src="<?= base_url(); ?>assets/vendor/js/sidebar.js"></script>

    <script src="<?= base_url(); ?>assets/vendor/js/addordel.js"></script>

    <script type="text/javascript">

      function masukkan() {
        alert('Mohon Maaf fitur ini dalam tahap pengembangan !');
      }

    </script>
    <script type="text/javascript">
      function masukkan() {
        alert('Mohon Maaf fitur ini dalam tahap pengembangan !');
      }
    </script>


  </body>
  </html>
