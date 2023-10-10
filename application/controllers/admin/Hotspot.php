<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotspot extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('HotspotModel','Model');
		$this->load->model('KecamatanModel');
		$this->load->model('KategorihotspotModel');
		$this->load->model('KategorikeluhanModel');
	}

	public function index()
	{
		$datacontent['url']='admin/hotspot';
		$datacontent['title']='Halaman Register Pasien';
		$datacontent['datatable']=$this->Model->get();
		$data['content']=$this->load->view('admin/hotspot/tableView',$datacontent,TRUE);
		$data['js']=$this->load->view('admin/hotspot/js/tableJs',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('admin/layouts/html',$data);
	}
	public function form($parameter='',$id='')
	{
		$datacontent['url']='admin/hotspot';
		$datacontent['parameter']=$parameter;
		$datacontent['id']=$id;
		$datacontent['title']='Form Register Pasien';
		$data['content']=$this->load->view('admin/hotspot/formView',$datacontent,TRUE);
		$data['js']=$this->load->view('admin/hotspot/js/formJs',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('admin/layouts/html',$data);
	}
	public function simpan()
	{
		if($this->input->post()){
			$data=[
				'id_kecamatan'=>$this->input->post('id_kecamatan'),
				'id_kategori_hotspot'=>$this->input->post('id_kategori_hotspot'),
				'id_kategori_keluhan'=>$this->input->post('id_kategori_keluhan'),
				'norm'=>$this->input->post('norm'),
				'nik'=>$this->input->post('nik'),
				'tanggal'=>$this->input->post('tanggal'),
				'nama'=>$this->input->post('nama'),
				'tgl'=>$this->input->post('tgl'),
				'kerja'=>$this->input->post('kerja'),
				'kk'=>$this->input->post('kk'),
				'keterangan'=>$this->input->post('keterangan'),
				'lokasi'=>$this->input->post('lokasi'),
				'lat'=>$this->input->post('lat'),
				'lng'=>$this->input->post('lng'),
				'tanggal'=>$this->input->post('tanggal'),
				'polygon'=>$this->input->post('polygon'),
			];
		
			if($_POST['parameter']=="tambah"){
				$this->Model->insert($data);
			}
			else{
				$this->Model->update($data,['id_hotspot'=>$this->input->post('id_hotspot')]);
			}

		}
		redirect('admin/hotspot');
	}

	public function export($jenis='pdf'){
		if($jenis=='pdf'){
			$datacontent['title']='Hotspot Report';
			$datacontent['datatable']=$this->Model->get();
			$html=$this->load->view('admin/hotspot/pdfView',$datacontent,TRUE);
			generatePdf($html,'Data Hotspot','A4','landscape');
		}
	}

	public function hapus($id=''){
		// hapus file di dalam folder
		$this->db->where('id_hotspot',$id);
		$get=$this->Model->get()->row();
		$geojson_hotspot=$get->geojson_hotspot;
		unlink('assets/unggah/geojson/'.$geojson_hotspot);
		// end hapus file di dalam folder
		$this->Model->delete(["id_hotspot"=>$id]);
		redirect('admin/hotspot');
	}


	public function datatable(){
		header('Content-Type: application/json');
		$url = 'admin/hotspot';
		$kolom =['id_hotspot','norm','nik','tanggal','nama','tgl','kerja','kk','lokasi','nm_kecamatan','keterangan','nm_kategori_hotspot','nm_kategori_hotspot'];

		if ( $this->input->get('sSearch')){
			$this->db->group_start();
			for ( $i=0 ; $i<count($kolom) ; $i++ )
			{
		    	$this->db->or_like($kolom[$i],$this->input->get('sSearch',TRUE));
			}
			$this->db->group_end();
		}
		//order
		if ( $this->input->get('iSortCol_0') ){
			for ( $i=0 ; $i<intval( $this->input->get('iSortingCols',TRUE) ) ; $i++ )
			{
			    if ( $this->input->get( 'bSortable_'.intval($_GET['iSortCol_'.$i]),TRUE) == "true" )
			    {
			        $this->db->order_by($kolom[intval( $this->input->get('iSortCol_'.$i,TRUE))],$this->input->get('sSortDir_'.$i,TRUE) );
			    }
			}
		}

      	if($this->input->get('iDisplayLength',TRUE)!="-1"){
	        $this->db->limit($this->input->get('iDisplayLength',TRUE),$this->input->get('iDisplayStart'));
		}

		$dataTable = $this->Model->get();
		$iTotalDisplayRecords=$this->Model->get()->num_rows();
		$iTotalRecords=$dataTable->num_rows();
		$output = [
		  "sEcho" => intval($this->input->get('sEcho')),
		  "iTotalRecords" => $iTotalRecords,
		  "iTotalDisplayRecords" => $iTotalDisplayRecords,
		  "aaData" => array()
		];
		$no=1;
		foreach ($dataTable->result() as $row) {
			$r = null;
			$r[] = $no++;
			$r[] = $row->norm;
			$r[] = $row->nik;
			$r[] = $row->tanggal;
			$r[] = $row->nama;
			$r[] = $row->tgl;
			$r[] = $row->kerja;
			$r[] = $row->kk;
			$r[] = $row->lokasi;
			$r[] = $row->nm_kecamatan;
			$r[] = $row->keterangan;
			$r[] = $row->nm_kategori_hotspot;
			$r[] = $row->nm_kategori_keluhan;
			$r[] = '<div class="btn-group">
								<a href="'.site_url($url.'/form/ubah/'.$row->id_hotspot).'" class="btn btn-info"><i class="fa fa-edit"></i> Ubah</a>
								<a href="'.site_url($url.'/form/add_up/'.$row->id_hotspot).'" class="btn btn-success"><i class="fa fa-plus"></i> Add </a>
								<a href="'.site_url($url.'/hapus/'.$row->id_hotspot).'" class="btn btn-danger" onclick="return confirm(\'Hapus data?\')"><i class="fa fa-trash"></i> Hapus</a>
							</div>';
			$output['aaData'][] = $r;				
		}
		echo json_encode($output,JSON_PRETTY_PRINT);

	}

}