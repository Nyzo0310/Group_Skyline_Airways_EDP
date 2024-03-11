<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Skyline - Offers</title>
  <link rel="icon" href="/assets/images/favicon.jpg">
</head>
<style>
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.container {
  max-width: 800px;
  margin: 20px auto;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Header styles */
h1 {
  margin-bottom: 20px;
  text-align: center;
  font-size: 36px;
  color: #fff;
  background: linear-gradient(45deg, #007bff, #00ffcc);
  padding: 20px 40px;
  border-radius: 50px;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
  text-transform: uppercase;
  letter-spacing: 2px;
  position: relative;
}

/* Header pseudo-elements for decorative elements */
.header::before,
.header::after {
  content: '';
  position: absolute;
  top: -10px;
  width: 100%;
  height: 20px;
  background: radial-gradient(circle, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.6) 50%, rgba(255, 255, 255, 0) 100%);
}

.header::before {
  left: 0;
  transform: skewY(-20deg);
}

.header::after {
  right: 0;
  transform: skewY(20deg);
}


.offers-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  grid-gap: 20px;
}

.offer {
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  transition: transform 0.3s ease;
}

.offer:hover {
  transform: translateY(-5px);
}

.offer-content {
  padding: 20px;
}

.offer h2 {
  margin-top: 0;
  color: #333;
}

.offer p {
  margin: 10px 0;
  color: #666;
}

.offer button {
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.offer button:hover {
  background-color: green;
}

.offer-content img {
  width: 300px; /* Fixed width */
  height: 200px; /* Fixed height */
}

.back-button {
  display: block;
  margin-top: 20px;
  text-decoration: none;
  color: #fff;
  background-color: #007bff;
  padding: 10px 20px;
  border-radius: 5px;
  text-align: center;
  width: fit-content;
}

.back-button:hover {
  background-color: green;
}

</style>
<body>

  <div class="container">
    <h1>Current Offers</h1>
    <div id="offers" class="offers-container"></div>
    <a href="/mainmenu.php" class="back-button">Back to Dashboard</a>
  </div>

  <script>

document.addEventListener("DOMContentLoaded", function() {
  const offersContainer = document.getElementById("offers");

  const offers = [
    { 
      title: "Scuba Diving in Tubbataha Reef",
      description: "Explore one of the world's best diving spots at Tubbataha Reef, home to an abundance of marine life and vibrant coral reefs.",
      price: "₱3,500",
      image: "/assets/images/OFFER 1.jpg"
    },
    {
      title: "Adventure Trek in Banaue Rice Terraces",
      description: "Embark on an adventure trek through the stunning Banaue Rice Terraces, a UNESCO World Heritage Site known for its breathtaking landscapes.",
      price: "₱2,000",
      image: "/assets/images/OFFER 2.jpg"
    },
    {
      title: "Cultural Tour of Vigan City",
      description: "Discover the rich history and colonial charm of Vigan City, exploring its well-preserved heritage sites and cobblestone streets.",
      price: "₱4,000",
      image: "/assets/images/OFFER 3.jpg"
    },
    {
      title: "Explore Chocolate Hills in Bohol",
      description: "Witness the unique geological formations of Chocolate Hills in Bohol, a natural wonder that leaves visitors in awe.",
      price: "₱3,000",
      image: "/assets/images/OFFER 4.jpg"
    },
    {
      title: "Relaxing Retreat in Camiguin Island",
      description: "Escape to the serene beauty of Camiguin Island, where you can unwind on pristine beaches and rejuvenate in natural hot springs.",
      price: "₱5,000",
      image: "/assets/images/OFFER 5.jpg"
    },
    {
      title: "Culinary Tour of Pampanga",
      description: "Indulge in a culinary adventure in Pampanga, known as the 'Culinary Capital of the Philippines', and savor delicious local delicacies.",
      price: "₱2,300",
      image: "/assets/images/OFFER 6.jpg"
    },
    {
      title: "Surfing Lessons in Baler",
      description: "Learn to ride the waves in Baler, Aurora Province, a popular surfing destination with consistent swells and laid-back vibes.",
      price: "₱4,500",
      image: "/assets/images/OFFER 7.jpg"
    },
    {
      title: "Religious Pilgrimage to Quiapo Church",
      description: "Experience a spiritual journey at Quiapo Church, one of the most famous churches in Manila, known for its Black Nazarene statue.",
      price: "₱2,500",
      image: "/assets/images/OFFER 8.jpg"
      
    }
  ];

   // Display offers
   offers.forEach(offer => {
    const offerDiv = document.createElement("div");
    offerDiv.classList.add("offer");
    offerDiv.innerHTML = `
      <div class="offer-content">
        <h2>${offer.title}</h2>
        <img src="${offer.image}" alt="${offer.title}" style="width: 100%;">
        <p>${offer.description}</p>
        <p><strong>${offer.price}</strong></p>
        <button>Book Now</button>
      </div>
    `;
    offersContainer.appendChild(offerDiv);
  });
});

  </script>
</body>
</html>
