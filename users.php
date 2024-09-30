<?php 
  session_start();
  include_once "php/config.php";

  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php 
  $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
  if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
  }
?>
<?php include_once "header.php"; ?>
<body>

<!-- <i class="fa-solid fa-badge-check" style="color: #0084ff;"></i> -->
  <div class="wrapper">
  <navbar class="navbar">
        <h1>iTalk</h1>
        <div class="icons">
            <i class="fas fa-qrcode icon" title="QR Scanner"></i>
            <i class="fas fa-camera icon" title="Camera"></i>
            <div class="dropdown">
        <button class="dropbtn"> <i class="fas fa-ellipsis-v icon" title="More Options"></i></button>
        <div class="dropdown-content">
            <a href="#">New Chat</a>
            <a href="#">New Group</a>
            <a href="settings.php">Settings</a>
            <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>">Logout</a>
        </div>
    </div>
        </div>
      </navbar>
    <section class="users">
 
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <!-- <a href="edit-profile.php"><img src="php/images/<?php echo $row['img']; ?>" alt=""></a> -->
          <div class="details">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span> 
            <?php if($row['is_verified']==1){
              echo '<i class="fa-solid fa-badge-check" style="color: #0084ff;"></i>';
            }
            ?>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <!-- <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a> -->
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
