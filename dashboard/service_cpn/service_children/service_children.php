<?php
    $query = "SELECT * FROM `doctor` WHERE type = 'nhi'";
    $filter_result = filterTable($query);
    function filterTable($query) {
        require '../../../connect.php';
        $result = mysqli_query($conn, $query);
        return $result;
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nhi khoa</title>
    <link rel="stylesheet" href="./service_children.css" />
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
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="container" style="padding-top: 63px">
      <nav
        class="navbar navbar-expand-lg fixed-top navbar-light bg-light"
        style="box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1)"
      >
        <a class="navbar-brand" href="../../home_cpn/index.php">
          <img
            src="https://cdn.jiohealth.com/pharmacy/product/asset/images/navJioLogo@3x.png"
            alt="nhathuoc24h.com"
            width="60px"
            height="auto"
          />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarToggler"
          aria-controls="navbar-toggler-icon"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ml-100" id="navbarToggler">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a
                class="nav-item nav-link active"
                href="../../home_cpn/index.php"
                >Trang chủ</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-item nav-link active"
                href="../../../product/drugstore_cpn/drugstore.php"
                >Nhà thuốc online</a
              >
            </li>
          </ul>
        </div>
      </nav>
      <div id="intro" class="d-flex flex-wrap pt-5 pb-5">
        <div class="col-12 col-lg-4">
          <h1 class="title-box">Nhi khoa</h1>
          <p class="text">
            Chăm sóc, điều trị cho trẻ từ sơ sinh đến khi trưởng thành....
          </p>
          <p class="text">Giá gốc 600.000đ</p>
          <p class="price">500.000đ</p>
          <button class="btn" style="background-color: #567fea; color: #fff">
            Đặt hẹn khám ngay
          </button>
        </div>
        <div class="col-12 col-lg-8 pt-4">
          <img
            src="../../../assets/pediatric-banner.svg"
            alt=""
            width="100%"
            height="auto"
          />
        </div>
      </div>
      <div id="doctor-box" class="pt-5 pb-5">
        <h1 class="title-sub">Gặp gỡ bác sĩ Chuyên khoa Nhi</h1>
        <div class="row wrap justify-content-center w-100 m-0">
          <?php while($row = mysqli_fetch_array($filter_result)) :?>
          <div style="width: 250px; margin: 10px">
            <div
              style="
                box-shadow: 0 2px 20px #ccd3e4;
                border: none;
                border-radius: 10px !important;
              "
            >
              <img
                class="card-img-top"
                src="<?php echo $row['doctorAvatar']; ?>"
                alt="Card image cap"
                height="190"
                style="
                  object-fit: cover;
                  border-top-left-radius: 10px !important;
                  border-top-right-radius: 10px !important;
                "
              />
              <div class="card-body d-flex flex-column justify-content-around">
                <div>
                  <div style="font-size: 18px; font-weight: 500">
                    <?php echo $row['doctorName']; ?>
                  </div>
                  <div
                    class="card-description"
                    style="color: #777; margin-bottom: 10px"
                  >
                    <?php echo $row['description']; ?>
                  </div>
                </div>
                <div class="card-price text-center" style="color: #567fea">
                  <i class="fa fa-heart"></i>
                  <i class="fa fa-heart"></i>
                  <i class="fa fa-heart"></i>
                  <i class="fa fa-heart"></i>
                  <i class="fa fa-heart"></i>
                </div>
                <div class="d-flex justify-content-around mt-3">
                  <button
                    type="button"
                    class="btn"
                    style="background-color: #567fea; color: #fff"
                  >
                    Hẹn tư vấn
                  </button>
                  <button type="button" class="btn btn-outline-info">
                    Thông tin
                  </button>
                </div>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
        </div>
      </div>
      <div id="info" class="p-5">
        <h1 class="title-sub">Chăm Sóc Chu Đáo - Tận Tình</h1>
        <div class="d-flex flex-wrap justify-content-center w-100 m-0">
          <div
            class="card d-flex flex-column justify-content-between"
            style="
              width: 300px;
              margin: 10px;
              border-radius: 12px;
              box-shadow: 0 2px 20px #ccd3e4;
              border: none;
            "
          >
            <div class="p-3">
              <p class="box-title">Thận trọng khi kê toa kháng sinh</p>
              <p class="box-text">
                Sử dụng kháng sinh bừa bãi là nguyên nhân hàng đầu gây kháng
                kháng sinh. Theo Trung Tâm Kiểm Soát Bệnh Dịch (CDC), một nửa số
                thuốc kháng sinh sử dụng là không cần thiết hoặc không phù hợp
              </p>
            </div>
            <img
              src="../../../assets/background-card.svg"
              alt=""
              width="100%"
            />
          </div>
          <div
            class="card d-flex flex-column justify-content-between"
            style="
              width: 300px;
              margin: 10px;
              border-radius: 12px;
              box-shadow: 0 2px 20px #ccd3e4;
              border: none;
            "
          >
            <div class="p-3">
              <p class="box-title">Điều Trị Dựa Trên Bằng Chứng</p>
              <p class="box-text">
                Điều trị dựa trên bằng chứng là cốt lõi của các phương thức điều
                trị tại Jio Health. Các bác sĩ Nhi khoa của chúng tôi sẽ chỉ kê
                toa các xét nghiệm, chẩn đoán và thuốc nếu thật sự cần thiết và
                phù hợp với từng bệnh nhân dựa vào việc khám lâm sàng
              </p>
            </div>
            <img
              src="../../../assets/background-card.svg"
              alt=""
              width="100%"
            />
          </div>
          <div
            class="card d-flex flex-column justify-content-between"
            style="
              width: 300px;
              margin: 10px;
              border-radius: 12px;
              box-shadow: 0 2px 20px #ccd3e4;
              border: none;
            "
          >
            <div class="p-3">
              <p class="box-title">Phát hiện & Phòng ngừa sớm</p>
              <p class="box-text">
                Các bác sĩ Nhi khoa của Jio Health sẽ chẩn đoán các yếu tố nguy
                cơ sớm và hướng dẫn bệnh nhân tích cực hơn trong suy nghĩ và
                hành động để tránh bệnh tình trở nặng như béo phì, tiểu đường và
                các bệnh mãn tính khác.
              </p>
            </div>
            <img
              src="../../../assets/background-card.svg"
              alt=""
              width="100%"
            />
          </div>
        </div>
      </div>
    </div>
    <div id="booking">
      <div>
        <span style="font-size: 25px; font-weight: bold; color: #fff"
          >Đặt lịch thăm khám tại nhà</span
        >
        <div class="pt-3">
          <button
            type="button"
            class="btn btn-outline-warning"
            style="color: #fff"
          >
            Liên hệ với chúng tôi
          </button>
          <button
            type="button"
            class="btn"
            style="background-color: #567fea; color: #fff"
          >
            Đặt hẹn ngay
          </button>
        </div>
      </div>
    </div>
    <footer>
      <div class="container d-flex flex-wrap p-5">
        <div class="col-lg-6 col-md-12">
          <div>
            <img
              src="https://cdn.jiohealth.com/pharmacy/product/asset/images/navJioLogo@3x.png"
              alt="nhathuoc24h.com"
              width="60px"
              height="auto"
            />
          </div>
          <p>
            Tempora dolorem voluptatum nam vero assumenda voluptate, facilis ad
            eos obcaecati tenetur veritatis eveniet distinctio possimus.
          </p>
          <div class="asocial d-flex">
            <a href="#" class="m-1"><i class="fab fa-facebook-square"></i></a>
            <a href="#" class="m-1"><i class="fab fa-twitter-square"></i></a>
            <a href="#" class="m-1"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <h3><b>Liên lạc</b></h3>
          <div>
            <p>
              <i class="fas fa-envelope-square pr-2"></i>Support Available for
              24/7
            </p>
            <a href="#">Privacy Policy</a><b>Support@email.com</b>
            <p>Mon to Fri : 08:30 - 18:00</p>
            <a href="#"
              ><b><i class="fas fa-phone pr-1"></i>+23-456-6588</b></a
            >
          </div>
        </div>
      </div>
    </footer>
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
