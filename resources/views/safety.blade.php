<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Deft Safety</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
    <link rel="stylesheet" href="{{asset('assets/css/safety.css')}}" />
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
                    <i class="uil uil-clipboard-alt"></i>
                    <a class="text">Safety Manager</a>
                </div>
                <div class="activity">
                    <div class="table-responsive">
                        <div class="table-atas">
                            <p>Safety Table</p>
                            <div class="">
                                @if(Session::has('errors'))
                                    <div class="alert alert-danger alert-dismissible show">
                                        {{ session('errors') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <button type="button" class="btn btn-success">
                                    Export Excel
                                </button>
                                {{-- @foreach ($safeties as $safety)
                                    <div class="modal fade" id="updateSafety{{ $safety->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <form method="POST" action="{{ route('safeties.update', $safety->id) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                      
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1"
                                                                    class="form-label">Category</label>
                                                                <fieldset disabled="disabled">
                                                                    <select class="form-select" name="classification"
                                                                        id="">
                                                                        <option value="">--Choose
                                                                            Category--
                                                                        </option>
                                                                        @foreach ($options as $key => $item)
                                                                            <option value="{{ $key }}"
                                                                                {{ $safety->classification == $key ? 'selected' : '' }}>
                                                                                {{ $item }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </fieldset>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputPassword1"
                                                                    class="form-label">Date
                                                                    Of
                                                                    Submission</label>
                                                                <fieldset disabled>
                                                                    <input type="text" id="disabledTextInput"
                                                                        class="form-control"
                                                                        placeholder="{{ date('d/m/Y') }}">
                                                                </fieldset>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputPassword1"
                                                                    class="form-label">Date
                                                                    Of
                                                                    Hazard Identification</label>
                                                                <fieldset disabled>
                                                                    <input type="text" class="form-control"
                                                                        id="disabledTextInput"
                                                                        value="{{ $safety->date_of_hazard_identification }}">
                                                                </fieldset>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputPassword1"
                                                                    class="form-label">Location</label>
                                                                <fieldset disabled="disabled">
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $safety->location }}">
                                                                </fieldset>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputPassword1"
                                                                    class="form-label">Type
                                                                    of
                                                                    Operation</label>
                                                                <fieldset disabled="disabled">
                                                                    <select class="form-select" name=""
                                                                        id="">
                                                                        <option>Choose Type</option>
                                                                        @foreach ($options as $key => $item)
                                                                            <option value="{{ $key }}"
                                                                                {{ $safety->type_operation == $key ? 'selected' : '' }}>
                                                                                {{ $item }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </fieldset>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputPassword1"
                                                                    class="form-label">Hazard
                                                                    Description</label>
                                                                <fieldset disabled="disabled">
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $safety->description }}">
                                                                </fieldset>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="formFile" class="form-label">File
                                                                    Upload</label>

                                                                <input class="form-control" name="file"
                                                                    type="file" id="formFile">

                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="formFile" class="form-label">Risk
                                                                    Probability</label>
                                                                <select class="form-select" name="risk_probability"
                                                                    id="">
                                                                    <option value="">-- Choose Risk
                                                                        Probability --
                                                                    </option>
                                                                    <option
                                                                        {{ $safety->risk_probability == 1 ? 'selected' : '' }}
                                                                        value="1">1</option>
                                                                    <option
                                                                        {{ $safety->risk_probability == 2 ? 'selected' : '' }}
                                                                        value="2">2</option>
                                                                    <option
                                                                        {{ $safety->risk_probability == 3 ? 'selected' : '' }}
                                                                        value="3">3</option>
                                                                    <option
                                                                        {{ $safety->risk_probability == 4 ? 'selected' : '' }}
                                                                        value="4">4</option>
                                                                    <option
                                                                        {{ $safety->risk_probability == 5 ? 'selected' : '' }}
                                                                        value="5">5</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="formFile" class="form-label">Risk
                                                                    Index</label>
                                                                <select class="form-select" name="risk_index"
                                                                    id="">
                                                                    <option value="">-- Choose Risk
                                                                        Index --
                                                                    </option>
                                                                    <option
                                                                        {{ $safety->risk_index == 'A' ? 'selected' : '' }}
                                                                        value="A">A</option>
                                                                    <option
                                                                        {{ $safety->risk_index == 'B' ? 'selected' : '' }}
                                                                        value="B">B</option>
                                                                    <option
                                                                        {{ $safety->risk_index == 'C' ? 'selected' : '' }}
                                                                        value="C">C</option>
                                                                    <option
                                                                        {{ $safety->risk_index == 'D' ? 'selected' : '' }}
                                                                        value="D">D</option>
                                                                    <option
                                                                        {{ $safety->risk_index == 'E' ? 'selected' : '' }}
                                                                        value="E">E</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputPassword1"
                                                                    class="form-label">Post
                                                                    Mitigation</label>
                                                                <input type="text" class="form-control"
                                                                    name="post_mitigation" id=""
                                                                    value="{{ $safety->post_mitigation }}">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="exampleInputPassword1"
                                                                    class="form-label">Status</label>

                                                                <select name="status" class="form-select"
                                                                    id="">
                                                                    <option> {{ $safety->status }}</option>
                                                                    <option value="close">Closed</option>
                                                                    <option value="reject">Reject</option>
                                                                </select>
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
                                        </form>
                                    </div>
                                </div>
                                @endforeach --}}
                            </div>
                            @foreach ($safeties as $safety)
                                <form method="POST" action="{{ route('safeties.update', $safety->id) }}"
                                    enctype="multipart/form-data">
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
                                                        <fieldset disabled="disabled">
                                                            <select class="form-select" name="classification"
                                                                id="">
                                                                <option value="">--Choose
                                                                    Category--
                                                                </option>
                                                                @foreach ($options as $key => $item)
                                                                    <option value="{{ $key }}"
                                                                        {{ $safety->classification == $key ? 'selected' : '' }}>
                                                                        {{ $item }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </fieldset>
                                                    </div> --}}
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1"
                                                            class="form-label">Date
                                                            Of
                                                            Submission</label>
                                                        <fieldset disabled>
                                                            <input type="text" id="disabledTextInput"
                                                                class="form-control"
                                                                placeholder="{{ date('d/m/Y') }}">
                                                        </fieldset>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1"
                                                            class="form-label">Date
                                                            Of
                                                            Hazard Identification</label>
                                                        <fieldset disabled>
                                                            <input type="text" class="form-control"
                                                                id="disabledTextInput"
                                                                value="{{ $safety->date_of_hazard_identification }}">
                                                        </fieldset>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1"
                                                            class="form-label">Location</label>
                                                        <fieldset disabled="disabled">
                                                            <input type="text" class="form-control"
                                                                value="{{ $safety->location }}">
                                                        </fieldset>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1"
                                                            class="form-label">Type
                                                            of
                                                            Operation</label>
                                                        <fieldset disabled="disabled">
                                                            <select class="form-select" name=""
                                                                id="">
                                                                <option>Choose Type</option>
                                                                @foreach ($options as $key => $item)
                                                                    <option value="{{ $key }}"
                                                                        {{ $safety->type_operation == $key ? 'selected' : '' }}>
                                                                        {{ $item }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1"
                                                            class="form-label">Hazard
                                                            Description</label>
                                                        <fieldset disabled="disabled">
                                                            <input type="text" class="form-control"
                                                                value="{{ $safety->description }}">
                                                        </fieldset>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">File
                                                            Upload</label>
                                            
                                                        <input class="form-control" name="file"
                                                            type="file" id="formFile">
                                            
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">Risk
                                                            Probability</label>
                                                        <select class="form-select" name="risk_probability"
                                                            id="">
                                                            <option value="">-- Choose Risk
                                                                Probability --
                                                            </option>
                                                            <option
                                                                {{ $safety->risk_probability == 1 ? 'selected' : '' }}
                                                                value="1">1</option>
                                                            <option
                                                                {{ $safety->risk_probability == 2 ? 'selected' : '' }}
                                                                value="2">2</option>
                                                            <option
                                                                {{ $safety->risk_probability == 3 ? 'selected' : '' }}
                                                                value="3">3</option>
                                                            <option
                                                                {{ $safety->risk_probability == 4 ? 'selected' : '' }}
                                                                value="4">4</option>
                                                            <option
                                                                {{ $safety->risk_probability == 5 ? 'selected' : '' }}
                                                                value="5">5</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">Risk
                                                            Index</label>
                                                        <select class="form-select" name="risk_index"
                                                            id="">
                                                            <option value="">-- Choose Risk
                                                                Index --
                                                            </option>
                                                            <option
                                                                {{ $safety->risk_index == 'A' ? 'selected' : '' }}
                                                                value="A">A</option>
                                                            <option
                                                                {{ $safety->risk_index == 'B' ? 'selected' : '' }}
                                                                value="B">B</option>
                                                            <option
                                                                {{ $safety->risk_index == 'C' ? 'selected' : '' }}
                                                                value="C">C</option>
                                                            <option
                                                                {{ $safety->risk_index == 'D' ? 'selected' : '' }}
                                                                value="D">D</option>
                                                            <option
                                                                {{ $safety->risk_index == 'E' ? 'selected' : '' }}
                                                                value="E">E</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1"
                                                            class="form-label">Post
                                                            Mitigation</label>
                                                        <input type="text" class="form-control"
                                                            name="post_mitigation" id=""
                                                            value="{{ $safety->post_mitigation }}">
                                                    </div>
                                            
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1"
                                                            class="form-label">Status</label>
                                            
                                                        <select name="status" class="form-select"
                                                            id="">
                                                            <option> {{ $safety->status }}</option>
                                                            <option value="open">Open</option>
                                                            <option value="close">Closed</option>
                                                            <option value="reject">Reject</option>
                                                        </select>
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
                            @endforeach
                        </div>
                        <div class="table-section">
                            <table>
                                <thead>
                                    <tr>
                                        <th style="width: 100px;">Number</th>
                                        <th style="width: 100px;">Reporter</th>
                                        <th style="width: 100px;">Classification</th>
                                        <th style="width: 90px;">Location</th>
                                        <th style="width: 120px;">Type Operation</th>
                                        <th style="width: 100px;">Date of Submission</th>
                                        <th style="width: 119px;">Date of Hazard Identification</th>
                                        <th style="width: 110px;">Description</th>
                                        <th style="width: 110px;">File Reporter</th>
                                        <th style="width: 110px;">Risk Probability</th>
                                        <th style="width: 110px;">Risk Severity</th>
                                        <th style="width: 110px;">Risk Index</th>
                                        <th style="width: 70px;">COP</th>
                                        <th style="width: 70px;">HM</th>
                                        <th style="width: 70px;">CO</th>
                                        <th style="width: 70px;">File Response</th>
                                        <th style="width: 70px;">Status</th>
                                        <th style="width: 70px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($safeties as $safety)
                                        @if ($safety->file_response == true)
                                            <tr>
                                                <td>
                                                    {{ $safety->number }}
                                                </td>
                                                <td>
                                                    {{ $safety->reporter }}
                                                </td>
                                                <td>K3</td>
                                                <td>
                                                    {{ $safety->location }}
                                                </td>
                                                <td>
                                                    @foreach ($options as $key => $item)
                                                    {{$safety->type_operation == $key ? $item  : '' }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    {{ $safety->date_of_submission }}
                                                </td>
                                                <td>
                                                    {{ $safety->date_of_hazard_identification }}
                                                </td>
                                                <td>
                                                    {{ $safety->description }}
                                                </td>
                                                    @if ($safety->file_reporter == true)
                                                <td data-bs-toggle="modal"
                                                    data-bs-target="#showFileReporter{{ $safety->id }}">
                                                    <button type="submit">
                                                        <i class="uil uil-file-info-alt"></i>
                                                    </button>
                                                </td>   
                                                @else
                                                    <td>Tidak ada</td>
                                                @endif
                                                <td>{{ $safety->risk_probability }}</td>
                                                <td>{{ $safety->risk_index }}</td>
                                                <td>{{ $safety->risk_probability }}{{ $safety->risk_index }}</td>
                                                @if ($safety->risk_probability != null)
                                                <td
                                                    style="background-color: {{ $safety->risk_probability <= 2 ? 'green' : '' }};">
                                                </td>
                                                <td
                                                    style="background-color: {{ $safety->risk_probability <=4 ? 'yellow' : '' }};">
                                                </td>
                                                <td
                                                    style="background-color: {{ $safety->risk_probability >= 5 ? 'red' : '' }};">
                                                </td>
                                                @else
                                                <td>Tidak ada</td>
                                                <td>Tidak ada</td>
                                                <td>Tidak ada</td>
                                                @endif
                                                @if ($safety->file_response == true)
                                                <td data-bs-toggle="modal"
                                                    data-bs-target="#showFileResponse{{ $safety->id }}">
                                                    <button type="submit">
                                                        <i class="uil uil-file-info-alt"></i>
                                                    </button>
                                                </td>  
                                                @else
                                                <td>Tidak ada</td>
                                                @endif
                                                <td data-bs-toggle="modal"
                                                data-bs-target="#updateSafety{{ $safety->id }}">
                                                {{ $safety->status }}
                                                </td>
                                               
                                                <td class="flex flex-col">
                                                    <button type="button" class="btn btn-icon btn-sm btn-warning"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $safety->id }}">
                                                        <i class="uil uil-edit edit"></i>
                                                    </button>                                         
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
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
