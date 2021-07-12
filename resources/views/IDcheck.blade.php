@include('layout.cdn')
<header>
   <div class="text-center">
      <img src="{{asset('images/logos/good_quality_logo.png')}}" height="50" alt="CoolBrand">
      
      <h1 class="text-white mt-2"> Identity Check </h1>
   </div>
</header>

<div class="container my-5">
        <div class="row">
           <div class="col-md-7">
         <h4>Identity Check:</h4>
         <p>Please upload a Selfie of you holding the document you have used for identity verification and a note with the following ...</p>
            <br>
         <p>- pornartistzone.com</p>
             <p>- yyyy /mm/dd (the current date)</p>
             <p>- Username</p>
             <p>- First name Last name</p>
             <p>- Email Address (used with Yoti)</p>
             <br>
             <p>... written with a black or blue pen/marker.</p>
             <p><b>Please make sure the document text is readable and not mirrored.</b></p>
             
             <form class="col-md-5">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Identity Check file </label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" required>
                </div>
                <button class="btn btn-primary" type="submit">Submit </button>
                </form>
</div>
<div class="col-md-5">
  <img src="{{asset('images/IdentityCheck.png')}}" width="100%" class="img-fluid">
</div>
</div>

                </div>
                <style>
                 header {
   background: #7b0000;
   padding: 11px;
   color:white !important;
   }
   </style>
  @include('layouts.footer')