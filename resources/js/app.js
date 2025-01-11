import "./bootstrap";

import * as bootstrap from "bootstrap";

import Choices from "choices.js"; // Import Choices.js
import "choices.js/public/assets/styles/choices.css"; // Import Choices.js CSS

import { TempusDominus } from "@eonasdan/tempus-dominus";
import "@eonasdan/tempus-dominus/dist/css/tempus-dominus.min.css";
import "bootstrap-icons/font/bootstrap-icons.css";

document.addEventListener("DOMContentLoaded", () => {
    // Initialize all inputs with class 'choices'
    const choiceElements = document.querySelectorAll(".choices");
    choiceElements.forEach((element) => {
        new Choices(element, {
            searchEnabled: true,
            itemSelectText: "",
            placeholderValue: "Select an option",
        });
    });

    // Initialize all date inputs
    const dateInputs = document.querySelectorAll(".datepicker");
    dateInputs.forEach((input) => {
        const wrapper = document.createElement("div");
        wrapper.classList.add("input-group");
        input.parentNode.insertBefore(wrapper, input);
        wrapper.appendChild(input);

        const icon = document.createElement("span");
        icon.classList.add("input-group-text");
        icon.innerHTML = '<i class="bi bi-calendar3"></i>';
        // Add a calendar icon
        wrapper.appendChild(icon);

        new TempusDominus(wrapper, {
            display: {
                theme: "light",
                components: {
                    calendar: true,
                    date: true,
                    month: true,
                    year: true,
                },
                icons: {
                    type: "icons",
                    time: "bi bi-clock",
                    date: "bi bi-calendar-week",
                    up: "bi bi-arrow-up-circle",
                    down: "bi bi-arrow-down-circle",
                    previous: "bi bi-caret-left",
                    next: "bi bi-caret-right",
                    today: "bi bi-calendar2-check",
                    clear: "bi bi-trash-fill",
                    close: "bi bi-x-circle",
                },

                buttons: {
                    today: true,
                    clear: true,
                },

            },
        });
    });
});
