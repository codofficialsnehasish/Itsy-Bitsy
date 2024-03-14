<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('email/_header', $subject); ?>
<!-- START CENTERED WHITE CONTAINER -->
<table role="presentation" class="main">
	<!-- START MAIN CONTENT AREA -->
	<tbody><tr>
		<td class="wrapper">
			<table role="presentation" border="0" cellpadding="0" cellspacing="0">
				<tbody><tr>
					<td>
						<h1><?= $subject?> </h1>
						<div class="mailcontent" style="line-height: 26px;font-size: 14px;">
							<p>Dear Mr <strong><?= $userdata['name'];?></strong>
                                <br> Thanks to pay Registration Fees of &nbsp;<strong> Rs 100/- </strong>&nbsp; to &nbsp;<strong>AKDTS </strong>.
                                <br> You will soon be notified as <strong> Registered </strong>!
                                <br> We will get back to you soon.
                                <br>Stay Healthy! Stay Safe!
                                <br>
							</p>
                            <p style="text-align:center;margin-top:30px;">
								<a href="http://akdts.in/" target="_blank" style="font-size: 14px;text-decoration: none;padding: 14px 40px;background-color: #f56a6a;color: #ffffff !important; border-radius: 3px;">
									Contact Us <i class="icon-signin"></i>
								</a>
							</p>
						</div>
					</td>
				</tr>
			</tbody></table>
		</td>
	</tr></tbody> <!-- END MAIN CONTENT AREA -->
</table>
<!-- END CENTERED WHITE CONTAINER -->
<?php $this->load->view('email/_footer'); ?>