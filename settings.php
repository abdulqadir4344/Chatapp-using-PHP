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
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left setting-back-icon"></i></a><h3>Settings</h3>
        <div class="icons">
            <button class="dropbtn"> <i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
      </navbar>
    <section class="settings">
 
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <a href="edit-profile.php"><img src="php/images/<?php echo $row['img']; ?>" alt=""></a>
          <div class="details">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span> 
            <?php if($row['is_verified']==1){
              echo '<i class="fa-solid fa-badge-check" style="color: #0084ff;"></i>';
            }
            ?>
            <div class="flex-container">
            <p><?php echo $row['status']; ?></p>
            <i class="fa-solid fa-qrcode "></i> <i class="fa-regular fa-circle-arrow-down"></i>
            </div>
            <span id="activestatus"></span><span id="qrcode"></span>
            
   
          </div>
        </div>
        <!-- <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a> -->
      </header>
      <div class="option-list">
            <div><i class="fa-solid fa-key-skeleton-left-right"></i><a href="#">Account</a><p>Secuity Notifications, change Email</p></div>
            <div><i class="fa-solid fa-lock-keyhole"></i><a href="#">Privacy</a><p>Blocked, disappearing messages</p></div>
            <div><i class="fa-solid fa-user-tie"></i><a href="#">Avatar</a><p>Create, edit, profile photo</p></div>
            <div><i class="fa-solid fa-heart"></i><a href="#">Favourites</a><p>Add, reorder, remove</p></div>
            <div><i class="fa-solid fa-message-lines"></i><a href="#">Chats</a><p>Theme, wallpapers, chat history</p></div>
            <div><i class="fa-solid fa-bell"></i><a href="#">Notifications</a><p>Message, group & call tones</p></div>
           <div> <i class="fa-solid fa-circle-info"></i><a href="#">Help</a><p>Help centre, contact us, privacy policy</p></div>
            <div><i class="fa-solid fa-right-from-bracket"></i><a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>">Logout</a></div>
      </div>

    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
