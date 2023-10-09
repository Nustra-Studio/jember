  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin=""/>
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
  <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>

  <style>
    html, body {
      height: 100%;
      margin: 0;
    }
    .leaflet-container {
      height: 650px;
      width: 2400px;
      max-width: 100%;
      max-height: 100%;
    }
  </style>

<body>

<div id='map'></div>

</body>
</section>
</main>
  <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHqhgVQmhdp3XAJ91LHRdXJ3YOjP1V2Gs" async defer></script>
  <script src="<?=base_url('assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js')?>"></script>
  <script src="<?=base_url('assets/js/leaflet.ajax.js')?>"></script>
  <script src="<?=base_url('assets/js/Leaflet.GoogleMutant.js')?>"></script>
  <script src="<?=base_url('assets/node_modules/leaflet-easyprint/dist/bundle.js')?>"></script>
  <script src="<?=base_url('assets/js/leaflet-search/dist/leaflet-search.src.js')?>"></script>
  <script src="<?=site_url('admin/api/data/kecamatan')?>"></script>
  <script src="<?=site_url('admin/api/data/kategorihotspot')?>"></script>

<script type="text/javascript">

  var map = L.map('map').setView([-8.173414282622259, 113.7104365323812], 10);
  var layersKecamatan=[];
  var layersKategorihotspot=[];
  var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  });
  var roadMutant = L.gridLayer.googleMutant({
      maxZoom: 24,
      type:'roadmap'
  });

  map.addLayer(tiles);

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
      layer: tiles
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
  for(i=0;i<dataKategorihotspot.length;i++){
    var data=dataKategorihotspot[i];
    var layer={
      name: data.nm_kategori_hotspot,
      icon: iconByImage(data.icon),
      layer: new L.GeoJSON.AJAX(["<?=site_url('admin/api/data/hotspot/point')?>/"+data.id_kategori_hotspot],
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
    layersKategorihotspot.push(layer);
  }


  // registrasikan untuk panel layer
  var overLayers = [{
    group: "Layer Kecamatan",
    layers: layersKecamatan
  },
  {
    group: "Kategori Hotspot",
    layers: layersKategorihotspot
  }
  ];

  var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers,{
    collapsibleGroups: true
  });

  map.addControl(panelLayers);
</script>