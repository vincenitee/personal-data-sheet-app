// Function to confirm deletion
function confirmDelete(type, index) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.dispatch('removeEntry', {
                type: type,
                index: index
            });
        }
    });
}

// Toast configuration
const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    width: "16rem", // Around 256px (1rem = 16px by default)
    padding: "0.5rem", // Adjusted for better spacing
    customClass: {
        popup: "custom-toast"
    },
    didOpen: (toast) => {
        toast.style.fontSize = "0.875rem"; // ~14px
        toast.style.minHeight = "auto";
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    }
});

// Livewire event listeners
Livewire.on('show-alert', (data) => {
    Swal.fire(data[0]);
});

Livewire.on('draft-saved', () => {
    Toast.fire({
        icon: "success",
        title: "Draft Saved"
    });
});
