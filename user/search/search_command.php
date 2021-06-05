<?php
// save the keywords from the url
$k = trim($_GET['search']);
// create a base query and words string
$query_string = "SELECT * FROM commande WHERE ";
$keywords = explode(' ', $k);
foreach ($keywords as $word) {
    $query_string .= " id LIKE '%" . $word . "%' OR user_id LIKE '%" . $word . "%' OR quantity LIKE '%" . $word . "%' OR total LIKE '%" . $word . "%' OR ";
}
$query_string = substr($query_string, 0, strlen($query_string) - 3);
$search = mysqli_query($link, $query_string) or die(mysqli_error($link));
$result_count = mysqli_num_rows($search);
if ($result_count > 0) {
    // display search result count to user
    while ($row = mysqli_fetch_assoc($search)) {
?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['total']; ?></td>
            <td><a href="commandDetails.php?identifiant=<?php echo $row['id']; ?>" class="link">Voir dossier</a></td>
        </tr>
<?php
    }
} else
    echo 'No results found. Please search something else.';
