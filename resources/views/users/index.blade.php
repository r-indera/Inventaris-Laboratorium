@extends ('layouts/main')

@section('title', 'User')
@section('container')
<section class="content">

  <!-- Default box -->
   <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Table Pengguna Laboraturium</h3>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 500px;">
                      <form class="form-inline my-lg-0" method="get" action="{{url('/user')}}">
                        <div class="form-group">
                          <input name="cari" type="text" type="search" class="form-control mr-sm-2" placeholder="Search..." value="{{ request('cari') }}">
                        </div>
                          <select name="role" type="text" type="search" class="form-control mr-sm-2">
                            <option value="" {{ request('role') == '' ? 'selected' : '' }}>all</option>
                            <option value="staff" {{ request('role') == 'staff' ? 'selected' : '' }}>staff</option>
                            <option value="mahasiswa" {{ request('role') == 'mahasiswa' ? 'selected' : '' }}>mahasiswa</option>
                          </select>
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                        <div class="input-group-append">
                          <a href="{{url('/user')}}" class="btn btn-secondary">Reset</a>
                        </div>
                      </form>
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
                        <th>Nama</th>
                        <th>Sebagai</th>
                        <th>Email</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $no = 1; @endphp
                      @foreach($users as $user)
                      <tr>
                        <td>{{$no++}}</td>
                        <td>
                          <a href="{{ url('/user/'.$user->id.'/show') }}" class="badge badge-info">Profile</a>
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->email }}</td>
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
    @endsection