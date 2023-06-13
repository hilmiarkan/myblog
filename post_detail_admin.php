<?php
include 'db.php';

if (!isset($_GET['id'])) {
    exit('No id provided');
}

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) exit('No rows');
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $row['title']; ?></title>
    <link href="styles.css" rel="stylesheet">
</head>

<body>

    <div class="wrapper">

        <div class="left">
            <div class="left-container">
            <a href="dashboard.php" style="text-decoration: none; color: inherit; cursor: pointer;" class="haptic">
  <svg class="icon-home" xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
    <path d="M10.9823 1.49715C10.631 1.2239 10.4553 1.08727 10.2613 1.03476C10.0902 0.988415 9.9098 0.988415 9.73865 1.03476C9.54468 1.08727 9.36902 1.2239 9.0177 1.49715L2.23539 6.77228C1.78202 7.1249 1.55534 7.30121 1.39203 7.52201C1.24737 7.7176 1.1396 7.93794 1.07403 8.17221C1 8.43667 1 8.72385 1 9.29821V16.5331C1 17.6532 1 18.2133 1.21799 18.6411C1.40973 19.0174 1.71569 19.3234 2.09202 19.5152C2.51984 19.7331 3.0799 19.7331 4.2 19.7331H6.2C6.48003 19.7331 6.62004 19.7331 6.727 19.6786C6.82108 19.6307 6.89757 19.5542 6.9455 19.4601C7 19.3532 7 19.2132 7 18.9331V12.3331C7 11.7731 7 11.4931 7.10899 11.2791C7.20487 11.091 7.35785 10.938 7.54601 10.8421C7.75992 10.7331 8.03995 10.7331 8.6 10.7331H11.4C11.9601 10.7331 12.2401 10.7331 12.454 10.8421C12.6422 10.938 12.7951 11.091 12.891 11.2791C13 11.4931 13 11.7731 13 12.3331V18.9331C13 19.2132 13 19.3532 13.0545 19.4601C13.1024 19.5542 13.1789 19.6307 13.273 19.6786C13.38 19.7331 13.52 19.7331 13.8 19.7331H15.8C16.9201 19.7331 17.4802 19.7331 17.908 19.5152C18.2843 19.3234 18.5903 19.0174 18.782 18.6411C19 18.2133 19 17.6532 19 16.5331V9.29821C19 8.72385 19 8.43667 18.926 8.17221C18.8604 7.93794 18.7526 7.7176 18.608 7.52201C18.4447 7.30121 18.218 7.1249 17.7646 6.77228L10.9823 1.49715Z" stroke="#EEEEEE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  </svg>
</a>


            </div>
        </div>

        <div class="middle middle-border">
            <div class="content middle-border">

                <div class="tulisan-my-blog">
                    
                    <a href="dashboard.php" style="text-decoration: none; color: inherit; cursor: pointer;" class="haptic">
  <svg class="icon-home2" xmlns="http://www.w3.org/2000/svg" width="1" height="1" viewBox="0 0 20 21" fill="none">
    <path d="M10.9823 1.49715C10.631 1.2239 10.4553 1.08727 10.2613 1.03476C10.0902 0.988415 9.9098 0.988415 9.73865 1.03476C9.54468 1.08727 9.36902 1.2239 9.0177 1.49715L2.23539 6.77228C1.78202 7.1249 1.55534 7.30121 1.39203 7.52201C1.24737 7.7176 1.1396 7.93794 1.07403 8.17221C1 8.43667 1 8.72385 1 9.29821V16.5331C1 17.6532 1 18.2133 1.21799 18.6411C1.40973 19.0174 1.71569 19.3234 2.09202 19.5152C2.51984 19.7331 3.0799 19.7331 4.2 19.7331H6.2C6.48003 19.7331 6.62004 19.7331 6.727 19.6786C6.82108 19.6307 6.89757 19.5542 6.9455 19.4601C7 19.3532 7 19.2132 7 18.9331V12.3331C7 11.7731 7 11.4931 7.10899 11.2791C7.20487 11.091 7.35785 10.938 7.54601 10.8421C7.75992 10.7331 8.03995 10.7331 8.6 10.7331H11.4C11.9601 10.7331 12.2401 10.7331 12.454 10.8421C12.6422 10.938 12.7951 11.091 12.891 11.2791C13 11.4931 13 11.7731 13 12.3331V18.9331C13 19.2132 13 19.3532 13.0545 19.4601C13.1024 19.5542 13.1789 19.6307 13.273 19.6786C13.38 19.7331 13.52 19.7331 13.8 19.7331H15.8C16.9201 19.7331 17.4802 19.7331 17.908 19.5152C18.2843 19.3234 18.5903 19.0174 18.782 18.6411C19 18.2133 19 17.6532 19 16.5331V9.29821C19 8.72385 19 8.43667 18.926 8.17221C18.8604 7.93794 18.7526 7.7176 18.608 7.52201C18.4447 7.30121 18.218 7.1249 17.7646 6.77228L10.9823 1.49715Z" stroke="#EEEEEE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  </svg>
</a>
<span class="heading-bold">Detail Post</span>
                </div>

                <div class="post-list height-detail">
                    <div class="post post-column">
                    <span class="post-list-desc"><?php echo date("F j, Y", strtotime($row['created_at'])); ?></span>
                        <span class="post-list-title" style="margin-bottom: 20px;"><?php echo $row['title']; ?></span>
                        
                        <span class="post-list-desc"><?php echo nl2br(htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8')); ?></span>
                    </div>
                </div>

            </div>
        </div>

        <div class="right">
      <div class="content right-container">
        <div class="right-box">
          <span class="above-button">Your Blog</span>
          <a href="logout.php">
            <button class="login-button">
              <span id="loginBtn">Log Out</span>
            </button>
          </a>

          <span class="below-button">You are accessing this dashboard<br />as an administrator</span>

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
        function vibrateButton() {
  if (navigator.vibrate) { // check if browser supports the vibrate API
    navigator.vibrate(100); // vibrate for 100 milliseconds
  }
}
    </script>