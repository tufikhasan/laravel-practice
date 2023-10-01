function showLoader() {
    document.getElementById("loader").classList.remove("d-none");
}
function hideLoader() {
    document.getElementById("loader").classList.add("d-none");
}

const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});

function message(type, msg) {
    Toast.fire({
        icon: type,
        title: msg,
    });
}
