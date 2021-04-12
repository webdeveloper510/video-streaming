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
                 <td><h1 style="margin-top: 10px;">{{$data['technical_issue']}}</h1></td>
                 
             </tr>
             <tr>
                <td style="padding-left: 15%;padding-right: 15%;">
                <h2>Hi <span> {{$name}} </span></h2><br>
                <p>  We have received your ticket.</p><br>
                <p>  Thanks for getting in touch!</p><br>
                <p>  We'll aim to get back to you within one business day. Our PAZ support team is available any time (holidays excluded) from Monday to Friday.</p><br>
                <p>   In the meantime, you can read our FAQ’s here:<a href="http://pornartistzone.com/developing-streaming/artist/faq">https://pornartistzone.com/artist/faq</a></p><br>
                <p>   For anything else, our PAZ support team will get back to you as soon as possible.</p><br>
                <p>  Have a great day.</p>
                 </td>
             </tr>
             <tr>
             </tr>
         </tbody>

    </table>



</body>
</html>