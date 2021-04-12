<?php echo $__env->make('artists.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<body onload = "createCaptcha()"> 
<section class=" support">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <a
                class="nav-link active"
                id="pills-home-tab"
                data-toggle="pill"
                href="#pills-home"
                role="tab"
                aria-controls="pills-home"
                aria-selected="true">Open Ticket</a>
        </li>
        <!-- <li class="nav-item" role="presentation">
            <a
                class="nav-link"
                id="pills-profile-tab"
                data-toggle="pill"
                href="#pills-profile"
                role="tab"
                aria-controls="pills-profile"
                aria-selected="false">Tickets</a>
        </li> -->

    </ul>
    <div class="tab-content" id="pills-tabContent">
        <!--------- Open ticket tab------------------------------------------>
        <div
            class="tab-pane fade show active"
            id="pills-home"
            role="tabpanel"
            aria-labelledby="pills-home-tab">

            <div class="row">
                <div class="col"></div>
                <div class="col-md-8">
                   <?php echo Form::open(['id' => 'technical_functiong','method' => 'post','files' => true]); ?>

                    <?php echo e(Form::token()); ?>

                    <div class="ticketstext">
                        <label>Subject</label>
                        <select name="technical_issue" class="form-control">
                            <option value="">Select menu</option>
                            <option value="Feature Request">Feature Request</option>
                            <option value="Functionality Question">Functionality Question</option>
                            <option value="Technical Issue">Technical Issue</option>
                            <option value="General">General</option>
                            <option value="Delete Account">Delete Account</option>
                            <option value="Other">Other</option>
                        </select>
                        <div class="description mt-3">
                            <label>Description</label>
                            <textarea
                                class="form-control"
                                name="description"
                                id="exampleFormControlTextarea1"
                                rows="3"></textarea>
                        </div>
                        <br>
                        <input type="hidden" name="email" value="<?php echo e($data[0]->email); ?>"/>
                            <input type="file" name="file" class="form-control" placeholder="add file">
                                <input type="hidden" name="recaptcha" value="" id="recaptcha"/>
                                <div class="mt-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h3>Spam Bot Verification</h3>
                                        </div>
                                        <div class="col-md-6">
                                            <p>Please enter the characters you see in the image below into the text box
                                                provided.This is requred to prevent automated submissions.</p>
                                            <form onsubmit="validateCaptcha()">
                                                <div id="captcha"></div>
                                                <input
                                                    type="text"
                                                    name="match_recaptcha"
                                                    class="formcontrol"
                                                    placeholder="Captcha"
                                                    id="cpatchaTextBox"/>
                                            </form>

                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="loader col-6" style="display:none">
                                            <span style="color:green; font-weight: bold;">Uploading...</span><img src="<?php echo e(asset('images/loading2.gif')); ?>" width="50px" height="50px"/>
                                            <span class="percentage" style="color:green;font-weight: bold;"></span>
                                        </div>
                                        <button type="submit" class="btn btn-light">Submit</button>

                                        <div class="alert alert-success" id="success" style="display:none"></div>

                                    </div>
                                </div>

                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                        <div class="col"></div>
                    </div>
                </div>

                <!--------- tickets tab------------------------------------------>

                <div
                    class="tab-pane fade"
                    id="pills-profile"
                    role="tabpanel"
                    aria-labelledby="pills-profile-tab">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-md-8">

                            <div class="opentickettext">
                                <div class="row">
                                    <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-9">
                                        <a href="#" data-toggle="modal" data-target="#chat">
                                            <h3>#34567893 - <?php echo e($ticket->technical_issue); ?></h3>
                                            <p>Last Updated: <?php echo e($ticket->created_at); ?></p>
                                        </a>
                                    </div>

                                    <div class="col-3 mt-4">

                                        <button type="button" class="btn btn-primary">Open</button>
                                        <button
                                            type="button"
                                            disable="disable"
                                            class="btn btn-primary"
                                            style="display:none;">Close</button>
                                    </div>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <!-- Button trigger modal -->

                                    <!-- Modal -->
                                    <div
                                        class="modal fade"
                                        id="chat"
                                        tabindex="-1"
                                        aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="p-0">PAZ-Support</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="chat1">
                                                        <!-- <p>hello</p> -->

                                                        <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                       <label style="border: 1px solid #b8def9;padding: 5px 6px;color: white; background: #b8def9;"> <i style="    font-size: 24px;" class="fa fa-paperclip"></i> </label>
                                                        <input type="file" class="custom-file-input">
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="Message">
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-primary form-control" type="button">
                                                                        <i class="material-icons">send</i>
                                                                    </button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <hr></div>
                                </div>
                                <div class="col"></div>
                            </div>

                        </div>

                    </div>

                </div>

            </section>

            <style>
            .input-group-prepend {
                width: 7%;
            }
                section.support {
                    margin-top: 10%;
                }
                .nav-pills .nav-link.active,
                .nav-pills .show > .nav-link {
                    color: #1d0101;
                    background-color: white;
                }
                ul#pills-tab {
                    background: #7b0000;
                    color: white !important;
                }
                button.btn.btn-primary.form-control {
                    margin: 0 !important;
                }
                label.error {
                    background: red;
                    padding: 9px;
                    font-size: 16px;
                    display: flex;
                    color: white;
                    text-align: center;
                    margin-top: 22px;
                    border-radius: 9px;
                }
                li.nav-item a {
                    color: white;
                }
                p.qrcode {
                    background: red;
                    padding: 10px;
                    color: white;
                }
            </style>

            <script>
                var code;
                function createCaptcha() {
                    //alert('ddd');
                    //clear the contents of captcha div first
                    document
                        .getElementById('captcha')
                        .innerHTML = "";
                    var charsArray = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
                    var lengthOtp = 6;
                    var captcha = [];
                    for (var i = 0; i < lengthOtp; i++) {
                        //below code will not allow Repetition of Characters
                        var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
                        if (captcha.indexOf(charsArray[index]) == -1) 
                            captcha.push(charsArray[index]);
                        else 
                            i--;
                        }
                    var canv = document.createElement("canvas");
                    canv.id = "captcha";
                    canv.width = 100;
                    canv.height = 50;
                    var ctx = canv.getContext("2d");
                    ctx.font = "25px Georgia";
                    ctx.strokeText(captcha.join(""), 0, 30);
                    // storing captcha so that can validate you can save it somewhere else according
                    // to your specific requirements
                    code = captcha.join("");
                    console.log(code);
                    $('#recaptcha').val(code)
                    document
                        .getElementById("captcha")
                        .appendChild(canv); // adds the canvas to the body element
                }
                function validateCaptcha() {
                    event.preventDefault();
                    debugger
                    if (document.getElementById("cpatchaTextBox").value == code) {
                        alert("Valid Captcha")
                    } else {
                        alert("Invalid Captcha. try Again");
                        createCaptcha();
                    }
                }
            </script>

            <?php echo $__env->make('artists.dashboard_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;<?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/artists/support.blade.php ENDPATH**/ ?>