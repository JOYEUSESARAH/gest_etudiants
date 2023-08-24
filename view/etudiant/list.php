<?php
session_start();
$user = $_SESSION["user"];

require_once("../../base.php");
require_once("../../autoload.php");

$bd = bd();
$etudiantCon = new etudiantControle($bd);
$list = $etudiantCon->liste();

if (isset($_GET['idetudiant'])) {
  $etudiantCon->delete($_GET['idetudiant']);
  header("location: list.php");
}
?>

<?php
include('../../include/head.php');
?>

<!DOCTYPE html>
<html lang="fr">

<body>

  <div class="container" id="container">
    <?php
    include('../../include/header.php');
    ?>

    <div class="mt-3 pull-right d-flex">
      <i class="fa fa-user mr-3 user"> <span class="ml-2"> <?= $user["statut"]; ?> </span> </i>
      <button class="btn btn-warning"> <a class="text-light" href="../../index.php"> Deconnexion </a> </button>
    </div>

    <div class="bienvenu">LISTE DES ETUDIANTS</div>
    <div class="global-content">
      <div class="contenu">
        <?php
        include('../../include/aside.php');
        ?>

      </div>
      <div class="cache">
        <div class="tbl-content">
          <table cellpadding="0" cellspacing="0" border="0">
            <thead>
              <tr id="ligne">
                <th scope="col">N°</th>
                <th scope="col">id_filiere</th>
                <th scope="col">id_niveau</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">date_n</th>
                <th scope="col">pays</th>
                <th scope="col">adresse</th>
                <th scope="col">email</th>
                <th scope="col">tel</th>
              </tr>
            </thead>
            <tbody id="tbody">
              <tr>
                <?php
                foreach ($list as $key => $value) {
                ?>
              </tr>
              <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $value->idetudiant ?></td>
                <td><?= $value->Nom ?></td>
                <td><?= $value->Prenom ?></td>
                <td><?= $value->date_naissance ?></td>
                <td><?= $value->nationalite ?></td>
                <td><a href="detail.php?idetudiant=<?= $value->idetudiant ?>" type="button"> <i class="fa fa-user log3"></i> </a></td>
                <td><a <?= Compte::cons($user["statut"]) ?> href="edit.php?idetudiant=<?= $value->idetudiant ?>" type="button"> <i class="fa fa-edit log"></i> </a></td>
                <td><a <?= Compte::cons($user["statut"]) ?> <?= Compte::adm($user["statut"]) ?> href="list.php?idetudiant=<?= $value->idetudiant ?>" type="button"> <i class="fa fa-trash-o log2"></i> </a></td>
              </tr>
            <?php
                }
            ?>
            </tr>
            </tbody>
          </table>
          <button <?= Compte::cons($user["statut"]) ?> type="button" class="btn btn-warning pull-left mb-3"> <a class="text-light" href="new.php"> Nouveau <i class="fa fa-plus"></i> </a> </button>
        </div>
      </div>
    </div>
    <?php
    include('../../include/footer.php');
    ?>
  </div>
</body>

</html>