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
                <th>
                <img src="<?php echo e(asset('images/email.jpg')); ?>"  alt="email-image" width="590px">
                </th>
            </tr>
        </thead>
         <tbody>
             <tr>
                 <td><h1 style="margin-top: 10px;"><?php echo e($data['technical_issue']); ?></h1></td>
                 
             </tr>
             <tr>
                <td style="padding-left: 15%;padding-right: 15%;">
                     <p>Email <span><?php echo e($data['email']); ?></span>,
                                 <a href="mailto:contact@pornartistzone.com">contact@pornartistzone.com</a></p>
                </td>
                <td style="padding-left: 15%;padding-right: 15%;">
                     <p>Description <span><?php echo e($data['description']); ?></span>,
                                 <a href="mailto:contact@pornartistzone.com">contact@pornartistzone.com</a></p>
                </td>
             </tr>
             <tr>
             </tr>
         </tbody>

    </table>



</body>
</html><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/artists/artistSupportEmail.blade.php ENDPATH**/ ?>