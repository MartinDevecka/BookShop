<html>
    <head>
        <meta charset="UTF-8">
        <link href="<?= $this->app->getBaseUrl(); ?>web/css/bootstrap-main-template.css" rel="stylesheet">
               <link href="<?= $this->app->getBaseUrl(); ?>libraries/models/ContactForm.php" rel="stylesheet">
               
                <script src="https://maps.googleapis.com/maps/api/js"></script>
                <script>
                  function initialize() {
                    var mapCanvas = document.getElementById('map-canvas');
                    var mapOptions = {
                      center: new google.maps.LatLng(48.147152, 17.102156),
                      zoom: 18,
                      mapTypeId: google.maps.MapTypeId.ROADMAP
                    }
                    var map = new google.maps.Map(mapCanvas, mapOptions)
                  }
                  google.maps.event.addDomListener(window, 'load', initialize);
                </script>
                  
        <title>Contact</title>
        
    </head>
    <body>
        
         <div id="map-canvas"></div>
       
        <p class="nadpiscontact">
            In any case you can contact us by phone, via email or you can visit us in Bratislava. <br>
        </p>
        
        
        
        <p class="adresacontact">
            Bookshop Bratislava <br>
            Kozia 20, <br>
            811 03 Bratislava <br><br>
            Phone: 02/111 111
            
        </p>
        

    </body>
</html>

<?php
//if "email" variable is filled out, send email
  if (isset($_REQUEST['email']))  {
  
  //Email information
  $admin_email = "bookshopbratislava@hotmail.com";
  $email = $_REQUEST['email'];
  $subject = $_REQUEST['subject'];
  $comment = $_REQUEST['comment'];
  
  //send email
  mail($admin_email, "$subject", $comment, "From:", $email);
  
  //Email response
  echo "Thank you for contacting us!";
  }
  
  //if "email" variable is not filled out, display the form
  else  { 
?>

<form method="post" name="contactform">
    <div class="input-group col-lg-4" style="padding-bottom: 5px;">
        <span class="input-group-addon input-group-addon-custom" id="basic-addon1">Email Address *</span>
        <input type="email" class="form-control" name="email" placeholder="name@webhosting.com" aria-describedby="basic-addon1" required>
    </div>
    <div class="input-group col-lg-4" style="padding-bottom: 5px;">
        <span class="input-group-addon input-group-addon-custom" id="basic-addon1">Subject *</span>
        <input type="password" class="form-control" name="password" aria-describedby="basic-addon1" required>
    </div>
    <div class="input-group col-lg-4" style="padding-bottom: 5px;">
        <span class="input-group-addon input-group-addon-custom" id="basic-addon1">Message *</span>
        <textarea class="form-control" name="comment" required></textarea>
    </div>
    <div class="col-lg-4" style="padding-right: 0; padding-bottom: 5px;">
        <div class="btn-group pull-right" role="group" aria-label="...">
            <button type="submit" class="btn btn-success">Send</button>
        </div>
    </div>
</form>
  
<?php
  }
?>