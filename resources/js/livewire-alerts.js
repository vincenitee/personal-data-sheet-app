import Swal from 'sweetalert2';

window.confirmAction = function (options) {
    Swal.fire({
        title: options.title || 'Are you sure?',
        text: options.text || 'This action cannot be undone.',
        icon: options.icon || 'warning',
        showCancelButton: true,
        confirmButtonColor: options.confirmButtonColor || '#3085d6',
        cancelButtonColor: options.cancelButtonColor || '#d33',
        confirmButtonText: options.confirmButtonText || 'Yes, proceed!',
        cancelButtonText: options.cancelButtonText || 'Cancel'
    }).then((result) => {
        if (result.isConfirmed && options.onConfirm) {
            options.onConfirm();
        }
    });
};

window.confirmDelete = function (type, index) {
    confirmAction({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        confirmButtonText: "Yes, delete it!",
        onConfirm: () => {
            Livewire.dispatch('remove-entry', { type: type, index: index });
        }
    });
};

window.confirmSubmission = function () {
    confirmAction({
        title: "Submit Entry?",
        text: "Please review your information carefully before submitting. Once submitted, you won't be able to make further changes.",
        icon: "warning",
        confirmButtonText: "Yes, submit it!",
        cancelButtonText: "Cancel",
        onConfirm: () => {
            Livewire.dispatch('entry-submitted');
        }
    });
};

window.acceptSignup = function (userId) {
    confirmAction({
        title: 'Confirm Signup Approval',
        text: `Are you sure you want to approve the signup request for User #${userId}?`,
        icon: 'question',
        confirmButtonText: 'Yes, approve request',
        cancelButton: 'Cancel',
        onConfirm: () => {
            Livewire.dispatch('signup-accepted', { userId });
        }
    });
}

window.rejectSignup = function (userId) {
    confirmAction({
        title: "Reject Signup Request?",
        text: `Are you sure you want to reject the signup request for User #${userId}? This action cannot be undone.`,
        icon: "question",
        confirmButtonText: "Yes, reject it",
        cancelButtonText: "Cancel",
        onConfirm: () => {
            Livewire.dispatch('signup-rejected', { userId });
        }
    });
};


window.toggleUserStatus = function (userId, currentStatus) {
    confirmAction({
        title: `${currentStatus ? 'Activate' : 'Deactivate'} this user?`,
        text: `Are you sure you want to ${currentStatus ? 'activate' : 'deactivate'} User #${userId}? You can change this status later if needed.`,
        icon: "question",
        confirmButtonText: `Yes, ${currentStatus ? 'activate' : 'deactivate'} it`,
        cancelButtonText: "Cancel",
        onConfirm: () => {
            Livewire.dispatch('toggle-user-status', { userId, currentStatus });
        }
    });

}

document.addEventListener('DOMContentLoaded', () => {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        width: "16rem",
        padding: "0.5rem",
        customClass: {
            popup: "custom-toast"
        },
        didOpen: (toast) => {
            toast.style.fontSize = "0.875rem";
            toast.style.minHeight = "auto";
            toast.style.marginTop = "50px"; // Adjust this value to move it lower
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });


    Livewire.on('show-alert', (data) => {
        Swal.fire(data[0]);
    });

    Livewire.on('draft-saved', () => {
        Toast.fire({
            icon: "success",
            title: "Draft Saved"
        });
    });

    Livewire.on('show-toast', (data) => {
        Toast.fire({
            icon: data[0].type,
            title: data[0].title
        });
    });

    Livewire.on('personal-info-updated', () => {
        Toast.fire({
            icon: "success",
            title: 'Personal Information Updated!'
        })
    })

    Livewire.on('security-info-updated', () => {
        Toast.fire({
            icon: "success",
            title: 'Password Updated Successfully!'
        })
    })
});
