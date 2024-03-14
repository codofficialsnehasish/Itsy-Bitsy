<script src="<?= base_url('assets/js/jquery-3.6.0.min.js');?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/bootstrap5.1/js/bootstrap.bundle.min.js');?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/produce-zoom/js/my-zoom.js');?>"></script>
<script src="<?= base_url('assets/js/nav.jquery.min.js');?>"></script>
    
<script type="text/javascript" src="<?= base_url('assets/vendor/OwlCarousel2-2.3.4/dist/owl.carousel.min.js');?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/slick-slider/slick/slick.min.js');?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/acmeticker/assets/js/acmeticker.min.js');?>"></script>

	<script>
		(document).ready(function() {
		   	$('[data-toggle="popover"]').popover({
		      	placement: 'top',
		      	trigger: 'hover'
		   	});
		});
	</script>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')
  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }else{
           // $(".animate-container").addClass("animation-added");
            setInterval(function() { 
          //  $('#stepForm1').submit();
        }, 4000);  
        }
        
        form.classList.add('was-validated')
        
      }, false)
    })
   
})()

</script>


	<?php $this->load->view('partials/ajax');?>
    <script>
     $("#log_nxt").click(function() {
        const getUrl = window.location;
        const baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
        const val = $("input[name='user_type']:checked").val();
        if (val == 'buyer') {
            window.location.href = baseUrl+"signup";
        } else {
            window.location.href = baseUrl+"seller/signup";
        }

    })

	</script>