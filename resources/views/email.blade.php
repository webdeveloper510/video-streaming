<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;1,300&display=swap" rel="stylesheet">
    <title>Email Template</title>

</head>
<body style="width:600px;    margin-left: 27%;
margin-top: 5%;background-color: #ebebeb;font-family: 'Roboto', sans-serif;">


    <table style="background-color: #fff;text-align: center;">

         <tbody>

             <tr>
                 <td><h1 style="margin-top: 10px; font-size:50px;"> {{$data['customer_issue']}}</h1></td>
                 
             </tr>

             <tr>
                 <td><h1 style="margin-top: 10px;"> Email :-{{$data['customer_email']}}</h1></td>
                 
             </tr>

             <tr>
                  <h3 style="color:#7b0000; font-size:30px;">Description</h3>
             </tr>
             <tr>
                <td style="padding-left: 15%;padding-right: 15%;">
                     <p> <span>{{$data['customer_description']}}</span>, 
                    </p>
                </td>
             </tr>
             
         </tbody>

    </table>
</body>
</html>