@extends('admin.layouts.app', [
    'activePage' => 'siswa',
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
                  <h6 class="font-weight-normal mb-0">Data Siswa</h6>
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
                    <h3><i class="mdi mdi-view-list"></i> List Data Siswa</h3>
                    <a href="/admin/siswa/add">
                      <button type="button" class="btn btn-inverse-info btn-rounded btn-sm"><i class="mdi mdi-library-plus mr-1"></i> Tambah Data</button>
                    </a>
                  </div>
                  <hr>
                  @if (session('error'))
                  <div class="alert alert-danger">
                    {{ session('error')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
                  @if (session('success'))
                  <div class="alert alert-success">
                    {{ session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
                  <div class="table-responsive">
                    <table id="example1" class="display expandable-table" style="width:100%">
                      <thead class="bg-primary" style="color: white">
                        <tr>
                          <th>#</th>
                          <th>Id</th>
                          <th>NIS</th>
                          <th>Nama Lengkap</th>
                          <th>Jenis Kelamin</th>
                          <th>Contact</th>
                          <th>Alamat</th>
                          <th>Foto</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; ?>
                        @foreach($siswa as $data)
                        <tr class="odd selected">
                          <td>{{$no++}}</td>
                          <td>{{$data->id}}</td>
                          <td>{{$data->nis}}</td>
                          <td>{{$data->nama}}</td>
                          <td>{{$data->jekel}}</td>
                          <td>{{$data->contact}}</td>
                          <td>{{$data->alamat}}</td>

                          <td><a href="{{url('images/siswa')}}/{{$data->foto}}" target="_blank" class="btn btn-info btn-sm"><i class="ti-image"></i> Lihat Foto</a></td>
                          <td class="text-center">
                            <a href="/admin/siswa/edit/{{$data->id}}"><button class="btn btn-inverse-success btn-sm"><i class="ti-pencil"> Edit</i></button></a>
                            <button class="btn btn-inverse-danger btn-sm" data-toggle="modal" data-target="#data-{{$data->id}}"><i class="ti-trash"> Delete</i></button>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- Modal -->
        @foreach($siswa as $data)
        <div class="modal fade" id="data-{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <h2 class="text-center">Apakah Anda Yakin Menghapus Data Ini ?<h2><hr>
                <div class="form-group">
                  <label for="exampleInputUsername1">Nis</label>
                  <label class="form-control">{{$data->nis}}</label>
                </div>
                <div class="form-group">
                  <label for="exampleInputUsername1">Nama Lengkap</label>
                  <label class="form-control">{{$data->nama}}</label>
                </div>
                <div class="row mt-1">
                  <div class="col-md-6">
                    <a href="/admin/siswa/delete/{{$data->id}}" style="text-decoration: none;">
                      <button type="button" class="btn btn-inverse-info btn-block">Ya</button>
                    </a>
                  </div>
                  <div class="col-md-6">
                    <button type="button" class="btn btn-inverse-danger btn-block" data-dismiss="modal" aria-label="Close">Tidak</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
@endsection
