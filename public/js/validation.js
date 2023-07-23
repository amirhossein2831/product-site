const submit = document.querySelector(".submit-button");
const titleInput = document.querySelector(".create-title-input");
const priceInput = document.querySelector(".create-price-input");

submit.addEventListener("click",evt => {
    if(titleInput.value.trim() === '' )
        addError(titleInput, evt, "Title");
    else
        removeError(titleInput);

    if(priceInput.value.trim() === '' )
        addError(priceInput, evt, "Price");
    else
        removeError(priceInput);
})

function addError(button,evt,buttonName) {
    evt.preventDefault();
    button.classList.add("empty");
    button.placeholder = buttonName + " can't be empty";
}
function removeError(inputElement) {
    inputElement.classList.remove("empty");
    inputElement.placeholder = "";
}