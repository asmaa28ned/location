<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<table width="100%" style="background-color: #0066ff;color: white;">
 <tr width="75%">
  <td>
   <h2>Welcome to FANS Expert </h2>
  </td>
  <td width="15%">
   <i class="fa fa-bell" aria-hidden="true" id="noti_number"></i>
   <button><a href="http://localhost/test/indexmessg.php"> See your messages </a></button>
  </td>
 </tr>
</table>
<script type="text/javascript">
 function loadDoc() {
  

  setInterval(function(){

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("noti_number").innerHTML = this.responseText;
    }
   };
   xhttp.open("GET", "datae.php", true);
   xhttp.send();

  },1000);


 }
 loadDoc();
</script>
