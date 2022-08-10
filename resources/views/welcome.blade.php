@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        
					<div class="col-xl-12">
						<!-- div -->
						<div class="card mg-b-20" id="tabs-style2">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Selamat datang di aplikasi SIPSU. Sistem Informasi Prasarana, Sarana, dan Utilitas
								</div>
								<p class="mg-b-20 text-muted">
                                    Sebagai user umum, Anda dapat melihat PSU yang telah diserahkan ke Pemerintah Kota Surabaya dalam dua mode : Peta dan Tabel.
                                </p>
								
										<div class="panel panel-primary tabs-style-2">
											<div class=" tab-menu-heading">
												<div class="tabs-menu1">
													<!-- Tabs -->
													<ul class="nav panel-tabs main-nav-line">
														<li><a href="#tab4" class="nav-link active" data-toggle="tab">Peta </a></li>
														<li><a href="#tab5" class="nav-link" data-toggle="tab">Table</a></li>
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body main-content-body-right border">
												<div class="tab-content">
													<div class="tab-pane active" id="tab4">
														
        <div id="map0" style="height: 500px"></div>
													</div>
													<div class="tab-pane" id="tab5">
														<div class="table-responsive">
                                                            <table class="table  row-border " id="example1">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="wd-30p border-bottom-0">Perumahan</th>
                                                                        <th class="wd-25p border-bottom-0">Pengembang</th>
                                                                        <th class="wd-25p border-bottom-0">Siteplan</th>
                                                                        <th class="wd-15p border-bottom-0">Status</th>
                                                                        <th class="wd-5p border-bottom-0"></th>
                                                                        
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($rs as $r)
                                                                    <tr>
                                                                        <td><b>{{$r->nama}}</b><br>{{$r->alamat}}<br>Kel. {{$r->kel}}<br>Kec. {{$r->kec}}</td>
                                                                        <td><b>{{$r->nama_pengembang}}</b><br><?php echo $r->alamat_pengembang ?><br>{{$r->kesesuaian_pengembang}}</td>
                                                                        <td>{{$r->jenis}}<br>Tahun {{$r->tahun_siteplan}}<br>Jml Kavling: {{$r->jum_kavling}}</td>
                                                                        <td>{{$r->status}}</td>
                                                                        <td>
                                                                            <a class="modal-effect" data-effect="effect-scale" data-toggle="modal" href="#modal_detail_perumahan">
                                                                            <button onclick="show_detail_perumahan({{$r->id}},'{{$r->nama}}')" class="btn btn-outline-warning">Detail</button>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>													</div>
													
												</div>
											</div>
										
								</div>
							</div>
						</div>
					</div>
    </div>
</div>
@endsection


@section("javasc")


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


var map0 = new L.Map('map0', { zoomsliderControl: true, zoomControl: false }).setView([-7.281946 ,112.738093], 12);
var osm=L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {});
osm.addTo(map0);     

var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{ maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3'] });

var googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{ maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3'] });

var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{ maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3']
});


feature_group_fisik=[];
feature_group=[];

@foreach($rs as $r)

var wkt_{{$r->id}} = new Wkt.Wkt();
wkt_{{$r->id}}.read("{{$r->wkt}}"); 
var feature_{{$r->id}} = wkt_{{$r->id}}.toObject(); 

feature_{{$r->id}}.on('click', function (e) { 
    var pop = L.popup();
    pop.setLatLng(e.latlng);
    pop.setContent("<h3>{{$r->nama}}</h3>{{$r->alamat}},{{$r->kel}},{{$r->kec}} <br><br> " +
    "<a class='modal-effect' data-effect='effect-scale' data-toggle='modal' href='#modal_detail_perumahan'>" +
    "<button onclick='show_detail_perumahan({{$r->id}}," + '"{{$r->nama}}"' +  ")' class='btn btn-sm btn-outline-warning'>Detail</button>" +
    "</a>");
    map0.openPopup(pop);
});
@if($r->status=='BAST FISIK')
feature_{{$r->id}}.setStyle({
            color:"#007700", 
            opacity: 0.75,
            title:"{{$r->nama}}, {{$r->alamat}}"
        });
feature_group_fisik.push(feature_{{$r->id}})
@else

feature_group.push(feature_{{$r->id}})
@endif

@endforeach

var LG = L.layerGroup(feature_group);
var LG_Fisik = L.layerGroup(feature_group_fisik);


LG.addTo(map0); 
LG_Fisik.addTo(map0); 

var overlayMaps={     
"Sudah BAST Fisik":LG_Fisik,
}	


var baseMaps = {
"OpenStreetMap": osm,
"Google Street":googleStreets,
"Google Satellite": googleSat,
"google Hybrid":googleHybrid,
};

L.control.layers(baseMaps,overlayMaps).addTo(map0);

var ctEasybtn=L.easyButton(' <span>&target;</span>',
function() {
map0.locate({setView : true})
});
ctEasybtn.addTo(map0);

var controlSearch = new L.Control.Search({
    position:'topright',	
    layer: LG_Fisik ,
    initial: false,
    zoom: 18,
    marker: false
});

map0.addControl( controlSearch );
  

setTimeout(function() {
map0.invalidateSize();
}, 1000);



$('#example1').DataTable({
    language: {
        searchPlaceholder: 'Search...',
        sSearch: 'Cari',
        lengthMenu: '_MENU_',
    }
});
@endsection
