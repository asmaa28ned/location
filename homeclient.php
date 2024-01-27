<?php


// connexion a la base de donnees 
$servername ="localhost";
$username ="root";
$password = "";
$dbname = "tpin";


 $conn = mysqli_connect($servername,$username,$password,$dbname);
/*if(!$conn){
echo " DATEBASE  NOT Connected ";
} else{
echo " DATEBASE  Connected ";
} */ 


  $messag = "";
  $message = "";


  if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $messag = $_POST['latitude'];
    $message = $_POST['longitude'];
    

    do{

        //add new client

        $sql= "INSERT INTO notif ( messag, message ) ".
              " VALUES ('$messag','$message')";
                $result=$conn->query($sql);
         
               
             }while(false);
  }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Home_CLIENT</title>
   
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
    <link rel="stylesheet" href="fati.css">
    <link rel="stylesheet" href="style.css">
    
</head>

    
</head>
<body>
    <header class="header">
        <a  class="logo">FANC</a>

        <nav class="navbar">

            <a href="homeclient.php" class="ri-home-line" class="active">Home</a>
            <a href="about.php" class="ri-information-line">About </a>
             <a href="profil.php" class="ri-user-line">Profil</a>
           
        </nav>

    </header>
    <br>
    <!-- home section design -->
    <section class="home " id="home ">
        <div class="home-content ">
            <h2>Hello_Customer </h2>
                      
           
    <form method="post">
        <div class="row mb-3">
        <label  for="latitude">Latitude:</label>
            <div class="col-sm-6">
            <input type="text" id="latitude" name="latitude" >
            </div>
        </div>

        <div class="row mb-3">
        <label for="longitude">Longitude:</label>
            <div class="col-sm-6">
            <input  type="text" id="longitude" name="longitude" >
            </div>
        </div>

        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
            <button type="submit" class="btn btn-primary">Send Notification</button>
              
            </div>
           
        </div>
        </form>

    


       
      
    <script>
/*function sendNotification() {
    localStorage.setItem('notification', ' Help please!');
}
    function copyToClipboard() {
            var input1 = document.getElementById('latitude');
            var input2 = document.getElementById('longitude');
            var text = input1.value + ' , ' + input2.value;
            var copyInput = document.createElement('input');
            copyInput.value = text;
            document.body.appendChild(copyInput);
            copyInput.select();
            document.execCommand('copy');
            document.body.removeChild(copyInput);
        }*/

        var map;

        function initMap() {
            map = new google.maps.Map(document.createElement("div"), {
                center: { lat: -34.397, lng: 150.644 },
                zoom: 8,
            });

            // Request permission from the user to access their location
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;

                    // Set the input values to the GPS data
                    document.getElementById("latitude").value = latitude;
                    document.getElementById("longitude").value = longitude;

                    // Reverse geocode the GPS data to get the country and city information
                    var geocoder = new google.maps.Geocoder();
                    var latlng = { lat: latitude, lng: longitude };
                    geocoder.geocode({ location: latlng }, function (results, status) {
                        if (status === 'OK') {
                            if (results[0]) {
                                var addressComponents = results[0].address_components;
                                for (var i = 0; i < addressComponents.length; i++) {
                                    var component = addressComponents[i];
                                    if (component.types.includes('country')) {
                                        document.getElementById("country").value = component.long_name;
                                    }
                                    if (component.types.includes('locality')) {
                                        document.getElementById("city").value = component.long_name;
                                    }
                                }
                            }
                        }
                    });
                });
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }
    </script>
     <h3> Or</h3>
    <br>
<fieldset>
  <form action="sendSMS.php" method="POST">
    <div>
                <input type="text" name="phoneNumber" required>
                <span> Phone Number</span><br>
</div>
<div>
                <input type="text" name="message" required>
                <span> Message</span>
</div>
           <button  > <a  class="btn ">Send "SMS" Message </a> </button>
</form>
</fieldset>
        </div>
<!--
        <div class="profession-container ">
            <div class="profession-box ">
                <div class="profession " style="--i:0; ">
                    <i class='bx bx-code-alt'></i>
                    <h3>Assurant</h3>
                </div>
                <div class="profession " style="--i:1; ">
                    <i class='bx bx-camera'></i>
                    <h3>Expert</h3>
                </div>
                <div class="profession " style="--i:2; ">
                    <i class='bx bx-palette'></i>
                    <h3>Mecanicien</h3>
                </div>
                <div class="circle "></div>
            </div>

            <div class="overlay "></div>
        </div>
    -->
        <!-- <div class="home-img ">
            <img src="photo.jpg" alt=" ">
            </div>-->
    </section>

</body>

</html>