@extends ('layouts/main')

@section('title', 'Struktur')
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
                <h3 class="card-title">Struktur Organsasi laboratorium Komputer</h3>
                <br>
                <h3 class="card-title">Jurusan Administasi Bisnis Politeknik Negeri Banjarmasin</h3>
                <br><br>
                <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-striped dataTable">
                  <thead class="table-primary">
                    <tr>
                      <div class="text-left">
                      <b>Struktur Organisasi Jurusan Administrasi Bisnis</b>
                      </div>
                    </tr>
                    <tr>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Foto</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Padli, S.SOS, MM <br> NIP. 19770607 200312 1 002</td>
                      <td>Ketua Jurusan</td>
                      <td class="text-center">
                         <img src="{{ asset('admin/dist/img/staff/padli.jpg') }}" width="75px">
                      </td>
                    </tr>
                    <tr>
                      <td>Mey Risa, S.Sos., M.M. <br> NIP. 19770521 200212 1 003</td>
                      <td>Sekretaris Jurusan</td>
                      <td class="text-center">
                         <img src="{{ asset('admin/dist/img/staff/mey_risa.jpg') }}" width="75px">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Novi Shintia, S.E., M.M. <br> NIP. 19771122 200501 2 002 </td>
                      <td>Kaprodi Administrasi Bisnis</td>
                      <td class="text-center">
                         <img src="{{ asset('admin/dist/img/staff/novie_shintia.jpg') }}" width="75px">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Abdul Rozaq, S.Kom., M.Kom.<br> NIP. 19830917 200501 1 002</td>
                      <td>Kaprodi Manajemen Informatika</td>
                      <td class="text-center">
                         <img src="{{ asset('admin/dist/img/staff/a_rozaq.jpg') }}" width="75px">
                      </td>
                    </tr>
                    <tr>
                      <td>Sri Imelda, S.Sos., M.M. <br> NIP. 19751126 200312 2 002 </td>
                      <td>Kapala Laboratorium <br> Perkantoran Modern</td>
                      <td class="text-center">
                         <img src="{{ asset('admin/dist/img/staff/sri_emelda.jpg') }}" width="75px">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Adi Pratomo, S.T., M.Kom.<br> NIP. 19750925 200912 1 002</td>
                      <td>Kapala Laboratorium <br> Komputer & Jaringan</td>
                      <td class="text-center">
                         <img src="{{ asset('admin/dist/img/staff/adi_pratomo.jpg') }}" width="75px">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        M. Teguh Nuryadin, SE., MM <br> NIP. 19840303 200801 1 006</td>
                      <td>Kapala Laboratorium <br> Pemasaran</td>
                      <td class="text-center">
                         <img src="{{ asset('admin/dist/img/staff/m_teguh.jpg') }}" width="75px">
                      </td>
                    </tr>
                  </tbody>
                </table>
                <table class="table table-bordered table-striped dataTable">
                  <thead class="table-primary">
                    <tr>
                      <div class="text-left">
                        <b>Laboratorium Perkantoran Modern</b>
                      </div>
                    </tr>
                    <tr>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Foto</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        EKO Sabar Prihatin, S.KOM <br> NIP. 198101012003121004</td>
                      <td>Tendik <br> Pranata Komputer Pertama</td>
                     <td class="text-center">
                         <img src="{{ asset('admin/dist/img/staff/eko_sabar.jpg') }}" width="75px">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Ida Midiyawati, SE
                        <br> NIP. 198010102002122001
                      </td>
                      <td>Tendik <br> Administrasi</td>
                      <td class="text-center">
                         <img src="{{ asset('admin/dist/img/staff/ida_midyawati.jpg') }}" width="75px">
                      </td>
                    </tr>
                  </tbody>
                </table>
                <table class="table table-bordered table-striped dataTable">
                  <thead class="table-primary">
                    <tr>
                      <div class="text-left">
                        <b>Laboratorium Komputer & Jaringan</b>
                      </div>
                    </tr>
                    <tr>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th class="text-center">Foto</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tajudin Noor, S. Kom <br> NIP. 197305112000031003</td>
                      <td>Tendik <br> Pranata Komputer Muda</td>
                      <td class="text-center">
                         <img src="{{ asset('admin/dist/img/staff/tajudin_noor.jpg') }}" width="75px">
                      </td>
                    </tr>
                    <tr>
                      <td>Rahma Indera, S. Kom <br> NIP. 198603042009121002</td>
                      <td>Tendik <br> Pranata Komputer Pertama</td>
                      <td class="text-center">
                         <img src="{{ asset('admin/dist/img/staff/r_indera.jpg') }}" width="75px">
                      </td>
                    </tr>
                  </tbody>
                </table>
                <table class="table table-bordered table-striped dataTable">
                  <thead class="table-primary">
                    <tr>
                      <div class="text-left">
                        <b>Laboratorium Pemasaran</b>
                      </div>
                    </tr>
                    <tr>
                      <th>Nama</th>
                      <th>Jabata</th>
                      <th>Foto</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.card -->
</section>
@endsection