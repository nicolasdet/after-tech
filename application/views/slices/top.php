

    		

        <div class="nav-container ">
            <div class="bar bar--sm visible-xs">
                <div class="container">
                    <div class="row">
                        <div class="col-3 col-md-2">
                            <a href="index.html">
                                <public class="logo logo-dark" alt="logo" src="public/assets/img/logo-dark.png" />
                                <public class="logo logo-light" alt="logo" src="public/assets/img/logo-light.png" />
                            </a>
                        </div>
                        <div class="col-9 col-md-10 text-right">
                            <a href="#" class="hamburger-toggle" data-toggle-class="#menu2;hidden-xs hidden-sm">
                                <i class="icon icon--sm stack-interface stack-menu"></i>
                            </a>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </div>
            <!--end bar-->
            <nav id="menu2" class="bar bar-2 hidden-xs bar--absolute bar--transparent">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 text-center text-left-sm hidden-xs order-lg-2">
                            <div class="bar__module">
                                <a href="index.html">
                                    <public class="logo logo-dark" alt="logo" src="public/assets/img/logo-dark.png" />
                                    <public class="logo logo-light" alt="logo" src="public/assets/img/logo-light.png" />
                                </a>
                            </div>
                            <!--end module-->
                        </div>
                        <div class="col-lg-5 order-lg-1">
                            <div class="bar__module">
                                <ul class="menu-horizontal text-left">
                                    <li class="">
                                        <a href="#">
                                         <span class="">Home</span>
                                        </a>
                                        <!--end dropdown container-->
                                    </li>
                                    <li class="dropdown">
                                        <span class="dropdown__trigger">A propos</span>
                                        <div class="dropdown__container">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="dropdown__content col-lg-2 col-md-4">
                                                        <ul class="menu-vertical">
                                                            <li class="dropdown">
                                                                <span class="dropdown__trigger">Informations</span>
                                                                <div class="dropdown__container">
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="dropdown__content col-lg-2">
                                                                                <ul class="menu-vertical">
                                                                                    <li>
                                                                                        <a href="about">
                                                                                            Pourquoi ce site ? 
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="faq">
                                                                                            FAQ
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <!--end dropdown content-->
                                                                        </div>
                                                                        <!--end row-->
                                                                    </div>
                                                                </div>
                                                                <!--end dropdown container-->
                                                            </li>
                                                            <li class="dropdown">
                                                                <span class="dropdown__trigger">Contact</span>
                                                                <div class="dropdown__container">
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="dropdown__content col-lg-2 col-md-4">
                                                                                <ul class="menu-vertical">
                                                                                    <li>
                                                                                        <a href="page-contact-map-1.html">
                                                                                            La societe
                                                                                        </a>
                                                                                    </li>

                                                                                </ul>
                                                                            </div>
                                                                            <!--end dropdown content-->
                                                                        </div>
                                                                        <!--end row-->
                                                                    </div>
                                                                </div>
                                                                <!--end dropdown container-->
                                                            </li>
                                                            <li class="dropdown separate">
                                                                <span class="dropdown__trigger">Contribuer</span>
                                                                <div class="dropdown__container">
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="dropdown__content col-lg-2 col-md-4">
                                                                                <ul class="menu-vertical">
                                                                                    <li>
                                                                                        <a href="contribution">
                                                                                            Comment participer
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="roadmap">
                                                                                            Objectifs et Roadmap
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <!--end dropdown content-->
                                                                        </div>
                                                                        <!--end row-->
                                                                    </div>
                                                                </div>
                                                                <!--end dropdown container-->
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!--end dropdown content-->
                                                </div>
                                                <!--end row-->
                                            </div>
                                        </div>
                                        <!--end dropdown container-->
                                    </li>
                                </ul>
                            </div>
                            <!--end module-->
                        </div>
                        <div class="col-lg-5 text-right text-left-xs text-left-sm order-lg-3">
                            <div class="bar__module">
                                <span class="modal-instance">
                                <a class="btn modal-trigger btn--sm btn--primary  type--uppercase" href="#">
                                    <span class="btn__text">
                                         ce connecter
                                    </span>
                                </a>
                                <div class="modal-container">
                                    <div class="modal-content">
                                        <section class="imageblock feature-large bg--white border--round ">
                                            <div class="imageblock__content col-lg-5 col-md-3 pos-left">
                                                <div class="background-image-holder">
                                                    <img alt="image" src="public/assets/img/afterWorkPro.jpg" />
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row justify-content-end">
                                                    <div class="col-lg-6 col-md-7">
                                                        <div class="row">
                                                            <div class="col-md-11 col-lg-10">
                                                                <h1>Connexion</h1>
                                                                <hr class="short">
                                                                
                                                               <?php echo form_open('#', $LoginFormData['form']); ?>
                                                       
                                                                <div class="row">    
                                                                        <?=  drawInput($InscriptionFormData['email']); ?>
                                                                        <?=  drawInput($InscriptionFormData['password']); ?>
                                                                 
                                                                 <button class="btn btn--primary" type="submit" name="submit" value="submit" >S'inscrire </button>


                                                                </div>
                                                            </div>
                                                            <!--end of col-->
                                                                    <button class=" mt-3 btn btn--alert"  >Mot de passe oublier </button>
                                                        </div>
                                                        <!--end of row-->
                                                    </div>
                                                </div>
                                                <!--end of row-->
                                            </div>
                                            <!--end of container-->
                                        </section>
                                    </div>
                                </div>
                            </span>
                             <span class="modal-instance">
                                <a class="btn modal-trigger btn--sm  type--uppercase" href="#">
                                    <span class="btn__text">
                                        s'inscrire
                                    </span>
                                </a>
                                <div class="modal-container">
                                    <div class="modal-content">
                                        <section class="imageblock feature-large bg--white border--round ">
                                            <div class="imageblock__content col-lg-5 col-md-3 pos-left">
                                                <div class="background-image-holder">
                                                    <img alt="image" src="public/assets/img/meeting-bar.jpg" />
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row justify-content-end">
                                                    <div class="col-lg-6 col-md-7">
                                                        <div class="row">
                                                            <div class="col-md-11 col-lg-10">
                                                                <h1>Rejoignez le meilleur site d'after-work</h1>
                                                                <p class="lead">
                                                                    Affilier vous à un groupe ou une entreprise et profitez des after works.
                                                                </p>
                                                                <hr class="short">
                                                                
                                                               <?php echo form_open('#', $InscriptionFormData['form']); ?>
                                                                
                                                                <div class="row">   
                                                                      <?=  drawInput($InscriptionFormData['nom']); ?>
                                                                      <?=  drawInput($InscriptionFormData['prenom']); ?>
                                                                      <?=  drawInput($InscriptionFormData['email']); ?>
                                                                      <?=  drawInput($InscriptionFormData['password']); ?>
                                                                      <?=  drawInput($InscriptionFormData['second-password']); ?>
                                                           

                                                                    <button class=" mt-3 btn btn--primary" type="submit" name="submit" value="submit" >S'inscrire </button>

                                                                </div>
                                                            </div>
                                                            <!--end of col-->
                                                        </div>
                                                        <!--end of row-->
                                                    </div>
                                                </div>
                                                <!--end of row-->
                                            </div>
                                            <!--end of container-->
                                        </section>
                                    </div>
                                </div>
                        
</span>
                            </div>
                            <!--end module-->
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </nav>
            <!--end bar-->
        </div>



     <div class="main-container">

        