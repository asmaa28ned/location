<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body style="margin: 55px;">
  <div class="contrainer my-5">
    <h1>List of Notifications</h1>
    <br>
    <a class="btn btn-primary"  onclick='openAndFocusNewPage()'>Go to Map</a>
    <br>

    <table class="table" id="mytable">
        <thead>
            <tr>

                        <th> Latitude </th>
                        <th> Longitude</th>
                       

            </tr>
        </thead>

        <tbody>

        <?php
        $servername ="localhost";
        $username ="root";
        $password = "";
        $dbname = "tpin";
        $conn = mysqli_connect($servername,$username,$password,$dbname);
       
        
        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        $sql="SELECT * FROM notif";
        $result=$conn->query($sql);

        if(!$result){
            die("Innvalide query: " . $conn->error);
        }

        //read data of each row
        while($row=$result->fetch_assoc()){
            echo" <tr>

            <td> ".$row["messag"]." </td>
            <td> ".$row["message"]." </td>
            
                           
                            <td>  
                                <a class='btn btn-primary btn-sm' onclick='copyToClipboard(event)'>Copy</a>
                                <a class='btn btn-info btn-sm' href='/test/index.php'>Sent the location to Expert</a>
                                <a class='btn btn-info btn-sm' href='/test/indexm.php'>Sent the location to Mecanicien</a>
    
                            </td>
            </tr>";

        }

     
        ?>
        <script>

   function copyToClipboard(event) {
   
            const table = document.getElementById('mytable');
            const row = event.target.closest('tr');

            const cell1 = row.cells[0];
            const cell2 = row.cells[1];

            const content = cell1.textContent + ',' + cell2.textContent;

            const textarea = document.createElement('textarea');
            textarea.value = content;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);

        
        }

           /* function copyToClipboard() {
       // var input1 = document.getElementById('latitude');
      //  var input2 = document.getElementById('longitude');
     //   var text = input1.value + ' , ' + input2.value;
        var text = latitude + ',' + longitude;
    navigator.clipboard.writeText(text)
        .then(() => {
            console.log('Text copied to clipboard');
        })
        .catch((error) => {
            console.error('Failed to copy text to clipboard: ', error);
        });
     /*   var copyInput = document.createElement('input');
        copyInput.value = text;
        document.body.appendChild(copyInput);
        copyInput.select();
        document.execCommand('copy');
        document.body.removeChild(copyInput);*/
    //}

    function openAndFocusNewPage() {
    var newWindow = window.open('https://www.google.com/maps');
    newWindow.focus();
}
    </script>
        </tbody>
    </table>
  </div>
    
</body>
</html>