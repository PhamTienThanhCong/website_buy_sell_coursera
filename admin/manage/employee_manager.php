<?php
  require "../check_admin/check_admin_1.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../default/style.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
  table,
  td,
  th {
    border: 1px solid #ddd;
    text-align: left;
  }

  table {
    border-collapse: collapse;
    width: 100%;
  }

  th,
  td {
    padding: 15px;
    font-weight: normal;
    text-align: center;
  }

  #employee-manager {
    background: #081D45;
  }
</style>

<body>
  <?php
  require "../default/option.php"
  ?>
  <section class="home-section">
      <?php
      require "../default/user.php"
      ?>
      <div class="home-content">
        <div class="sales-boxes">
          <div class="recent-sales box">
            <div class="title">Quản lý nhân sự</div>
            <br>
            <!-- <select name="" id="">
              <option value="">-----Tất cả-----</option>
              <option value="">Chờ xác nhận</option>
              <option value="">Đã xác nhận</option>
              <option value="">Đã Chặn </option>
            </select> -->
            <br>
            <div class="sales-details">
              <?php
              require "../../public/connect_sql.php";
              $sql = "SELECT * FROM `admin` WHERE (`lever` = '1')";
              $nhan_vien = mysqli_query($connection, $sql);
              ?>

              <table>
                <tr>
                  <th>ảnh</th>
                  <th>Tên</th>
                  <th>email</th>
                  <th>Số điện thoại</th>
                  <th>địa chỉ</th>
                  <th>Trạng thái</th>
                  <th>Chức năng</th>
                    <th>Reset mật khẩu</th>
                </tr>
                <?php foreach ($nhan_vien as $nv) { ?>
                  <tr>
                    <th>
                      <?php if ($nv['image'] == "none") { ?>
                        <img width="100" src="../../public/images/default/avata.png" alt="">
                      <?php } else { ?>
                        <img width="100" src="../../public/images/upload/<?php echo $nv['image'] ?>" alt="">
                      <?php } ?>
                    </th>
                    <th>
                      <?php echo $nv['name_admin'] ?>
                    </th>
                    <th>
                      <?php echo $nv['email_admin'] ?>
                    </th>
                    <th>
                      <?php echo $nv['phone_number_admin'] ?>
                    </th>
                    <th>
                      <?php echo $nv['address_admin'] ?>
                    </th>
                    <th>
                      <?php if ($nv['status_admin'] == 1) {
                        echo "Đã xác nhận";
                      } elseif ($nv['status_admin'] == -1) {
                        echo "bị cấm";
                      } elseif ($nv['status_admin'] == 0) {
                        echo "Chờ xác nhận";
                      }
                      ?>
                    </th>
                    <th>
                      <?php if ($nv['status_admin'] == 0) { ?>
                        <a href="./processing/employee_comfirm.php?id=<?php echo $nv['id_admin'] ?>&type=1">Xác nhận</a>
                        <br>
                        <a href="./processing/employee_comfirm.php?id=<?php echo $nv['id_admin'] ?>&type=0">Từ chối</a>
                      <?php } elseif ($nv['status_admin'] == 1) { ?>
                        <a href="./processing/employee_comfirm.php?id=<?php echo $nv['id_admin'] ?>&type=-1">CẤM !</a>
                      <?php } else { ?>
                        <a href="./processing/employee_comfirm.php?id=<?php echo $nv['id_admin'] ?>&type=2">Gỡ cấm !</a>
                      <?php } ?>
                    </th>
                      <th>
                          <form class="form-reset-password" method="post" action="./processing/reset_password_admin.php">
                              <input type="hidden" name="type" value="0">
                              <input class="email" type="hidden" name="email" value="<?php echo $st['email_admin'] ?>">
                              <button type="submit" >Reset password</button>
                          </form>
                          <br>
                          <!-- <?php if($st['token_user'] != "") { ?>
                              <form class="form-reset-token" method="post" action="./processing/reset_password_admin.php">
                                  <input type="hidden" name="type" value="1">
                                  <input class="email" type="hidden" name="email" value="<?php echo $st['email_admin'] ?>">
                                  <button type="submit" >Clear token</button>
                              </form>
                          <?php } ?> -->
                      </th>
                  </tr>
                <?php } ?>
              </table>
            </div>

          </div>
        </div>
        <?php require "../default/footer.php" ?>
      </div>
  </section>

  <script type="text/javascript" src="./script/js_chung.js"> </script>

</body>

</html>