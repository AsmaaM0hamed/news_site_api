@extends('dashboard.layouts.master')

@section('title')
    add post
@endsection

@section('content')
<div class="card"> <div class="card-header">
    <h3 class="card-title">add post</h3>
  </div>

<div class="card-body">
<form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="categorie_id">القسم</label>
            <select name="categorie_id" class="form-control" id="categorie_id">
                <option value="">يرجى اختيار القسم</option>
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                @endforeach
            </select>
        </div>
        <label for="exampleInputEmail1">posts name</label>
        <input class="form-control form-control-lg" type="text" name="name">
        <br>
        <label for="exampleInputPassword1">posts description</label>
        <input type="text" name="description" class="form-control">

        <label for="exampleInputPassword1">image</label>
        <input type="file" name="image" class="form-control">

        <label for="exampleInputPassword1">posts body</label><br>
        <textarea name="body" id="" cols="100" rows="10"></textarea>

      </div>


</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary">add</button>
</form>
</div>
</div>
@endsection
