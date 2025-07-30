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
    <div class="fixed-container">
      <navbar class="navbar">
        <a href="settings.php" class="back-icon"><i class="fas fa-arrow-left account-back-icon">Account</i></a>
        <div class="icons">
            <button class="dropbtn"> <i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
      </navbar>
    <section class="account">
 
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <div class="details">
            <div class="flex-container">
            </div>
            
   
          </div>
        </div>
        <!-- <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a> -->
      </header>
      </div>
      <div class="option-list">
            <div><i class="fa-solid fa-shield-halved"></i><a href="account.php">Security notifications</a></div>
            <div><i class="fa-solid fa-person-chalkboard"></i><a href="#">Passkeys</a></div>
            <div><i class="fa-solid fa-envelope"></i><a href="#">Email address</a></div>
            <div><i class="fa-solid fa-phone"></i><a href="#">Change number</a></div>
            <div><i class="fa-solid fa-trash-xmark"></i><a href="#">Delete account</a></div>
      </div>

    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
