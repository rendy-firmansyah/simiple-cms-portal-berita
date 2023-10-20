@extends('layouts.main-user')

@section('title', 'News Content')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">News Content</h1>
</div>
<form method="POST" action="{{ route('news-content.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="title" class="form-label">News Headline</label>
            <input type="text" class="form-control" id="title" name="headline" placeholder="Masukkan judul berita" required>
        </div>
    
        <div class="col-md-6 mb-3">
            <label for="date" class="form-label">Date Created</label>
            <input type="date" class="form-control" id="date" name="date_created" required>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" class="form-control" id="image" name="upload_image" accept="image/*" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="categories" class="form-label">Category Type</label>
            <select class="form-control col-md-15" name="categories_id" id="">
                <option selected disabled> -- Selected Category -- </option>
                @foreach ($categories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">News content</label>
        <textarea class="form-control" id="content" name="news_content" rows="5" placeholder="Masukkan isi berita" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary w-100">Add Data</button>
</form>

<div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
    <h5 class="h5 mb-0 text-gray-800">List News Content : </h5>
</div>

<table class="table table-striped w-100">
    <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Headline</th>
          <th scope="col">Date</th>
          <th scope="col">Image</th>
          <th scope="col">Category</th>
          <th scope="col">Content</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
            @foreach($content as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->headline }}</td>
                    <td>{{ $item->date_created }}</td>
                    <td><img src="{{ asset('images/content/' . $item->upload_image) }}" alt="Image" class="img-fluid" width="70"></td>
                    <td>{{ $item->categories->name }}</td>
                    <td>{{ Str::limit($item->news_content, 100) }}</td>
                    <td class="d-flex">
                        <a href="{{route('news-content.edit', $item->id)}}" class="btn btn-warning mx-2"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>
                        <form action="{{route('news-content.destroy', $item->id)}}" method="POST">
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