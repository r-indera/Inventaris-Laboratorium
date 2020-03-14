@extends ('layouts/main')

@section('title', 'EditPinjam')
@section('container')
<!-- Main content -->
<section class="content">
  <!-- Default box -->
   <div class="card">
    <div class="card-header">
        Peminjaman Inventaris Laboratorium
      <br>
      <form action="{{ url('/borrow/'.$borrow->id.'/delete') }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn bg-gradient-danger btn-xs">Delete Peminjaman</button>
      </form>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
                
             <form method="post" action="{{ url('/borrow/'.$borrow->id.'/update') }}" enctype="multipart/form-data">
              <!-- @method('put') -->
              @csrf
              <div class="form-group" style="width: 24rem;">
                <label for="status">Satus Alat</label>
                <div>
                  <select id="status" type="text" name="status" class="form-control"required autocomplete="status" autofocus>
                    <option value="Ready" {{ $borrow->inventory->status == 'Ready' ? 'selected' : '' }}>Ready</option>
                    <option value="Dipinjam" {{ $borrow->inventory->status == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="Perbaikan" {{ $borrow->inventory->status == 'Perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                  </select>
                </div>
              </div>
              <div class="form-group" style="width: 24rem;">
                <label for="sk_file">SK</label>
                <input id="sk_file" type="file" class="form-control" name="sk_file">
              </div>
              <div class="form-group" style="width: 24rem;">
                <label for="end_date">Tanggal Pengembalian</label>
                <input type="date" class="form-control" id="end_date" placeholder="ID" name="end_date" value="{{ $borrow->end_date }}">
              </div>
              <button type="submit" class="btn btn-primary">Update</button>

              <a href="{{url('/pinjam')}}" class="btn btn-primary">Kembali</a>
            </form>
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
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data Staff</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" action="{{ url('/borrow/'.$borrow->id.'/update') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="status">Jenis Invantaris</label>
                  <div class="col-sm-4">
                    <select id="status" type="text" name="status" class="form-control"required autocomplete="status" autofocus>
                      <option value="Ready" {{ $borrow->inventory->status == 'Ready' ? 'selected' : '' }}>Ready</option>
                      <option value="Dipinjam" {{ $borrow->inventory->status == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                      <option value="Perbaikan" {{ $borrow->inventory->status == 'Perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="ket">Keterangan</label>
                  <textarea type="text" name="ket" id="ket" class="form-control" rows="3" placeholder="Keterangan Jenis Peralatan"></textarea>
                </div>
                <div class="form-group">
                  <label for="foto_alat">Upload Gambar</label>
                  <input id="foto_alat" type="file" class="form-control" name="foto_alat">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
</section>
@endsection