<?php 
// save the keywords from the url
$k = trim($_GET['search']);
// create a base query and words string
$query_string = "SELECT * FROM root WHERE ";
$keywords = explode(' ', $k);
foreach ($keywords as $word) {
    $query_string .= " prenom_r LIKE '%" . $word . "%' OR nom_r LIKE '%" . $word . "%' OR ";
}
$query_string = substr($query_string, 0, strlen($query_string) - 3);
$search = mysqli_query($link, $query_string) or die(mysqli_error($link));
$result_count = mysqli_num_rows($search);
if ($result_count > 0) {
    // display search result count to user
    while ($row = mysqli_fetch_assoc($search)) {
        ?>
            <tr>
                <td><?php echo $row['nom_r']; ?></td>
                <td><?php echo $row['prenom_r']; ?></td>
                <td><?php echo $row['mail_r']; ?></td>
                <?php if ($row['id'] == $_SESSION['id']) {
                    $id = $_SESSION['id']; ?>
                    <td><a href="<?php echo "modif_root.php?identifiant=$id"; ?>" class="link">Modifier dossier</a></td>
            </tr>
        <?php
                } else {
        ?>
            <td><a href="consult_root.php?identifiant=<?php echo $row['id']; ?>" class="link">Voir dossier</a></td>
    <?php
                }
            }
} else
    echo 'No results found. Please search something else.';