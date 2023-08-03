<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Deft Safety</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
    <link rel="stylesheet" href="/assets/css/safety.css" />
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
                                {{-- <input type="text" placeholder="Search" class="search"> --}}
                                <button type="button" class="btn btn-success">
                                    Export Excel
                                </button>
                                <!-- MODAL -->
                                @foreach ($safeties as $safety)
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
                                                        <form>
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
                                                                    {{-- <option value="">Responsible Function</option> --}}
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
                                                <div class="modal-body">
                                                    <form>
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
                                                           
                                                                <input class="form-control" name="file" type="file"
                                                                    id="formFile">
                                                          
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
                                                               
                                                                    <select name="status" class="form-select" id="">
                                                                        <option> {{$safety->status}}</option>
                                                                        <option value="close">Closed</option>
                                                                        <option value="reject">Reject</option>
                                                                        {{-- <option value="">Responsible Function</option> --}}
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
                                        </form>
                                    </div>
                                </div>
                        
                                @endforeach
                            </div>
                        </div>

                        <div class="table-section">
                            <table>
                                <thead>
                                    <tr>
                                        <th style="width: 100px;">Number</th>
                                        <th style="width: 100px;">Reporter</th>
                                        <th style="width: 150px;">Classification</th>
                                        <th style="width: 100px;">Date of Submission</th>
                                        <th style="width: 119px;">Date of Hazard Identification</th>
                                        <th style="width: 110px;">Description</th>
                                        <th style="width: 90px;">Location</th>
                                        <th style="width: 120px;">Type Operation</th>
                                        {{-- <th style="width: 110px;">File Reporter</th>
                                        <th style="width: 150px;">Risk Probability</th>
                                        <th style="width: 110px;">Risk Severity</th>
                                        <th style="width: 110px;">Risk Index</th> --}}
                                        <th style="width: 70px;">COP</th>
                                        <th style="width: 70px;">HM</th>
                                        <th style="width: 70px;">CO</th>
                                        <th style="width: 70px;">Status</th>
                                        {{-- <th style="width: 70px;">File Reporter</th> --}}
                                        <th style="width: 70px;">File Response</th>
                                        {{-- <th style="width: 110px;">Responsible</th>
                                        <th style="width: 110px;">File Response</th>  --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($safeties as $safety)
                                        @if ($safety->status != 'close')
                                            <tr>
                                                <td data-bs-toggle="modal"
                                                    data-bs-target="#updateSafety{{ $safety->id }}">
                                                    {{ $safety->number }}
                                                </td>
                                                <td data-bs-toggle="modal"
                                                    data-bs-target="#updateSafety{{ $safety->id }}">
                                                    {{ $safety->reporter }}</td>
                                                <td data-bs-toggle="modal"
                                                    data-bs-target="#updateSafety{{ $safety->id }}">
                                                    {{ $safety->classification }}</td>
                                                <td data-bs-toggle="modal"
                                                    data-bs-target="#updateSafety{{ $safety->id }}">
                                                    {{ $safety->date_of_submission }}</td>
                                                <td data-bs-toggle="modal"
                                                    data-bs-target="#updateSafety{{ $safety->id }}">
                                                    {{ $safety->date_of_hazard_identification }}</td>
                                                <td data-bs-toggle="modal"
                                                    data-bs-target="#updateSafety{{ $safety->id }}">
                                                    {{ $safety->description }}</td>
                                                <td data-bs-toggle="modal"
                                                    data-bs-target="#updateSafety{{ $safety->id }}">
                                                    {{ $safety->location }}</td>
                                                <td data-bs-toggle="modal"
                                                    data-bs-target="#updateSafety{{ $safety->id }}">
                                                    {{ $safety->type_operation }}
                                                </td>
                                                {{-- <td data-bs-toggle="modal"
                                                data-bs-target="#updateSafety{{ $safety->id }}">
                                                {{ $safety->description }}</td> --}}

                                                {{-- <td>{{ $safety->risk_probability }}</td> --}}
                                                {{-- <td>{{ $safety->risk_index }}</td>  --}}

                                                {{-- <td>{{ $safety->risk_probability }}{{ $safety->risk_index }}</td>  --}}
                                                {{-- @if (is_null($safety->risk_probability <= 2))

                                            <td>tidak ada</td>

                                            @elseif ( $safety->risk_probability <= 2)
                                            <td style="background-color: green">
                                            </td>
                                            <td data-bs-toggle="modal"
                                                data-bs-target="#updateSafety{{ $safety->id }}">{{ $safety->reporter }}</td>
                                            <td data-bs-toggle="modal"
                                                data-bs-target="#updateSafety{{ $safety->id }}">{{ $safety->classification }}</td>
                                            <td data-bs-toggle="modal"
                                                data-bs-target="#updateSafety{{ $safety->id }}">
                                                {{ $safety->date_of_submission }}</td>
                                            <td data-bs-toggle="modal"
                                                data-bs-target="#updateSafety{{ $safety->id }}">
                                                {{ $safety->date_of_hazard_identification }}</td>
                                            <td data-bs-toggle="modal"
                                                data-bs-target="#updateSafety{{ $safety->id }}">
                                                {{ $safety->description }}</td>
                                            <td data-bs-toggle="modal"
                                                data-bs-target="#updateSafety{{ $safety->id }}">
                                                {{ $safety->location }}</td>
                                            <td data-bs-toggle="modal"
                                                data-bs-target="#updateSafety{{ $safety->id }}">
                                                {{ $safety->type_operation}}
                                            </td>
                                            {{-- <td data-bs-toggle="modal"
                                                data-bs-target="#updateSafety{{ $safety->id }}">
                                                {{ $safety->description }}</td> --}}
                                        
                                             {{-- <td>{{ $safety->risk_probability }}</td> --}}
                                            {{-- <td>{{ $safety->risk_index }}</td>  --}}
                                           
                                            {{-- <td>{{ $safety->risk_probability }}{{ $safety->risk_index }}</td>  --}}
                                            {{-- @if (is_null ($safety->risk_probability <= 2 )) 
                                                
                                            <td>tidak ada</td>
                                            
                                            @elseif ( $safety->risk_probability <= 2) 
                                            <td style="background-color: green">         
                                            </td>
                                            
                                            @endif
                                            @if(is_null ($safety->risk_probability <=4)) 
                                                
                                            <td>tidak ada</td>
                                            @elseif ($safety->risk_probability <=4 )
                                            <td style="background-color: yellow">         
                                            </td>
                                            @else 
                                            <td>tidak ada</td>
                                            @endif
                                            @if(is_null ($safety->risk_probability >=5 )) 
                                                
                                            <td></td>
                                            @elseif ($safety->risk_probability >=5 )
                                            <td style="background-color:red">         
                                            </td>
                                            @else 
                                            <td>tidak ada</td>
                                            @endif --}}
                                            {{-- @if ($safety->risk_probability != null)
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
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            @endif
                                            <td data-bs-toggle="modal"
                                           data-bs-target="#updateSafety{{ $safety->id }}">
                                           {{ $safety->status }}</td>  --}}

                                            {{-- <td>{{ $safety->risk_index }}</td>  --}}
                                            {{-- <td>{{ $safety->risk_severity }}</td>  --}}

                                            @endif
                                            @if (is_null($safety->risk_probability <= 4))

                                            <td>tidak ada</td>
                                            @elseif ($safety->risk_probability <=4 )
                                            <td style="background-color: yellow">
                                            </td>
                                            @else
                                            <td>tidak ada</td>
                                            @endif
                                            @if (is_null($safety->risk_probability >= 5))

                                            <td></td>
                                            @elseif ($safety->risk_probability >=5 )
                                            <td style="background-color:red">
                                            </td>
                                            @else
                                            <td>tidak ada</td>
                                            @endif 
                                                @if ($safety->risk_probability != null)
                                                    <td
                                                        style="background-color: {{ $safety->risk_probability <= 2 ? 'green' : '' }};">
                                                    </td>
                                                    <td
                                                        style="background-color: {{ $safety->risk_probability <= 4 ? 'yellow' : '' }};">
                                                    </td>
                                                    <td
                                                        style="background-color: {{ $safety->risk_probability >= 5 ? 'red' : '' }};">
                                                    </td>
                                                @else
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                @endif
                                                <td data-bs-toggle="modal"
                                                    data-bs-target="#updateSafety{{ $safety->id }}">
                                                    {{ $safety->status }}</td>

                                                {{-- <td>{{ $safety->risk_index }}</td>  --}}
                                                {{-- <td>{{ $safety->risk_severity }}</td>  --}}
                                                {{-- <td style="background-color: {{ $safety->risk_probability <= 1 ? 'green' : '' }};">
                                            </td>
                                            <td
                                                style="background-color: {{ $safety->risk_probability <= 4 ? 'red' : '' }};">
                                            </td>
                                            <td
                                                style="background-color: {{ $safety->risk_probability >= 5 ? 'yellow' : '' }};">
                                            </td>  --}}
                                                {{-- <td>IT3600</td> --}}
                                                {{-- <td>
                                                <form action="/download/{{ $safety->file_reporter }}" method="post">
                                                    @csrf
                                                    <button type="submit">
                                                        <i class="uil uil-file-info-alt"></i>
                                                    </button>
                                                </form>
                                            </td>  --}}
                                                <td data-bs-toggle="modal"
                                                    data-bs-target="#showFileResponse{{ $safety->id }}">
                                                    <button type="submit">
                                                        <i class="uil uil-file-info-alt"></i>
                                                    </button>
                                                </td>
                                                {{-- <td>
                                                @if ($safety->risk_probability >= 5)
                                                    Closed
                                                @else
                                                    Open
                                                @endif
                                            </td> --}}
                                            </tr>
                                        @endif
                                    @endforeach

                                </tbody>

                            </table>

                            @foreach ($safeties as $safety)
                                <div class="modal fade" id="showFileResponse{{ $safety->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">FILE
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{-- @if ($safety->id || $safety->file_reporter)  --}}

                                                <img src="{{ $safety->file_response }}" class="img-fluid">


                                                {{-- <img src="{{ asset('storage/'.$safety->file_response)  }}" class=" img-fluid"> --}}


                                                {{-- @endif --}}
                                                {{-- @if ($safety->id || $safety->file_response) --}}
                                                {{-- <img src="{{ asset('storage/'.$safety->file_response)  }}" class=" img-fluid"> --}}
                                                {{-- @endif --}}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" data-bs-dismiss="modal"
                                                    class="btn btn-primary">Save changes</button>
                                            </div>

                                            {{-- <tr>
                                            <td data-bs-toggle="modal"
                                                data-bs-target="#updateSafety{{ $safety->id }}">
                                                {{ $safety->number }}
                                            </td>
                                        </tr> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach


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
