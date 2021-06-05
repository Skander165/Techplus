<?php 
// save the keywords from the url
$k = trim($_GET['search']);
// create a base query and words string
$query_string = "SELECT * FROM smartphone WHERE ";

// seperate each of the keywords
$keywords = explode(' ', $k);
foreach ($keywords as $word) {
  $query_string .= " keywords LIKE '%" . $word . "%' OR ";
}
$query_string = substr($query_string, 0, strlen($query_string) - 3);
$search = mysqli_query($link, $query_string) or die(mysqli_error($link));
$result_count = mysqli_num_rows($search);

// check to see if any results were returned
if ($result_count > 0) {
  // display search result count to user
  while ($row = mysqli_fetch_assoc($search)) {
?>
    <div class="col-md-4">
      <div class="single-box">
        <div class="img-area"><img src="../ressources/<?php echo $row['image_s'] ?>" /></div>
        <div class="img-text">
          <h2><?php echo $row['nom_s'] ?></h2>
          <p><?php echo $row['prix_s'] ?>DT</p>
          <button class="img-btn btn btn-danger btn-xs">Add To Cart</button>
        </div>
        <br>
      </div>
    </div>
  <?php }
} else
  echo 'No results found. Please search something else.';