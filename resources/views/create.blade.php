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
    Add Question
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
      <form method="post" action="{{ route('questions.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="email">Content</label>
              <input type="text" class="form-control" name="content"/>
          </div>
          <input type="hidden" class="form-control" name="answer" value="" />
          <div class="form-group">
              <label for="phone">Email</label>
              <input type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="password">Status</label>
              <select class="form-control" id="status" name="status">
                <option value="notanswered">Not Answered</option>
                <option value="inprogress">In Progress</option>
                <option value="answered">Answered</option>
              </select>
          </div><br />
          <button type="submit" class="btn btn-block btn-danger">Create Question</button>
      </form>
  </div>
</div>
@endsection