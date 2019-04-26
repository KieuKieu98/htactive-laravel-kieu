<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Admin Page</title>
      <!-- Bootstrap Core CSS -->
      <link href="{{asset('css/app.css')}}" rel="stylesheet">
      <link href="{{asset('css/libs.css')}}" rel="stylesheet">
      <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
   </head>
   <body id="admin-page">
      <div id="wrapper">
         <!-- Navigation -->
         <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <img  href="http://htactive.com/contact" height="50px;" src="{{asset('images/logo_red.png')}}"/>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
               <!-- /.dropdown -->
               <li class="dropdown">
                  @if(isset(Auth::user()->email))
                  <strong>Welcome <i>{{ Auth::user()->name }}</i></strong>
                  @endif
               </li>
               <li><a href="{{ url('/main/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
            </ul>
            <div class="navbar-default sidebar" role="navigation">
               <div class="sidebar-nav navbar-collapse">
                  <ul class="nav" id="side-menu">
                     <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                           <input type="text" class="form-control" placeholder="Search...">
                           <span class="input-group-btn">
                           <button class="btn btn-default" type="button">
                           <i class="fa fa-search"></i>
                           </button>
                           </span>
                        </div>
                     </li>

                     <li>
                        <a href="#"><i class="fa fa-star"></i> Services<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           <li>
                              <a href="{{ route('service.index')}}"><i class="fa fa-list"></i>All Service</a>
                           </li>
                           <li>
                              <a href="{{ route('service.create')}}"><i class="fa fa-plus-square icon"></i>Add Service</a>
                           </li>
                        </ul>
                     </li>
                     <li>
                        <a href="#"><i class="fa fa-user" aria-hidden="true"></i></i>Users<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           <li>
                              <a href="{{ route('user.index')}}"><i class="fa fa-list"></i>All Users</a>
                           </li>
                           <!-- <li>
                              <a href="{{ route('user.create')}}"><i class="fa fa-plus-square icon"></i>Add User</a>
                           </li> -->
                        </ul>
                     </li>
                     <li>
                        <a href="#"><i class="fa fa-list-alt" aria-hidden="true"></i></i>Categories<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           <li>
                              <a href="{{ route('category.index')}}"><i class="fa fa-list"></i>All Categories</a>
                           </li>
                           <li>
                              <a href="{{ route('category.create')}}"><i class="fa fa-plus-square icon"></i>Add Category</a>
                           </li>
                        </ul>
                     </li>
                     <li>
                        <a href="#"><i class="fa fa-list-alt" aria-hidden="true"></i>About<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           <li>
                              <a href="{{ route('about.index')}}"><i class="fa fa-list"></i>All About</a>
                           </li>
                           <li>
                              <a href="{{ route('about.create')}}"><i class="fa fa-plus-square icon"></i>Add About</a>
                           </li>
                        </ul>
                     </li>
                     <li>
                        <a href="#"><i class="fa fa-list-alt"></i>Blogs<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           <li>
                              <a href="{{ route('blog.index')}}"><i class="fa fa-list"></i>All Blog</a>
                           </li>
                           <li>
                              <a href="{{ route('blog.create')}}"><i class="fa fa-plus-square icon"></i>Add blog</a>
                           </li>
                        </ul>
                     </li>
                     <li>
                        <a href="#"><i class="fa fa-list-alt"></i>Portfolios<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           <li>
                              <a href="{{ route('portfolio.index')}}"><i class="fa fa-list"></i>All portfolio</a>
                           </li>
                           <li>
                              <a href="{{ route('portfolio.create')}}"><i class="fa fa-plus-square icon"></i>Add portfolio</a>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </div>
               <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
         </nav>
         <!-- Page Content -->
         <div id="page-wrapper">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-12">
                     @yield('content')
                  </div>
                  <!-- /.col-lg-12 -->
               </div>
               <!-- /.row -->
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="{{asset('js/libs.js')}}"></script>
   </body>
   <script>
      $(".delete").on("submit", function(){
          return confirm("Are you sure want to delete?");
      });
   </script>
   <script type="text/javascript">
      $(function() {
          $("#uploadFile").on("change", function()
          {
              var files = !!this.files ? this.files : [];
              if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
      
              if (/^image/.test( files[0].type)){ // only image file
                  var reader = new FileReader(); // instance of the FileReader
                  reader.readAsDataURL(files[0]); // read the local file
      
                  reader.onloadend = function(){ // set image data as background of div
                      $("#imagePreview").css("background-image", "url("+this.result+")");
                      $("#image").hide();
                  }
              }
          });
      });
   </script>
</html>