<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
    <link rel="stylesheet" href="/assets/css/style.css" />
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
                <div class="tanggal">
                    <select class="form-select" aria-label="Default select example">
                        <option selected=""> Bulan </option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                    <select class="form-select" aria-label="Default select example">
                        <option selected=""> Tahun </option>
                        <option value="1">2023</option>
                    </select>
                    <button type="button" class="btn btn-danger">
                        <i class="uil uil-filter"></i>
                        Filter
                    </button>
                </div>
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
                            <!-- MODAL -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Category</label>
                                                    <select class="form-select" name="" id="">
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
                                                    <label for="exampleInputPassword1" class="form-label">Date Of Hazard
                                                        Identification</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1"
                                                        class="form-label">Location</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Type of
                                                        Operation</label>
                                                    <select class="form-select" name="" id="">
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
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">File Upload</label>
                                                    <input class="form-control" type="file" id="formFile">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
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
                                    <th>Classification</th>
                                    <th>Date of Submission</th>
                                    <th style="width: 140px;">Date of Hazard Identification</th>
                                    <th>Location</th>
                                    <th>Type Operation</th>
                                    <th>Description</th>
                                    <th>File Reporter</th>
                                    <th>File Response</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td>HR0006/06/23</td>
                                <td>SMS</td>
                                <td>2023-06-13</td>
                                <td>2023-06-20</td>
                                <td>Unknown</td>
                                <td>Minor / Major Repair</td>
                                <td>Test</td>
                                <td>
                                    <button>
                                        <i class="uil uil-file-info-alt"></i>
                                    </button>
                                </td>
                                <td>
                                    <button>
                                        <i class="uil uil-file-info-alt"></i>
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
