@extends('layouts.dashfox')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="/perumahans">Dokumen</a></li>
<li class="breadcrumb-item active" aria-current="page">Peta Sebaran</li>
@endsection

@section('utama')
    <div class="card" style="width:100%">
        <div class="card-header pb-0 pd-t-25">
            <div class="d-flex justify-content-between " >
                <h2 class="card-title mg-b-0">Peta Sebaran Siteplan</h2>				
            </div>
        </div>
        <div class="card-body">
            <div id="map0" style="height: 600px" ></div>
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


feature_all=[];

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
feature_{{$r->id}}.setStyle({
    opacity: 0.75,
    title:"{{$r->nama}}, {{$r->alamat}}"
});
feature_group.push(feature_{{$r->id}})
@endif

feature_all.push(feature_{{$r->id}})
@endforeach

var LG = L.layerGroup(feature_group);
var LG_Fisik = L.layerGroup(feature_group_fisik);

var LG_All = L.layerGroup(feature_all);


LG.addTo(map0); 
LG_Fisik.addTo(map0); 

var overlayMaps={     
"Belum BAST Fisik":LG,
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
    layer: LG_All,
    initial: false,
    zoom: 18,
    marker: false
});

map0.addControl( controlSearch );
  
setTimeout(function() {
map0.invalidateSize();
}, 1000);

@endsection