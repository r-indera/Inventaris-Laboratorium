@extends ('layouts/main')

@section('title', 'Inventories')
@section('container')
<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-12" align="center">
          <div class="col-9">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Table Inventaris Laboratorium Jurusan Administasi Bisnis</h3>
                <br>
                <h3 class="card-title">Politeknik Negeri Banjarmasin</h3>
                <!-- /.card-header -->
                <br> 
                <hr>   
                <div class="card-tools ">
                  <div class="input-group input-group-sm" style="width: 880px;">
                    <form class="form-inline my-lg-0" method="get" action="{{url('/user/'.$user->id.'/inventory')}}">
                      <div class="form-group">
                        <input name="cari" type="text" type="search" class="form-control mr-sm-2" placeholder="Search..." value="{{ request('cari') }}">
                      </div>
                      <select name="category_id" type="text" type="search" class="form-control mr-sm-2">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                        <option value="" {{ request('category_id') == '' ? 'selected' : '' }}>all Category</option>
                      </select>
                      <select name="place_id" type="text" type="search" class="form-control mr-sm-2">
                        @foreach($places as $place)
                        <option value="{{$place->id}}" {{ request('place_id') == $place->id ? 'selected' : '' }}>
                          {{ $place->name }}</option>
                        @endforeach
                        <option value="" {{ request('place_id') == '' ? 'selected' : '' }}>all lab</option>
                      </select>
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default btn-sm"><i class="fas fa-search"></i></button>
                      </div>
                      <div class="input-group-append">
                        <a href="{{url('/user/'.$user->id.'/inventory')}}" class="btn btn-secondary btn-sm">Reset</a>
                      </div>
                   </form>
                 </div>
               </div>
             </div>
             <table class="table table-hover">
              <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>Status</th>
                  <th>Merk/type</th>
                  <th>Category</th>
                  <th>Kode</th>
                  <th>Tempat</th>
                </tr>
              </thead>
              <tbody>
                @foreach($inventories as $key => $inventory)
                <tr class="text-center">
                  <td>{{ $key + $inventories->firstItem() }}</td>
                  <td>
                    <div class="small-box bg-info">
                      <div class="inner">
                        @if ($inventory->status == 'Ready')
                          <a href="{{ url('/user/'.$user->id.'/inventory/'.$inventory->id) }}" class="badge badge-info">Dapat Dipinjam</a>
                        @elseif ($inventory->status == 'Dipinjam')
                            <a onclick="return confirm('Peralatan Inventaris Sudah Dipinjam')" href="{{ url('/user/'.$user->id.'/inventory') }}" class="badge badge-info">Sudah Dipinjam</a>
                        @elseif ($inventory->status == 'Perbaikan')
                            <a onclick="return confirm('Peralatan Inventaris Sedang Dalam Perbaikan')" href="{{ url('/user/'.$user->id.'/inventory') }}" class="badge badge-info">Perbaikan</a>
                        @endif
                      </div>
                    </div>
                  </td>
                  <td>{{ $inventory->device->merk }}</td>
                  <td>{{ $inventory->category->name }}</td>
                  <td>{{ $inventory->kode }}</td>
                  <td>{{ $inventory->place->name }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $inventories->appends(request()->except('pages'))->links() }}
            <!-- {{ $inventories->links() }} -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer" align="center">
    Jumlah Total Inventaris Laboraturium Jurusan Administrasi Bisnis <span>{{ $inventories->count() }}</span>
  </div>
  <!-- /.card-footer-->
</section>
@endsection