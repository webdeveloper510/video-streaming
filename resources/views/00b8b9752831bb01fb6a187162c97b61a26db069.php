;

<!--?php echo HTML::assets('style.css');?!-->
<section>
    <div class="container mt-5">

      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6">
          <div class="row">
            <div class="col text-center">
              <h1>Register</h1>
            </div>
          </div>
          <form action="" method="post" id="form_data">
          <div class="row align-items-center">
            <div class="col mt-4">
              <input type="email" class="form-control" name="email" placeholder="E-mail" required="required">
            </div>
          </div>
          <div class="row align-items-center mt-4">
            <div class="col">
              <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            
          </div>
          <div class="row justify-content-start mt-4">
            <div class="col">
              

              <button id="submit" class="btn btn-primary mt-4">Submit</button>
              <strong id="msg"></strong>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $("#submit").click(function(e){
        e.preventDefault();
        //alert("hii"); 
        var form=$("#form_data");
        $.ajax({
            type:"POST",
            url:"/login",
            data:form.serialize(),
            headers: { 
                'X-CSRF-TOKEN': "<?php echo  csrf_token();  ?>"
                },
            success: function(response){
                console.log(response);
                if(response==1){
                    $("#msg").html("Login successfull");
                    window.location='/profile';
                } 
                else{
                    $("#msg").html("Login faild");
                }
            }
        });
    });
</script>
<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\video-streaming\resources\views/login.blade.php ENDPATH**/ ?>