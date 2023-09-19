function changeBackground(){
  // Define an array of image sources
  const images = ['././images/home-images/cover1.jpg', '././images/home-images/cover2.jpg', '././images/home-images/cover3.jpg'];

  // Set an index variable to keep track of the current image
  let index = 0;

  // Get the image element by its id
  const coverImage = document.querySelector('#cover-image');

  // Set an interval to change the image every second
  setInterval(() => {
    // Increment the index and reset to 0 if it goes beyond the length of the images array
    index = (index + 1) % images.length;

    // Set the src attribute of the image to the current image source
    coverImage.src = images[index];
  }, 2000);
}