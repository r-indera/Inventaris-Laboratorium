@extends ('layouts/main')

@section('title', 'Place')
@section('container')
<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-12" align="center">
          <div class="col-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> Informasi Tentang Inventaris Alat Laboratorium </h3>
                <h3 class="card-title"> Untuk Menunjang Praktik Dalam Pembelajaran Perkuliahan Mahasiswa </h3>
                <br>
                <h1 class="card-title"><b>Jurusan Administasi Bisnis Politeknik Negeri Banjarmasin</b></h1>
                <br><br>
                <!-- /.card-header -->
              <div class="card-body table-responsive p-0 text-center">
                <!-- Small boxes (Stat box) -->
                {{ $categories->links() }}                
                @foreach($categories as $category)
                <h3 class="text-center">{{ $category->name }}</h3>
                <div class="row">
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box">
                      <div class="inner">
                        <img src="{{ asset('images/lab/'.$category->foto_alat) }}" width="120px" class="img-responsive" alt="image">
                      </div>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3>{{ $category->inventories()->where('status','Ready')->count() }}<sup style="font-size: 30px"></sup></h3>

                        <p><b>Ready</b></p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-thumbs-up"></i>
                      </div>
                      <a href="{{ url('/inventaris/'.$category->id.'/ready') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3>{{ $category->inventories()->where('status','Dipinjam')->count() }}</h3>

                        <p><b>Dipinjam</b></p>
                      </div>
                      <div class="icon">
                        <i class="fab fa-algolia"></i>
                      </div>
                      <a href="{{ url('/inventaris/'.$category->id.'/borrow') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3>{{ $category->inventories()->where('status','Perbaikan')->count() }}</h3>

                        <p><b>Perbaikan</b></p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-tools"></i>
                      </div>
                      <a href="{{ url('/inventaris/'.$category->id.'/repair') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                </div>
                @endforeach
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
              {{ $categories->links() }}
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer text-center">
      Jumlah Total Inventaris Laboraturium Jurusan Administrasi Bisnis <span></span>
    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->
</section>
@endsection