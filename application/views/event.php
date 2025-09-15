<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Tombol Tambah Event -->
        <div class="mb-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                <i class="bx bx-plus me-1"></i> Tambah Event
            </button>
        </div>

        <!-- Tabel Event -->
        <div class="card">
            <h5 class="card-header">Daftar Event</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Lokasi</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($events as $e): ?>
                            <tr>
                                <td><?= $e->judul ?></td>
                                <td><?= $e->tanggal_event ?></td>
                                <td><?= $e->lokasi ?></td>
                                <td>Rp <?= number_format($e->harga, 0, ',', '.') ?></td>
                                <td><img src="<?= base_url('uploads/' . $e->gambar) ?>" width="80"></td>
                                <td>
                                    <!-- Dropdown Aksi -->
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <!-- Edit -->
                                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit<?= $e->id ?>">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <!-- Delete -->
                                            <a class="dropdown-item" href="javascript:void(0);"
                                                onclick="confirmDelete(<?= $e->id ?>)">
                                                <i class="bx bx-trash me-1"></i> Hapus
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="modalEdit<?= $e->id ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <form method="post" action="<?= site_url('event/edit/' . $e->id) ?>" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Event</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Judul</label>
                                                    <input type="text" name="judul" class="form-control" value="<?= $e->judul ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Deskripsi</label>
                                                    <textarea name="deskripsi" class="form-control"><?= $e->deskripsi ?></textarea>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label class="form-label">Tanggal</label>
                                                        <input type="date" name="tanggal_event" class="form-control"
                                                            value="<?= $e->tanggal_event ?>">
                                                    </div>
                                                    <div class="col mb-3">
                                                        <label class="form-label">Lokasi</label>
                                                        <input type="text" name="lokasi" class="form-control" value="<?= $e->lokasi ?>">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label class="form-label">Harga</label>
                                                        <input type="number" name="harga" class="form-control" value="<?= $e->harga ?>">
                                                    </div>
                                                    <div class="col mb-3">
                                                        <label class="form-label">Gambar</label>
                                                        <input type="file" name="gambar" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal Edit -->

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Tambah -->
        <div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form method="post" action="<?= base_url('event/create') ?>" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Event</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Judul</label>
                                <input type="text" name="judul" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control"></textarea>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal_event" class="form-control">
                                </div>
                                <div class="col mb-3">
                                    <label class="form-label">Lokasi</label>
                                    <input type="text" name="lokasi" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label class="form-label">Harga</label>
                                    <input type="number" name="harga" class="form-control">
                                </div>
                                <div class="col mb-3">
                                    <label class="form-label">Gambar</label>
                                    <input type="file" name="gambar" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal Tambah -->

    </div>
</div>

<script>
    function confirmDelete(eventId) {
        Swal.fire({
            title: "Anda Yakin?",
            text: "Event ini akan dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= site_url('event/delete/') ?>" + eventId;
            }
        });
    }
</script>