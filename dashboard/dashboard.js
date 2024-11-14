let cropper;

const profileImage = document.getElementById('profile-image');
const editProfile = document.getElementById('editProfile');
const close = document.querySelector(".closeBtn");
const cropModal = document.getElementById('cropModal');
const imageToCrop = document.getElementById('imageToCrop');
const cropButton = document.getElementById('cropButton');
const cancelButton = document.getElementById('cancelButton');
const profileImgInput = document.getElementById('profile-img');
const fileNameDisplay = document.getElementById('file-name');

// Open the profile edit form when clicking on the profile image
profileImage.addEventListener("click", () => {
    editProfile.style.display = "block";
    editProfile.style.display = "flex";
});

// Close the profile edit form
close.addEventListener("click", () => {
    editProfile.style.display = 'none';
    resetCropper(); // Make sure to reset the cropper when closing the form
});

// Handle file input change (image selection)
profileImgInput.addEventListener('change', function (event) {
    const file = event.target.files[0];
    if (file) {
        // Reset cropper if there was an existing instance
        resetCropper();

        // Set the image to crop
        const imageUrl = URL.createObjectURL(file);
        imageToCrop.src = imageUrl;

        // Show crop modal
        cropModal.style.display = 'block';

        // Initialize cropper
        cropper = new Cropper(imageToCrop, {
            aspectRatio: 1,
            viewMode: 1,
        });

        // Update file name display
        fileNameDisplay.textContent = file.name;
    }
});

// Crop the image when the crop button is clicked
cropButton.addEventListener('click', function () {
    const canvas = cropper.getCroppedCanvas({
        width: 150,
        height: 150,
    });

    // Set cropped image data URL to hidden input
    document.getElementById('cropped_image').value = canvas.toDataURL();

    // Submit the form with cropped image
    document.getElementById('editProfile').submit();

    // Hide modal and reset cropper
    cropModal.style.display = 'none';
    resetCropper();
});

// Close the crop modal without saving
cancelButton.addEventListener('click', function () {
    cropModal.style.display = 'none';
    resetCropper();
});

// Reset the cropper instance
function resetCropper() {
    if (cropper) {
        cropper.destroy();
        cropper = null;
    }
}



const openTab = () => {
    const profileImage = document.getElementById('profile-image');
    const editProfile = document.getElementById('editProfile');
    const close = document.querySelector(".closeBtn");

    profileImage.addEventListener("click", () => {
        editProfile.style.display = "block";
        editProfile.style.display = "flex";
    });
    close.addEventListener("click", () => {
        editProfile.style.display = 'none';
    });
}


document.getElementById('profile-img').addEventListener('change', (event) => {
    const fileName  = event.target.files[0] ? event.target.files[0].name : 'No file chosen';
    document.getElementById('file-name').textContent = fileName; 
})


