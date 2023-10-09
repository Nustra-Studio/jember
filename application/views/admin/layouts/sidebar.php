<?
 if (!isset($_SESSION['login'])) {
    header('location:login.php');
}
?>

 <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?=site_url('admin/beranda')?>" class="site_title"><i class="fa fa-map"></i> <span>GIS Arjasa</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?=templates('production/images/favicon2.png')?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang</span>
                <h2><?php echo $this->session->userdata('user');?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?=site_url('admin/beranda')?>"><i class="fa fa-home"></i> Beranda</a></li>
                  <?php if ($_SESSION['level'] == 'User') { ?>
                  <li><a><i class="fa fa-tags"></i> Register Pasien <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=site_url('admin/hotspot')?>">Input Register</a></li>
                    </ul>
                  </li>
                  <?php } ?>
                   <li><a><i class="fa fa-map"></i> Pemetaan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=site_url('admin/leafletpoint')?>">Kunjungan Pasien</a></li>
                      <!-- <li><a href="<?=site_url('admin/leafletstandar')?>">Penyakit</a></li>-->
                    </ul>
                  </li>
                  <li><a><i class="fa fa-map"></i> Tabel Hasil <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=site_url('admin/tabelreg')?>">Register Pendaftaran</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-map"></i> Grafik Sebaran <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=site_url('admin/gbulanan')?>">Bulanan</a></li>
                      <li><a href="<?=site_url('admin/gtahunan')?>">Tahunan</a></li>
                    </ul>
                  </li>
                  <?php if ($_SESSION['level'] == 'Admin') { ?>
                  <li><a><i class="fa fa-folder"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=site_url('admin/kecamatan')?>">Data Desa</a></li>
                      <li><a href="<?=site_url('admin/kategorihotspot')?>">Data Kategori</a></li>
                      <li><a href="<?=site_url('admin/kategorikeluhan')?>">Data Keluhan</a></li>
                      <!-- <li><a href="<?=site_url('admin/poli')?>">Data Poli</a></li> -->
                      <li><a href="<?=site_url('admin/manajemenpengguna')?>">Manajemen Pengguna</a></li>
                    </ul>
                  </li>
                    <?php } ?>
                  <li><a href="logout.php" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out"></i> Keluar</a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

      <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin untuk Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Keluar" untuk keluar dari halaman ini</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="<?= base_url();?>">Keluar</a>
                </div>
            </div>
        </div>
    </div>
