const submit = document.querySelector(".submit-button");
const titleInput = document.querySelector(".create-title-input");
const priceInput = document.querySelector(".create-price-input");

submit.addEventListener("click",evt => {
    if (titleInput.value.trim() === '' && priceInput.value.trim() === '') {
        evt.preventDefault();
        titleInput.classList.add("empty");
        titleInput.placeholder = "Title can't be empty";
        priceInput.classList.add("empty");
        priceInput.placeholder = "Price can't be empty";
    }else if(titleInput.value.trim() === '' ){
        evt.preventDefault();
        titleInput.classList.add("empty");
        titleInput.placeholder = "Title can't be empty";
    }else if(priceInput.value.trim() === '' ){
        evt.preventDefault();
        priceInput.classList.add("empty");
        priceInput.placeholder = "Price can't be empty";
    }
})