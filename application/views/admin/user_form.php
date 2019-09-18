<div class="x_panel">
                  <div class="x_title">
                    <h2></h2>
                    <div class="clearfix"></div>
                    <?= validation_errors('<p style="color:red">','</p>'); ?>
                     <?php
                     if ($this->session->flashdata('alert'))
                     {
                       echo '<div class="alert alert-danger alert-message">';
                       echo $this->session->flashdata('alert');
                       echo '</div>';
                     }
                      ?>
                  </div>
                  <?php
                  $user = $data->row();
                   ?>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" action="" enctype="multipart/form-data" method="post">

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Username</label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="username" value="<?= $user->username; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Nama Lengkap</label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="fullname" value="<?= $user->fullname; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Email</label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                          <input type="email" class="form-control col-md-7 col-xs-12" name="email" value="<?= $user->email; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Telp</label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="telp" value="<?= $user->telp; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Alamat</label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="alamat" value="<?= $user->alamat; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Promo</label>
                        <div class="col-md-4 col-sm-6">
                          <select name="promo" class="form-control">
                            <option value="">--Pilih Promo--</option>
                            <option value="aktif" <?php if($user->promo == 'aktif') {echo "selected";} ?>>Aktif</option>
                            <option value="habis" <?php if($user->promo == 'habis' ) {echo "selected";} ?>>Habis</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">S_Pemesanan</label>
                        <div class="col-md-4 col-sm-6">
                          <select name="s_pemesanan" class="form-control">
                            <option value="">--Pilih S_Pemesanan--</option>
                            <option value="diantar" <?php if($user->s_pemesanan == 'diantar') {echo "selected";} ?>>Diantar</option>
                            <option value="diterima" <?php if($user->s_pemesanan == 'diterima' ) {echo "selected";} ?>>Diterima</option>
                          </select>
                        </div>
                      </div>

                      <div class="ln_solid"></div>

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" name="submit" value="Submit">Submit</button>
                          <button type="button" onclick="window.history.go(-1)" class="btn btn-primary">kembali</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
