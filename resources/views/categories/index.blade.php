@extends ('layouts/main')

@section('title', 'Category')
@section('container')
<section class="content">

  <!-- Default box -->
  <div class="card">
   <div class="card-body">
    <div class="row">
      <div class="col-12" align="center">
        <div class="col-8">
          <div class="card">

            <button type="button" class="btn gradient-primary btn-xs" data-toggle="modal" data-target="#exampleModal">
              Add Category Peralatan
            </button>

            <div class="card-header">
              <h3 class="card-title">Table Category Inventaris Laboratorium Jurusan Administasi Bisnis</h3>
              <br>
              <h3 class="card-title">Politeknik Negeri Banjarmasin</h3>
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th></th>
                    <th>Nama Category</th>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                    <th>Gambar Alat</th>
                  </tr>
                </thead>
                <tbody>
                  @php $no = 1; @endphp
                  @foreach($categories as $category)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td><a href="{{ url('/category/'.$category->id.'/show') }}" class="badge badge-info">Lihat</a></td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->ket }}</td>
                    <td>{{ $category->inventories->count() }}</td>
                    <td>
                      <img src="{{ asset('images/lab/'.$category->foto_alat) }}" width="100px" class="img-responsive" alt="image">
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ url('/category/add') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name">Jenis Invantaris</label>
            <input type="text" name="name"  class="form-control" id="name" placeholder="Nama Jenis Peralatan">
          </div>
          <div class="form-group">
            <label for="ket">Keterangan</label>
            <textarea type="text" name="ket" id="ket" class="form-control" rows="3" placeholder="Keterangan Jenis Peralatan"></textarea>
          </div>
          <div class="form-group">
            <label for="foto_alat">Upload Gambar</label>
            <input id="foto_alat" type="file" class="form-control" name="foto_alat">
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