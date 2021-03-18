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
                 <td><h1 style="margin-top: 10px;"> Issue :-{{$data['nickname']}}</h1></td>
                 
             </tr>
             <tr>
                  <h3>Discription</h3>
             </tr>
             <tr>
                <td style="padding-left: 15%;padding-right: 15%;">
                     <p>Hey <span>{{$data['nickname']}}</span>, Thank you for visiting our website. We are currently in development process.
                We will notify you as soon as we are ready.
               If you have any questions, concerns or other inquiries please reach out to us using:
                    </p>
                </td>
             </tr>
             
         </tbody>

    </table>



</body>
</html>