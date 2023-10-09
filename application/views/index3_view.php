
  <section>
  </section>

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
                            <div class="card shadow">
                                <div class="card-body">

        <div class="section-header">
          <h2>Statistik Data Diare</h2>
          <div class="card shadow mb-4">
                                <div class="card-body">

                                    <table class="table table-bordered" id="dataStat" width="100%" cellspacing="0">

                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Kecamatan</th>
                                            <th>Jumlah Diare</th>
                                            <th>Tingkat Keparahan</th>
                                            <th>Tanggal</th>
                                        </tr>

                                    <?php
                                    include "connect.php";
                                    $no=1;
                                    $res=mysqli_query($connect,"select k.* , h.* , t.* from m_kecamatan k,m_kategori_hotspot h,t_hotspot t WHERE k.id_kecamatan=t.id_kecamatan AND h.id_kategori_hotspot=t.id_kategori_hotspot");
                                      while($row=mysqli_fetch_array($res))
                                    {
                                      ?>
                                        <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['nm_kecamatan']; ?></td>
                                        <td><?php echo $row['jml_diare']; ?></td>
                                        <td><?php echo $row['nm_kategori_hotspot']; ?></td>
                                        <td><?php echo $row['tanggal']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    
                                </table>

                              </div>
                            </div>
                          </div>
                        </div>
   
    </section><!-- End About Section -->

    

  </main><!-- End #main -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

