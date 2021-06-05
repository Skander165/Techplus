<?php
// save the keywords from the url
$k = trim($_GET['search']);
// create a base query and words string
$query_string = "SELECT * FROM tablette WHERE ";

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
        <tr>
            <td><a href="./queries/delete/deleteTablet.php?identifiant=<?php echo $row['id'] ?>" onclick='return checkDelete()'><img src="../ressources/bin.PNG" width=25px height=30px /></a></td>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nom_t']; ?></td>
            <td><img src="../ressources/<?php echo $row['image_t']; ?>" width=40px height=40px></td>
            <td><?php echo $row['marque']; ?></td>
            <td><?php echo $row['prix_t']; ?></td>
            <td><?php echo $row['quantite_t']; ?></td>
            <td><a href="tabletDetails.php?identifiant=<?php echo $row['id']; ?>" class="link">Voir dossier</a></td>
        </tr>
<?php }
} else
    echo 'No results found. Please search something else.';
