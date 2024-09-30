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
  <div class="wrapper">
    <section class="form edit-profile">
      <header><a href="settings.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>  Edit Profile</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
      <div class="field image">
      <center>
          <label class="custom-file-upload">
        <input type="file" name="image" class="file-input" id="fileInput"accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        <img width="120" height="120" src="php/images/<?php echo $row['img']; ?>" alt="">
    </label>
        </div></center>
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="update_fname" value ="<?php echo $row['fname'] ?>"placeholder="First name" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="update_lname" value ="<?php echo $row['lname'] ?>"placeholder="Last name" required>
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="update_email" value ="<?php echo $row['email'] ?>"placeholder="Enter your email" required>
        </div>

        <div class="field button">
          <input type="submit" name="submit" value="Save Profile">
        </div>
      </form>
      <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
    </section>
  </div>

  <script src="javascript/edit-profile.js"></script>
  <script src="javascript/talk.js"></script>
</body>
</html>
