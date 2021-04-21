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
      <meta name="csrf-token" content="{{ csrf_token() }}">

   </head>


   <body class="k-body bg-white @yield('body') ">
      
      <div class="nk-app-root">
         <div class="nk-main ">
            <div class="nk-wrap nk-wrap-nosidebar">
               <div class="nk-content ">
                  
                     @include ('customers.includes.header')

                     @yield('content')

               </div>
            </div>
         </div>
      </div>  
      
      <script src="{{ asset('/js/bundle.js') }}" type="text/javascript"></script>
      <script src="{{ asset('/js/scripts.js') }}" type="text/javascript"></script>
      <script src="{{ asset('/js/files.js') }}" type="text/javascript"></script>

      @stack('scripts')

   </body>

</html>