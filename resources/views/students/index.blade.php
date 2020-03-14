@extends ('layouts/main')

@section('title', 'Mahasiswa')
@section('container')
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <button type="button" class="btn bg-gradient-primary btn-xs" data-toggle="modal" data-target="#exampleModal">
        Add Siswa
      </button>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Daftar table Mahasiswa</h3>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Email</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $no = 1; @endphp
                      @foreach($students as $student)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td><a href="{{ url('/user/'.$student->user_id.'/show') }}">{{ $student->name }}</a></td>
                        <td>{{ $student->nim }}</td>
                        <td>{{ $student->email }}</td>
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
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" action="{{ url('/mahasiswa/add') }}">
                @csrf
                <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" name="name"  class="form-control" id="name" placeholder="Nama Mahasiswa/i">
                </div>
                <div class="form-group">
                  <label for="nim">Nomor Induk Mahasiswa(NIM)</label>
                  <input type="text" name="nim"  class="form-control" id="nim" placeholder="Nomor Induk Mahasiswa">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email"  class="form-control" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="no_telp">Nomor Telp</label>
                  <input type="text" name="no_telp"  class="form-control" id="no_telp" placeholder="No Telp/WA">
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea type="text" name="alamat" id="alamat" class="form-control" rows="3" placeholder="Alamat Rumah Mahasiswa/i"></textarea>
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