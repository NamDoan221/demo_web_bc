<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="./login.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
    />
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NTGZLDR');</script>
    <!-- End Google Tag Manager -->
  </head>

<body>
    <div class="container">
        <div id="box">
            <div class="logo item">
                <img src="https://cdn.jiohealth.com/jio-website/home-page/jio-website-v2020-06-04-09-05-35/assets/images/logo.svg" alt="nhathuoc24h.com" width="180px" height="70px">
                <p style="letter-spacing: 2px;">Vì sức khoẻ của bạn và gia đình</p>
            </div>
            <div class="content item">
                <p style="font-size: 13px;">Đăng nhập để mua thuốc theo yêu cầu hoặc theo sự chỉ dẫn của bác sĩ</p>
                <form method="POST" class="form">
                    <div id="input"><input type="text" placeholder="Số điện thoại" id="sdt" name="username" /></div>
                    <div id="input"><input type="password" placeholder="Mật khẩu" id="pass" name="password" /></div>
                    <div id="check">
                        <input type="checkbox" id="remember_pass" />
                        <label for="remember_pass">Nhớ mật khẩu</label>
                    </div>
                    <button type="submit" name="login" class="_btn btnLogin">Đăng nhập</button>
                    <?php
                        if (isset($_POST['login'])){
                        $username=$_POST['username'];
                        $password=$_POST['password'];
                        
                        echo $password;
                        echo $username; 
                        // Create connection
                        require '../../connect.php';
                        $query=mysqli_query($conn,"SELECT * FROM `user` WHERE username='$username' AND password='$password'");
                        $row=mysqli_fetch_assoc($query);
                        if ($row) {
                            echo '<script language="javascript">window.location="index.php";</script>';
                        }
                        $conn->close();
                        }
                        ?>
                </form>
                <button class="_btn btnSigup" onclick="onRegister()">Tạo tài khoản</button>
                <div style="width: 80%;text-align: center;margin-top: 20px;">
                    <a href="">Quên mật khẩu</a>
                </div>
            </div>
        </div>
    </div>
    <div class="toast" id="toast_id" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="https://cdn.jiohealth.com/jio-website/home-page/jio-website-v2020-06-04-09-05-35/assets/images/logo.svg" class="rounded mr-2" alt="nhathuoc24h.com" width="60px" height="30px">
            <strong class="mr-auto">nhathuoc24h.com</strong>
            <small>a few seconds ago</small>
            <button type="button" class="close" data-dismiss="toast" aria-label="Close" onclick="hideToast()">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="content item">
          <p style="font-size: 13px;">
            Đăng nhập để mua thuốc theo yêu cầu hoặc theo sự chỉ dẫn của bác sĩ
          </p>
          <div id="input">
            <input type="text" placeholder="Số điện thoại" id="sdt"/>
          </div>
          <div id="input">
            <input type="password" placeholder="Mật khẩu" id="pass" />
          </div>
          <div id="check">
            <input type="checkbox" id="remember_pass" />
            <label for="remember_pass">Nhớ mật khẩu</label>
          </div>
          <button class="_btn btnLogin" onclick="onLogin()">Đăng nhập</button>
          <button class="_btn btnSigup" onclick="onRegister()">
            Tạo tài khoản
          </button>
          <div style="width: 80%; text-align: center; margin-top: 20px;">
            <a href="">Quên mật khẩu</a>
            <fb:login-button
              id="fb-btn"
              class="nav-link"
              scope="public_profile,email"
              onlogin="checkLoginState();"
            >
            </fb:login-button>
          </div>
        </div>
      </div>
    </div>
</body>
<!-- <script src="./login.js"></script> -->

</html>
