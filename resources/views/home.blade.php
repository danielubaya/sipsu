@extends('layouts.dashfox')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Executive Summary</li>
@endsection
@section('utama')
                                <div class="card" style="width:100%">
                                    <div class="card-body">
                                        <h4 class="card-title">Welcome</h4>
                                        <p class="card-title-desc">Selamat datang di Aplikasi SIPSU Sistem Informasi Prasarana, Sarana, dan Utilitas.
                                        </p>    
                                        
                                        <div class="col-md-9">
                                            <div class="card mg-b-20 mg-md-b-0">
                                                <div class="card-body">
                                                    <div class="main-content-label mg-b-5">
                                                        Total per Status Permohonan
                                                    </div>
                                                    <div class="ht-400 ht-sm-500" id="flotPie1"></div>
                                                </div>
                                            </div>
                                        </div><!-- col-6 -->

                                       <div style="height: 400px" id="div_chart">

                                       </div>
        
                                    </div>
                                </div>
                            
                   

@endsection


@section('javasc')

/**************** PIE CHART *******************/
	var piedata = [{
		label: 'PENAGIHAN ADMINISTRASI',
		data: [
			[1, 82]
		],
		color: '#5066e0'
	}, {
		label: 'PROSES ADMINISTRASI',
		data: [
			[1, 48]
		],
		color: '#ff8c00'
	}, {
		label: 'PENAGIHAN FISIK',
		data: [
			[1, 79]
		],
		color: '#00d48f '
	}, {
		label: 'PROSES FISIK',
		data: [
			[1, 32]
		],
		color: '#ffc107'
	}, {
		label: 'BAST FISIK',
		data: [
			[1, 126]
		],
		color: '#02d7ff'
	}, {
		label: 'PENYERAHAN OLEH WARGA',
		data: [
			[1, 58]
		],
		color: '#D2575f'
	}
    
    
    ];
	$.plot('#flotPie1', piedata, {
		series: {
			pie: {
				show: true,
				radius: 1,
				label: {
					show: true,
					radius: 2 / 3,
					formatter: labelFormatter,
					threshold: 0.1
				}
			}
		},
		grid: {
			hoverable: true,
			clickable: true
		}
	});


    function labelFormatter(label, series) {
		return '<div style="font-size:8pt; text-align:center; padding:2px; color:white;">' + label + '<br/>' + Math.round(series.percent) + '%</div>';
	}

@endsection