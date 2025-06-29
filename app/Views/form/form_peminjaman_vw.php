<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>SIRUANG - Sistem Informasi Pemantauan & Peminjaman Ruangan PSTI</title>
    <link rel="stylesheet" href="<?= base_url('css/FormPeminjaman.css') ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>
<body>
    <div class="container">
        <h1><?= isset($peminjaman['id_peminjaman']) ? 'EDIT PEMINJAMAN RUANGAN' : 'FORM PEMINJAMAN RUANGAN' ?></h1>
        <div class="form-container">
            <?php if(session()->getFlashdata('error')): ?>
                <p class="error"><?= session()->getFlashdata('error'); ?></p>
            <?php endif; ?>
            <form action="<?= base_url(route_to(session()->get('role') == 'admin' ? 'admin_save_peminjaman' : 'user_save_peminjaman')) ?>" method="post">
                <?= csrf_field() ?>

                <?php if(isset($peminjaman['id_peminjaman'])): ?>
                    <input type="hidden"  name="id_peminjaman" value="<?= $peminjaman['id_peminjaman'] ?>"> 
                <?php endif; ?>

                <div class="form-group">
                    <div class="icon-container">
                        <i class="far fa-user"></i> 
                    </div>
                    <div class="input-container">
                        <label for="nama_dosen">Nama Dosen</label>
                        <select id="nama_dosen" name="id_dosen" required>
                            <option value="">-- Pilih Dosen --</option>
                            <?php foreach($dosen as $d):?>
                                <option value="<?= $d['id_dosen']; ?>" <?= old('id_dosen', $peminjaman['id_dosen'] ?? '') == $d['id_dosen'] ? 'selected' : ''; ?> > <?= $d['nama_dosen'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="icon-container">
                        <i class="fas fa-book"></i> 
                    </div>
                    <div class="input-container">
                        <label for="nama_matkul">Nama Mata Kuliah</label>
                        <select id="nama_matkul" name="id_matkul" required>
                            <option value="">-- Pilih Matkul --</option>
                            <?php foreach($matkul as $m):?>
                                <option value="<?= $m['id_matkul']; ?>" <?= old('id_matkul', $peminjaman['id_matkul'] ?? '') == $m['id_matkul'] ? 'selected' : ''; ?> > <?= $m['nama_matkul'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="icon-container">
                        <i class="fas fa-calendar-alt"></i> 
                    </div>
                    <div class="input-container">
                        <label for="tanggal-mulai">Tanggal & Jam Mulai</label>
                        <input type="datetime-local" name="waktu_mulai" id="tanggal-mulai" value="<?= old('waktu_mulai', isset($peminjaman['waktu_mulai']) ? $peminjaman['waktu_mulai'] : '')?>"  required/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="icon-container">
                        <i class="fas fa-calendar-check"></i> 
                    </div>
                    <div class="input-container">
                        <label for="tanggal-selesai">Tanggal & Jam Selesai</label>
                        <input type="datetime-local" name="waktu_selesai" id="tanggal-selesai" value="<?= old('waktu_selesai', isset($peminjaman['waktu_selesai']) ? $peminjaman['waktu_selesai'] : '' ) ?>" required/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="icon-container">
                        <i class="fas fa-door-open"></i> 
                    </div>
                    <div class="input-container">
                        <label for="nama_ruang">Nama Ruangan</label>
                        <select id="nama_ruang" name="id_ruangan" required>
                            <option value="">-- Pilih Ruang --</option>
                            <?php foreach($ruangan as $r):?>
                                <option value="<?= $r['id_ruangan']; ?>" <?= old('id_ruangan', $peminjaman['id_ruangan'] ?? '') == $r['id_ruangan'] ? 'selected' : ''; ?> > <?= $r['nama_ruang'] ?> - <?= $r['kapasitas'] ?> Orang </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="icon-container">
                        <i class="fas fa-tools"></i> 
                    </div>
                    <div class="input-container">
                        <label for="sarana">Sarana</label>
                        <textarea id="sarana" name="sarana" rows="4"><?= old('sarana', isset($peminjaman['sarana']) ? $peminjaman['sarana'] : '') ?></textarea>
                    </div>
                </div>

                <?php if(session()->get('role') == 'admin'): ?>           
                    <div class="form-group">
                        <div class="icon-container">
                            <i class="fas fa-info-circle"></i> </div>
                        <div class="input-container">
                            <label for="status-peminjaman">Status Peminjaman</label>
                            <select name="status_peminjaman" id="status-peminjaman" required>
                                <option value="Menunggu🔄" <?= (isset($peminjaman['status_peminjaman']) && ($peminjaman['status_peminjaman'] == 'Menunggu🔄')) ? 'selected' : ''; ?>>Menunggu🔄</option>
                                <option value="Disetujui✅" <?= (isset($peminjaman['status_peminjaman']) && ($peminjaman['status_peminjaman'] == 'Disetujui✅')) ? 'selected' : ''; ?>>Disetujui✅</option>
                                <option value="Ditolak❌" <?= (isset($peminjaman['status_peminjaman']) && ($peminjaman['status_peminjaman'] == 'Ditolak❌')) ? 'selected' : ''; ?>>Ditolak❌</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="icon-container">
                            <i class="fas fa-comment-alt"></i> </div>
                        <div class="input-container">
                            <label for="komentar">Komentar</label>
                            <textarea id="komentar" name="komentar" rows="4"> <?= (isset($peminjaman['komentar']) ? $peminjaman['komentar'] : '') ?></textarea>
                        </div>
                    </div>
                <?php endif; ?>
                    
                <button type="submit" name="submit" class="submit-btn"><?= isset($peminjaman['id_peminjaman']) ? 'Simpan Perubahan' : 'Ajukan Peminjaman' ?></button>
                <p class="disclaimer"><?= isset($peminjaman['id_peminjaman']) && session()->get('role') == 'admin' ? '*Menekan Simpan Perubahan juga akan mengirimkan konfirmasi ke pengguna melalui Whatsapp' : '' ?></p>
            </form>
            <p class="btn-home"><a href="javascript:history.back()" >Kembali ke Dashboard</a></p>
        </div>
    </div>
</body>
</html>
