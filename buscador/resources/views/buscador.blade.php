@extends('layout')

@section('content')
    <form action="{{ url('buscador')}}" method="post">
        <!--  -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label for="txtBuscador">Digite lo que desea buscar:</label>
            <input type="text" class="form-control" id="txtBuscador">
        </div>

        <button type="submit" class="btn btn-default" onclick="/buscador">Buscar</button>


    </form>
    

@endsection