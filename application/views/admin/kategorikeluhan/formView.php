<?php
$id_kategori_keluhan="";
$kd_kategori_keluhan="";
$nm_kategori_keluhan="";
if($parameter=='ubah' && $id!=''){
    $this->db->where('id_kategori_keluhan',$id);
    $row=$this->Model->get()->row_array();
    extract($row);
}
?>
<?=content_open($title)?>
    <form method="post" action="<?=site_url($url.'/simpan')?>" enctype="multipart/form-data">
    	<?=input_hidden('id_kategori_keluhan',$id_kategori_keluhan)?>
        <?=input_hidden('parameter',$parameter)?>
    <div class="row">
        <div class="col-md-6">
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <label>Kode Kategori</label>
                    <?=input_text('kd_kategori_keluhan',$kd_kategori_keluhan)?>
                </div>
                <div class="col-md-7">
                    <label>Nama Kategori</label>
                    <?=input_text('nm_kategori_keluhan',$nm_kategori_keluhan)?>
                </div>
            </div>
        </div>
    	<div class="form-group">
            <label>Marker</label>
            <div class="row">
                <div class="col-md-10">
                    <?=input_file('marker_keluhan','')?>
                </div>
            </div>
        </div>
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