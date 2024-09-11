document.addEventListener('DOMContentLoaded', function() {
    const errorType = "<?php echo isset($_SESSION['error']) ? $_SESSION['error'] : ''; ?>";

    if (errorType === 'empty') {
        showModal('emptyFieldsModal');
    } else if (errorType === 'wrong') {
        showModal('wrongCredentialsModal');
    }

    <?php unset($_SESSION['error']);?>
});

function showModal(modalId) {
    document.getElementById(modalId).style.display = 'block';
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}