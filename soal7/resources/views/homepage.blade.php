<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- MultiSelect CSS & JS library -->
    <link href="{{asset('css/jquery.multiselect.css')}}" rel="stylesheet"/>

    <title>{{env('APP_NAME', 'Arkademy Bootcamp Test')}} - @yield('title', 'Panel')</title>
    <link rel="icon" type="image/png" href="{{asset('fav.png')}}"/>
    <!-- Bootstrap core CSS -->
    <link href=" {{ asset ('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom fonts for this template -->
    <link href="{{ asset ('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="{{ asset ('vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="{{ asset ('css/sb-admin.css') }}" rel="stylesheet">
    <link href="{{ asset ('css/sweetalert2.min.css') }}" rel="stylesheet">
    {{--SWEETALERT--}}
    <script src="{{asset('js/sweetalert2.min.js')}}"></script>

    <!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    {{--END SWEETALERT--}}

    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery-gmaps-latlon-picker.css')}}"/>
</head>

<body class="fixed-nav sticky-footer bg-light" id="page-top">
<div class="card-body">
    <span style="color:#0285CC ; font-weight:bold ; font-size:large">Arkademy Bootcamp</span><br>
    <hr>
</div>

<div class="container-fluid">
    <div class="col-lg">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i>
                <span style="font-size:small">Data</span>
                <a href="#" class="float-md-right">
                    <button class="btn btn-primary" data-toggle="modal" style=" font-size:small;"
                            data-target="#businessStatusPopUp">Tambah Data
                    </button>
                </a>
            </div>
            <div class="card-body" style="font-size: small">
                <div class="table-responsive" style="font-size: small">
                    <table class="table table-bordered" id="dataTable" cellspacing="0" style="font-size: small">
                        <thead>
                        <tr>
                            <th width="4%">
                                <center>No</center>
                            </th>
                            <th width="31%">
                                <center>Nama</center>
                            </th>
                            <th width="25%">
                                <center>Hobi</center>
                            </th>
                            <th width="25%">
                                <center>Kategori</center>
                            </th>
                            <th width="23%">
                                <center>Aksi</center>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($nama as $index => $n)
                            <tr>
                                <td>
                                    <center>{{++$index}}</center>
                                </td>
                                <td>{{$n->name}}</td>
                                <td>{{$n->hobi->name}}</td>
                                <td>{{$n->kategori->name}}</td>
                                <td width="10%">
                                    <table border="0">
                                        <tr>
                                            <td>
                                                <button type="submit" class="btn btn-info" data-toggle="modal"
                                                        data-target="#businessStatusPopUps"
                                                        onclick="showModal({{$n->id}})"><i
                                                        class="fa fa-fw fa-pencil"></i></button>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#deletePopUp{{$n->id}}"><i
                                                        class="fa fa-fw fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            {{--@endphp--}}
                            <!-- Status Create Modal -->
                            <div class="modal fade" id="businessStatusPopUp" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="/tambahdata" method="POST" enctype="multipart/form-data">
                                            <div class="col-11">
                                                <div class="form-group">
                                                    <label>Nama</label>
                                                    <input type="text" name="nama" id="nama" class="form-control"
                                                           required>
                                                </div>
                                            </div>
                                            <div class="col-11">
                                                <div class="form-group">
                                                    <label>Hobi :</label>
                                                    <select class="form-control" id="id_hobi" name="id_hobi">
                                                        <option selected>Pilih Hobi</option>
                                                        @foreach($hobi as $h)
                                                            <option value="{{$h->id}}">{{$h->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-11">
                                                <div class="form-group">
                                                    <label>Kategori :</label>
                                                    <select class="form-control" id="id_kategori" name="id_kategori">
                                                        <option selected>Pilih Kategori</option>
                                                        @foreach($kategori as $k)
                                                            <option value="{{$k->id}}">{{$k->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancel
                                                </button>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" style="color:#FFFFFF" class="btn btn-warning">
                                                    Submit
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Status Edit Modal -->
                            <div class="modal fade" id="businessStatusPopUps" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Kategori Layanan</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form id="formEdit" action="" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="_method" value="put">
                                            <div class="col-11">
                                                <div class="form-group">
                                                    <label>Nama</label>
                                                    <input type="text" name="namas" id="namas" class="form-control"
                                                           required>
                                                </div>
                                            </div>
                                            <div class="col-11">
                                                <div class="form-group">
                                                    <label>Hobi :</label>
                                                    <select class="form-control" id="id_hobis" name="id_hobis">
                                                        <option selected>Pilih Hobi</option>
                                                        @foreach($hobi as $h)
                                                            <option value="{{$h->id}}" {{$h->id === $n->id_hobi ? 'selected' : ''}}>{{$h->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-11">
                                                <div class="form-group">
                                                    <label>Kategori :</label>
                                                    <select class="form-control" id="id_kategoris" name="id_kategoris">
                                                        <option selected>Pilih Kategori</option>
                                                        @foreach($kategori as $k)
                                                            <option value="{{$k->id}}" {{$k->id === $n->id_kategori ? 'selected' : ''}}>{{$k->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancel
                                                </button>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" style="color:#FFFFFF" class="btn btn-warning">
                                                    Submit
                                                </button>
                                                </td>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deletePopUp{{$n->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete item</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure to delete this item ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Cancel
                                            </button>
                                            <form action="{{url('namadelete')}}" method="POST">
                                                <input type="hidden" name="id"
                                                       value="{{$n->id}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                </td>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
    </div>
</div>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{ asset ('vendor/jquery/jquery.min.js') }}"></script>
<!--sweetalert--->
@include('sweet::alert')
<script type="text/javascript" src="{{ asset ('vendor/popper/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset ('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Plugin JavaScript -->
<script type="text/javascript" src="{{ asset ('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script type="text/javascript" src="{{ asset ('vendor/chart.js/Chart.min.js') }}"></script>
<script type="text/javascript" src="{{ asset ('vendor/datatables/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset ('vendor/datatables/dataTables.bootstrap4.js') }}"></script>

<!-- Custom scripts for this template -->
<script type="text/javascript" src="{{ asset ('js/sb-admin.js') }}"></script>
<!--time picker-->

<script src="{{asset('js/jquery.multiselect.js')}}"></script>

<!-- CK Editor -->
<script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>

<script>
    $(document).ready(function () {
        $(".gllpLatlonPicker").each(function () {
            $obj = $(document).gMapsLatLonPicker();

            $obj.params.strings.markerText = "Drag this Marker (example edit)";

            $obj.params.displayError = function (message) {
                console.log("MAPS ERROR: " + message); // instead of alert()
            };

            $obj.init($(this));
        });
    });
</script>
<script>
    function showModal(id) {
        document.getElementById('formEdit').action = "updatenama/" + id;
        console.log("diklik " + id);
        nama = document.getElementById('namas');
        $.ajax({
            type: 'GET',
            url: '/shownama/' + id,
            dataType: 'json',
            success: function (data) {
                if (data !== null) {
                    console.log(data);
                    console.log('datanya 2 = ' + data.id);
                    nama.value = data.name;

                } else {
                    console.log('null')
                    nama.value = "";
                }

            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log("error bro");
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }
</script>
</body>
</html>
