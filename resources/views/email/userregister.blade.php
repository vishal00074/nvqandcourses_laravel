<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Email</title>
   </head>
   <body>
        <p><br>New user register to NVQ & Courses Web Application.</p>
        <p><h3><u>User Details</u> :</h3></p>
        
        <table>
            <tr>
                <th align="left">User Name &nbsp;&nbsp;&nbsp;&nbsp;</th>
                <td>{{ $detail['name'] }}</td>
            </tr>
            <tr>
                <th align="left">Email</th>
                <td>{{ $detail['email'] }}</td>
            </tr>
            <tr>
                <th align="left">Password</th>
                <td>{{ $detail['password'] }}</td>
            </tr>
        </table>
        <br><br>
        
        <a href="{{ $detail['url'] }}">Click here to login.</a>
        
        <div>
            <p>Best regards,</p>
		    <p>The NVQ Team</p>
        </div>
   </body>
</html>