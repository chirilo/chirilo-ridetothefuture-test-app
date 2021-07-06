@extends('dashboard')

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
    Edit & Update
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
      <form method="post" action="{{ route('questions.update', $question->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" value="{{ $question->name }}"/>
          </div>
          <div class="form-group">
              <label for="email">Content</label>
              <input type="text" class="form-control" name="content" value="{{ $question->content }}"/>
          </div>
          <div class="form-group">
              <label for="phone">Email</label>
              <input type="email" class="form-control" name="email" value="{{ $question->email }}"/>
          </div>
          <div class="form-group">
              <label for="password">Status</label>
              <select class="form-control" id="status" name="status">
                @if ($answer->status == 'notanswered')
                  <option value="notanswered" selected>Not Answered</option>

                @elseif ($answer->status == 'inprogress')
                  <option value="inprogress" selected>In Progress</option>
                @elseif ($answer->status == 'answered')
                  <option value="answered" selected>Answered</option>
                @elseif ($answer->status == 'spam')
                  <option value="spam" selected>Spam</option>
                @endif
              </select>

          </div><br />
          <button type="submit" class="btn btn-block btn-danger">Update Question</button>
      </form>
  </div>
</div>
@endsection