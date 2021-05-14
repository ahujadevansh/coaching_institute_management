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
    <div class="">
        <div style="text-align:right;"class="">

        <h1 style="text-align:right; color:#ff6933;" class="">Today's Schedule : </h1>
        <h6 style="color:#121254">({{ $today }})</h6>
        </div>
        @for($y = 0;$y < count($total);$y++)
                @if($total[$y]->date == $today)
                <div class="">
                    <h3 style="text-align:right; color:black;" class="">{{ $total[$y]->time_in }} To {{ $total[$y]->time_out }}</h3>
                    <h4 style="text-align:right; color:black; font-style:italic;"class="">- {{ $total[$y]->standard }}<sup>th</sup> Standard</h4>
                    {{-- @unset($schedules[$x]) --}}
                </div>
                @endif
        @endfor

</div>
    <div class="">
        <!-- {{ $salary = 0 }} -->
        <div style="text-align:right;">
                <button class="btn btn-default;" id="view"><h1 style="text-align:right; color:#ff6933;">Past Schedules:</h1>
        </div>
        <div style="text-align:right;" id="shown">
        @for($y = 0;$y < count($total);$y++)
                @if($total[$y]->date != $today)
                    <div id="shown" class="">
                <h2 style="padding-left:20px; color:#121254">{{ $total[$y]->date }}</h2>
                <h3 style="color:black;">From {{ $total[$y]->time_in }} To {{ $total[$y]->time_out }}</h3>
                <h3 style="font-style:italic;">- {{ $total[$y]->standard }}<sup>th</sup> Standard</h3>
                    <!--{{ $salary++ }}-->
                </div>
                @endif
        @endfor
    </div>
    <div style="text-align:right;">
            <button class="btn btn-default;" id="viewsal"><h1 style="text-align:right; color:#ff6933;">View Salary :</h1>
    </div>
    <div style="text-align:right;" id="shownsal">
            <h1 style="font-style:italic; color:black;">Salary uptil now : {{ $mainsalary*$salary }}</h1>
    </div>

</div>
<br><br>
</div>

<script>
        $(document).ready(function(){
            $("#shown").hide();
            $("#shownsal").hide();
          $("#view").click(function(){
            $("#shown").slideToggle(3000);
          });

          $("#viewsal").click(function(){
            $("#shownsal").slideToggle(1000);
          });
        });
        </script>
@endsection
