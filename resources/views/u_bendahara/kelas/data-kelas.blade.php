@extends('layout.main', ['title' => 'Data Kelas - Bendahara', 'active' => 'data-kelas'])

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Data Kelas</h4>
                    <div class="float-end">
                        <button data-bs-toggle="modal" data-bs-target="#modal-kelas" class="btn btn-green"><i
                                class='bx bx-list-plus'></i> Tambah Kelas</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover table-bordered" id="classTable">
                            <thead style="background-color: #f5f1f3">
                                <tr style="text-align:center;">
                                    <th>No</th>
                                    <th>Kelas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($kelas as $class)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $class->tingkat }}</td>
                                @endforeach
                                {{-- @foreach ($kelas as $no => $class)
    <tr style="text-align: center">
        <td>{{ $no + 1 }}</td>
        <td>{{ $class->tingkat }}</td>
    </tr>
@endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal fade" id="modal-kelas" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel3">Tambah Data Kelas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('bendahara.tambah.kelas') }}" method="POST">
                                    @csrf
                                    <div class="row g-2 mb-2">
                                        <div class="col mb-0">
                                            <label for="tingkat" class="form-label">Kelas</label>
                                            <input type="text" id="tingkat" name="tingkat" class="form-control"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap justify-content-end">
                                        <button data-bs-dismiss="modal" class="btn btn-danger m-1">Batal</button>
                                        <button class="btn btn-purple m-1" type="submit" name="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
