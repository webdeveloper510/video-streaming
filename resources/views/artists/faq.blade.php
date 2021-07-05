@include('artists.dashboard')

<section class="faq ">
    <div class="container">
        <div class="faqimg">
             <img src="" class="img-fluid">
        </div>
        <div class="row">
           
            <div class="col-md-12">
            
                <div class="faqtext">
                <h1>FAQ's</h1>
                  
                <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed ques1" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        How does status of orders change?
                        </button>
                    </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body ques">
                    Orders that are coming in are always in status “New Order”<br>
                         By clicking on the green box, you will get directly to the list of new orders.<br>
                         Orders that you have seen in detail by expanding the order in the list will get the status “In Process”<br>
                         By clicking on the orange box, you will get directly to the list of the orders in process.<br>
                         Orders for which you have less than 24 hours left get the status “Due” <br>
                         By clicking on the red box, you will get directly to the list of due orders.
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed ques1" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Where can I look up detailed information about my earnings?
                        </button>
                    </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body ques">
                    You can click on the earnings box in the dashboard where you will get a detailed earnings list.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed ques1" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">How do I know if my Customer/Artist invitations were accepted? </button>
                    </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body ques">
                    On the withdrawal page you can see if you have successfully invited artists and what status they have in relation to the requirements of the invitation bonus. Thepassive revenue of Customer token purchases is also displayed.
                       </div>
                    </div>
                </div>
                </div>
 
            </div>
            <div class="col-md-12">
                <div class="row">
                <div class="col-md-6">
                <div class="upcoming">
                    <h3>Upcoming Features</h3>
                    <ul>
                    <li>PAZ-Messenger</li>
                    <li>PAZ-Feed</li>
                    <li>Projects</li> 
                    <li>PAZ-Live</li>
                    </ul>
                </div>
                </div>
                <div class="col-md-6">
                <h3>Additional links</h3>
                <ul class="menufooter">
              <li>
              <a href="{{url('/terms')}}"><i class="fa fa-angle-right"></i> Terms and conditions</a></li>
               <li><a href="{{url('/acceptable')}}"><i class="fa fa-angle-right"></i> Acceptable Use Policy</a></li>
               <li><a href="{{url('/privacy')}}"><i class="fa fa-angle-right"></i> Privacy policy</a></li>
               <li><a href="{{url('/dmca')}}"><i class="fa fa-angle-right"></i> DMCA Policy</a></li>
             
              <li><a href="{{url('/cookie')}}"><i class="fa fa-angle-right"></i> Cookie Policy</a></li>
            
              <li><a href="{{url('/disclaimer')}}"><i class="fa fa-angle-right"></i> Disclaimer</a></li>
              <li><a href="{{url('/legal-notice')}}"><i class="fa fa-angle-right"></i>  Legal Notice</a></li> 
            </ul>
            </div>
            </div>
            </div>
        </div>
    </div>
</section>
<style>
div#accordion .card-header {
    padding: 0;
}
ul.menufooter a {
    color: black;
}
button.btn.btn-link {
    font-size: 20px;
}
section.faq {
    margin-top: 10%;
}
.card-body.ques {
    font-size: 17px;
    padding-left: 50px;
}
@media only screen and (max-width: 768px) {
button.btn.btn-link.btn-block.text-left.ques1 {
    white-space: initial;
    font-size: 17px;
    padding: 3px;
}
.card-body.ques {
    font-size: 16px; 
    padding-left: 21px;
}
}
</style>
@include('artists.dashboard_footer')