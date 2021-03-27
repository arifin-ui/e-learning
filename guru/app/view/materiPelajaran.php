<div>
    <form action="?m=prosesBuatMateri&username=<?= $nama ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="nip" value="<?= $nip; ?>">
        <div class="form-group col-md-6">
            <label for="validationCustom04" class="form-label">Mata Pelajaran</label>
            <select class="form-select form-control" name="matapelajaran" id="validationCustom04" required>
                <option selected disabled value="">Pilih....</option>
                <?php
                $sql_pelajaran = "SELECT * FROM pelajaran WHERE nip=:nip";
                $stmt_pelajaran = $con->prepare($sql_pelajaran);
                $params_pelajaran = array(
                    ":nip" => $nip
                );
                $stmt_pelajaran->execute($params_pelajaran);
                while ($row_pelajaran = $stmt_pelajaran->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?= $row_pelajaran['id'] ?>"><?= $row_pelajaran['namapelajaran'] ?></option>
                <?php  }
                ?>
            </select>
        </div>
        <div class="col-md-6">
            <label for="validationCustom03" class="form-label">Judul Materi</label>
            <input type="text" name="judul" class="form-control" id="validationCustom03" required>
            <div class="invalid-feedback">
                Materi pelajaran
            </div>
        </div>

        <div class="col-md-8">
            <label for="validationCustom03" class="form-label">Ringkasan</label>
            <textarea class="form-control" name="ringkasan" id="validationCustom03" cols="30" rows="3" required></textarea>
            <div class="invalid-feedback">
                Ringkasan materi
            </div>
        </div>
        <div class="col-md-8">
            <label for="validationCustom03" class="form-label">FIle Materi</label>
            <input type="file" name="file" class="form-control" id="validationCustom03" required>
            <div>
                <p><small>Format file : <b>pdf, docx, pptx, zip. Maksimal file 8 Mb</b></small></p>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="validationCustom04" class="form-label">Kelas</label>
            <select class="form-select form-control" name="kelas" id="validationCustom04" required>
                <option selected disabled value="">Pilih....</option>
                <?php
                $sql_kelas = "SELECT DISTINCT kelas FROM kelas_siswa";
                $stmt_kelas = $con->prepare($sql_kelas);
                $stmt_kelas->execute();
                while ($row_kelas = $stmt_kelas->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?= $row_kelas['kelas'] ?>"><?= $row_kelas['kelas'] ?></option>
                <?php  }
                ?>
            </select>
        </div>
        <br>
        <div>
            <a href="?m=manageGuru" class="btn btn-danger"><?php include ICON . 'cancel.php'; ?> Batal</a>
            <button type="submit" class="btn btn-success"><?php include ICON . 'save.php'; ?> Simpan</button>
        </div>
    </form>
</div>