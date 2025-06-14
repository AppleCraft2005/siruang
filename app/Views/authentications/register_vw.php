<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>SIRUANG - Sistem Informasi Pemantauan & Peminjaman Ruangan PSTI</title>
    <link rel="stylesheet" href="<?= base_url('css/Register.css') ?>" />
</head>
<body>
    <div class="main-layout">
        <div class="left-content">
            <div class="container">
                <h1 class="title">SIRUANG: SISTEM INFORMASI PEMANTAUAN & PEMINJAMAN RUANGAN PSTI</h1>
                <div class="register-card">
                    <h2 class="register-title">Register</h2>
                    <?php if(session()->getFlashdata('validation')): ?>
                        <?= session()->getFlashdata('validation')->listErrors(); ?>
                    <?php endif; ?> 
                    <form action="<?= base_url('/register/auth') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan username" required />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email" required />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required />
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Masukkan Password yang Sama" required />
                        </div>
                        <div class="form-group">
                            <label for="nomor_telepon">Nomor Telepon</label>
                            <input type="password" id="nomor_telepon" name="nomor_telepon" class="form-control" placeholder="Masukkan Nomor Telepon" required />
                        </div>
                        <button type="submit" class="btn-login" name="submit">Daftar</button>
                    </form>
                    <p class="register-text">Sudah punya akun? <a href="<?= base_url('login') ?>" class="register-link">Login</a></p>
                </div>
            </div>
        </div>
        <div class="right-background"></div>
    </div>
</body>
</html>