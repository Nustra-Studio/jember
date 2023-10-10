<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	public function __construct(){
		parent::__construct();
	    $this->load->model('KecamatanModel');
	    $this->load->model('HotspotModel');
	    $this->load->model('KategorihotspotModel');
	    $this->load->model('KategorikeluhanModel');
	}

	public function data($jenis='kecamatan',$type='point',$id='')
	{
		$search = $this->input->get('date');
		if(!empty($search) ){
			$start_month =  strtotime($search . "-01");
			$parsed_date = strtotime($search . "-01");
			$year = date('Y', $parsed_date);
        	$month = date('m', $parsed_date);
			$end_of_month = date('Y-m-t', strtotime("+1 month", strtotime($search)));
			header('Content-Type: application/json');
			$response=[$start_month,$end_of_month];
			echo "var dataKecamatan=".json_encode($response,JSON_PRETTY_PRINT);
			// if($jenis=='kecamatan'){
			// 	$getKecamatan=$this->KecamatanModel->get();
			// 	foreach ($getKecamatan->result() as $row) {
			// 		$data=null;
			// 		$data['id_kecamatan']=$row->id_kecamatan;
			// 		$data['kd_kecamatan']=$row->kd_kecamatan;
			// 		$data['geojson_kecamatan']=$row->geojson_kecamatan;
			// 		$data['warna_kecamatan']=$row->warna_kecamatan;
			// 		$data['nm_kecamatan']=$row->nm_kecamatan;
			// 		$response[]=$data;
			// 	}
			// 	echo "var dataKecamatan=".json_encode($response,JSON_PRETTY_PRINT);
			// }
			// if($jenis=='kategorihotspot'){
			// 	$getKategorihotspot=$this->KategorihotspotModel->get();
			// 	foreach ($getKategorihotspot->result() as $row) {
			// 		$data=null;
			// 		$data['id_kategori_hotspot']=$row->id_kategori_hotspot;
			// 		$data['nm_kategori_hotspot']=$row->nm_kategori_hotspot;
			// 		$data['icon']=($row->marker=='')?assets('icons/marker.png'):assets('unggah/marker/'.$row->marker);
			// 		$response[]=$data;
			// 	}
			// 	echo "var dataKategorihotspot=".json_encode($response,JSON_PRETTY_PRINT);
			// }
			// if($jenis=='kategorikeluhan'){
			// 	$getKategorikeluhan=$this->KategorikeluhanModel->get();
			// 	foreach ($getKategorikeluhan->result() as $row) {
			// 		$data=null;
			// 		$data['id_kategori_keluhan']=$row->id_kategori_keluhan;
			// 		$data['nm_kategori_keluhan']=$row->nm_kategori_keluhan;
			// 		$data['icon']=($row->marker=='')?assets('icons/marker.png'):assets('unggah/marker/'.$row->marker);
			// 		$response[]=$data;
			// 	}
			// 	echo "var dataKategorikeluhan=".json_encode($response,JSON_PRETTY_PRINT);
			// }
			// elseif($jenis=='hotspot'){
			// 	if($type=='point'){
			// 		if($id!=''){
			// 			$this->db->where('a.id_kategori_hotspot',$id);
			// 		}
			// 		$getHotspot=$this->HotspotModel->get();
			// 		foreach ($getHotspot->result() as $row) {
			// 			$data=null;
			// 			$data['type']="Feature";
			// 			$data['properties']=[
			// 										"name"=>$row->lokasi,
			// 										"lokasi"=>$row->lokasi.' Kec. '.$row->nm_kecamatan,
			// 										"keterangan"=>$row->keterangan,
			// 										"tanggal"=>$row->tanggal,
			// 										"icon"=>($row->marker=='')?assets('icons/marker.png'):assets('unggah/marker/'.$row->marker),
			// 										"popUp"=>"No RM : ".$row->norm."<br> Nama Pasien : ".$row->nama."<br>Lokasi : ".$row->lokasi.", Kec. ".$row->nm_kecamatan."<br>Tanggal Kunjungan : ".$row->tanggal
			// 										];
			// 			$data['geometry']=[
			// 										"type" => "Point",
			// 										"coordinates" => [$row->lng,$row->lat ] 
			// 										];	
	
			// 			$response[]=$data;
			// 		}
			// 		echo json_encode($response,JSON_PRETTY_PRINT);	
			// 	}
			// 	if($type=='varpoint'){
			// 		if($id!=''){
			// 			$this->db->where('a.id_kategori_hotspot',$id);
			// 		}
			// 		$getHotspot=$this->HotspotModel->get();
			// 		foreach ($getHotspot->result() as $row) {
			// 			$data=null;
			// 			$data['type']="Feature";
			// 			$data['properties']=[
			// 										"name"=>$row->lokasi,
			// 										"lokasi"=>$row->lokasi.' Kec. '.$row->nm_kecamatan,
			// 										"keterangan"=>$row->keterangan,
			// 										"tanggal"=>$row->tanggal,
			// 										"icon"=>($row->marker=='')?assets('icons/marker.png'):assets('unggah/marker/'.$row->marker),
			// 										"popUp"=>"No RM : ".$row->norm."<br> Nama Pasien : ".$row->nama."<br>Lokasi : ".$row->lokasi.", Kec. ".$row->nm_kecamatan."<br>Tanggal Kunjungan : ".$row->tanggal
			// 										];
			// 			$data['geometry']=[
			// 										"type" => "Point",
			// 										"coordinates" => [$row->lng,$row->lat ] 
			// 										];	
	
			// 			$response[]=$data;
			// 		}
			// 		echo 'hotspotPoint ='.json_encode($response,JSON_PRETTY_PRINT);	
			// 	}
			// 	elseif($type=="polygon"){
			// 		$getHotspot=$this->HotspotModel->get();
			// 		$polygon=null;
			// 		foreach ($getHotspot->result() as $row) {
			// 			if($row->polygon!=NULL){
			// 				$polygon[]=$row->polygon;
			// 			}
			// 		}
			// 		echo "var latlngs=[".implode(',', $polygon)."];";
			// 	}
				
			// }
		}
		else{
			header('Content-Type: application/json');
			$response=[];
			if($jenis=='kecamatan'){
				$getKecamatan=$this->KecamatanModel->get();
				foreach ($getKecamatan->result() as $row) {
					$data=null;
					$data['id_kecamatan']=$row->id_kecamatan;
					$data['kd_kecamatan']=$row->kd_kecamatan;
					$data['geojson_kecamatan']=$row->geojson_kecamatan;
					$data['warna_kecamatan']=$row->warna_kecamatan;
					$data['nm_kecamatan']=$row->nm_kecamatan;
					$response[]=$data;
				}
				echo "var dataKecamatan=".json_encode($response,JSON_PRETTY_PRINT);
			}
			if($jenis=='kategorihotspot'){
				$getKategorihotspot=$this->KategorihotspotModel->get();
				foreach ($getKategorihotspot->result() as $row) {
					$data=null;
					$data['id_kategori_hotspot']=$row->id_kategori_hotspot;
					$data['nm_kategori_hotspot']=$row->nm_kategori_hotspot;
					$data['icon']=($row->marker=='')?assets('icons/marker.png'):assets('unggah/marker/'.$row->marker);
					$response[]=$data;
				}
				echo "var dataKategorihotspot=".json_encode($response,JSON_PRETTY_PRINT);
			}
			if($jenis=='kategorikeluhan'){
				$getKategorikeluhan=$this->KategorikeluhanModel->get();
				foreach ($getKategorikeluhan->result() as $row) {
					$data=null;
					$data['id_kategori_keluhan']=$row->id_kategori_keluhan;
					$data['nm_kategori_keluhan']=$row->nm_kategori_keluhan;
					$data['icon']=($row->marker=='')?assets('icons/marker.png'):assets('unggah/marker/'.$row->marker);
					$response[]=$data;
				}
				echo "var dataKategorikeluhan=".json_encode($response,JSON_PRETTY_PRINT);
			}
			elseif($jenis=='hotspot'){
				if($type=='point'){
					if($id!=''){
						$this->db->where('a.id_kategori_hotspot',$id);
					}
					$getHotspot=$this->HotspotModel->get();
					foreach ($getHotspot->result() as $row) {
						$data=null;
						$data['type']="Feature";
						$data['properties']=[
													"name"=>$row->lokasi,
													"lokasi"=>$row->lokasi.' Kec. '.$row->nm_kecamatan,
													"keterangan"=>$row->keterangan,
													"tanggal"=>$row->tanggal,
													"icon"=>($row->marker=='')?assets('icons/marker.png'):assets('unggah/marker/'.$row->marker),
													"popUp"=>"No RM : ".$row->norm."<br> Nama Pasien : ".$row->nama."<br>Lokasi : ".$row->lokasi.", Kec. ".$row->nm_kecamatan."<br>Tanggal Kunjungan : ".$row->tanggal
													];
						$data['geometry']=[
													"type" => "Point",
													"coordinates" => [$row->lng,$row->lat ] 
													];	
	
						$response[]=$data;
					}
					echo json_encode($response,JSON_PRETTY_PRINT);	
				}
				if($type=='varpoint'){
					if($id!=''){
						$this->db->where('a.id_kategori_hotspot',$id);
					}
					$getHotspot=$this->HotspotModel->get();
					foreach ($getHotspot->result() as $row) {
						$data=null;
						$data['type']="Feature";
						$data['properties']=[
													"name"=>$row->lokasi,
													"lokasi"=>$row->lokasi.' Kec. '.$row->nm_kecamatan,
													"keterangan"=>$row->keterangan,
													"tanggal"=>$row->tanggal,
													"icon"=>($row->marker=='')?assets('icons/marker.png'):assets('unggah/marker/'.$row->marker),
													"popUp"=>"No RM : ".$row->norm."<br> Nama Pasien : ".$row->nama."<br>Lokasi : ".$row->lokasi.", Kec. ".$row->nm_kecamatan."<br>Tanggal Kunjungan : ".$row->tanggal
													];
						$data['geometry']=[
													"type" => "Point",
													"coordinates" => [$row->lng,$row->lat ] 
													];	
	
						$response[]=$data;
					}
					echo 'hotspotPoint ='.json_encode($response,JSON_PRETTY_PRINT);	
				}
				elseif($type=="polygon"){
					$getHotspot=$this->HotspotModel->get();
					$polygon=null;
					foreach ($getHotspot->result() as $row) {
						if($row->polygon!=NULL){
							$polygon[]=$row->polygon;
						}
					}
					echo "var latlngs=[".implode(',', $polygon)."];";
				}
				
			}
		}
		
	}
}
