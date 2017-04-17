<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ORCID Journal Connection Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="bootstrap/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="https://orcid.org/sites/default/files/images/orcid_16x16.png" />
  </head>

  <body>

<?php

//ORCID API CREDENTIALS - replace these values with your API credentials
////////////////////////////////////////////////////////////////////////

define('OAUTH_CLIENT_ID', 'APP-NR67QVZ6VF21QTZ3');//client ID
define('OAUTH_CLIENT_SECRET', '91729101-8137-416e-b236-b001dbbc8b63');//client secret
define('OAUTH_REDIRECT_URI', 'https://orcid-journalconnect.herokuapp.com');//redirect URI

//ORCID API ENDPOINTS
////////////////////////////////////////////////////////////////////////

//Sandbox - Member API
//define('OAUTH_AUTHORIZATION_URL', 'https://sandbox.orcid.org/oauth/authorize');//authorization endpoint
//define('OAUTH_TOKEN_URL', 'https://sandbox.orcid.org/oauth/token'); //token endpoint

//Sandbox - Public API
//define('OAUTH_AUTHORIZATION_URL', 'https://sandbox.orcid.org/oauth/authorize');//authorization endpoint
//define('OAUTH_TOKEN_URL', 'https://sandbox.orcid.org/oauth/token');//token endpoint

//Production - Member API
//define('OAUTH_AUTHORIZATION_URL', 'https://orcid.org/oauth/authorize');//authorization endpoint
//define('OAUTH_TOKEN_URL', 'https://orcid.org/oauth/token'); //token endpoint

//Production - Public API
define('OAUTH_AUTHORIZATION_URL', 'https://orcid.org/oauth/authorize');//authorization endpoint
define('OAUTH_TOKEN_URL', 'https://orcid.org/oauth/token');//token endpoint

//EXCHANGE AUTHORIZATION CODE FOR ACCESS TOKEN
////////////////////////////////////////////////////////////////////////

//If an authorization code exists, fetch the access token
if (isset($_GET['code'])) {

	//Build request parameter string
	$params = "client_id=" . OAUTH_CLIENT_ID . "&client_secret=" . OAUTH_CLIENT_SECRET . "&grant_type=authorization_code&code=" . $_GET['code'] . "&redirect_uri=" . OAUTH_REDIRECT_URI;


	//Initialize cURL session
	$ch = curl_init();

	//Set cURL options
	curl_setopt($ch, CURLOPT_URL, OAUTH_TOKEN_URL);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);//Turn off SSL certificate check for testing - remove this for production version!
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);//Turn off SSL certificate check for testing - remove this for production version!
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

	//Execute cURL command
	$result = curl_exec($ch);

	//Close cURL session
	curl_close($ch);

	//Transform cURL response from json string to php array
	$response = json_decode($result, true);

} else {
	//If an authorization code doesn't exist, throw an error
	echo "Unable to connect to ORCID";
}

?>		

<div class="container">

      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="https://orcid-create-on-demand.herokuapp.com/">Home</a></li>
          <li><a href="https://orcid.org" target="_blank">About ORCID</a></li>
          <li><a href="https://orcid.org/help/contact-us" target="_blank">Contact ORCID</a></li>
        </ul>
        <h3 class="muted">Learned Society Journal</h3>
      </div>

      <hr>

      <div class="jumbotron">
      <h1>Thanks, <?php echo $response['name']; ?>!</h1>
      <br>
      <p class="lead">Your <a href="https://sandbox.orcid.org/<?php echo $response['orcid']; ?>" target="_blank"><img src="https://orcid.org/sites/default/files/images/orcid_16x16.png" class="logo" width='16' height='16' alt="iD"/> https://sandbox.orcid.org/<?php echo $response['orcid']; ?></a> has been successfully connected to your profile with <i>Learned Society Journal</i>. Your ORCID iD will be embedded in the article metadata we deposit to Crossref. We'll also  </p>
      <p class="lead">The access token we're storing in our database to indicate that we have authenticated your ORCID iD and gained your permission to update your ORCID record is: <b><?php echo $response['access_token']; ?></b>. We'll use your access token when we update your ORCID record in the future with your <b>publication</b>, <b>peer review activity</b>, or <b>affiliation with our society</b>.</p>
      <p>(for demo purposes only - don't show access tokens in live apps!)</p>
      <br> <br>
      <a class="btn btn-large"  href="<?php echo ENV; ?>/my-orcid" target="_blank">Go to your ORCID record</a>
  </div>

<hr>

      <!--<div class="row-fluid marketing">
        <div class="span6">
          <h4>Subheading</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

          <h4>Subheading</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

          <h4>Subheading</h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>

        <div class="span6">
          <h4>Subheading</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

          <h4>Subheading</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

          <h4>Subheading</h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>
      </div>

      <hr>-->

      <div class="footer">
        Want to build your own app? <a href="https://github.com/lizkrznarich/orcid-demo-app" target="_blank">Get the code</a>
      </div>

    </div> <!-- /container -->

    <!-- Javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
