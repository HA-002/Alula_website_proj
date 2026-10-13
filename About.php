<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>About AlUla</title>
  <link rel="stylesheet" href="styles.css" />
  <style>
    
    .about-section {
  padding: 3rem 1rem;
  background-color: #f9f9f9;
      
}

.container {
  max-width: 1000px;
  margin: 0 auto;
  
}

.about-box {
  background-color: #fff;
  border-left: 4px solid #c2b280;
  margin-bottom: 2rem;
  padding: 1.5rem;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
  border-radius: 6px;
}

.about-box h2 {
  margin-bottom: 0.5rem;
  color: #333;
}

.about-box p {
  color: #555;
  line-height: 1.6;
}

.hero.about-hero {
  background: url('https://img.freepik.com/premium-photo/maraya-alula-saudi-arabia-mirrored-building-middle-desert_1199132-23875.jpg') no-repeat center center/cover;
  position: relative;
  height: 300px;
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
}

.hero .overlay {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background-color: rgba(0,0,0,0.5);
}

.hero-content {
  position: relative;
  z-index: 1;
}

.title {
  font-size: 2.5rem;
  margin: 0;
}

.subtitle {
  font-size: 1.2rem;
  margin-bottom: 0.5rem;
  color: #f1f1f1;
}
  </style>
</head>
<body>
  <!-- Header -->
  <header class="header">
    <div class="logo">AlUla</div>
    <nav class="nav">
      <a href="index.php">Home</a>
      <a href="about.php">About AlUla</a>
      <a href="events.php">Events</a>
      <a href="activities.php">Activities</a>
      <a href="contact.php">Contact Us</a>
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="hero about-hero">
    <div class="overlay"></div>
    <div class="hero-content">
      <p class="subtitle">Learn More About Our Purpose</p>
      <h1 class="title">About Discover AlUla</h1>
    </div>
  </section>

  <!-- About Content -->
  <section class="about-section">
    <div class="container">

      <div class="about-box">
        <h2>Who We Are</h2>
        <p>
          We are a group of IT students who created the Discover AlUla website as a project to highlight the city’s rich culture and natural beauty through a modern digital platform. Our goal is to make reliable information accessible and help both locals and tourists explore AlUla easily.
        </p>
      </div>

      <div class="about-box">
        <h2>Local Impact</h2>
        <p>
          Web systems can make citizens’ lives easier by facilitating online platforms.
          Our website supports this by offering clear, trusted information to residents across Saudi Arabia, encouraging domestic tourism and making it easier for people to discover AlUla.
        </p>
      </div>

      <div class="about-box">
        <h2>Global Impact</h2>
        <p>
          Over the internet, web systems and services are available for every subject, containing detailed information about that and facilitating human life significantly.
          Discover AlUla connects global users to the city’s heritage, promoting cultural understanding and inspiring international tourism through accessible digital content.
        </p>
      </div>

      <div class="about-box">
        <h2>Our Vision</h2>
        <p>
          We aim for Discover AlUla to be a leading platform that reflects the spirit of the city and supports Vision 2030 by boosting tourism, embracing digital transformation, and sharing AlUla’s heritage locally and globally.
        </p>
      </div>

    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>© 2025 AlUla, All Rights Reserved.</p>
  </footer>
</body>
</html>