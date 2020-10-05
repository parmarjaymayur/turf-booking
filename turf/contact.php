<!DOCTYPE html>
<html> 
<head>
  <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="https://www.google.co.in/maps/place/Matunga+(W,+Joshi+Vadi,+Matunga+West,+Mumbai,+Maharashtra+400016/@19.0297991,72.8409587,17z/data=!3m1!4b1!4m5!3m4!1s0x3be7ced17c400001:0x79b653392188cef!8m2!3d19.0297991!4d72.8431474" rel="stylesheet">
    <script type="text/javascript"src="https://cdn.jsdelivr.net/npm/emailjs-com@2/dist/email.min.js"></script>
    <script type="text/javascript">
      (function() {
      emailjs.init("user_wh0y1MXJwXQz8hRUsOM8M");
      })();
    </script>
    <script type="text/javascript">
        function mailit() {
            document.getElementById('contact-form').addEventListener('submit', function(event) {
                event.preventDefault();
                // generate a five digit number for the contact_number variable
                this.contact_number.value = Math.random() * 100000 | 0;
                if(emailjs.sendForm('contact_service', 'contact_form', this)){
                  if(confirm('Message is sent thank you for sending message')){
                    window.location.reload();  
                  }
                } else {
                  if(confirm('Message is not sent pls try again')){
                    window.location.reload();  
                  }
                }
            });
        }
    </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">JayParmar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
      <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           <a class="dropdown-item" href="turfservices.php">Turf Services</a>
            <a class="dropdown-item" href="sandsoil.php">Sand Soil and Mulch</a>
            
            <a class="dropdown-item" href="artificial.php">Artificial Grass</a>
           
         </div>
       </li>
      <li class="nav-item">
        <a class="nav-link" href="booking.php">Booking</a>
      </li>
      
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<section class="breadcrumbs-section">
      <div class="container p-1 p-sm-3">
        <div class="row">
          <div class="col-12">
          <h2>Contact Us</h2>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Contact Us</li>
          </ol>

          </div> 
        </div>
      </div>
   
    </section>

<section>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <p>We are always here to help.If you have any requirements or queries about our services then please fill up the contact form below and we'll do our best to reply within 24 hours Alternatively simply pick up the phone and give us a call.</p>
        <hr/>
      </div>
    </div>
  </div>
</section>


<section class="form-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <form class="needs-validation" novalidate id="contact-form" >
          <input type="hidden" name="contact_number">
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationCustom01">Your Name</label>
              <input type="text" name="uname" class="form-control" id="validationCustom01" required/>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationCustom03">Email</label>
              <input type="Email" name="email" class="form-control" id="validationCustom03" required/>
              <div class="invalid-feedback">
                Please provide a valid email address.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="validationCustom04">Phone Number</label>
              <input type="Number" name="unum" class="form-control" id="validationCustom04" required/>
              <div class="invalid-feedback">
                Number need to be at least 10 digit.
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12 mb-3">
              <label for="validationCustom05">Message</label>
              <textarea id="validationCustom05" name="msg" class="form-control" rows="5" required></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
              <label class="form-check-label" for="invalidCheck">
                Agree to terms and conditions
              </label>
              <div class="invalid-feedback">
                You must agree before submitting.
              </div>
            </div>
          </div>
          <button class="btn btn-primary mb-4" type="submit" >Submit form</button>
      </form>
    </div>
              
        
      <div class="col-md-6 address align-self-center">
        <h5>Call Us/ WhatsApp</h5>
        <p><a href="tel:+919821306410">+(91)9137191606</a><br></p>
        <h5>Email</h5>
        <p>
          <a href="#">ilap620@gmail.com</a>
        </p>
        <h5>Working Hours</h5>
        <p>
          Mon-Sun : 6am - 12pm(IST)
        </p>
        <h5>Address</h5>
        <p>
          xyz estate, Royal PAlm, station,west-mumbai-400016,Maharashtra
        </p>
        
      </div>
    </div>
  </div>

  
  </section>


  <section>
    <div class="container-fluid">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d241317.11609980912!2d72.74109852485876!3d19.0821978385003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c6306644edc1%3A0x5da4ed8f8d648c69!2sMumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1601455447455!5m2!1sen!2sin"
      width="100%" height="400px" frameborder="0" style="border:0"></iframe>
    </div>
  </section>












<footer class="full-footer">
    <div class="container">
      <div class="row text-white">
        <div class="col-md-3 p-3">
          <h3 >@Jay Parmar</h3>
        </div>
    <div class="col-md-3">
      <h3>Important Links</h3>
      <a href="#" class="text-white">Privacy Policy</a><br>
      <a href="#"class="text-white">Youtube channel links</a><br>
      <a href="#"class="text-white">Blog Articles</a><br>
      <a href="#"class="text-white">Social media</a><br>
    </div>
    <div class="col-md-3">
      <h3>Our Services</h3>
      <a href="#"class="text-white">Turf Services</a><br>
      <a href="#"class="text-white">Sand,Soil and Mulch</a><br>
      <a href="#"class="text-white">Artificial Grass</a><br>
      
    </div>
    <div class="col-md-3">
      <h3>Contact Us</h3>
      <a href="#" class="text-white">+91 9137191606 </a><br>
      <a href="#" class="text-white">ilap620@gmail.com</a><br>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d241317.11609980912!2d72.74109852485876!3d19.0821978385003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c6306644edc1%3A0x5da4ed8f8d648c69!2sMumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1601455447455!5m2!1sen!2sin"></iframe>
    </div>
  </div>
</div>
</footer>


</body>
</html>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
          mailit();
        }, false);
      });
    }, false);
  })();
  </script>
</body>
</html>
<header>