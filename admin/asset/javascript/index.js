document.querySelectorAll('[data-bs-toggle="popover"]')
    .forEach(popover => {
      new bootstrap.Popover(popover)
    })
    
document.addEventListener("DOMContentLoaded", function () {
  const toastTrigger = document.getElementById("liveToastBtn");
  const toastLiveExample = document.getElementById("liveToast");
    
  if (toastTrigger && toastLiveExample) {
    const toastBootstrap = new bootstrap.Toast(toastLiveExample);
    toastTrigger.addEventListener("click", () => {
      console.log("Button Clicked"); // Cek apakah event listener terpanggil
      toastBootstrap.show();
    });
  }
});
    