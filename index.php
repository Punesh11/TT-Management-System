<?php
if (isset($_GET['generated']) && $_GET['generated'] == "false") {
    unset($_GET['generated']);
    echo '<script>alert("Timetable not generated yet!!");</script>';
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>TimeTable Management System</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
     <!-- icons link -->
     <link href="assets/css/all.css" rel="stylesheet"/>
    <link href="assets/css/all.min.css" rel="stylesheet"/>
    <!-- FONT AWESOME CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet"/>
    <!-- FLEXSLIDER CSS -->
    <link href="assets/css/flexslider.css" rel="stylesheet"/>
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet"/>
    <!-- Google	Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'/>

</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg mb-0">
        <img class="ml-0" src="assets/img/logo.jpeg" alt="" height="60px">
        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="p-1 mr-0"><img src="assets/img/toggle button.png" height="40px"></span>
        </button>
        <div class="container">
        <div align="center">
            <h3 align="center" id="title">TIME TABLE MANAGEMENT SYSTEM</h3>
        </div>
    </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mr-5 mb-3">
                 <button class="btn btn-danger" ><a class="nav-link  " href="#teacherBtn">Teachers login </a></button>
                </li>
                <li class="nav-item mr-3 mb-3">
                    <button class="btn btn-success" ><a class="nav-link" href="#adminrBtn">Admin login</a></button>
                </li>
            </ul>
        </div>
</nav>

<!-- bg-img -->

<div class="container-fluid m-0 p-0">
    <div class="bg-img">
    <img class="img w-100 " src="assets/img/slider2.jpg" alt="" height="500vh" >
    </div>
</div>


<script type="text/javascript">
    function genpdf() {
        var doc = new jsPDF();

        doc.addHTML(document.getElementById('TT'), function () {
            doc.save('demo timetable.pdf');
        });
        window.alert("Downloaded!");
    }
</script>
<div align="center" STYLE="margin-top: 30px">
    <button data-scroll-reveal="enter from the bottom after 0.2s"
            id="teacherLoginBtn" class="btn btn-info btn-lg">TEACHER LOGIN
    </button>
    <button data-scroll-reveal="enter from the bottom after 0.2s"
            id="adminLoginBtn" class="btn btn-success btn-lg">ADMIN LOGIN
    </button>
</div>
<br>
<div align="center">
    <form data-scroll-reveal="enter from the bottom after 0.2s" action="studentvalidation.php" method="post">
        <select id="select_semester" name="select_semester" class="list-group-item">
            <option selected disabled>Select Semester</option>
            <option value="3"> B.Tech II Year ( Semester III )</option>
            <option value="4"> B.Tech II Year ( Semester IV )</option>
            <option value="5"> B.Tech III Year ( Semester V )</option>
            <option value="6"> B.Tech III Year ( Semester VI )</option>
            <option value="7"> B.Tech IV Year ( Semester VII )</option>
            <option value="8"> B.Tech IV Year ( Semester VIII )</option>
        </select>
        <button type="submit" class="btn btn-info btn-lg" style="margin-top: 20px; margin-bottom: 50px;">Download</button>
    </form>
</div>
<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times</span>
            <h2 id="popupHead">Modal Header</h2>
        </div>
        <div class="modal-body" id="LoginType">
            <!--Admin Login Form-->
            <div style="display:none" id="adminForm">
                <form action="adminFormvalidation.php" method="POST">
                    <div class="form-group">
                        <label for="adminname">Username</label>
                        <input type="text" class="form-control" id="adminname" name="UN" placeholder="Username ...">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="PASS"
                               placeholder="Password ...">
                    </div>
                    <div align="right">
                        <input type="submit" class="btn btn-default" name="LOGIN" value="LOGIN">
                    </div>
                </form>
            </div>
        </div>
        <!--Faculty Login Form-->
        <div style="display:none" id="facultyForm">
            <form action="facultyformvalidation.php" method="POST" style="overflow: hidden">
                <div class="form-group">
                    <label for="facultyno">Faculty No.</label>
                    <input type="text" class="form-control" id="facultyno" name="FN" placeholder="Faculty No. ...">
                </div>
                <div align="right">
                    <button type="submit" class="btn btn-default" name="LOGIN">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var teacherLoginBtn = document.getElementById("teacherLoginBtn");
    var adminLoginBtn = document.getElementById("adminLoginBtn");
    var heading = document.getElementById("popupHead");
    var facultyForm = document.getElementById("facultyForm");
    var adminForm = document.getElementById("adminForm");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    adminLoginBtn.onclick = function () {
        modal.style.display = "block";
        heading.innerHTML = "Admin Login";
        adminForm.style.display = "block";
        facultyForm.style.display = "none";

    }
    teacherLoginBtn.onclick = function () {
        modal.style.display = "block";
        heading.innerHTML = "Faculty Login";
        facultyForm.style.display = "block";
        adminForm.style.display = "none";


    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
        adminForm.style.display = "none";
        facultyForm.style.display = "none";

    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<!--HOME SECTION END-->
<!--HOME SECTION TAG LINE END-->

<div id="faculty-sec">
    <div class="container set-pad">
        <div class="row text-center">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                <h1 data-scroll-reveal="enter from the bottom after 0.1s" class="header-line">OUR FACULTY </h1>

            </div>

        </div>
        <!--/.HEADER LINE END-->

        <div class="row">


            <div class="col-lg-4  col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.4s">
                <div class="faculty-div">
                    <img src="assets/img/profile1.jpg" class="img-rounded"/>
                    <h3 align="center">Prof. P 47</h3>
                    <hr/>
                    <h4 align="center">Dean<br/>F/o Engineering & Technology</h4>

                </div>
            </div>
            <div class="col-lg-4  col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.5s">
                <div class="faculty-div">
                    <img src="assets/img/profile1.jpg" class="img-rounded"/>
                    <h3 align="center">PROF. P 55</h3>
                    <hr/>
                    <h4 align="center">Principal<br/> IT </h4>

                </div>
            </div>
            <div class="col-lg-4  col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.5s">
                <div class="faculty-div">
                    <img src="assets/img/profile2.jpg" class="img-rounded"/>
                    <h3 align="center">PROF. K 09</h3>
                    <hr/>
                    <h4 align="center">Principal<br/> ZHCET</h4>

                </div>
            </div>
            <div class="col-lg-4  col-md-4 col-sm-4" data-scroll-reveal="enter from the bottom after 0.5s">
                <div class="faculty-div">
                    <img src="assets/img/profile2.jpg" class="img-rounded"/>
                    <h3 align="center">PROF.M 13</h3>
                    <hr/>
                    <h4 align="center">Chairman<br/>Computer Engineering Department</h4>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- footer start -->
<div id="footer">
        <div class="footer">
            <div class="container-fluid bg-light">
                <div class="row mt-1 pt-2">
                    <!-- logo -->
                    <div class="col-sm-7 pt-4 pb-4 ">
                        <div class="container">
                            <div class="xyz" id="logo-img">
                                <img src="assets/img/updatedlogo.png" alt="" height="100px">
                            </div>
                        </div>
                    </div>
                    <!-- Contact Details -->
                    <div class="col-lg-4 pt-3 mt-4 " id="contact" align="left" >
                        <div class="BlockContents" style="color:black ;">
                            <h4>
                                <strong>Contact Us</strong>
                            </h4>
                            <p>
                                Amar Nagar Road, Pune
                                &nbsp;
                                <br>
                                Maharahstra, India
                            </p>
                                <a href="tel:07022514395" style="color:black ;" >
                                    Phone: +91 70225 14395</a>
                                <br>
                                <a href="mailto:softwaresquare@rediffmail.com" style="color:black ;">
                                    Mail : abc@rediffmail.com</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center text-lg-start bg-dark text-muted">
            <!-- Section: Social media -->
            <div class="d-flex justify-content-center justify-content-lg p-4 border-bottom text-center">
                <div class="icon">
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-facebook-f"></i>
                    </a>&nbsp;&nbsp;
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-twitter"></i>
                    </a>&nbsp;&nbsp;
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-google"></i>
                    </a>&nbsp;&nbsp;
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-instagram"></i>
                    </a>&nbsp;&nbsp;
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-linkedin"></i>
                    </a>&nbsp;&nbsp;
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </div>


            <!-- Copyright -->
            <div class="text-center p-4" style="color: white;">
                Copyright © 2021. All Rights Reserved | Developed by &nbsp;abc
                    
            </div>
        </div>

</div>
<!-- FOOTER SECTION END-->


<!-- bootstrap js cdn-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!--  Jquery Core Script -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!--  Core Bootstrap Script -->
<script src="assets/js/bootstrap.js"></script>
<!--  Flexslider Scripts -->
<script src="assets/js/jquery.flexslider.js"></script>
<!--  Scrolling Reveal Script -->
<script src="assets/js/scrollReveal.js"></script>
<!--  Scroll Scripts -->
<script src="assets/js/jquery.easing.min.js"></script>
<!--  Custom Scripts -->
<script src="assets/js/custom.js"></script>
</div>
</body>
</html>
