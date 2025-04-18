import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

const sortHandle = () => {
    $(".sortable").sortable({
        connectWith: ".sortable",
        start: function (event, ui) {
            ui.item.addClass("tilt");
            ui.item.css("opacity", "0.7");
            ui.item.css("border", "none");
        },
        stop: function (event, ui) {
            ui.item.removeClass("tilt");
            ui.item.css("opacity", "");
            $(".card").removeClass("hover-border");
            $(".card-texts").hover(
                function () {
                    $(this).css("border", "2px solid #388bff");
                },
                function () {
                    $(this).css("border", "");
                }
            );
        },
        placeholder: "beratholder",
        group: "nested",
        afterMove: function (placeholder, container) {
            if (oldContainer != container) {
                if (oldContainer) oldContainer.el.removeClass("active");
                container.el.addClass("active");

                oldContainer = container;
            }
        },
        over: function (event, ui) {
            $(ui.placeholder).css({ height: ui.item.height() + 10 });
            $(ui.placeholder)
                .closest(".card")
                .addClass("hover-border")
                .css("box-shadow", "0 4px 8px rgba(0, 0, 0, 0.2)");
        },
        out: function (event, ui) {
            $(ui.placeholder)
                .closest(".card")
                .removeClass("hover-border")
                .css("box-shadow", "");
        },
        update: function (event, ui) {
            let cardId = ui.item.data("card-id");
            let NListId = ui.item
                .closest(".sortable-container")
                .data("list-id");

            $.ajax({
                url: "/card/update-list",
                method: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    card_id: cardId,
                    new_list_id: NListId,
                },
            });
        },
    });
};

$(document).ready(function () {
    sortHandle();

    $("<style>.hover-border { border: 2px solid #007bff; }</style>").appendTo(
        "head"
    );

    const input = $(".input-srch");
    const noneElement = $(".right-search");
    const premiumButton = $(".right-premium-button");

    input.on("focus", () => {
        noneElement.css({
            width: "600px",
            "background-color": "white",
            color: "#975173",
        });
        input.css("background-color", "white");
        input.addClass("focused");
        premiumButton.hide();
    });

    input.on("blur", () => {
        premiumButton.show();
        input.removeClass("focused");
        input.css({
            width: "100%",
            "background-color": "#975173",
            color: "#975173",
        });
        noneElement.css({
            width: "",
            "background-color": "#975173",
            color: "#ffff",
            display: "flex",
        });
    });
    $(".formListAdd").on("submit", function (e) {
        e.preventDefault();
        var form = $(this).serialize(e);

        $.ajax({
            url: "/ListAdd",
            type: "POST",
            data: {
                name: $(this).find("input[name=name]").val(),
                pano_id: $(this).find("input[name=pano_id]").val(),
                _token: $(this).find("input[name=_token]").val(),
            },
            dataType: "json",
            success: function (response) {
                const listId = response.id;
                const csrfToken = document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content");
                const cardHtml = `
                    <div class="sortable-container" data-list-id="${listId}">
                        <div class="card" style="width: 17rem">
                            <div class="card-body">
                                  <div class="card-title">
                                    <span class="editable" data-id="${listId}}">${response.name}</span>
                                    <input type="text" class="edit-input d-none" value="${response.name}"
                                        data-id="${listId}}">

                                    <div class="project-title-logo" id="dropdown${response.id}}" data-bs-toggle="dropdown"
                                        aria-expanded="false" data-bs-auto-close="outside">
                                        <svg width="17" height="17" role="presentation" focusable="false" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5 14C6.10457 14 7 13.1046 7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14ZM12 14C13.1046 14 14 13.1046 14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14ZM21 12C21 13.1046 20.1046 14 19 14C17.8954 14 17 13.1046 17 12C17 10.8954 17.8954 10 19 10C20.1046 10 21 10.8954 21 12Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </div>

                                    <div class="dropdown-menu dropdown-menu-start firstDropMenu"
                                        aria-labelledby="dropdown${response.id}">
                                        <div class="text-center fw-light projectName">
                                        ${response.name}
                                            <button type="button" class="btn-close shadow-none position-absolute end-0 px-3" data-bs-auto-close="outside"
                                                aria-label="close"></button>
                                        </div>
                                        <div class="px-3">
                                            <div>
                                                <hr class="dropdown-divider">
                                            </div>
                                        </div>
                                        <div class="list-group border-0" role="group">
                                            <a href=""
                                                class="list-group-item list-group-item-action d-flex align-items-center border-0 rounded-0 text-dark delete-list-btn"
                                                data-list-id="${response.id}">
                                                <div class="flex-fill px-2">Listeyi Kapat...</div>
                                                <div><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-text-body sortable">
                                </div>
                                    <form class="card-add-form" method="POST">
                                        <input type="hidden" name="_token" value="${csrfToken}">
                                        <div class="addCardDiv d-none">
                                            <span class="cardAddinpt">
                                                <textarea class="card-texts-inpt" name="name" placeholder="Bir başlık girin..."></textarea>
                                                <input type="hidden" name="lists_id" value="${listId}">
                                            </span>
                                            <div class="card-add-btn">
                                                <button class="btn-card">Kart Ekle</button>
                                                <div class="btn-back-card">
                                                    <svg width="17" height="17" role="presentation"
                                                        focusable="false" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M10.5858 12L5.29289 6.70711C4.90237 6.31658 4.90237 5.68342 5.29289 5.29289C5.68342 4.90237 6.31658 4.90237 6.70711 5.29289L12 10.5858L17.2929 5.29289C17.6834 4.90237 18.3166 4.90237 18.7071 5.29289C19.0976 5.68342 19.0976 6.31658 18.7071 6.70711L13.4142 12L18.7071 17.2929C19.0976 17.6834 19.0976 18.3166 18.7071 18.7071C18.3166 19.0976 17.6834 19.0976 17.2929 18.7071L12 13.4142L6.70711 18.7071C6.31658 19.0976 5.68342 19.0976 5.29289 18.7071C4.90237 18.3166 4.90237 17.6834 5.29289 17.2929L10.5858 12Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                     <div class="card-add">
                                    <button href="#" class="btn-add"><span><svg style="font-weight: 900"
                                                width="24" height="24" role="presentation" focusable="false"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12 3C11.4477 3 11 3.44772 11 4V11L4 11C3.44772 11 3 11.4477 3 12C3 12.5523 3.44772 13 4 13H11V20C11 20.5523 11.4477 21 12 21C12.5523 21 13 20.5523 13 20V13H20C20.5523 13 21 12.5523 21 12C21 11.4477 20.5523 11 20 11L13 11V4C13 3.44772 12.5523 3 12 3Z"
                                                    fill="currentColor"></path>
                                            </svg></span>Kart
                                        Ekle</button>
                                    <div class="project-title-logo" id="card-add-logo">
                                        <svg width="17" height="14" role="presentation" focusable="false"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3 6V5C3 3.89543 3.89543 3 5 3H6C6.55228 3 7 3.44772 7 4C7 4.55228 6.55228 5 6 5H5V6C5 6.55228 4.55228 7 4 7C3.44772 7 3 6.55228 3 6Z"
                                                fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M6 8C6 6.89543 6.89543 6 8 6H19C20.1046 6 21 6.89543 21 8V18C21 19.1046 20.1046 20 19 20H8C6.89543 20 6 19.1046 6 18V8ZM8 8H19V14H8V8ZM18 18C17.4477 18 17 17.5523 17 17C17 16.4477 17.4477 16 18 16C18.5523 16 19 16.4477 19 17C19 17.5523 18.5523 18 18 18ZM8 17C8 17.5523 8.44772 18 9 18H12C12.5523 18 13 17.5523 13 17C13 16.4477 12.5523 16 12 16H9C8.44772 16 8 16.4477 8 17Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M4 14C3.44772 14 3 14.4477 3 15V16C3 17.1046 3.89543 18 5 18V15C5 14.4477 4.55228 14 4 14Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M3 9C3 8.44772 3.44772 8 4 8C4.55228 8 5 8.44772 5 9V12C5 12.5523 4.55228 13 4 13C3.44772 13 3 12.5523 3 12V9Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M8 4C8 3.44772 8.44772 3 9 3H13C13.5523 3 14 3.44772 14 4C14 4.55228 13.5523 5 13 5H9C8.44772 5 8 4.55228 8 4Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M16 3C15.4477 3 15 3.44772 15 4C15 4.55228 15.4477 5 16 5H19C19 3.89543 18.1046 3 17 3H16Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;

                $(".card-container").append(cardHtml);
                sortHandle();
            },
        });
    }),
        $(".card-container").on("submit", ".card-add-form", function (e) {
            e.preventDefault();

            let $form = $(this);
            let formData = $form.serialize();

            $.ajax({
                url: "/cardAdd",
                type: "POST",
                data: formData,
                dataType: "json",
                success: function (response) {
                    console.log(response);

                    const cardHtml = `
                    
                       <ul class="card-texts" data-card-id="${response.id}">
                                            <span class="card-text-span">${response.name}</span>
                                            <div>
                                                <button class="düzenle_svg modalBtn" data-bs-toggle="modal"
                                                    data-bs-target="#btn${response.id}">
                                                    <svg fill="none" width="14" height="14" viewBox="0 0 16 16" role="presentation">
                                                        <path stroke="currentcolor" stroke-linejoin="round" stroke-width="1.5"
                                                            d="M6 1.751H3c-.69 0-1.25.56-1.25 1.25v10c0 .69.56 1.25 1.25 1.25h10c.69 0 1.25-.56 1.25-1.25V10m-.75-5 1.116-1.116a1.25 1.25 0 0 0 0-1.768l-.732-.732a1.25 1.25 0 0 0-1.768 0L11 2.5M13.5 5 9.479 9.021c-.15.15-.336.26-.54.318l-3.189.911.911-3.189a1.25 1.25 0 0 1 .318-.54L11 2.5M13.5 5 11 2.5">
                                                        </path>
                                                    </svg>
                                                </button>

                                                <div class="modal fade modalMenu2" id="btn${response.id}" tabindex="-1"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog position-absolute w-100 m-0">
                                                        <div class="modal-content bg-transparent border-0">
                                                            <button type="button" class="btn btn-secondary d-none closeModal"
                                                                data-bs-dismiss="modal"></button>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <form class="modalEditForm" method="POST">
                                                                        <textarea name="name" class="form-control shadow-none mb-2"
                                                                            rows="4">${response.name}</textarea>
                                                                        <button
                                                                            class="btn btn-primary shadow-none me-auto modalAddBtn"
                                                                            type="button">
                                                                            Kaydet
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="d-flex flex-column gap-1">
                                                                        <button
                                                                            class="btn btn-dark shadow-none modalInnerBtn me-auto"
                                                                            type="button">
                                                                            <i class="fa-solid fa-tachograph-digital"></i> Kartı Aç
                                                                        </button>
                                                                        <button
                                                                            class="btn btn-dark shadow-none modalInnerBtn me-auto"
                                                                            type="button">
                                                                            <i class="fa-solid fa-tag"></i> Etiketleri Düzenle
                                                                        </button>
                                                                        <button
                                                                            class="btn btn-dark shadow-none modalInnerBtn me-auto"
                                                                            type="button">
                                                                            <i class="fa-solid fa-user"></i> Üyeleri Değiştir
                                                                        </button>
                                                                        <button
                                                                            class="btn btn-dark shadow-none modalInnerBtn me-auto"
                                                                            type="button">
                                                                            <i class="fa-solid fa-credit-card"></i> Kapağı Değiştir
                                                                        </button>
                                                                        <button
                                                                            class="btn btn-dark shadow-none modalInnerBtn me-auto"
                                                                            type="button">
                                                                            <i class="fa-solid fa-arrow-right"></i> Taşı
                                                                        </button>
                                                                        <button
                                                                            class="btn btn-dark shadow-none modalInnerBtn me-auto"
                                                                            type="button">
                                                                            <i class="fa-solid fa-tachograph-digital"></i> Kopyala
                                                                        </button>
                                                                        <button
                                                                            class="btn btn-dark shadow-none modalInnerBtn me-auto"
                                                                            type="button">
                                                                            <i class="fa-regular fa-clock"></i> Tarihleri Düzenle
                                                                        </button>
                                                                        <button
                                                                            class="btn btn-dark shadow-none modalInnerBtn me-auto deleteCardBtn"
                                                                            type="button" data-id="${response.id}">
                                                                            <i class="fa-solid fa-box-archive"></i> Sil
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </ul>
                                      
                                      
                                      `;

                    $form
                        .closest(".card")
                        .find(".card-text-body")
                        .append(cardHtml);

                    $form[0].reset();
                    $form
                        .closest(".card")
                        .find(".addCardDiv")
                        .addClass("d-none");
                    $form
                        .closest(".card")
                        .find(".card-add")
                        .removeClass("d-none");
                },
                error: function (xhr) {
                    console.log(xhr.responseJSON);
                },
            });
        });
    $(document).on("click", ".modalAddBtn", function () {
        var $form = $(this).closest("form");
        var cardId = $(this).closest(".modal").attr("id").replace("btn", "");
        var updatedName = $form.find('textarea[name="name"]').val();

        var formData = {
            _token: $('meta[name="csrf-token"]').attr("content"),
            id: cardId,
            name: updatedName,
        };

        $.ajax({
            url: "/cardUpdate",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function (response) {
                console.log(response);

                var cardHtml = `<span>${response.name}</span>`;
                $(`ul[data-card-id="${response.id}"]`)
                    .find(".card-text-span")
                    .html(cardHtml);

                $form.closest(".modal").modal("hide");
                $(".modal-backdrop").remove();
            },
            error: function (xhr) {
                console.log(xhr.responseJSON);
            },
        });
    }),
        $(document).on("click", ".editable", function () {
            var $span = $(this);
            var $input = $span.next(".edit-input");

            $span.addClass("d-none");
            $input.removeClass("d-none").focus().select();
        });

    $(document).on("blur", ".edit-input", function () {
        updateListName($(this));
    });

    $(document).on("keypress", ".edit-input", function (e) {
        if (e.which === 13) {
            e.preventDefault();
            updateListName($(this));
        }
    });

    function updateListName($input) {
        var newName = $input.val();
        var id = $input.data("id");
        var $span = $input.prev(".editable");

        if (!newName.trim()) {
            alert("İsim boş olamaz.");
            return;
        }

        $.ajax({
            url: "/listUpdate",
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                id: id,
                name: newName,
            },
            success: function (response) {
                $span.text(response.name);
            },
            error: function () {},
            complete: function () {
                $input.addClass("d-none");
                $span.removeClass("d-none");
            },
        });
    }

    $(document).on("click", ".deleteCardBtn", function () {
        var cardId = $(this).data("id");
        var $cardElement = $(`ul[data-card-id="${cardId}"]`);

        $.ajax({
            url: "/cardDelete",
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                id: cardId,
            },
            success: function (response) {
                $cardElement.remove();

                $(".modal").modal("hide");
                $(".modal-backdrop").remove();
                $("body").removeClass("modal-open").css("padding-right", "");
            },
            error: function () {},
        });
    });

    $("#panoName").on("click", function () {
        const $span = $(this);
        const $input = $("#editPanoInput");
        const $widthCalc = $("#widthCalculator");
        const $projectTitleContainer = $(".project-title");
        const panoId = $span.data("card-id");

        if (!$input.hasClass("d-none")) {
            const updatedName = $input.val();
            $.ajax({
                url: "/update-pano-name",
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    name: updatedName,
                    pano_id: panoId,
                },
                success: function (response) {
                    if (response.success) {
                        $span.text(updatedName);
                        $input.addClass("d-none");
                        $projectTitleContainer.removeClass("d-none");
                    } else {
                    }
                },
                error: function () {},
            });
        } else {
            $input.removeClass("d-none").focus();
            $projectTitleContainer.addClass("d-none");

            $widthCalc.text($input.val());
            $input.width($widthCalc.width() + 20);
        }
    });

    $("#editPanoInput").on("keydown", function (e) {
        if (e.key === "Enter") {
            e.preventDefault();
            const updatedName = $(this).val();
            const panoId = $("#panoName").data("card-id");
            const $span = $("#panoName");
            const $input = $(this);
            const $projectTitleContainer = $(".project-title");

            $.ajax({
                url: "/update-pano-name",
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    name: updatedName,
                    pano_id: panoId,
                },
                success: function (response) {
                    if (response.success) {
                        $span.text(updatedName);
                        $input.addClass("d-none");
                        $projectTitleContainer.removeClass("d-none");
                    } else {
                    }
                },
                error: function () {},
            });
        }
    });

    $("#canvasSidebar").click(function () {
        $(this).addClass("d-none");
        $(".container-two").addClass("flex-shrink-1");
    });
    $(".listAdd-button").click(function () {
        $(this).addClass("d-none");
        $(".List-add-form").removeClass("d-none");
        $(".inpt-List").focus();
    });
    $(".btn-back").click(function () {
        $(".List-add-form").addClass("d-none");
        $(".listAdd-button").removeClass("d-none");
    });
    $(document).on("click", function (e) {
        if (
            !$(e.target).closest(".List-add-form").length &&
            !$(e.target).hasClass("listAdd-button")
        ) {
            $(".List-add-form").addClass("d-none");
            $(".listAdd-button").removeClass("d-none");
        }
    });

    $(".panoBasligi_inpt").on("input", function () {
        if ($(this).val().length === 0) {
            $(".nameSpan").show();
            $(".pano-add-button")
                .addClass("none-button")
                .removeClass("pano-add-button")
                .prop("disabled", true);
        } else {
            $(".nameSpan").hide();
            $(".none-button")
                .addClass("pano-add-button")
                .removeClass("none-button")
                .prop("disabled", false);
        }
    });

    $("#canvasSidebarClose").click(function (e) {
        $("#canvasSidebar").removeClass("d-none");
        $(".container-two").removeClass("flex-shrink-1");
    });

    $(".sidebar-main-button").click(function (e) {
        $(".sidebar").addClass("d-none");
        $(".sidebar-open-button").removeClass("d-none");
        $(".container-two").css({
            width: "calc(100% - 0px)",
        });
        $(".container-sidebar-right").css({
            "padding-right": "16px",
        });
    });
    $(".sidebar-open-button").click(function (e) {
        $(".sidebar").removeClass("d-none");
        $(".sidebar-open-button").addClass("d-none");
        $(".container-two").css({
            width: "calc(100% - 260px)",
        });
        $(".container-sidebar-right").css({
            "padding-right": "0px",
        });
    });
});

$(".card-container").on("click", ".btn-add", function (e) {
    let card = $(this).closest(".card");
    card.find(".addCardDiv").removeClass("d-none");
    card.find(".card-add").addClass("d-none");
});

$(".card-container").on("click", ".btn-back-card", function (e) {
    let card = $(this).closest(".card");
    card.find(".addCardDiv").addClass("d-none");
    card.find(".card-add").removeClass("d-none");
});
$(document).ready(function () {
    $(".delete-list-btn").on("click", function (e) {
        e.preventDefault();
        let listId = $(this).data("list-id");

        $.ajax({
            url: "/list/delete/" + listId,
            type: "DELETE",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                if (response.success) {
                    location.reload();
                }
            },
            error: function (xhr) {
                alert("Bir hata oluştu.");
            },
        });
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const textarea = document.querySelector(".card-texts-inpt");

    if (textarea) {
        textarea.setAttribute(
            "style",
            "height:" + textarea.scrollHeight + "px;overflow-y:hidden;"
        );
        textarea.addEventListener("input", function () {
            this.style.height = "auto";
            this.style.height = this.scrollHeight + "px";
        });
    }
});
$(".card-container").on("click", ".modalBtn", function () {
    let a = $(this).parent().offset().top;
    let b = $(this).parent().offset().left;
    $(this)
        .siblings(".modalMenu2")
        .css({
            top: a + "px",
            left: b + "px",
        });
});

function resizeInput() {
    $(this).attr("size", $(this).val().length);
}

$('input#editPanoInput[type="text"]').keyup(resizeInput);

$(document).ready(function () {
    $(".profile-form").on("submit", function (e) {
        e.preventDefault();

        $.ajax({
            url: "/updateProfile",
            type: "POST",
            data: new FormData(e.target),
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
                var cardHtml = `
                <div class="alert alert-success alert-bottom-left">
            ${response.message}
        </div>
                `;
                $(".profile").append(cardHtml);
                $(".profile-form-input").val(response.name);

                $(".profile-span-name").text(response.name);
            },
            error: function (xhr) {
                alert("Bir hata oluştu.");
            },
        });
    });
});
