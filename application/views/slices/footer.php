            <footer class="footer-3 text-center-xs space--xs ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img alt="Image" class="logo" src="public/assets/img/logo-dark.png" />
                            <ul class="list-inline list--hover">
                                <li class="list-inline-item">
                                    <a href="#">
                                        <span class="type--fine-print">Get Started</span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <span class="type--fine-print">help@stack.io</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 text-right text-center-xs">
                            <ul class="social-list list-inline list--hover">
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="socicon socicon-google icon icon--xs"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="socicon socicon-twitter icon icon--xs"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="socicon socicon-facebook icon icon--xs"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="socicon socicon-instagram icon icon--xs"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--end of row-->
                    <div class="row">
                        <div class="col-md-6">
                            <p class="type--fine-print">
                                Supercharge your web workflow
                            </p>
                        </div>
                        <div class="col-md-6 text-right text-center-xs">
                            <span class="type--fine-print">&copy;
                                <span class="update-year"></span> Stack Inc.</span>
                            <a class="type--fine-print" href="#">Privacy Policy</a>
                            <a class="type--fine-print" href="#">Legal</a>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </footer>
        </div>
        
		</div>

		<?php
			echo $js;

			if (!empty($jsCode))
			{
				echo '<script type="text/javascript">' . "\n";
				foreach ($jsCode as $code)
				{
					echo $code . ";\n";
				}
				echo '</script>';
			}
		?>



<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	</body>
</html>
