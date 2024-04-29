<div class="container mt-5">
    <h2 class='pt-3 text-center'> <?php echo $mode ?> un auteur</h2>

    <form action="index.php?uc=auteurs&action=valideForm" method="post" class="col-md-6 offset-md-3 border border-dark p-3">
    <div class="form-group">
        <label for='libelle'> Libellé </label>
        <input type="text" class='form-control' id='libelle' placeholder='Saisir le libellé' name='libelle' 
                    value="<?php if($mode == "Modifier") {echo $auteur->getlibelle();}?>">
            </div>
            <input type="hidden" id="num" name="num" value="<?php if($mode == "Modifier") {echo $auteur->getNum();}?>">
            <div class="form-group">
        <label for='continent'> Libellé </label>
        <select name="continent" class="form-control">
        <?php
       foreach($lesnationalites as $nationalite){
        $selection=$nationalite->num == $nationaliteSel ? 'selected' : '';
          echo "<option value='$nationalite->num' $selection>". $nationalite->libNation ."</option>";
        }
        ?>
        </select>
    </div>
    <div class="row">
        <div class="col"> <a href="index.php?uc=auteurs&action=list" class='btn btn-warning btn-block'> Revenir à la liste</a></div>
        <div class="col"><button type='submit' class='btn btn-success btn-block'> <?php echo $mode ?> </button></div>
    </div>
    </form>

</div>