  <div class="container-fluid" id="container-wrapper">
      <?= $this->session->flashdata('message'); ?>
      <div class="row mb-3">
          <div class="col-lg-12">
              <div class="card mb-4">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Daftar Produk</h6>
                  </div>
                  <div class="table-responsive p-3">
                      <table class="table align-items-center table-flush" id="dataTable">
                          <thead class="thead-light">
                              <tr>
                                  <th>ID Produk</th>
                                  <th>Foto Produk</th>
                                  <th>Nama Produk</th>
                                  <th>Harga</th>
                                  <th>Stok</th>
                                  <th>Atur</th>
                              </tr>
                          </thead>
                          <tfoot>
                              <?php foreach ($produk as $a) : ?>
                                  <tr>
                                      <th>MA<?= $a['id_menu']; ?></th>
                                      <th><img class="img-fluid" width="100px" src="<?= base_url('assets/menu/') . $a['gambar_menu']; ?>" alt=""></th>
                                      <th>
                                          <?php
                                            if ($a['aktif'] == 0) {
                                                echo "<h6><span class='badge badge-danger'>Tidak Aktif</span></h6>";
                                            } else {
                                                echo "<h6><span class='badge badge-success'>Aktif</span></h6>";
                                            }
                                            ?>
                                          <?= $a['nama_menu']; ?>

                                      </th>
                                      <th><?= $a['harga']; ?></th>
                                      <th><?= $a['stok']; ?></th>
                                      <th>
                                          <h5><a class="badge badge-danger" href="<?= base_url('admin/admin/hapus/') . $a['id_menu']; ?>?">Hapus</a></h5>
                                      </th>
                                  </tr>
                              <?php endforeach; ?>
                          </tfoot>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>