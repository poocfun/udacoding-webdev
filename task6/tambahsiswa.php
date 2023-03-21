<div class="card">
    <div class="card-header">
    <h3>Tambah Siswa</h3>
    </div>
    <div class="card-body">
        <form action="createsiswa.php" method="POST">
            <div class="row">
                <div class="col-md-4">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                </div>
                <div class="col-md-4">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="col-md-4">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="">NIS</label>
                    <input type="text" class="form-control" name="nis" placeholder="NIS" required>
                </div>
                <div class="col-md-4">
                    <label for="">Level</label>
                        <select class="form-control" name="level" id="">
                            <option value="">Pilih Level</option>
                            <option value="admin">Admin</option>
                            <option value="siswa">Siswa</option>
                        </select>
                        <input type="hidden" value="<?= $_SESSION['nama']?>" class="form-control" name="entry" placeholder="Nama" required>
                </div>
                <div class="col-md-4">
                    <label for="">No Telphone</label>
                    <input type="number" class="form-control" name="tlp" placeholder="No Telphone" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <label for="">Alamat</label>
                    <textarea class="form-control" name="alamat" id="" cols="30" rows="4"></textarea>
                </div>
            </div> 
            
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>