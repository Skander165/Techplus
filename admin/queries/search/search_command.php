<?php
// save the keywords from the url
$k = trim($_GET['search']);
// create a base query and words string
$query_string = "SELECT id, user.prenom_u, user.nom_u, total FROM commande JOIN user on user_id = id_u WHERE";

// seperate each of the keywords
$keywords = explode(' ', $k);
foreach ($keywords as $word) {
    $query_string .= " id LIKE '%" . $word . "%' OR user.prenom_u LIKE '%" . $word . "%' OR user.nom_u LIKE '%" . $word . "%' OR total LIKE '%" . $word . "%' OR ";
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
            <td><a href="./queries/delete/delete_command.php?identifiant=<?php echo $row['id'] ?>"><img src="../ressources/bin.PNG" width=25px height=30px /></a></td>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['prenom_u']; ?></td>
            <td><?php echo $row['nom_u']; ?></td>
            <td><?php echo $row['total']; ?></td>
        </tr>
<?php }
} else
    echo 'No results found. Please search something else.';
