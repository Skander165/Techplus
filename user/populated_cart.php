<h1>
    <center>Cart elements :</center>
</h1>
<br>



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <?php
                            while ($row1 = mysqli_fetch_assoc($res_data)) {
                                if ($row1['table'] == 1) {
                                    $id = $row1['prod_id'];
                                    $sql1 = "select * from `smartphone` where `id`='$id'";
                                    $result = mysqli_query($link, $sql1) or die('Erreur SQL !' . mysqli_error($link));
                                    if ($row = mysqli_fetch_assoc($result)) {
                                        $sum = $sum + $row['prix_s'];
                            ?>
                                        <div class="col-md-4">
                                            <div class="single-box">
                                                <button type="button" class="close" aria-label="Close">
                                                    <a href="delete_from_cart.php?id=<?php echo $row['id'] ?>"><span style="color: crimson; margin-right: 5px" aria-hidden="true">&times;</span></a>
                                                </button>
                                                <div class="img-area"><img src="../ressources/<?php echo $row['image_s'] ?>" /></div>
                                                <div class="img-text">
                                                    <h2><?php echo $row['nom_s'] ?></h2>
                                                    <p><?php echo $row['prix_s'] ?>DT</p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                } else if ($row1['table'] == 2) {
                                    $id = $row1['prod_id'];
                                    $sql1 = "select * from ordinateur where id=$id";
                                    $result = mysqli_query($link, $sql1);
                                    if ($row = mysqli_fetch_assoc($result)) {
                                        $sum = $sum + $row['prix_o']; ?>
                                        <div class="col-md-4">
                                            <div class="single-box">
                                                <button type="button" class="close" aria-label="Close">
                                                    <a href="delete_from_cart.php?id=<?php echo $row['id'] ?>"><span style="color: crimson; margin-right: 5px" aria-hidden="true">&times;</span></a>
                                                </button>
                                                <div class="img-area"><img src="../ressources/<?php echo $row['image_o'] ?>" /></div>
                                                <div class="img-text">
                                                    <h2><?php echo $row['nom_o'] ?></h2>
                                                    <p><?php echo $row['prix_o'] ?>DT</p>

                                                </div>

                                            </div>
                                        </div>
                                    <?php
                                    }
                                } else if ($row1['table'] == 3) {
                                    $id = $row1['prod_id'];
                                    $sql = "select * from tablette where id=$id";
                                    $result = mysqli_query($link, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    $sum = $sum + $row['prix_t']; ?>
                                    <div class="col-md-4">
                                        <div class="single-box">
                                            <button type="button" class="close" aria-label="Close">
                                                <a href="delete_from_cart.php?id=<?php echo $row['id'] ?>"><span style="color: crimson; margin-right: 5px" aria-hidden="true">&times;</span></a>
                                            </button>
                                            <div class="img-area"><img src="../ressources/<?php echo $row['image_t'] ?>" /></div>
                                            <div class="img-text">
                                                <h2><?php echo $row['nom_t'] ?></h2>
                                                <p><?php echo $row['prix_t'] ?>DT</p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } else if ($row1['table'] == 4) {
                                    $id = $row1['prod_id'];
                                    $sql = "select * from imprimante where id=$id";
                                    $result = mysqli_query($link, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    $sum = $sum + $row['prix_i']; ?>
                                    <div class="col-md-4">
                                        <div class="single-box">
                                            <button type="button" class="close" aria-label="Close">
                                                <a href="delete_from_cart.php?id=<?php echo $row['id'] ?>"><span style="color: crimson; margin-right: 5px" aria-hidden="true">&times;</span></a>
                                            </button>
                                            <div class="img-area"><img src="../ressources/<?php echo $row['image_i'] ?>" /></div>
                                            <div class="img-text">
                                                <h2><?php echo $row['nom_i'] ?></h2>
                                                <p><?php echo $row['prix_i'] ?>DT</p>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add_computer_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Command Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="add_command.php?sum=<?php echo $sum; ?>">
                        <center>
                            <h3>Commande total: <?php echo "$sum DT"; ?></h3>
                        </center>
                        <center><input type="submit" value="Confirm"></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item"><a class="page-link" href="?pageno=1">Début</a></li>
        <li class="page-item <?php if ($pageno <= 1) {
                                    echo 'disabled';
                                } ?>">
            <a class="page-link" href="<?php if ($pageno <= 1) {
                                            echo '#';
                                        } else {
                                            echo "?pageno=" . ($pageno - 1);
                                        } ?>">Précédent</a>
        </li>
        <li class="page-item <?php if ($pageno >= $total_pages) {
                                    echo 'disabled';
                                } ?>">
            <a class="page-link" href="<?php if ($pageno >= $total_pages) {
                                            echo '#';
                                        } else {
                                            echo "?pageno=" . ($pageno + 1);
                                        } ?>">Suivant</a>
        </li>
        <li class="page-item"><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Fin</a></li>
    </ul>
    <div style="text-align: center;">
        <a style="text-align: center;" data-toggle="modal" data-target="#add_computer_modal" class="btn btn-danger <?php if ($total_rows == 0) { ?> disabled <?php } ?> ">Command ></a>
    </div>
</nav>