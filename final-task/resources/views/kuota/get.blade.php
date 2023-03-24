@extends('layout.default')

@section('judul','Paket Kuota')

@section('content')
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<div class="card">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <label for="">From</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-2">
                <label for="">To</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-2">
                <label for="">Filter</label>
                <select name="" class="form-control" id="">
                    <option value="">All</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="">Export</label>
                <div class="row">
                         <a class="btn btn-success" href=""> <i class="fa fa-file-excel"></i> <span>Excel</span></a>
                        <a class="btn btn-danger ml-1" href=""> <i class="fa fa-file-pdf"></i> <span>Pdf</span></a>
                </div>
            </div>
            <div class="col-md-2">
                <a href="{{ url('kuota') }}" class="btn btn-info btn-block" style="margin-top: 33px;">REFRESH</a>
            </div>
            <div class="col-md-2">
                <a href="#" class="btn btn-secondary btn-block" style="margin-top:33px;" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i>  Create</a>
            </div>
        </div>
    </div>
    <div class="card-header">
    </div>
    <div class="card-body">
        <table id="myTable" class="table table-bordered">
            <thead style="background-color: rgb(8, 204, 8); color:white;">
                <tr >
                    <th>Paket Kuota</th>
                    <th>Berat</th>
                    <th>Harga</th>
                    <th>Cabang</th>
                    <th>Created At</th>
                    <th>Aktif</th>
                    <th style="width: 100px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kuota as $data)

                <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Paket Kuota</h5>
                          <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">&times;</button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ url('update-kuota/'.$data->id ) }}" method="POST">
                            @csrf
                            <label for="">Paket Kuota</label> <span class="text-danger">*</span>
                            <select name="nama_paket" class="form-control" id="">
                                <option value="KUOTA SETRIKA">KUOTA SETRIKA</option>
                                <option value="Paket A">Paket A</option>
                                <option value="Paket B">Paket B</option>
                                <option value="Paket C">Paket C</option>
                            </select>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Berat</label> <span class="text-danger">*</span>
                                    <input value="{{ $data->berat }}" type="text" class="form-control" name="berat" placeholder="Berat" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Satuan Unit</label> <span class="text-danger">*</span>
                                    <select name="satuan_id" class="form-control" id="">
                                        @foreach ($satuan as $row)
                                        <option value="{{ $row->id }}">{{ $row->nama_satuan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <label for="">Harga</label> <span class="text-danger">*</span>
                            <input value="{{ $data->harga }}" type="text" class="form-control" name="harga" placeholder="Harga" required>
                            <label for="">Cabang</label>
                            <input value="{{ $data->cabang }}" name="cabang" class="form-control">
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
                    <td>{{ $data->nama_paket }}</td>
                    <td>{{ $data->berat }}&nbsp{{ $data->satuan->nama_satuan }}</td>
                    <td>@currency($data->harga)</td>
                    <td>{{ $data->cabang }}</td>
                    <td>{{ $data->created_at }}</td>
                    <td>
                        <span class="badge badge-sm {{ ($data->aktif == '1')?'bg-gradient-success' : 'bg-gradient-secondary' }}">
                        {{ ($data->aktif == '1')? 'Aktif' : 'Tidak Aktif'}}
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
                              <form class="d-inline" action="{{url('onoffkuota/'.$data->id)}}" method="post">
                              @csrf
                        @if($data->aktif == '0')
                            <input type="hidden" name="_method" value="PUT">
                            <button href="" name="aktif" class="dropdown-item" value="1">
                              <i class="fas fa-power-off"></i>&nbsp Aktif
                            </button>
                            @else
                          <input type="hidden" name="_method" value="PUT">
                          <button href="" name="aktif" class="dropdown-item" value="0">
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
let table = new DataTable('#myTable');
</script>
@endsection()

<div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Paket Kuota</h5>
          <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-body">
          <form action="{{ url('kuota') }}" method="POST">
            @csrf
            <label for="">Paket Kuota</label> <span class="text-danger">*</span>
            <select name="nama_paket" class="form-control" id="">
                <option value="KUOTA SETRIKA">KUOTA SETRIKA</option>
                <option value="Paket A">Paket A</option>
                <option value="Paket B">Paket B</option>
                <option value="Paket C">Paket C</option>
            </select>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Berat</label> <span class="text-danger">*</span>
                    <input type="text" class="form-control" name="berat" placeholder="Berat" required>
                </div>
                <div class="col-md-6">
                    <label for="">Satuan Unit</label> <span class="text-danger">*</span>
                    <select name="satuan_id" class="form-control" id="">
                        <option value="">Pilih Satuan</option>
                        @foreach ($satuan as $data)
                        <option value="{{ $data->id }}">{{ $data->nama_satuan }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <label for="">Harga</label> <span class="text-danger">*</span>
            <input type="text" class="form-control" name="harga" placeholder="Harga" required>
            <label for="">Cabang</label>
            <input name="cabang" class="form-control">
            <input type="hidden" name="aktif" value="0">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
