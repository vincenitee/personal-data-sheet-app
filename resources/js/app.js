// Import Bootstrap and dependencies
import "./bootstrap";
import * as bootstrap from "bootstrap";
import "bootstrap-icons/font/bootstrap-icons.css"; // Bootstrap Icons

// Import SimpleBar for custom scrollbars
import SimpleBar from "simplebar";
import "simplebar/dist/simplebar.css";

// Import SweetAlert2
import Swal from "sweetalert2";
import "sweetalert2/src/sweetalert2.scss";

// Import Flatpickr for date pickers
import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";

// Import and initialize Alpine.js
import Alpine from "alpinejs";

if (!window.Alpine) {
    window.Alpine = Alpine;
    Alpine.start();
}

// Expose libraries to the global window object
window.Swal = Swal;
window.flatpickr = flatpickr;
