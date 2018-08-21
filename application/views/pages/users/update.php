            <section class="bg--secondary space--sm">
                <div class="container">
                    <div class="row mt-5 pl-5">
                        <div class="col-lg-4">
                            <div class="boxed boxed--lg boxed--border">
                                    <a class="btn btn--primary btn--icon mb-5" id="change_user_info" href="/user">
                                        <span class="btn__text">
                                             retour au profil
                                        </span>
                                    </a>
                                <div class="text-block text-center">
                                    <img alt="avatar" src="public/assets/img/avatar-round-3.png" class="image--sm" />
                                    <span class="h5"><?= $user->user_nom." ".$user->user_prenom  ?></span>
                                   
                                </div>
                                <hr>
                                <div class="text-block">
                                    <ul class="menu-vertical">
                                        <li>
                                            <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-profile;hidden">Profile</a>
                                        </li>
                                        <!--
                                        <li>
                                            <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-notifications;hidden">Email Notifications</a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-billing;hidden">Billing Details</a>
                                        </li>
                                    -->
                                        <li>
                                            <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-password;hidden">Password</a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle-class=".account-tab:not(.hidden);hidden|#account-delete;hidden">Delete Account</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="boxed boxed--lg boxed--border">
                                <div id="account-profile" class="account-tab">
                                    <h4>Profile</h4>
                                     <form method="POST" action="user/update/profile" class="form" >
                                                                <span></span>
                                                                <div class="row">  
                                                                      <?=  drawInput($UpdateUserForm['nom']); ?>
                                                                      <?=  drawInput($UpdateUserForm['prenom']); ?>
                                                                      <?=  drawInput($UpdateUserForm['email']); ?>
                                                 <div class="col-lg-3 col-md-4">
                                                <button type="submit" class="btn btn--primary type--uppercase">Update Profile</button>
                                            </div>

                                        </div>
                                  </form>
                                </div>
                                <div id="account-notifications" class="hidden account-tab">
                                    <h4>Email Notifications</h4>
                                    <p>Select the frequency with which you'd like to recieve product summary emails:</p>
                                    <form>
                                        <div class="boxed bg--secondary boxed--border row">
                                            <div class="col-4 text-center">
                                                <div class="input-radio">
                                                    <span>Never</span>
                                                    <input type="radio" name="frequency" value="never" class="validate-required" />
                                                    <label></label>
                                                </div>
                                            </div>
                                            <div class="col-4 text-center">
                                                <div class="input-radio checked">
                                                    <span>Weekly</span>
                                                    <input type="radio" name="frequency" value="weekly" class="validate-required" />
                                                    <label></label>
                                                </div>
                                            </div>
                                            <div class="col-4 text-center">
                                                <div class="input-radio">
                                                    <span>Monthly</span>
                                                    <input type="radio" name="frequency" value="monthly" class="validate-required" />
                                                    <label></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-5">
                                                <button type="submit" class="btn btn--primary type--uppercase">Save Preferences</button>
                                            </div>
                                        </div>
                                        <!--end of row-->
                                    </form>
                                </div>
                                <div id="account-billing" class="hidden account-tab">
                                    <h4>Billing Details</h4>
                                    <div class="boxed boxed--border bg--secondary">
                                        <h5>Payment Methods</h5>
                                        <hr>
                                        <form>
                                            <ul>
                                                <li class="row">
                                                    <div class="col-md-6">
                                                        <p>
                                                            <i class="material-icons">credit_card</i>
                                                            <span> Mastercard ending in
                                                                <strong>4722</strong>
                                                            </span>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-3 text-right text-left-xs">
                                                        <button type="submit" class="btn bg--error">Remove</button>
                                                    </div>
                                                    <div class="col-md-3 text-right text-left-xs">
                                                        <button type="submit" class="btn">Edit</button>
                                                    </div>
                                                </li>
                                            </ul>
                                            <hr>
                                            <button type="submit" class="btn">Add New Method</button>
                                        </form>
                                    </div>
                                </div>
                                <div id="account-password" class="hidden account-tab">
                                    <h4>Mot de passe</h4>
                                    <p>Le mot de passe doit faire 8charractere minimum</p>
                                    <form method="POST" action="user/update/password" class="form" >
                                        <div class="row">
                                            <?=  drawInput($UpdateUserPasswordForm['password']); ?>
                                            <?=  drawInput($UpdateUserPasswordForm['new-password']); ?>
                                            <?=  drawInput($UpdateUserPasswordForm['second-password']); ?>
           
                                            <div class="col-lg-6 col-md-7">
                                                <button type="submit" class="btn btn--primary type--uppercase">Enregistrer le nouveau mot de passe</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="account-delete" class="hidden account-tab">
                                    <h4>Delete Account</h4>
                                    <p>Permanently remove your account using the button below. Warning, this action is permanent.</p>
                                    <form>
                                        <button type="submit" class="btn bg--error type--uppercase">Delete Account</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>