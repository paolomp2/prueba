@include('cms.layouts.header')

<body class="nav-md">
	<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
  <div class="container body">


    <div class="main_container">

        @include('cms.layouts.siderbar')

        @include('cms.layouts.menu')

        @yield('content')

    </div>
  </div>
  @include('cms.layouts.scripts')

  @yield('scripts')
</body>