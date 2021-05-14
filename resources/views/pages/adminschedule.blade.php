@extends('layouts.main')
@section('content')
<script src="/js/Bootstrap/Select/bootstrap-select.js"></script>
<style>
    .bg{
        background-color:#d9d5d5;
        
    /* background-repeat: no-repeat;
    background-size:cover;
    background-position:center;  */
    }
    /* .pd{
        padding:300px;
    }
    .d1{
        text-align: center;
        /* margin-left:235px; */
         /*width:500px; 
         font-size:22px; 
         font-family: cursive; 
         background-color: black;
         color:burlywood;
    }
*/
.d{
    font-family:'Times New Roman', Times, serif; 
    color:#566f90;
    font-size:20px;

}
/*
    .d2{
        text-align: center;
         font-family:'Times New Roman', Times, serif; 
         font-size:25px; 
         color:saddlebrown;
    } */
</style>

<form method="POST" action="{{ url('/schedule/admin') }}" aria-label="{{ __('Schedule') }}">
    @csrf
    <div class="card-columns">
        <div class="container">
            <div class="card bg-light">   
                    {{-- <div class="form-group" style="text-align:center;" >
                            <select class=" form-control d1"   name="standard" id="standard">
                                    <option class="d1" value="8">Standard VIII</option>
                                    <option  class="d1" value="9">Standard IX</option>
                                    <option class="d1" value="10">Standard X</option>
                            </select>
                    
                        {{-- <label for="date" class="col-md-2 col-form-label text-md-right">{{ __('Date') }} </label>
                            <div class="col-md-6">
                                    <input id="date" type="date" class="form-control" name="date" required autocomplete="date">
                                </div> --}}
                        {{-- </div> --}}
                        <div class="card-body">
                                <div class="form-group row">
                                        <label for="date" class="col-md-4 col-form-label text-md-right d">{{ __('Select Standard :') }} </label>
                                            </button>
                            
                                        <div class="col-md-6">
                                                <div class="form-group " style="text-align:center;" >
                                                        <select class=" form-control d"   name="standard" id="standard">
                                                                <option class="d" value="8">Standard VIII</option>
                                                                <option  class="d" value="9">Standard IX</option>
                                                                <option class="d" value="10">Standard X</option>
                                                        </select>
                                                
                                                    {{-- <label for="date" class="col-md-2 col-form-label text-md-right">{{ __('Date') }} </label>
                                                        <div class="col-md-6">
                                                                <input id="date" type="date" class="form-control" name="date" required autocomplete="date">
                                                            </div> --}}
                                                    </div>       
                                        </div>
                                        
                                </div>
                               
            <div class="form-group row">
                    <label for="date" class="col-sm-4 col-md-4 col-form-label text-md-right d">{{ __('Date :') }} </label>
                        </button>
        
                    <div class="col-sm-4 col-md-6">
                        <input id="date" type="date" class="form-control d" name="date" required autocomplete="date"> 
                    </div>
        
            </div>
            <div class="form-group row">
                    <label for="time_in" class="col-sm-4 col-md-4 col-form-label text-md-right d">{{ __('Time in :') }}</label>
        
                    <div class="col-sm-6 col-md-6">
                        <input id="time_in" type="time" class="form-control d" name="time_in" required autocomplete="time_in">
                    </div>
            </div>
            <div class="form-group row">
                    <label for="time_out" class="col-sm-4 col-md-4 col-form-label text-md-right d">{{ __('Time out :') }}</label>
        
                    <div class="col-sm-6 col-md-6">
                        <input id="time_out" type="time" class="form-control d" name="time_out" required autocomplete="time_out">
                    </div>
            </div>
            <div class="form-group row">
                <label for="no_lecs" class="col-sm-4 col-md-4 col-form-label text-md-right d">{{ __('Enter the number of lectures :') }}</label>
        
                <div class="col-sm-6 col-md-6">
                    <input id="no_lecs" class="form-control d" name="no_lecs" required autocomplete="no_lecs" value="0" min="0" max="4" type="number" />
                </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-4">
            <button style="border: 1px solid darkblue;" id="show" type="button" class="btn btn-default d">
                {{ __('Show details =>') }}
            </button>
        </div>
            
            <br><br><br><br>
        </div>
        </div>
    </div>
                        
</div>
</div>
<div  id="card-container" class="">
        
                
        
</div>
<div id="hs" class="form-group row mb-0">
        <div class="col-md-6">
            <button style="border: 1px solid darkblue;  font-weight:bolder;" type="submit" class="btn btn-default d">
                {{ __('Make Schedule!') }}
            </button>
        </div>
</div>


</div>
    <script>
        $(document).ready(function() {
        $("#hs").hide();
        $("#show").click(function(){
            $('#card-container').children().remove().end();
            var no = $("#no_lecs").val();
            console.log(no);

            var i=1;
            for(i = 1; i<=no ; i++)
            {
                let cardContainer;

let createTaskCard = () => {

    let card = document.createElement('div');
    card.className = 'card bg-light';

    let cardBody = document.createElement('div');
    cardBody.className = 'card-body';

    let title = document.createElement('LABEL');
    title.setAttribute("for","time_in_"+i);
    title.setAttribute("class","container");
    title.innerHTML="<h1>Lecture "+i+"</h1>";
    title.className = 'card-title';

    let div1 = document.createElement('div');
    let l1 = document.createElement('LABEL');
                l1.setAttribute("for","time_in_"+i);
                l1.setAttribute("class"," col-form-label text-md-right");
                l1.innerHTML="Select Time in "+i+":  ";
                //l1.className = 'c1';
    
    let i1 = document.createElement('INPUT');
    i1.setAttribute("type","time");
    i1.setAttribute("name","time_in_"+i);
    i1.setAttribute("class","col-md-8 form-control");
    //i1.className = 'c2';
    //document.getElementById("card-container").appendChild(y);



    let div2 = document.createElement('div');
    let l2 = document.createElement('LABEL');
                l2.setAttribute("for","time_out_"+i);
                l2.setAttribute("class"," col-form-label text-md-right");
                l2.innerHTML="Select Time out "+i+": ";
                //l2.clant.getElementById("card-container").appendChild(z);


    let i2 = document.createElement('INPUT');
    i2.setAttribute("type","time");
    i2.setAttribute("name","time_out_"+i);
    i2.setAttribute("class","col-md-8 form-control");
    //i2.className = 'c4';
    //document.getElssName = 'c3';
                //documeementById("card-container").appendChild(y);

    let div3 = document.createElement('div');

    let l3 = document.createElement('LABEL');
                l3.setAttribute("for","select_teacher_"+i);
                l3.setAttribute("class"," col-form-label text-md-right");
                l3.innerHTML="By : ";
                //l2.clant.getElementById("card-container").appendChild(z);

    let s = document.createElement('SELECT');
                s.setAttribute("name","teacher_"+i);
                s.setAttribute("class","down form-control");
                s.setAttribute("style","width:100px; margin-top:0px;");
                s.setAttribute("id","select_"+i);
                document.getElementById("card-container").appendChild(s);


                var teachers = <?php echo json_encode($teachers); ?>;
                console.log(teachers);
                $.each( teachers, function(key,value) {
                    $.each(this, function(key, value) {
                        if(key=="name") {
                            $('#select_'+i).append(new Option(value,value));
                        }
                    });
                });

    // var y = document.createElement('LABEL');
    //             y.setAttribute("for","time_in_"+i);
    //             y.setAttribute("class","container");
    //             y.innerHTML="<h1>Lecture "+i+"</h1>";
    //             document.getElementById("card-container").appendChild(y);


                // var z = document.createElement('LABEL');
                // z.setAttribute("for","time_in_"+i);
                // z.setAttribute("class","col-md-4 col-form-label text-md-right");
                // z.innerHTML="Select Time in "+i;
                // document.getElementById("card-container").appendChild(z);


                // var y = document.createElement('INPUT');
                // y.setAttribute("type","time");
                // y.setAttribute("name","time_in_"+i);
                // y.setAttribute("class","col-md-8 form-control");
                // document.getElementById("card-container").appendChild(y);
                
                
                // var y = document.createElement('INPUT');
                // y.setAttribute("type","time");
                // y.setAttribute("name","time_out_"+i);
                // y.setAttribute("class","col-md-8 form-control");
                // document.getElementById("card-container").appendChild(y);

                

                // var z = document.createElement('SELECT');
                // z.setAttribute("name","teacher_"+i);
                // z.setAttribute("class","down");
                // z.setAttribute("id","select_"+i);
                // document.getElementById("card-container").appendChild(z);


                // var teachers = <?php echo json_encode($teachers); ?>;
                // //console.log(teachers);
                // $.each( teachers, function(key,value) {
                //     $.each(this, function(key, value) {
                //         if(key=="name") {
                //             $('#select_'+i).append(new Option(value,value));
                //         }
                //     });
                // });

                cardBody.appendChild(title);
    cardBody.appendChild(div1);
    div1.appendChild(l1);
    div1.appendChild(i1);
    cardBody.appendChild(div2);
    div2.appendChild(l2);
    div2.appendChild(i2);
    cardBody.appendChild(div3);
    div3.appendChild(l3);
    div3.appendChild(s);
    card.appendChild(cardBody);
    cardContainer.appendChild(card);
}    
        


let initListOfTasks = () => {
    if (cardContainer) {
        document.getElementById('card-container').replaceWith(cardContainer);
        return;
    }

    cardContainer = document.getElementById('card-container');
    
        createTaskCard();
};

initListOfTasks();
}
$("#hs").show();
});
        
    });
                
    </script>
@endsection