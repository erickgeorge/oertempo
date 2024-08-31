const inputField = document.getElementById("search-input");
const clearButton = document.getElementById("clear-button");

inputField.addEventListener("input", function () {
    if (inputField.value.trim() !== "") {
        clearButton.style.display = "block";
    } else {
        clearButton.style.display = "none";
    }
});

// Optional: Add functionality to clear the input field when the button is clicked
clearButton.addEventListener("click", function () {
    inputField.value = "";
    clearButton.style.display = "none";
    inputField.focus(); // Keep the focus on the input field
});
