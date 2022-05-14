let checkInElement = document.getElementById("check_in");
let checkOutElement = document.getElementById("check_out");
let checkInValueElement = document.getElementById("check_in_value");
let checkOutValueElement = document.getElementById("check_out_value");
checkInElement.addEventListener("change", function () {
    checkInValueElement.value = this.value;
});

checkOutElement.addEventListener("change", function () {
    checkOutValueElement.value = this.value;
});