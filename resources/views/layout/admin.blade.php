<!DOCTYPE html>
<html lang="en">

<head>
     <title>SB Admin 2 - {{$page}}</title>
   @include('layout.head')
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

          <!-- sidebar -->
                @include('layout.sidebar')
            <!-- end sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

         <!-- topbar -->
                @include('layout.topbar')
         <!-- end topbar -->

            <!-- Main Content -->
            <div id="content">
            

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"> {{$page}}</h1>
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- footer -->
                @include('layout.footer')
            <!-- end footer -->
           

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

            <!-- script -->
                @include('layout.script')
            <!-- end script -->

</body>

</html>