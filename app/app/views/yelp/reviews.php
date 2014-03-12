<?php
	echo "<table>
  		<tr>
	 	<th>Review</th>
	  	<th>Rating</th>
	  	</tr>";
	foreach ($reviews as $review) :  {
		echo "<tr>";
	    echo "<td>" . $review->review_description . "</td>";
	    for ($i = 0; $i < $review->rating; $i++) {
	    	echo '<td><img src="http://www.psdgraphics.com/file/gold-metal-star.jpg" alt="Smiley face" width="20" height="20"></td>';
	    }	
	    echo "</tr>";
	}
	endforeach;
  	echo "</table>";
  	echo "<br>";
  	$checkin_string = '';
  	$like_string = '';
  	if ($checkins && $likes) {
  		echo "Check-ins: " . $checkins;
		echo "<br>";
		echo "Likes: " . $likes;
  	}
	