<?php
require_once('head.php');
require_once('navbar.php');
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="tooltip.js"></script>

<div class = "orderContainer">
	<div class = "menuDivContainer">

<?php
function menuItem($item, $id, $name, $description, $price)
{
echo '
<div class="menuDiv">
	<div id="menuNumber">
		<div class = "menuTextCenter">'. $id . '</div>
	</div>
	<div class = "menuName" id = "name_' . $id . '">' . $name . '</div>
	<div id="menuDesc">' . $description . '</div>
	<div id="menuPrice">
		<div class = "menuTextCenter" id = "price_' . $id . '">' . $price . '</div>
	</div>
	
	<div id="menuAddToCart">
		<button class = "menuAddToCartButton" id = "add_' . $id . '">
			<div class = "menuTextCenter myTooltip" data-toggle="tooltip" title = "Add item"><b>+</b></div>
		</button>
		<div class = "menuAddToCartButton menuAddToCartNumbe">
			<div class = "menuTextCenter myTooltip"  id = "amount_' . $id . '" data-toggle="tooltip" title = "Amount of items in cart">0</div>
		</div>
		<button class = "menuAddToCartButton" id = "sub_' . $id . '">
			<div class = "menuTextCenter  myTooltip" data-toggle="tooltip" title = "Remove item">-</div>
		</button>
	</div>
</div>
';
}

		//<div class = "menuAddToCartButton">
			//<div class = "menuTextCenter myTooltip" data-toggle="tooltip" title = "Add item(s) to cart">&#62;</div>
		//</div>

require_once 'Dao.php';
$dao = new Dao();
$menuItems = $dao->getMenuItems();
foreach ($menuItems as $item){
	menuItem($item, $item['id'], $item['item'], $item['description'], $item['price']);
}
?>
	</div>
	
	<div class= "cartDiv">Your Items
	<hr>
	
	<div  class= "cartText">
		<div id = "cartList">_
		</div>
		<hr>
		<div id="total" >total: $0</div>
	</div>
	
	<div id="smart-button-container">
    <div style="text-align: center; display: none;"><label for="description"> </label><input type="text" name="descriptionInput" id="description" maxlength="127" value="Restuarant Name"></div>
      <p id="descriptionError" style="display: none; color:red; text-align: center;">Please enter a description</p>
    <div style="text-align: center; display: none;"><label for="amount"> </label><input name="amountInput" type="number" id="amount" value="0" ><span>USD</span></div>
      <p id="priceLabelError" style="display: none; color:red; text-align: center;">Please enter a price</p>
    <div id="invoiceidDiv" style="text-align: center; display: none;"><label for="invoiceid"> </label><input name="invoiceid" maxlength="127" type="text" id="invoiceid" value="" ></div>
      <p id="invoiceidError" style="visibility: hidden; color:red; text-align: center;">Please enter an Invoice ID</p>
    <div style="text-align: center; margin-top: 0.625rem;" id="paypal-button-container"></div>
  </div>
  <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD" data-sdk-integration-source="button-factory"></script>
  <script>
  function initPayPalButton() {
    var description = document.querySelector('#smart-button-container #description');
    var amount = document.querySelector('#smart-button-container #amount');
    var descriptionError = document.querySelector('#smart-button-container #descriptionError');
    var priceError = document.querySelector('#smart-button-container #priceLabelError');
    var invoiceid = document.querySelector('#smart-button-container #invoiceid');
    var invoiceidError = document.querySelector('#smart-button-container #invoiceidError');
    var invoiceidDiv = document.querySelector('#smart-button-container #invoiceidDiv');

    var elArr = [description, amount];

    if (invoiceidDiv.firstChild.innerHTML.length > 1) {
      invoiceidDiv.style.display = "block";
    }

    var purchase_units = [];
    purchase_units[0] = {};
    purchase_units[0].amount = {};

    function validate(event) {
      return event.value.length > 0;
    }

    paypal.Buttons({
      style: {
        color: 'white',
        shape: 'rect',
        label: 'paypal',
        layout: 'vertical',
        
      },

      onInit: function (data, actions) {
        actions.disable();

        if(invoiceidDiv.style.display === "block") {
          elArr.push(invoiceid);
        }

        elArr.forEach(function (item) {
          item.addEventListener('keyup', function (event) {
            var result = elArr.every(validate);
            if (result) {
              actions.enable();
            } else {
              actions.disable();
            }
          });
        });
      },

      onClick: function () {
        if (description.value.length < 1) {
          descriptionError.style.visibility = "visible";
        } else {
          descriptionError.style.visibility = "hidden";
        }

        if (amount.value.length < 1) {
          priceError.style.visibility = "visible";
        } else {
          priceError.style.visibility = "hidden";
        }

        if (invoiceid.value.length < 1 && invoiceidDiv.style.display === "block") {
          invoiceidError.style.visibility = "visible";
        } else {
          invoiceidError.style.visibility = "hidden";
        }

        purchase_units[0].description = description.value;
        purchase_units[0].amount.value = amount.value;

        if(invoiceid.value !== '') {
          purchase_units[0].invoice_id = invoiceid.value;
        }
      },

      createOrder: function (data, actions) {
        return actions.order.create({
          purchase_units: purchase_units,
        });
      },

      onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
          alert('Transaction completed by ' + details.payer.name.given_name + '!');
        });
      },

      onError: function (err) {
        console.log(err);
      }
    }).render('#paypal-button-container');
  }
  initPayPalButton();
  </script>
	</div>

</div>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

<script>  
var cartArray = [];
var total = 0;

$("button").click(function() {
	var x = this.id;
	var cart = document.getElementById("cartList");
	var num = x.substring(4, x.length);
	var costString = document.getElementById("total");
	
	var counter = document.getElementById("amount_" + num);
	var name = document.getElementById("name_" + num).innerHTML;
	var price = document.getElementById("price_" + num).innerHTML;
	
	if (x.substring(0, 3) == "add") {
		counter.innerHTML = parseInt(counter.innerHTML) + 1;
		var itemString = "<div>" + counter.innerHTML + "x " + name + " " + price + "</div>";
		total = total + parseFloat(price);
	} else {
		if (parseInt(counter.innerHTML) > 0){
			counter.innerHTML = parseInt(counter.innerHTML) - 1;
			total = (total - parseFloat(price));
			if (parseInt(counter.innerHTML) == 0) {
				
			}
		}
	}
	
	if (total < 0) {
		total = 0;
	}
	costString.innerHTML = "total: $" + total.toFixed(2);
	var cartObject = {Name:name, Amount:counter, Text:"<div>" + counter.innerHTML + "x " + name + " $" + price * counter.innerHTML + "</div>"};
	
	if (parseInt(counter.innerHTML) == 0){
		for (var i = 0; i < cartArray.length; i++) {
			if (cartArray[i].Name == name){
				cartArray.splice(i, 1);
			}
		}
	} else {
		var inArray = false;
		for (var i = 0; i < cartArray.length; i++) {
			if (cartArray[i].Name == name){
				cartArray[i] = cartObject;
				inArray = true;
			}
		}
		if (inArray == false){
			cartArray.push(cartObject);
		}
	}
	
	var payPalPrice = document.getElementById("amount");
	payPalPrice.value = total.toFixed(2);
	var des = document.getElementById("description");
	des.innerHTML = "Restuarant Transaction" + 3;
	
	var cartString  = "";
	for (var i = 0; i < cartArray.length; i++) {
		cartString += cartArray[i].Text;
	}
	cart.innerHTML = cartString;
});
</script>

<?php
require_once('footer.php');
?>