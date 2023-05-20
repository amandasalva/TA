@extends('layout.main', ['title' => 'Data Guru - Bendahara', 'active' => 'data-guru'])

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Data Guru</h4>
                    <div class="float-end">
                        <a href="{{ route('bendahara.tambah.guru') }}" class="btn btn-green"><i class='bx bx-list-plus'></i>
                            Tambah Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover table-bordered" id="mytable" style="width:100%">
                            <thead style="background-color: #cff0d660">
                                <tr style="text-align:center;">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Nama Pengguna</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Foto</th>
                                    <th>Status</th>
                                    <th style="width: 16%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($guru as $dtguru)
                                    <tr style="text-align: center">
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $dtguru->nama_lengkap }}</td>
                                        <td>{{ $dtguru->username }}</td>
                                        <td>{{ $dtguru->jk }}</td>
                                        {{-- <td>{{ \Carbon\Carbon::parse($dtguru->tgl_lahir)->locale('id')->translatedFormat('d-m-Y') }}</td> --}}
                                        <td>{{ $dtguru->alamat }}</td>
                                        <td>
                                            @if ($dtguru->image == null)
                                                <img src="{{ asset('images/user-default.jpg' . $dtguru->image) }}"
                                                    alt="Foto guru" class="w-px-40 h-auto rounded-circle" />
                                            @else
                                                <img src="{{ asset('storage/foto_profil/' . $dtguru->image) }}"
                                                    alt="Foto guru" class="w-px-40 h-auto rounded-circle" />
                                            @endif
                                        </td>
                                        <td>
                                            @if ($dtguru->status == 'Aktif')
                                                <span class="badge bg-label-info me-1">{{ $dtguru->status }}</span>
                                        </td>
                                    @else
                                        <span class="badge bg-label-danger me-1">{{ $dtguru->status }}</span></td>
                                @endif
                                <td>
                                    <form action="{{ route('bendahara.hapus.data', $dtguru->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                            data-bs-target="#modal-detail{{ $dtguru->id }}" style="padding: 7px"><i
                                                class='bx bxs-door-open'></i>
                                        </button>
                                        <a href="{{ route('bendahara.edit.guru', $dtguru->id) }}" class="btn btn-warning"
                                            type="button" style="padding: 7px"><i class='bx bxs-edit-alt'></i></a>
                                        <button type="submit" style="padding: 7px; margin-right: 10px;"
                                            onclick="deleteUser(this)" data-id="{{ $dtguru->id }}"
                                            class="btn btn-danger"><i class='bx bx-trash'></i></button>
                                    </form>
                                </td>
                                </tr>
                                <div class="modal fade" id="modal-detail{{ $dtguru->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel3">Detail Data Guru</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row g-2 mb-2">
                                                    <div class="col mb-0">
                                                        <label for="nama_lengkap" class="form-label">Nama</label>
                                                        <input type="text" id="nama_lengkap" class="form-control"
                                                            value="{{ $dtguru->nama_lengkap }}">
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="username" class="form-label">Username</label>
                                                        <input type="text" id="username" class="form-control"
                                                            value="{{ $dtguru->username }}">
                                                    </div>
                                                </div>
                                                <div class="row g-2 mb-2">
                                                    <div class="col mb-0">
                                                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                                        <input type="text" id="tempat_lahir" class="form-control"
                                                            value="{{ $dtguru->tempat_lahir }}">
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                                        <input type="text" id="tgl_lahir" class="form-control"
                                                            value="{{ \Carbon\Carbon::parse($dtguru->tgl_lahir)->locale('id')->translatedFormat('d/m/Y') }}">
                                                    </div>
                                                </div>
                                                <div class="row g-2 mb-2">
                                                    <div class="col mb-0">
                                                        <label for="jk" class="form-label">Jenis Kelamin</label>
                                                        <input type="text" id="jk" class="form-control"
                                                            value="{{ $dtguru->jk }}">
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="agama" class="form-label">Agama</label>
                                                        <input type="text" id="agama" class="form-control"
                                                            value="{{ $dtguru->agama }}">
                                                    </div>
                                                </div>
                                                <div class="row g-2 mb-2">
                                                    <div class="col mb-0">
                                                        <label for="no_hp" class="form-label">No hp</label>
                                                        <input type="text" id="no_hp" class="form-control"
                                                            value="{{ $dtguru->no_hp }}">
                                                    </div>
                                                    <div class="col mb-0">
                                                        <label for="status" class="form-label">Status</label>
                                                        <input type="text" id="status" class="form-control"
                                                            value="{{ $dtguru->status }}">
                                                    </div>

                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col mb-0">
                                                        <label for="alamat" class="form-label">Alamat</label>
                                                        <input type="text" id="alamat" class="form-control"
                                                            value="{{ $dtguru->alamat }}">
                                                    </div>
                                                </div>
                                                {{-- <div class="row">
                        <div class="col mb-0">
                          <label for="image" class="form-label">Foto</label>
                          <div class="ml-2">
                            @if ($dtguru->image == null)
                              <img src="{{ asset('storage/foto_profil/') }}" alt="Foto guru" class="w-px-100 h-auto rounded-circle" />
                            @else
                              <img src="{{ asset('images/' .$dtguru->image) }}" alt="Foto guru" class="w-px-100 h-auto rounded-circle" />                              
                            @endif  
                          </div>
                        </div>
                      </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- </div> --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteUser(e) {
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
                        url: '{{ url('/bendahara/hapus/data') }}/' + id,
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
    </script>
@endsection
