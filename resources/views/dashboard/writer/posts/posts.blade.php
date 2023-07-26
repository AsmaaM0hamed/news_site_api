@extends('dashboard.layouts.master')

@section('title')
    posts
@endsection

@section('content')

@include('dashboard.layouts.messages_alert')

<div class="card">
    <div class="card-header">
      <h3 class="card-title">posts Table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div >
            <a  class="btn btn-success" href="{{ route('posts.create') }}" >
                add posts
            </a>

          </div>  <br>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>image</th>
            <th>name</th>
            <th>description</th>
            <th>body</th>
            <th >edit</th>
            <th>delet</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $loop->index+1 }}</td>
               <td><img style="width: 100px;height: 100px; border-radius: 50%" src="{{ URL::asset('dashboard/images/posts/'.$post->image) }}" alt="post image"></td>
                <td>{{ $post->title }}</td>
                <td>
              {{ \Str::limit($post->description,50) }}

                </td>
                <td>
                    {{ \Str::limit($post->bady,250) }}

                      </td>
                <td>
                    <a href="{{route('posts.edit', $post->id) }}"type="button" class="btn btn-warning" >
                       edit</a>
                </td>
                <td>
                    <form action="{{ route('posts.destroy', $post->id)  }}" method="post">
                    @csrf
                    @method('delete')
                   <button type="submit" class="btn btn-danger">delet</button>

                    </form>
                </td>
            </tr>
            @endforeach


        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <ul class="pagination pagination-sm m-0 float-right">
        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
      </ul>
    </div>


  </div>


@endsection
