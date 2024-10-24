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
<style>
    .center{
        margin: auto;
        text-align: center;
        width: 70%;
        padding:30px;
    }
    table,th,td{
        border: 1px solid black;
    }
    .th_deg{
        padding: 10px;
        background-color: aquamarine;
        font-size: 20px;
        font-weight: bold;
    }
</style>
    </head>
   <body>
        
           {{-- @include('home.header')  --}}
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
                        <li class="nav-item">
                          <a class="nav-link" href="{{url('show_cart')}}">Cart</a>
                       </li>
        
                       <li class="nav-item active">
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

           <div class="center">
            <table>
                <tr class="th_deg">
                    <th>Product Title</th>
                    <th>quantity</th>
                    <th>Price</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Image</th>
                    <th>Cancel Order</th>      
              </tr>

              @foreach ($order as $order)
                  
              <tr>
                <td>{{$order->product_title}}</td>
                <td>{{$order->quantity}}</td>
                <td>${{$order->price}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->delivery_status}}</td>
                <td>
                    <img height="100" width="180" src="product/{{$order->image}}" alt="">
                </td>
                <td>
                    {{-- @if($order->delivery_status=='processing')
                    <a onclick="return confirm('Are you sure to cancel tha order !!!')" class="btn btn-danger" href="{{url('cancel_order','$order->id')}}">Cancel Order</a>
                 @else
                   <p style="color:cadetblue">Not Allowed</p>
                 @endif --}}
                 @if($order->delivery_status !== 'You canceled the order')
                 <form action="{{ route('cancel_order', $order->id) }}"  method="POST" onsubmit="return confirm('Are you sure you want to cancel this order?');">
                     @csrf
                     @method('DELETE') <!-- or use @method('POST') if you are using POST for cancel -->
                     <button type="submit" class="btn btn-danger">Cancel Order</button>
                     @else
                     <p style="color:rgb(16, 17, 17)" >Not Allowed</p>
              
                 </form>
             @endif
                </td>
              </tr>

              @endforeach
              {{-- @foreach($order as $o)
    <div class="order">
        <p>Order ID: {{ $o->id }}</p>
        <p>Delivery Status: {{ $o->delivery_status }}</p>

        <!-- Conditionally display the cancel button -->
        @if($o->delivery_status !== 'You canceled the order')
            <form action="{{ route('cancel_order', $o->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this order?');">
                @csrf
                @method('DELETE') <!-- or use @method('POST') if you are using POST for cancel -->
                <button type="submit">Cancel Order</button>
            </form>
        @endif
    </div>
@endforeach --}}


            </table>
           </div>


   

     
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <script src="home/js/popper.min.js"></script>
      <script src="home/js/bootstrap.js"></script>
      <script src="home/js/custom.js"></script>
   </body>
</html>