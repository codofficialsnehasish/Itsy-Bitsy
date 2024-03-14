<h3 class="mb-4 text-center">Login with</h3>
				<div class="row m-0">
            		<div class="mar0auto text-center">
            			<a href="javascript:void(0)" onclick="javascript:popupCenter({url: '<?= base_url('authentication/loginWithgoogle');?>', title: 'Login With Google Account', w: 500, h: 600});" class="new-login-btn btn btn-lg btn-google btn-login fw-bold text-uppercase " type="submit">
		                  	<i class="zmdi zmdi-google "></i> 
                        </a>
	            	
		            	<a href="javascript:void(0)" onclick="javascript:popupCenter({url: '<?= base_url('authentication/loginWithfacebook');?>', title: 'Login With Google Account', w: 500, h: 600});" class="new-login-btn btn btn-lg btn-facebook btn-login fw-bold text-uppercase" type="submit">
		                  	<i class="zmdi zmdi-facebook "></i> 
                        </a>
            		</div>
	            </div>

 <script>
	const popupCenter = ({url, title, w, h}) => {
    // Fixes dual-screen position                             Most browsers      Firefox
    const dualScreenLeft = window.screenLeft !==  undefined ? window.screenLeft : window.screenX;
    const dualScreenTop = window.screenTop !==  undefined   ? window.screenTop  : window.screenY;
    const width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;
    const systemZoom = width / window.screen.availWidth;
    const left = (width - w) / 2 / systemZoom + dualScreenLeft
    const top = (height - h) / 2 / systemZoom + dualScreenTop
    const newWindow = window.open(url, title, 
      `
      scrollbars=yes,
      width=${w / systemZoom}, 
      height=${h / systemZoom}, 
      top=${top}, 
      left=${left}
      `
    )
    if (window.focus) newWindow.focus();
}
</script>