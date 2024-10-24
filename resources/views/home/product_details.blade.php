<!DOCTYPE html>
<html>
   <head>
    {{-- <base href="/public"> --}}
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
   </head>
   <body>
      <div class="hero_area">
        
           @include('home.header');  

  
      <div class="col-sm-6 col-md-4 col-lg-4" style="margin:auto; width:50%; padding:30px;">
        
           <div class="img-box" >
              <img src="/product/{{$product->image}}" alt="">
           </div>
           <div class="detail-box" style="padding: 20px;">
              <h5>
                 {{$product->title}}
              </h5>

              @if($product->discount_price!=null)
              <h5 style=color:red>
                Discount Price <br>
                ${{$product->discount_price}}
             </h5>
             
             <h6 style="text-decoration: line-through; color:blueviolet">
                price <br>
                ${{$product->price}}
             </h6>

             @else
             <h6 style=color:blueviolet>
                price <br>
                ${{$product->price}}
             </h6>


             @endif

             <h6>Product Category : {{$product->category}}</h6>
             <h6>Product Description : {{$product->description}}</h6>
             <h6>Available Quantity : {{$product->quantity}}</h6>

             <form action="{{ url('add_cart',$product->id)}}" method="POST">

               @csrf

               <div class=row>

                  <div class="col-md-4">
                     <input type="number" name="quantity" value="1" min="1" style="width:70px">
                  </div>


                  <div class="col-md-4">
                     <input type="submit" value="Add a Cart">
                  </div>

              </div>
             </form>
           </div>
        </div>
     </div>
    
    </div>

      @include('home.footer');  
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <script src="home/js/popper.min.js"></script>
      <script src="home/js/bootstrap.js"></script>
      <script src="home/js/custom.js"></script>
   </body>
</html>