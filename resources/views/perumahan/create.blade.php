@extends('layouts.dashfox')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="/perumahans">Permohonan</a></li>
<li class="breadcrumb-item active" aria-current="page">Membuat Permohonan Baru</li>
@endsection

@section('utama')
                                <div class="card" style="width:100%">
                                    <div class="card-body">
                                        <h4 class="card-title">Permohonan Penyerahan PSU baru</h4>
                                        <div class="pd-30 pd-sm-40 bg-gray-100">
                                            <div class="row row-xs align-items-center mg-b-20">
                                                <div class="col-md-12">
                                                    <label class="form-label mg-b-0">PT</label>
                                                </div>
                                                <div class="col-md-12 mg-t-5">
                                                    <input class="form-control" placeholder="Enter your firstname" type="text">
                                                </div>
                                            </div>
                                            <div class="row row-xs align-items-center mg-b-20">
                                                <div class="col-md-12">
                                                    <label class="form-label mg-b-0">Lastnane</label>
                                                </div>
                                                <div class="col-md-12 mg-t-5">
                                                    <input class="form-control" placeholder="Enter your lastname" type="text">
                                                </div>
                                            </div>
                                            <div class="row row-xs align-items-center mg-b-20">
                                                <div class="col-md-12">
                                                    <label class="form-label mg-b-0">Email</label>
                                                </div>
                                                <div class="col-md-12 mg-t-5">
                                                    <input class="form-control" placeholder="Enter your email" type="email">
                                                </div>
                                            </div>
                                            <button class="btn btn-primary pd-x-30 mg-r-5 mg-t-5">Simpan</button>
                                            <button class="btn btn-warning pd-x-30 mg-t-5">Batal</button>
                                        </div>
        
                                    </div>
                                </div>
                            
                   

@endsection