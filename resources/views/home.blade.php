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
                                        
                                        <div class="col-md-6">
                                            <div class="card mg-b-20 mg-md-b-0">
                                                <div class="card-body">
                                                    <div class="main-content-label mg-b-5">
                                                        Pie Chart
                                                    </div>
                                                    <p class="mg-b-20 card-sub-title tx-12 text-muted">Basic Charts Of Dashfox template.</p>
                                                    <div class="ht-200 ht-sm-300" id="flotPie1"></div>
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
		label: 'Series 1',
		data: [
			[1, 90]
		],
		color: '#5066e0'
	}, {
		label: 'Series 2',
		data: [
			[1, 60]
		],
		color: '#ff8c00'
	}, {
		label: 'Series 3',
		data: [
			[1, 20]
		],
		color: '#00d48f '
	}, {
		label: 'Series 4',
		data: [
			[1, 50]
		],
		color: '#ffc107'
	}, {
		label: 'Series 5',
		data: [
			[1, 40]
		],
		color: '#02d7ff'
	}];
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