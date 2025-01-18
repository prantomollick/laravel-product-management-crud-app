import "./bootstrap";
import $ from "jquery";
window.$ = $;

(function ($) {
    "use strict";
    const allowedTypes = ["image/png", "image/jpeg", "image/jpg", "image/gif"];
    const maxFileSize = 800 * 1024; // 800 KB

    // Drag-and-drop handling
    $("#dropzone")
        .on("dragover", function (e) {
            e.preventDefault();
            $(this).addClass("bg-slate-200");
        })
        .on("dragleave", function () {
            $(this).removeClass("bg-slate-200");
        })
        .on("drop", function (e) {
            e.preventDefault();
            $(this).removeClass("bg-slate-200");
            const file = e.originalEvent.dataTransfer.files[0];
            validateAndShowFile(file);
        });

    $("#dropzone").click(function () {
        $("#product-image").click();
    });

    $("#product-image").on("change", function () {
        const file = this.files[0];
        validateAndShowFile(file);
    });

    function validateAndShowFile(file) {
        const errorDisplay = $("#product-image-error");
        const nameDisplay = $("#product-image-name");
        const previewContainer = $("#image-preview-container");
        const previewImage = $("#image-preview");

        errorDisplay.addClass("hidden").text("");
        nameDisplay.addClass("hidden").text("");
        previewContainer.addClass("hidden");
        previewImage.attr("src", "#");

        if (!allowedTypes.includes(file.type)) {
            errorDisplay
                .text(
                    "Invalid file type. Only JPEG, PNG, JPG, and GIF are allowed."
                )
                .removeClass("hidden");
        } else if (file.size > maxFileSize) {
            errorDisplay
                .text("File is too large. Max size is 800 KB.")
                .removeClass("hidden");
        } else {
            nameDisplay
                .text(`Selected file: ${file.name}`)
                .removeClass("hidden");

            // Show preview
            const reader = new FileReader();
            reader.onload = function (e) {
                previewImage.attr("src", e.target.result);
                previewContainer.removeClass("hidden");
            };
            reader.readAsDataURL(file);
        }
    }

    // Form submission handling
    $("#submit-button").on("click", function (e) {
        e.preventDefault(); // Prevent default form submission

        // Perform client-side validation
        $(".text-red-600").addClass("hidden"); // Reset errors
        let hasError = false;

        if (!$("#product-name").val()) {
            $("#product-name-error")
                .text("Product name is required.")
                .removeClass("hidden");
            hasError = true;
        }

        if (!$("#product-price").val()) {
            $("#product-price-error")
                .text("Product price is required.")
                .removeClass("hidden");
            hasError = true;
        }

        if (!$("#product-stock").val()) {
            $("#product-stock-error")
                .text("Product stock is required.")
                .removeClass("hidden");
            hasError = true;
        }

        if (!$("#product-description").val()) {
            $("#product-description-error")
                .text("Product description is required.")
                .removeClass("hidden");
            hasError = true;
        }

        const imageSrc = $("#image-preview").attr("src");
        if (!$("#product-image")[0].files[0] && imageSrc === "#") {
            $("#product-image-error")
                .text("Please upload an image.")
                .removeClass("hidden");
            hasError = true;
        }

        if (hasError) {
            return;
        }

        $("#product-form").submit();
    });

    $(".delete-button").on("click", function () {
        const productId = $(this).data("id");
        const actionUrl = `/products/${productId}`;
        $("#deleteForm").attr("action", actionUrl);
        $("#deleteModal").removeClass("hidden");
    });

    $('[data-modal-toggle="deleteModal"]').on("click", function () {
        $("#deleteModal").addClass("hidden");
    });
})($);
