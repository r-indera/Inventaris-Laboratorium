     <table border="0" style="border-collapse: collapse; width: 700px">
     	<tbody>
     		<tr>
     			<td style="width: 20%" align="center">
     				<img src="{{ asset('admin/dist/img/poliban.png') }}" width="60px">
     			</td>
     			<td style="width: 60%" align="center">
     				POLITEKNIK NEGERI BANJARMASIN<br>
     				JURUSAN ADMINISTARSI BISNIS <br>
     				Jl. Brigjen H. Hasan basri Komp.Unlam
     			</td>
     			<td style="width: 20%" align="center">
     				<img src="{{ asset('admin/dist/img/laboratorium.png') }}" width="60px">
     			</td>
     		</tr>
     	</tbody>
        <hr>
        <hr>
        </table>
        <br>
        <br>
        <table border="0" style="border-collapse: collapse; width: 700px">
        	<tbody>
        		<tr>
        			<th style="width: 100%" align="center"><h4>Permohonan Peminjaman Peralatan {{ $borrow->inventory->place->name }}</h4></th>
        		</tr>
        	</tbody>
        </table>
        <br>
        <br>
        <table border="0" style="border-collapse: collapse; width: 700px">
        	<tbody>
        		<tr>
        			<th style="width: 30%">Nama {{$borrow->user->role}}</th>
        			<td>: {{ $borrow->user->name }}</td>
        		</tr>
        		@if ($borrow->user->role == 'staff')
        		<tr>
        			<th style="width: 30%">NIP</th>
        			<td>: {{ $borrow->user->employee->nip }}</td>
        		</tr>
        		<tr>
        			<th style="width: 30%">Jabatan</th>
        			<td>: {{ $borrow->user->employee->jabatan }}</td>
        		</tr>
        		<tr>
        			<th style="width: 30%">No.Telp/Wa</th>
        			<td>: {{ $borrow->user->employee->no_telp }}</td>
        		</tr>
        		<tr>
        			<th style="width: 30%">Alamat</th>
        			<td>: {{ $borrow->user->employee->alamat }}</td>
        		</tr>
        		@elseif ($borrow->user->role == 'admin')
        		<tr>
        			<th style="width: 30%">NIP</th>
        			<td>: {{ $borrow->user->employee->nip }}</td>
        		</tr>
        		<tr>
        			<th style="width: 30%">Jabatan</th>
        			<td>: {{ $borrow->user->employee->jabatan }}</td>
        		</tr>
        		<tr>
        			<th style="width: 30%">No.Telp/Wa</th>
        			<td>: {{ $borrow->user->employee->no_telp }}</td>
        		</tr>
        		<tr>
        			<th style="width: 30%">Alamat</th>
        			<td>: {{ $borrow->user->employee->alamat }}</td>
        		</tr>
        		@elseif ($borrow->user->role == 'mahasiswa')
        		<tr>
        			<th style="width: 30%">NIM</th>
        			<td>: {{ $borrow->user->student->nim }}</td>
        		</tr>
        		<tr>
        			<th style="width: 30%">Email</th>
        			<td>: {{ $borrow->user->email }}</td>
        		</tr>
        		<tr>
        			<th style="width: 30%">No. Telp/Wa</th>
        			<td>: {{ $borrow->user->student->no_telp }}</td>
        		</tr>
        		<tr>
        			<th style="width: 30%">Alamat</th>
        			<td>: {{ $borrow->user->student->alamat }}</td>
        		</tr>
        		@endif
        	</tbody>
        </table>
        <br>
		<p>
			Pengajuan peminjaman Peralatan Laboratorium yang terhitung dari tanggal {{ Carbon\Carbon::parse($borrow->start_date)->format('d-M-Y') }} sampai dengan tanggal {{ Carbon\Carbon::parse($borrow->due_date)->format('d-M-Y') }} dengan alasan keperluan {{ $borrow->keperluan }}, Untuk detail alat tersebut dicantumkan sebagai berikut : 
		</p>
        <br>
        <table border="0" style="border-collapse: collapse; width: 700px">
          <tbody>
            <tr>
              <th style="width: 30%">Nama</th>
              <td>: {{ $borrow->inventory->category->name }}</td>
            </tr>
            <tr>
              <th style="width: 30%">Merk</th>
              <td>: {{ $borrow->inventory->device->merk }}</td>
            </tr>
            <tr>
              <th style="width: 30%">Kode</th>
              <td>: {{ $borrow->inventory->kode }}</td>
            </tr>
            <tr>
              <th style="width: 30%">Spesifikasi</th>
              <td>: {{ $borrow->inventory->specification }}</td>
            </tr>
          </tbody>
        </table>
        <p>
        	Demikian permohonan Peminaman ini saya buat untuk dapat dipertimbangkan sebagaimana mestinya.
        </p>

        <br>
        <table border="0" style="border-collapse: collapse; width: 700px">
        	<tbody>
        		<tr>
        			<td style="width: 60%">Menyetujui,</td>
        			<td>Banjarmasin, {{ Carbon\Carbon::parse($borrow->start_date)->format('d-M-Y') }}</td>
        		</tr>
        		<tr>
        			<td style="width: 60%">Kepala {{ $borrow->inventory->place->name }}</td>
        			<td>Yang meminjam,</td>
        		</tr>
        	</tbody>
        </table>
        <br> <br> <br>
        <table border="0" style="border-collapse: collapse; width: 700px">
        	<tbody>
        		<tr>
        			@if ($borrow->inventory->place->id == '1')	
        			<td style="width: 60%">
        				Adi Pratomo, S.T., M.Kom.
        			</td>
        			@elseif ($borrow->inventory->place->id == '2')	
        			<td style="width: 60%">
        				Adi Pratomo, S.T., M.Kom.
        			</td>
        			@elseif ($borrow->inventory->place->id == '3')	
        			<td style="width: 60%">
        				Adi Pratomo, S.T., M.Kom.
        			</td>
        			@elseif ($borrow->inventory->place->id == '4')	
        			<td style="width: 60%">
        				M. Teguh Nuryadin, SE., MM
        			</td>
        			@elseif ($borrow->inventory->place->id == '5')	
        			<td style="width: 60%">
        				Sri Imelda, S.Sos., M.M.
        			</td>
        			@endif
        			<td>{{ $borrow->user->name }}</td>
        		</tr>
        		<tr>
        			@if ($borrow->inventory->place->id == '1')	
        			<td style="width: 60%">
        				NIP. 19750925 200912 1 002
        			</td>
        			@elseif ($borrow->inventory->place->id == '2')	
        			<td style="width: 60%">
        				NIP. 19750925 200912 1 002
        			</td>
        			@elseif ($borrow->inventory->place->id == '3')	
        			<td style="width: 60%">
        				NIP. 19750925 200912 1 002
        			</td>
        			@elseif ($borrow->inventory->place->id == '4')	
        			<td style="width: 60%">
        				NIP. 19840303 200801 1 006
        			</td>
        			@elseif ($borrow->inventory->place->id == '5')	
        			<td style="width: 60%">
        				NIP. 19751126 200312 2 002
        			</td>
        			@endif
        			@if ($borrow->user->role == 'staff')
        			<td>
        				NIP. {{ $borrow->user->employee->nip }}      			
        			</td>
        			@elseif ($borrow->user->role == 'admin')
        			<td>
        				NIP. {{ $borrow->user->employee->nip }}      			
        			</td>
        			@elseif ($borrow->user->role == 'mahasiswa')
        			<td>
        				NIM. {{ $borrow->user->student->nim }}      			
        			</td>
        			@endif
        		</tr>
        	</tbody>
        </table>