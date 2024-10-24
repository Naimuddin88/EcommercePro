<!DOCTYPE html>
<html>
   <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
   <style>
    .center{
        margin: auto;
        text-align: center;
        width: 70%;
        padding: 30px;
        
    }
    table,th,td{
        border: 2px solid black;
    }
    .design{
        font-size:30px;
        padding: 5px;
        background: rgb(109, 142, 152);
    }
    .img{
        height: 100px;
        width: 100px;
    }
    .total{
        font-size: 20px;
        padding: 40px;
    }
   </style>
    </head>
   <body>
    @include('sweetalert::alert')


      <div class="hero_area">
        
           {{-- @include('home.header') --}}
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
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('products')}}">Products</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Blog</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item active">
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

           @if(session()->has('message'))
           <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

            {{session()->get('message')}}
           </div>
          @endif

      <div class="center">
        <table>
            <tr>
                  <th class="design">Product title</th>
                  <th class="design">Product quantity</th>
                  <th class="design">Price</th>
                  <th class="design">Image</th>
                  <th class="design">Action</th>
            </tr>

            <?php $totalprice=0; ?>

            @foreach ($cart as $cart)
                
            <tr>
                <td>{{$cart->product_title}}</td>
                <td>{{$cart->quantity}}</td>
                <td>${{$cart->price}}</td>
                <td><img class="img" src="/product/{{$cart->image}}" alt=""></td>
                <td><a onclick="confirmation(event)" class="btn btn-danger" href="{{url('/remove_cart',$cart->id)}}">Remove Product</a></td>

            </tr>

            <?php $totalprice=$totalprice + $cart->price ?>
            @endforeach

            

        </table>

        <div>
            <h1 class="total">Total Price: ${{$totalprice}}</h1>
        </div>

        <div>
            <h1 style="font-size:25px; padding-bottom:15px;">Proceed to Order</h1>
            <a href="{{url('cash_order')}}" class="btn btn-danger">Cash On Delivery</a>
            <a href="{{url('stripe',$totalprice)}}" class="btn btn-danger">Pay Using Card</a>

        </div>
      </div>
      
    </div>
      @include('home.footer');  
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>

      <script>
        function confirmation(ev) {
          ev.preventDefault();
          var urlToRedirect = ev.currentTarget.getAttribute('href');  
          console.log(urlToRedirect); 
          swal({
              title: "Are you sure to cancel this product",
              text: "You will not be able to revert this!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willCancel) => {
              if (willCancel) {
  
  
                   
                  window.location.href = urlToRedirect;
                 
              }  
           
  
  
          });
  
          
      }
  </script>
  
  
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <script src="home/js/popper.min.js"></script>
      <script src="home/js/bootstrap.js"></script>
      <script src="home/js/custom.js"></script>
   </body>
</html>