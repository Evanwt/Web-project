<html>
    <?php
    
    ?>
<head>
  <title>Business Customer Register</title>
</head>
<center><body>
  <h1>Home Customer</h1>
  <div align="center">
      <h2>Registration</h2>
  <form action="register_business.php" method="post">
      <table border="0">
      <tr>
        <td>company name</td>
        <td><input type="text" name="name" maxlength="50" size="20"></td>
      </tr>
      <tr>
        <td>address/street</td>
        <td><input type="text" name="street" maxlength="100" size="20"></td>
      </tr>
      <tr>
        <td>address/city</td>
        <td><input type="text" name="city" maxlength="50" size="20"></td>
      </tr>
      <tr>
        <td>address/state</td>
        <td><input type="text" name="state" maxlength="50" size="20"></td>
      </tr>
      <tr>
        <td>address/zip code</td>
        <td><input type="text" name="zip_code" maxlength="100" size="20"></td>
      </tr>
      
        <td>annual income</td>
        <td><input type="number" name="income" max=9999999 size="20"></td>
      </tr>
      <tr>
        <td>password</td>
        <td><input type="text" name="password" maxlength="20" size="20"></td>
      </tr>    
     </table>
      <p><input class="btn btn-large" type="submit" value="Register"></p>
    </form>
   </div>
	</body></center>
</html>
