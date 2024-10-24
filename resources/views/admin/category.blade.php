<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css');  

    <style>
        .div_center
        {
            text-align: center;
            padding-top: 40px;
        }
        .h2_font{
            padding-bottom: 40px;
            font-size: 40px;
        }
        .text{
          color: #000;
        }
        .btn-1{
            font-size: 15px;
            height: 38px;
            background-color:cadetblue;
        }
        .center{
          margin: auto;
          width: 50%;
          text-align: center;
          margin-top: 30px;
          border: 2px solid white;
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
                <h2 class="h2_font">Add Category</h2>
             
            <form action="{{url('/add_category')}}" method="post">
              @csrf  
              <input type="text" name="category" class="text" placeholder="Write category name">
                <input type="submit" name="submit" class="btn-1" value="Add Category">
            </form>
            </div>

            <table class="center">
              <tr>
                <td>Category Name</td>
                <td>Action</td>
              </tr>

              @foreach($data as $data)
              <tr>
                <td>{{$data->category_name}}</td>
                <td>
                  <a onclick="return confirm('Are You Sure To Delete This Category')" class="btn btn-danger" href="{{url('delete_category', $data->id )}}">Delete</a>
                </td>
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