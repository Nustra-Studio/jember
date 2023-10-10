<?=content_open('Halaman Grafik Bulanan')?>
                    <div class="row" style="margin-right: 2px; margin-left: 2px">
                    <?php 
                    $data_grafik = $this->db->query("SELECT COUNT(id_hotspot) AS 
                    jumlah, id_kategori_hotspot AS 
                    pinjam_bulan FROM t_hotspot GROUP BY 
                    id_kategori_hotspot ASC")->result();
                    foreach ($data_grafik as $pinjam => $p_buku) {
                        $this->db->select('nm_kategori_hotspot');
                        $this->db->where('id_kategori_hotspot',$p_buku->pinjam_bulan);
                        $query = $this->db->get('m_kategori_hotspot');
                        $data_pinjam[]=['label'=>$query->row()->nm_kategori_hotspot, 'y'=>$p_buku->jumlah];
                        
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
                                    text: "Jumlah Sebaran Penyakit"

                                },
                                axisY:[{
                               title: "Jumlah",       
                              }],

                              axisX:[{
                               title: "Penyakit",       
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