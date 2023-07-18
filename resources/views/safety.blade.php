<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
    <link rel="stylesheet" href="/assets/css/safety.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    @include('templates.nav')

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
                    <i class="uil uil-clipboard-alt"></i>
                    <a class="text">Safety Manager</a>
                </div>

                <div class="activity">
                    <div class="table-responsive">
                        <div class="table-atas">
                            <p>Safety Table</p>
                            <div class="">
                                <input type="text" placeholder="Search" class="search">
                                <button type="button" class="btn btn-primary add" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    +ADD
                                </button>
                                <!-- MODAL -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <form method="post" action="{{ route('safeties.store') }}"
                                            enctype="multipart/form-data">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1"
                                                            class="form-label">Category</label>
                                                        <select class="form-select" name="classification"
                                                            id="classification">
                                                            <option selected disabled value>--Choose Category--</option>
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
                                                        <label for="exampleInputPassword1" class="form-label">Date Of
                                                            Submission</label>
                                                        <fieldset disabled>
                                                            <input type="date" id="disabledTextInput"
                                                                class="form-control" name="date_of_submission"
                                                                placeholder="{{ date('d/m/Y') }}"
                                                                value="{{ date('d/m/Y') }}">
                                                        </fieldset>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Date Of
                                                            Hazard Identification</label>
                                                        <input type="date" class="form-control"
                                                            name="date_of_hazard_identification">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1"
                                                            class="form-label">Location</label>
                                                        <input type="text" class="form-control" name="location">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputPassword1" class="form-label">Type of
                                                            Operation</label>
                                                        <select class="form-select" name="type_operation"
                                                            id="">
                                                            <option selected disabled value>Choose Type</option>
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
                                                        <input type="text" class="form-control"
                                                            name="description">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">File Upload</label>
                                                        <input class="form-control" type="file"
                                                            name="file_upload">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save
                                                        changes</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
                                    <th>Type Operation</th>
                                    <th>Description</th>
                                    <th>File Reporter</th>
                                    <th>Risk Probability</th>
                                    <th>Risk Severity</th>
                                    <th>Risk Index</th>
                                    <th>COP</th>
                                    <th>HM</th>
                                    <th>CO</th>
                                    <th>Responsible</th>
                                    <th>File Response</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($safeties as $safety)
                                    <tr>
                                        <td>{{ $safety->number }}</td>
                                        <td>160260</td>
                                        <td>K3</td>
                                        <td>{{ $safety->date_of_submission }}</td>
                                        <td>{{ $safety->date_of_hazard_identification }}</td>
                                        <td>FW</td>
                                        <td>Other</td>
                                        <td>{{ $safety->description }}</td>
                                        <td>&ensp;</td>
                                        <td>{{ $safety->risk_probability }}</td>
                                        <td>{{ $safety->risk_severity }}</td>
                                        <td>{{ $safety->risk_index }}</td>
                                        <td>&ensp;</td>
                                        <td style="background-color: red;"></td>
                                        <td></td>
                                        <td>IT3600</td>
                                        <td>&ensp;</td>
                                        <td>Closed</td>
                                    </tr>
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
