<div class="card">
    <div class="card-header">
    <h3>Edit Siswa</h3>
    </div>
    <div class="card-body">
    <?php
    $sql = mysqli_query($koneksi, "select * from users where id = '$_GET[id]'");
    if ($data = mysqli_fetch_array($sql))
    {
     ?>
        <form enctype="multipart/form-data" action="updatesiswa.php" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?= $data['nama']?>" placeholder="Nama" required>
                </div>
                <div class="col-md-6">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" value="<?= $data['email']?>" placeholder="Email" required>
                </div>
                <input type="hidden" name="password" value="<?= $data['password'] ?>">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="">NIS</label>
                    <input type="text" class="form-control" name="nis" value="<?= $data['nis']?>" placeholder="NIS" required>
                </div>
                <div class="col-md-4">
                    <label for="">Level</label>
                        <select class="form-control" name="level" id="">
                            <option value="admin">Admin</option>
                            <option value="siswa">Siswa</option>
                        </select>
                        <input type="hidden" value="<?= $_SESSION['nama']?>" class="form-control" name="entry" placeholder="Nama" required>
                </div>
                <div class="col-md-4">
                    <label for="">No Telphone</label>
                    <input type="number" class="form-control" name="tlp" value="<?= $data['tlp']?>" placeholder="No Telphone" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <label for="">Alamat</label>
                    <textarea class="form-control" name="alamat" id="" cols="30" rows="4"> <?= $data['alamat']?> </textarea>
                </div>
            </div> 
            
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <?php } ?>
    </div>
</div>