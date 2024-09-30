<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <style>
        .floating {
            float: right;
            margin-top: 50px; /* Jarak dari atas */
            margin: 50px;
            width: 400px;
            border-color: white;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translatey(0); }
            50% { transform: translatey(-20px); }
            100% { transform: translatey(0); }
        }
        .top-right {
            position: absolute;
            color: white;
            text-decoration: none;
            top: 320px; /* Jarak dari atas */
            margin-left: 40px;
            border-radius: 60px; /* Jarak dari kanan */
            background-color: #007BFF; 
            padding: 10px 20px;
        }
        .silahkan {
            position: absolute;
            size: 40px;
            color: GREY;
            top: 370px; /* Jarak dari atas */
            margin-left: 40px;
        }
        .top-right2 {
            position: absolute;
            top: 320px; /* Jarak dari atas */
            margin-left: 118px; /* Jarak dari kanan */
        }
        .top-right3 {
            position: absolute;
            top: 320px; /* Jarak dari atas */
            margin-left: 220px; /* Jarak dari kanan */
        }
        .custom-font {
            font-family: 'Arial', sans-serif; /* Ganti dengan font yang diinginkan */
            font-size: 18px; /* Ukuran font */
            font-weight: bold; /* Ketebalan font */
            color: white; /* Warna teks */
        }
        .about-contact1 {
            position: absolute;
            top: 60px; /* Jarak dari atas */
            right: 130px; /* Jarak dari kanan */
            color: white; /* Warna teks */

        }
        .about-contact2 {
            position: absolute;
            top: 60px; /* Jarak dari atas */
            right: 230px; /* Jarak dari kanan */
            color: white; 
        }
        .content {
            margin-top: 1500px;
            margin: 200px; /* Margin untuk konten */
            padding: 100px; /* Padding untuk konten */
            background-color: #CD853F; /*rgba(255, 255, 255, 0.1); Latar belakang transparan */
            border-radius: 10px; /* Sudut membulat */
        }
        .h2 {
            font-family: 'Arial', sans-serif;
            margin: 0; /* Menghilangkan margin untuk menyatukan dengan konten */
            padding-bottom: 30px;
            padding-top: 30px;
            padding-left: 30px; /* Padding bawah untuk jarak dengan paragraf */
            font-size: 47px; /* Ukuran font h2 */
        }
        .contact {
            margin-top: 10px;
            margin: 20px; /* Margin untuk konten */
            padding: 50px;
            border: 1px solid #ddd;
            border-radius: 5px;/* Padding untuk konten */
        }

    .contact-section {
    background-color: #fff;
    padding: 20px;
    margin: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.contact-section h2 {
    text-align: center;
    color: #black;
}

.contact-options {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.contact-item {
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.contact-item h3 {
    margin: 0;
    color: #grey;
}

.contact-item p {
    margin: 5px 0;
}

.contact-item a {
    text-decoration: none;
    color: #grey;
}

.contact-item a:hover {
    text-decoration: underline;
}


.whatsapp-logo {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 40px; /* Atur ukuran sesuai kebutuhan */
    height: auto;
    z-index: 1000; /* Agar tetap di atas konten lain */
}

.whatsapp-logo img {
    width: 100%;
    height: auto;
}
.footer {
    background-color: grey;
    color: grey;
    padding: 30px ;
    text-align: center;
    right: 20px;
}

.footer-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}

.footer-links {
    list-style: none;
    padding: 0;
}

.footer-links li {
    display: inline;
    margin: 0 10px;
}

.footer-links a {
    color: grey;
    text-decoration: none;
}

.footer-links a:hover {
    text-decoration: underline;
}
    </style>
    <title>Aplikasi Kasir</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/kasir5.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="h-100" style="background-image: url('aw.jpeg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div>
    <a href="">
        <img src="foto/kasic.png" alt="Foto" style="margin-left: 40px; margin-top: 40px;" width="200">
    </a>
      <h6>
        <a href="#about" class="about-contact2">ABOUT</a>
      </h6>
      <h6>
        <a href="#contact" class="about-contact1">CONTACT</a>
      </h6>
       <img src="foto/10.png" alt="Foto" class="floating">
 </div>
    <div class="col-12">
        <a href="/logincustomer" class="top-right">Sign In</a>
        <p class="silahkan">* Sign In for customer</p>
    </div>
    <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                      <div style="text-align: left;">
                       <h1 class="text-white" style="margin-left: 20px; margin-top: 50px; margin-bottom: 50px;">Hallo Mr/Mrs.</h1>
                       <h3 class="text-white" style="margin-left: 20px; margin-top: 20px; margin-buttom: 50px;">Welcome...</h3>
                       <p class="custom-font" style="margin-left: 20px; margin-top: 20px;">Welcome! We are very happy to share quality time with
                         you and make memories today!. Welcome to our cashier application, here we provide
                          some quality products, please log in for further information.</p>
                    </div>
                </div>
              </div>

                <a href="https://wa.me/6281297535513" class="whatsapp-logo" target="_blank">
                    <img src="/foto/was.png" alt="WhatsApp Logo">
                </a>


    <div id="about" class="content">
        <h1 class="h2">Welcome What's this all about?</h1>
        <p>This is the first project for all of us when we were working at PT Grage Multimedia Teknologi (GMT).</p>
        <p>This is a cashier application which makes it easier to manage a shop that you own.</p>
        <p>This application was created together with the Smkn 1 Talaga street vendor team.</p>
    </div>
    <tr>
    <div class="contact" >
        <h1>Who's behind this?</h1>
        <h6>We're a team of creators building on the web full-time. You might have seen our work:</h6>
        <center><img src="/foto/qa.png" alt=""></center>
    </div>
    </tr>
    <section id="contact"  class="contact-section">
        <h2>Contact</h2>
        <div class="contact-options">
            <div class="contact-item">
                <h3>Email</h3>
                <p><a href="mailto:gianadiramdan@gmail.com">gianadiramdan@gmail.com</a></p>
            </div>
            
            <div class="contact-item">
                <h3>Telepon</h3>
                <p>
                    <a href="https://wa.me/6281297535513">Hubungi Kami di WhatsApp</a>
                </p>
            </div>
            <div class="contact-item">
                <h3>Media Sosial</h3>
                <p>
                    <a href="#">Facebook</a> |
                    <a href="#">Twitter</a> |
                    <a href="https://www.instagram.com/giandrlll">Instagram</a>
                </p>
            </div>
        </div>
    </section>
    <div class="footer">
     <div class="footer-content">
       <p>Copyright &copy; Designed & Developed By <a href="#">Kasir</a> 2018</p>
       <ul class="footer-links">
            <li><a href="#about">Tentang Kami</a></li>
            <li><a href="#">Kebijakan Privasi</a></li>
            <li><a href="#contact">Kontak</a></li>
        </ul>
     </div>
    </div>

</section>
    <script src="/assets/plugins/common/common.min.js"></script>
    <script src="/assets/js/custom.min.js"></script>
    <script src="/assets/js/settings.js"></script>
    <script src="/assets/js/gleek.js"></script>
    <script src="/assets/js/styleSwitcher.js"></script>

</body>

</html>
