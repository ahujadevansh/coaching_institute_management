<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <!-- Latest compiled and minified CSS -->

        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
         --}}

        <title>{{config('app.name','SGT')}}</title>

<style>
        .full {
            width: 100%;
        }
        .gap {
            height: 30px;
            width: 100%;
            clear: both;
            display: block;
        }
        .footer {
            background: #002147;
            height: auto;
            padding-bottom: 30px;
            position: relative;
            width: 100%;
            border-bottom: 1px solid #CCCCCC;
            border-top: 1px solid #DDDDDD;
        }
        .footer p {
            margin: 0;
        }
        .footer img {
            max-width: 100%;
        }
        .footer h3 {
            color: white;
            font-size: 18px;
            font-weight: 600;
            line-height: 27px;
            padding: 40px 0 0px;
            text-transform: uppercase;
          margin-bottom: 15px;
        }

        .footer h4 {
            color: white;
            font-size: 2em;
            font-weight: 600;
            line-height: 38px;
            padding: 40px 0 10px;
            font-family: cursive;
          font-weight: lighter;
        }

        .footer ul {
            font-size: 13px;
            list-style-type: none;
            margin-left: 0;
            padding-left: 0;
            margin-top: 0px;
            color: #7F8C8D;
          padding: 0 0 8px 0;
        }

        .email{
          border-bottom: 3px solid #fff;
        }
        .footer ul li a {
            padding: 0 0 12px 0;
            display: block;
        }
        .footer a {
            color: white;
          font-weight: lighter;
        }

        .footer p {
            color: white;
          font-weight: lighter;
          font-size:
        }

        .footer a:hover {
            text-decoration:none;
          font-weight: bold;
        }
        .supportLi h4 {
            font-size: 20px;
            font-weight: lighter;
            line-height: normal;
            margin-bottom: 0 !important;
            padding-bottom: 0;
        }

        .bg-gray {
            background-image: -moz-linear-gradient(center bottom, #BBBBBB 0%, #F0F0F0 100%);
            box-shadow: 0 1px 0 #B4B3B3;
        }

        }
        .footer a {
            color: #78828D
        }

        .footer-bottom {
          margin-top: 2em;
            border-top: 1px solid #DDDDDD;
            padding-top: 20px;
            padding-bottom: 10px;
        }
        .footer-bottom p.pull-left {
            padding-top: 6px;
          font-size: 0.75em
        }
    </style>
    </head>
    <body style="background: #e6ffff;">
        @include('layoutsa/auth')
        <div class="py-2" >
            @yield('content')
        </div>
    </body>
        <!-- Footer -->
        <footer>
                <div class="footer" id="footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <h4>Happy Tuitions </h4>
                                <p>Founder</p>
                                <h5 style="color:white;">Prof. ABC</h5>
                            </div>
                            <div class="col-lg-3 col-sm-2 col-xs-3">
                                <h3> Contact </h3>
                                <ul>
                                    <li><a class="email"href="#"> Email us @ : happytuitions@gmail.com </a></li>
                                    <br/>
                                </ul>
                            </div>
                            {{-- <div class="col-lg-3 col-sm-2 col-xs-3">
                                <ul>
                                    <li> <h5> <a href="#" style="margin-top: 5em"> ABOUT US</a> <h5></li>
                                    <li> <h5><a href="#"> CURRENT SERIES </a> <h5></li>
                                    <li> <h5><a href="#"> THE HOUSE </a> <h5></li>
                                    <li> <h5><a href="#"> LOOKING BACK </a> <h5></li>
                                </ul>
                            </div> --}}

                        <!--/.row-->
                    </div>
                    <!--/.container-->
                </div>
                <!--/.footer-->

                <div class="footer-bottom">
                    <div class="container">
                        <p class="pull-left copyright"> Copyright © Footer 2019. All right reserved. </p>

                    </div>
                </div>
                <!--/.footer-bottom-->

            </footer></html>
