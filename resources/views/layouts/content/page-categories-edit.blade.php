@extends('layouts.main')

@section('title', 'Categories')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Categories</h1>
</div>
<form method="POST" action="{{route('categories.update', $categories->id)}}">
    @method('PUT')
    @csrf
    <div class="mb-3">
      <label for="categories" class="form-label">Name Categories</label>
      <input type="text" name="categories" class="form-control w-25" id="categories" placeholder="Enter a name categories" value="{{$categories->name}}">
    </div>
    <button type="submit" class="btn btn-primary w-25">Updated Data</button>
</form>

<div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
    <h5 class="h5 mb-0 text-gray-800">List Categories : </h5>
</div>

<table class="table table-striped w-75">
    <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Name Categories</th>
          <th scope="col">Created Categories</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($category as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->created_at }}</td>
                <td class="d-flex">
                    <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-warning mx-2"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>
                    <form action=" {{route('categories.destroy', $item->id)}} " method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
      </tbody>
</table>
@endsection