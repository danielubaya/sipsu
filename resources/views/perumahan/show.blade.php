<div class="d-md-flex">
	<div class="">
		<div class="panel panel-primary tabs-style-4">
			<div class="tab-menu-heading">
				<div class="tabs-menu ">
					<!-- Tabs -->
					<ul class="nav panel-tabs">
						<li class=""><a href="#tab1" class="active" data-toggle="tab">
                            <i class="fe fe-home"></i> Perumahan</a></li>
						<li><a href="#tab2" data-toggle="tab">
                            <i class="fe fe-user"></i> Pengembang</a></li>
						<li><a href="#tab3" data-toggle="tab"
                            onclick="
                            
			setTimeout(function() {
				map.invalidateSize();
				//alert('disini');
			}, 1000);
			"
                            >
                            <i class="fe fe-map"></i> Siteplan</a></li>
						<li><a href="#tab4" data-toggle="tab">
                            <i class="fe fe-minimize"></i> Detail PSU</a></li>
                        <li><a href="#tab5" data-toggle="tab">
                                <i class="fe fe-server"></i> Lahan Makam</a></li>
                        <li><a href="#tab6" data-toggle="tab">
                            <i class="fe fe-file"></i> BAST Admin</a></li>
                        <li><a href="#tab7" data-toggle="tab">
                            <i class="fe fe-layers"></i> BAST Fisik</a></li>
                        <li><a href="#tab8" data-toggle="tab">
                            <i class="fe fe-briefcase"></i> Serah Terima</a></li>
                        <li><a href="#tab9" data-toggle="tab">
                            <i class="fe fe-database"></i> Informasi Tambahan</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="tabs-style-4">
		<div class="panel-body tabs-menu-body">
			<div class="tab-content">
				<div class="tab-pane active" id="tab1">
                    <p >
                        @if($r->wkt)
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <div id='map' style="height:400px">

                                </div>
                            </div>
                        </div>
                        @endif


@if($r->wkt)
<script>
          L.Map = L.Map.extend({
 	        openPopup: function (popup, latlng, options) { 
          if (!(popup instanceof L.Popup)) {
          var content = popup;
        
          popup = new L.Popup(options).setContent(content);
        }
        
        if (latlng) {
          popup.setLatLng(latlng);
        }
        
        if (this.hasLayer(popup)) {
          return this;
        }
        
        //this.closePopup();
        this._popup = popup;
        return this.addLayer(popup);        
    }
});


var wkt = new Wkt.Wkt();
	wkt.read("{{$r->wkt}}"); 

	var feature = wkt.toObject(); 

       map = new L.Map('map', { zoomsliderControl: true, zoomControl: false }).setView(feature.getBounds().getCenter(), 15);
      var osm=L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {});
      osm.addTo(map);     

      var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{ maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3'] });

      var googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{ maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3'] });

      var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{ maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3']
      });
  
    //  var ubaya= L.marker([ {{$r->y}} ,{{$r->x}}]).bindPopup("{{$r->alamat}}, RT {{$r->rt}}, RW {{$r->rw}}");
    //ubaya.addTo(map);

	feature.addTo(map); 

 var myIcon = L.icon({
    iconUrl: 'icons/libraries.png',
    iconSize: [30, 40],
    iconAnchor: [15, 40],
 }); 


 	  var overlayMaps={     
       "Siteplan":feature,
  	   }	

      var baseMaps = {
      "OpenStreetMap": osm,
      "Google Street":googleStreets,
      "Google Satellite": googleSat,
      "google Hybrid":googleHybrid,
    };
    
    L.control.layers(baseMaps,overlayMaps).addTo(map);

    var ctEasybtn=L.easyButton(' <span>&target;</span>',
     function() {
       map.locate({setView : true})
     });
     ctEasybtn.addTo(map);

  
      map.on('click', function(e) {
          //alert(e.latlng.lng);
        console.log(e.latlng.lat,e.latlng.lng);
        $('#new_x').val(e.latlng.lng);
        $('#new_y').val(e.latlng.lat);
        ubaya.setLatLng(e.latlng)
      });
  //var c = 

  setTimeout(function() {
        map.invalidateSize();
    }, 1000);

    </script>
  @endif


                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">Nama Perumahan</label>
                            </div>
                            <div class="col-md-12 mg-t-5">
                                <input class="form-control" type="text" readonly
                                value="<?php echo $r->nama?>">
                            </div>
                        </div>
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">Alamat</label>
                            </div>
                            <div class="col-md-12 mg-t-5">
                                <textarea readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->alamat); ?></textarea>
                            </div>
                        </div>
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">Kelurahan</label>
                            </div>
                            <div class="col-md-12 mg-t-5">
                                <textarea readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->kel); ?></textarea>
                            </div>
                        </div>
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">Kecamatan</label>
                            </div>
                            <div class="col-md-12 mg-t-5">
                                <textarea readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->kec); ?></textarea>
                            </div>
                        </div>
                    </p>
                    <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </p>
                </div>


				<div class="tab-pane" id="tab2">
                    <p >
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">Nama Pengembang</label>
                            </div>
                            <div class="col-md-12 mg-t-5">
                                <input class="form-control" type="text" readonly
                                value="<?php echo $r->nama_pengembang; ?>">
                            </div>
                        </div>
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">Alamat Pengembang</label>
                            </div>
                            <div class="col-md-12 mg-t-5">
                                <textarea readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->alamat_pengembang); ?></textarea>
                            </div>
                        </div>
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">Kesesuaian Pengembang</label>
                            </div>
                            <div class="col-md-12 mg-t-5">
                                <textarea readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->kesesuaian_pengembang); ?></textarea>
                            </div>
                        </div>
                        
                    </p>
                    <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </p>
                </div>

				<div class="tab-pane" id="tab3">
                    <p >
                       
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">Jenis Siteplan</label>
                            </div>
                            <div class="col-md-12 mg-t-5">
                                <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->jenis); ?></textarea>
                          
                            </div>
                        </div>
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">Tahun Siteplan</label>
                            </div>
                            <div class="col-md-12 mg-t-5">
                                <input class="form-control" type="text" readonly
                                value="<?php echo $r->tahun_siteplan; ?>">
                            </div>
                        </div>
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">Luas Siteplan</label>
                            </div>
                            <div class="col-md-12 mg-t-5">
                                <input class="form-control" type="text" readonly
                                value="<?php echo $r->luas_siteplan; ?>">
                            </div>
                        </div>
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">Nomor SKRK</label>
                            </div>
                            <div class="col-md-12 mg-t-5">
                                <textarea rows="4" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->no_skrk); ?></textarea>
                            </div>
                        </div>
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">Jumlah Kavling</label>
                            </div>
                            <div class="col-md-12 mg-t-5">
                                <textarea readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->jum_kavling); ?></textarea>
                            </div>
                        </div>
                        
                    </p>
                    <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </p>
                </div>

				<div class="tab-pane" id="tab4">
                    <p >
                        
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">Prasarana</label>
                            </div>
                            <div class="col-md-12 mg-t-5">
                                <textarea rows="4" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->prasarana); ?></textarea>
                            </div>
                        </div>
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">Sarana</label>
                            </div>
                            <div class="col-md-12 mg-t-5">
                                <textarea rows="4" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->sarana); ?></textarea>
                            </div>
                        </div>
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">Utilitas</label>
                            </div>
                            <div class="col-md-12 mg-t-5">
                                <textarea rows="4" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->utilitas); ?></textarea>
                            </div>
                        </div>
                        
                    </p>
                    <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </p>
                </div>


                <div class="tab-pane" id="tab5">
                    <p >
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">Fisik Terbangun >30%</label>
                            </div>
                            <div class="col-md-12 mg-t-5">
                                <input class="form-control" type="text" readonly
                                value="<?php echo $r->fisik_terbangun_30; ?>">
                            </div>
                        </div>
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">Kompensasi Makam </label>
                            </div>
                            <div class="col-md-3 mg-t-5">
                                <input class="form-control" type="text" readonly
                                value="<?php echo $r->kompensasi_makan; ?>">
                            </div>
                            <div class="col-md-9 mg-t-5">
                                <input class="form-control" type="text" readonly
                                value="<?php echo $r->kompensasi_makan_bukti; ?>">
                            </div>
                        </div>

                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">Penyerahan Lahan Makam </label>
                            </div>
                            <div class="col-md-3 mg-t-5">
                                <input class="form-control" type="text" readonly
                                value="<?php echo $r->lahan_makan_penyerahan; ?>">
                            </div>
                            <div class="col-md-9 mg-t-5">
                                <input class="form-control" type="text" readonly
                                value="<?php echo $r->lahan_makam_lahan; ?>">
                            </div>
                        </div>
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">Bayar PBB</label>
                            </div>
                            <div class="col-md-12 mg-t-5">
                                <input class="form-control" type="text" readonly
                                value="<?php echo $r->bayar_pbb; ?>">
                            </div>
                        </div>
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">Status Atas Hak</label>
                            </div>
                            <div class="col-md-12 mg-t-5">
                                <input class="form-control" type="text" readonly
                                value="<?php echo $r->status_atas_hak; ?>">
                            </div>
                        </div>
                    </p>
                    <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </p>
                </div>


                <div class="tab-pane" id="tab6">
                    <p >Progress Penyerahan Administrasi<br><br>
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Penagihan</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_admin_penagihan); ?></textarea>
                          
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Teguran</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_admin_teguran); ?></textarea>
                          
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Peringatan 1</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_admin_peringatan_1); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Peringatan 2</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_admin_peringatan_2); ?></textarea>
                             
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Peringatan 3</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_admin_peringatan_3); ?></textarea>
                             
                                </div>
                            </div>
                            
                        </div>
                       
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Penundaan Perizinan</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_admin_penundaan_perijinan); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Denda</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_admin_denda); ?></textarea>
                             
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Media Massa</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_admin_media_massa); ?></textarea>
                             
                                </div>
                            </div>
                            
                        </div>
                       

                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Blacklist</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_admin_blacklist); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Verifikasi Berkas</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_admin_verifikasi_berkas); ?></textarea>
                             
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Rapat Pendahuluan</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_admin_rapat_pendahuluan); ?></textarea>
                             
                                </div>
                            </div>
                            
                        </div>

                        
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Koreksi Bankum</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_admin_koreksi_bankum); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">TTD Pengembang</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_admin_ttd_pengembang); ?></textarea>
                             
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Nota Dinas</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_admin_nota_dinas); ?></textarea>
                             
                                </div>
                            </div>
                            
                        </div>

                         
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">TTD Surat Kuasa</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_admin_ttd_surat_kuasa); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Waarmerking</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_admin_waarmerking); ?></textarea>
                             
                                </div>
                            </div>
                        </div>
                    </p>
                    <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </p>
                </div>


                <div class="tab-pane" id="tab7">
                    <p >Progress Penyerahan Fisik<br><br>
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Penagihan</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_fisik_penagihan); ?></textarea>
                          
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Teguran</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_fisik_teguran); ?></textarea>
                          
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Peringatan 1</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_fisik_peringatan_1); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Peringatan 2</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_fisik_peringatan_2); ?></textarea>
                             
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Peringatan 3</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_fisik_peringatan_3); ?></textarea>
                             
                                </div>
                            </div>
                            
                        </div>
                       
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Penundaan Perizinan</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_fisik_penundaan_perijinan); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Denda</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_fisik_denda); ?></textarea>
                             
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Media Massa</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_fisik_media_massa); ?></textarea>
                             
                                </div>
                            </div>
                            
                        </div>
                       

                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Blacklist</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_fisik_blacklist); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Verifikasi Berkas</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_fisik_verifikasi_berkas); ?></textarea>
                             
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Rapat Pendahuluan</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_fisik_rapat_pendahuluan); ?></textarea>
                             
                                </div>
                            </div>
                            
                        </div>

                        
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Survei</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_fisik_survei); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Rapat Survei</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_fisik_rapat_survei); ?></textarea>
                             
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Konsep BA</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_fisik_konsep_ba); ?></textarea>
                             
                                </div>
                            </div>
                            
                        </div>

                         
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Koreksi Bankum</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_fisik_koreksi_bankum); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Pengesahan</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_fisik_pengesahan); ?></textarea>
                             
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <label class="form-label mg-b-0">Laporan ke Walikota</label>
                                </div>
                                <div class="col-md-12 mg-t-5">
                                    <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->bast_fisik_walikota); ?></textarea>
                             
                                </div>
                            </div>
                        </div>
                    </p>
                    <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </p>
                </div>


                <div class="tab-pane" id="tab8">
                    <p >
                        
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">No BAST Administrasi</label>
                            </div>
                            <div class="col-md-12 mg-t-5">
                                <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->no_bast_admin); ?></textarea>
                            </div>
                        </div>
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">No BAST Fisik</label>
                            </div>
                            <div class="col-md-12 mg-t-5">
                                <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->no_bast_fisik); ?></textarea>
                            </div>
                        </div>
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">Penyerahan Fisik</label>
                            </div>
                            <div class="col-md-12 mg-t-5">
                                <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->penyerahan_fisik); ?></textarea>
                            </div>
                        </div>
                        
                    </p>
                    <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </p>
                </div>

                <div class="tab-pane" id="tab9">
                    <p >
                        
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">Tindak Lanjut</label>
                            </div>
                            <div class="col-md-12 mg-t-5">
                                <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->tindak_lanjut); ?></textarea>
                            </div>
                        </div>
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">Progress Rinci</label>
                            </div>
                            <div class="col-md-12 mg-t-5">
                                <textarea rows="5" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->progress_rinci); ?></textarea>
                            </div>
                        </div>
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">Progress Akhir</label>
                            </div>
                            <div class="col-md-12 mg-t-5">
                                <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->progress_akhir); ?></textarea>
                            </div>
                        </div>
                        <div class="row align-items-center mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label mg-b-0">Permasalahan</label>
                            </div>
                            <div class="col-md-12 mg-t-5">
                                <textarea rows="3" readonly class="form-control" ><?php echo str_replace("<BR>",PHP_EOL,$r->permasalahan); ?></textarea>
                            </div>
                        </div>
                        
                    </p>
                    <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </p>
                </div>

			</div>
		</div>
	</div>
</div>