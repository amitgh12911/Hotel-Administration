let removeCustomerHoverElements = document.getElementsByClassName("remove-customer-hover");
Array.from(removeCustomerHoverElements).forEach(e => {
    e.addEventListener("mouseover", function () {
        this.classList.replace("btn-primary", "btn-danger");
    });
    e.addEventListener("mouseleave", function () {
        this.classList.replace("btn-danger", "btn-primary");
    });
});

let updateBtn = document.getElementsByClassName("update-btn");
let updateRate = document.getElementsByClassName("update-rate");
let inputElement = document.createElement("input");
inputElement.setAttribute("type", "number");
Array.from(updateBtn).forEach((e, i) => {
    // e.addEventListener("click", () => {
    //     updateRate[i].parentElement.replaceChild(inputElement, updateRate[i]);
    // });
    e.addEventListener("mouseover", function () {
        this.classList.replace("btn-primary", "btn-success");
    });
    e.addEventListener("mouseleave", function () {
        this.classList.replace("btn-success", "btn-primary");
    });
});
