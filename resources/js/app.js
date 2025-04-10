
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const sortHandle = () => {
    $('.sortable').sortable({
        connectWith: '.sortable',
        start: function (event, ui) {
            ui.item.addClass('tilt');
            ui.item.css('opacity', '0.7');
            ui.item.css('border', 'none');
        },
        stop: function (event, ui) {
            ui.item.removeClass('tilt');
            ui.item.css('opacity', '');
            $('.card').removeClass('hover-border');
            $('.card-texts').hover(function () {
                $(this).css('border', '2px solid #388bff');
            }, function () {
                $(this).css('border', '');
            });
        },
        placeholder: "beratholder",
        group: 'nested',
        afterMove: function (placeholder, container) {
            if (oldContainer != container) {
                if (oldContainer)
                    oldContainer.el.removeClass("active");
                container.el.addClass("active");

                oldContainer = container;
            }
        },
        over: function (event, ui) {
            $(ui.placeholder).css({ height: ui.item.height() + 10 });
            $(ui.placeholder).closest('.card').addClass('hover-border').css('box-shadow', '0 4px 8px rgba(0, 0, 0, 0.2)');
        },
        out: function (event, ui) {
            $(ui.placeholder).closest('.card').removeClass('hover-border').css('box-shadow', '');
        },
        update: function (event, ui) {
            let cardId = ui.item.data('card-id');
            let NListId = ui.item.closest('.sortable-container').data('list-id');

            $.ajax({
                url: '/card/update-list',
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    card_id: cardId,
                    new_list_id: NListId
                },
            });
        }
    });
}

$(document).ready(function () {
    sortHandle();

    $('<style>.hover-border { border: 2px solid #007bff; }</style>').appendTo('head');

    const input = $('.input-srch');
    const noneElement = $('.right-search');
    const premiumButton = $('.right-premium-button');

    input.on('focus', () => {
        noneElement.css({
            width: '600px',
            'background-color': 'white',
            color: '#975173',
        });
        input.css('background-color', 'white');
        input.addClass('focused');
        premiumButton.hide();
    });

    input.on('blur', () => {
        premiumButton.show();
        input.removeClass('focused');
        input.css({
            width: '100%',
            'background-color': '#975173',
            color: '#975173',
        });
        noneElement.css({
            width: '',
            'background-color': '#975173',
            color: '#ffff',
            display: 'flex',
        });
    });
    $(".formListAdd").on("submit", function (e) {
        e.preventDefault();
        var form = $(this).serialize(e);

        $.ajax({
            url: '/ListAdd',
            type: 'POST',
            data: {
                name: $(this).find('input[name=name]').val(),
                pano_id: $(this).find('input[name=pano_id]').val(),
                _token: $(this).find('input[name=_token]').val()
            },
            dataType: 'json',
            success: function (response) {
                const listId = response.id;
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const cardHtml = `
                    <div class="sortable-container" data-list-id="${listId}">
                        <div class="card" style="width: 17rem">
                            <div class="card-body">
                                <div class="card-title">
                                    <span>${response.name}</span>
                                    <div class="project-title-logo"> ... </div>
                                </div>
                                <div class="card-text-body sortable">
                                </div>
                                    <form class="card-add-form" method="POST">
                                        <input type="hidden" name="_token" value="${csrfToken}">
                                        <div class="addCardDiv d-none">
                                            <span class="cardAddinpt">
                                                <textarea class="card-texts-inpt" name="name" placeholder="Bir başlık girin..."></textarea>
                                                <input type="hidden" name="list_id" value="${listId}">
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
            
                $('.card-container').append(cardHtml);    
                sortHandle(); 
            }
            
        })
    }),

        $(".card-container").on("submit",".card-add-form", function (e) {
            e.preventDefault();

            let $form = $(this);
            let formData = $form.serialize();

            $.ajax({
                url: '/cardAdd',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    console.log(response);
            
                    const cardHtml = `<ul class="card-texts" data-card-id="${response.id}">
                                        <span>${response.name}</span>
                                      </ul>`;
            
                    $form.closest(".card").find(".card-text-body").append(cardHtml);
            
                    $form[0].reset();
                    $form.closest('.card').find(".addCardDiv").addClass("d-none");
                    $form.closest('.card').find(".card-add").removeClass("d-none");
                },
                error: function (xhr) {
                    console.log(xhr.responseJSON);
                    alert("Bir hata oluştu. Lütfen tüm alanları doldurduğundan emin ol.");
                }
            });
        });

    $("#canvasSidebar").click(function () {
        $(this).addClass("d-none");
        $(".container-two").addClass("flex-shrink-1");
    })
    $(".listAdd-button").click(function () {
        $(this).addClass("d-none");
        $(".List-add-form").removeClass("d-none");
        $(".inpt-List").focus();
    })
    $(".btn-back").click(function () {
        $(".List-add-form").addClass("d-none");
        $(".listAdd-button").removeClass("d-none");
    })
    $(document).on("click", function (e) {
        if (!$(e.target).closest('.List-add-form').length && !$(e.target).hasClass('listAdd-button')) {
            $(".List-add-form").addClass("d-none");
            $(".listAdd-button").removeClass("d-none");
        }
    });

    $(".panoBasligi_inpt").on("input", function () {
        if ($(this).val().length === 0) {
            $(".nameSpan").show();
            $(".pano-add-button").addClass("none-button").removeClass("pano-add-button").prop("disabled", true);
        } else {
            $(".nameSpan").hide();
            $(".none-button").addClass("pano-add-button").removeClass("none-button").prop("disabled", false);
        }
    });


    $("#canvasSidebarClose").click(function (e) {
        $("#canvasSidebar").removeClass("d-none");
        $(".container-two").removeClass("flex-shrink-1");
    });

    $(".sidebar-main-button").click(function (e) {
        $(".sidebar").addClass("d-none");
        $(".sidebar-open-button").removeClass('d-none');
        $(".container-two").css({
            width: 'calc(100% - 0px)'
        });
        $(".container-sidebar-right").css({
            'padding-right': '16px'
        });
    });
    $(".sidebar-open-button").click(function (e) {
        $(".sidebar").removeClass("d-none");
        $(".sidebar-open-button").addClass('d-none');
        $(".container-two").css({
            width: 'calc(100% - 260px)'
        });
        $(".container-sidebar-right").css({
            'padding-right': '0px'
        });
    });
});

$(".card-container").on("click", ".btn-add", function (e) {
    let card = $(this).closest('.card');
    card.find(".addCardDiv").removeClass("d-none");
    card.find(".card-add").addClass("d-none");
});

$(".card-container").on("click", ".btn-back-card", function (e) {
    let card = $(this).closest('.card');
    card.find(".addCardDiv").addClass("d-none");
    card.find(".card-add").removeClass("d-none");
});

document.addEventListener("DOMContentLoaded", function () {
    const textarea = document.querySelector(".card-texts-inpt");

    if (textarea) {
        textarea.setAttribute("style", "height:" + textarea.scrollHeight + "px;overflow-y:hidden;");
        textarea.addEventListener("input", function () {
            this.style.height = "auto";
            this.style.height = this.scrollHeight + "px";
        });
    }
});


