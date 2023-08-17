@extends('dashboard.layouts.master')

@section('title')
    edit post
@endsection

@section('content')
<div class="card card-warning">
    <div class="card-header">
      <h3 class="card-title">edit post</h3>
    </div>

<form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="card-body">

<div class="form-group">
    <label for="exampleInputPassword1">ادخل الاسم </label>
    <input type="text" name="name" value="{{ $post->title }}"class="form-control">
</div>
<div class="form-group">
    <label for="exampleInputPassword1">والوصف</label>
    <input type="text" name="description" value="{{ $post->description }}" class="form-control">
</div>
<div class="form-group">
    <label for="exampleInputPassword1">image</label>
    <input type="file" name="image"  class="form-control">
    <img   style="width: 100px;height: 100px; border-radius: 50%" src="{{ URL::asset('dashboard/images/posts/'.$post->image) }}" alt="">
</div>
<label for="exampleInputPassword1">posts body</label><br>
<textarea name="body" id="" cols="100" rows="10">{{ $post->bady }}</textarea>
<div class="modal-footer">
  <
  <button type="submit" class="btn btn-warning">Save changes</button>
</div>
    </div>
</form>
</div>
@endsection
