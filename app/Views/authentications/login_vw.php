<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIRUANG - Sistem Informasi Pemantauan & Peminjaman Ruangan PSTI</title>
    <link rel="stylesheet" href="<?= base_url('css/Login.css') ?>">
</head>
<body>
    <div class="main-layout">
        <div class="left-content">
            <div class="container">
                <h1 class="title">SIRUANG: SISTEM INFORMASI PEMANTAUAN & PEMINJAMAN RUANGAN PSTI</h1>
                <div class="login-card">
                    <h2 class="login-title">Login</h2>
                    <?php if(session()->getFlashdata('error')): ?>
                        <p style="color: red;"><?= session()->getFlashdata('error'); ?></p>
                    <?php endif; ?>
                    <form action="<?= route_to('login_auth') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required>
                        </div>
                        <!-- <p class="btn-fg-pwd"><a href="<?= route_to('forgot_password') ?>" >Lupa Password</a></p> -->
                        <button type="submit" class="btn-login">Login</button>
                    </form>
                    <p class="register-text">Belum punya akun? <a href="<?= route_to('register') ?>" class="register-link">Daftar</a></p>
                    <p class="btn-home"><a href="<?= base_url('/') ?>" >Kembali ke Halaman Utama</a></p>
                </div>
            </div>
        </div>
        <div class="right-background"></div>
    </div>
    <script>
        <?php if(session()->getFlashdata('success')): ?>
            alert('<?= session()->getFlashdata('success'); ?>');
        <?php endif; ?>
    </script>
</body>
</html>