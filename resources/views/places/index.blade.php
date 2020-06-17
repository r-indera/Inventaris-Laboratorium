@extends ('layouts/main')

@section('title', 'Place')
@section('container')
<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-12" align="center">
          <div class="col-8">
            <div class="card">
              @if(auth()->check())
              @if(auth()->user()->role == 'admin')
              <button type="button" class="btn gradient-primary btn-xs" data-toggle="modal" data-target="#exampleModal">
                Add lab
              </button>
              @endif
              @endif
              <div class="card-header">
                <h3 class="card-title">Table Laboratorium Jurusan Administasi Bisnis</h3>
                <br>
                <h3 class="card-title"><b>Politeknik Negeri Banjarmasin</b></h3>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th></th>
                      <th>Tempat <br></th>
                      <th>Jumlah <br> Peralatan</th>
                      <th>Foto <br> Tempat</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no = 1; @endphp
                    @foreach($places as $place)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>
                        <a href="{{ url('/places/'.$place->id.'/show') }}">
                          <div class="small-box bg-info">
                            <div class="inner">
                              <h5>Lihat</h5>
                            </div>
                            <div class="icon">
                              <i class="fas fa-eye"></i>
                            </div>
                          </div>
                        </a>
                      </td>
                      <td>{{ $place->name }}</td>
                      <td>{{ $place->inventories->count() }}</td>
                      <td>
                        <img src="{{ asset('images/lab/'.$place->foto_lab) }}" width="100px" class="img-responsive" alt="image">
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer text-center">
      Jumlah Total Inventaris Laboraturium Jurusan Administrasi Bisnis <span>{{ $inventories->count() }}</span>
    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Laboraturium</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{ url('/places/add') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name">Nama Laboratorium</label>
              <input type="text" name="name"  class="form-control" id="name" placeholder="Nama Tempat Laboratorium">
            </div>
            <div class="form-group">
              <label for="ket">Keterangan</label>
              <textarea type="text" name="ket" id="ket" class="form-control" rows="3" placeholder="Keterangan Laboratorium"></textarea>
            </div>
            <div class="form-group">
              <label for="foto_lab">Upload Foto</label>
              <input id="foto_lab" type="file" class="form-control" name="foto_lab">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</section>
@endsection