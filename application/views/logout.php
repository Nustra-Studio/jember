<?php 
// mengaktifkan session
session_start();
 
// menghapus semua session
session_destroy();
 
// mengalihkan halaman login
header('Location:login_view.php?pesan=anda berhasil logout.');
?>