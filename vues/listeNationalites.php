<div class="container mt-5">

    <div class="row pt-3">
       <div class="col-9"><h2>Liste des nationalites</h2></div>
       <div class="col-3"><a href="index.php?uc=nationalites&action=add" class='btn btn-success'><i 
       class="fas fa-plus-circle"></i> Créer une nationalite</a></div>
    </div> 

    <form action="" method="post" class="border border-dark rounded p-3 mt-3 mb-3">
<div class="row">
    <div class="col">
      <input type="text" class='form-control' id='libelle' placeholder='Saisir le libellé' name='libelle' value=" <?php echo $libelleSaisie;?>">
</div>
<div class="col">
  <select name="nationalite" class="form-control">
     <?php
     echo "<option value='Tous'>Toutes les nationalitées</option>";
     foreach($lesnationalites as $nationalite){
       $selection=$nationalite->num == $nationaliteSel ? 'selected' : '';
         echo "<option value='$nationalite->num' $selection>". $nationalite->libNation ."</option>";
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
      <th scope="col" class="col-md-3">Numéro</th>
      <th scope="col" class="col-md-3">Libellé</th>
      <th scope="col" class="col-md-3">Continent</th>
      <th scope="col" class="col-md-3">Actions</th>
    </tr>
  </thead>
  <tbody>
<?php
    foreach($lesnationalites as $nationalite){
        echo "<tr class='d-flex'>";
        echo "<td class='col-md-3'>".$nationalite->num."</td>";
        echo "<td class='col-md-3'>".$nationalite->libNation."</td>";
        echo "<td class='col-md-3'>$nationalite->libContinent</td>";
        echo "<td class='col-md-3'>
        <a href='index.php?uc=nationalites&action=update&num=".$nationalite->num."' class='btn btn-primary'><i class='fas fa-pen'></i></a>
        <a href='#modalSuppression' data-toggle='modal' data-message='Voulez vous supprimer cette nationalite ?' data-suppression='index.php?uc=nationalites&action=delete&num=".$nationalite->num."' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>
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
        <p>Voulez-vous supprimer cette nationalité ? </p>
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