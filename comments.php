<?php
  session_start();
  if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
     header('Location: login.php');
     exit;
  }
?>
<html>
  <head>
    <link rel="stylesheet" href="comment.css">
  </head>
  <body>
    <span id="logout"><a href="logout.php">Logout</a></span>
    <h1>Leave a Comment</h1>
    <form method="post" action="comment_handler.php">
      <div class="input_box">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
      </div>
      <div class="input_box">
        <label for="age">Age:</label>
        <input type="text" id="age" name="age">
      </div>
      <div class="input_box">
        <label for="comment">Comment:</label>
        <input type="text" id="comment" name="comment">
      </div>
      <input type="submit" value="Submit">
    </form>
<?php
    if (isset($_SESSION['messages'])) {
      foreach ($_SESSION['messages'] as $message) {
        echo "<div class='" . $_SESSION['class'] . " message'>{$message}</div>";
      }
    }
    unset($_SESSION['messages']);
?>

<?php
    require_once 'Dao.php';
    $dao = new Dao();
    $comments = $dao->getComments();
?>
    <table id="comments">
      <thead>
        <tr>
          <th>Name</th>
          <th>Comment</th>
          <th>Date</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
      <?php
          foreach ($comments as $comment) {
            echo
              "<tr><td>" . htmlspecialchars($comment['name']) . "</td>" .
              "<td>" . htmlspecialchars($comment['comment']) . "</td>" .
              "<td>{$comment['date_entered']}<td><a href='delete_comment.php?id={$comment['comment_id']}'>X</a></td></tr>";
          }
      ?>
      </tbody>
    </table>
  </body>
</html>
