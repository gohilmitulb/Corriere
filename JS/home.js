//scrolling
 // Get the home, about, and contact links
 const homeLink = document.getElementById('select_home');
  const aboutLink = document.getElementById('select_about');
  const contactLink = document.getElementById('select_contact');

  // Get the corresponding sections
  const homeSection = document.getElementById('home');
  const aboutSection = document.getElementById('about');
  const contactSection = document.getElementById('contact');

  // Add click event listeners to each link
  homeLink.addEventListener('click', (event) => {
    event.preventDefault();
    homeSection.scrollIntoView({ behavior: 'smooth' });
  });

  aboutLink.addEventListener('click', (event) => {
    event.preventDefault();
    aboutSection.scrollIntoView({ behavior: 'smooth' });
  });

  contactLink.addEventListener('click', (event) => {
    event.preventDefault();
    contactSection.scrollIntoView({ behavior: 'smooth' });
  });