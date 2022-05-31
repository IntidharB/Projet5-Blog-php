
<h1>Hello</h1>
<h2>Voulez-vous vraiment supprimer cet article ?</h2>


<form class="form" role="form" action="<?=htmlspecialchars($baseurl);?>Article/Delete"  <?=$article->getId()?>  method="post">
                                    <div class="form-actions">
                                        <input type="hidden" id="id" name="id" value="<?=$article->getId()?>">
                                        <button type="submit" name="submit" class="btn btn-danger">Oui</button>
                                        <a class="btn btn-primary"  href="<?=htmlspecialchars($baseurl);?>List" <?=$article->getId()?>> Non</a>
                                    </div>
                                </form>;