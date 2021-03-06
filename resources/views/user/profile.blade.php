@extends('layout.main')

@section('title', 'Profile page')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-body">
                <img class="avatar-img" src="{{ asset('uploads/avatars/' . $user->avatar) }}" alt="{{ $user->name }}">
                <h2>{{ $user->name }}</h2>
                <p>Username: {{ $user->username }}</p>
                <p>Twitter account: <a href="https://twitter.com/{{$user->twitter}}">{{ $user->twitter }}</a></p>
                <p>Date of birth: {{ date('d M Y',strtotime($user->dob)) }}</p>
                <div class="avatar-form">
                    {!!  Form::open(['route' => 'profile', 'files'=>true]) !!}

                    <p class="form-group margintop-25">
                        {!! Form::label('avatar', 'Update your profile image') !!}
                        {!! Form::file('avatar', ['class' => '']) !!}
                    </p>

                    <p class="form-group margintop-45">
                        {!!  Form::submit('Save', ['class' => "btn btn-primary btn-block margin-top"]) !!}
                    </p>

                    {!!  Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection