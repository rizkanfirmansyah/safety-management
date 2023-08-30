<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
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
                    <i class="uil uil-estate"></i>
                    <a class="text">List Safety Patrol!</a>
                </div>
                <form action="" method="get">
                    <div class="tanggal">
                        <select class="form-select" name="month" aria-label="Default select example">
                            @foreach ($months as $key => $month)
                                @if (isset($_GET['month']))
                                    <option value="{{ $key }}" {{ $key == $_GET['month'] ? 'selected' : '' }}>
                                        {{ $month }}</option>
                                @else
                                    <option value="{{ $key }}" {{ date('m') == $key ? 'selected' : '' }}>
                                        {{ $month }}</option>
                                @endif
                            @endforeach
                        </select>
                        <select class="form-select" aria-label="Default select example" name="year">
                            @foreach ($years as $key => $year)
                                @if (isset($_GET['year']))
                                    <option value="{{ $key }}" {{ $_GET['year'] == $key ? 'selected' : '' }}>
                                        {{ $year }}</option>
                                @else
                                    <option value="{{ $key }}" {{ date('Y') == $key ? 'selected' : '' }}>
                                        {{ $year }}</option>
                                @endif
                            @endforeach
                        </select>
                        <button type="submmit" class="btn btn-danger">
                            <i class="uil uil-filter"></i>
                            Filter
                        </button>
                    </div>
                </form>
            </div>
            <div class="activity">
                <div class="table-responsive">
                    <div class="table-atas">
                        <p>Details</p>
                        <div class="searchbar">
                            <input type="text" placeholder="Search" class="search">
                            <button type="button" class="btn btn-primary add" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                +ADD
                            </button>
                            <form method="post" action="{{ route('dashboard.store') }}" enctype="multipart/form-data">
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @csrf
                                                {{-- <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Category</label>
                                                    <select class="form-select" name="classification" id="">
                                                        <option value="" selected>--Choose Category--</option>
                                                        <option value="1">Aircraft Maintenance</option> 
                                                        <option value="2">Aurcraft Component / Interior Maintenance
                                                        </option>
                                                        <option value="3">Dismanting</option>
                                                        <option value="4">Minor / Major Repair</option>
                                                        <option value="5">Ground Run</option>
                                                        <option value="6">Functional Test</option>
                                                        <option value="7">Aircraft Modification</option>
                                                    </select>
                                                </div> --}}
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Date Of
                                                        Submission</label>
                                                    <fieldset disabled>
                                                        <input type="text" id="" name="date_of_submission"
                                                            class="form-control" value="{{ date('d-M-Y') }}">
                                                    </fieldset>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Date Of Hazard
                                                        Identification</label>
                                                    <input type="date" name="date_of_hazard_identification"
                                                        class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1"
                                                        class="form-label">Location</label>
                                                    <input type="text" name="location" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Type of
                                                        Operation</label>
                                                    <select class="form-select" name="type_operation" id="">
                                                        <option selected="">Choose Type</option>
                                                        <option value="1">Aircraft Maintenance</option>
                                                        <option value="2">Aurcraft Component / Interior
                                                            Maintenance
                                                        </option>
                                                        <option value="3">Dismanting</option>
                                                        <option value="4">Minor / Major Repair</option>
                                                        <option value="5">Ground Run</option>
                                                        <option value="6">Functional Test</option>
                                                        <option value="7">Aircraft Modification</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Hazard
                                                        Description</label>
                                                    <input type="text" name="description" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">File
                                                        Upload</label>
                                                    <input class="form-control" type="file" name="file">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                        @foreach ($safeties as $safety)
                            <form method="POST" action="{{ route('dashboard.update', $safety->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="modal fade" id="editModal{{ $safety->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">EDIT DATA
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{-- <div class="mb-3">
                                                    <label for="exampleInputEmail1"
                                                        class="form-label">Category</label>
                                                    <select class="form-select" name="classificaction"
                                                        id="">
                                                        <option value="">--Choose Category--</option>
                                                        @foreach ($options as $key => $item)
                                                            <option value="{{ $key }}"
                                                                {{ $safety->classification == $key ? 'selected' : '' }}>
                                                                {{ $item }}
                                                            </option>
                                                        @endforeach
                                                        <option value="1">Aircraft Maintenance</option>
                                                        <option value="2">Aurcraft Component / Interior
                                                            Maintenance</option>
                                                        <option value="3">Dismanting</option>
                                                        <option value="4">Minor / Major Repair</option>
                                                        <option value="5">Ground Run</option>
                                                        <option value="6">Functional Test</option>
                                                        <option value="7">Aircraft Modification</option>
                                                    </select>
                                                </div> --}}
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Date Of
                                                        Submission</label>
                                                    <fieldset disabled>
                                                        <input type="date" id="disabledTextInput"
                                                            class="form-control" value="{{$safety->date_of_submission}}">
                                                    </fieldset>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Date Of
                                                        Hazard
                                                        Identification</label>
                                                    <input type="date" name="date_of_hazard_identification"
                                                        value="{{ $safety->date_of_hazard_identification }}"
                                                        class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1"
                                                        class="form-label">Location</label>
                                                    <input type="text" name="location"
                                                        value="{{ $safety->location }}" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Type of
                                                        Operation</label>
                                                    <select class="form-select" name="type_operation" id="">
                                                        <option>Choose Type</option>
                                                        @foreach ($options as $key => $item)
                                                            <option value="{{ $key }}"
                                                                {{ $safety->type_operation == $key ? 'selected' : '' }}>
                                                                {{ $item }}
                                                            </option>
                                                        @endforeach
                                                        <option value="1">Aircraft Maintenance</option>
                                                        <option value="2">Aurcraft Component / Interior
                                                            Maintenance
                                                        </option>
                                                        <option value="3">Dismanting</option>
                                                        <option value="4">Minor / Major Repair</option>
                                                        <option value="5">Ground Run</option>
                                                        <option value="6">Functional Test</option>
                                                        <option value="7">Aircraft Modification</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Hazard
                                                        Description</label>
                                                    <input type="text" value="{{ $safety->description }}"
                                                        name="description" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <fieldset disabled="disabled">
                                                        <label for="exampleInputPassword1"
                                                            class="form-label">Status</label>
                                                        <select name="status" class="form-select" id="">
                                                            <option name="">{{ $safety->status }}</option>
                                                            {{-- <option value="open">open</option> --}}
                                                        </select>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
                <div class="table-section">
                    <table>
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Classification</th>
                                <th>Date of Submission</th>
                                <th style="width: 140px;">Date of Hazard Identification</th>
                                <th>Location</th>
                                <th>Type Operation</th>
                                <th>Description</th>
                                <th>File Reporter</th>
                                <th>File Response</th>
                                <th>Status</th>
                                @foreach ($safeties as $safety)
                                    @if ($safety->status == 'reject')
                                        <th>Action</th>
                                        @break
                                    @endif
                                @endforeach
                            </tr>
                        </thead>
                        @foreach ($safeties as $safety)
                            <div class="modal fade" id="showFileReporter{{ $safety->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">FILE REPORTER
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ $safety->file_reporter }}" class="img-fluid">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" data-bs-dismiss="modal"
                                                class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @foreach ($safeties as $safety)
                            <div class="modal fade" id="showFileResponse{{ $safety->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">FILE RESPONSE
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ $safety->file_response }}" class="img-fluid">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" data-bs-dismiss="modal"
                                                class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <tbody>
                            @foreach ($safeties as $safety)
                                <tr>
                                    <td>{{ $safety->number }}</td>
                                    {{-- <td>{{ $safety->classification }}</td> --}}
                                    <td>K3</td>
                                    <td>{{ $safety->date_of_submission }}</td>
                                    <td>{{ $safety->date_of_hazard_identification }}</td>
                                    <td>{{ $safety->location }}</td>
                                    <td>
                                        @foreach ($options as $key => $item)
                                        {{$safety->type_operation == $key ? $item  : '' }}
                                        @endforeach
                                    </td>
                                    <td>{{ $safety->description }}</td>
                                    @if ($safety->file_reporter == true)
                                        <td data-bs-toggle="modal"
                                            data-bs-target="#showFileReporter{{ $safety->id }}">
                                            <form action="/download/{{ $safety->file_reporter }}" method="post">
                                                @csrf
                                                <button type="button">
                                                    <i class="uil uil-file-info-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    @else
                                    <td>Tidak ada</td>
                                    @endif
                                    @if ($safety->file_response == true)
                                        <td data-bs-toggle="modal"
                                            data-bs-target="#showFileResponse{{ $safety->id }}">
                                            <form action="/download/{{ $safety->file_response }}" method="post">
                                                @csrf
                                                <button type="button">
                                                    <i class="uil uil-file-info-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    @else
                                    <td>Tidak ada</td>
                                    @endif
                                    <td>{{$safety->status}}</td>
                                    @if ($safety->status == 'reject')
                                        <td class="flex flex-col">
                                            <button type="button" class="btn btn-icon btn-sm btn-warning"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $safety->id }}">
                                                <i class="uil uil-edit edit"></i>
                                            </button>
                                            <form action="{{ route('dashboard.destroy', $safety->id) }}"
                                                method="POST" class="p-0 m-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-icon btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this user?')">
                                                    <i class="uil uil-trash-alt delete"></i>
                                                </button>
                                            </form>
                                        </td>
                                    @endif
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