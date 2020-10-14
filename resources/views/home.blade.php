@extends('master')

@section('title', 'HomePage')

@section('content')

<div class="duplicate-link" style="position: absolute; left: 900px; top: 200px; font-size: xx-large;">
    <a href="/merge&fix" >Merge & Fix</a>
</div>

<br />

<table class="table table-bordered">
    <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Prefix</th>
        <th>Phone</th>
    </tr>
    @foreach($filter_members as $row)
        <tr>
            <td>{{$row->first_name}}</td>
            <td>{{$row->last_name}}</td>
            <td>{{$row->email}}</td>
            <td>{{$row->prefix}}</td>
            <td>{{$row->phone}}</td>
        </tr>
    @endforeach

@endsection
