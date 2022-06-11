@extends('layouts.afterlogin')
@section('content')
<table border="3">
    <tr>
        <th>Id</th>
        <th>Name</th>
    </tr>
    @foreach($allusers as $ur)
        <tr>
            <td>{{$ur->id}}</td>
           <td><a href="{{route('userdetails',['id'=>$ur->id])}}">{{$ur->name}}</a></td>
           <td>{{$ur->email}}</td>
        </tr>
    @endforeach
</table>
@endsection