@extends('master')

@section('title', 'Home')

@section('content')

<div class="duplicate-link">
    <a href="/merge&fix" >Merge & Fix</a>
</div>

<br/>

<table class="members">
    <tr>
        <th>ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Prefix</th>
        <th>Phone</th>
    </tr>
    @foreach($members as $row)
        <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->first_name}}</td>
            <td>{{$row->last_name}}</td>
            <td>{{$row->email}}</td>
            <td>{{$row->prefix}}</td>
            <td>{{$row->phone}}</td>
        </tr>
    @endforeach
</table>

@endsection
