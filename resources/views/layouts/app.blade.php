<!DOCTYPE html>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- fullcalender-->

    <link href='../../css/main.css' rel='stylesheet' />
    <link href='../../css/calender.css' rel='stylesheet' />
    <script src='../../js/calender.js'></script>
    <script src='../../js/main.js'></script>

    <!--fontawsome-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

    <!-- ウェブアプリマニフェストの読み込み -->
    <link rel="manifest" href="/manifest.json" crossorigin="use-credentials">
    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" href="/icons/icon-192x192.png">


    <style>

        html, body {
          overflow: hidden; /* don't do scrollbars */
          font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
          font-size: 14px;
        }

        #calendar-container {
          position: fixed;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
        }

        .fc-header-toolbar {
          /*
          the calendar will be butting up against the edges,
          but let's scoot in the header's buttons
          */
          padding-top: 1em;
          padding-left: 1em;
          padding-right: 1em;
        }

    </style>

</head>
<!-- ServiceWorkerの登録 -->
<script>

    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/sw.js')
          .then(() => {
            console.log('Service worker registered.');
          })
          .catch((error) => {
            console.warn('ServiceWorker error', error);
          });
    }

</script>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <div class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('form.login.login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('form.register.register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>
</html>
