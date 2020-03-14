@extends ('layouts/main')

@section('title', 'inventory')
@section('container')
<section class="content">

  <!-- Default box -->
  <div class="card">  
    <div class="card-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Table Inventaris Dari <b>{{$place->name}}</b> Dengan Category <b>{{ $category->name }}</b></h3>
              <br>
              <h3 class="card-title">Jurusan Administasi Bisnis Politeknik Negeri Banjarmasin</h3>

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
                    <th></th>
                    <th>Nama Peralatan</th>
                    <th>Category</th>
                    <th>Kode</th>
                    <th>Status</th>            
                  </tr>
                </thead>
                <tbody>
                  @php $no = 1; @endphp
                  @foreach($inventories as $inventory)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                      <a href="{{ url('/inventory/'.$inventory->id.'/show') }}" class="badge badge-info">Lihat</a>
                    </td>
                    <td>{{ $inventory->device->merk }}</td>
                    <td>{{ $inventory->category->name }}</td>
                    <td>{{ $inventory->kode }}</td>
                    <td>{{ $inventory->status }}</td>
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
  </section>
  @endsection