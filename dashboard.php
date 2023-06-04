<?php
include 'db.php';

session_start();
if (!isset($_SESSION['admin_logged_in'])) {
  header('Location: index.php');
  exit();
}

$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
  <title>My Blog</title>
  <link href="styles.css" rel="stylesheet">
</head>

<body>

  <div class="wrapper">

    <div class="left">
      <div class="left-container">
        <img src="/myblog/assets/home-active.svg" alt="home icon" class="icon-home">
        <button class="add-button" id="AddButton">
          <img src="/myblog/assets/add.svg" alt="add icon" class="add-edit">
        </button>
      </div>
    </div>

    <div class="middle middle-border">
      <div class="content middle-border">

        <div class="tulisan-my-blog">
          <span class="heading-bold">Your Blog List</span>
        </div>

        <div class="post-list height-detail">
          <?php while ($row = $result->fetch_assoc()) : ?>

            <div class="post post-row">

              <!-- <div class="dashboard-post-title-desc"> -->
              <a href="post_detail_admin.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; color: inherit;">
                <span class="post-list-title pointer" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';"><?php echo $row['title']; ?></span>
                <span class="post-list-desc"><?php echo date("F j, Y", strtotime($row['created_at'])); ?></span>
              </a>
              <!-- </div> -->

              <div class="action-list">
                <button class="edit-button" data-id="<?php echo $row['id']; ?>" data-title="<?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?>" data-content="<?php echo htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8'); ?>">
                  <img src="/myblog/assets/edit.svg" alt="edit icon" class="icon-edit">
                </button>
                <button class="trash-button" data-id="<?php echo $row['id']; ?>">
                  <img src="/myblog/assets/trash.svg" alt="trash icon" class="icon-trash">
                </button>


              </div>

            </div>

          <?php endwhile; ?>
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

    <div id="add-modal" class="modal">
      <div class="mau-form">
        <form method="post" action="add_post.php">

          <div class="login-modal-title-desc">
            <span class="login-modal-title">Buat post baru</span>
          </div>

          <input type="text" name="title" placeholder="Title" required>
          <textarea name="content" placeholder="Content" rows="5" required></textarea>

          <div class="login-modal-two-button">
            <button class="login-modal-button-cancel">Cancel</button>
            <button type="submit" class="login-button">
              <span id="loginBtn">Tambah</span>
            </button>
          </div>

        </form>
      </div>
    </div>

    <div id="edit-modal" class="modal">
      <div class="mau-form">
        <form method="post" action="edit_post.php">

          <input type="hidden" name="id" id="edit-id" value="">

          <div class="login-modal-title-desc">
            <span class="login-modal-title">Edit Post</span>
          </div>

          <input type="text" name="title" placeholder="Title" required>
          <textarea name="content" placeholder="Content" rows="5" required></textarea>

          <div class="login-modal-two-button">
            <button class="login-modal-button-cancel">Cancel</button>
            <button type="submit" class="login-button">
              <span id="loginBtn">Simpan</span>
            </button>
          </div>

        </form>
      </div>
    </div>

    <div id="delete-modal" class="modal">
      <div class="mau-form">
        <form method="post" action="delete_post.php">

          <input type="hidden" name="id" id="delete-id" value="">

          <div class="login-modal-title-desc">
            <span class="login-modal-title">Apakah anda yakin ingin menghapus post ini?</span>
            <span class="login-modal-desc">post ini akan hilang selamanya</span>
          </div>

          <div class="login-modal-two-button">
            <button class="login-modal-button-cancel">Cancel</button>
            <button type="submit" class="login-button trash">
              <span id="loginBtn">Ya, Hapus</span>
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>




  <script>
    // Get the modal
    var addModal = document.getElementById("add-modal");
    var editModal = document.getElementById("edit-modal");
    var deleteModal = document.getElementById("delete-modal");

    // Get the buttons that open the modals
    var addButton = document.getElementById("AddButton");
    var editButtons = document.getElementsByClassName("edit-button");
    var trashButtons = document.getElementsByClassName("trash-button");

    // Get the cancel buttons
    var cancelButtons = document.getElementsByClassName("login-modal-button-cancel");

    // When the user clicks the add button, open the add modal
    addButton.onclick = function(event) {
      openModal(addModal);
    }

    // When the user clicks an edit button, open the edit modal
for (let editButton of editButtons) {
  editButton.onclick = function() {
    var id = this.getAttribute('data-id');
    var title = this.getAttribute('data-title');
    var content = this.getAttribute('data-content');

    editModal.querySelector('input[name="id"]').value = id;
    editModal.querySelector('input[name="title"]').value = title;
    editModal.querySelector('textarea[name="content"]').value = content;

    openModal(editModal);
  }
}


    // When the user clicks a trash button, open the delete modal
for (let trashButton of trashButtons) {
  trashButton.onclick = function() {
    var id = this.getAttribute('data-id');

    deleteModal.querySelector('input[name="id"]').value = id;

    openModal(deleteModal);
  }
}

    // When the user clicks a cancel button, close the modal
    for (let cancelButton of cancelButtons) {
      cancelButton.onclick = function(event) {
        event.preventDefault();
        event.stopPropagation();
        closeModal(event.target.closest(".modal"));
      }
    }

    // When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (!event.target.closest('.modal') && !isActionButton(event.target) && !isAddButton(event.target)) {
    closeModal(addModal);
    closeModal(editModal);
    closeModal(deleteModal);
  }
}

// Check if the target is an add button
function isAddButton(target) {
  return target.closest('#AddButton');
}


    // Open a modal
    function openModal(modal) {
      modal.style.display = "flex";
      setTimeout(function() {
        modal.classList.add('show');
      }, 10);
    }

    // Close a modal
    function closeModal(modal) {
      modal.classList.remove('show');
      setTimeout(function() {
        modal.style.display = "none";
      }, 250);
    }

    // Check if the target is an action button (edit or trash)
    function isActionButton(target) {
      return target.closest('.edit-button') || target.closest('.trash-button');
    }
  </script>


</body>

</html>