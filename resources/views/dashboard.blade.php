@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard Sistem Kedaruratan & Logistik</h1>
@stop

@section('content')

<div class="row">

<div class="col-lg-4 col-6">
<div class="small-box bg-info">
<div class="inner">
<h3>{{ $totalKontak }}</h3>
<p>Total Kontak BPBD</p>
</div>
<div class="icon">
<i class="fas fa-address-book"></i>
</div>
<a href="/kontak" class="small-box-footer">
Lihat Data <i class="fas fa-arrow-circle-right"></i>
</a>
</div>
</div>

<div class="col-lg-4 col-6">
<div class="small-box bg-success">
<div class="inner">
<h3>{{ $totalWilayah }}</h3>
<p>Total Wilayah</p>
</div>
<div class="icon">
<i class="fas fa-map"></i>
</div>
<a href="/wilayah" class="small-box-footer">
Lihat Data <i class="fas fa-arrow-circle-right"></i>
</a>
</div>
</div>

<div class="col-lg-4 col-6">
<div class="small-box bg-warning">
<div class="inner">
<h3>{{ $totalJabatan }}</h3>
<p>Total Jabatan</p>
</div>
<div class="icon">
<i class="fas fa-user-tag"></i>
</div>
<a href="/jabatan" class="small-box-footer">
Lihat Data <i class="fas fa-arrow-circle-right"></i>
</a>
</div>
</div>

</div>

@stop