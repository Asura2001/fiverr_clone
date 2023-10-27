    // Get references to elements
    const imageInput1 = document.getElementById('imageInput1');
    const imageUploadWrapper1 = document.getElementById('imageUploadWrapper1');
    const removebutton1 = document.getElementById('removebutton1');
    const removebuttonc1 = document.querySelector('.removebutton1');
    const selectedImagec1 = document.querySelector('.selectedImage1');

    // Add an event listener to the input field to listen for changes
    imageInput1.addEventListener('change', function () {
        // Check if a file has been selected
        if (this.files && this.files[0]) {
            // Hide the image upload wrapper and show the selected image and remove icon
            imageUploadWrapper1.style.display = 'none';
            selectedImagec1.classList.remove("d-none");
            selectedImagec1.classList.add("d-block");
            removebuttonc1.classList.remove("d-none");
            removebuttonc1.classList.add("d-block");

            // Display the selected image
            const reader = new FileReader();
            reader.onload = function (e) {
                selectedImage1.src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

    // Add a click event listener to the remove icon
    removebutton1.addEventListener('click', function () {
        // Clear the selected image and reset the input field
        selectedImage1.src = '';
        imageInput1.value = '';

        // Hide the remove icon and show the image upload wrapper
        removebuttonc1.classList.add("d-none");
        removebuttonc1.classList.remove("d-block");
        selectedImagec1.classList.add("d-none");
        selectedImagec1.classList.remove("d-block");
        imageUploadWrapper1.style.display = 'block';
    });

    // Get references to elements of second image
    const imageInput2 = document.getElementById('imageInput2');
    const imageUploadWrapper2 = document.getElementById('imageUploadWrapper2');
    const removebutton2 = document.getElementById('removebutton2');
    const removebuttonc2 = document.querySelector('.removebutton2');
    const selectedImagec2 = document.querySelector('.selectedImage2');
    
    // Add an event listener to the input field to listen for changes
    imageInput2.addEventListener('change', function () {
        // Check if a file has been selected
        if (this.files && this.files[0]) {
            // Hide the image upload wrapper and show the selected image and remove icon
            imageUploadWrapper2.style.display = 'none';
            selectedImagec2.classList.remove("d-none");
            selectedImagec2.classList.add("d-block");
            removebuttonc2.classList.remove("d-none");
            removebuttonc2.classList.add("d-block");
    
            // Display the selected image
            const reader = new FileReader();
            reader.onload = function (e) {
                selectedImage2.src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
    
    // Add a click event listener to the remove icon
    removebutton2.addEventListener('click', function () {
        // Clear the selected image and reset the input field
        selectedImage2.src = '';
        imageInput2.value = '';
    
        // Hide the remove icon and show the image upload wrapper
        removebuttonc2.classList.add("d-none");
        removebuttonc2.classList.remove("d-block");
        selectedImagec2.classList.add("d-none");
        selectedImagec2.classList.remove("d-block");
        imageUploadWrapper2.style.display = 'block';
    });

    // Get references to elements of third image
    const imageInput3 = document.getElementById('imageInput3');
    const imageUploadWrapper3 = document.getElementById('imageUploadWrapper3');
    const removebutton3 = document.getElementById('removebutton3');
    const removebuttonc3 = document.querySelector('.removebutton3');
    const selectedImagec3 = document.querySelector('.selectedImage3');
    
    // Add an event listener to the input field to listen for changes
    imageInput3.addEventListener('change', function () {
        // Check if a file has been selected
        if (this.files && this.files[0]) {
            // Hide the image upload wrapper and show the selected image and remove icon
            imageUploadWrapper3.style.display = 'none';
            selectedImagec3.classList.remove("d-none");
            selectedImagec3.classList.add("d-block");
            removebuttonc3.classList.remove("d-none");
            removebuttonc3.classList.add("d-block");
    
            // Display the selected image
            const reader = new FileReader();
            reader.onload = function (e) {
                selectedImage3.src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
    
    // Add a click event listener to the remove icon
    removebutton3.addEventListener('click', function () {
        // Clear the selected image and reset the input field
        selectedImage3.src = '';
        imageInput3.value = '';
    
        // Hide the remove icon and show the image upload wrapper
        removebuttonc3.classList.add("d-none");
        removebuttonc3.classList.remove("d-block");
        selectedImagec3.classList.add("d-none");
        selectedImagec3.classList.remove("d-block");
        imageUploadWrapper3.style.display = 'block';
    });

    // Get references to elements of fourth image
    const imageInput4 = document.getElementById('imageInput4');
    const imageUploadWrapper4 = document.getElementById('imageUploadWrapper4');
    const removebutton4 = document.getElementById('removebutton4');
    const removebuttonc4 = document.querySelector('.removebutton4');
    const selectedImagec4 = document.querySelector('.selectedImage4');
    
    // Add an event listener to the input field to listen for changes
    imageInput4.addEventListener('change', function () {
        // Check if a file has been selected
        if (this.files && this.files[0]) {
            // Hide the image upload wrapper and show the selected image and remove icon
            imageUploadWrapper4.style.display = 'none';
            selectedImagec4.classList.remove("d-none");
            selectedImagec4.classList.add("d-block");
            removebuttonc4.classList.remove("d-none");
            removebuttonc4.classList.add("d-block");
    
            // Display the selected image
            const reader = new FileReader();
            reader.onload = function (e) {
                selectedImage4.src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
    
    // Add a click event listener to the remove icon
    removebutton4.addEventListener('click', function () {
        // Clear the selected image and reset the input field
        selectedImage4.src = '';
        imageInput4.value = '';
    
        // Hide the remove icon and show the image upload wrapper
        removebuttonc4.classList.add("d-none");
        removebuttonc4.classList.remove("d-block");
        selectedImagec4.classList.add("d-none");
        selectedImagec4.classList.remove("d-block");
        imageUploadWrapper4.style.display = 'block';
    });

    // Get references to elements of fifth image
    const imageInput5 = document.getElementById('imageInput5');
    const imageUploadWrapper5 = document.getElementById('imageUploadWrapper5');
    const removebutton5 = document.getElementById('removebutton5');
    const removebuttonc5 = document.querySelector('.removebutton5');
    const selectedImagec5 = document.querySelector('.selectedImage5');
    
    // Add an event listener to the input field to listen for changes
    imageInput5.addEventListener('change', function () {
        // Check if a file has been selected
        if (this.files && this.files[0]) {
            // Hide the image upload wrapper and show the selected image and remove icon
            imageUploadWrapper5.style.display = 'none';
            selectedImagec5.classList.remove("d-none");
            selectedImagec5.classList.add("d-block");
            removebuttonc5.classList.remove("d-none");
            removebuttonc5.classList.add("d-block");
    
            // Display the selected image
            const reader = new FileReader();
            reader.onload = function (e) {
                selectedImage5.src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
    
    // Add a click event listener to the remove icon
    removebutton5.addEventListener('click', function () {
        // Clear the selected image and reset the input field
        selectedImage5.src = '';
        imageInput5.value = '';
    
        // Hide the remove icon and show the image upload wrapper
        removebuttonc5.classList.add("d-none");
        removebuttonc5.classList.remove("d-block");
        selectedImagec5.classList.add("d-none");
        selectedImagec5.classList.remove("d-block");
        imageUploadWrapper5.style.display = 'block';
    });

    // Get references to elements of sixth image
    const imageInput6 = document.getElementById('imageInput6');
    const imageUploadWrapper6 = document.getElementById('imageUploadWrapper6');
    const removebutton6 = document.getElementById('removebutton6');
    const removebuttonc6 = document.querySelector('.removebutton6');
    const selectedImagec6 = document.querySelector('.selectedImage6');
    
    // Add an event listener to the input field to listen for changes
    imageInput6.addEventListener('change', function () {
        // Check if a file has been selected
        if (this.files && this.files[0]) {
            // Hide the image upload wrapper and show the selected image and remove icon
            imageUploadWrapper6.style.display = 'none';
            selectedImagec6.classList.remove("d-none");
            selectedImagec6.classList.add("d-block");
            removebuttonc6.classList.remove("d-none");
            removebuttonc6.classList.add("d-block");
    
            // Display the selected image
            const reader = new FileReader();
            reader.onload = function (e) {
                selectedImage6.src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
    
    // Add a click event listener to the remove icon
    removebutton6.addEventListener('click', function () {
        // Clear the selected image and reset the input field
        selectedImage4.src = '';
        imageInput6.value = '';
    
        // Hide the remove icon and show the image upload wrapper
        removebuttonc6.classList.add("d-none");
        removebuttonc6.classList.remove("d-block");
        selectedImagec6.classList.add("d-none");
        selectedImagec6.classList.remove("d-block");
        imageUploadWrapper6.style.display = 'block';
    });