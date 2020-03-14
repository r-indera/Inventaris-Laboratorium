@extends ('layouts/main')

@section('title', 'Inventory')
@section('container')

<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-12" align="center">
          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <table border="0" style="border-collapse: collapse; width: 600px">
                  <tbody>
                    <tr>
                      <td>
                        <h3 class="card-title">Nama {{ $user->role }}</b></h3><br>
                      </td>
                      <td>
                        <h3 class="card-title">: <b>{{$user->name }}</b></h3><br>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h3 class="card-title">Untuk Peminjaman Alat</b></h3><br>
                      </td>
                      <td>
                        <h3 class="card-title">: <b>{{$inventory->device->merk }}</b></h3><br>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h3 class="card-title">Kode ID Alat</b></h3><br>
                      </td>
                      <td>
                        <h3 class="card-title">: <b>{{$inventory->kode }}</b></h3><br>
                      </td>
                    </tr>  
                  </tbody>
                </table>
                <h3 class="card-title">Laboratorium {{$inventory->place->name }} Jurusan Administasi Bisnis</h3><br>
                <h3 class="card-title">Politeknik Negeri Banjarmasin</h3>
                <!-- /.card-header -->
                <br> 
                <hr>
                <h2>Form Peminjaman</h2>
              </div>
                <div class="card-tools ">
                  <div class="input-group input-group-sm" style="width: 200px;">

                    <form method="post" action="{{ url('/user/'.$user->id.'/inventory/'.$inventory->id.'/addborrow') }}">
                      @csrf
                      <div class="form-group">
                        <label for="keperluan">Alasan Peminjaman</label>
                        <div class="col-sm-12">
                          <textarea type="text" name="keperluan" id="keperluan" class="form-control" rows="3" placeholder="Alasan Peminjaman"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="start_date">Tanggal Pinjam</label>
                        <input type="date" name="start_date"  class="form-control" id="start_date">
                      </div>
                      <div class="form-group">
                        <label for="due_date">Tanggal Kembali</label>
                        <input type="date" name="due_date"  class="form-control" id="due_date">
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>   
                  </div>
                </div>
                  <!-- <button type="button" class="btn btn-secondary"><a href="{{ url('/user/'.$user->id.'/inventory') }}"></a>Kembali</button> -->
            </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer" align="center">
    Jumlah Inventaris yang tampil pada Laboraturium Jurusan Administrasi Bisnis
  </div>
  <!-- /.card-footer-->
</section>


@endsection