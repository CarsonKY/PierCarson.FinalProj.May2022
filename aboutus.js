const imagesam = document.querySelectorAll(".imagesam img");
const modal = document.querySelector(".modal");
const modalImg = document.querySelector(".modalImg");
const modalTxt = document.querySelector(".modalTxt");
const closeam = document.querySelector(".closeam");

imagesam.forEach((image) => {
  image.addEventListener("click", () => {
    modalImg.src = image.src;
    modalTxt.innerHTML = image.alt;
    modal.classList.add("appear");

    closeam.addEventListener("click", () => {
      modal.classList.remove("appear");
    });
  });
});