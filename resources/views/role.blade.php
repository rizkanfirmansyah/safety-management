<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Roles</title>
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
                    <a class="text">Role Manager</a>
                </div>

                <div class="activity">
                    <div class="table-responsive">
                        <div class="table-atas">
                            <p>roles</p>
                            <div class="">
                                <input type="text" placeholder="Search" class="search">
                                <button type="button" class="btn btn-primary add" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">+ADD</button>

                                <!-- Modal -->
                                <form method="POST" action="{{ route('roles.store') }}">
                                    @csrf
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">TAMBAH role</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3 row">
                                                        <label for="inputPassword" class="col-sm-2">Nama Role</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id=""
                                                                name="name">
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
                                @foreach ($roles as $role)
                                    <form method="POST" action="{{ route('roles.update', $role->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal fade" id="editModal{{ $role->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">EDIT role
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3 row">
                                                            <label for="inputPassword" class="col-sm-2">Nama
                                                                Role</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control"
                                                                    name="name" value="{{ $role->name }}">
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
                                        <th>Roles</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $role->name }}</td>
                                            <td class="flex flex-col">
                                                @if ($role->id !== 1)
                                                    <button type="button" class="btn btn-icon btn-sm btn-warning"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $role->id }}">
                                                        <i class="uil uil-edit edit"></i>
                                                    </button>
                                                    <form action="{{ route('roles.destroy', $role->id) }}"
                                                        method="POST" class="p-0 m-0">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-icon btn-sm btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete this role?')">
                                                            <i class="uil uil-trash-alt delete"></i>
                                                        </button>
                                                    </form>
                                                @endif
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
