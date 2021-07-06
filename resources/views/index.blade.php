@extends('dashboard')

@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }
</style>

<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <h3><a href="/questions/create" style="float: right;">Ask a Question</a></h3>
  <table class="table" id="questions_table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Name</td>
          <td>Content</td>
          <td>Email</td>
          <td>Status</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($question as $questions)
        <tr>
            <td>{{$questions->id}}</td>
            <td>{{$questions->name}}</td>
            <td>{{$questions->content}}</td>
            <td>{{$questions->email}}</td>
            
            <td>
              @if ($questions->status == 'notanswered') 
                Not Answered
              @elseif ($questions->status == 'inprogress') 
                In Progress
              @elseif ($questions->status == 'answered')
                Answered
              @endif
            </td>
            <td class="text-center">
                <a href="{{ route('questions.edit', $questions->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                <form action="{{ route('questions.destroy', $questions->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection