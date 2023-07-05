//Class Active menu
// window.addEventListener("load", function () {
//   console.log(location.pathname);
//   arr_link = location.pathname.split("/");
//   console.log(arr_link);
//   console.log(arr_link[2]);
//   const sidebarLinks = document.querySelectorAll(".menu-text");
//   sidebarLinks.forEach((link, index) => {
//     if (arr_link[2].includes(link.innerHTML.toLowerCase())) {
//       const link_active = link.parentElement;
//       link_active.parentElement.classList.add("active");
//     }
//   });
// });
//Menu toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");
toggle.onclick = function () {
  navigation.classList.toggle("active-toggle");
  main.classList.toggle("active-toggle");
};

// Handle preview image
let file = document.getElementById("file");
if (file != null) {
  file.addEventListener("change", function (e) {
    const file = e.target.files[0];
    file.preview = URL.createObjectURL(file);
    const img = document.getElementById("img-product");
    img.src = file.preview;
  });
}
