@extends('layouts.main')

@section('title', 'User Employee')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User Employee</h1>
</div>
<form>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter a name admin">
        </div>
        <div class="col-md-6 mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter an email">
        </div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Enter a password">
    </div>
    <button type="submit" class="btn btn-primary w-100">Add Data</button>
</form>

<div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
    <h5 class="h5 mb-0 text-gray-800">Register Data Employee : </h5>
</div>

<table class="table table-striped w-75">
    <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Created</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        {{-- @if($categories->isEmpty())
            <tr>
                <td colspan="3">Data masih kosong</td>
            </tr>
        @else
            @foreach($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at }}</td>
                </tr>
            @endforeach
        @endif --}}
      </tbody>
</table>
@endsection