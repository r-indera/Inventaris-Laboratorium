@extends ('layouts/main')

@section('title', 'Inventory')
@section('container')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <a href="{{ url('/inventory') }}" class="btn btn-primary "><i class="fas fa-arrow-circle-left">Kembali</i></a>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
        <h1>Detail Peralatan</h1>
        </ol>
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            @if ($inventory->status == 'Ready')
            <form action="{{ url('/inventory/'.$inventory->id.'/delete') }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button type="submit" class="btn btn-danger far fa-trash-alt" onclick="return confirm('Yakin Data Peralatan Dihapus?')"> Delete</button>
            </form>
            @elseif ($inventory->status == 'Dipinjam')
            <form class="d-inline">
              <a onclick="return confirm('Peralatan Inventaris Sedang Dipinjam')" href="{{ url('/inventory/'.$inventory->id.'/show') }}" class="badge badge-info">Dipinjam</a>
            </form>
              @elseif ($inventory->status == 'Perbaikan')
              <form action="{{ url('/inventory/'.$inventory->id.'/delete') }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Data Peralatan Dihapus?')">Delete</button>
            </form>
              @endif
          </li>
        </ol>
      </div>
    </div>
  </div>
</section>
<!-- Main content -->
<div class="wrapper">
  <section class="content">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <h4 class="profile-username text-center"><b>Merk Alat</b></h4>
                <h3 class="profile-username text-center">{{$inventory->device->merk}}</h3>
                <li class="list-group-item">
                 <div class="text-center">
                  <img src="{{ asset('images/devices/'.$inventory->device->device_foto) }}" width="200px" class="img-responsive" alt="User profile picture">
                </div>
                  
                </li>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Keterangan</a></li>
                  <li class="nav-item"><a class="nav-link" href="#borrow" data-toggle="tab">Peminjaman</a></li>
                  <li class="nav-item"><a class="nav-link" href="#update" data-toggle="tab">Edit Inventaris</a></li>
                  @if (session('status'))
                  <div class="alert alert-success">
                    {{session('status')}}        
                  </div>
                  @endif
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <!-- /.tab-pane -->
                  <div class="tab-pane active" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                    <!-- card info -->
                    <div class="card card-primary">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Posisi Alat </strong>
                        <p class="text">{{ $inventory->place->name }}</p>
                        <hr>
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Category Alat </strong>
                        <p class="text">{{ $inventory->category->name }}</p>
                        <hr>
                        <strong><i class="fas fa-book mr-1"></i> Kode Register </strong>
                        <p class="text">{{ $inventory->kode }}</p>
                        <hr>
                        <strong><i class="fas fa-book mr-1"></i> Detail Spesifikasi </strong>
                        <p class="text">{{ $inventory->device->specification }}</p>
                        <hr>
                        <strong><i class="fas fa-book mr-1"></i> Status </strong>
                        <p class="text">{{ $inventory->status }}</p>
                        <hr>
                        <strong><i class="fas fa-book mr-1"></i> Bulan-Tahun Pengadaan </strong>
                        <!-- <p class="text">{{ $inventory->thn_pengadaan }}</p>                          -->
                        <p class="text">{{ Carbon\Carbon::parse ($inventory->device->thn_pengadaan)->format('M-Y') }}</p>                         

                      </div>
                      <!-- /.card-body -->
                    </div>

                    <!-- end card info -->
                    </div>

                  </div>
                  <!-- /.tab-pane -->
                  <!-- /.tab borrow -->
                   <div class="tab-pane" id="borrow">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                    <!-- table borrow -->
                    <h5>History Peminjaman Alat</h5>
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Keperluan</th>
                            <th>TglPinjam</th>
                            <th>TglKembali</th>
                            <th>TglDikembalikan</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php $no = 1; @endphp
                          @foreach($inventory->users as $user)
                          <tr>
                            <td>{{$no++}}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->pivot->keperluan }}</td>
                            <td>{{ $user->pivot->start_date }}</td>
                            <td>{{ $user->pivot->due_date }}</td>
                            <td>{{ $user->pivot->end_date }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- end table borrow -->
                    </div>
                    
                  </div>
                  <!-- end tab borrow -->

                  <div class="tab-pane" id="update">
                    <form class="form-horizontal" method="post" action="{{ url('/inventory/'.$inventory->id.'/update') }}">
                      @csrf
                      <div class="form-group row">
                        <label for="place_id" class="col-sm-2 col-form-label">Laboratorium</label>
                        <div class="col-sm-4">
                          <select id="place_id" name="place_id" type="text" class="form-control"required autocomplete="place_id" autofocus>
                            @foreach($places as $place)
                            <option value="{{$place->id}}" {{ $place->id == $inventory->place_id ? 'selected' : '' }}>{{ $place->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <label for="category_id" class="col-sm-2 col-form-label">Kategory**</label>
                        <div class="col-sm-4">
                          <li class="list-group-item">{{ $inventory->category->name }}</li>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="device_id" class="col-sm-2 col-form-label">Nama Perangkat**</label>
                        <div class="col-sm-4">
                          <li class="list-group-item">{{ $inventory->device->merk }}</li>
                        </div>
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-4">
                              <select id="status" type="text" name="status" class="form-control"required autocomplete="status" autofocus>
                                <option value="Ready" {{ $inventory->status == 'Ready' ? 'selected' : '' }}>Ready</option>
                                <option value="Dipinjam" {{ $inventory->status == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                                <option value="Perbaikan" {{ $inventory->status == 'Perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                              </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="kode" class="col-sm-2 col-form-label">Kode Register</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode register Alat" value="{{ $inventory->kode }}">
                        </div>
                        
                        <label for="device_id" class="col-sm-2 col-form-label">Tahun/bulan Pengadaan**</label>
                        <div class="col-sm-4">
                          <li class="list-group-item">{{ $inventory->device->thn_pengadaan }}</li>
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="device_id" class="col-sm-2 col-form-label">Spesifikasi**</label>
                        <div class="col-sm-10">
                          <li class="list-group-item">{{ $inventory->device->specification }}</li>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-outline-primary btn-xs">Update</button>
                        </div>
                      </div>
                    </form>
                    <p class="text-right">Ket : form <b>**</b> tidak bisa di edit</p>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection