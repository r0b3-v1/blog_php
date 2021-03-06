<div class="row d-flex justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-0 border" style="background-color: #f0f2f5;">
            <div class="card-body p-4" id="commentlist">
                <?php if (!empty($_SESSION['id'])) { ?>
                    <form method="POST" class="form-outline mb-4" action="<?= url('new-comment',$_GET['id']) ?>">
                        <input required="required" name="contenu" type="text" id="addANote" class="form-control" placeholder="Type comment..." />
                        <input type="submit" name="newComment" value="Ajouter un commentaire" class="btn btn-primary mt-3" id="addCommentBtn">
                    </form>
                <?php } ?>

                <?php foreach ($comments["comments"] as $comment) {  
                    $user = $comments['users'][$comment->id] ?? null;
                    ?>

                    <div class="card mb-4">
                        <div class="card-body">
                            <p><?= $comment->contenu ?></p>

                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <img class="rounded-circle" src="<?= (!empty($user)? $user->avatar : 'https://bip.cnrs.fr/wp-content/uploads/2019/11/user.jpg');?>" alt="avatar" width="25" height="25" />
                                    <p class="small mb-0 ms-2"><?= (!empty($user)? $user->pseudo : 'anonyme');?></p>
                                </div>
                                <div class="mb-1 text-muted"><?= formatDate($comment->date_publication) ?></div>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>
    </div>
</div>
</div>
</div>

<script>
    var id = <?= $_GET['id']?>;
</script>

<script src="assets/js/comments.js"></script>