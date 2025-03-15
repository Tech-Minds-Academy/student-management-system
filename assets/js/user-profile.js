document.addEventListener('DOMContentLoaded', function() {
    initializeProfilePhoto();
});

function initializeProfilePhoto() {
    const profilePhoto = document.querySelector('.profile-photo');
    const photoInput = document.getElementById('photoInput');
    const profileImage = document.getElementById('profileImage');

    if (profilePhoto && photoInput) {
        // Click on profile photo to trigger file input
        profilePhoto.addEventListener('click', () => {
            photoInput.click();
        });

        // Handle file selection
        photoInput.addEventListener('change', async (e) => {
            const file = e.target.files[0];
            if (file && file.type.startsWith('image/')) {
                try {
                    // Show preview immediately
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        profileImage.src = e.target.result;
                    };
                    reader.readAsDataURL(file);

                    // Upload to server
                    await uploadProfilePhoto(file);
                } catch (error) {
                    console.error('Error uploading profile photo:', error);
                    showNotification('Failed to upload profile photo', 'error');
                }
            } else {
                showNotification('Please select a valid image file', 'error');
            }
        });
    }
}

async function uploadProfilePhoto(file) {
    const formData = new FormData();
    formData.append('profile_photo', file);

    try {
        const response = await fetch('/controllers/UserController.php?action=updateProfilePhoto', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();
        if (result.success) {
            showNotification('Profile photo updated successfully!', 'success');
        } else {
            throw new Error(result.message || 'Failed to update profile photo');
        }
    } catch (error) {
        console.error('Error:', error);
        showNotification(error.message, 'error');
        throw error;
    }
}

function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    // Remove notification after 3 seconds
    setTimeout(() => {
        notification.classList.add('fade-out');
        setTimeout(() => notification.remove(), 500);
    }, 3000);
} 