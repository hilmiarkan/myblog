<?php
include 'db.php';

$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
  <title>My Blog</title>
  <link href="styles.css" rel="stylesheet">
</head>

<?php
session_start();
if (isset($_SESSION['error'])) {
  echo "<script type='text/javascript'>
            window.onload = function() {
              var toast = document.getElementById('toast');
              toast.classList.remove('hidden');
              setTimeout(function() {
                toast.classList.add('hidden');
              }, 3000);
            }
          </script>";
  unset($_SESSION['error']);
}
?>



<body>

  <div id="toast" class="toast hidden">
    <span class="heading">Username dan atau password yang anda masukkan salah</span>
  </div>

  <div class="wrapper">

    <div class="left">
      <div class="left-container">
        <img src="/myblog/assets/home-active.svg" alt="home icon" class="icon-home">
      </div>
    </div>

    <div class="middle middle-border">
      <div class="content middle-border">

        <div class="introduction">
          <img src="/myblog/assets/avatar.png" alt="my face" class="myphoto">
          <div class="introduction-1">
            <span class="myname">Maulana Hilmi Arkan</span>
            <!-- <span class="desc">Average human in Malang, Indonesia</span> -->
          </div>
          <div class="introduction-2">
            <span class="heading">About</span>
            <span class="desc">Average human in Malang, Indonesia</span>
            <!-- <span class="desc">i love design. take a look at my <a href="https://hilmi.framer.website">portfolio</a></span> -->
          </div>
        </div>

        <div class="tulisan-my-blog">
          <span class="heading-bold">My Blog</span>
          <button class="login-button" id="secondbutton">
            <span id="loginBtn">Login for Admin</span>
          </button>
        </div>

        <div class="post-list height-index">
          <?php while ($row = $result->fetch_assoc()) : ?>
            <a href="post_detail.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; color: inherit;">
              <div class="post post-column pointer">

                <span class="post-list-title"><?php echo $row['title']; ?></span>
                <span class="post-list-desc"><?php echo date("F j, Y", strtotime($row['created_at'])); ?></span>
                <?php if (!empty($row['imagepath'])) : ?>
                  <img class="imagepost" src="<?php echo $row['imagepath']; ?>" alt="<?php echo $row['title']; ?>" />
                <?php endif; ?>
              </div>
            </a>
          <?php endwhile; ?>






        </div>


      </div>
    </div>

    <div class="right">
      <div class="content right-container">
        <div class="right-box">
          <span class="above-button">My Blog</span>
          <button class="login-button">
            <span id="loginBtn">Login for Admin</span>
          </button>
          <span class="below-button">Thanks for visiting my tiny blogs,<br />Have a great day</span>

        </div>
      </div>
    </div>

    <div id="login-modal">
      <div class="mau-form">
        <form method="post" action="login.php">
          <div class="login-modal-title-desc">
            <span class="login-modal-title">Hai admin! 👋</span>
            <span class="login-modal-desc">selamat datang kembali</span>
          </div>

          <input type="username" name="username" placeholder="Username" required>
          <input type="password" name="password" placeholder="Password" required>
          <div class="login-modal-two-button">
            <button class="login-modal-button-cancel">Cancel</button>
            <button type="submit" class="login-button">
              <span id="loginBtn">Login</span>
            </button>
          </div>
        </form>
      </div>
    </div>




  </div>




  <script>
    // Get the modal
    var modal = document.getElementById("login-modal");

    // Get the button that opens the modal
    var btn = document.getElementById("loginBtn");

    // Get the cancel button
    var cancelButton = document.querySelector(".login-modal-button-cancel");

    // When the user clicks the button, open the modal 
    btn.onclick = function(event) {
      event.stopPropagation();
      modal.style.display = "flex";
      setTimeout(function() {
        modal.classList.add('show');
      }, 10);
    }

    // When the user clicks on the cancel button, close the modal
    cancelButton.onclick = function(event) {
      event.preventDefault();
      event.stopPropagation();
      modal.classList.remove('show');
      setTimeout(function() {
        modal.style.display = "none";
      }, 250);
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal || !modal.contains(event.target)) {
        modal.classList.remove('show');
        setTimeout(function() {
          modal.style.display = "none";
        }, 250);
      }
    }
  </script>

</body>

</html>