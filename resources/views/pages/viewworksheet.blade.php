@extends('layouts.main')
@section('content')
<div class="container">

        @if(count($worksheets) > 0)
        @for($x = 0;$x < count($worksheets);$x++)
        {{-- @if($x % 3 == 0) --}}
            <div class = "my-3 p-2 border border-primary rounded-lg">
        {{-- @elseif($x % 3 == 1)
            <div class = "m-1 p-2 bg-success border rounded-lg">
        @else
            <div class = "m-1 p-2 bg-warning border rounded-lg">
        @endif --}}

        <object width="1000" height="400" data="storage/files/{{ $worksheets[$x]->file }}">
        </object>
            <h4 class="text-dark">{{ $worksheets[$x]->description }}</h4>
             <h6 class="text-dark">By {{ $worksheets[$x]->teacher }}</h6>
        </div>

        @endfor
        @else
            <h1>No Worksheets!!</h1>
        @endif
</div>
@endsection
