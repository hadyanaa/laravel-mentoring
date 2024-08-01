<div class="row">
    <!-- Kelompok -->
    <div class="col mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Kelompok (Total)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @if (count($kelompok) > 0)
                                {{count($kelompok)}}
                            @else
                                0
                            @endif
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mentor -->
    <div class="col mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Mentor (Total)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @if (count($mentor) > 0)
                                {{count($mentor)}}
                            @else
                                0
                            @endif
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mentee -->
    <div class="col mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Mentee (Total)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @if (count($mentee) > 0)
                                {{count($mentee)}}
                            @else
                                0
                            @endif
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Presensi -->
    <div class="col mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Presensi (Total)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @if (count($presensi) > 0)
                                {{count($presensi)}}
                            @else
                                0
                            @endif
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-pen-square fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
    <div class="col mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Berita (Total)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            @if (count($berita) > 0)
                                {{count($berita)}}
                            @else
                                0
                            @endif
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <!-- Card Header -->
    <div
        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
        <a href="/admin/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>
    <!-- Card Body -->
    <div class="card-body table-responsive">
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($admin as $key=>$item)
                <tr>
                <td>{{$key + 1}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>
                    <a href="/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-eye"></i> 
                    </a>
                    <form action="/" method="POST" class="d-none d-sm-inline-block">
                        <!-- @csrf
                        @method('delete') -->
                        <button type="submit" class="btn btn-sm btn-danger shadow-sm show_confirm">
                            <i class="fas fa-trash"></i> 
                        </button>
                    </form>
                </td>
                </tr>
                @empty
                <tr>
                <td>No data</td>
                <td>No data</td>
                <td>No data</td>
                <td>No data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>