// Get references to elements
const imageInput1 = document.getElementById('imageInput1');
const imageUploadWrapper1 = document.getElementById('imageUploadWrapper1');
const selectedImagec1 = document.querySelector('.selectedImage1');

// Add an event listener to the input field to listen for changes
imageInput1.addEventListener('change', function () {
    // Check if a file has been selected
    if (this.files && this.files[0]) {
        // Hide the image upload wrapper and show the selected image and remove icon
        imageUploadWrapper1.style.display = 'none';
        selectedImagec1.classList.remove("d-none");
        selectedImagec1.classList.add("d-block");

        // Display the selected image
        const reader = new FileReader();
        reader.onload = function (e) {
            selectedImage1.src = e.target.result;
        };
        reader.readAsDataURL(this.files[0]);
    }
});

function button1() {
    document.getElementById('input').stepUp();
}
function button2() {
    document.getElementById('input').stepDown();
}

function button3() {
    document.getElementById('input2').stepUp();
}
function button4() {
    document.getElementById('input2').stepDown();
}

function button5() {
    document.getElementById('input3').stepUp();
}
function button6() {
    document.getElementById('input3').stepDown();
}