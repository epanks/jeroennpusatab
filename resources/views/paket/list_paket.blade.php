@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="form-group">
            <select name="filter_kdoutput" id="filter_kdoutput" class="form-control" required>
                <option value="">Select Kode Output</option>
                @foreach ($listdata as $output)
                    <option value="{{$output->kdoutput}}">{{$output->nmoutput}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group" align="center">
            <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>
            <button type="button" name="reset" id="reset" class="btn btn-default">Reset</button>
        </div>
    </div>
</div>
    <p>Welcome to this beautiful admin panel.</p>
    <table class="table table-bordered" id="paket-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama Paket</th>
                <th>Pagu</th>
                <th>Progres Fisik</th>
                <th>Kode Satker</th>
            </tr>
        </thead>
    </table>
    
@stop



{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop --}}

@section('js')
    <script> 
    $(function() {
        fill_datatable();
        function fill_datatable(filter_kdoutput = '')
        {            
            var dataTable = $('#paket-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('paket.index') }}",
                    data:{filter_kdoutput:filter_kdoutput}
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'nmpaket', name: 'nmpaket' },
                    { data: 'pagurmp', name: 'pagurmp', className: "text-right" },
                    { data: 'progres_fisik', name: 'progres_fisik', className: "text-right" },
                    { data: 'kdsatker', name: 'kdsatker' }
                ]
            });
        }
        $('#filter').click(function(){
            var filter_kdoutput = $('#filter_kdoutput').val();

            if(filter_kdoutput != '' && filter_kdoutput != '')
            {
                $('#paket-table').DataTable().destroy();
                fill_datatable(filter_kdoutput);
            }
            else
            {
                alert('Select Both');
            }
        });
        $('#reset').click(function(){
            $('#filter_kdoutput').val('');
            $('#paket-table').DataTable().destroy();
            fill_datatable();
        });
      });
    </script>
@stop

