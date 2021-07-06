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
  <table class="table" id="answers_table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Name</td>
          <td>Content</td>
          <td>Answer</td>
          <td>Email</td>
          <td>Status</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($answer as $answers)
        <tr>
            <td>{{$answers->id}}</td>
            <td>{{$answers->name}}</td>
            <td>{{$answers->content}}</td>
            <td>{{$answers->answer}}</td>
            <td>{{$answers->email}}</td>
            <td>
              @if ($answers->status == 'notanswered') 
                Not Answered
              @elseif ($answers->status == 'inprogress') 
                In Progress
              @elseif ($answers->status == 'answered')
                Answered
              @elseif ($answers->status == 'spam')
                Spam
              @endif
            </td>
            <td class="text-center">
                <a href="{{ route('answers.edit', $answers->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                @if ($answers->status == 'spam')
                <button class="btn btn-danger btn-sm"" type="button" disabled="disabled">Spam</button>
                @else
                <form action="{{ route('answers.destroy', $answers->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"" type="submit">Spam</button>
                  </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection