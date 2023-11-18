<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kegiatan</th>
            <th>Tanggal</th>
            <th>Jam</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($agenda as $key => $value) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $value['nama_kegiatan'] ?></td>
            <td><?= $value['tanggal'] ?></td>
            <td><?= $value['jam'] ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>