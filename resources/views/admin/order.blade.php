<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css');
    <style>
    
    .title
    {
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        padding-bottom: 20px;

    }
    .table_deg
    {
        border: 2px solid white;
        margin: auto;
        width: 100%;
        text-align: center;

    }
    .row-d
    {
        background-color: rgb(186, 202, 202);
    }
    .img-size1
    {
     width:100px;
     height: 100px;;
    }
    </style>  
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.sidebar');  

      <div class="container-fluid page-body-wrapper">
        @include('admin.header');  


        <div class="main-panel">
            <div class="content-wrapper">

                <h1 class="title">All Orders</h1>


                <div style="padding-left: 400px; padding-bottom:30px;">
                    <form action="{{url('search')}}" method="GET">
                        @csrf

                        <input style="color:black;" type="text" name="search" aria-placeholder="Search for something">

                        <input class="btb btn-outline-primary" type="submit" value="Search">
                    </form>
                </div>

                <table class="table_deg">
                    <tr class="row-d">
                        <th style="padding: 7px;">Name</th>
                        <th style="padding: 7px;">Email</th>
                        <th style="padding: 7px;">Address</th>
                        <th style="padding: 7px;">Phone</th>
                        <th style="padding: 7px;">Product title</th>
                        <th style="padding: 7px;">Quantity</th>
                        <th style="padding: 7px;">Price</th>
                        <th style="padding: 7px;">Payment Status</th>
                        <th style="padding: 7px;">Delivery Status</th>
                        <th style="padding: 7px;">Image</th>
                        <th style="padding: 7px;">Delivered</th>
                        <th style="padding: 7px;">Print PDF</th>
                        <th style="padding: 7px;">Send Email</th>


                    
                    </tr>

                    @forelse ($order as $order)
                        
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->product_title}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>${{$order->price}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivery_status}}</td>
                        <td>
                        <img class="img-size1" src="/product/{{$order->image}}" alt="">    
                        </td>
                        <td>
                            @if($order->delivery_status == 'processing')
                            <a href="{{url('delivered', $order->id )}}" onclick="return confirm('Are yo sure this product is delivered !!!')" class="btn btn-primary">Delivered</a>
                          
                            @else
                            <p style="color: rgb(179, 85, 85)">Delivered</p>


                          @endif
                        </td>   
                        <td>
                            <a href="{{url('print_pdf', $order->id )}}" class="btn btn-secondary">Print PDF</a>
                        </td>

                        <td>
                            <a href="{{url('send_email',$order->id)}}" class="btn btn-info">Send Email</a>
                        </td>
                    </tr>
  
                    @empty
                   
                    <tr>
                        <td colspan="16">
                            No Data Found
                        </td>
                    </tr>

                    @endforelse
                </table>
            </div>
        </div>



         
  
    </div>
    </div>
    @include('admin.script')

  </body>
</html>