<div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Cong Shop!</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="../manage/overview_exam.php" id="course-overview">
            <i class='bx bxs-bar-chart-alt-2'></i>
            <span class="links_name">Tổng quan</span>
          </a>
        </li>
        <?php if ($_SESSION['lever'] == 2) { ?>
          <li>
            <a href="../manage/overview_admin_pro.php" id="overview_admin_pro">
              <i class='bx bxs-bar-chart-alt-2'></i>
              <span class="links_name">Tổng quan chung(admin)</span>
            </a>
          </li>
        <?php } ?>
        <li>
          <a href="./course_add.php" id="course-add">
            <i class='bx bx-book-add'></i>
            <span class="links_name">Thêm khóa học mới</span>
          </a>
        </li>
        <li>
          <a href="./course_manager.php" id="course-manager">
            <i class='bx bx-book-alt'></i>
            <span class="links_name">Khóa học của tôi</span>
          </a>
        </li>

        <?php if ($_SESSION['lever'] == 2) { ?>

        <li>
          <a href="./course_manager_admin.php" id="course-manager-admin">
            <i class='bx bx-book-bookmark'></i>  
            <span class="links_name">Quản lý khóa học(admin)</span>
          </a>
        </li>

        <li>
          <a href="./student_manager_admin.php" id="student-manager">
            <i class='bx bxs-user'></i>
            <span class="links_name">Quản lý người dùng</span>
          </a>
        </li>
        <li>
          <a href="./employee_manager.php" id="employee-manager">
          <i class='bx bxs-group'></i>
            <span class="links_name">Quản lý nhân sự</span>
          </a>
        </li>
        <!-- <li>
          <a href="./employee_analysis.php" id='employee-analysis'>
            <i class='bx bx-id-card'></i>
            <span class="links_name">Phân tích tài chính</span>
          </a>
        </li> -->

        <?php } ?>

        <li>
          <a href="./my_account.php" id='my-account'>
            <i class='bx bx-cog' ></i>
            <span class="links_name">Cài đặt tài khoản</span>
          </a>
        </li>
        <li class="log_out">
          <a href="../processing/logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Đăng xuất</span>
          </a>
        </li>
      </ul>
  </div>