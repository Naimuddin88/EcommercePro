<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <link href="{{ asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <link href="{{ asset('home/css/style.css')}}" rel="stylesheet" />
      <link href="{{ asset('home/css/responsive.css')}}" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js">
      </script>
   </head>
   <body>
      <div class="hero_area">
        
           {{-- @include('home.header');   --}}
           <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="/"><img width="250" src="/images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              <li><a href="/">About</a></li>
                              <li><a href="/">Testimonial</a></li>
                           </ul>
                        </li>
                        <li class="nav-item active" >
                           <a class="nav-link" href="{{url('products')}}">Products</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Blog</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{url('show_cart')}}">Cart</a>
                       </li>
        
                       <li class="nav-item">
                          <a class="nav-link" href="{{url('show_order')}}">Order</a>
                       </li>
                        <form class="form-inline">
                            <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                         </form>
        
                         @if (Route::has('login'))
                         @auth
                        <li class="nav-item">
                            <x-app-layout>
         
                            </x-app-layout>
                         </li>
        
                         @else
                         <li class="nav-item">
                            <a class="btn btn-primary" id="logincss" href="{{ route('login')}}">Login</a>
                         </li>
        
                         <li class="nav-item">
                            <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                         </li>
                         @endauth
                         @endif
                 
                       
                     </ul>
                  </div>
               </nav>
            </div>
         </header>

 
      
      @include('home.product_view');  

      <div style="text-align: center; padding-bottom:30px;">
         <h1 style="font-size: 30px; text-align:center; padding-top:20px; padding-bottom:20px;">Comments</h1>
      
         <form action="{{ url('add_comment') }}" method="POST">
            @csrf
            <textarea style="height: 150px; width:600px;" name="comment" placeholder="Comment Something here" id="" cols="30" rows="10"></textarea>
      
            <br>
            <input type="submit" class="btn btn-primary" value="Comment">
         </form>
      </div>
      
      <div style="padding-left: 20%">
         <h1 style="font-size: 20px; padding-bottom:20px">All Comments</h1>
      
         @foreach($comment as $comment)
         <div style="margin-bottom: 20px;">
            <b>{{ $comment->name }}</b>
            <p>{{ $comment->comment }}</p>
      
            <a href="javascript:void(0);" onclick="reply(this)" data-Commentid="{{ $comment->id }}" style="color: rgb(105, 89, 196);">Reply</a>
      
            <div style="display: none;" class="replyDiv">
               <form action="{{ url('add_reply') }}" method="POST" class="reply-form">
                  @csrf
                  <input type="text" name="commentId" value="{{ $comment->id }}" hidden>
                  <textarea style="height: 100px; width:500px;" name="reply" placeholder="Write something here"></textarea>
                  <br>
                  <button type="submit" class="btn btn-warning">Submit</button>
                  <a href="javascript:void(0);" class="btn" onclick="reply_close(this)">Close</a>
               </form>
            </div>
      
            @foreach ($reply as $replyItem)
               @if (isset($replyItem->comment_id) && $replyItem->comment_id == $comment->id)
               <div style="padding-left: 5%; padding-bottom:10px;">
                  <b>{{ $replyItem->name }}</b>
                  <p>{{ $replyItem->reply }}</p>
                  <a href="javascript:void(0);" onclick="reply(this)" data-Commentid="{{ $comment->id }}" style="color: rgb(105, 89, 196);">Reply</a>
               </div>
               @endif
            @endforeach
      
         </div>
         @endforeach
      </div>
      
      <script>
      function reply(element) {
          const replyDiv = element.closest('div').querySelector('.replyDiv');
          replyDiv.style.display = 'block'; // Show the reply form
      }
      
      function reply_close(element) {
          const replyDiv = element.closest('.replyDiv');
          replyDiv.style.display = 'none'; // Hide the reply form
      }
      </script>


    
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
  



        <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
  

      </script>
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <script src="home/js/popper.min.js"></script>
      <script src="home/js/bootstrap.js"></script>
      <script src="home/js/custom.js"></script>
   </body>
</html>