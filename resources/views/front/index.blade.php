@extends('layout.main')

@section('title', 'Social Home')

@section('content')
    <div class="row">
        {{--Main content--}}
        {{-- dit onderstaande na class col-md- ?--}}
        {{--{{ (auth()->check()) ? '9' : '6' }}--}}
        <div class="col-md-{{ (auth()->check()) ? '6' : '9' }} col-md-push-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if(auth()->check())
                        @include(('includes.formPostCreate'))
                        <hr>
                        <div class="post-content">
                            @foreach($posts as $post)
                                <span class="post-content__info">
                                                <span class="info-username">
                                                    <a href="{{ route('myposts', $post->user_id) }}">{{ $post->user->name }}</a>
                                                </span>
                                    &commat;{{ $post->user->username }} -
                                                Post Date: {{ $post->present()->createdAt }}
                                            </span><br>
                                {{ $post->body }}

                                {{--een if om none.png op te vangen--}}
                                @if($post->post_image == 'none.png')
                                    {{ ' ' }}
                                @else
                                    <img src="{{ asset($post->post_image) }}" alt="" width="100%"
                                         height="auto">
                                @endif
                                <hr>
                            @endforeach
                        </div>
                    @else
                        {{--Content als er niet is ingelogd--}}
                        <div class="anonymous-content">
                            <h1>Welcome to Social Network</h1>
                            <p>Connect with your friends — and other fascinating people. Get in-the-moment
                                updates on
                                the
                                things that interest you. And watch events unfold, in real time, from every
                                angle.
                            </p>
                        </div>
                    @endif

                </div>
            </div>
        </div>

        {{--first sidebar--}}
        <div class="col-md-3 col-md-pull-{{ (auth()->check()) ? '6' : '9' }}">
            <div class="row">
                <div class="col-md-12 panel-profile">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                @if(!auth()->check())
                                    <div class="col-md-12">
                                        <h3>New to The Network</h3>
                                        <a href="{{ route('register.get') }}"
                                           class="btn btn-warning">Sign
                                            Up for Social
                                            Network!</a>
                                        <hr>
                                        @include('includes.formLogin')
                                    </div>
                                @else
                                    {{--Panel login User--}}
                                    @include('includes.user-panel')
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end panel-profile--}}
            </div>
        </div>

        {{--second sidebar--}}
        @if(auth()->check())
            {{--Twitter panel by default twitterDev user--}}
            <div class="col-md-3 panel-twitter">
                @include('includes.twitter-panel')
            </div>{{--end panel-twitter--}}
        @endif
    </div>

@endsection