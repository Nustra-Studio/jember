	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/js/leaflet-search/dist/leaflet-search.min.css')?>">
	<style type="text/css">
		
		.search-tip b {
			display: inline-block;
			clear: left;
			float: right;
			padding: 0 4px;
			margin-left: 4px;
		}

		.Banjir.search-tip b,
		.Banjir.leaflet-marker-icon {
			background: #f66
		}
	</style>
<!-- Make sure you put this AFTER Leaflet's CSS -->
 	<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHqhgVQmhdp3XAJ91LHRdXJ3YOjP1V2Gs" async defer></script>
	<script src="<?=base_url('assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js')?>"></script>
	<script src="<?=base_url('assets/js/leaflet.ajax.js')?>"></script>
	<script src="<?=base_url('assets/js/Leaflet.GoogleMutant.js')?>"></script>
	<script src="<?=base_url('assets/node_modules/leaflet-easyprint/dist/bundle.js')?>"></script>
	<script src="<?=base_url('assets/js/leaflet-search/dist/leaflet-search.src.js')?>"></script>
	<script src="<?=site_url('admin/api/data/kecamatan')?>"></script>
	<script src="<?=site_url('admin/api/data/kategorikeluhan')?>"></script>

   <script type="text/javascript">
   	var map = L.map('map').setView([-8.099723605051704, 113.71602824377852], 14);
   	var layersKecamatan=[];
   	var layersKategorikeluhan=[];
   	var Layer=L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
	    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
	    maxZoom: 18,
	    id: 'mapbox.streets',
	    accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
	});
	var roadMutant = L.gridLayer.googleMutant({
			maxZoom: 24,
			type:'roadmap'
	});

	map.addLayer(Layer);
	// easy print
	L.easyPrint({
		title: 'Leaflet EasyPrint',
		position: 'topleft',
		exportOnly: true,
		filename :'GIS Arjasa',
		sizeModes: ['Current','A4Portrait', 'A4Landscape']
	}).addTo(map);
	// pengaturan legend

	function iconByName(name) {
		return '<i class="icon" style="background-color:'+name+';border-radius:50%"></i>';
	}


	function iconByImage(image) {
		return '<img src="'+image+'" style="width:16px">';
	}


	var baseLayers = [
		{
			name: "OpenStreetMap",
			layer: Layer
		},
		{	
			name: "OpenCycleMap",
			layer: L.tileLayer('http://{s}.tile.opencyclemap.org/cycle/{z}/{x}/{y}.png')
		},
		{
			name: "Outdoors",
			layer: L.tileLayer('http://{s}.tile.thunderforest.com/outdoors/{z}/{x}/{y}.png')
		},
		{
			name:'Satelite Google',
			layer : L.gridLayer.googleMutant({
				maxZoom: 24,
				type:'satellite'
			})
		},
		{
			name: "Roadmap Google",
			layer: roadMutant
		}
	];
	// Akhir konfigurasi
	// pengaturan untuk layer kecamatan
	function getColorKecamatan(KODE){
		for(i=0;i<dataKecamatan.length;i++){
			var data=dataKecamatan[i];
			if(data.kd_kecamatan==KODE){
				return data.warna_kecamatan;
			}
		}
	}
	function popUp(f,l){
	    var html='';
	    if (f.properties){
	    	html+='<table>';
	    	html+='<tr>';
		    	html+='<td colspan="3"><img src="<?=base_url('assets/icon-map.png')?>" width="100%"></td>';
	    	html+='</tr>';
	    	html+='<tr>';
		    	html+='<td>Provinsi</td>';
		    	html+='<td>:</td>';
		    	html+='<td>'+f.properties['PROPINSI']+'</td>';
	    	html+='</tr>';
	    	html+='<tr>';
		    	html+='<td>Kecamatan</td>';
		    	html+='<td>:</td>';
		    	html+='<td>'+f.properties['KECAMATAN']+'</td>';
	    	html+='</tr>';
	    	html+='</table>';
	        l.bindPopup(html);
	    }
	}

	for(i=0;i<dataKecamatan.length;i++){
		var data=dataKecamatan[i];
		var layer={
			name: data.nm_kecamatan,
			icon: iconByName(data.warna_kecamatan),
			layer: new L.GeoJSON.AJAX(["<?=base_url('assets/unggah/geojson')?>/"+data.geojson_kecamatan],
				{
					onEachFeature:popUp,
					style: function(feature){
						var KODE=feature.properties.KODE;
						return {
							"color": getColorKecamatan(KODE),
						    "weight": 1,
						    "opacity": 1
						}

					},
				}).addTo(map)
			}
		layersKecamatan.push(layer);
	}
	//kategori hotspot
	for(i=0;i<dataKategorikeluhan.length;i++){
		var data=dataKategorikeluhan[i];
		var layer={
			name: data.nm_kategori_keluhan,
			icon: iconByImage(data.icon),
			layer: new L.GeoJSON.AJAX(["<?=site_url('admin/api/data/hotspot/point')?>/"+data.id_kategori_keluhan],
				{
					 pointToLayer: function (feature, latlng) {
				    	// console.log(feature)
				        return L.marker(latlng, {
				        	icon : new L.icon({
				        			iconUrl: feature.properties.icon,
							    	iconSize: [38, 45]
			        				})
				        });
				    },
			    	onEachFeature: function(feature,layer){
			    		 if (feature.properties && feature.properties.name) {
					        layer.bindPopup(feature.properties.popUp);
					    }
			    	}
				}).addTo(map)
			}
		layersKategorikeluhan.push(layer);
	}

	// registrasikan untuk panel layer
	var overLayers = [{
		group: "Layer Kecamatan",
		layers: layersKecamatan
	},{
		group: "Kategori Keluhan",
		layers: layersKategorikeluhan
	}
	];

	var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers,{
		collapsibleGroups: true
	});

	map.addControl(panelLayers);
	// end registrasikan untuk panel layer

   </script>

   