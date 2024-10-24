<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css');  
<style>
    .center{
        margin: auto;
        width: 70%;
        border: 2px solid white;
        text-align: center;
        margin-top: 40px;
    }
    .font_size{
        font-size: 40px;
        text-align: center;
        padding-top: 20px;
    }
    .img_size{
        width:150px;
        height: 80px;
    }
    .th_color{
        background:rgb(90, 89, 86);
    }
    .design{
      padding: 20px;
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
                @if(session()->has('message'))
                <div class="alert alert-success">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  
                 {{session()->get('message')}}
                </div>
               @endif


          <h2 class="font_size">All Product</h2>
                <table class="center">

                <tr  class="th_color">
                    <th class="design">Description</th>
                    <th class="design">Product Title</th>
                    <th class="design">Qunatity</th>
                    <th class="design">Category</th>
                    <th class="design">Price</th>
                    <th class="design">Discount Price</th>
                    <th class="design">Product Image</th>
                    <th class="design">Delete</th>
                    <th class="design">Edit</th>

                </tr>

                @foreach($product as $product)
                <tr>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->category}}</td>
                    <td>${{$product->price}}</td>
                    <td>${{$product->discount_price}}</td>
                    <td>
                        <img class="img_size" src="/product/{{$product->image}}" alt="">
                    </td>
                    <td><a class="btn btn-danger" onclick="return confirm('Are You Sure to Delete this product')" href="{{url('delete_product',$product->id)}}">Delete</a></td>
                    <td><a class="btn btn-success" href="{{url('update_product',$product->id)}}">Edit</a></td>

                </tr> 

                @endforeach
            </table>
            
            </div>
        </div>
      </div>
    </div>
    @include('admin.script');  

  </body>
</html>