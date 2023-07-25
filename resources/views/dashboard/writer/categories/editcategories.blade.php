@extends('dashboard.layouts.master')

@section('title')
    edit categorie
@endsection

@section('content')
<div class="card card-warning">
    <div class="card-header">
      <h3 class="card-title">edit categorie</h3>
    </div>

<form action="{{ route('categories.update', $categorie->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="card-body">
<div class="form-group">
    <label for="exampleInputPassword1">ادخل الاسم </label>
    <input type="text" name="name" value="{{ $categorie->name }}"class="form-control">
</div>
<div class="form-group">
    <label for="exampleInputPassword1">والوصف</label>
    <input type="text" name="description" value="{{ $categorie->description }}" class="form-control">
</div>
<div class="form-group">
    <label for="exampleInputPassword1">image</label>
    <input type="file" name="image"  class="form-control">
    <img   style="width: 100px;height: 100px; border-radius: 50%" src="{{ URL::asset('dashboard/images/categories/'.$categorie->image) }}" alt="">
</div>
<div class="modal-footer">
  <
  <button type="submit" class="btn btn-warning">Save changes</button>
</div>
    </div>
</form>
</div>
@endsection
