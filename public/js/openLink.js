const imageButtons = document.querySelectorAll(".image_but");

imageButtons.forEach(imageButton => {
    imageButton.addEventListener("click", evt => {
        imageButton.parentElement.submit();
    });
});
