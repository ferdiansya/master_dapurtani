<?php
// $user = $this->session->userdata('user_id');
// $cek  = $this->app->get_where('t_users', "id_user = '$user'" )->result_array();
 ?>

<nav class="navbar navbar-custom navbar-expand-lg sticky-top navbar-light bg-light">
  <div class="container-fluid">
    <!-- navbar brand -->
    <a class="navbar-brand" href="<?= base_url(); ?>home">
      <img class="logo" src="<?= base_url(); ?>assets/img/logo.png" alt="logo">
    </a>
    <!-- navbar toggle -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- navbar menu -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <?php if ($this->session->userdata('user_login')) { ?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#belisayur"> Beli Sayur</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#belilauk"> Beli Lauk</a>
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
        <?php } if ($this->session->userdata('s_pemesanan') == 'diantar') { ?>
          <li class="nav-item">
            <a class="nav-link" href="javascript::" data-toggle="modal" data-target="#modalDiantar"> Status Pemesanan</a>
          </li>
        <?php } else if ($this->session->userdata('s_pemesanan') == 'diterima') { ?>
          <li class="nav-item">
            <a class="nav-link" href="javascript::" data-toggle="modal" data-target="#modalStatusPemesanan"> Status Pemesanan</a>
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
      <form class="form-inline my-2 my-lg-0">
        <div class="input-group">
          <input type="text" class="form-control form-control-sm pencarian" type="search" placeholder="Cari.." aria-label="Recipient's username" aria-describedby="button-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-success btn-sm my-sm-0" type="submit">
              <i class="fa fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </nav>
  <!-- Modal status pemesanan -->
  <div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

  <div class="modal fade" id="modalStatusPemesanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6>Status Pemesanan</h6>
        </div>
        <div class="modal-body">
          Pemesanan : <b><span id="getwaktupembayaran"></span></b>
          <div class="row text-center pt-2">
            <div class="col-12">
              <img class="pesanan-proses text-center" src="<?= base_url(); ?>assets/img/iconterima.png">
              <h2 style="margin-bottom: 10px; color: #73C089; font-size: 25px;">Pesanan telah diterima</h2>

              <form action="<?= base_url(); ?>home/dafatr_paket" method="post">

                <p style="margin-bottom: 0; text-align: left;">Beri rating :</p>
                <div class="row justify-content-center">
                  <div class="col-7 col-sm-5 col-md-5 col-lg-5">
                    <div class="rating">
                      <input type="radio" name="bintang" id="bintang1" value="5"><label for="bintang1"></label>
                      <input type="radio" name="bintang" id="bintang2" value="4"><label for="bintang2"></label>
                      <input type="radio" name="bintang" id="bintang3" value="3"><label for="bintang3"></label>
                      <input type="radio" name="bintang" id="bintang4" value="2"><label for="bintang4"></label>
                      <input type="radio" name="bintang" id="bintang5" value="1"><label for="bintang5"></label>
                    </div>
                  </div>
                </div>
                <input type="hidden" name="nama" value="<?= $this->session->userdata('name'); ?>">
                <input type="hidden" name="email" value="<?= $this->session->userdata('email'); ?>">
                <input type="hidden" name="telp" value="<?= $this->session->userdata('telp'); ?>">
                <p style="margin-bottom: 0; text-align: left;">Punya saran buat kami ?</p>
                <div class="form-group">
                  <textarea class="form-control" name="alamat" rows="5" cols="5" required></textarea>
                </div>
                <input type="submit" name="submit" value="Selesai" class="btn btn-success">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal status pemesanan -->
