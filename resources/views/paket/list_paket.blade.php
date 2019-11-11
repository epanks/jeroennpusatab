@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <table class="table table-bordered" id="users-table">
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



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
    console.log('Hi!'); 
    $(function() {
          $('#users-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: 'paket/json',
              columns: [
                  { data: 'id', name: 'id' },
                  { data: 'nmpaket', name: 'nmpaket' },
                  { data: 'pagurmp', name: 'pagurmp', className: "text-right" },
                  { data: 'progres_fisik', name: 'progres_fisik', className: "text-right" },
                  { data: 'kdsatker', name: 'kdsatker' }
              ]
          });
      });
    </script>
@stop

