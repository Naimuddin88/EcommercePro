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

      @include('sweetalert::alert')
      
      <div class="hero_area">
        
         <!-- header section strats -->
           @include('home.header');  
         <!-- end header section -->

         <!-- slider section -->
         @include('home.slider');  
         <!-- end slider section -->
      </div>

      <!-- why section -->
      @include('home.why');  
      <!-- end why section -->
      
      <!-- arrival section -->
      @include('home.arrival');  
      <!-- end arrival section -->
      
      <!-- product section -->
      @include('home.product');  
      <!-- end product section -->

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
      
            <a href="javascript:void(0);" onclick="reply(this)" data-Commentid="{{ $comment->id }}" style="color: rgb(81, 62, 186);">Reply</a>
      
            <!-- Reply form -->
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
      
            <!-- Replies for this comment -->
            @foreach ($reply as $replyItem)
               @if (isset($replyItem->comment_id) && $replyItem->comment_id == $comment->id)
               <div style="padding-left: 5%; padding-bottom:10px;">
                  <b>{{ $replyItem->name }}</b>
                  <p>{{ $replyItem->reply }}</p>
                  <a href="javascript:void(0);" onclick="reply(this)" data-Commentid="{{ $comment->id }}" style="color: rgb(54, 37, 154);">Reply</a>
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


      <!-- subscribe section -->
      @include('home.subscribe');  
      <!-- end subscribe section -->

      <!-- client section -->
      @include('home.client');  
      <!-- end client section -->

      <!-- footer start -->
      @include('home.footer');  
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      {{-- <script>
         function reply(caller)
         {
            document.getElementById('commentId').value=$(caller).attr('data-CommentId');
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
         }

         function reply_close(caller)
         {
            $('.replyDiv').hide();
         }
         </script> --}}
         
         {{-- <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };

        function reply(element) {
    const replyDiv = element.closest('div').querySelector('.replyDiv');
    replyDiv.style.display = 'block'; // Show the reply form
    const commentId = element.getAttribute('data-Commentid');
    replyDiv.querySelector('#commentId').value = commentId; // Set comment ID in the hidden input
}

function reply_close(element) {
    const replyDiv = element.closest('.replyDiv');
    replyDiv.style.display = 'none'; // Hide the reply form
}

    </script> --}}



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
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>