@extends('layouts.app')

@section('title', 'Halaman Detail Dosen')
@push('style')

  <style>
    .emp-profile {
      padding: 3%;
      margin-top: 3%;
      margin-bottom: 3%;
      border-radius: 0.5rem;
      background: #fff;
    }

    /*.profile-img img{*/
    /*  width: 70%;*/
    /*  height: 100%;*/
    /*}*/
    .profile-img .file {
      position: relative;
      overflow: hidden;
      margin-top: -20%;
      width: 70%;
      border: none;
      border-radius: 0;
      font-size: 15px;
      background: #212529b8;
    }

    .profile-img .file input {
      position: absolute;
      opacity: 0;
      right: 0;
      top: 0;
    }

    .profile-head h5 {
      color: #333;
    }

    .profile-head h6 {
      color: #0062cc;
    }

    .profile-edit-btn {
      border: none;
      border-radius: 1.5rem;
      width: 70%;
      padding: 2%;
      font-weight: 600;
      color: #6c757d;
      cursor: pointer;
    }

    .proile-rating span {
      color: #495057;
      font-size: 15px;
      font-weight: 600;
    }

    .profile-head .nav-tabs {
      margin-bottom: 5%;
    }

    .profile-head .nav-tabs .nav-link {
      font-weight: 600;
      border: none;
    }

    .profile-head .nav-tabs .nav-link.active {
      border: none;
      border-bottom: 2px solid #0062cc;
    }

    .profile-work {
      padding: 14%;
      margin-top: -15%;
    }

    .profile-work p {
      font-size: 12px;
      color: #818182;
      font-weight: 600;
      margin-top: 10%;
    }

    .profile-work a {
      text-decoration: none;
      color: #495057;
      font-weight: 600;
      font-size: 14px;
    }

    .profile-work ul {
      list-style: none;
    }

    .profile-tab label {
      font-weight: 600;
    }

    .profile-tab p {
      font-weight: 600;
      color: #000000;
    }
  </style>
@endpush
@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ __('Data Dosen') }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route("dosen.index")}}">Data Dose</a></li>
            <li class="breadcrumb-item active">Detail Dosen</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <a href="{{route('dosen.index')}}" class="btn btn-sm btn-primary font-weight-bold text-uppercase mb-2"><i
          class="fas fa-arrow-alt-circle-left mr-2"></i>kembali</a>
      <div class="card p-3">
        <div class="row">
          <div class="col-md-4">
            @if ($dsn->image)
              <div class="profile-img d-flex justify-content-center">
                <img
                  src="{{asset('storage/'. $dsn->image)}}"
                  alt="{{$dsn->image}}" width="75%" height="350px" class="rounded-circle"/>
              </div>
            @else
              <div class="profile-img d-flex justify-content-center">
                <img
                  src="https://source.unsplash.com/1200x350?{{ $dsn->image }}"
                  alt="{{$dsn->image}}" width="75%" height="350px" class="rounded-circle"/>
              </div>
            @endif

          </div>
          <div class="col-md-6">
            <div class="profile-head">
              <h2>{{$dsn->name}}</h2>
              <h6>Dosen Pendidikan Informatika</h6>
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                     aria-controls="home" aria-selected="true">Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                     aria-controls="profile" aria-selected="false">Bimbingan</a>
                </li>
              </ul>
            </div>
            <div class="tab-content profile-tab" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                  <div class="col-md-6">
                    <label>NIP (Nomor Induk Pegawai)</label>
                  </div>
                  <div class="col-md-6">
                    <p>{{$dsn->nip}}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label>Nama Dosen</label>
                  </div>
                  <div class="col-md-6">
                    <p>{{$dsn->name}}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label>Jenis Kelamin</label>
                  </div>
                  <div class="col-md-6">
                    @if($dsn->gender == 'L')
                      <p>Laki-laki</p>
                    @elseif($dsn->gender == 'P')
                      <p>Perempuan</p>
                    @else
                      <p>Lainnya</p>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label>Email</label>
                  </div>
                  <div class="col-md-6">
                    <p>{{$dsn->email}}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label>Alamat</label>
                  </div>
                  <div class="col-md-6">
                    <p>{{$dsn->alamat}}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label>Hp/Tlp/WA</label>
                  </div>
                  <div class="col-md-6">
                    <p>{{$dsn->no_tlp}}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label>Status</label>
                  </div>
                  <div class="col-md-6">
                    <p>Dosen Pendidikan Informatika</p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                {{--               <div class="row">--}}
                {{--                 <div class="col-md-6">--}}
                {{--                   <label>Jumlah Bimbing</label>--}}
                {{--                 </div>--}}
                {{--                 <div class="col-md-6">--}}
                {{--                   <p>-</p>--}}
                {{--                 </div>--}}
                {{--               </div>--}}
                {{--               <div class="row">--}}
                {{--                 <div class="col-md-6">--}}
                {{--                   <label>Hourly Rate</label>--}}
                {{--                 </div>--}}
                {{--                 <div class="col-md-6">--}}
                {{--                   <p>10$/hr</p>--}}
                {{--                 </div>--}}
                {{--               </div>--}}
                {{--               <div class="row">--}}
                {{--                 <div class="col-md-6">--}}
                {{--                   <label>Total Projects</label>--}}
                {{--                 </div>--}}
                {{--                 <div class="col-md-6">--}}
                {{--                   <p>230</p>--}}
                {{--                 </div>--}}
                {{--               </div>--}}
                {{--               <div class="row">--}}
                {{--                 <div class="col-md-6">--}}
                {{--                   <label>English Level</label>--}}
                {{--                 </div>--}}
                {{--                 <div class="col-md-6">--}}
                {{--                   <p>Expert</p>--}}
                {{--                 </div>--}}
                {{--               </div>--}}
                {{--               <div class="row">--}}
                {{--                 <div class="col-md-6">--}}
                {{--                   <label>Availability</label>--}}
                {{--                 </div>--}}
                {{--                 <div class="col-md-6">--}}
                {{--                   <p>6 months</p>--}}
                {{--                 </div>--}}
                {{--               </div>--}}
                {{--               <div class="row">--}}
                {{--                 <div class="col-md-12">--}}
                {{--                   <label>Your Bio</label><br/>--}}
                {{--                   <p>Your detail description</p>--}}
                {{--                 </div>--}}
                {{--               </div>--}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
