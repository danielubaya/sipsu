@extends('layouts.dashfox')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="/perumahans">Permohonan</a></li>
<li class="breadcrumb-item active" aria-current="page">Pembahasan Narsum</li>
@endsection

@section('utama')
    <div class="card" style="width:100%">
        <div class="card-header pb-0 pd-t-25">
            <div class="d-flex justify-content-between " >
                <h2 class="card-title mg-b-0">Pembahasan Narsum</h2>				
            </div>
            <p class="tx-12 text-muted mb-0 dark-orange" >
                Perumahan-perumahan yang memerlukan pembahasan dengan nara sumber.
            </p>
        </div>
        <div class="card-body">
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
            </div>
        </div>
    </div>
                            
                   

@endsection

@section("javasc")

$('#example1').DataTable({
    language: {
        searchPlaceholder: 'Search...',
        sSearch: 'Cari',
        lengthMenu: '_MENU_',
    }
});
@endsection