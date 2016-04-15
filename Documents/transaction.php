<html>
<head><title>The Online Shopping Corporation</title></head>
<body>
<center>
    <h1>Shopping Transaction</h1>
<form action="processorder.php" method="post">
<table border="0">
<tr bgcolor="#cccccc">
  <td width="150" align="center">Purchase Option</td>
  <td width="20" align="center">Enter</td>
</tr>
<tr>
  <td>Product ID</td>
  <td align="center"><input type="text" name="product_id" size="20"
     maxlength="20" /></td>
</tr>
<tr>
  <td>Quantity</td>
  <td align="center"><input type="number" name="quantity"   /></td>
</tr>
<tr>
  <td>Customer ID</td>
  <td align="center"><input type="text" name="customer_id" size="20"
     maxlength="20" /></td>
</tr>
<tr>
  <td>Salesman ID</td>
  <td align="center"><input type="text" name="s_id" size="20"
     maxlength="20" /></td>
</tr>
<tr>
</tr>

<tr>
  <td colspan="2" align="center"><input type="submit" value="Submit order" /></td>
</tr>
</table>
</form>
    <a href="homec_search.php">Back</a>
</center>
</body>
</html>
