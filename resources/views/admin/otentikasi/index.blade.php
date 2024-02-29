@extends('backend.master')
@section('title')
Otentikasi
@endsection

@section('content')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Data Otentikasi</h2>
                <h5 class="text-white op-7 mb-2">Dana Pensiun Angkasa Pura I</h5>

            </div>
            <div class="ml-md-auto py-2 py-md-0">
                <button style="width: 100px" type="button" id="add" class="btn  btn-round btn-secondary ">Add</button>
            </div>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-registrasi" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>NIK</th>
                                    <th>Nama Penerima</th>
                                    <th>Jenis Manfaat</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Telepon Kerabat</th>
                                    <th>Foto</th>
                                    <th>Suara</th>
                                    <th>Status Penerima</th>
                                    <th>Status Otentikasi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.otentikasi.modals.modal_otentikasi')
@endsection
