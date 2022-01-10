<?php
session_start();
if (isset($_SESSION['lever']) == false) {
  header('Location: ../login.php');
} elseif ($_SESSION['lever'] != 2) {
  header('Location: ../index.php');
}
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

  #employee-analysis {
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
          <div class="title">Phân tích tình hình tài chính của nhân sự</div>
          <br>
          <br>
          <div class="sales-details">
            <?php
            require "../../public/connect_sql.php";
            $sql = "SELECT * FROM `admin` WHERE (`lever` = '1')";
            $nhan_vien = mysqli_query($connection, $sql);
            ?>

            <table>
              <tr>
                <th>Tên</th>
                <th>email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Thu nhập</th>
                <th>Xem chi tiết</th>
              </tr>
              <?php foreach ($nhan_vien as $nv) { ?>
                <tr>
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
                    <a href="">Xem</a>
                  </th>
                </tr>
              <?php } ?>
            </table>
          </div>

        </div>
      </div>
    </div>
  </section>

  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
  </script>

</body>

</html>