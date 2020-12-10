<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <link rel="stylesheet" href="./product-detail.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
      integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,500;1,400&display=swap"
      rel="stylesheet"
    />
  </head>

  <body>
  <?php
    // Kết nối Database
    include '../../connect.php';
    $id=$_GET['id'];
    $query=mysqli_query($conn,"select * from `product` where id='$id'");
    $row=mysqli_fetch_assoc($query);
    ?>
    <div id="headerNavbar">
      <div id="menuLeft">
        <a class="navbar-brand" href="../../dashboard/home_cpn/index.php">
          <img
            src="https://cdn.jiohealth.com/pharmacy/product/asset/images/navJioLogo@3x.png"
            alt="nhathuoc24h.com"
            width="140px"
            height="60px"
        /></a>
      </div>
      <div id="menuRight">
        <div id="icon-nav">
          <a href="#" onclick="render_menu()">
            <i class="fas fa-bars"></i>
          </a>
        </div>
        <div id="active-icon-nav">
          <a href="#" onclick="render_icon()">
            <i class="fas fa-bars"></i>
          </a>
        </div>
        <ul id="menu">
          <li class="nav-item">
            <a class="nav-link" href="../../dashboard/home_cpn/index.php"
              >Trang chủ</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../drugstore_cpn/drugstore.php"
              >Nhà thuốc online</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="renderCart()">
              <i
                class="fa fa-cart-plus"
                style="margin-right: 5px; color: #111c63;"
              ></i>
              <i class="fas fa-circle" id="cart_mess"></i>
            </a>
          </li>
        </ul>
      </div>
      <ul id="menu-reponse">
        <li class="nav-item">
          <a class="nav-link" href="../../dashboard/home_cpn/index.php"
            >Trang chủ</a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../drugstore_cpn/drugstore.php"
            >Nhà thuốc online</a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" onclick="renderCart()">
            <i
              class="fa fa-cart-plus"
              style="margin-right: 5px; color: #111c63;"
            ></i>
            <i class="fas fa-circle" id="cart_mess"></i>
          </a>
        </li>
      </ul>
    </div>

    <hr id="hr" style="padding: 30px;" />

    <div class="product row">
      <div class="product-img col-xs-12 col-s-8 col-6">
        <img src="<?php echo $row['image']; ?>" class="card-img-top img-card"
          alt="<?php echo $row['name']; ?>">
      </div>
      <div class="product-content col-xs-12 col-s-12 col-6">
        <div class="product-perform">
          <h2 class="title"><?php echo $row['name']; ?></h2>
          <p class="text-description"><?php echo $row['description']; ?></p>
          <div class="box-star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <p class="text-price"><?php echo $row['price']; ?>vnd</p>
        </div>
        <div class="btn-group" role="group" aria-label="First group" style="background-color:#fff">
          <button type="button" class="btn-item" onclick="Minus(number_amount)">-</button>
          <button type="button" class="btn-item" >1</button>
          <button type="button" class="btn-item" onclick="Add(number_amount)">+</button>
        </div>
        <div class="product-action">
          <!-- <button type="button" class="btn btn-back" onclick="addToCart('${
            product.id
          }', number_amount)"><i class="fa fa-cart-plus" style="margin-right: 5px;color: #111c63;"></i>Thêm vào rỏ</button>
          <button type="button" class="btn btn-add" onclick="goToStore()">Mua ngay</button> -->
        </div>
      </div>
    </div>
    <div class="note-box">
      <p id="title-rate">Thành phần</p>
      <p>Bao gồm:</p>
      <ul style="margin-left: 30px;">
        <li>Hoạt chất chính: Natri clorid 0.9 %.</li>
        <li>Nước cất vừa đủ 10ml</li>
      </ul>
      <hr style="margin: 20px 0px;" />
      <p id="title-rate">Hướng dẫn sửa dụng</p>
      <p>Chỉ định:</p>
      <ul style="margin-left: 30px;">
        <li>Nhỏ mắt hoặc rửa mắt, chống kích ứng mắt và sát trùng nhẹ.</li>
        <li>Trị nghẹt mũi, sổ mũi, viêm mũi do dị ứng.</li>
        <li>Đặc biệt dùng được cho trẻ sơ sinh và người lớn.</li>
      </ul>
      <p>Chống chỉ định:</p>
      <ul style="margin-left: 30px;">
        <li>Dị ứng với một trong các thành phần của thuốc.</li>
      </ul>
      <p>Đối tượng sử dụng:</p>
      <ul style="margin-left: 30px;">
        <li>Người lớn và trẻ em.</li>
        <li>Có thế dùng cho trẻ sơ sinh.</li>
      </ul>
      <p>Liều dùng:</p>
      <ul style="margin-left: 30px;">
        <li>
          Nhỏ hoặc rửa mắt, hốc mũi, mỗi lần 2 – 3 giọt, ngày 3 – 4 lần hoặc
          nhiều hơn
        </li>
      </ul>
      <hr style="margin: 20px 0px;" />
      <p id="title-rate">Bảo quản, thận trọng</p>
      <p>Bảo quản:</p>
      <ul style="margin-left: 30px;">
        <li>
          Nơi khô ráo thoáng mát, tránh ánh nắng trực tiếp, nhiệt độ dưới 30 độ
          C
        </li>
      </ul>
      <p>Thận trọng:</p>
      <ul style="margin-left: 30px;">
        <li>Đậy kín sau khi dùng.</li>
        <li>Tránh làm nhiễm bẩn đầu chai thuốc.</li>
      </ul>
    </div>
    <div class="evaluate row">
      <div class="col-5 col-s-9 col-xs-12">
        <p id="title-rate">Nhận xét</p>
        <div class="box-star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <p>30 nhận xét</p>
        <div id="box-rate">
          <div class="default-star">
            <i class="fas fa-star true"></i>
            <i class="fas fa-star true"></i>
            <i class="fas fa-star true"></i>
            <i class="fas fa-star true"></i>
            <i class="fas fa-star true"></i>
          </div>
          <div class="rate-right">
            <div class="rate" style="width: 65%;"></div>
          </div>
          <p>20</p>
        </div>
        <div id="box-rate">
          <div class="default-star">
            <i class="fas fa-star true"></i>
            <i class="fas fa-star true"></i>
            <i class="fas fa-star true"></i>
            <i class="fas fa-star true"></i>
            <i class="fas fa-star false"></i>
          </div>
          <div class="rate-right">
            <div class="rate" style="width: 35%;"></div>
          </div>
          <p>10</p>
        </div>
        <div id="box-rate">
          <div class="default-star">
            <i class="fas fa-star true"></i>
            <i class="fas fa-star true"></i>
            <i class="fas fa-star true"></i>
            <i class="fas fa-star false"></i>
            <i class="fas fa-star false"></i>
          </div>
          <div class="rate-right">
            <div class="rate" style="width: 0%;"></div>
          </div>
          <p>0</p>
        </div>
        <div id="box-rate">
          <div class="default-star">
            <i class="fas fa-star true"></i>
            <i class="fas fa-star true"></i>
            <i class="fas fa-star false"></i>
            <i class="fas fa-star false"></i>
            <i class="fas fa-star false"></i>
          </div>
          <div class="rate-right">
            <div class="rate" style="width: 0%;"></div>
          </div>
          <p>0</p>
        </div>
        <div id="box-rate">
          <div class="default-star">
            <i class="fas fa-star true"></i>
            <i class="fas fa-star false"></i>
            <i class="fas fa-star false"></i>
            <i class="fas fa-star false"></i>
            <i class="fas fa-star false"></i>
          </div>
          <div class="rate-right">
            <div class="rate" style="width: 0%;"></div>
          </div>
          <p>0</p>
        </div>
        <button type="button" class="btn btn-add" style="margin: 15px 0px;">
          Viết nhận xét
        </button>
      </div>
      <div class="col-7 col-s-12 col-xs-12">
        <div>
          <p id="name" style="font-weight: bold;">Phí Hữu Long</p>
          <div class="default-star" style="margin-bottom: 10px;">
            <i class="fas fa-star true"></i>
            <i class="fas fa-star true"></i>
            <i class="fas fa-star true"></i>
            <i class="fas fa-star true"></i>
            <i class="fas fa-star true"></i>
          </div>
          <p>Sản phẩm này chill phết</p>
          <p style="color: #888;">14/06/2020</p>
        </div>
        <hr style="margin: 15px 0px;" />
        <div>
          <p id="name" style="font-weight: bold;">Doãn Văn Nam</p>
          <div class="default-star" style="margin-bottom: 10px;">
            <i class="fas fa-star true"></i>
            <i class="fas fa-star true"></i>
            <i class="fas fa-star true"></i>
            <i class="fas fa-star true"></i>
            <i class="fas fa-star true"></i>
          </div>
          <p>Sản phẩm này chill phết</p>
          <p style="color: #888;">14/06/2020</p>
        </div>
        <hr style="margin: 15px 0px;" />
        <div>
          <p id="name" style="font-weight: bold;">Nguyễn Khắc Mạnh</p>
          <div class="default-star" style="margin-bottom: 10px;">
            <i class="fas fa-star true"></i>
            <i class="fas fa-star true"></i>
            <i class="fas fa-star true"></i>
            <i class="fas fa-star true"></i>
            <i class="fas fa-star false"></i>
          </div>
          <p>Sản phẩm này chill phết</p>
          <p style="color: #888;">14/06/2020</p>
        </div>
      </div>
    </div>
    <footer>
      <div class="row" style="padding: 40px; justify-content: space-around;">
        <div class="box-footer col-4 col-s-6 col-xs-12">
          <div>
            <img
              src="https://cdn.jiohealth.com/jio-website/home-page/jio-website-v2020-06-04-09-05-35/assets/images/logo.svg"
              alt="nhathuoc24h.com"
              width="140px"
              height="70px"
            />
          </div>
          <p>
            Tempora dolorem voluptatum nam vero assumenda voluptate, facilis ad
            eos obcaecati tenetur veritatis eveniet distinctio possimus.
          </p>
          <ul id="contact-social">
            <li>
              <a href="#"><i class="fab fa-facebook-square"></i></a>
            </li>
            <li>
              <a href="#"><i class="fab fa-twitter-square"></i></a>
            </li>
            <li>
              <a href="#"><i class="fab fa-instagram"></i></a>
            </li>
          </ul>
        </div>
        <div class="box-footer col-4 col-s-6 col-xs-12">
          <ul id="sub-menu-footer">
            <li><a href="#">Tất cả</a></li>
            <li><a href="#">Thuốc bán theo chỉ định</a></li>
            <li><a href="#">Thuốc đặc trị</a></li>
            <li><a href="#">Thực phẩm chức năng</a></li>
            <li><a href="#">Dược mỹ phẩm</a></li>
            <li><a href="#">Dụng cụ y tế</a></li>
          </ul>
        </div>
        <div class="box-footer col-4 col-s-6 col-xs-12">
          <h3><b>Get In Touch</b></h3>
          <ul style="padding: 0px;">
            <li>
              <p>
                <i class="fas fa-envelope-square pr-2"></i>Support Available for
                24/7
              </p>
            </li>
            <li><a href="#">Privacy Policy</a><b>Support@email.com</b></li>
            <li>Mon to Fri : 08:30 - 18:00</li>
            <li>
              <a href="#"
                ><b><i class="fas fa-phone pr-1"></i>+23-456-6588</b></a
              >
            </li>
          </ul>
        </div>
      </div>
    </footer>
    <div class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close-btn" onclick="closeModal()">&times;</span>
          <h2>Giỏ hàng của bạn</h2>
        </div>
        <div class="modal-body" id="cart_item"></div>
        <div class="modal-footer">
          <span class="total">Tổng cộng: <span id="total_bill"></span></span>
          <button type="button" class="btn-footer" onclick="closeModal()">
            Tiếp tục mua hàng
          </button>
          <button
            type="button"
            class="btn-footer btn-primary"
            onclick="onPay()"
          >
            Thanh toán
          </button>
        </div>
      </div>
    </div>
    <!-- <script src="./product-detail.js"></script> -->
  </body>
</html>