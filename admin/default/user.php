<nav>
  <div class="sidebar-button">
    <i class='bx bx-menu sidebarBtn'></i>
    <span class="dashboard">Thanh menu</span>
  </div>
  <form class="search-box" action="">
    <input type="text" name="search" placeholder="Search...">
    <button style="cursor: pointer"><i class='bx bx-search'></i></button>
  </form>
  <div class="profile-details">
    <?php if ($_SESSION['image'] == "none") { ?>
      <img width="100%" src="../../public/images/default/avata.png" alt="">
    <?php } else { ?>
      <img width="100%" src="../../public/images/upload/<?php echo $_SESSION['image'] ?>" alt="">
    <?php } ?>
    <span class="admin_name">
      <?php echo $_SESSION['user'] ?>
    </span>
  </div>
</nav>