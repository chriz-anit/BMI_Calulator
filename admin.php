<html> 
    <head>
        <link rel="stylesheet" href="style.css?version=3">
        <title>BMI Calculator</title>
        <link rel="icon" href="icon.jpg" type="image/icon type">
    </head>
    <script>   
        function calculate(h,w,bmi){
            var col = "#000000";
            tag = "";
            h=h*100;
            height = h.toString();
            weight = w.toString();
            bmi = bmi.toFixed(2);
            bmitext = bmi.toString();

            document.getElementById("result").innerText=bmi;
            document.getElementById("result").style.color = "#000000";
            document.getElementById("tip1").innerText = "Risks";

            if(bmi<16){
                col = "#ff0000";    //red
                tag = "Severe Thinness";
            }
            else if(bmi>=16 && bmi<17){
                col = "#ff9933";    //orange
                tag = "Moderate Thinness";
            }
            else if(bmi>=17 && bmi<18.5){
                col = "#ffcc00";    //yellow
                tag = "Mild Thinness";
            }
            else if(bmi>=18.5 && bmi<25){
                col = "#33cc33";    //green
                tag = "Normal";
                document.getElementById("tip1").innerText = "";
                document.getElementById("tip2").innerText = "KUDOS No Risks\n:)";
            }
            else if(bmi>=25 && bmi<30){
                col = "#ffcc00";    //yellow
                tag = "Overweight";
            }
            else if(bmi>=30 && bmi<35){
                col = "#ff9933";    //orange
                tag = "Obese Class I";
            }
            else if(bmi>=35 && bmi<40){
                col = "#ff0000";    //red
                tag = "Obese Class II"
            }
            else if(bmi>=40){
                col = "#b30000";    //brown
                tag = "Obese Class III";
            }
            document.getElementById("res_tag").innerText = tag;
            document.getElementById("res_tag").style.color = col;
        }
        function generatePDF(){
            name = window.prompt("Enter full name: ");
            document.cookie = 'username='+name+';path=pdf.html;';
            document.cookie = 'height='+height+';path=pdf.html;';
            document.cookie = 'weight='+weight+';path=pdf.html;';
            document.cookie = 'bmi='+bmitext+';path=pdf.html;';
            document.cookie = 'bmiclass='+tag+';path=pdf.html;';
            var mywindow = window.open("pdf.html", "PRINT", "height=600,width=600");
            mywindow.print();
            return true;  
        }
    </script>
    <body>
        <div class="container">
            <h1>BMI</h1> 
            <h3 id="result"></h3>
            <h3 id="res_tag"></h3>
            <table>
                <tr>
                    <th>Category</th>
                    <th>BMI range</th>
                </tr>
                <tr style="background-color:#ff0000">
                    <td>Severe Thinness</td>
                    <td>&lt; 16</td>
                </tr>
                <tr style="background-color:#ff9933">
                    <td>Moderate Thinness</td>
                    <td>16 - 17</td>
                </tr>
                <tr style="background-color:#ffcc00">
                    <td>Mild Thinness</td>
                    <td>17 - 18.5</td>
                </tr>
                <tr style="background-color:#33cc33">
                    <td>Normal</td>
                    <td>18.5 - 25</td>
                </tr>
                <tr style="background-color:#ffcc00">
                    <td>Overweight</td>
                    <td>25 - 30</td>
                </tr>
                <tr style="background-color:#ff9933">
                    <td>Obese Class I</td>
                    <td>30 - 35</td>
                </tr>
                <tr style="background-color:#ff0000">
                    <td>Obese Class II</td>
                    <td>35 - 40</td>
                </tr>
                <tr style="background-color:#b30000">
                    <td>Obese Class III</td>
                    <td>&gt; 40</td>
                </tr>
            </table>
        </div>
        <div class="description">
            <h3 id="tip1"></h3>
            <h1 id="tip2"></h1>
            <?php 
                  $h = $_POST['height'];
                  $w = $_POST['weight'];
                  $h = $h/100;
                  $bmi = $w/($h*$h);
                  echo "<script>calculate($h,$w,$bmi);</script>";
                  // Insert record
                  $con = new mysqli("localhost","root","","bmi");

                  // Check connection
                  if ($con -> connect_errno) {
                  echo "Failed to connect to MySQL: " . $con -> connect_error;
                  exit();
                  }

                  // Perform query
                  if ($result = $con -> query("SELECT risk FROM risks WHERE $bmi>=min AND $bmi<max")) {
                     if (mysqli_num_rows($result) > 0) {
                        while($rowData = mysqli_fetch_array($result)){
                             echo '&#x2022; '.$rowData["risk"].'<br>';
                        }
                     }
                  }
            ?> 
        </div>
        <div class="download">
            <button onclick="generatePDF()">Generate Report</button>
        </div>
    </body>
    
</html>