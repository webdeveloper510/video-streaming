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
                <img src="{{asset('images/email.jpg')}}"  alt="email-image" width="590px">
                </th>
            </tr>
        </thead>
         <tbody>
             <tr>
                 <td><h1 style="margin-top: 10px;"></h1></td>
                 
             </tr>
             <tr>
                <td style="padding-left: 15%;padding-right: 15%;">
                <h2>Hi <span> {{$data['name']}}</span></h2>
                <p>Thanks for getting in touch!</p><br>
                  <p>The file “filename.mp4” 
that was uploaded on your Account includes material that could be categorized as harmful/misleading/underage.
 For the protection and wellbeing of our customers we have taken it down.Ps:
If you believe you are being treated wrong, please reach out to us atartist@pornartistzone.com</p><br>
                  <p>Have a great day.</p> <br>
                  <p>Ps: Please do not respond to this email. </p>
                  <p>-----------------</p>
                  <p>Your PAZ team</p>
                 </td>
             </tr>
             <tr>
             </tr>
         </tbody>

    </table>



</body>
</html>