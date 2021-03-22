<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="faq mt-5 pt-4">
    <div class="container">
        <div class="faqimg">
             <img src="" class="img-fluid">
        </div>
        <div class="row">
           
            <div class="col-md-8">
                <div class="faqtext">
                <h1>FAQ's</h1>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                           <b class="text-dark"> How does status of orders change?</b>
                            </button>
                        </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                        Orders that are coming in are always in status “New Order” By clicking on the green box, you will get directly to the list of new orders.Orders that you have seen in detail by expanding the order in the list will get the status “In Process”By clicking on the orange box, you will get directly to the list of the orders in process.Orders for which you have less than 24 hours left get the status “Due” By clicking on the red box, you will get directly to the list of due orders.
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <b class="text-dark">Where can I look up detailed information about my earnings?</b>
                            </button>
                        </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                        You can click on the earnings box in the dashboard where you will get a detailed earnings list.
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <b class="text-dark"> How do I know if my Customer/Artist invitations were accepted? </b>
                            </button>
                        </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                        On the withdrawal page you can see if you have successfully invited artists and what status they have in relation to the requirements of the invitation bonus. Thepassive revenue of Customer token purchases is also displayed.
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <b class="text-dark">Where can I see that I am getting promoted? </b>
                            </button>
                        </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                        In the confirmed timeframe you are promoted on the landing page.Additionally, you are also promoted on the homepage of Customers.
                        </div>
                        </div>
                    </div>
                    </div>
                   
                </div>
                
            </div>
            <div class="col-md-4">
                <div class="upcoming">
                    <h3>Upcoming Features</h3>
                    <ul>
                    <li>PAZ-Messenger</li>
                    <li>PAZ-Feed</li>
                    <li>Projects (For Freelancing)</li>
                    <li>PAZ-Live</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
div#accordion .card-header {
    padding: 0;
}
</style>
<?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\video-streaming\resources\views/artists/faq.blade.php ENDPATH**/ ?>