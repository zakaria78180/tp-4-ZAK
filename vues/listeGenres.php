<div class="container mt-5">

    <div class="row pt-3">
       <div class="col-9"><h2>Liste des genres</h2></div>
       <div class="col-3"><a href="index.php?uc=genres&action=add" class='btn btn-success'><i 
       class="fas fa-plus-circle"></i> Créer un genre</a></div>
    </div> 
    
    <table class="table table-hover table-striped">
<thead>
  <thead class="thead-dark">
    <tr class="d-flex">
      <th scope="col" class="col-md-2">Numéro</th>
      <th scope="col" class="col-md-8">Libellé</th>
      <th scope="col" class="col-md-2">Actions</th>
    </tr>
  </thead>
  <tbody>
<?php
    foreach($lesgenres as $genre){
        echo "<tr class='d-flex'>";
        echo "<td class='col-md-2'>".$genre->getnum()."</td>";
        echo "<td class='col-md-8'>".$genre->getlibelle()."</td>";
        echo "<td class='col-md-2'>
        <a href='index.php?uc=genres&action=update&num=".$genre->getnum()."' class='btn btn-primary'><i class='fas fa-pen'></i></a>
        <a href='#modalSuppression' data-toggle='modal' data-message='Voulez vous supprimer ce genre ?' data-suppression='index.php?uc=genres&action=delete&num=".$genre->getnum()."' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>
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
        <p>Voulez-vous supprimer ce genre ? </p>
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