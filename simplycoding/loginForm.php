		<link rel="stylesheet" href="loginForm.css">
<html>
	<head>
		<meta charset="UTF-8">
		<title>Login Page</title>

	</head>
	<body>
		
		<div class="container">
  <div class="title">
  
  <nav class="main-nav">
  <img src="https://theluckycupcakecompany.com/wp-content/uploads/Lucky-Cupcake-Logo-Round-Cupcake.jpg" alt="Logo" class="logo">
      <h2>&nbsp&nbspCakes and Desserts<h2>
	</nav>
  </div>
<div class="d-flex">
  
	<table>
	<tr>
	<td>
	  <div class="Yorder">
    <table>
	<form METHOD="post" ACTION="register.php">
      <tr>
        <th colspan="2"><big><p style="color:#8B4513">Sign in</p></big></th>
      </tr>	
      <tr>
        <td>Username or UserId</td>
        <td><input type="text" name="username" size="20"></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="password" name="password" size="29"></td>
      </tr>
      <tr>
        <td>Keep me logged in</td>
        <td><input type="checkbox" NAME="loggedIn" VALUE="1"/></td>
      </tr>
    </table><br>
	<input type="submit" NAME="login" VALUE="Login"/>
	<br>
	<?php
	?>
  </div><!-- Yorder -->
 </div>
</div>
</td>
 </form>
	<td>
	<form METHOD="post" ACTION="register.php">
	<h3> Sign up</h3>
    <label>
      <span>Username<span class="required">*</span></</span>
      <input type="text" name="username" required>
    </label>
   
    <label>
      <span>Email</span>
      <input type="email" name="email" required>
    </label>
	
    <label>
      <span>Password<span class="required">*</span></</span>
      <input type="password" name="password" required>
    </label>
    <label>
      <span>Confirm Password<span class="required">*</span></span>
      <input type="password" name="repass" required> 
    </label>
	<label>
 	<input type="submit" NAME="register" VALUE="Register"/>
    </label>
	</td>
</tr>
</table>
  </form>

	</body>
</html>
	