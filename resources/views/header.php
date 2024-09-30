.transparent-header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background-color: grey; /* Warna latar belakang putih dengan transparansi */
    padding: 20px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: space-between; /* Memastikan logo dan menu terpisah */
    z-index: 1000; /* Agar tetap di atas konten lain */
}

.logo {
    width: 200px;
    margin-left: 40px;
    margin-top: 40px;
}

nav h6 {
    margin: 0 20px; /* Jarak antar elemen menu */
}

nav a {
    text-decoration: none; /* Menghapus garis bawah dari tautan */
    color: #333; /* Warna teks */
    transition: color 0.3s; /* Efek transisi untuk hover */
}

nav a:hover {
    color: #007BFF; /* Warna saat hover */
}

.content {
    padding-top: 50px; /* Jarak agar konten tidak tertutup header */
}

<header class="transparent-header">
        <a href="">
            <img src="foto/kasic.png" alt="Foto" class="logo">
        </a>
        <nav>
            <h6><a href="#about" class="about-contact1">ABOUT</a></h6>
            <h6><a href="#contact" class="about-contact2">CONTACT</a></h6>
        </nav>
    </header>