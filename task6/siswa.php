<div class="row">
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Tabel Siswa</h3>
            <?php if ($_SESSION['level']!="siswa") { ?>
      <div class="card-tools">
      <a href="halaman.php?halaman=tambahsiswa" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp&nbspTambah Siswa</a>
      </div>
    <?php } ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>NIS</th>
                        <th>Alamat</th>
                        <th>No Telphone</th>
                        <?php if ($_SESSION['level']!="siswa") { ?>
                        <th>Level</th>
                        <?php } ?>
                        <th>Entry</th>
                        <?php if ($_SESSION['level']!="siswa") { ?>
                        <th style="width: 150px;">Action</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $sql = $koneksi->query("SELECT * FROM users")
                 ?>
                 <?php while ($data = $sql->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?= $data['nama']?></td>
                        <td><?= $data['email']?></td>
                        <td><?= $data['nis']?></td>
                        <td><?= $data['alamat']?></td>
                        <td><?= $data['tlp']?></td>
                        <?php if ($_SESSION['level']!="siswa") { ?>
                        <td><?= $data['level']?></td>
                        <?php } ?>
                        <td><?= $data['entry']?></td>
                        <?php if ($_SESSION['level']!="siswa") { ?>
                        <td>
                            <a href="halaman.php?halaman=editsiswa&id=<?= $data['id']; ?>" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
                            <a href="hapus_siswa.php?id=<?=$data['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>