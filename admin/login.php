<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrator Login</title>

<link rel="stylesheet" href="css/login.css"/>
 
</head>

<body>


<div id="login-form">
	<form action="login-check.php" method="post">
    	<center>
        	<img src="img/logo.png" width="230" class="logo"/><br>
           <table>
           		<tr>
                	<td>Username</td>
                    <td>:</td>
                    <td><input name="username" type="text"/></td>
                </tr>
                
                <tr>
                	<td>Password</td>
                    <td>:</td>
                    <td><input name="password" type="password"/></td>
                </tr>
                 <tr>
                	<td></td>
                    <td></td>
                    <td></td>
                </tr>
           </table>
           <input type="submit" value="LOGIN"/>  <input type="button" value="BACK"/>
        </center>
    </form>
</div>

</body>
</html>