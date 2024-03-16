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

  // Fix logo position on scroll
  window.addEventListener('scroll', function() {
    const header = document.querySelector('header');
    const scrollPosition = window.scrollY;

    if (scrollPosition > 0) {
      header.classList.add('fixed');
    } else {
      header.classList.remove('fixed');
    }
  });

  