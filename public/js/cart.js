window.addEventListener("load", () => refreshCartNumber());

function addToCart(userId, cakeId) {
  if (userId == 0) {
    launch_toast("Please login to add cake");
    return;
  }
  var documentRoot = document.getElementById("documentRootId").innerText;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var response = JSON.parse(this.response);
      if (response.isSuccess == true) {
        refreshCartNumber(response.numInCart);
        launch_toast("Add to cart successful");
      } else {
        launch_toast("Add to cart failed");
        console.error(response.error);
      }
    }
  };
  xhttp.open("GET",`${documentRoot}/cart/addToCart?userId=${userId}&cakeId=${cakeId}`,true);
  xhttp.send();
}

function launch_toast(message) {
  var x = document.getElementById("toast");
  document.getElementById("desc").innerText = message;
  x.className = "show";
  setTimeout(function () {
    x.className = x.className.replace("show", "");
  }, 5000);
}

function refreshCartNumber(cartNumber = -1) {
  var cartNumberElement = document.getElementById("numInCartId");
  if (cartNumber !== -1) {
    cartNumberElement.innerText = cartNumber;
  } else {
    var documentRoot = document.getElementById("documentRootId").innerText;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        cartNumber = this.responseText;
        cartNumberElement.innerText = cartNumber;
      }
    };
    xhttp.open("GET", `${documentRoot}/cart/amountInCart`, true);
    xhttp.send();
  }
}
