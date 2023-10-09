<?php
$id="";
$nip="";
$nama="";
$username="";
$email="";
$password="";
$level="";
if($parameter=='ubah' && $id!=''){
    $this->db->where('id',$id);
    $row=$this->Model->get()->row_array();
    extract($row);
}

// value ketika validasi
if($this->session->flashdata('error_value')){
    extract($this->session->flashdata('error_value'));
}

?>
<?=content_open('Form Pengguna')?>
    <?php
        // menampilkan error validasi
        if($this->session->flashdata('error_validation')){
            foreach ($this->session->flashdata('error_validation') as $key => $value) {
                echo '<div class="alert alert-danger">'.$value.'</div>';
            }
        }
    ?>
    <form method="post" action="<?=site_url($url.'/simpan')?>" enctype="multipart/form-data">
        <?=input_hidden('id',$id)?>
        <?=input_hidden('parameter',$parameter)?>
    	<div class="form-group">
    		<label>NIP User</label>
    		<div class="row">
	    		<div class="col-md-4">
	    			<?=input_text('nip',$nip)?>
		    	</div>
	    	</div>
    	</div>
    	<div class="form-group">
    		<label>Nama User</label>
    		<div class="row">
	    		<div class="col-md-6">
	    			<?=input_text('nama',$nama)?>
	    		</div>
    		</div>
    	</div>
        <div class="form-group">
            <label>Username</label>
            <div class="row">
                <div class="col-md-6">
                    <?=input_text('username',$username)?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Email</label>
            <div class="row">
                <div class="col-md-6">
                    <?=input_text('email',$email)?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Password</label>
            <div class="row">
                <div class="col-md-6">
                    <?=input_password('password',$password)?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Level</label>
            <div class="row">
                <div class="col-md-6">
                    <?=input_text('level',$level)?>
                    <b>*Admin ATAU User</b>
                </div>
            </div>
        </div>
    	<div class="form-group">
    		<button type="submit" name="simpan" value="true" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
			<a href="<?=site_url($url)?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Kembali</a>
    	</div>
    </form>
<?=content_close()?>