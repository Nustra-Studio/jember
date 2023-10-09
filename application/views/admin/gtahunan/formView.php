<?=content_open('Halaman Grafik Tahunan')?>
                    <div class="row" style="margin-right: 2px; margin-left: 2px">
                    <?php 
                   $data_peminjaman_buku = $this->db->query("SELECT COUNT(id_hotspot) AS jumlah, DATE_FORMAT(tanggal,'%Y') AS pinjam_bulan FROM t_hotspot GROUP BY DATE_FORMAT(tanggal,'%Y')")->result();
                    foreach ($data_peminjaman_buku as $pinjam => $p_buku) {
                       $data_pinjam[]=['label'=>$p_buku->pinjam_bulan, 'y'=>$p_buku->jumlah];
                    }

                    ?>

                   
                    <body>
                        <div id="data_peminjaman" style="height: 370px; width: 100%;"></div>
                        <script src="<?php echo base_url('assets/canvasjs/js/canvasjs.min.js') ?>"></script>

                    </body>
                </div>
                </div>

          
                <script type="text/javascript">
                        window.onload = function (){
                    
                            var chart1 = new CanvasJS.Chart("data_peminjaman",{
                                theme: "light1",
                                animationEnabled: true,
                                title:{
                                    text: "Jumlah Pasien Berkunjung"

                                },
                                axisY:[{
                               title: "Jumlah Kunjungan",       
                              }],

                              axisX:[{
                               title: "Tahun",       
                              }],
                                data: [
                                {
                                    type: "column",
                                    dataPoints: 
                                   
                                   <?=json_encode($data_pinjam,JSON_NUMERIC_CHECK);?>
                                    
                                }
                                ]
                            });
                            chart1.render();
                        }
                    </script>
<?=content_close()?>