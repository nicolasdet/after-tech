                        <div class="col-lg-8 hidden  account-tab " id="detail-gestion">
                            <div class="titleGroupe mt-4 p-4 bgWheat"> 
                                  <h4>Gestion du groupe</h4>
                                  <hr />
                                 <h5 class="mt-3">Modifier les informations gennerales</h5>
                                  <form method="POST" action="user/groupe/update/<?= $groupe_detail->groupes_id ?>">
                                     <?=  drawInput($getUpdateGroupeForm['nom']); ?>
                                     <?=  drawInput($getUpdateGroupeForm['detail']); ?>
                                 <div class="col-md-3">
                                <button type="submit" class="btn btn--primary">modifier</button>
                                </div>
                            </form>

                            <hr class="mt-5" />
                            <h5 class="mt-3">Modifier l'image</h5>
                            <img class="groupe_span image_groupe_detail padding11" id="groupe-<?= $groupe_detail->groupes_id ?>" alt="" 
                                src="<?= isset($groupe_detail->groupes_img) ? $groupe_detail->groupes_img : '' ?>" />
                            <?php echo form_open_multipart("user/groupe/update/do_upload/".$groupe_detail->groupes_id);?>
                                        <input type="file" class="mt-1" id="upl_img_user" name="userfile" size="20" />
                                        <br /><br />
                                        <button type="submit" class="btn btn--primary" >telecharger l'image </button>
                                        </form>
                            <hr class="mt-5" />
                            <h5 >Gestion des utilisateurs</h5>
                              <?php 
                                        if(!empty($groupe_detail->membres['users'])):
                                     ?>
                                <table class="border--round table--alternate-row">
                                <thead>
                                    <tr>
                                        <th >nom</th>
                                        <th>prenom</th>
                                        <th>status</th>
                                        <th>options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($groupe_detail->membres['users'] as $unUser) : #var_dump($unUser->user_model); ?>
                                    <tr>
                                        <td><?= $unUser->user_model->user_nom ?></td>
                                        <td><?= $unUser->user_model->user_prenom ?></td>
                                        <td> 
                                            <?php if($unUser->status == 1): ?>
                                                Administrateur
                                            <?php else: ?>
                                                 Membre 
                                            <?php endif; ?>
                                        </td> 
                                        <td>
                                                <?php if(!$unUser->status == 1): ?>

                                                <a class="col-md-6"
                                                 href="user/groupe/supprimer/<?= $unUser->user_id ?>/<?= $groupe_detail->groupes_id ?>">
                                                  <button type="button" class="btn btn-danger button_invit">Retirer du groupe</button>
                                                </a>

                                                <?php endif; ?>

                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                    </table>

                                <?php else: ?>
                                    <p> pas d'utilisateurs </p>
                                <?php endif; ?>
                            </div>
                        </div>