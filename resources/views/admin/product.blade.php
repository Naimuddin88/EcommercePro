<!DOCTYPE html>
<html lang="en">
  <head>
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
            <h1 class="font_size">Add Product</h1>
   <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data" >
           
    @csrf
    
       <div class="div_design">
              <label>Product Title :</label>
              <input type="text" class="text-color" name="title" placeholder="Write a Title" required>
            </div>

            <div class="div_design">
                <label>Product Description :</label>
                <input type="text" class="text-color" name="description" placeholder="Write a Description" required>
              </div>

              <div class="div_design">
                <label>Product Price :</label>
                <input class="text-color" name="price" placeholder="Write a price" required>
              </div>

              <div class="div_design">
                <label>Discount Price :</label>
                <input type="number" class="text-color" name="dis_price"  placeholder="Write a discount is apply">
              </div>

              <div class="div_design">
                <label>Product Quantity :</label>
                <input type="text" class="text-color" name="quantity" min="0" placeholder="Write a Quantity" required>
              </div>


              <div class="div_design">
                <label>Product category :</label>
                <select class="text-color" name="category" required>
                   <option value="" selected="">Add a category here</option>
                   
                   @foreach ($category as $category)        
                   <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                   @endforeach 
                </select>
              </div>


              <div class="div_design">
                <label>Product Image Here  :</label>
                <input type="file"  name="image" required>
              </div>

              <div class="div_design">
                <input type="submit" name="submit" class="btn btn-primary" value="Add Product">

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