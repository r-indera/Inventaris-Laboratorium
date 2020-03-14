@extends ('layouts/main')

@section('title', 'User')
@section('container')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-3">
          <a class="inner small-box bg-info" href="{{ url('/user/'.$user->id.'/inventory' ) }}"><b>Pinjam alat</b></a>
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
                <h4><b>Profile {{ $user->role }}</b></h4>
                <hr>
                <div class="text-center">
                  @if ($user->role == 'staff')
                  <img src="{{ asset('images/employees/'.$user->employee->image_employee) }}" class="profile-user-img img-fluid img-circle" alt="User profile picture">
                  @elseif($user->role == 'admin')
                  <img src="{{ asset('images/employees/'.$user->employee->image_employee) }}" class="profile-user-img img-fluid img-circle" alt="User profile picture">
                  @elseif($user->role == 'mahasiswa')
                  <img src="{{ asset('images/students/'.$user->student->image_student) }}" class="profile-user-img img-fluid img-circle" alt="User profile picture">
                  @endif
                </div>
                <h3 class="profile-username text-center">{{$user->name}}</h3>
                <li class="list-group-item">
                  <b>
                    @if ($user->role == 'staff')
                    NIP
                    @elseif($user->role == 'admin')
                    NIP Admin
                    @elseif($user->role == 'mahasiswa')
                    NIM
                    @endif
                  </b>
                  <br> 
                  <a class="float-center">
                    @if ($user->role == 'staff')
                    {{ $user->employee->nip }}
                    @elseif($user->role == 'admin')
                    {{ $user->employee->nip }}
                    @elseif($user->role == 'mahasiswa')
                    {{ $user->student->nim }}
                    @endif
                  </a>
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
                  <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Biodata</a></li>
                  <li class="nav-item"><a class="nav-link" href="#borrow" data-toggle="tab">Daftar Peminjaman</a></li>
                  <li class="nav-item"></li>
                  <li class="nav-item"><a class="nav-link" href="#update" data-toggle="tab">Edit Biodata</a></li>
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
                  <div class="active tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- card info -->

                      <div class="card card-primary">
                      <!-- <div class="card-header">
                        <h3 class="card-title">About Me</h3>
                      </div> -->
                      <!-- /.card-header -->
                      <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i> Email </strong>
                        <p class="text-muted">{{ $user->email }}</p>
                        <hr>
                        @if ($user->role == 'staff')
                        <strong><i class="fas fa-book mr-1"></i> Jabatan</strong>
                        <p class="text-muted">{{ $user->employee->jabatan }}</p>
                        <hr>
                        <strong><i class="fas fa-book mr-1"></i> No Telp/WA </strong>
                        <p class="text-muted">{{ $user->employee->no_telp }}</p>
                        <hr>
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                        <p class="text-muted">{{$user->employee->alamat}}</p>
                        @elseif($user->role == 'admin')
                        <strong><i class="fas fa-book mr-1"></i> Jabatan</strong>
                        <p class="text-muted">{{ $user->employee->jabatan }}</p>
                        <hr>
                        <strong><i class="fas fa-book mr-1"></i> No Telp/WA </strong>
                        <p class="text-muted">{{ $user->employee->no_telp }}</p>
                        <hr>
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                        <p class="text-muted">{{$user->employee->alamat}}</p>
                        @elseif($user->role == 'mahasiswa')
                        <strong><i class="fas fa-book mr-1"></i> No Telp/WA </strong>
                        <p class="text-muted">{{ $user->student->no_telp }}</p>
                        <hr>
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                        <p class="text-muted">{{$user->student->alamat}}</p>
                        @endif
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
                  <!-- table borrow -->
                  <div class="timeline timeline-inverse">
                    <div class="card-body table-responsive p-0">
                      <table class="table table-head-fixed" border="1">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Alat</th>
                            <th>Kode</th>
                            <th>Keperluan</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Cetak</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php $no = 1; @endphp
                          @foreach($user->inventories as $inventory)
                          <tr>
                            <td>{{$no++}}</td>
                            <td>{{ $inventory->device->merk }}</td>
                            <td>{{ $inventory->kode }}</td>
                            <td>{{ $inventory->pivot->keperluan }}</td>
                            <td>{{ $inventory->pivot->start_date }}</td>
                            <td>{{ $inventory->pivot->due_date }}</td>
                            <td>
                              <a href="{{ url('/borrow/'.$inventory->pivot->id.'/pdf') }}" class="badge badge-info">PDF</a>
                            </td>
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
                  <form class="form-horizontal" method="post" action="{{ url('/profile/'.$user->id.'/update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama" value="{{ $user->name }}">
                      </div>
                      @if ($user->role == 'staff')
                      <label for="image_employee" class="col-sm-2 col-form-label">Upload Foto</label>
                      <div class="col-sm-4">
                        <div class="input-group">
                          <div class="custom-file">
                            <input id="image_employee" type="file" class="form-control" name="image_employee">
                          </div>
                        </div>
                        @elseif($user->role == 'admin')
                        <label for="image_employee" class="col-sm-2 col-form-label">Upload Foto</label>
                      <div class="col-sm-4">
                        <div class="input-group">
                          <div class="custom-file">
                            <input id="image_employee" type="file" class="form-control" name="image_employee">
                          </div>
                        </div>
                        @elseif($user->role == 'mahasiswa')
                        <label for="image_student" class="col-sm-2 col-form-label">Upload Foto</label>
                        <div class="col-sm-4">
                          <div class="input-group">
                            <div class="custom-file">
                              <input id="image_student" type="file" class="form-control" name="image_student">
                            </div>
                          </div>
                          @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-4">
                          <input type="email" class="form-control" id="email" name="email" placeholder="Name" value="{{ $user->email }}">
                        </div>
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-4">
                              <input id="password" type="password" class="form-control" name="password" autocomplete="new-password">
                        </div>
                      </div>

                      @if ($user->role == 'staff')
                      <div class="form-group row">
                        <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP" value="{{ $user->employee->nip }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan Staff" value="{{ $user->employee->jabatan }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="no_telp" class="col-sm-2 col-form-label">No Telp/WA</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No Telp / WA" value="{{ $user->employee->no_telp }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <textarea type="text" name="alamat" id="alamat" class="form-control" rows="3" placeholder="Alamat Lengakap Staff">{{ $user->employee->alamat }}</textarea>
                        </div>
                      </div>
                      @elseif($user->role == 'admin')
                      <div class="form-group row">
                        <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP" value="{{ $user->employee->nip }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan Staff" value="{{ $user->employee->jabatan }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="no_telp" class="col-sm-2 col-form-label">No Telp/WA</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No Telp / WA" value="{{ $user->employee->no_telp }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <textarea type="text" name="alamat" id="alamat" class="form-control" rows="3" placeholder="Alamat Lengakap Staff">{{ $user->employee->alamat }}</textarea>
                        </div>
                      </div>
                      @elseif($user->role == 'mahasiswa')
                      <div class="form-group row">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nim" name="nim" placeholder="Nomor Induk Mahasiswa" value="{{ $user->student->nim }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="no_telp" class="col-sm-2 col-form-label">No Telp/WA</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No Telp / WA" value="{{ $user->student->no_telp }}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <textarea type="text" name="alamat" id="alamat" class="form-control" rows="3" placeholder="Alamat Lengakap Mahasiswa">{{ $user->student->alamat }}</textarea>
                        </div>
                      </div>
                      @endif
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-outline-primary btn-xs">Update</button>
                        </div>
                      </div>
                    </form>
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
  </section>
  @endsection