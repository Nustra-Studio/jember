$this->db->like('field','data'); 

var myIcon = L.icon({
	    iconUrl: '<?=assets('icons/marker.png')?>',
	    iconSize: [38, 45],
	});
	<?php
	if($tahun!='semua'){
		$db->where('DATE_FORMAT(tanggal,"%Y")',$tahun);
	}

	$db->join('m_kecamatan b','a.id_kecamatan=b.id_kecamatan','LEFT');
	$getdata=$db->ObjectBuilder()->get('t_hotspot a');
	foreach ($getdata as $row) {
		?>
		L.marker([<?=$row->lat?>,<?=$row->lng?>],{icon: myIcon}).addTo(map)
				.bindPopup("Lokasi : <?=$row->lokasi?>,Kec. <?=$row->nm_kecamatan?><br>Keterangan : <?=$row->keterangan?><br>Tanggal : <?=$row->tanggal?>");
		<?php
	}
	?>

$this->db->select('*')
->from('t_hotspot a')
->join('m_kecamatan b','a.id_kecamatan=b.id_kecamatan','LEFT')
->where('id_kecamatan',$id_kecamatan);

 $query = $this->db->get();         
 return $query->result();