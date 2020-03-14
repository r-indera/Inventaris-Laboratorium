@extends ('layouts/main')

@section('title', 'Dashboard')
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
                <table border="0" style="border-collapse: collapse; width: 750px">
                  <tbody>
                    <tr>
                      <td style="width: 50%">
                        <h3 class="card-title">Profile Jurusan Administrasi Bisnis</h3>
                        <br>
                        <h3 class="card-title">Jurusan Administasi Bisnis Politeknik Negeri Banjarmasin</h3><br>
                      </td>
                      <td class="text-center">
                          <img src="{{ asset('admin/dist/img/staff/jurusan.jpg') }}" width="250px">
                      </td>
                    </tr>
                  </tbody>
                </table>
                <h3 class="text-left"> VISI & MISI </h3> <hr>
                <h4>VISI</h4>
                <p align="justify">Menjadikan institusi pendidikan yang dapat mendidik dan menciptakan tenaga kerja profesional berbasiskan ilmu pengetahuan dan teknologi dalam bidang Administrasi Bisnis yang memiliki iman dan taqwa kepada Tuhan yang Maha Esa</p>
                <h4>MISI</h4>
                <p><ol class="text-left">
                  <li>Mengembangkan sumber daya civitas akademik sesuai dengan perkembangan ilmu pengetahuan dan teknologi</li>
                  <li>Melakukan kerjasama saling menguntungkan dengan sektor industri dalam berbagai macam bidang</li>
                  <li>Menciptakan suasana akademik yang harmonis di lingkungan Jurusan Administrasi Bisnis</li>
                  <li>Meningkatkan Manajemen Program</li>
                </ol></p>
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