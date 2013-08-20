<?php

// Parse the posted for and error check / generate email / show thank you note.

$showForm = TRUE;
$fullnameError = FALSE;
$emailError = FALSE;
$messageError = FALSE;

date_default_timezone_set('Etc/UTC');

require '_/PHPMailer/class.phpmailer.php';


if (isset($_POST['submit']))
{

	$emailCheck = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	$showForm = FALSE;
	
	//Error check
	if ($_POST['fullname'] == NULL) 
	{

		$fullnameError = TRUE;
		$showForm = TRUE;
		
	}

	if ($_POST['message'] == NULL) 
	{

		$messageError = TRUE;
		$showForm = TRUE;
		
	}

	if ($_POST['email'] == NULL || !preg_match($emailCheck, $_POST['email'])) 
	{

		$emailError = TRUE;
		$showForm = TRUE;
		
	}

	if (!$showForm)
	{
			
		//Create a new PHPMailer instance
		$mail = new PHPMailer();
		//Tell PHPMailer to use SMTP
		$mail->IsSMTP();
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug  = 0;
		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';
		//Set the hostname of the mail server
		$mail->Host       = 'smtp.gmail.com';
		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port       = 587;
		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';
		//Whether to use SMTP authentication
		$mail->SMTPAuth   = true;
		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username   = "alex@ifnotwhynot.com";
		//Password to use for SMTP authentication
		$mail->Password   = "ducati696";
		//Set who the message is to be sent from
		$mail->SetFrom($_POST['email'], $_POST['fullname']);
		//Set an alternative reply-to address
		$mail->AddReplyTo($_POST['email'], $_POST['fullname']);
		//Set who the message is to be sent to
		$mail->AddAddress('alex@ifnotwhynot.com', 'Alex Tebbutt');
		//Set the subject line
		$mail->Subject = 'Email enquiry from website from ' . $_POST['fullname'];
		//Replace the plain text body with one created manually
		
		$mail->Body = $_POST['message'];

		if($_POST['phone-number'] != NULL)
		{
			$mail->Body .= "\r\n\r\n" . 'Phone number: ' . $_POST['phone-number'];
		
		}
		
		$mail->Send();
		
	}

}


?>


<!doctype html>

<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 ie-lt10 ie-lt9 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 ie-lt10 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. --> 

<head id="www-ifnotwhynot-com" data-template-set="html5-reset">

	<meta charset="utf-8">
	
	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>Freelance Website Design &amp; Development &#183; London &#183; IFNOTWHYNOT</title>
	
	<meta name="title" content="Lonson Based Freelance Website Design &amp; Development &#183; IFNOTWHYNOT" />
	<meta name="description" content="We help small to mediums sized businesses and individuals acheive a presence on the web. We work closely with our clients to give them that shiney happy feeling!" />
	<meta name="author" content="Alex Tebbutt" />
	<!-- Google will often use this as its description of your page/site. Make it good. -->
	
	<meta name="google-site-verification" content="" />
	<!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->
	
	<meta name="author" content="" />
	<meta name="Copyright" content="" />
	
	<!--  Mobile Viewport Fix
	http://j.mp/mobileviewport & http://davidbcalhoun.com/2010/viewport-metatag
	device-width : Occupy full width of the screen in its current orientation
	initial-scale = 1.0 retains dimensions instead of zooming out if page height > device height
	maximum-scale = 1.0 retains dimensions instead of zooming in if page width < device width
	-->
	<!-- Uncomment to use; use thoughtfully!
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	-->

	<!-- Iconifier might be helpful for generating favicons and touch icons: http://iconifier.net -->
	<link rel="shortcut icon" href="_/img/favicon.ico" />
	<!-- This is the traditional favicon.
		 - size: 16x16 or 32x32
		 - transparency is OK -->
		 
	<link rel="apple-touch-icon" href="_/img/apple-touch-icon.png" />
	<!-- The is the icon for iOS's Web Clip and other things.
		 - size: 57x57 for older iPhones, 72x72 for iPads, 114x114 for retina display (IMHO, just go ahead and use the biggest one)
		 - To prevent iOS from applying its styles to the icon name it thusly: apple-touch-icon-precomposed.png
		 - Transparency is not recommended (iOS will put a black BG behind the icon) -->
	
		 <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400|Open+Sans:400,300|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
	<!-- concatenate and minify for production -->
	<link rel="stylesheet" href="_/css/reset.css" />
	<link rel="stylesheet" href="_/css/style.css" />
	
	<!-- This is an un-minified, complete version of Modernizr. 
		 Before you move to production, you should generate a custom build that only has the detects you need. -->
	<script src="_/js/modernizr-2.6.2.dev.js"></script>
	
	<!-- Application-specific meta tags -->
	<!-- Windows 8 -->
	<meta name="application-name" content="" /> 
	<meta name="msapplication-TileColor" content="" /> 
	<meta name="msapplication-TileImage" content="" />
	<!-- Twitter -->
	<meta name="twitter:card" content="">
	<meta name="twitter:site" content="">
	<meta name="twitter:title" content="">
	<meta name="twitter:description" content="">
	<meta name="twitter:url" content="">
	<!-- Facebook -->
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:url" content="" />
	<meta property="og:image" content="" />

	<style>
	
		#fade {
			display: none;
		}
	
	</style>
</head>

<body>

<div>

<header class="wrapper">

	<h2 id="fade">IF&nbsp;NOT&nbsp;WHY&nbsp;NOT</h2>
	<h1>Freelance Website Design &amp; Development</h1>
	
	<p>Yep, we're re-building so there's not much to see here I'm afraid.</p>
	<p>We are currently <span>taking on projects</span> though, so do drop us a line.</p>

</header>

<?php

if($showForm)
{
?>

<section id="getintouch" class="wrapper">
	
		<form id="get-in-touch" action="index.php" method="post">
		
			<div class="outline fullname">
	
				<label <?php if($fullnameError) echo 'class="error" '; ?>for="name">Name</label>
				
				<input id="name" name="fullname" type="text" placeholder="Full name" required="required" value="<?php if($_POST['fullname'] != '') echo $_POST['fullname']; ?>" />

			</div>
			
			<div class="outline email">
	
				<label <?php if($emailError) echo 'class="error" '; ?>for="email">Email</label>
				
				<input id="email" name="email" type="email" placeholder="name@place.com" required="required" value="<?php if($_POST['email'] != '') echo $_POST['email']; ?>" />

			</div>

			<div class="outline phone-number">
			
				<label for="phone-number">Contact No</label>
				
				<input id="phone-number" name="phone-number" type="tel" placeholder="020 1234 5678" />
				
			</div>

			<label class="message-label<?php if($messageError) echo ' error'; ?>" for="message">How can we help?</label>

			<div class="outline message">
			
				<textarea id="message" name="message"><?php if($_POST['message'] != '') echo $_POST['message']; ?></textarea>

			</div>
			
			<input id="submit" name="submit" type="submit" value="submit" />
		
		</form>

	</div>

</section>
<?php
} else {
?>
<section id="thanks" class="wrapper">

	<h2>Thanks for the enquiry!</h2>
	
	<p>We will be in touch very soon</p>

</section>
<?php
}
?>
</div>
<footer>

<!-- Social Links go here -->

</footer>	
	
<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6.
		 http://chromium.org/developers/how-tos/chrome-frame-getting-started -->
<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

<!-- Grab Google CDN's jQuery. fall back to local if necessary -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write("<script src='_/js/jquery-1.9.1.min.js'>\x3C/script>")</script>

<script type="text/javascript">
$(document).ready(function() { 

    $('#fade').css('opacity', 0)
	  .slideDown('slow')
	  .animate(
	    { opacity: 1 },
	    { queue: false, duration: 'slow' }
	  )
});

<!-- this is where we put our custom functions -->
<!-- don't forget to concatenate and minify if needed -->
<script src="_/js/functions.js"></script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-18269688-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
  
</body>
</html>