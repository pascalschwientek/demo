@extends('layout')

@section('content')
    <section class="hero">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Livestreams
                </h1>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="columns">
            <div class="column is-one-third">
                @foreach($results as $result)
                    <a href="/live/{{ $result->id->videoId }}">{{ $result->snippet->title }}</a><br>
                    <hr>
                @endforeach
            </div>
            <div class="column is-one-third">
                @if($video)
                    <img src="{{ $video->snippet->thumbnails->high->url }}">
                @endif
            </div>
            <div class="column is-one-third">
                @if($video)
                    <h1>{{ $video->snippet->title }}</h1>
                    <hr>
                    <span class="tag">
                      Watching: {{ $video->liveStreamingDetails->concurrentViewers }}
                    </span>
                    <span class="tag">
                      Started: {{ \Carbon\Carbon::parse($video->liveStreamingDetails->scheduledStartTime)->diffForHumans() }}
                    </span>
                    <hr>
                    <pre>{{ $video->snippet->description }}</pre>
                @endif
            </div>
        </div>
    </div>
@endsection