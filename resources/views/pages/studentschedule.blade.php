@extends('layouts.main')
@section('content')
<style>
    .schedule{
        background-image: url("{{ asset('/storage/bg/s.jpg') }}");
        background-repeat: no-repeat;
        background-size: cover;

         background-blend-mode: lighten;
         background-color: rgba(255, 255, 255, 0.1);
    }
</style>
<div class="schedule">
<div class="container" style="padding-top:10px;">
    {{-- <div class="jumbotron">
    <div class="card"> --}}
    @if($flag == 1)
        <!--{{ $x = 0 }}-->
        <div style="text-align:right;">
        <h1 style="text-align:right; color:#ff6933;" >Today's Schedule: </h1>
        <h6 style="color:#121254">({{ $schedules[$x]->date }})</h6>
        </div>
        <!-- {{ $y = 0 }} -->
        @while($schedules[$y]->date == $date)
            {{-- <div class="card">
            <div class="card-body"> --}}
                <h3 style="text-align:right; color:#ff6933;">{{ $total[$y]->time_in }} - {{ $total[$y]->time_out }}</h3>
                    <p style="text-align:right; color:#ff6933;"><b>Subject : </b>{{ $total[$y]->subject }} </p>
                {{-- </div> --}}
                    <p style="text-align:right; color:#ff6933; font-style:italic;">- By Prof. {{ $total[$y]->name }}</p>
                {{-- </div> --}}
                <!-- {{ $y++ }} -->
        @endwhile
        <!--{{ $x++ }}-->
    @else
        <!-- {{ $x = 0 }} -->
        <div style="">
        <h3 style="text-align:right; color:#ff6933;">No lecture today or yet to be updated</h3>
        </div>
    @endif

{{-- </div>
    </div> --}}
     @isset($schedules)
     <div style="text-align:right;">
        <button class="btn btn-default;" id="view"><h1 style="text-align:right; color:#ff6933;">View Past Schedules:</h1></button>
     </div>
        <div style="text-align:right;" id="shown">
        @if(count($schedules) > 0)
            @for(;$x < count($total);$x++)
                <h2 style="padding-left:20px; color:#121254" id="show_"+$x>For Day : {{ $total[$x]->date }}</h2>
                    {{-- <div class="card">
                            <div class="card-body"> --}}
                        <h3 style="color:#ff6933;">{{ $total[$x]->time_in }} - {{ $total[$x]->time_out }}</h3>
                                <p><b>Subject : </b>{{ $total[$x]->subject }} </p>

                                <p style="font-style:italic;">- By Prof.{{ $total[$x]->name }}</p>

            @endfor
    <br>
        @endif
</div>
     @endisset
</div>
</div>

<script>
$(document).ready(function(){
    $("#shown").hide();
  $("#view").click(function(){
    $("#shown").slideToggle(3000);
  });
});
</script>
@endsection
