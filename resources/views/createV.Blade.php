@extends('layout')
@section('content')
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>
<div class="card push-top">
  <div class="card-header">
    Add Entry
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('employee.store') }}">
          <div class="form-group">
              @csrf
              <label for="username">Никнейм</label>
              <input type="text" class="form-control" name="username"/>
          </div>
          <div class="form-group">
              <label for="name">Имя</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="email">e-mail</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Create Entry</button>
      </form>
  </div>
</div>
@endsection