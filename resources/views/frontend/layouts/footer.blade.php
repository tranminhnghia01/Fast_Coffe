
<!--
    Essential Scripts
    =====================================-->

    <!-- Main jQuery -->
    <script src="{{ asset('frontend/plugins/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.1 -->
    <script src="{{ asset('frontend/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Bootstrap Touchpin -->
    <script src="{{ asset('frontend/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>
    <!-- Instagram Feed Js -->
    <script src="{{ asset('frontend/plugins/instafeed/instafeed.min.js') }}"></script>
    <!-- Video Lightbox Plugin -->
    <script src="{{ asset('frontend/plugins/ekko-lightbox/dist/ekko-lightbox.min.js') }}"></script>
    <!-- Count Down Js -->
    <script src="{{ asset('frontend/plugins/syo-timer/build/jquery.syotimer.min.js') }}"></script>

    <!-- slick Carousel -->
    <script src="{{ asset('frontend/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/slick/slick-animation.min.js') }}"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="{{ asset('frontend/plugins/google-map/gmap.js') }}"></script>

    <!-- Main Js File -->
    <script src="{{ asset('frontend/js/script.js') }}"></script>

  <script>

    $(document).ready(function(){
        //vote
        $('.ratings_stars').hover(
            // Handles the mouseover
            function() {
                $(this).prevAll().andSelf().addClass('ratings_hover');
                // $(this).nextAll().removeClass('ratings_vote');
            },
            function() {
                $(this).prevAll().andSelf().removeClass('ratings_hover');
                // set_votes($(this).parent());
            }
        );

        $('.ratings_stars').click(function(){
            var Values =  $(this).find("input").val();
            alert(Values);
            if ($(this).hasClass('ratings_over')) {
                $('.ratings_stars').removeClass('ratings_over');
                $(this).prevAll().andSelf().addClass('ratings_over');
            } else {
                $(this).prevAll().andSelf().addClass('ratings_over');
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.choose').on('change',function(){
        var action = $(this).attr('id');
        var ma_id = $(this).val();
        var _token = $('input[name="_token"]').val();
        var result = '';

        if(action=='city'){
            result = 'province';
        }else{
            result = 'ward';
        }
        $.ajax({
            url : "{{route('home.select-address')}}",
            method: 'POST',
            data:{action:action,ma_id:ma_id,_token:_token},
            success:function(data){
               $('#'+result).html(data);
            }
        });
    });


    const img = document.querySelector(".profile-image"),
    input =document.querySelector("#user-avatar");
    input.addEventListener("change",()=>{
      img.src = URL.createObjectURL(input.files[0]);
    });
  });

</script>

  <script>
      $(document).ready(function(){
          var checkip=$('.group-sale input').val();
          if (checkip == 0) {
              $('.group-sale').hide();
              $('.group-sale input').val(0);
          }
          $('.status').change(function(){
              var status = $('.status').val();
              if (status ==0) {
                  $('.group-sale').hide();
                  $('.group-sale input').val(0);
              }else{
                  $('.group-sale').show();
              }
          })
      })
  </script>
   <script type="text/javascript">
    $(document).ready(function(){
        $('.choose').on('change',function(){
        var action = $(this).attr('id');
        var ma_id = $(this).val();
        var _token = $('input[name="_token"]').val();
        var result = '';

        if(action=='city'){
            result = 'province';
        }else{
            result = 'ward';
        }
        $.ajax({
            url : "{{route('home.select-address')}}",
            method: 'POST',
            data:{action:action,ma_id:ma_id,_token:_token},
            success:function(data){
               $('#'+result).html(data);
                }
            });
        });
    });
    </script>




  </body>
  </html>
