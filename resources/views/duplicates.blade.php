@extends('master')

@section('title', 'Merge&Fix')

@section('content')

<h1>Potential duplication</h1>
</br>
<table class="members">
    <tr>
        <th>ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Prefix</th>
        <th>Phone</th>
    </tr>
    @foreach($duplicate_members as $row)
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
