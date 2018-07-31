            <footer class="footer-3 text-center-xs space--xs ">
                <div class="container">
                    <!--end of row-->
                    <div class="row">
                        <div class="col-md-6">
                            <p class="type--fine-print">
                                After-tech
                            </p>
                        </div>
                        <div class="col-md-6 text-right text-center-xs">
                            <span class="type--fine-print">&copy;
                                <span class="update-year"></span> After-tech Inc.</span>
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


<?php if(!empty(validation_errors())): ?>
          <div class="modal-container" data-autoshow="500">
                <div class="modal-content">
                    <div class="boxed boxed--lg">
                        <h2>Vous n'avez pas remplis le formulaire correctement : </h2>
                        <hr class="short">
                        <p class="lead">
                            <?php echo validation_errors(); ?>
                        </p>
                    </div>
                </div>
            </div>
<?php endif; ?>


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
