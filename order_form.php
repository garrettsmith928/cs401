<html>
  <head>
  </head>
  <body>
    <h1>Order</h1>
    <form method="post" action="login_handler.php">
      <div class="input_box">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
      </div>
      <br/>
	  
      <div class="input_box">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
      </div>
	  <br/>
	  
	  <div class="input_box">
        <label for="phone_number">Phone Number</label>
        <input type="text" id="phone_number" name="phone_number">
      </div>
      <br/>
	  
	  <div class="input_box">
        <label for="city">City:</label>
        <input type="text" id="city" name="city">
      </div>
      <br/>
	  
	  <div class="input_box">
        <label for="state">State</label>
        <input type="text" id="state" name="state">
      </div>
      <br/>
	  
	  <div class="input_box">
        <label for="zip">Zip code</label>
        <input type="number_format" id="zip" name="zip">
      </div>
      <br/>
	  
      <input type="submit" value="Submit">
    </form>
  </body>
</html>