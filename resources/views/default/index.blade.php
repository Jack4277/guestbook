@extends('layouts.layout')
@section('content')
    <form class="form-signin" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <h2 class="form-signin-heading">Welcome to GuestBook</h2>

        <label for="inputName" class="sr-only">Name</label>
        <input name="username" type="text" id="inputName" value="{{ old('username') }}" class="form-control" placeholder="Name" required autofocus>
        <br>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required value="{{ old('email') }}">
        <br>
        <label for="inputUrl" class="sr-only">Url</label>
        <input name="url" type="text" id="inputUrl" class="form-control" placeholder="Url" value="{{ old('url') }}">
        <br>
        <label for="inputMsg" class="sr-only">Message</label>
        <textarea name="msg" id="inputMsg" cols="39" class="form-control" required>{{ old('msg') }}</textarea>
        <br>
        <label for="inputAvatar" class="sr-only">Avatar Image</label>
        <input name="img" type="file" id="inputAvatar" class="form-control">
        <br>
        {!! Recaptcha::render() !!}
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Send Message</button>
        <br>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @elseif($success)
              <div class="alert alert-success">
                  {{ $success }}
              </div>
        @endif
    </form>
    <br>
    <h3 class="page-header">All messages</h3>
    {{--{{ dd($messages) }}--}}

    @if(count($messages)>0)
        @foreach($messages as $msg)
            <div class="row bg">
                <div class="col-md-1">
                    @if($msg->img)
                    <img src="/upload/{{ $msg->img }}" alt="name" class="img-circle img-responsive" />
                    @endif
                </div>

                <div class="col-md-11">
                    <p><b>{{ $msg->name }}</b> <small> {{ $msg->email }}</small></p>
                    <p>{{ $msg->msg }}</p>
                </div>
            </div>
            <br>
        @endforeach
    @endif
    <div class="row">
        <div class="container">
            {{ $messages->links() }}
        </div>

    </div>
@endsection