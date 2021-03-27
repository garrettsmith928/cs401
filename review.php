<?php
require_once('head.php');
require_once('navbar.php');
?>

<div class = "commentContainer">
	<div class = "commentPhoto">
		<ul>
			<li id = "reviewDate"></li>
			<li id = "reviewName">Leave your review</li>
			<li id = "reviewSubmit"><a href="review.html">Submit</a></li>
		</ul>
	</div>
	<div class = "commentText">
		<input type = "text" id = "leaveComment">
	</div>
</div>

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

comment('DATE MMDDYY','Garrett Smith','Score 0-10','Text goes here');
comment('03/05/2021','Everett Smith','8','Wow, this place was doper');
comment('03/01/2021','Kader Smith','3','Wow, this place is horrible');

require_once('footer.php');
?>