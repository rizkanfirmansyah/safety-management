<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Otoritas User</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
    <link rel="stylesheet" href="/assets/css/users.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    @include('templates.nav')

    <section class="dashboard">
        @include('templates.profile')

        <div class="dash-content">
            <div class="overview">
                <div class="tittle">
                    <i class="uil uil-user"></i>
                    <a class="text">User Manager</a>
                </div>

                <div class="activity">
                    <div class="table-responsive">
                        <div class="table-atas">
                            <p>Users table</p>
                            <div class="">
                                <input type="text" placeholder="Search" class="search">
                                <button type="button" class="btn btn-primary add" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">+ADD</button>

                                <!-- Modal -->
                                <form method="POST" action="{{ route('users.store') }}">
                                    @csrf
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">TAMBAH USER</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-sm-2">NIK</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="username">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="inputPassword" class="col-sm-2">Nama</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id=""
                                                                name="fullname">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="inputPassword" class="col-sm-2">Password</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" class="form-control" id=""
                                                                name="password">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="inputPassword"
                                                            class="col-sm-2 col-form-label">Organisasi</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-select form-select-sm ms-2"
                                                                id="" name="organitation_id"
                                                                class="form-select">
                                                                <option value selected>--PILIH ORGANISASI
                                                                </option>
                                                                @foreach ($organitations as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="inputPassword"
                                                            class="col-sm-2 col-form-label">Roles</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-select form-select-sm ms-2"
                                                                name="role_id" id="">
                                                                <option value selected>--PILIH ROLES--
                                                                </option>
                                                                @foreach ($roles as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save
                                                        changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- MODAL END -->

                                <!-- Modal -->
                                @foreach ($users as $user)
                                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">EDIT USER
                                                        </h1>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3 row">
                                                            <label for="" class="col-sm-2">NIK</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control"
                                                                    name="username" value="{{ $user->username }}">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="inputPassword" class="col-sm-2">Nama</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control"
                                                                    name="fullname" value="{{ $user->fullname }}">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="inputPassword"
                                                                class="col-sm-2">Password</label>
                                                            <div class="col-sm-10">
                                                                <input type="password" class="form-control"
                                                                    name="password">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="inputPassword"
                                                                class="col-sm-2 col-form-label">Organisasi</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-select form-select-sm ms-2"
                                                                    name="organitation_id">
                                                                    <option value selected>--PILIH ORGANISASI--</option>
                                                                    @foreach ($organitations as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            {{ $user->organitation_id == $item->id ? 'selected' : '' }}>
                                                                            {{ $item->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="inputPassword"
                                                                class="col-sm-2 col-form-label">Roles</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-select form-select-sm ms-2"
                                                                    name="role_id">
                                                                    <option value selected>--PILIH ROLES--</option>
                                                                    @foreach ($roles as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            {{ $user->role_id == $item->id ? 'selected' : '' }}>
                                                                            {{ $item->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            Changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                                <!-- MODAL END -->

                            </div>
                        </div>

                        <div class="table-section">
                            <table>
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Organisasi</th>
                                        <th>Roles</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->fullname }}</td>
                                            <td>{{ $user->organitation->name }}</td>
                                            <td>
                                                <button class="roles">
                                                    {{ $user->role->name }}
                                                </button>
                                            </td>
                                            <td class="flex flex-col">
                                                <button type="button" class="btn btn-icon btn-sm btn-warning"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $user->id }}">
                                                    <i class="uil uil-edit edit"></i>
                                                </button>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                    class="p-0 m-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-icon btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this user?')">
                                                        <i class="uil uil-trash-alt delete"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>


                        </div>
                    </div>
                </div>
            </div>
    </section>
    <script src="{{asset('assets/js/script.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
