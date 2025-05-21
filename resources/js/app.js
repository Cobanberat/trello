import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

import backgrounds from "/public/backgrounds.json";

const sortHandle = () => {
    $(".sortable").sortable({
        connectWith: ".sortable",
        cancel: ".modal",
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
                                            <button type="button" class="btn-close shadow-none position-absolute end-0 px-3" onclick="document.body.click()" data-bs-auto-close="outside"
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
                                     <div class="btn-group">
                                        <div class="project-title-logo cursor-pointer dropdown-toggle"
                                            data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"
                                            id="card-add-logo">
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
                                        <ul class="dropdown-menu dropdown-menu-lg-start dropdown-appearance-card">
                                            <div class="ust-text">
                                                <div class="text-visibility-appearance">
                                                    <span>Kart Şablonları</span>
                                                </div>
                                                <div class="exit-visibility">
                                                    <span> <i class="bi bi-x"></i> </span>
                                                </div>
                                            </div>
                                            <div class="dropdown-body d-flex flex-column gap-2">
                                                <div class="dropdown-body-span">
                                                <span>Hiçbir şablonunuz yok. Kartları
                                                    kopyalamayı kolaylaştırmak için bir şablon oluşturun.</span>
                                                </div>
                                                <div class="powerBody-button">
                                                    <button># Yeni Bir Şablon Oluştur</button>
                                                </div>
                                            </div>
                                        </ul>
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
                       <div class="cardColor d-none" data-card-id="${response.id}">
                                            </div>
                                           <div data-card-id='${response.id}'
                                            class="d-flex align-items-center justify-content-between w-100 pDiv">
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

                                                  <div class="modal fade modalMenu2" id="btn${response.id}"
                                                        tabindex="-1">
                                                        <div class="modal-dialog position-absolute w-100 m-0">
                                                            <div class="modal-content bg-transparent border-0">
                                                                <button type="button"
                                                                    class="btn btn-secondary d-none closeModal"
                                                                    data-bs-dismiss="modal"></button>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <form class="modalEditForm" method="POST">                                                                            <textarea name="name" class="form-control shadow-none mb-2" rows="4">${response.name}</textarea>
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
                                                                                <i
                                                                                    class="fa-solid fa-tachograph-digital"></i>
                                                                                # Kartı Aç
                                                                            </button>
                                                                            <button
                                                                                class="btn btn-dark shadow-none modalInnerBtn me-auto"
                                                                                type="button">
                                                                                <i class="fa-solid fa-tag"></i># Etiketleri
                                                                                Düzenle
                                                                            </button>
                                                                            <button
                                                                                class="btn btn-dark shadow-none modalInnerBtn me-auto"
                                                                                type="button">
                                                                                <i class="fa-solid fa-user"></i># Üyeleri
                                                                                Değiştir
                                                                            </button>
                                                                            <div class="dropend">
                                                                                <button data-bs-toggle="dropdown"
                                                                                
                                                                                    aria-expanded="false"
                                                                                    data-bs-auto-close="outside"
                                                                                    class="btn btn-dark shadow-none modalInnerBtn me-auto"
                                                                                    type="button">
                                                                                    <i class="fa-solid fa-credit-card"></i>
                                                                                    Kapağı
                                                                                    Değiştir
                                                                                </button>
                                                                                <div class="pano-add-form dropdown-menu"
                                                                                    data-bs-auto-close="outside">
                                                                                    <form method="post">
                                                                                        @csrf
                                                                                        <div
                                                                                            class="d-flex flex-column gap-2">
                                                                                            <div class="ust-text">
                                                                                                <div
                                                                                                    class="text-visibility-imgAdd">
                                                                                                    <span>Kapak</span>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="exit-visibility-imgAdd">
                                                                                                    <span onclick="document.body.click()"> <i
                                                                                                            class="bi bi-x"></i>
                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="d-flex flex-column">
                                                                                            <span
                                                                                                class="arkpln-text">Boyut</span>
                                                                                            <div
                                                                                                class="d-flex flex-column">
                                                                                                <div class="d-flex gap-2">
                                                                                                    <div
                                                                                                        class="d-flex flex-column img-show gap-2">
                                                                                                        <div
                                                                                                            class="check-img">
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="check-img-bgColor">
                                                                                                            <div
                                                                                                                class="cizgi-full">
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="cizgi-ort">
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="cizgi-low">
                                                                                                                <div
                                                                                                                    class="d-flex align-items-center w-100 gap-1">
                                                                                                                    <span
                                                                                                                        class="cizgi-low-tp"></span>
                                                                                                                    <span
                                                                                                                        class="cizgi-low-tp"></span>
                                                                                                                </div>
                                                                                                                <span
                                                                                                                    class="cizgi-top"></span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="d-flex flex-column justify-content-end img-show-two gap-2">

                                                                                                        <div
                                                                                                            class="check-img-bgColor">
                                                                                                            <div
                                                                                                                class="cizgi-full-two">
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="cizgi-ort-two">
                                                                                                            </div>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <br>
                                                                                                <div
                                                                                                    class="d-flex flex-column gap-2">
                                                                                                    <span
                                                                                                        class="arkpln-text">Renkler</span>
                                                                                                    <div style="padding-left:5px;padding-right:5px;"
                                                                                                        class="d-flex justify-content-center flex-wrap gap-2">
                                                                                                        <span class="renk-button select-color" id="renk1" data-color="#4bce97" data-card-id="${response.id}"></span>
                                                                                                        <span class="renk-button select-color" id="renk2" data-color="#f5cd47" data-card-id="${response.id}"></span>
                                                                                                        <span class="renk-button select-color" id="renk3" data-color="#fea362" data-card-id="${response.id}"></span>
                                                                                                        <span class="renk-button select-color" id="renk4" data-color="#f87168" data-card-id="${response.id}"></span>
                                                                                                        <span class="renk-button select-color" id="renk5" data-color="#9f8fef" data-card-id="${response.id}"></span>
                                                                                                        <span class="renk-button select-color" id="renk6" data-color="#579dff" data-card-id="${response.id}"></span>
                                                                                                        <span class="renk-button select-color" id="renk7" data-color="#6cc3e0" data-card-id="${response.id}"></span>
                                                                                                        <span class="renk-button select-color" id="renk8" data-color="#94c748" data-card-id="${response.id}"></span>
                                                                                                        <span class="renk-button select-color" id="renk9" data-color="#e774bb" data-card-id="${response.id}"></span>
                                                                                                        <span class="renk-button select-color" id="renk10" data-color="#8590a2" data-card-id="${response.id}"></span>
                                                                                                    </div>

                                                                                                    <br>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="d-flex flex-column">
                                                                                                    <div
                                                                                                        class="d-flex align-items-center justify-content-center w-100">
                                                                                                        <div
                                                                                                            class="img-rnk-text">
                                                                                                            # Renk körlüğü
                                                                                                            erişilebilirlik
                                                                                                            modunu
                                                                                                            etkinleştir     
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <br>
                                                                                                    <div
                                                                                                        class="w-100 d-flex align-items-center justify-content-center">
                                                                                                        <div
                                                                                                            class="cizgi-file">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <br>
                                                                                                    <span
                                                                                                        class="arkpln-text"
                                                                                                        style="padding-left:15px; ">Eklentiler</span>
                                                                                                    <div
                                                                                                        class="d-flex align-items-center justify-content-center w-100">
                                                                                                        <div
                                                                                                            class="img-rnk-text-kapak">
                                                                                                            <label
                                                                                                                for="kapak-sec"
                                                                                                                class="img-select-label">#
                                                                                                                Sadece
                                                                                                                bir kapak
                                                                                                                resmi
                                                                                                                yükleyin</label>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <br>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                            <button
                                                                                class="btn btn-dark shadow-none modalInnerBtn me-auto"
                                                                                type="button">
                                                                                <i class="fa-solid fa-arrow-right"></i>#
                                                                                Taşı
                                                                            </button>
                                                                            <button
                                                                                class="btn btn-dark shadow-none modalInnerBtn me-auto"
                                                                                type="button">
                                                                                <i
                                                                                    class="fa-solid fa-tachograph-digital"></i>
                                                                                # Kopyala
                                                                            </button>
                                                                            <button
                                                                                class="btn btn-dark shadow-none modalInnerBtn me-auto"
                                                                                type="button">
                                                                                <i class="fa-regular fa-clock"></i>#
                                                                                Tarihleri
                                                                                Düzenle
                                                                            </button>
                                                                            <button
                                                                                class="btn btn-dark shadow-none modalInnerBtn me-auto deleteCardBtn"
                                                                                type="button"
                                                                                data-id="${response.id}">
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
                $(`.cardColor[data-card-id="${response.id}"] ~ .pDiv`)
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
            error: function () { },
            complete: function () {
                $input.addClass("d-none");
                $span.removeClass("d-none");
            },
        });
    }

    $(document).on("click", ".deleteCardBtn", function () {
        var cardId = $(this).data("id");
        var $cardElement = $(`.card-texts[data-card-id="${cardId}"]`);

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
            error: function () { },
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
                error: function () { },
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
                error: function () { },
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
    if ($(".panoBasligi_inpt").val().length === 0) {
        $(".nameSpan").show();
        $(".pano-add-button")
            .addClass("none-button")
            .removeClass("pano-add-button")
            .prop("disabled", true);
    }

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
    let a = $(this).parent().parent().offset().top;
    let b = $(this).parent().parent().offset().left;

    $(this)
        .siblings(".modalMenu2")
        .children(".modal-dialog")
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
    $(".trello-click-btn").on("click", function () {
        $(".trello-click-btn-sidebar").slideToggle(200);

        const icon = $(this).find("i");

        if (icon.hasClass("bi-chevron-up")) {
            icon.removeClass("bi-chevron-up").addClass("bi-chevron-down");
        } else {
            icon.removeClass("bi-chevron-down").addClass("bi-chevron-up");
        }
    });

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

document.addEventListener("DOMContentLoaded", function () {
    const exitBtn = document.querySelector(".exit-visibility");

    if (exitBtn) {
        exitBtn.addEventListener("click", function () {
            const dropdownInstance =
                bootstrap.Dropdown.getInstance(dropdownToggle) ||
                new bootstrap.Dropdown(dropdownToggle);
            dropdownInstance.hide();
        });
    }
});

document.querySelectorAll(".star-toggle").forEach(function (checkbox) {
    checkbox.addEventListener("change", function () {
        const panoId = this.dataset.panoId;
        const isChecked = this.checked;

        const url = isChecked ? "/favori-ekle" : "/favori-sil";

        fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: JSON.stringify({
                pano_id: panoId,
            }),
        })
            .then((response) => response.json())
            .then((data) => {
                console.log(data.message);
            })
            .catch((error) => {
                console.error("İstek başarısız:", error);
            });
    });
});
$(document).ready(function () {
    $('.board-link').on('click', function (e) {
        e.preventDefault();

        const boardId = $(this).data('id');
        const boardUrl = $(this).attr('href');

        $.ajax({
            url: '/save-last-board',
            method: 'POST',
            data: {
                board_id: boardId,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {
                window.location.href = boardUrl;
            }
        });
    });


    $(document).on("click", ".select-color", function () {
        var cardId = $(this).data("card-id");
        var selectedColor = $(this).data("color");

        $(".select-color").removeClass("selected-color");

        $(this).addClass("selected-color");

        if (!cardId || !selectedColor) {
            console.log("Card ID veya renk seçilmedi.");
            return;
        }

        var formData = new FormData();
        formData.append("card_id", cardId);
        formData.append("selectedColor", selectedColor);

        var selectedImage = "";
        if (selectedImage) {
            formData.append("selectedImage", selectedImage);
        }

        $.ajax({
            url: "/save-selection",
            method: "POST",
            data: formData,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            processData: false,
            contentType: false,
            success: function (response) {
                const cardColorDiv = $(
                    ".cardColor[data-card-id='" + cardId + "']"
                );
                const cizgiImg = $('.check-img');
                const cizgiImgTwo = $('.img-show-two');
                const modalBackground = $(
                    ".modal-background[data-card-id='" + cardId + "']"
                );

                cizgiImg
                    .css("background-color", response.renk);
                cizgiImgTwo
                    .css("background-color", response.renk);
                modalBackground
                    .css("background-color", response.renk);
                modalBackground
                    .css("display", 'block');


                cardColorDiv
                    .removeClass("d-none")
                    .css("background-color", response.renk);

                $('.pDiv[data-card-id="' + cardId + '"]').addClass("p-2");

                if (response.deleted) {
                    cardColorDiv.addClass("d-none");
                    $('.pDiv[data-card-id="' + cardId + '"]').removeClass("p-2");

                    $(
                        ".select-color[data-card-id='" + cardId + "']"
                    ).removeClass("selected-color");
                    cizgiImg
                        .css("background-color", '#52273c');
                    cizgiImgTwo
                        .css("background-color", '#52273c');
                    modalBackground.addClass("d-none");


                } else {
                }
            },
            error: function (xhr, status, error) {
                console.log("Hata oluştu: ", error);
            },
        });
    });


    $(document).on('mouseenter', '.add-explanation, .explanation-content', function () {
        $(this).css('background-color', '#d0d4db');
    }).on('mouseleave', '.add-explanation, .explanation-content', function () {
        $(this).css('background-color', '#e4e6ea');
    });

    $(document).on('click', '.add-explanation, .explanation-content', function () {
        const box = $(this).closest('[id^="explanation-box-"]');
        const id = box.data('id');
        const currentText = $(this).hasClass('explanation-content') ? $(this).text().trim() : '';

        const textareaForm = `
            <div class="textarea-wrapper">
                <textarea class="form-control" rows="4" id="explanation-input-${id}" placeholder="Açıklamanızı girin...">${currentText}</textarea>
                <div class="mt-2">
                    <button class="btn btn-primary btn-sm" data-id="${id}" class="save-explanation">Kaydet</button>
                    <button class="btn btn-sm cancel-explanation" style="background-color: #d0d4db;" data-id="${id}">İptal</button>
                </div>
            </div>
        `;

        box.html(textareaForm);
    });


    $(document).on('click', '.cancel-explanation', function () {
        const id = $(this).data('id');
        const box = $(`#explanation-box-${id}`);
        const currentText = box.find('textarea').val().trim();

        if (currentText === '') {
            box.html(`
                <div class="add-explanation" style="width: 100%; min-height: 60px; background-color: #e4e6ea; padding: 10px; cursor: pointer;">
                    Açıklama ekle...
                </div>
            `);
        } else {
            box.html(`
                <div class="explanation-content" style="width: 100%; min-height: 60px; background-color: #e4e6ea; padding: 10px; cursor: pointer;">
                    ${currentText}
                </div>
            `);
        }
    });
    $(document).on('click', '.btn.btn-primary', function () {
        const id = $(this).data('id');
        const explanation = $(`#explanation-input-${id}`).val().trim();

        if (explanation === '') {
            alert('Açıklama boş olamaz!');
            return;
        }

        $.ajax({
            url: "/explanation/update",
            method: "POST",

            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                id: id,
                explanation: explanation
            },
            success: function (response) {
                if (response.success) {
                    $(`#explanation-box-${id}`).html(`
                        <div class="explanation-content" style="width: 100%; min-height: 60px; background-color: #e4e6ea; padding: 10px; cursor: pointer;">
                            ${explanation}
                        </div>
                    `);
                } else {
                    alert('Kayıt başarısız.');
                }
            },
            error: function () {
                alert('Sunucu hatası oluştu.');
            }
        });
    });

    $(document).ready(function () {
        $('.color-box').on('click', function () {
            const $box = $(this);
            const $checkbox = $box.siblings('.checkboxTicket');
            const isChecked = $checkbox.prop('checked');
            const cardId = $checkbox.data('card-id');
            const color = $checkbox.data('card-color');

            $checkbox.prop('checked', !isChecked);

            if (!isChecked) {
                $.ajax({
                    url: '/colors',
                    type: 'POST',
                    data: {
                        card_id: cardId,
                        color: color,
                        _token: $('meta[name="csrf-token"]').attr("content"),

                    },
                    success: function (res) {
                        const html = `<div class="cardTicketsColor" data-color-code='${res.color}' data-card-id='${res.card_id}'] style="background-color:${res.color};"></div>`;
                        const html2 = `<span data-bs-toggle="dropdown"
                                                                            aria-expanded="false"
                                                                            data-bs-auto-close="outside"
                                                                            class="renk-button modalInnerBtn "
                                                                            style='background-color:${res.color}'
                                                                            data-color="${res.color}"
                                                                            data-card-id="${res.card_id}">
                                                                        </span>`;

                        $(`.AciklamaEtiketDiv[data-card-id="${res.card_id}"]`).append(html2);
                        $(`.Cardtickets[data-id="${res.card_id}"]`).append(html);
                        $('.pDiv').addClass('p-1')
                        $('.Cardtickets[data-id="' + res.card_id + '"]').removeClass('d-none')

                    },

                });
            } else {
                $.ajax({
                    url: '/colors/delete',
                    type: 'POST',
                    data: {
                        card_id: cardId,
                        color: color,
                        _token: $('meta[name="csrf-token"]').attr("content"),

                    },
                    success: function (res) {
                        $(`.cardTicketsColor[data-color-code='${res.color}'].cardTicketsColor[data-card-id='${res.card_id}']`).remove();
                        $(`.renk-button[data-color='${res.color}'].renk-button[data-card-id='${res.card_id}']`).remove();
                    },

                });
            }
        });
    });

    $('.btnPanoSil').click(function (e) {
        e.preventDefault();

        const panoId = $(this).data('id');

        $.ajax({
            url: `/pano/${panoId}`,
            type: 'POST',
            data: {
                _method: 'DELETE',
                _token: $('meta[name="csrf-token"]').attr("content")
            },
            success: function (res) {

                window.location.href = '/dashboard';

            },
            error: function (err) {
                console.error('Silme hatası:', err);
            }
        });
    });

    $('[id^=kapak-sec]').on('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;

        const cardId = $(this).data('card-id');

        const formData = new FormData();
        formData.append('kapak', file);
        formData.append('card_id', cardId);
        formData.append('_token', $('meta[name="csrf-token"]').attr("content"));

        $.ajax({
            url: '/kapak-yukle',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                console.log('Kapak resmi yüklendi:', res);
            },
            error: function (xhr) {
                console.error('Yükleme hatası:', xhr.responseText);
            }
        });
    });

    $('.imgEklenti').on('click', function (e) {

        $.ajax({
            url: '/kapak-update',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                id: $(this).data('id'),
                card_id: $(this).data('card-id')
            },

            success: function (res) {
                console.log('Kapak resmi güncellendi:', res);

            },
            error: function (xhr) {
                console.error('Yükleme hatası:', xhr.responseText);
            }
        });
    });


    $("#theme-inputs").on("change", "input[name='theme']", function () {
        document.documentElement.setAttribute("data-bs-theme", $(this).val());
    });

    console.log(backgrounds);
    
});