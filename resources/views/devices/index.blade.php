@extends ('layouts/main')

@section('title', 'Perangkat')
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
              Add Perangkat
            </button>

            <div class="card-header">
              <h2 class="card-title"><b>Table Perangkat Peralatan Inventaris</b></h2><br>
              <h2 class="card-title">Laboratorium Jurusan Administasi Bisnis</h2><br>
              <h3 class="card-title">Politeknik Negeri Banjarmasin</h3>
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Merk</th>
                    <th>Spesifikasi Alat</th>
                    <th>Jumlah</th>
                    <th>Gambar Perangkat</th>
                  </tr>
                </thead>
                <tbody>
                  @php $no = 1; @endphp
                  @foreach($devices as $device)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $device->merk }}</td>
                    <td>{{ $device->specification }}</td>
                    <td>{{ $device->inventories->count() }}</td>
                    <td>
                      <img src="{{ asset('images/devices/'.$device->device_foto) }}" width="100px" class="img-responsive" alt="image">
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
        <h3 class="modal-title" id="exampleModalLabel">Tambah Perangkat</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ url('/device/add') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="category_id">Kategory Peralatan</label>
            <div>
              <select id="category_id" name="category_id" type="text" class="form-control"required autocomplete="category_id" autofocus>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="merk">Merk Peralatan</label>
            <input type="text" name="merk"  class="form-control" id="merk" placeholder="Merk Alat">
          </div>
          <div class="form-group">
            <label for="specification">Detail Spesifikasi Alat</label>
            <textarea type="text" name="specification" id="specification" class="form-control" rows="3" placeholder="Keterangan Spesifikasi Peralatan"></textarea>
          </div>
          <div class="form-group">
            <label for="device_foto">Upload Gambar Perangkat</label>
            <input id="device_foto" type="file" class="form-control" name="device_foto">
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