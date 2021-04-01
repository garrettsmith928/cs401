<?php
require_once('head.php');
require_once('navbar.php');

$commentInfo = "";
if (isset($_SESSION['user'])) {
	$commentInfo = 'Logged in as ' . $_SESSION['user']['email'] . ' with display name: ' . $_SESSION['user']['name'];
} else {
	$commentInfo = 'Please <a href="login.php">log in</a> to comment';
}

echo '
<div class="commentContainer" id = "commentContainerLoginStatus"><div id = "center_text">' .
$commentInfo
. '</div></div>';
?>

<form method="post" action="review_handler.php">
<div class = "commentContainer" id = "leaveCommentContainer">
	<div class = "commentPhoto" id = "leaveCommentBar">
	  <input class = "commentFlex" type="checkbox" id="displayName" name="displayName" value="useName">
	  <label class = "commentFlex" for="displayName"><b>Use name</b></label>
	  <input class = "commentFlex" type="submit" value="Submit" id = "commentSubmit">
	  <select class = "commentFlex" name="score" id="score">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="4">5</option>
	  </select>
	  <label class = "commentFlex" for="score" id = "scoreLabel">Score</label>	  
	</div>
	<div class = "commentText">
		<textarea id = "leaveCommentBox" name = "leaveCommentBox" rows="4" cols="50" maxlength="1024"></textarea>
	</div>
</div>
</form>

<?php
function comment($date, $name, $score, $txt)
{
echo '
<div class = "commentContainer">
	<div class = "commentPhoto">
		<ul>
			<b>
			<li id = "reviewDate">' . $date . '</li>
			<li id = "reviewName">' . $name . '</li>
			<li id = "reviewScore">' . $score . '</li>
			</b>
		</ul>
	</div>
	<div class = "commentText">
		' . $txt . '
	</div>
</div>';
}

require_once 'Dao.php';
$dao = new Dao();
$reviews = $dao->getReviews();

foreach ($reviews as $review){
	$review_date  = $review['review_date'];
	$temp = explode(" ", $review_date);
	$date = $temp[0];
	comment($date, $review['name'], $review['score'], $review['review']);
}

require_once('footer.php');
?>