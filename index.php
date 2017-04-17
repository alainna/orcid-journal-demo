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

    <div class="container-narrow">

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
        <h2>Learned Society Journal<br /> online submission system</h2>
        <br>
        <p class="lead" align="left"><i>Learned Society Journal</i> requires that all submitting authors connect their ORCID iDs to their manuscript submission. Please connect your ORCID iD to start the submission process.</p>
        <!--replace client_id and redirect_uri with your own values-->
        <a class="btn btn-large" href="https://sandbox.orcid.org/oauth/authorize?client_id=APP-NR67QVZ6VF21QTZ3&response_type=code&scope=/activities/update&redirect_uri=https://orcid-journalconnect.herokuapp.com/oauth-redirect.php"><img id="orcid-id-logo" src="https://orcid.org/sites/default/files/images/orcid_24x24.png" width='24' height='24' alt="ORCID icon"/> Create or connect your ORCID iD</a>
        <!-- <br> <br> -->
        <!--replace client_id and redirect_uri with your own values-->
        <!-- let's not do step 2 
		<p class="lead">Already have an ORCID iD? <a href="https://sandbox.orcid.org/oauth/authorize?client_id=APP-NR67QVZ6VF21QTZ3&response_type=code&scope=/activities/update&redirect_uri=https://orcid-journalconnect.herokuapp.com/oauth-redirect.php&show_login=true">Connect your existing ORCID iD</a> -->
      </div>

      <hr>

     <!-- <div class="row-fluid marketing">
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
        Want to build your own create-on-demand app? <a href="https://github.com/lizkrznarich/orcid-demo-app" target="_blank">Get the code</a>
      </div>

    </div> <!-- /container -->

    <!-- Javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
