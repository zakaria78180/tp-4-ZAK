<div class="container mt-5">

    <div class="row pt-3">
       <div class="col-9"><h2>Liste des auteurs</h2></div>
       <div class="col-3"><a href="index.php?uc=auteurs&action=add" class='btn btn-success'><i 
       class="fas fa-plus-circle"></i> Créer un auteur</a></div>
    </div> 

    <form action="" method="get" class="border border-dark rounded p-3 mt-3 mb-3">
<div class="row">
    <div class="col">
        <input type="text" class='form-control' id='libelle' placeholder='Saisir le libellé' name='libelle' value=" <?php  echo $libelleSaisie; ?> ">
</div>
<div class="col">
  <select name="auteur" class="form-control">
     <?php
     echo "<option value='Tous'>Toutes les nationalitées</option>";
     foreach($lesauteurs as $auteur){
       $selection=$auteur->num == $auteurSel ? 'selected' : '';
         echo "<option value='$auteur->num' $selection>$auteur->libelle</option>";
     }
       ?>
  </select>
</div>
<div class="col">
    <button type="submit" class="btn btn-success btn-block"> Rechercher </button>
    </div>
</div>
</form>

    <table class="table table-hover table-striped">
<thead>
  <thead class="thead-dark">
    <tr class="d-flex">
      <th scope="col" class="col-md-2">Numéro</th>
      <th scope="col" class="col-md-2">nom</th>
      <th scope="col" class="col-md-2">Prenom</th>
      <th scope="col" class="col-md-2">nationalite</th>
      <th scope="col" class="col-md-4">Actions</th>
    </tr>
  </thead>
  <tbody>
<?php

    foreach($lesauteurs as $auteur){
        echo "<tr class='d-flex'>";
        echo "<td class='col-md-2'>".$auteur->num."</td>";
        echo "<td class='col-md-2'>".$auteur->nom."</td>";
        echo "<td class='col-md-2'>".$auteur->prenom."</td>";
        echo "<td class='col-md-2'>".$auteur->libelle."</td>";
        echo "<td class='col-md-2'>
        <a href='index.php?uc=auteurs&action=update&num=".$auteur->num."' class='btn btn-primary'><i class='fas fa-pen'></i></a>
        <a href='#modalSuppression' data-toggle='modal' data-message='Voulez vous supprimer cette auteur ?' data-suppression='index.php?uc=auteurs&action=delete&num=".$auteur->num."' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>
    </td>";
    echo "</tr>";
    }
?>
</div>  
<div id="modalSuppression" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation de suppression</h5>
      </div>
      <div class="modal-body">
        <p>Voulez-vous supprimer cette auteur ? </p>
      </div>
      <div class="modal-footer">
        <a href=""class="btn btn-primary" id="btnSuppr">Supprimer</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ne pas supprimer</button>
      </div>
    </div>
  </div>
</div>
  </tbody>
</table>
</div> 