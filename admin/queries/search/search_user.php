<?php
// save the keywords from the url
$k = trim($_GET['search']);
// create a base query and words string
$query_string = "SELECT * FROM user WHERE ";
$keywords = explode(' ', $k);
foreach ($keywords as $word) {
    $query_string .= " prenom_u LIKE '%" . $word . "%' OR nom_u LIKE '%" . $word . "%' OR ";
}
$query_string = substr($query_string, 0, strlen($query_string) - 3);
$search = mysqli_query($link, $query_string) or die(mysqli_error($link));
$result_count = mysqli_num_rows($search);
if ($result_count > 0) {
    // display search result count to user
    while ($row = mysqli_fetch_assoc($search)) {
?>
        <tr>
            <td><a href="supprimer.php?identifiant=<?php echo $row['id_u'] ?>"><img src="../ressources/bin.PNG" width=25px height=30px /></a></td>
            <td><?php echo $row['nom_u']; ?></td>
            <td><?php echo $row['prenom_u']; ?></td>
            <td><?php echo $row['city']; ?></td>
            <td><a href="modif_utilisateur.php?identifiant=<?php echo $row['id_u']; ?>" class="link">Voir dossier</a></td>
        </tr>
<?php
    }
} else
    echo 'No results found. Please search something else.';
