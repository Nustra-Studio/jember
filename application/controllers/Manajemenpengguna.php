<?php
class Manajemenpengguna extends CI_Controller {
	function __construct() {
	parent::__construct();
}
	public function index()
	{
		$this->load->model('manajemenpengguna_model');
		$data['user']= $this->manajemenpengguna_model->selectmanajemenpengguna();
		$this->load->view('admin1/manajemenpengguna',$data);
	}
	
	
	
		public function modalhapusmanajemenpengguna(){

		$id = $_POST['rowid'];
		?>
		<div class="text-center">
			<p>Apakah anda yakin menghapus data ini?</p>
			<?php echo form_open('manajemenpengguna/hapusmanajemenpengguna');?> 
				<input type="hidden" name="id" value="<?php echo $id; ?>"/>
				<button type="submit" class="btn btn-success">Ya</button>
				<button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button>
			</form>
		</div>
		<?php
	}

	public function modalrubahmanajemenpengguna(){
	
		$id = $_POST['rowid'];
		?>
		<div class="text-left">
			<?php echo form_open('manajemenpengguna/rubahmanajemenpengguna');?> 			
				<div class="form-group">
					<label>Silahkan Ganti Password Pengguna</label>
					 <input type="hidden" name="id" value="<?php echo $id;?>"/>
				<div>
					<label>Password Lama</label>
                     <input type="password" class="form-control" placeholder="Masukan Password Lama" name="password">
                </div>
                <div>
					<label>Password Baru</label>
                     <input type="password" class="form-control" placeholder="Masukan Password Lama" name="password_baru">
                </div>
                <div>
					<label>Ulangi Password Baru</label>
                     <input type="password" class="form-control" placeholder="Masukan Password Lama" name="password_baru">
                </div>
                </div>
				<button type="submit" class="btn btn-success">Ganti</button>
				<button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button>
			</form>
		</div>
		<?php
	}

	public function hapusmanajemenpengguna(){
		$id = $this->input->post('id');
		$this->load->model('manajemenpengguna_model');
		$this->manajemenpengguna_model->deletemanajemenpengguna($id);
		redirect('/manajemenpengguna', 'refresh');

	}

	public function rubahmanajemenpengguna(){
		$data['id'] = $this->input->post('id');
		$data['password'] = $this->input->post('password');
		$data['password_baru'] = $this->input->post('password_baru');
		$data['password_baru'] = $this->input->post('password_baru');

		$this->load->model('manajemenpengguna_model');
		$this->manajemenpengguna_model->editmanajemenpengguna($data);
		redirect('/manajemenpengguna', 'refresh');

	}
}