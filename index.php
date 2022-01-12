<!DOCTYPE html>
<html lang="en">

<body>
    
    <title>QR Project</title>

    <!-- TAILWIND CDN -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- END TAILWIND CDN -->



    <!-- HEADER -->
    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <img src="images/logo2.jpg" width="32" height="32">
                <span class="ml-3 text-xl">E-DRIVING LICENSE AND RC BOOK VERIFICATION SYSTEM USING QR CODE</span>
            </a>
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
                <a href = "http://localhost/sem5/index.php" class="mr-5 hover:text-gray-900">Home</a>
                <a href = "http://localhost/sem5/contact_us.html" class="mr-5 hover:text-gray-900">Contact</a>
                <a href = "http://localhost/sem5/about_project.html" class="mr-5 hover:text-gray-900">About Project</a>
            </nav>
        </div>
    </header>
    <!-- END HEADER -->


    
    <!-- CSS FOR CAMERA PREVIEW -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');
        *{
            font-family: Montserrat, sans-serif;
            color: whitesmoke;
            
        }
        
        body {
            background-color: #fddef388;
            background-image: url(./images/highway.jpg);
            background-size: cover;
        }

        #cam_prev {
            text-align: center;
            padding-top: 20px;
        }

        #preview {
            width: 300px;
            height: 198px;
            margin: auto;
        }

        #personal_data {
            margin: auto;
            width: 90%;
        }

        .flex-container {
            display: flex;
            margin: auto;
            width: 95%;
        }

        .flex-child {
            flex: 1;
            border: 2px solid wheat;
            padding: 2px;
        }

        .flex-child:first-child {
            margin-right: 8px;
            padding: 2px;
        }

        .DATA {
            text-align: center;
        }
    </style>

    <p id="cam_prev">Camera Preview</p>

    <video id="preview"></video>
    <!-- END CSS FOR CAMERA PREVIEW -->


    <!-- JQUERY CDN LINK -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- END JQUERY CDN LINK -->


    <!-- INSTASCAN.JS CDN LINK -->
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript">
        function to_print(content) {
            // to print the "DL number" on web page
            var DLNUMBER = content.substring(content.indexOf("DLNUMBER:") + 9, content.indexOf("VALIDITY TR:")).replace(/\s+/g, "");
            document.getElementById("tag_DLNUM").innerHTML = "DL Number - " + DLNUMBER;

            // to print the "Validity_NT" on web page
            var VALIDITY_NT = content.substring(content.indexOf("VALIDITY NT:") + 12, content.indexOf("NAME:")).replace(/\s+/g, "");
            document.getElementById("tag_VALIDITY_NT").innerHTML = "Validity - " + VALIDITY_NT;

            // to print the "Name" on web page
            var NAME = content.substring(content.indexOf("NAME:") + 5, content.indexOf("S\\W\\D OF:")).replace(/\s+/g, " ");
            document.getElementById("tag_NAME").innerHTML = "Name - " + NAME;

            // to print the "s\w\d of" on web page
            var S_W_D = content.substring(content.indexOf("S\\W\\D OF:") + 9, content.indexOf("IDMARK1:")).replace(/\s+/g, " ");
            document.getElementById("tag_S_W_D").innerHTML = "S\\W\\D OF - " + S_W_D;

            // to print the "ID Mark 1" on web page
            var ID_MARK_1 = content.substring(content.indexOf("IDMARK1:") + 8, content.indexOf("IDMARK2:")).replace(/\s+/g, " ");
            document.getElementById("tag_ID_MARK_1").innerHTML = "ID Mark 1 - " + ID_MARK_1;

            // to print the "ID Mark 2" on web page
            var ID_MARK_2 = content.substring(content.indexOf("IDMARK2:") + 8, content.indexOf("DOB:")).replace(/\s+/g, " ");
            document.getElementById("tag_ID_MARK_2").innerHTML = "ID Mark 2 - " + ID_MARK_2;

            // to print the "DOB" on web page
            var DOB = content.substring(content.indexOf("DOB:") + 4, content.indexOf("ADDRESS:")).replace(/\s+/g, " ");
            document.getElementById("tag_DOB").innerHTML = "DOB - " + DOB;

            // to print the "Address" on web page
            var ADDRESS = content.substring(content.indexOf("ADDRESS:") + 8, content.indexOf("ISSUE AUTH:")).replace(/\s+/g, " ");
            document.getElementById("tag_ADDRESS").innerHTML = "Address - " + ADDRESS;

            // to print the "ISSUE_AUTH" on web page
            var ISSUE_AUTH = content.substring(content.indexOf("ISSUE AUTH:") + 11, content.indexOf("ISSUE DATE:")).replace(/\s+/g, " ");
            document.getElementById("tag_ISSUE_AUTH").innerHTML = "Issue Authority - " + ISSUE_AUTH;

            // to print the "ISSUE_DATE" on web page
            var ISSUE_DATE = content.substring(content.indexOf("ISSUE DATE:") + 11, content.indexOf("PURPOSE:")).replace(/\s+/g, " ");
            document.getElementById("tag_ISSUE_DATE").innerHTML = "Issue Date - " + ISSUE_DATE;

            // to print the "PURPOSE" on web page
            var PURPOSE = content.substring(content.indexOf("PURPOSE:") + 8, content.indexOf("VEHCLASS1:")).replace(/\s+/g, " ");
            document.getElementById("tag_PURPOSE").innerHTML = "Purpose - " + PURPOSE;

            // to print the "VEHCLASS1" on web page
            var VEHCLASS1 = content.substring(content.indexOf("VEHCLASS1:") + 10, content.indexOf("VEHCLASS2:")).replace(/\s+/g, " ");
            document.getElementById("tag_VEHCLASS1").innerHTML = "Veh Class 1 - " + VEHCLASS1;

            // to print the "VEHCLASS2" on web page
            var VEHCLASS2 = content.substring(content.indexOf("VEHCLASS2:") + 10, content.indexOf("VEHCLASS3:")).replace(/\s+/g, " ");
            document.getElementById("tag_VEHCLASS2").innerHTML = "Veh Class 2 - " + VEHCLASS2;

            // to print the "VEHCLASS3" on web page
            var VEHCLASS3 = content.substring(content.indexOf("VEHCLASS3:") + 10, content.indexOf("VEHCLASS4:")).replace(/\s+/g, " ");
            document.getElementById("tag_VEHCLASS3").innerHTML = "Veh Class 3 - " + VEHCLASS3;



            var person = [];
            var person1 = {};
            person1.DLNUMBER = DLNUMBER.trim();
            person1.VALIDITY_NT = VALIDITY_NT.trim();
            person1.NAME = NAME.trim();
            person1.S_W_D = S_W_D.trim();
            person1.ID_MARK_1 = ID_MARK_1.trim();
            person1.ID_MARK_2 = ID_MARK_2.trim();
            person1.DOB = DOB.trim();
            person1.ADDRESS = ADDRESS.trim();
            person1.ISSUE_AUTH = ISSUE_AUTH.trim();
            person1.ISSUE_DATE = ISSUE_DATE.trim();
            person1.PURPOSE = PURPOSE.trim();
            person1.VEHCLASS1 = VEHCLASS1.trim();
            person1.VEHCLASS2 = VEHCLASS2.trim();
            person1.VEHCLASS3 = VEHCLASS3.trim();
            person.push(person1);

            $.ajax({
                url: "back.php",
                method: "post",
                data: {
                    person: JSON.stringify(person)
                },
                success: function(result) {
                   document.getElementById("backend_res").innerHTML = result;
                }
            })

        }

        var scanner = new Instascan.Scanner({
            video: document.getElementById('preview'),
            scanPeriod: 20,
            mirror: false
        });
        scanner.addListener('scan', function(content) {
            to_print(content);
        });
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
                $('[name="options"]').on('change', function() {
                    if ($(this).val() == 1) {
                        if (cameras[0] != "") {
                            scanner.start(cameras[0]);
                        } else {
                            alert('No Front camera found!');
                        }
                    }
                });
            }

        }).catch(function(e) {
            console.error(e);
            alert(e);
        });
    </script>
    <!-- END INSTASCAN.JS CDN LINK -->


    <div class="flex-container">

        <div class="flex-child magenta">
            <p class="DATA"><b>DATA EMBEDDED ON THE QR CODE</b></p><br>
            <p id="tag_DLNUM"></p>
            <p id="tag_VALIDITY_NT"></p>
            <p id="tag_NAME"></p>
            <p id="tag_S_W_D"></p>
            <p id="tag_ID_MARK_1"></p>
            <p id="tag_ID_MARK_2"></p>
            <p id="tag_DOB"></p>
            <p id="tag_ADDRESS"></p>
            <p id="tag_ISSUE_AUTH"></p>
            <p id="tag_ISSUE_DATE"></p>
            <p id="tag_PURPOSE"></p>
            <p id="tag_VEHCLASS2"></p>
            <p id="tag_VEHCLASS1"></p>
            <p id="tag_VEHCLASS3"></p>
        </div>

        <div class="flex-child green">
            <p id="backend_res"></p>
        </div>

    </div>


</body>

</html>