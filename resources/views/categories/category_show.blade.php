@extends ('layouts/main')

@section('title', 'ShowCategory')
@section('container')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Daftar Perangkat Peralatan Per Category</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#" class="btn btn-block btn-outline-info btn-xs">home</a></li>
          <li class="breadcrumb-item">
            <form action="#" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-xs">Delete</button>
            </form>
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
                <h3 class="profile-username text-center"><b> Edit <br> {{$category->name}}</b></h3>
              </div>
              <hr>
              <div class="card-body box-profile">
                <form method="post" action="{{ url('/category/'.$category->id.'/update') }}" enctype="multipart/form-data">
                  @csrf
                  <label for="ket">Keterangan</label>
                  <textarea type="text" name="ket" id="ket" class="form-control" rows="3" placeholder="Keterangan">{{ $category->ket }}</textarea>

                    <label for="foto_alat">Edit Category</label>
                    <input id="foto_alat" type="file" class="form-control" name="foto_alat">
                  <button type="submit" class="btn btn-primary btn-xs">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card-body -->
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
                  <li class="nav-item"><a class="nav-link" href="#borrow" data-toggle="tab">Penempatan</a></li>
                  <!-- <li class="nav-item"><a class="nav-link" href="#update" data-toggle="tab">Edit Alat</a></li> -->
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
                      <!-- /.card-header -->
                      <div class="card-body">
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> <h3>{{ $category->name }}</h3></strong> <br>
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Keterangan Cetegory </strong>
                        <p class="text">{{ $category->ket }}</p>
                        <hr>
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Foto </strong>
                        <li class="list-group-item">
                         <div class="text-center">
                          <img src="{{ asset('images/lab/'.$category->foto_alat) }}" width="200px" class="img-responsive" alt="User profile picture">
                        </div>
                      </li>
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
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th></th>
                            <th>Penempatan</th>
                            <th>Jumlah</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php $no = 1; @endphp
                          @foreach($places as $place)
                          <tr>
                            <td>{{$no++}}</td>
                            <td><a href="{{ url('/places/'.$place->id.'/category/'.$category->id) }}" class="badge badge-info">Lihat</a></td>
                            <td>{{ $place->name }}</td>
                            <td>{{ $place->inventories()->where('category_id', $category->id)->count() }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- end table borrow -->
                    </div>
                    
                  </div>
                  <!-- end tab borrow -->
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