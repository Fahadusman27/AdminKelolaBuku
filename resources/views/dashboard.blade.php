@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Selamat Datang Fahad</h3>
          <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin transparent">
      <div class="row">
        <div class="col-md-4 mb-4 stretch-card transparent">
          <div class="card card-tale">
            <a href="/kategori">
                <div class="card-body">
                    <p class="fs-30 mb-2" style="color: white">Kategori</p>
                  </div>
            </a>
          </div>
        </div>
        <div class="col-md-4 mb-4 stretch-card transparent">
          <div class="card card-dark-blue">
            <a href="/bukus">
                <div class="card-body">
                    <p class="fs-30 mb-2" style="color: white">Buku</p>
            </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
