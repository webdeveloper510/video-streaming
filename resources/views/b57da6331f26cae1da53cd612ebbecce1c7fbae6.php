<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;1,300&display=swap" rel="stylesheet">
    <title>Email Template</title>

</head>
<body style="width:600px;    margin-left: 27%;
margin-top: 5%;background-color: #ebebeb;font-family: 'Roboto', sans-serif;">


    <table style="background-color: #fff;text-align: center;">

        <thead>
            <tr>
                <th><img src="https://www.pure360.com/wp-content/uploads/2015/04/shutterstock_701522602.jpg"  alt="email-image" width="590px"></th>
            </tr>
        </thead>
         <tbody>
             <tr>
                 <td><h1 style="margin-top: 10px;">Welcome<?php echo e($data['nickname']); ?></h1></td>
                 
             </tr>
             <tr>
                <td style="padding-left: 15%;padding-right: 15%;">
                     <p>Hey <span>Name</span>, you're almost ready to start enjoying website simply click the big
                        blue button bellow to verify your email address.</p>
                </td>
             </tr>
             <tr>
                 <td> 
                     <button type="button" style="margin-top: 12px;
                     color: #fff;
                     padding: 7px;
                     background-color: #0062cc;
                     border-color: #005cbf;
                     font-size: 17px;
                     border-radius: 5px;
                     margin-bottom: 20px;">Verify Email Address</button>
                </td>
             </tr>
         </tbody>

    </table>



</body>
</html><?php /**PATH C:\xampp\htdocs\laravel\video-streaming\resources\views/mail.blade.php ENDPATH**/ ?>