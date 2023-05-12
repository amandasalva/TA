@extends('layout.main', ['title' => 'Tahun Pelajaran - Bendahara', 'foto_profil' => $data->image, 'active' => 'thn-pelajaran'])

@section('content')
  <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="mb-0">Tahun Pelajaran</h4>
          <div class="float-end">
            <a href="{{ route('bendahara.tambah.tahun.pelajaran') }}" class="btn btn-green"><i class='bx bx-list-plus'></i> Tambah Data</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive text-nowrap">
            <table class="table table-hover table-bordered table-striped" id="myTable">
              <thead style="background-color: #cff0d660">
                <tr>
                  <th style="text-align:center; font-weight:bold;">No</th>
                  <th style="text-align:center; font-weight:bold;">Tahun Pelajaran</th>
                  <th style="text-align:center; font-weight:bold;">Semester</th>
                  <th style="text-align:center; font-weight:bold;">Aksi</th>
                </tr>
              </thead>
              <tbody style="text-align: center">
                @php
                    $no = 1;
                @endphp
                @foreach ($tahun as $thn_ajaran)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $thn_ajaran->tahun }}</td>
                  <td>{{ $thn_ajaran->semester }}</td>
                  <td>
                    {{-- <form action="{{ route('bendahara.hapus.data', $thn_ajaran->id) }}" method="POST"> --}}
                    {{-- @csrf --}}
                    {{-- @method('DELETE') --}}
                    {{-- <button type="submit" style="padding: 7px; margin-right: 10px;" onclick="deleteUser(this)" data-id="{{ $thn_ajaran->id }}" class="btn btn-danger"><i class='bx bx-trash'></i></button> --}}
                    <a href="{{ route('bendahara.edit.tahun.pelajaran', $thn_ajaran->id) }}" class="btn btn-warning" type="button" style="padding: 7px"><i class='bx bxs-edit-alt'></i></a>
                  {{-- </form>  --}}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div> 
  </div>
  {{-- <script>
    function deleteUser(e){
      event.preventDefault();
      let id = e.getAttribute('data-id');
      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "User akan dihapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: '{{url("/bendahara/hapus/data")}}/' +id,
            type: 'DELETE',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
              if (response.success) {
                Swal.fire(
                  'Berhasil!',
                  response.message,
                  'success'
                ).then((result) => {
                  location.reload();
                });
              } else {
                Swal.fire(
                  'Gagal!',
                  response.message,
                  'error'
                );
              }
            },
            error: function(xhr, status, error) {
              console.log(xhr.responseText);
              Swal.fire(
                'Gagal!',
                'Terjadi kesalahan saat menghapus user.',
                'error'
              );
            }
          });
        }
      });
    }
  </script> --}}
@endsection
  
