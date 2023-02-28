@extends('layout')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
</style>
<div class="push-top">
@if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
@endif
@if(Session::has('fail'))
    <div class="alert alert-danger">
       {{Session::get('fail')}}
    </div>
@endif
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>id</td>
          <td>username</td>
          <td>name</td>
          <td>email</td>
          <td>email_verified_at</td>
          <td>created_at</td>
          <td>updated_at</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($employee as $employees)
        <tr>
            <td>{{$employees->id}}</td>
            <td>{{$employees->username}}</td>
            <td>{{$employees->name}}</td>
            <td>{{$employees->email}}</td>
            <td>{{$employees->email_verified_at}}</td>
            <td>{{$employees->created_at}}</td>
            <td>{{$employees->updated_at}}</td>
            <td class="text-center">
                <a href="{{ route('employee.edit', $employees->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('employee.destroy', $employees->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
<div>

    <a href="{{ route('employee.create')}}" class="btn btn-success btn-lg">Create</a>
    <a href="http://127.0.0.1:8000/equipment" class="btn btn-success btn-lg">toEquipment</a>
 @endsection
