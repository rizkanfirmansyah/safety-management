<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reporter</title>
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
                            @if(Session::has('errors'))
                            <div class="alert alert-danger alert-dismissible show">
                                {{ session('errors') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    {{-- <span aria-hidden="true">&times;</span> --}}
                                </button>
                            </div>
                            @endif
                            <p>Safety Table</p>
                            <div class="">
                              
                                {{-- <input type="text" placeholder="Search" class="search ">
                                <button type="button" class="btn btn-primary add" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    +ADD
                                </button> --}}
                                <!-- MODAL -->
                                {{-- <form method="post" action="{{ route('reporter.store') }}">
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true"
                                            enctype="multipart/form-data">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Category</label>
                                                            <fieldset disabled="disabled">
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
                                                            </fieldset>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputPassword1" class="form-label">Date Of
                                                                Submission</label>
                                                            <fieldset disabled>
                                                                <input type="text" id="disabledTextInput"
                                                                    class="form-control" placeholder="14/07/2023">
                                                            </fieldset>
                                                        </div>
                                                        
                                                        <div class="mb-3">
                                                            <fieldset disabled="disabled">
                                                                <label for="formFile" class="form-label">File
                                                                    Upload</label>
                                                                <input class="form-control" type="file"
                                                                    name="file_upload">
                                                            </fieldset>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="formFile" class="form-label">Risk Probability</label>
                                                            <select class="form-select" name="risk_probability" id="">
                                                              <option value="" selected>-- Choose Risk Probability --</option>
                                                              <option value="1">1</option>
                                                              <option value="2">2</option>
                                                              <option value="3">3</option>
                                                              <option value="4">4</option>                          
                                                              <option value="5">5</option>                          
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="formFile" class="form-label">Risk Index</label>
                                                            <select class="form-select" name="risk_index" id="">
                                                              <option value="" selected>-- Choose Risk Index --</option>
                                                              <option value="A">A</option>
                                                              <option value="B">B</option>
                                                              <option value="C">C</option>
                                                              <option value="D">D</option>                          
                                                              <option value="E">E</option>                          
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputPassword1"name="post_mitigation" class="form-label">Post Mitigation</label>
                                                            <input type="text" class="form-control" id="">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputPassword1" class="form-label">Deadline</label>
                                                            <input type="date" class="form-control" name="date_of_hazard_identification" id="">
                                                        </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputPassword1"
                                                                    class="form-label">Status</label>
                                                                    <fieldset disabled="disabled">
                                                                        <select name="status" class="form-select" id="">
                                                                            @foreach ($safeties as $safety)
                                                                            <option>{{$safety->status}}</option>
                                                                      
                                                                            @endforeach
                                                                        </select>
                                                                    </fieldset>
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
                                </form> --}}
                                   
                                </div>
                                @foreach ($safeties as $safety)

                                    <form method="POST" action="{{ route('reporter.update', $safety->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal fade" id="editModal{{ $safety->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">EDIT DATA
                                                        </h1>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1"
                                                            class="form-label">Category</label>
                                                            <fieldset disabled="disabled">
                                                                <select class="form-select" name="classification"
                                                                    id="classification">
                                                                    <option>--Choose Category--
                                                                    </option>
                                                                    @foreach ($options as $key => $item)
                                                                    <option value="{{ $key }}"
                                                                        {{ $safety->classification == $key ? 'selected' : '' }}>
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
                                                                    value="{{ $safety->date_of_submission }}">
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
                                                                class="form-label">Hadzar Description</label>
                                                            <fieldset disabled="disabled">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $safety->description }}">
                                                            </fieldset>
                                                        </div>

                                                        <div class="mb-3">
                                                          
                                                                <label for="formFile" class="form-label">File
                                                                    Upload</label>
                                                                <input class="form-control" type="file"
                                                                    name="file">
                                                        
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="formFile" class="form-label">Risk Probability</label>
                                                            <select class="form-select" name="risk_probability" id="">
                                                            <option value="" disabled selected>-- Choose Risk Probability --</option>
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
                                                            <label for="formFile" class="form-label">Risk Index</label>
                                                            <select class="form-select" name="risk_index" id="">
                                                            <option value="" disabled selected>-- Choose Risk Index --</option>
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
                                                            <label for="exampleInputPassword1" class="form-label">Post Mitigation</label>
                                                            <input type="text"name="post_mitigation" value="{{$safety->post_mitigation}}" class="form-control" id="">
                                                        </div>
                                            
                                                        <div class="mb-3">
                                                            <label for="exampleInputPassword1"
                                                                class="form-label">Status</label>
                                                                <fieldset disabled="disabled">
                                                                    <select name="status" class="form-select" id="">
                                                                        <option name="">{{$safety->status}}</option>
                                                                        <option value="close">Closed</option>
                                                                        <option value="reject">Reject</option>
                                                                        {{-- <option value="">Responsible Function</option> --}}
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
                                        <th>Reporter</th>
                                        <th style="width: 150px;">Classification</th>
                                        <th style="width: 100px;">Date of Submission</th>
                                        <th style="width: 150px;">Date of Hazard Identification</th>
                                        <th>Location</th>
                                        <th style="width: 150px;">Type Operation</th>
                                        <th>Description</th>
                                        <th>File Reporter</th>
                                        {{-- <th>File Response</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($safeties as $safety)
                                    {{-- @if ($safety->status != 'close' ) --}}
                                        <tr>
                                            <td>{{ $safety->number }}</td>
                                            <td>{{ $safety->reporter }}</td>
                                            <td>{{ $safety->classification }}</td>

                                            {{-- <td>K3</td> --}}
                                            <td>{{ $safety->date_of_submission }}</td>
                                            <td>{{ $safety->date_of_hazard_identification }}</td>
                                            <td>{{ $safety->location }}</td>
                                            <td>{{ $safety->type_operation }}
                                            </td>
                                            <td>{{ $safety->description }}</td>
                                            @if ($safety->file_reporter == true)
                                            <td>
                                                <form action="/download/{{ $safety->file_reporter }}" method="post">
                                                    @csrf
                                                    <button type="submit">
                                                        <i class="uil uil-file-info-alt"></i>
                                                    </button>
                                                </form>                                  
                                            </td>
                                            @else 
                                            <td>-</td>
                                            @endif
                                                    {{-- <td data-bs-toggle="modal"
                                                        data-bs-target="#updateSafety{{ $safety->id }}">
                                                        {{ $safety->number }}
                                                        <img src="{{ asset('storage/'.$safety->file_reporter)  }}" class="img-thumbnail img-fluid">
                                                    </td> --}}

                                               
                                                {{-- <img src="{{ asset('storage/file_reporter/'.$safety->file_reporter) }}" style="height: 50px;width:100px;"> --}}
                                            {{-- <td>
                                                <form action="/download/{{ $safety->file_response }}" method="post">
                                                    @csrf
                                                    <button type="submit">
                                                        <i class="uil uil-file-info-alt"></i>
                                                    </button>
                                                </form>
                                            </td> --}}
                                   
                                            <td class="flex flex-col">
                                                <button type="button" class="btn btn-icon btn-sm btn-warning"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $safety->id }}">
                                                    <i class="uil uil-edit edit"></i>
                                                </button>
                                                {{-- <form action="{{ route('reporter.destroy', $safety->id) }}" method="POST"
                                                    class="p-0 m-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-icon btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this user?')">
                                                        <i class="uil uil-trash-alt delete"></i>
                                                    </button>
                                                </form> --}}
                                            </td>
                                        </tr>
                                        {{-- @endif --}}
                                    @endforeach

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
