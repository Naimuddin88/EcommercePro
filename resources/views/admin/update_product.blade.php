<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.css');  
<style>
    .div_center{
       text-align: center;
       padding-top: 40px;
    }
    .font_size{
        font-size: 40px;
        padding-bottom: 40px; 
    }
    .text-color{
          color: #000;
          padding-bottom: 20px;
        }
        label{
            display: inline-block;
            width:200px;
        }
        .div_design{
         padding-bottom: 10px;
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



           <div class="div_center">
            <h1 class="font_size">Update Product</h1>
   <form action="{{url('/update_product_confirm',$product->id )}}" method="POST" enctype="multipart/form-data" >
           
    @csrf
    
       <div class="div_design">
              <label>Product Title :</label>
              <input type="text" class="text-color" name="title" placeholder="Write a Title"
               value="{{$product->title}}" required >
            </div>

            <div class="div_design">
                <label>Product Description :</label>
                <input type="text" class="text-color" name="description" placeholder="Write a Description" value="{{$product->description}}" required>
              </div>

              <div class="div_design">
                <label>Product Price :</label>
                <input class="text-color" name="price" placeholder="Write a price" value="{{$product->price}}" required>
              </div>

              <div class="div_design">
                <label>Discount Price :</label>
                <input type="number" class="text-color" name="dis_price"  placeholder="Write a discount is apply" value="{{$product->discount_price}}">
              </div>

              <div class="div_design">
                <label>Product Quantity :</label>
                <input type="text" class="text-color" name="quantity" min="0" placeholder="Write a Quantity" value="{{$product->quantity}}" required>
              </div>


              <div class="div_design">
                <label>Product category :</label>
                <select class="text-color" name="category" required>
                   <option value="{{$product->category}}" selected="">{{$product->category}}</option>
                   
                 
                   @foreach ($category as $category)        
                   <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                   @endforeach 

                </select>
              </div>

              <div class="div_design">
                <label>Current Product Image :</label>
                <img style="margin: auto" height="100px" width="100px" src="/product/{{$product->image}}" alt=""> 
             </div>

              <div class="div_design">
                <label>Change Product Image :</label>
                <input type="file"  name="image">
              </div>

              <div class="div_design">
                <input type="submit" name="submit" class="btn btn-primary" value="Update Product">

              </div>
        </form>

        </div>
            </div>
        </div>
      </div>
    </div>
 
    @include('admin.script');  

  </body>
</html>