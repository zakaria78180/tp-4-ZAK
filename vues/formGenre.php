<div class="container mt-5">
    <h2 class='pt-3 text-center'> <?php echo $mode ?> un genre</h2>

    <form action="index.php?uc=genres&action=valideForm" method="post" 
            class="col-md-6 offset-md-3 border border-dark p-3">
    <div class="form-group">
        <label for='libelle'> Libellé </label>
        <input type="text" class='form-control' id='libelle' placeholder='Saisir le libellé' name='libelle' value="<?php if($mode == "Modifier"){echo $genre->getlibelle();}?>">
    </div>
    <input type="hidden" id="num" name="num" value="<?php if($mode == "Modifier") {echo $genre->getNum();}?>">
    <div class="row">
        <div class="col"> <a href="index.php?uc=genres&action=list" class='btn btn-warning btn-block'> Revenir à la liste</a></div>
        <div class="col"><button type='submit' class='btn btn-success btn-block'> <?php echo $mode ?> </button></div>
    </div>
    </form>

</div>  