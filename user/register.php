<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Đăng ký tài khoản</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
            integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <?php
            require '../connect.php';
            session_start();
        ?>
        <div class="container pt-4 mt-4 w-50">
            <div class="jumbotron w-100">
                <div>
                    <a href="./login.php"><i class="fas fa-arrow-left" style="font-size: 25px;"></i></a>
                </div>
                <div class="d-flex flex-column justify-content-center w-100 align-items-center">
                    <img src="https://cdn.jiohealth.com/pharmacy/product/asset/images/navJioLogo@3x.png" alt="nhathuoc24h.com" width="120px" height="70px">
                    <p class="mt-3" style="letter-spacing: 2px;">Vì sức khoẻ của bạn và gia đình</p>
                </div>
                <form method="POST" style="display: flow-root;">
                    <div class="form-group">
                        <label for="username">Tài khoản</label>
                        <input class="form-control" id="username" type="text" name="username" value="" />
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input class="form-control" id="password" type="password" name="password" value="" />
                    </div>
                    <div class="form-group">
                        <label for="cf-password">Nhập lại mật khẩu</label>
                        <input class="form-control" id="cf-password" type="password" name="cf-password" value="" />
                    </div>
                    <div class="form-group">
                        <label for="fullname">Họ và tên</label>
                        <input class="form-control" id="fullname" type="text" name="fullname" value="" />
                    </div>
                    <div class="form-group">
                        <label for="dateofbirth">Ngày sinh</label>
                        <input class="form-control" id="dateofbirth" type="date" name="dateofbirth" value="" />
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input class="form-control" id="address" type="text" name="address" value="" />
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input class="form-control" id="phone" type="text" name="phone" value="" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" type="text" name="email" value="" />
                    </div>
                    <button type="submit" name="register" class="btn btn btn-primary mt-3 float-right">Tạo tài khoản</button>
                    <button type="submit" name="login" class="btn btn-light mt-3 mr-2 float-right">Đăng nhập</button>
                    <?php
                        function uuid() {
                            return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
                            mt_rand(0, 0xffff),
                            mt_rand(0, 0x0fff) | 0x4000,
                            mt_rand(0, 0x3fff) | 0x8000,
                            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
                            );
                        }
                        if (isset($_POST['login'])){
                            echo '<script language="javascript">window.location="./login.php";</script>';
                        }
                        if (isset($_POST['register'])){
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            $cf_password = $_POST['cf-password'];
                            $fullname = $_POST['fullname'];
                            $dateofbirth = $_POST['dateofbirth'];
                            $address = $_POST['address'];
                            $phone = $_POST['phone'];
                            $email = $_POST['email'];
                            if (!$username || !$password || !$cf_password) {
                                echo '<span class="text-danger d-block mt-3">Vui lòng nhập đầy đủ thông tin.</span>';
                                exit;
                            }
                            if (!$password != !$cf_password) {
                                echo '<span class="text-danger d-block mt-3">Mật khẩu không trùng khớp.</span>';
                                exit;
                            }
                            if(!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phone)) {
                                echo '<span class="text-danger d-block mt-3">Số điện thoại không đúng định dạng.</span>';
                                exit;
                            }
                            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                echo '<span class="text-danger d-block mt-3">Email không đúng định dạng.</span>';
                                exit;
                            }
                            $password = md5($password);
                            $id_user = uuid();
                            $sqlUser = "INSERT INTO `user`(`id_user`, `username`, `password`) VALUES ('$id_user','$username','$password')";
                            $sqlUserDetail = "INSERT INTO `user_detail`(`id_user`, `fullname`, `date_of_birdth`, `address`, `phone_number`, `email`, `permission`) VALUES ('$id_user','$fullname','$dateofbirth','$address','$phone','$email','customer')";
                            $ktUser = mysqli_query($conn, $sqlUser);
                            $ktUserDetail = mysqli_query($conn, $sqlUserDetail);
                            echo '<script language="javascript">alert("Thao tác thanh cong!");window.location="./login.php";</script>';
                        }
                    ?>
                </form>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>