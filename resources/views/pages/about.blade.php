@extends('layouts/main')
@section('content')
<style>
    .marg{
        border:4px solid black;
    }
</style>
<h1 style="text-align:center ;color:#121254; font-variant:small-caps" class="">
    <u >Educational Qualifications and Work Profile of our Educators!</u>
</h1>
<br>
    <div class="card card-body bg-light">
    <h2 style="text-align:center;font-family:'Times New Roman', Georgia, serif; font-size:40px;background-color:#ff6933; color:#121254;"><b>Co-Founders of our Educational Institution</b></h2>
    <br>

    <div class="container">
        <div class="card mb-3">
                <div class="row no-gutters">
                        <div class="col-md-4 col-lg-4">
                                <img class="card-img-top" src="none.jpg" alt="Card image" max-height=325px;>
                        </div>
                        <div class="col-md-8 col-lg-8">
                                <div class="card-body">
                                        <h1  style="color:#121254; font-family:'21st Century', fantasy" class="card-title">Prof. ABC</h1>
                                        <p style="font-size:24px; font-family:cursive" class="card-text"><b>Hello, I am the cofounder of Happy Tutions. I have completed my engineering and I have done M.E. from ABC college. I believe in the base foundation of a child.</b></p>
                                        <p style="text-align:right; height:auto; width:auto; background-color:#121254;color:#FFAE77;" class="card-footer blockquote">Co-Founder</p>
                                      </div>
                        </div>
                </div>
            </div>

            <div class="card mb-3">
                    <div class="row no-gutters">
                            <div class="col-md-8 col-lg-8">
                                    <div class="card-body">
                                            <h1  style="color:#121254; font-family:'21st Century', fantasy" class="card-title">Prof. XYZ</h1>
                                            <p style="font-size:24px; font-family:cursive" class="card-text"><b>Hello, I am the cofounder of Happy Tutions. I have completed my engineering and I have done M.E. from ABC college. I believe in the base foundation of a child.</b></p>
                                            <p style="text-align:left; height:auto; width:auto; background-color:#121254;color:#FFAE77;" class="card-footer blockquote">Co-Founder</p>
                                          </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                    <img class="card-img-top" src="none.jpg" alt="Card image" max-height=325px;>
                            </div>

                    </div>
                </div>
            </div>

                {{-- <div class="card mb-3" style="margin-right:100px; margin-left:100px; ">
                        <img class="card-img-top" src="none.jpg" alt="Card image" max-height=325px;>
                        <div class="card-body">
                          <h1  style="color:#566f90; font-family:'21st Century', fantasy" class="card-title">Prof. Nitesh Karsi</h1>
                          <p style="font-size:24px; font-family:cursive" class="card-text"><b>Hello, I am the cofounder of SGT. I have completed my engineering and I have done M.E. from ABC college. I believe in the base foundation of a child.</b></p>
                          <p class="card-footer">Co-Founder</p>
                        </div>
                      </div>
                       --}}

                      {{-- <div class="card marg" style="margin-left:100px; margin-right:100px;">
                            <img class="card-img-top " src="none.jpg" alt="Card image" max-height=325px;>
                            <div class="card-body">
                              <h1 style="color:#566f90; font-family:'21st Century', fantasy" class="card-title">Prof. Nitesh Karsi</h1>
                              <p style="font-size:24px; font-family:cursive" class="card-text"><b>Hello, I am the cofounder of SGT. I have completed my engineering and I have done M.E. from ABC college. I believe in the base foundation of a child.</b></p>
                          <p class="card-footer">Co-Founder</p>
                            </div>
                          </div> --}}


        </div>
    </div>


    {{-- <div class="row">
        <div class="col-md-3 col-lg-3">
                <img src="none.jpg" class="rounded-circle" style="border: 2px solid black;200px" alt="noimage" width=200px; height=225px; >
        </div>
        <div class="col-md-3 col-lg-3 well">
            <h2 style="color:#566f90;" class = "font-weight-bold" ><u>Prof. Nitesh Karsi</u></h2>
            <h4>Co-founder</h4>
            <p style="color:#566f90; font-size:17px"><b>Hello, I am the cofounder of SGT. I have completed my engineering and I have done M.E. from ABC college. I believe in the base foundation of a child.</b></p>
        </div>

        <div class="col-md-3 col-lg-3">
                <img src="none.jpg" class="rounded-circle" style="border: 2px solid black; " alt="noimage" width=200px; height=225px; >
        </div>
        <div class="col-md-3 col-lg-3 well">
                <h2 style="color:#566f90;"><u>Prof. ABC Karsi</u></h2>
            <h4>Co-founder</h4>
                <p style="color:#566f90; font-size:17px"><b>Hello, I am the cofounder of SGT. I have completed my engineering and I have done M.E. from ABC college. I believe in the base foundation of a child.</b></p>
        </div>
    </div>
</div> --}}

<br><br>
<hr>
<div class="row">
        <div class="col-lg-4 col-md-4"></div>
    <div class="col-lg-4 col-md-4">
            <button style="background-color:#ff6933; color:#121254;" id="shs"><h2 >Educators of our Institution:</h2></button>

    </div>
    <div class="col-lg-4 col-md-4"></div>

</div>
<br><br>

    <div id="shows">
    @if(count($teachers) > 0)

        @for($x=0;$x<count($teachers);$x++)
            @if($x%3 == 0)
            <div  class="card-deck">
            @endif
                <div style="" class="card mb-3" >


                            <img  style="" class="card-img-top" src="storage/cover_images/{{ $teachers[$x]->cover_image }}" alt="Card image" height=325px; >

                            <div class="card-body">
                                    <h2 class="card-title" style="color:#121254; font-family:'21st Century', fantasy"><u>Prof. {{ $teachers[$x]->name }}</u></h2>
                                    <p style="font-size:24px; font-family:cursive" class="card-text">{{ $teachers[$x]->description }}</p>
                                <p style="text-align:right; height:auto; width:auto; background-color:#121254;color:#FFAE77;" class="card-footer blockquote">-Proud Teacher at Happy Tutions</p>
                                  </div>
                          </div>
            @if($x%3 == 2 || $x == count($teachers)-1)
                </div>
            @endif
        @endfor

    @else
        <p>No teachers!</p>
    @endif
</div>


<script>
    $(document).ready(function(){
        $("#shows").hide();
  $("#shs").click(function(){
    $("#shows").toggle();
  });
});
</script>
@endsection
