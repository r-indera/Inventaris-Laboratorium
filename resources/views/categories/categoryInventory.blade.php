  @extends ('layouts/main')

  @section('title', 'Invetory')
  @section('container')
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        @if (session('status'))
        <div class="alert alert-success">
          {{session('status')}}        
        </div>
        @endif
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title bold">Table Category Peralatan <b>{{$category->name}}</b> Inventaris dari <b>{{ $place->name }}</b></h3>
                <br>
                <h3 class="card-title">Jurusan Administasi Bisnis</h3>
                <br>
                <h3 class="card-title">Politeknik Negeri Banjarmasin</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                   <tr>
                    <th>No</th>
                    <th></th>
                    <th>Nama Peralatan</th>
                    <th>Kode</th>
                    <th>Status</th>            
                    <th>ThnPengadaan</th>            
                  </tr>
                </thead>
                <tbody>
                  @php $no = 1; @endphp
                  @foreach($inventories as $inventory)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                      @if(auth()->check())
                      @if(auth()->user()->role == 'admin')
                      <a href="{{ url('/inventory/'.$inventory->id.'/show') }}" class="badge badge-info">Lihat</a>
                      @endif
                      @endif
                    </td>
                    <td>{{ $inventory->device->merk }}</td>
                    <td>{{ $inventory->kode }}</td>
                    <td>{{ $inventory->status }}</td>
                    <td>{{ $inventory->thn_pengadaan }}</td>
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
  <!-- /.card -->
</section>
@endsection