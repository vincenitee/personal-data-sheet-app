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
        text: "Are you sure you want to submit this entry for review? You won't be able to edit it after submission.",
        icon: "question",
        confirmButtonText: "Yes, submit it!",
        cancelButtonText: "Cancel",
        onConfirm: () => {
            Livewire.dispatch('entry-submitted');
        }
    });
};

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
