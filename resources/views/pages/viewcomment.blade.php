@extends('layouts.main')
@section('content')
<div class="container">
        @if(count($comments) > 0)

            @foreach($comments as $c)
            <div class="card my-4">
                <div class="card-header">
                    <h3>Created at : </h3>
                    <h5>{{ $c->created_at}}</h5>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <h4>{!! $c->comment !!}</h4>
                    <footer class="card-footer bg-white">
                        <p class="float-right blockquote-footer">
                            By <cite title="source title">Prof. {{ $c->teacher_name }}</cite>
                        </p>
                    </footer>
                    </blockquote>
                </div>
            </div>
            @endforeach
            @endif



</div>
@endsection
