<!DOCTYPE html>
<html lang="en">
  @include('partials.head')
  <body id="dashboard-body">
    <div class="grid-container">
      <!-- Header -->
      @include('partials.dashboard.header')

      <!-- Sidebar -->
      @include('partials.dashboard.sidebar')

      <!-- Main content -->
      <div class="main-container" data-main-container>
        <!-- Main content for individual pages -->
        @yield('content')
      </div>
    </div>
    <script src="../assets/js/common.js"></script>
  </body>
</html>
