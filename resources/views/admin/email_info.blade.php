<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
    @include('admin.css');  
    <style>
        label
        {
            display: inline-block;
            width: 300px;
            font-weight: bold;
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

                <h1 style="font-size: 25px; text-align:center;">Send Email to {{$order->email}}</h1>

                <form action="{{url('send_user_email',$order->id)}}" method="POST">

                    @csrf

                <div style="padding-left: 35%; padding-top:30px;">
                    <label>Email Greeting</label>
                    <input style="color:black;" style="color:black;" type="text" name="greeting">
                </div>

                <div style="padding-left: 35%; padding-top:30px;">
                    <label>Email FirstLine</label>
                    <input style="color:black;" type="text" name="firstline">
                </div>

                <div style="padding-left: 35%; padding-top:30px;">
                    <label>Email Body</label>
                    <input style="color:black;" type="text" name="body">
                </div>

                <div style="padding-left: 35%; padding-top:30px;">
                    <label>Email Button name</label>
                    <input style="color:black;" type="text" name="button">
                </div>

                <div style="padding-left: 35%; padding-top:30px;">
                    <label>Email Url</label>
                    <input style="color:black;" type="text" name="url">
                </div>

                <div style="padding-left: 35%; padding-top:30px;">
                    <label>Email Last Line</label>
                    <input style="color:black;" type="text" name="lastline">
                </div>

                <div style="padding-left: 35%; padding-top:30px;">
                    <input style="color:black;" type="submit" value="Send Email" class="btn btn-primary">
                </div>

            </form>
            </div>
        </div>
      </div>
    </div>
  
    @include('admin.script');  

  </body>
</html>