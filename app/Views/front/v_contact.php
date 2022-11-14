<?=$konten;?>
<div class="my-5">
	<?php
		$session = \Config\Services::session();
		if($session->getFlashdata('warning')){
	?>
	<div class="alert alert-warning">
		<ul>
			<?php
				foreach($session->getFlashdata('warning') as $val)
				{
			?>
				<li><?=$val;?></li>
			<?php		
				} 
			?>
		</ul>
	</div>
	<?php		
		} 
		if ($session->getFlashdata('success')) {
	?>
	<div class="alert alert-success"><?php echo $session->getFlashdata('success')?></div>
	<?php
		}
	?>
    <!-- * * * * * * * * * * * * * * *-->
    <!-- * * SB Forms Contact Form * *-->
    <!-- * * * * * * * * * * * * * * *-->
    <!-- This form is pre-integrated with SB Forms.-->
    <!-- To make this form functional, sign up at-->
    <!-- https://startbootstrap.com/solution/contact-forms-->
    <!-- to get an API token!-->
    <form id="contactForm" method="post" action="" data-sb-form-api-token="API_TOKEN">
        <div class="form-floating">
            <input class="form-control" id="name" name="kontak_nama" value="<?php echo (isset($kontak_nama))?$kontak_nama:""?>" type="text" placeholder="Enter your name..." data-sb-validations="required" />
            <label for="name">Name</label>
            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
        </div>
        <div class="form-floating">
            <input class="form-control" id="email" name="kontak_email" value="<?php echo (isset($kontak_email))?$kontak_email:""?>" type="email" placeholder="Enter your email..." data-sb-validations="required,email" />
            <label for="email">Email address</label>
            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
        </div>
        <div class="form-floating">
            <input class="form-control" id="phone" name="kontak_tel" value="<?php echo (isset($kontak_tel))?$kontak_tel:""?>" type="tel" placeholder="Enter your phone number..." data-sb-validations="required" />
            <label for="phone">Phone Number</label>
            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
        </div>
        <div class="form-floating">
            <textarea class="form-control" id="message" name="kontak_pesan"  placeholder="Enter your message here..." style="height: 12rem" data-sb-validations="required"><?php echo (isset($kontak_pesan))?$kontak_pesan:""?></textarea>
            <label for="message">Message</label>
            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
        </div>
        <br />
        <!-- Submit success message-->
        <!---->
        <!-- This is what your users will see when the form-->
        <!-- has successfully submitted-->
        <div class="d-none" id="submitSuccessMessage">
            <div class="text-center mb-3">
                <div class="fw-bolder">Form submission successful!</div>
                To activate this form, sign up at
                <br />
                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
            </div>
        </div>
        <!-- Submit error message-->
        <!---->
        <!-- This is what your users will see when there is-->
        <!-- an error submitting the form-->
        <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
        <!-- Submit Button-->
        <input class="btn btn-primary text-uppercase" name="submit" type="submit" value="SEND">
    </form>
</div>