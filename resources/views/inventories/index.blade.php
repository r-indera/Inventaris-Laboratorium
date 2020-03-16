@extends ('layouts/main')

@section('title', 'Inventories')
@section('container')
<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-12" align="center">
          <div class="col-10">
            <div class="card">
              <button type="button" class="btn gradient-primary btn-xs" data-toggle="modal" data-target="#exampleModal">
                Add Alat
              </button>
              <div class="card-header">
                <h3 class="card-title">Table Inventaris Laboratorium Jurusan Administasi Bisnis</h3>
                <br>
                <h3 class="card-title">Politeknik Negeri Banjarmasin</h3>
                <!-- /.card-header -->
                <br> 
                <hr>   
                <div class="card-tools ">
                  <div class="input-group input-group-sm" style="width: 960px;">
                    <form class="form-inline my-lg-0" method="get" action="{{url('/inventory')}}">
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
                        <a href="{{url('/inventory')}}" class="btn btn-secondary btn-sm">Reset</a>
                      </div>
                      <div class="input-group-append">
                       <a href="{{ url('/inventory/export') }}" class="btn btn-primary float-right btn-sm"><span><i class="fas fa-download"></span></i> Export Excel</a>
                     </div>
                   </form>
                 </div>
               </div>
             </div>
            {{ $inventories->appends(request()->except('pages'))->links() }}
             <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th></th>
                  <th>Merk/type</th>
                  <th>Category</th>
                  <th>Kode</th>
                  <th>Tempat</th>
                  <th>Status Alat</th>
                </tr>
              </thead>
              <tbody>
                @php $no = 1; @endphp
                @foreach($inventories as $inventory)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td><a href="{{ url('/inventory/'.$inventory->id.'/show') }}" class="badge badge-info fas fa-eye"> lihat</a></td>
                  <td>{{ $inventory->device->merk }}</td>
                  <td>{{ $inventory->category->name }}</td>
                  <td>{{ $inventory->kode }}</td>
                  <td>{{ $inventory->place->name }}</td>
                  <td>{{ $inventory->status }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $inventories->appends(request()->except('pages'))->links() }}
         <!--    {{ $inventories->links() }} -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer" align="center">
    Jumlah Inventaris yang tampil pada Laboraturium Jurusan Administrasi Bisnis <span>{{ $inventories->count() }}</span>
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Inventaris</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ url('/inventory/add') }}">
          @csrf
          <div class="form-group">
            <label for="place_id">Laboratorium</label>
            <div>
              <select id="place_id" name="place_id" type="text" class="form-control"required autocomplete="place_id" autofocus>
                @foreach($places as $place)
                <option value="{{$place->id}}">{{ $place->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
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
            <label for="device_id">Daftar Perangkat</label>
            <div>
              <select id="device_id" name="device_id" type="text" class="form-control"required autocomplete="device_id" autofocus>
                @foreach($devices as $device)
                <option value="{{$device->id}}">{{ $device->merk }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="kode">Kode Alat</label>
            <input type="text" name="kode" id="kode" class="form-control" placeholder="No Register Alat">
          </div>
          <div class="form-group">
            <label for="thn_pengadaan">Tahun Pengadaan</label>
            <input type="month" name="thn_pengadaan"  class="form-control" id="thn_pengadaan">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</section>
@endsection