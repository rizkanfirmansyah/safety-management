<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
    <link rel="stylesheet" href="/assets/css/users.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="../img/dirgantara.png" style="filter: brightness(1) grayscale(1) invert();" alt="" />
            </div>
            <span class="logo_name">SAFETY <a href="" class="warna">MANAGEMENT</a> </span>
        </div>
        <div class="menu-items">
            <ul class="nav-link">
                <li>
                    <a href="dashboard.php">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="safety.php">
                        <i class="uil uil-file-edit-alt logo"></i>
                        <span class="link-name">Def Safety</span>
                    </a>
                </li>
                <li>
                    <a href="users.php">
                        <i class="uil uil-user"></i>
                        <span class="link-name">Otoritas User</span>
                    </a>
                </li>
            </ul>

            <ul class="logout-mod">
                <li>
                    <a href="../../index.php">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout!</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <div class="petugas">
                <i class="uil uil-user"></i>
                <span>Annisa Fitria</span>
            </div>
        </div>
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="tittle">
                    <i class="uil uil-user"></i>
                    <a class="text">User Manager</a>
                </div>

                <div class="activity">
                    <div class="table-responsive">
                        <div class="table-atas">
                            <p>Users</p>
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
                                    <td>01234</td>
                                    <td>Annisa Fitria</td>
                                    <td>TU44 - Mhs. Magang</td>
                                    <td>
                                        <button class="roles">
                                            Response Function
                                        </button>
                                    </td>
                                    <td>
                                        <button>
                                            <i class="uil uil-edit edit"></i>
                                        </button>
                                        <button>
                                            <i class="uil uil-trash-alt delete"></i>
                                        </button>
                                    </td>
                                </tbody>

                                <tbody>
                                    <td>01234</td>
                                    <td>Annisa Fitria</td>
                                    <td>TU44 - Mhs. Magang</td>
                                    <td>
                                        <button class="roles">
                                            Response Function
                                        </button>
                                    </td>
                                    <td>
                                        <button>
                                            <i class="uil uil-edit"></i>
                                        </button>
                                        <button>
                                            <i class="uil uil-trash-alt"></i>
                                        </button>
                                    </td>
                                </tbody>

                                <tbody>
                                    <td>01234</td>
                                    <td>Annisa Fitria</td>
                                    <td>TU44 - Mhs. Magang</td>
                                    <td>
                                        <button class="roles">
                                            Dept.Safety
                                        </button>
                                        <button class="roles">
                                            Response Function
                                        </button>
                                        <button class="roles">
                                            <Dept class="Safety"></Dept>
                                        </button>
                                    </td>
                                    <td>
                                        <button>
                                            <i class="uil uil-edit"></i>
                                        </button>
                                        <button>
                                            <i class="uil uil-trash-alt"></i>
                                        </button>
                                    </td>
                                </tbody>

                                <tbody>
                                    <td>01234</td>
                                    <td>Annisa Fitria</td>
                                    <td>TU44 - Mhs. Magang</td>
                                    <td>
                                        <button class="roles">
                                            <Dept class="Safety"></Dept>
                                        </button>
                                    </td>
                                    <td>
                                        <button>
                                            <i class="uil uil-edit"></i>
                                        </button>
                                        <button>
                                            <i class="uil uil-trash-alt"></i>
                                        </button>
                                    </td>
                                </tbody>

                            </table>


                        </div>
                    </div>
                </div>
            </div>
    </section>

    <script src="../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
