document.addEventListener('DOMContentLoaded', function() {
  const carousel = document.querySelector('.carousel');
  const items = carousel.querySelectorAll('.item');
  const dotsContainer = document.querySelector('.dots');
  const nextBtn = document.querySelector('.next');
  const prevBtn = document.querySelector('.prev');

  let currentSlide = 0;
  const totalSlides = items.length;
  let intervalId;

  function showSlide(index) {
    items.forEach((item, i) => {
      if (i === index) {
        item.classList.add('active');
      } else {
        item.classList.remove('active');
      }
    });
    updateDots(index);
  }

  function updateDots(index) {
    dotsContainer.querySelectorAll('.dot').forEach((dot, i) => {
      if (i === index) {
        dot.classList.add('active');
      } else {
        dot.classList.remove('active');
      }
    });
  }

  function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    showSlide(currentSlide);
  }

  function prevSlide() {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    showSlide(currentSlide);
  }

  function startCarousel() {
    intervalId = setInterval(nextSlide, 3000);
  }

  function stopCarousel() {
    clearInterval(intervalId);
  }

  // Generate dots
  for (let i = 0; i < totalSlides; i++) {
    const dot = document.createElement('div');
    dot.classList.add('dot');
    if (i === 0) dot.classList.add('active');
    dot.addEventListener('click', () => showSlide(i));
    dotsContainer.appendChild(dot);
  }

  // Initial slide
  showSlide(currentSlide);
  startCarousel();

  // Button events
  nextBtn.addEventListener('click', () => {
    nextSlide();
    stopCarousel();
    startCarousel();
  });
  
  prevBtn.addEventListener('click', () => {
    prevSlide();
    stopCarousel();
    startCarousel();
  });
});
