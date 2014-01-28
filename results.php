<html>
<body>

<?php
$con=mysqli_connect('itp460.usc.edu', 'student', 'ttrojan', 'dvd');

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

<?php
$query = sprintf("select dvd_titles.title, ratings.rating, genres.genre, formats.format 
from dvd_titles 
inner join ratings on dvd_titles.rating_id = ratings.id 
inner join genres on dvd_titles.genre_id = genres.id
inner join formats on dvd_titles.format_id = formats.id
where title like '%s%s%s'", '%', $_GET["search"], '%');

$result = mysqli_query($con, $query);
$num_rows = mysqli_num_rows($result);
if (!$num_rows) {
  echo "There were no results for your search. Please try again";
} else {
  echo "<table border='1'>
  <tr>
  <th>Title</th>
  <th>Rating</th>
  <th>Genre</th>
  <th>Format</th>
  </tr>";
  while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row['rating'] . "</td>";
    echo "<td>" . $row['genre'] . "</td>";
    echo "<td>" . $row['format'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
}
mysqli_close($con);
echo "<br><br>";
echo "<a href='/pdo-dvd/search.php'>Search again</a>";
?>
</body>
</html>


