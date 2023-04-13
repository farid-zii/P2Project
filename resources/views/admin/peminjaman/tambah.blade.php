@extends('admin.layouts.app', [
    'activePage' => 'peminjaman',
  ])

@section('content')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Data Input</h3>
                  <h6 class="font-weight-normal mb-0">Data Peminjaman</h6>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <a href="/" target="_blank">
                    <button type="button" class="btn btn-outline-primary btn-md"><i class="ti-home mr-2"></i> Visit Homepage</button>
                  </a>
                 </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <h3><i class="mdi mdi-library-plus"></i>Tambah Data Peminjaman</h3>
                    <a href="/admin/peminjaman">
                      <button type="button" class="btn btn-inverse-info btn-rounded btn-sm"><i class="ti-arrow-left mr-1"></i>Back</button>
                    </a>
                  </div>
                  <hr>
                  <form class="forms-sample" action="/admin/peminjaman/create" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <div class="col-md-6 mb-4">
                      <label for="exampleInputUsername1">Nama Buku</label>
                      <select class="form-control" name="id_buku" required>
                        <option value="">-- Pilih --</option>
                        @foreach($buku as $buku)
                          <option value="{{$buku->id}}">{{$buku->nama}}</option>
                        @endforeach
                      </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-6 mb-4">
                      <label for="exampleInputUsername1">Nama Siswa</label>
                      <select class="form-control" name="id_siswa" required>
                        <option value="">-- Pilih --</option>
                        @foreach($siswa as $data)
                          <option value="{{$data->nis}}">{{$data->nama}}</option>
                        @endforeach
                      </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-6 mb-4">
                          <label for="exampleInputUsername1">Tanggal Pinjam</label>
                          <input type="date" required class="form-control" name="tgl_pinjam" placeholder="">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-6 mb-4">
                          <label for="exampleInputUsername1">Tanggal Kembali</label>
                          <input type="date" required class="form-control" name="tgl_kembali" placeholder="">
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-1 mr-2"><i class="mdi mdi-content-save-all"></i> Tambah Data</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- content-wrapper ends -->
@endsection
