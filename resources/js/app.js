$(document).ready(function () {
    var oldContainer;

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
        onDrop: function ($item, container, _super) {
            container.el.removeClass("active");
            $('.card').removeClass('hover-border');
            _super($item, container);
        },
        over: function (event, ui) {
            $(ui.placeholder).css({ height: ui.item.height() + 10 })
            $(ui.placeholder).closest('.card').addClass('hover-border').css('box-shadow', '0 4px 8px rgba(0, 0, 0, 0.2)');
        },
        out: function (event, ui) {
            $(ui.placeholder).closest('.card').removeClass('hover-border').css('box-shadow', '');
        }
    });


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


    $("#canvasSidebar").click(function () {
        $(this).addClass("d-none");
        $(".container-two").addClass("flex-shrink-1");
    })

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
