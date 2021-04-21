<!DOCTYPE html>
<html>

<head>
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link rel="shortcut icon" href="../../images/favicon.png">
    <title>Share Work</title>
    <link rel="stylesheet" href="{{ asset('/css/dashlite.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/theme.css') }}">
</head>

<body class="nk-body bg-white npc-default pg-auth">
   
    <div class="nk-app-root">
       <div class="nk-main ">
          <div class="nk-wrap nk-wrap-nosidebar">
             <div class="nk-content ">
                
                    @include('layouts.menu')

                    @yield('content')

             </div>
          </div>
       </div>
    </div>

</body>

</body>
</html>