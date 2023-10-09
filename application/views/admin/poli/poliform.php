<?php
$id_poli="";
$nama_poli="";
if($parameter=='ubah' && $id!=''){
    $this->db->where('id_poli',$id);
    $row=$this->Model->get()->row_array();
    extract($row);
}

// value ketika validasi
if($this->session->flashdata('error_value')){
    extract($this->session->flashdata('error_value'));
}

?>
<?=content_open('Form Poli')?>
    <?php
        // menampilkan error validasi
        if($this->session->flashdata('error_validation')){
            foreach ($this->session->flashdata('error_validation') as $key => $value) {
                echo '<div class="alert alert-danger">'.$value.'</div>';
            }
        }
    ?>
    <form method="post" action="<?=site_url($url.'/simpan')?>" enctype="multipart/form-data">
        <?=input_hidden('id_poli',$id_poli)?>
        <?=input_hidden('parameter',$parameter)?>
    	<div class="form-group">
    		<label>Nama Poli</label>
    		<div class="row">
	    		<div class="col-md-4">
	    			<?=input_text('nama_poli',$nama_poli)?>
		    	</div>
	    	</div>
    	</div>
    	<div class="form-group">
    		<button type="submit" name="simpan" value="true" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
			<a href="<?=site_url($url)?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Kembali</a>
    	</div>
    </form>
<?=content_close()?>