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

  <form name="contactform" method="post" >
            <table width="450px">
            
                <tr>
                    <td valign="top">
                        <label for="email">Email Address *</label>
                    </td>
                    <td valign="top">
                        <input  type="text" name="email" maxlength="80" size="30" required>
                    </td>
                </tr>
				<tr>
                    <td valign="top">
                        <label for="subject">Subject *</label>
                    </td>
                    <td valign="top">
                        <input  type="text" name="subject" maxlength="80" size="30" required>
                    </td>
                </tr>
				
              
                <tr>
                    <td valign="top">
                        <label for="comments">Message *</label>
                    </td>
                    <td valign="top">
                        <textarea  name="comment" maxlength="1000" cols="25" rows="6" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center">
                        <input type="submit" value="Submit">   
                    </td>
                </tr>
            </table>
        </form>
  
<?php
  }
?>