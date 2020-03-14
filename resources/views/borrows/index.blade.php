@extends ('layouts/main')

@section('title', 'Peminjaman')
@section('container')
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      Data Peminjaman Inventaris Laboratorium
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Table Peminjaman user </h3>
            </div>
            <!-- /.card-header -->

            <!-- Main content -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th></th>
                    <th>Nama</th>
                    <th>role</th>
                    <th>Merk Alat</th>
                    <th>Inventaris</th>
                    <th>Tgl_Pinjam</th>
                    <th>Tgl_Kembali</th>
                    <th>TglDikembalikan</th>
                    <th>Selisih</th>
                    <th>Status</th>
                    <th>SK</th>
                  </tr>
                </thead>
                <tbody>
                  @php $no = 1; @endphp
                  @foreach($borrows as $borrow)
                  <td>{{$no++}}</td>
                    <td>
                      <a href="{{ url('/borrow/'.$borrow->id.'/edit') }}" class="btn btn-block bg-gradient-info btn-xs">Edit</a>
                    </td>
                    <td>
                      <a href="{{ url('/user/'.$borrow->user_id.'/show') }}">{{ $borrow->user->name }}</a>
                    </td>
                    <td>{{ $borrow->user->role }}</td>
                    <td>
                      <a href="{{ url('/inventory/'.$borrow->inventory_id.'/show') }}">{{ $borrow->inventory->device->merk }}</a>
                    </td>
                    <td>
                     <a href="{{ url('/places/'.$borrow->inventory->place_id.'/show') }}">{{ $borrow->inventory->place->name }}</a>
                    </td>
                    <td>{{ $borrow->start_date }}</td>
                    <td>{{ $borrow->due_date }}</td>
                    <td>{{ $borrow->end_date}}</td>
                    <td></td>
                    <td>{{ $borrow->inventory->status }}</td>
                    <td>
                      <img src="{{ asset('images/sk/'.$borrow->sk_file) }}" width="30px" class="img-responsive" alt="image">
                    </td>
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
  </section>
  @endsection