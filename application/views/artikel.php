        <h2>Tambah Event</h2>
        <form method="post">
            Judul: <input type="text" name="judul"><br>
            Deskripsi: <textarea name="deskripsi"></textarea><br>
            Tanggal: <input type="date" name="tanggal_event"><br>
            Lokasi: <input type="text" name="lokasi"><br>
            Harga: <input type="number" name="harga"><br>
            Gambar: <input type="text" name="gambar"><br>
            <button type="submit">Simpan</button>
        </form>
        <h2>Edit Event</h2>
        <form method="post">
            Judul: <input type="text" name="judul" value="<?= $event->judul ?>"><br>
            Deskripsi: <textarea name="deskripsi"><?= $event->deskripsi ?></textarea><br>
            Tanggal: <input type="date" name="tanggal_event" value="<?= $event->tanggal_event ?>"><br>
            Lokasi: <input type="text" name="lokasi" value="<?= $event->lokasi ?>"><br>
            Harga: <input type="number" name="harga" value="<?= $event->harga ?>"><br>
            Gambar: <input type="text" name="gambar" value="<?= $event->gambar ?>"><br>
            <button type="submit">Update</button>
        </form>