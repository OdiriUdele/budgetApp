<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <style type="text/css">
             /*        body {
                display: none;
                }*/
                /* Start by setting display:none to make this hidden.
   Then we position it in relation to the viewport window
   with position:fixed. Width, height, top and left speak
   for themselves. Background we set to 80% white with
   our animation centered, and no-repeating */
            .mymodal {
                        display:    none;
                        position:   fixed;
                        z-index:    1000;
                        top:        0;
                        left:       0;
                        height:     100%;
                        width:      100%;
                        background: rgba( 255, 255, 255, .8 ) 
                                    url("{{ asset('img/loading-spinner-grey.gif') }}") 
                                    50% 50% 
                                    no-repeat;
            }
                     /* When the body has the loading class, we turn
                the scrollbar off with overflow:hidden */
                body.loading {
                    overflow: hidden;   
                }

                /* Anytime the body has the loading class, our
                mymodal element will be visible */
                body.loading .mymodal {
                    display: block;
                }
                .my_loading{
                        z-index:    1000;
                        background-color: #ffffff !important;
                        background: rgba( 255, 255, 255, .8 ) 
                                    url("{{ asset('img/loading-spinner-grey.gif') }}") 
                                    50% 50% 
                                    no-repeat;
                    }

                    .show_text_disabled{
                        color: #94A0B2 !important;
                    }

                     /*Start loading style */
  #loading-bar-spinner.spinner {
                position: fixed;
                z-index: 31000 !important;
                /* animation: loading-bar-spinner 400ms linear infinite; */
                display: none;
                width: 100%;
                height: 100%;
                background-color: #00000080;
            }

            #loading-bar-spinner.spinner .spinner-icon {
                width: 40px;
                height: 40px;
                border:  solid 4px transparent;
                border-top-color:  #00C8B1 !important;
                border-left-color: #00C8B1 !important;
                animation: loading-bar-spinner 400ms linear infinite;
                border-radius: 50%;
                /* position:absolute; */
                /* top: 50%;
                height: 50%; */
                margin: 50vh auto;
            }

            @keyframes loading-bar-spinner {
            0%   { transform: rotate(0deg);   transform: rotate(0deg); }
            100% { transform: rotate(360deg); transform: rotate(360deg); }
            }
            /* End loading style */
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }   
        </style>
    </head>
    <body>
            @yield('alerts')
             @yield ('contents')
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
