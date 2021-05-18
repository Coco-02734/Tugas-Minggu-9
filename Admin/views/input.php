<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Produk</h1>
    </div>
    <hr>
    <div class="card">
        <div class="card-body">
            <div class="col-lg-8">
                <div class="mt-2 mb-4">
                    <h6>Informasi Produk</h6>
                </div>
                <?= form_open_multipart('admin/admin/upload') ?>
                <div class="form-group">
                    <label for="nama">Nama Produk</label>
                    <input type="text" class="form-control" placeholder="Contoh : Sepatu, Komputer, Laptop..." id="nama" name="namaproduk" required>
                </div>
                <div class="form-group">
                    <label for="keterangan">Diskripsi Produk</label>
                    <textarea class="form-control" id="keterangan" rows="3" placeholder="Pastikan deskripsi produk memuat spesifikasi, ukuran, bahan, masa berlaku, dan lainnya. Semakin detail, semakin berguna bagi pembeli." name="keterangan"></textarea>
                </div>
                <div class="form-group">
                    <label for="harga">Harga Satuan</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp</div>
                        </div>
                        <input type="text" class="form-control" id="harga" placeholder="10.000" name="harga" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="stok">Stok Produk</label>
                    <input type="number" class="form-control" id="stok" name="stok" required>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori Produk</label>
                    <select id="kategori" name="id_kategori" class="form-control" required>
                        <?php foreach ($kategori as $k) : ?>
                            <option value="<?= $k['id_katagori'] ?>"><?= $k['nama_katagori']; ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status Produk</label>
                    <select id="status" name="aktif" class="form-control" required>
                        <option value="1">Aktif</option>
                        <option value="2">Di Arsipkan</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-3 mb-4">
        <div class="card-body">
            <div class="col-lg-8">
                <div class="mt-2 mb-4">
                    <h6>Informasi Gambar</h6>
                </div>
                <div class="form-group">
                    <label for="foto">Foto Produk</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto" name="foto" required>
                        <label class="custom-file-label" for="foto">Pilih File</label>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="text-right mt-3 mb-3">
        <button type="submit" class="btn btn-success btn-lg">Tambah Produk</button>
    </div>
    </form>
</div>