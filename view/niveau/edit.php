<?php

session_start();
$user=$_SESSION["user"];

require_once ("../../base.php");
require_once ("../../autoload.php");

$bd= bd();
$nivCont=new niveauControle($bd);

if(isset($_POST['id_niveau']) and $_POST['niveau_etude'])
{
    $nivCont =new niveauControle($bd);
    $niv=new niveau($_POST);
    $nivCont->edit($niv);
    header("location: list.php");
}

if(isset($_GET['id_niveau']))
{
    $id_niveau=$_GET['id_niveau'];
    $value=$nivCont->get($id_niveau);
}
?>

<!DOCTYPE html>
<html lang="fr">
<?php
  include('../../include/head.php');
?>
<body>

    <div class="container" id="container">
        <?php
             include('../../include/header.php');
        ?>

    <div class="mt-3 pull-right d-flex">  
        <i class="fa fa-user mr-3 user"> <span class="ml-2"> <?= $user["statut"];?> </span> </i>
        <button class="btn btn-info"> <a class="text-light" href="../../index.php"> Deconnexion </a> </button>
    </div>

        <div class="bienvenu">MODIFICATION D'UN NIVEAU</div>
      <div class="global-content">
        <div class="contenu">
        <?php
             include('../../include/aside.php');
        ?>
        
        </div>
            <div class="cache">
                <div class="c-table">
                    <p style="color: red;">Veillez remplir les champs * </p>

            <form class=" form p-4 d-flex flex-column w-100" action="edit.php" method="POST" enctype="multipart/form-data">
                <label for="">id_niveau</label>
                <input type="text" class="champ" name="id_niveau" value="<?= $value->id_niveau?>">
                <label for="">niveau_etude</label>
                <input type="text" class="champ" name="niveau_etude" value="<?= $value->niveau_etude?>">      

                <div class="panel-footer mt-3">
                    <button type="submit" class="btn btn-info pull-left mr-3">Modifier <i class="fa fa-check-square-o ml-2"></i> </button>
                    <button type="button" class="btn btn-info pull-left"> <a class="text-light" href="list.php"> Fermer <i class="fa fa-close"></i> </a></button>
                </div>
            </form>
                </div>
            </div>
      </div>
        <?php
             include('../../include/footer.php');
        ?>
    </div>
    
</body>
</html>