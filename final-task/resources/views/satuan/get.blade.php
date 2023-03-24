@extends('layout.default')

@section('judul','Satuan Unit')

@section('content')
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@if(Session::has('message'))
    <p class="alert alert-info">{{ Session::get('message') }}    <button type="button" class="btn btn-close" data-dismiss="alert" aria-label="Close">&times;</button></p>

  @endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Satuan Unit</h3>
        <div class="card-tools">
            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i>  Create</a>
        </div>

    </div>
    <div class="card-body">
        <div class="table-resposive">
            <table id="myTable" class="table table-bordered">
                <thead style="background-color: rgb(8, 204, 8); color:white;">
                    <tr>
                        <th>Satuan Unit</th>
                        <th>Deskripsi</th>
                        <th>Aktif</th>
                        <th style="width: 100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($satuan as $data)

                    <div class="modal fade" id="editModal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Satuan Unit</h5>
                              <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">&times;</button>
                            </div>
                            <div class="modal-body">
                        <form action="{{ url('update-satuan/'.$data->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <label for="">Satuan Unit</label> <span class="text-danger">*</span>
                                <input type="text" value="{{ $data->nama_satuan }}" class="form-control" name="nama_satuan" required>
                                <label for="">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" cols="30" rows="3">{{ $data->deskripsi }}</textarea>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                          </div>
                        </div>
                      </div>




                    <tr>
                        <td>{{ $data->nama_satuan }}</td>
                        <td>{{ $data->deskripsi }}</td>
                        <td>
                            <span class="badge badge-sm {{ ($data->status == '1')?'bg-gradient-success' : 'bg-gradient-secondary' }}">
                            {{ ($data->status == '1')? 'Aktif' : 'Tidak Aktif'}}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-success">Action</button>
                              <button type="button" class="btn btn-success dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu text-left" role="menu">
                                <form class="" action="{{url('satuan')}}" method="put">
                                <a data-toggle="modal" data-target="#editModal{{$data->id}}" class="dropdown-item"
                                    href="">&nbsp<i class="fa fa-info"></i>&nbsp &nbsp Detail</a>
                                  </form>
                                  <form class="d-inline" action="{{url('onoffsatuan/'.$data->id)}}" method="post">
                                  @csrf
                            @if($data->status == '0')
                                <input type="hidden" name="_method" value="PUT">
                                <button href="" name="status" class="dropdown-item" value="1">
                                  <i class="fas fa-power-off"></i>&nbsp Aktif
                                </button>
                                @else
                              <input type="hidden" name="_method" value="PUT">
                              <button href="" name="status" class="dropdown-item" value="0">
                                <i class="fas fa-power-off"></i>&nbsp Nonaktif
                            </button>
                            @endif
                          </form>
                              </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
let table = new DataTable('#myTable');
</script>
@endSection()


<div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Satuan Unit</h5>
          <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-body">
          <form action="{{ url('satuan') }}" method="POST">
            @csrf
            <label for="">Satuan Unit</label> <span class="text-danger">*</span>
            <input type="text" class="form-control" name="nama_satuan" required>
            <label for="">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" cols="30" rows="3"></textarea>
            <input type="hidden" name="status" value="0">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>


