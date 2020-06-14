var carts = JSON.parse(localStorage.getItem("cart"));
var product;
let modal = document.querySelector(".modal");

(function loadProductDetail() {
  let product_detail_item = JSON.parse(
    sessionStorage.getItem("product_detail_item")
  );
  if (!product_detail_item) {
    return location.assign("../drugstore_cpn/drugstore.html");
  }
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      product = JSON.parse(this.responseText);
      window.document.title = `${product.name} detail`;
      document.getElementById(
        "product-detail"
      ).innerHTML = `<div class="product-img">
                    <img src="${product.image}" class="card-img-top img-card"
                    alt="${product.name}">
                </div>
                <div class="product-content">
                    <div class="product-perform">
                        <h2 class="title">${product.name}</h2>
                        <p class="text-description">${product.description}</p>
                        <div class="box-star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="text-price">${formatNumber(
                          product.price,
                          ".",
                          ","
                        )} vnd</p>
                    </div>
                    <div class="btn-group" role="group" aria-label="First group" style="background-color:#fff">
                        <button type="button" class="btn-item" onclick="countMinus('${
                          product.id
                        }')">-</button>
                        <button type="button" class="btn-item" >1</button>
                        <button type="button" class="btn-item" onclick="countAdd('${
                          product.id
                        }')">+</button>
                    </div>
                    <div class="product-action">
                        <button type="button"  class="btn btn-back" onclick="addToCart('${
                          product.id
                        }')"><i class="fa fa-cart-plus" style="margin-right: 5px;color: #111c63;"></i>Thêm vào rỏ</button>
                        <button type="button" class="btn btn-add" onclick="goToStore()">Mua ngay</button>
                    </div>
                </div>`;
    }
  };
  xhttp.open(
    "GET",
    `https://5d725e295acf5e0014730dd9.mockapi.io/api/v2/Students/${product_detail_item}`,
    true
  );
  xhttp.send();
  loadMessCart();
})();

function loadMessCart() {
  if (!carts || carts.length === 0) {
    return (document.getElementById("cart_mess").style.display = "none");
  }
  document.getElementById("cart_mess").style.display = "inline-block";
}

function formatNumber(nStr, decSeperate, groupSeperate) {
  nStr += "";
  x = nStr.split(decSeperate);
  x1 = x[0];
  x2 = x.length > 1 ? "." + x[1] : "";
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(x1)) {
    x1 = x1.replace(rgx, "$1" + groupSeperate + "$2");
  }
  return x1 + x2;
}

function renderCart() {
  modal.style.display = "block";
  let total_bill = 0;
  if (!carts || carts.length === 0) {
    document.getElementById("total_bill").innerHTML = `${total_bill}đ`;
    return (document.getElementById(
      "cart_item"
    ).innerHTML = `<p class="card-text">Không có sản phẩm nào!</p>`);
  }
  document.getElementById("cart_item").innerHTML = "";
  carts.forEach((item) => {
    document.getElementById("cart_item").innerHTML += `<div class="item">
            <img src="${item.image}" class="item-img" />
            <span class="item-name">${item.name}</span>
            <span class="item-price">${formatNumber(
              item.price,
              ".",
              ","
            )}đ</span>
            <div class="btn-group" role="group" aria-label="First group" style="background-color:#fff">
                <button type="button" class="btn-item" onclick="countMinus('${
                  item.id
                }')">-</button>
                <button type="button" class="btn-item" >${item.amount}</button>
                <button type="button" class="btn-item" onclick="countAdd('${
                  item.id
                }')">+</button>
            </div>
            <span class="item-total">${formatNumber(
              item.price * item.amount,
              ".",
              ","
            )}đ</span>
            <button type="button" class="btn-action" onclick="deleteFromCart('${
              item.id
            }')">Xóa</button>
        </div>`;
    total_bill += item.price * item.amount;
  });
  document.getElementById("total_bill").innerHTML = `${formatNumber(
    total_bill,
    ".",
    ","
  )}đ`;
}

function goToStore() {
  location.assign("../drugstore_cpn/drugstore.html");
}

class item_cart {
  constructor(id, image, name, price, description, amount) {
    this.id = id;
    this.image = image;
    this.name = name;
    this.price = price;
    this.description = description;
    this.amount = amount;
  }
}

function addToCart(product_id) {
  if (!carts) {
    carts = [];
    carts.push(
      new item_cart(
        product.id,
        product.image,
        product.name,
        product.price,
        product.description,
        1
      )
    );
  } else {
    let isHas = false;
    carts.forEach((item) => {
      if (item.id === product_id) {
        item.amount++;
        isHas = true;
        return;
      }
    });
    if (!isHas) {
      carts.push(
        new item_cart(
          product.id,
          product.image,
          product.name,
          product.price,
          product.description,
          1
        )
      );
    }
  }
  localStorage.setItem("cart", JSON.stringify(carts));
  loadMessCart();
}

function countAdd(item_id) {
  carts.forEach((product) => {
    if (product.id === item_id) {
      product.amount++;
    }
  });
  localStorage.setItem("cart", JSON.stringify(carts));
  renderCart();
  loadMessCart();
}

function countMinus(item_id) {
  carts.forEach((product, i) => {
    if (product.id === item_id) {
      product.amount--;
      if (product.amount === 0) {
        carts.splice(i, 1);
      }
    }
  });
  localStorage.setItem("cart", JSON.stringify(carts));
  renderCart();
  loadMessCart();
}

function deleteFromCart(product_id) {
  carts.forEach((product, i) => {
    if (product.id === product_id) {
      carts.splice(i, 1);
    }
  });
  localStorage.setItem("cart", JSON.stringify(carts));
  renderCart();
  loadMessCart();
}

//Modal
function closeModal() {
  modal.style.display = "none";
}
window.onclick = function (e) {
  if (e.target == modal) {
    modal.style.display = "none";
  }
};
