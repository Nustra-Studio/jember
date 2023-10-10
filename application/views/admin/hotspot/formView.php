<?php
$id_hotspot="";
$id_kecamatan="";
$norm="";
$nik="";
$nama="";
$tgl="";
$kerja="";
$kk="";
$lokasi="";
$keterangan="";
$lat="";
$lng="";
$polygon="";
$id_kategori_hotspot="";
$id_kategori_keluhan="";
$tanggal=date('d-m-Y');
if($parameter=='ubah' && $id!=''){
    $this->db->where('id_hotspot',$id);
    $row=$this->Model->get()->row_array();
    extract($row);
}
elseif($parameter=='add_up' && $id!=''){
    $this->db->where('id_hotspot',$id);
    $row=$this->Model->get()->row_array();
    extract($row);
    $tanggal=date('d-m-Y');
    $id_kategori_hotspot="";
    $id_kategori_keluhan="";
    
}
?>
<?=content_open('Form Register Pasien')?>
    <form method="post" action="<?=site_url($url.'/simpan')?>" enctype="multipart/form-data">
        <?=input_hidden('id_hotspot',$id_hotspot)?>
        <?=input_hidden('parameter',$parameter)?>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <label>No Rekam Medis</label>
            <div class="row">
                <div class="col-md-8">
                    <?=input_text('norm',$norm)?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>NIK</label>
            <div class="row">
                <div class="col-md-8">
                    <?=input_text('nik',$nik)?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Tanggal Kunjungan</label>
            <div class="row">
                <div class="col-md-8">
                    <?=input_date('tanggal',$tanggal)?>
                </div>
            </div>
        </div>
        <div class="form-group" id="nama" name="nama">
            <label>Nama</label>
            <div class="row">
                <div class="col-md-8">
                    <?=input_text('nama',$nama)?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <div class="row">
                <div class="col-md-8">
                    <?=input_date('tgl',$tgl)?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Pekerjaan</label>
            <div class="row">
                <div class="col-md-8">
                    <?=input_text('kerja',$kerja)?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Nama Kepala Keluarga</label>
            <div class="row">
                <div class="col-md-8">
                    <?=input_text('kk',$kk)?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Lokasi</label>
            <div class="row">
                <div class="col-md-8">
                    <?=input_text('lokasi',$lokasi)?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Nama Desa</label>
            <div class="row">
                <div class="col-md-10">
                    <?php
                        $op['']='Pilih Desa';
                        $get=$this->KecamatanModel->get();
                        foreach ($get->result() as $row) {
                            $op[$row->id_kecamatan]=$row->nm_kecamatan;
                        }
                    ?>
                    <?=select('id_kecamatan',$op,$id_kecamatan)?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Keterangan Alamat</label>
            <div class="row">
                <div class="col-md-12">
                    <?=textarea('keterangan',$keterangan)?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Titik Koordinat</label> 
            <div class="row">
                <div class="col-md-6">
                    <?=input_text('lat',$lat)?>
                </div>
                <div class="col-md-6">
                    <?=input_text('lng',$lng)?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <div class="row">
                <div class="col-md-10">
                    <?php
                        $op=null;
                        $op['']='Pilih Kategori';
                        $get=$this->KategorihotspotModel->get();
                        foreach ($get->result() as $row) {
                            $op[$row->id_kategori_hotspot]=$row->nm_kategori_hotspot;
                        }
                    ?>
                    <?=select('id_kategori_hotspot',$op,$id_kategori_hotspot)?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Keluhan</label>
            <div class="row">
                <div class="col-md-10">
                    <?php
                        $op=null;
                        $op['']='Pilih Keluhan';
                        $get=$this->KategorikeluhanModel->get();
                        foreach ($get->result() as $row) {
                            $op[$row->id_kategori_keluhan]=$row->nm_kategori_keluhan;
                        }
                    ?>
                    <?=select('id_kategori_keluhan',$op,$id_kategori_keluhan)?>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <h3>Pilih Titik</h3>
        <div id="map" style="height: 400px"></div>
        <?=textarea('polygon',$polygon,'','style="display:none"')?>
    </div>
    <div class="col-md-12">
        <hr>
        <div class="form-group">
            <button type="submit" name="simpan" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
            <a href="<?=site_url($url)?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Kembali</a>
        </div>
    </div>
    </div>

    </form>
<?=content_close()?>