@extends ('layouts/main')

@section('title', 'ShowLab')
@section('container')
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="card card-solid">
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-sm-6">
          @if (session('status'))
          <div class="alert alert-success">
            {{session('status')}}        
          </div>
          @endif
          <h3 class="d-inline-block d-sm-none">{{$place->name}}</h3>
          <div class="col-12">
            <img src="{{ asset('images/lab/'.$place->foto_lab) }}" class="product-image" alt="Product Image">
          </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{{$place->name}}</h3>
              <hr>
              <h4 class="mt-3">Struktur Organisasi</h4>
              <hr>

              <table border="1" style="border-collapse: collapse; width: 650px">
                <thead>
                  <tr>
                    <th>Jabatan</th>
                    <th>Nama & NIP</th>
                    <th class="text-center">Foto</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    @if ($place->id == '1')
                    <td>
                      Kepala Laboratorium
                    </td>  
                    <td style="width: 30%">
                      Adi Pratomo, S.T., M.Kom. <br>  NIP. 19750925 200912 1 002
                    </td>
                    <td style="width: 40%" class="text-center" >
                      <img src="{{ asset('admin/dist/img/staff/adi_pratomo.jpg') }}" width="75px">
                    </td>
                    @elseif ($place->id == '2')  
                    <td style="width: 40%">
                      Adi Pratomo, S.T., M.Kom.
                    </td>
                    <td style="width: 40%">
                      Adi Pratomo, S.T., M.Kom. <br>  NIP. 19750925 200912 1 002
                    </td>
                    <td style="width: 40%" class="text-center">
                      <img src="{{ asset('admin/dist/img/staff/adi_pratomo.jpg') }}" width="75px">
                    </td>
                    @elseif ($place->id == '3')  
                    <td style="width: 40%">
                      Adi Pratomo, S.T., M.Kom.
                    </td>
                    <td style="width: 40%">
                      Adi Pratomo, S.T., M.Kom. <br>  NIP. 19750925 200912 1 002
                    </td>
                    <td style="width: 40%" class="text-center">
                      <img src="{{ asset('admin/dist/img/staff/adi_pratomo.jpg') }}" width="75px">
                    </td>
                    @elseif ($place->id == '4')  
                    <td style="width: 40%">
                      Kepala laboratorium
                    </td>
                    <td style="width: 40%">
                      M. Teguh Nuryadin, SE., MM. <br>  NIP. 19840303 200801 1 006
                    </td>
                    <td style="width: 40%"class="text-center">
                      <img src="{{ asset('admin/dist/img/staff/m_teguh.jpg') }}" width="75px">
                    </td>
                    @elseif ($place->id == '5')  
                    <td style="width: 40%">
                      Kepala Laboratorium
                    </td>
                    <td style="width: 40%">
                      Sri Imelda, S.Sos., M.M. <br>  NIP. 19751126 200312 2 002
                    </td>
                    <td style="width: 40%" class="text-center">
                      <img src="{{ asset('admin/dist/img/staff/sri_emelda.jpg') }}" width="75px">
                    </td>
                    @endif
                  </tr>
                  <tr>
                    @if ($place->id == '1')  
                    <td style="width: 40%">
                      Pranata Komputer Muda
                    </td>
                    <td style="width: 40%">
                      Tajudin Noor, S. Kom <br>  NIP. 197305112000031003
                    </td>
                    <td style="width: 40%" class="text-center">
                      <img src="{{ asset('admin/dist/img/staff/tajudin_noor.jpg') }}" width="75px">
                    </td>
                    @elseif ($place->id == '2')  
                    <td style="width: 40%">
                      Pranata Komputer Muda
                    </td>
                    <td style="width: 40%">
                      Tajudin Noor, S. Kom <br>  NIP. 197305112000031003
                    </td>
                    <td style="width: 40%" class="text-center">
                      <img src="{{ asset('admin/dist/img/staff/tajudin_noor.jpg') }}" width="75px">
                    </td>
                    @elseif ($place->id == '3')  
                    <td style="width: 40%">
                      Pranata Komputer Muda
                    </td>
                    <td style="width: 40%">
                      Tajudin Noor, S. Kom <br>  NIP. 197305112000031003
                    </td>
                    <td style="width: 40%" class="text-center">
                      <img src="{{ asset('admin/dist/img/staff/tajudin_noor.jpg') }}" width="75px">
                    </td>
                    @elseif ($place->id == '4')  
                    <td style="width: 40%">
                      -
                    </td>
                    <td style="width: 40%">
                      -
                    </td>
                    <td style="width: 40%">
                      -
                    </td>
                    @elseif ($place->id == '5')  
                    <td style="width: 40%">
                      Pranata Komputer Pertama
                    </td>
                    <td style="width: 40%">
                      Eko Sabar Prihatin, S.KOM <br>  NIP. 198101012003121004
                    </td>
                    <td style="width: 40%" class="text-center">
                      <img src="{{ asset('admin/dist/img/staff/eko_sabar.jpg') }}" width="75px">
                    </td>
                    @endif
                  </tr>
                  <tr>
                    @if ($place->id == '1')  
                    <td style="width: 40%">
                      Pranata Komputer Pertama
                    </td>
                    <td style="width: 40%">
                      Rahma Indera, S. Kom <br>  NIP. 198603042009121002
                    </td>
                    <td style="width: 40%" class="text-center">
                      <img src="{{ asset('admin/dist/img/staff/r_indera.jpg') }}" width="75px">
                    </td>
                    @elseif ($place->id == '2')  
                    <td style="width: 40%">
                      Pranata Komputer Pertama
                    </td>
                    <td style="width: 40%">
                      Rahma Indera, S. Kom <br>  NIP. 198603042009121002
                    </td>
                    <td style="width: 40%" class="text-center">
                      <img src="{{ asset('admin/dist/img/staff/r_indera.jpg') }}" width="75px">
                    </td>
                    @elseif ($place->id == '3')  
                    <td style="width: 40%">
                      Pranata Komputer Pertama
                    </td>
                    <td style="width: 40%">
                      Rahma Indera, S. Kom <br>  NIP. 198603042009121002
                    </td>
                    <td style="width: 40%" class="text-center">
                      <img src="{{ asset('admin/dist/img/staff/r_indera.jpg') }}" width="75px">
                    </td>
                    @elseif ($place->id == '4')  
                    <td style="width: 40%">
                      -
                    </td>
                    <td style="width: 40%">
                      -
                    </td>
                    <td style="width: 40%">
                      -
                    </td>
                    @elseif ($place->id == '5')  
                    <td style="width: 40%">
                      Tendik Administrasi
                    </td>
                    <td style="width: 40%">
                      Ida Midiyawati, SE <br>  NIP. 198010102002122001
                    </td>
                    <td style="width: 40%" class="text-center">
                      <img src="{{ asset('admin/dist/img/staff/ida_midyawati.jpg') }}" width="75px">
                    </td>
                    @endif
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                <a class="nav-item nav-link" id="category-tab" data-toggle="tab" href="#category" role="tab" aria-controls="category" aria-selected="true">Kategory Peralatan Inventory</a>
                @if(auth()->check())
                @if(auth()->user()->role == 'admin')
                  <a class="nav-item nav-link" id="edit-admin-tab" data-toggle="tab" href="#edit-admin" role="tab" aria-controls="edit-admin" aria-selected="false">Edit Laboratorium</a>
                @endif
                @endif
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                {{ $place->ket }}

              <hr>
              <h4 class="mt-3">Kegiatan</h4>
              <ol>
                <li>
                  Persiapan dan pelaksanaan praktikum pemrograman komputer yang sesuai dengan kurikulum serta silabus mata kuliah pemrograman komputer.
                </li>
                <li>
                  Tempat uji Kompentasi
                </li>
              </ol>
              <hr>

              </div>
              <div class="tab-pane fade" id="category" role="tabpanel" aria-labelledby="category-tab">

                <div class="card-body table-responsive p-0" align="center">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th></th>
                        <th>Penempatan</th>
                        <th>Status Ready</th>
                        <th>Status Dipinjam</th>
                        <th>Status Perbaikan</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $no = 1; @endphp
                      @foreach($categories as $category)
                      <tr>
                        <td>{{$no++}}</td>
                        <td><a href="{{ url('/category/'.$category->id.'/places/'.$place->id) }}" class="badge badge-info">Lihat</a></td>
                        <td>{{ $category->name }}</td>
                        <td class="text-center">{{ $category->inventories()->where('place_id', $place->id)->where('status', 'Ready')->count() }}</td>
                        <td class="text-center">{{ $category->inventories()->where('place_id', $place->id)->where('status', 'Dipinjam')->count() }}</td>
                        <td class="text-center">{{ $category->inventories()->where('place_id', $place->id)->where('status', 'Perbaikan')->count() }}</td>
                        <td class="text-center"><b>{{ $category->inventories()->where('place_id', $place->id)->count() }}</b></td>
                        <td>{{$category->ket}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="edit-admin" role="tabpanel" aria-labelledby="edit-admin-tab"> 
                <form method="post" action="{{ url('/places/'.$place->id.'/update') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="ket">Edit / Tambah Keterangan</label><hr>
                    <textarea type="text" name="ket" id="ket" class="form-control" rows="12" placeholder="Keterangan Laboratorium">{{ $place->ket }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="foto_lab">Ubah Foto Laboratorium {{ $place->name }}</label>
                    <input id="foto_lab" type="file" class="form-control" name="foto_lab">
                  </div>
                  <div class="tab-pane-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection