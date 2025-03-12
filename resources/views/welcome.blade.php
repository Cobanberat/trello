<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Trello</title>

    <!-- Fonts -->

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @endif
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"
        integrity="sha256-9zljDKpE/mQxmaR4V2cGVaQ7arF3CcXxarvgr7Sj8Uc=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @vite('resources/css/welcome.css')
    @vite('resources/js/welcome.js')
</head>

<body>
    <div class="d-flex flex-column position-relative">
        <header class="d-flex align-items-center justify-content-center header"
            style="background-color: rgb(255, 255, 255); position: fixed; width: 100%;">
            <div class="nav d-flex justify-content-between" style="width:90%; height: 60px;">
                <div class="leftHedaer d-flex align-items-center gap-3" style="height: 100%">
                    <div class="leftHeaderLogo">
                        <svg aria-label="Atlassian Trello" height="37.5" role="img" viewBox="0 0 312 105"
                            width="111.42857142857143" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" class="Logo-sc-1anfgcw-0 gguOta">
                            <linearGradient id="trello-logo-gradient-defaultMJFtCCgVhXrVl7v9HA7EH" x1="49.992%"
                                x2="49.992%" y1="100%" y2=".016%">
                                <stop offset="0" stop-color="#0052cc"></stop>
                                <stop offset="1" stop-color="#2684ff"></stop>
                            </linearGradient>
                            <path
                                d="m55.3 40.6h-47.5c-4.1 0-7.4 3.3-7.4 7.4v47.6c0 4.1 3.3 7.4 7.4 7.4h47.5c4.1 0 7.4-3.3 7.4-7.4v-47.6c0-4.1-3.3-7.4-7.4-7.4zm-28.1 44.9c0 1.4-1.1 2.5-2.5 2.5h-10.4c-1.4 0-2.5-1.1-2.5-2.5v-30.9c0-1.4 1.1-2.5 2.5-2.5h10.4c1.4 0 2.5 1.1 2.5 2.5zm24-14.2c0 1.4-1.1 2.5-2.4 2.5h-10.5c-1.4 0-2.5-1.1-2.5-2.5v-16.7c0-1.4 1.1-2.5 2.5-2.5h10.4c1.4 0 2.5 1.1 2.5 2.5z"
                                fill="url(#trello-logo-gradient-defaultMJFtCCgVhXrVl7v9HA7EH)"></path>
                            <g fill="#253858" transform="translate(87 40)">
                                <path d="m42.6 5.2v12.1h-14.3v45.7h-13.8v-45.8h-14.3v-12z"></path>
                                <path
                                    d="m60.2 63h-12.7v-45h12.7v8.6c2.4-6.1 6.3-9.7 13.2-9.2v13.3c-9-.7-13.2 1.5-13.2 8.7z">
                                </path>
                                <path
                                    d="m143 63.4c-8.4 0-13.6-4-13.6-13.5v-49.3h12.8v47.5c0 2.7 1.8 3.7 4 3.7.6 0 1.3 0 1.9-.1v11.1c-1.7.4-3.4.6-5.1.6z">
                                </path>
                                <path
                                    d="m169.8 63.4c-8.4 0-13.6-4-13.6-13.5v-49.3h12.8v47.5c0 2.7 1.8 3.7 4 3.7.6 0 1.3 0 1.9-.1v11.1c-1.7.4-3.4.6-5.1.6z">
                                </path>
                                <path
                                    d="m181 40.5c0-13.9 8-23.4 21.8-23.4s21.6 9.5 21.6 23.4-7.9 23.6-21.6 23.6-21.8-9.8-21.8-23.6zm12.5 0c0 6.8 2.8 12.1 9.3 12.1s9.1-5.4 9.1-12.1-2.8-12-9.1-12-9.3 5.2-9.3 12z">
                                </path>
                                <path
                                    d="m90.6 44.6c3.6.4 7.2.6 10.7.6 9.8 0 18-2.6 18-12.1 0-9.2-8.5-16.1-18.7-16.1-13.7 0-22.5 10-22.5 23.8 0 14.4 7.6 23 24.7 23 5.1.1 10.1-.8 14.9-2.6v-10.8c-4.4 1.4-9.4 2.8-14.4 2.8-6.8.1-11.5-2.2-12.7-8.6zm9.8-17.7c3.6 0 6.5 2.4 6.5 5.8 0 4.3-4.6 5.7-9.8 5.7-2.2 0-4.5-.2-6.7-.5.2-2.1.8-4.1 1.8-6 1.6-3.1 4.8-5 8.2-5z">
                                </path>

                            </g>
                            <g fill="#0052cc" transform="translate(94)">
                                <path
                                    d="m98.9 16.7c0-4-2.6-5.8-7.4-7-3-.8-3.7-1.4-3.7-2.4 0-1.2 1.1-1.8 3.1-1.8 2.4.1 4.8.7 7 1.8v-5c-2.1-1-4.5-1.5-6.8-1.5-5.3 0-8.2 2.5-8.2 6.6 0 3.9 2.6 5.9 7 6.9 3.1.7 4 1.2 4 2.5 0 1-.7 1.8-3 1.8-2.8-.1-5.6-.9-8.1-2.3v5.3c2.5 1.2 5.2 1.9 8 1.9 5.4 0 8.1-2.7 8.1-6.8z">
                                </path>
                                <path
                                    d="m159.3 1.2v22h4.7v-16.8l2 4.4 6.6 12.3h5.9v-22h-4.7v14.2l-1.8-4.1-5.3-10.1h-7.4z">
                                </path>
                                <path d="m129.6 1.2h-5.1v22h5.1z"></path>
                                <path d="m43.2 1.2v22h10.5l1.6-4.8h-7v-17.2z"></path>
                                <path d="m22.4 1.2v4.8h5.7v17.2h5.1v-17.2h6.1v-4.8z"></path>
                                <path
                                    d="m15 1.2h-6.7l-7.7 22h5.9l1.1-3.7c1.3.4 2.7.6 4.1.6s2.8-.2 4.1-.6l1.1 3.7h5.9zm-3.4 14.3c-1 0-1.9-.1-2.8-.4l2.8-9.6 2.8 9.6c-.9.3-1.8.4-2.8.4z">
                                </path>
                                <path
                                    d="m71.7 1.2h-6.7l-7.7 22h5.9l1.1-3.7c1.3.4 2.7.6 4.1.6s2.8-.2 4.1-.6l1.1 3.7h5.9zm-3.3 14.3c-1 0-1.9-.1-2.8-.4l2.8-9.6 2.8 9.6c-.9.3-1.9.4-2.8.4z">
                                </path>
                                <path
                                    d="m148 1.2h-6.7l-7.7 22h5.9l1.1-3.7c1.3.4 2.7.6 4.1.6s2.8-.2 4.1-.6l1.1 3.7h5.9zm-3.4 14.3c-1 0-1.9-.1-2.8-.4l2.8-9.6 2.8 9.6c-.9.3-1.8.4-2.8.4z">
                                </path>
                                <path
                                    d="m119.2 16.7c0-4-2.6-5.8-7.4-7-3-.8-3.7-1.4-3.7-2.4 0-1.2 1.1-1.8 3-1.8 2.4.1 4.8.7 7 1.8v-5c-2.2-1-4.5-1.5-6.9-1.5-5.3 0-8.2 2.5-8.2 6.6 0 3.9 2.6 5.9 7 6.9 3.1.7 4 1.2 4 2.5 0 1-.7 1.8-3 1.8-2.8-.1-5.6-.9-8.1-2.3v5.3c2.5 1.2 5.2 1.9 8 1.9 5.7 0 8.3-2.7 8.3-6.8z">
                                </path>
                            </g>
                        </svg>
                    </div>
                    <div class="options d-flex align-items-center gap-4">
                        <ul class="d-flex align-items-center gap-3">
                            <li class="d-flex align-items-center gap-1">
                                <span class="header-options-text"
                                    style="font-size: 1rem; font-weight:500;color: rgb(23, 43, 77);">Features</span>
                                <span><svg fill="currentColor" width="8" height="8" viewBox="0 0 13 8"
                                        width="13" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="m11.7305.59279c.3626.362629.3885.93447.0777 1.32699l-.0777.08722-4.99999 4.99999c-.36263.36263-.93446.38853-1.32697.0777l-.08725-.0777-4.999959-4.99997c-.3905249-.39052-.3905242-1.023685 0-1.414209.362629-.36263.934469-.388553 1.326989-.077728l.08722.077728 4.29292 4.292139 4.29284-4.29216c.3626-.36263.9345-.388532 1.327-.077707z">
                                        </path>
                                    </svg></span>
                            </li>
                        </ul>
                        <ul class="d-flex align-items-center gap-3">
                            <li class="d-flex align-items-center gap-1 ">
                                <span class="header-options-text"
                                    style="font-size: 1rem; font-weight:500;color: rgb(23, 43, 77);">Solutions</span>
                                <span><svg fill="currentColor" width="8" height="8" viewBox="0 0 13 8"
                                        width="13" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="m11.7305.59279c.3626.362629.3885.93447.0777 1.32699l-.0777.08722-4.99999 4.99999c-.36263.36263-.93446.38853-1.32697.0777l-.08725-.0777-4.999959-4.99997c-.3905249-.39052-.3905242-1.023685 0-1.414209.362629-.36263.934469-.388553 1.326989-.077728l.08722.077728 4.29292 4.292139 4.29284-4.29216c.3626-.36263.9345-.388532 1.327-.077707z">
                                        </path>
                                    </svg></span>
                            </li>
                        </ul>
                        <ul class="d-flex align-items-center gap-3">
                            <li class="d-flex align-items-center gap-1">
                                <span class="header-options-text"
                                    style="font-size: 1rem; font-weight:500;color: rgb(23, 43, 77);">Plans</span>
                                <span><svg fill="currentColor" width="8" height="8" viewBox="0 0 13 8"
                                        width="13" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="m11.7305.59279c.3626.362629.3885.93447.0777 1.32699l-.0777.08722-4.99999 4.99999c-.36263.36263-.93446.38853-1.32697.0777l-.08725-.0777-4.999959-4.99997c-.3905249-.39052-.3905242-1.023685 0-1.414209.362629-.36263.934469-.388553 1.326989-.077728l.08722.077728 4.29292 4.292139 4.29284-4.29216c.3626-.36263.9345-.388532 1.327-.077707z">
                                        </path>
                                    </svg></span>
                            </li>
                        </ul>
                        <ul class="d-flex align-items-center gap-3">
                            <li class="d-flex align-items-center gap-1">
                                <span class="header-options-text"
                                    style="font-size: 1rem; font-weight:500;color: rgb(23, 43, 77);">Pricing</span>
                               
                            </li>
                        </ul>
                        <ul class="d-flex align-items-center gap-3">
                            <li class="d-flex align-items-center gap-1 ">
                                <span class="header-options-text"
                                    style="font-size: 1rem; font-weight:500;color: rgb(23, 43, 77);">Resources</span>
                                <span><svg fill="currentColor" width="8" height="8" viewBox="0 0 13 8"
                                        width="13" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="m11.7305.59279c.3626.362629.3885.93447.0777 1.32699l-.0777.08722-4.99999 4.99999c-.36263.36263-.93446.38853-1.32697.0777l-.08725-.0777-4.999959-4.99997c-.3905249-.39052-.3905242-1.023685 0-1.414209.362629-.36263.934469-.388553 1.326989-.077728l.08722.077728 4.29292 4.292139 4.29284-4.29216c.3626-.36263.9345-.388532 1.327-.077707z">
                                        </path>
                                    </svg></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="rightHeader d-flex align-items-center justify-content-center p-3" style="height: 100%">
                    <div class="loginButton cursor-pointer d-flex align-items-center justify-content-center p-3">
                        <span style="font-size: 1.25rem; font-weight:500;color: rgb(23, 43, 77);"><a href="/login">Log
                                in</a></span>
                    </div>
                    <a href="/register">
                        <div class="registerButton d-flex align-items-center justify-content-center p-3">
                            <span style="font-size: 1.25rem; font-weight:500">Get Trello for free</span>
                        </div>
                    </a>
                </div>
            </div>
        </header>
        <div style="height: 60px; width: 100%;"></div>
        <nav class=" p-3 w-100 d-flex align-items-center justify-content-center"
            style="background-color: rgb(222, 235, 255); height: 60px;">
            <div class="d-flex align-items-center justify-content-center">
                <span style="color: rgb(9, 30, 66); font-weight: 500;">
                    Accelerate your teams' work with Atlassian Intelligence (AI) features 🤖 now available for all
                    Premium and Enterprise! <a class="LearnMoreText" href="">Learn more.</a>
                </span>
            </div>
        </nav>
        <div class="LbodyGradiant d-flex align-items-center justify-content-center w-100" style="height:686px;">
            <div class="d-flex flex-column gap-2" style="color:white; width: 40%;">
                <span style="font-size:3rem; line-height:1.25; font-weight: 500;">Trello brings all your tasks,
                    teammates, and tools
                    together</span>
                <span style="font-size:1.25rem; line-height: 1.25; font-weight: 400;">Keep everything in the same
                    place-even if your team </span>
                <span style="font-size:1.25rem; line-height: 1.25; font-weight: 400;">isn’t.</span>
                <br>
                <div class="d-flex align-items-center justify-content-start gap-3">
                    <input style="border-radius: 4px; width: 55%; color: black !important;" class="p-3 emailİnput"
                        type="mail" placeholder="Email">
                    <a href="register" class="p-3 signUpButton"> Sign up - it's free!</a>
                </div>
                <br>
                <span style="font-size:1.10rem;" class="watchVClass gap-2 d-flex align-items-center"> watch video <svg
                        fill="none" height="24" viewBox="0 0 24 24" width="24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="m5 5h14v14h-14z"></path>
                        <path clip-rule="evenodd"
                            d="m10.0138 16.3878c-.83597.4912-1.5138.105-1.5138-.8645v-7.04491c0-.97008.6755-1.358 1.5138-.86566l6.465 3.79747c.5548.3261.5589.8517 0 1.1801z"
                            fill="currentColor" fill-rule="evenodd"></path>
                        <circle cx="12" cy="12" r="11.5" stroke="currentColor"></circle>
                    </svg>
                </span>
            </div>
            <div class="d-flex flex-column align-items-center justify-content-end"
                style="color:white; width: 40%; height:759px">
                <img style="position:absolute; width:623px; height:579px" src="trelloMain.webp" alt="">
            </div>
        </div>
        <div style="color:#092c66;"
            class="trello101 d-flex flex-column w-100 justify-content-center align-items-center">
            <div class="d-flex flex-column justify-content-start p-3 gap-3" style="width:80%;">
                <span style=" font-size: 1rem; ine-height: 1.25; font-weight: 600;">TRELLO 101</span>
                <span style="font-weight: 600;font-size:2.25rem; line-height: 1.3333;"> A productivity
                    powerhouse</span>
                <span style="color: rgb(9 30 78); width:632px; font-weight: 500; font-size:1.25rem;">Simple, flexible,
                    and powerful. All it takes are boards, lists, and cards to get a clear view of
                    who’s doing what and what needs to get done. Learn more in our <a class="LearnMoreText"
                        href="">guide for getting
                        started</a>.</span>
            </div>
            <br>
            <div style="width:80%;" class="d-flex justify-content-start gap-4">
                <div class="">
                    <span class="cards activesCard">
                        <div>
                            <span style="font-size:1rem; font-weight: 500;">Boards</span>
                            <span style="font-size:1rem; font-weight: 500;">Trello boards keep tasks organized and work
                                moving forward. In a glance, see everything from “things to do” to “aww yeah, we did
                                it!”</span>
                        </div>
                        <div class="">

                        </div>
                    </span>
                    <span class="cards">
                        <span style="font-size:1rem; font-weight: 500;">Lists</span>
                        <span style="font-size:1rem; font-weight: 500;">The different stages of a task. Start as simple
                            as To Do, Doing or Done-or build a workflow custom fit to your team’s needs. There’s no
                            wrong way to Trello.</span>
                    </span>
                    <span class="cards">
                        <span style="font-size:1rem; font-weight: 500;">Cards</span>
                        <span style="font-size:1rem; font-weight: 500;">Cards represent tasks and ideas and hold all
                            the information to get the job done. As you make progress, move cards across lists to show
                            their status.</span>
                    </span>
                </div>
                <div class="pictures">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="boards.webp" width="100%" height="100%" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="Cards.webp" width="100%" height="100%" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="lists.webp" width="100%" height="100%" alt="">
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
        </div>
        <br>
        <br>
        <div style="width:100%;" class="d-flex align-items-center justify-content-center">
            <div class="d-flex flex-column gap-3" style="width:80%;">
                <span
                    style="font-size: 1rem;line-height: 1.25;text-transform: uppercase; font-weight: 500; color: rgb(9 30 78);">
                    Trello in action</span>
                <span style="font-size: 1.5rem;line-height: 1.25; font-weight: 500; color: rgb(9 30 78);">Workflows for
                    any project, big or small</span>
            </div>
        </div>
        <br><br>
        <br>
        <div class="d-flex align-items-center justify-content-center gap-4" style="width:100%">
            <div class="d-flex align-items-center justify-content-end gap-4" style="width:80%">
                <div class="swpBtn swiper-button-prevs">
                    <i class="bi bi-chevron-left"></i>
                </div>
                <div class="swpBtn swiper-button-nexts">
                    <i class="bi bi-chevron-right"></i>
                </div>
            </div>
        </div>
        <br>
        <div style="width:73%;" class="swipers cardSwiper d-flex  justify-content-center">
            <div class="d-flex swiper-wrapper" style="width:80%;">
                <div class="swpSlide swiper-slide">
                    <div class="card border-none">
                        <div style="background: rgb(255, 116, 82); height: 3rem; border-radius:6px 6px 0px 0px">
                            <div class="cardLogo"
                                style="height: 48px; width: 48px; background-image: url(https://images.ctfassets.net/rz1oowkt5gyp/5Oc1c9iIDmXtUFHs0uWuLQ/cef21b3212ac080d9d0adad649dc31e9/icon-content-folder_2x.png);">
                            </div>
                        </div>
                        <div class="d-flex flex-column" style="width:100%;padding: 2.25rem 1.5rem 1.5rem;">
                            <div style="" class="d-flex flex-column  gap-3">
                                <span
                                    style="font-weight:500;font-size:1.5rem;line-height:1.3333; color: rgb(9 30 78); ">
                                    Project management
                                </span>
                                <span
                                    style="font-weight:500;font-size:1rem;line-height:1.3333; color: rgb(9 30 78);">Keep
                                    tasks in order, deadlines on track, and team members aligned with Trello.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swpSlide swiper-slide ">
                    <div class="card border-none">
                        <div style="background: #2684ff; height: 3rem; border-radius:6px 6px 0px 0px">
                            <div class="cardLogo"
                                style="height: 48px; width: 48px; background-image: url(https://images.ctfassets.net/rz1oowkt5gyp/5j0J5BEzFktzLYnsszcJWc/be9270f9ea1e9bb3c69a799e54ef9fea/icon-object-megaphone_2x.png);">
                            </div>
                        </div>
                        <div class="d-flex flex-column " style="width:100%;padding: 2.25rem 1.5rem 1.5rem;">
                            <div class="d-flex flex-column justify-content-end gap-3">
                                <span
                                    style="font-weight:500;font-size:1.5rem;line-height:1.3333; color: rgb(9 30 78); ">
                                    Meetings
                                </span>
                                <span
                                    style="font-weight:500;font-size:1rem;line-height:1.3333; color: rgb(9 30 78);">Empower
                                    your team meetings to be more productive, empowering, and dare we say—fun.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swpSlide swiper-slide ">
                    <div class="card border-none">
                        <div style="background:#57d9a3; height: 3rem; border-radius:6px 6px 0px 0px">
                            <div class="cardLogo"
                                style="height: 48px; width: 48px; background-image: url(https://images.ctfassets.net/rz1oowkt5gyp/5JwPiAFuOJCWEdYiTqlfs3/ca86f7f918d09a1782284ba4578a28ec/icon-object-leaf_2x.png);">
                            </div>
                        </div>
                        <div class="d-flex flex-column justify-content-center"
                            style="width:100%;padding: 2.25rem 1.5rem 1.5rem;">
                            <div style="" class="d-flex flex-column justify-content-end gap-3">
                                <span
                                    style="font-weight:500;font-size:1.5rem;line-height:1.3333; color: rgb(9 30 78); ">
                                    Onboarding
                                </span>
                                <span
                                    style="font-weight:500;font-size:1rem;line-height:1.3333; color: rgb(9 30 78);">Onboarding
                                    to a new company or project is a snap with Trello’s visual layout of to-do’s,
                                    resources, and progress tracking.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" swpSlide swiper-slide">
                    <div class="card border-none">
                        <div style="background:#ffc400; height: 3rem; border-radius:6px 6px 0px 0px">
                            <div class="cardLogo"
                                style="height: 48px; width: 48px; background-image: url(https://images.ctfassets.net/rz1oowkt5gyp/4Mgm4SG6P6bD673rMtNpXP/9f8798510480b30d296550be747b9624/icon-content-checklists_2x.png);">
                            </div>
                        </div>
                        <div class="d-flex flex-column justify-content-center"
                            style="width:100%;padding: 2.25rem 1.5rem 1.5rem;">
                            <div style="" class="d-flex flex-column justify-content-end gap-3">
                                <span
                                    style="font-weight:500;font-size:1.5rem;line-height:1.3333; color: rgb(9 30 78); ">
                                    Task management
                                </span>
                                <span
                                    style="font-weight:500;font-size:1rem;line-height:1.3333; color: rgb(9 30 78);">Use
                                    Trello to track, manage, complete, and bring tasks together like the pieces of a
                                    puzzle, and make your team’s projects a cohesive success every time.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swpSlide swiper-slide ">
                    <div class="card border-none">
                        <div style="background:#00c7e5; height: 3rem; border-radius:6px 6px 0px 0px">
                            <div class="cardLogo"
                                style="height: 48px; width: 48px; background-image: url(https://images.ctfassets.net/rz1oowkt5gyp/x2AI5JZPTDVY7BxKbvClM/dc65b20bf0914caa72bcaf2ddbb05d9b/UseCasesBrainstorming.svg);">
                            </div>
                        </div>
                        <div class="d-flex flex-column justify-content-center"
                            style="width:100%;padding: 2.25rem 1.5rem 1.5rem;">
                            <div style="" class="d-flex flex-column justify-content-end gap-3">
                                <span
                                    style="font-weight:500;font-size:1.5rem;line-height:1.3333; color: rgb(9 30 78); ">
                                    Brainstorming
                                </span>
                                <span
                                    style="font-weight:500;font-size:1rem;line-height:1.3333; color: rgb(9 30 78);">Unleash
                                    your team’s creativity and keep ideas visible, collaborative, and actionable.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swpSlide swiper-slide ">
                    <div class="card border-none">
                        <div style="background: #f99cdb; height: 3rem; border-radius:6px 6px 0px 0px">
                            <div class="cardLogo"
                                style="height: 48px; width: 48px; background-image: url(https://images.ctfassets.net/rz1oowkt5gyp/5rv4eidOfMf1vdEzVpHNlA/bb102f380f9cfd3d1761858d8910963d/icon-object-book_2x.png);">
                            </div>
                        </div>
                        <div class="d-flex flex-column justify-content-center"
                            style="width:100%;padding: 2.25rem 1.5rem 1.5rem;">
                            <div style="" class="d-flex flex-column justify-content-end gap-3">
                                <span
                                    style="font-weight:500;font-size:1.5rem;line-height:1.3333; color: rgb(9 30 78); ">
                                    Resource hub
                                </span>
                                <span
                                    style="font-weight:500;font-size:1rem;line-height:1.3333; color: rgb(9 30 78);">Save
                                    time with a well-designed hub that helps teams find information easily and quickly.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div style="width:100%;"class="d-flex justify-content-center">
            <div style="width: 80%;" class="d-flex justify-content-between">
                <span style="font-size:1.2rem; font-weight: 500; color: #092c66; width: 65%">No need to start from
                    scratch. Jump-start your workflow with a proven playbook designed for different teams. Customize it
                    to make it yours.</span>
                <button class="exploreButton">Explore all Use Cases</button>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="workBackground">
            <div style="width:100%;" class="d-flex flex-column">
                <div style="width:100%" class="d-flex flex-column align-items-center gap-3 p-5">
                    <span style="font-size: 2.25rem; line-height: 1.33333; font-weight: 500;"> See work in a whole new
                        way </span>
                    <div class="d-flex flex-column align-items-center justify-content-center"
                        style="font-size: 1.25rem; font-weight: 500;">
                        <span> View your team’s projects from every angle
                            and bring a fresh perspective to </span>
                        <span>the task at hand.</span>
                    </div>
                    </span>
                    <button class="discoverButton">Discover all Trello views</button>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center gap-5">
                    <div class="cardSmain">
                        <div style="width:50%; height: 100%;">
                            <img src="https://images.ctfassets.net/rz1oowkt5gyp/5Hb09iiMrK6mSpThW5HS89/f5683a167ad3f74bed4dc7592ae5a002/TrelloBoard_Timeline_2x.png?w=1140&fm=webp"
                                alt="" srcset="">
                        </div>
                        <div class="d-flex flex-column justify-content-star gap-4" style="width:45%; height: 100%;">

                            <div class="d-flex align-items-center gap-3"
                                style="font-weight: 500;line-height: 1.25;text-transform: uppercase;">
                                <svg style="width:2rem!important; color:#8777d9 !important;" fill="currentColor"
                                    aria-hidden="true" viewBox="0 0 32 32">
                                    <path
                                        d="M6 5.333h9.333a3.333 3.333 0 0 1 0 6.667H6a3.333 3.333 0 0 1 0-6.667Zm9.333 4a.667.667 0 0 0 0-1.333H6a.667.667 0 0 0 0 1.333h9.333Zm-6.666 4H18A3.333 3.333 0 1 1 18 20H8.667a3.333 3.333 0 0 1 0-6.667Zm9.333 4A.667.667 0 0 0 18 16H8.667a.667.667 0 0 0 0 1.333H18Zm6.667 4h-9.334a3.333 3.333 0 1 0 0 6.667h9.334a3.333 3.333 0 0 0 0-6.667Zm-9.334 4a.667.667 0 0 1 0-1.333h9.334a.667.667 0 1 1 0 1.333h-9.334Zm8-20H26A3.333 3.333 0 1 1 26 12h-2.667a3.333 3.333 0 1 1 0-6.667Zm2.667 4A.667.667 0 1 0 26 8h-2.667a.667.667 0 1 0 0 1.333H26Z">
                                    </path>
                                </svg>
                                <span>Hit deadlines every time</span>
                            </div>
                            <span style="color: rgb(9, 30, 66); font-weight:500; font-size: 1.2rem;">From weekly
                                sprints to annual planning, Timeline view keeps all tasks on track. Quickly get a
                                glimpse of what’s coming down the pipeline and identify any gaps that might impede your
                                team’s progress.</span>
                            <span class="LearnMoreText" style="font-weight:500; font-size: 1.2rem;">Learn more about
                                Timeline view</span>
                        </div>
                    </div>
                    <div class="cardSmain" style="flex-direction: row-reverse !important">
                        <div style="width:50%; height: 100%;">
                            <img src="https://images.ctfassets.net/rz1oowkt5gyp/7sxChS4x6XAcUgDpp4VAZk/25377d162e964f4243e329c447bfd7dc/TrelloBoard_Calendar_2x.png?w=1140&fm=webp"
                                alt="" srcset="">
                        </div>
                        <div class="d-flex flex-column justify-content-star gap-4" style="width:45%; height: 100%;">

                            <div class="d-flex align-items-center gap-3"
                                style="font-weight: 500;line-height: 1.25;text-transform: uppercase;">
                                <svg style="width:2rem!important; color:#8777d9 !important;" fill="currentColor"
                                    aria-hidden="true" viewBox="0 0 32 32">
                                    <path
                                        d="M6.66 6.667h18.68A2.66 2.66 0 0 1 28 9.325v16.016A2.659 2.659 0 0 1 25.34 28H6.66A2.66 2.66 0 0 1 4 25.341V9.325a2.659 2.659 0 0 1 2.66-2.658ZM6.667 12v12A1.333 1.333 0 0 0 8 25.333h16A1.333 1.333 0 0 0 25.333 24V12H6.667ZM8 5.333a1.333 1.333 0 0 1 2.667 0v1.334H8V5.333Zm13.333 0a1.333 1.333 0 0 1 2.667 0v1.334h-2.667V5.333Zm-12 12v-2.668H12v2.668H9.333Zm10.667 0v-2.668h2.667v2.668H20Zm-5.333 0v-2.668h2.668v2.668h-2.668Zm-5.334 5.334V20H12v2.667H9.333Zm5.334 0V20h2.668v2.667h-2.668Zm5.333 0V20h2.667v2.667H20Z">
                                    </path>
                                </svg>
                                <span>Stay on top of tasks</span>
                            </div>
                            <span style="color: rgb(9, 30, 66); font-weight:500; font-size: 1.2rem;">Start each day
                                without any surprises. Whether scheduling an editorial calendar or staying on top of
                                to-dos, Calendar view is like a crystal ball giving you a clear vision of what work lies
                                ahead.</span>
                            <span class="LearnMoreText" style="font-weight:500; font-size: 1.2rem;">Learn more about
                                Calendar view</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="d-flex align-items-center justify-content-center" style="width: 100%;color: rgb(9, 30, 66);">
            <div class="d-flex flex-column gap-3" style="width: 80%;">
                <span style="line-height: 1.25; font-weight: 500; font-size:1rem;">WORK SMARTER</span>
                <span style="font-weight: 500;font-size: 2.25rem; line-height: 1.33333;">Do more with Trello</span>
                <div style="width:50%">
                    <span style="font-size:1.25rem;">Customize the way you organize with easy integrations, automation,
                        and mirroring of your to-dos across multiple locations.</span>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="d-flex align-items-center justify-content-center" style="width:100%">
            <div style="width:77%" class="d-flex gap-5">
                <div style="width:30%;color:rgb(9, 30, 66); font-weight: 500;" class="d-flex flex-column gap-4">
                    <img width="96px"
                        src="https://images.ctfassets.net/rz1oowkt5gyp/gMfkjoA3yWYG3kat3qjpW/1935c0e535bc27c820c13c1a1e02b4ed/Integration.svg"
                        alt="">
                    <span style="font-size: 1.5rem;line-height: 1.33333;">Integrations</span>
                    <span style="font-size:1.rem;">Connect the apps your team already uses into your Trello workflow or
                        add a Power-Up to fine-tune your specific needs.</span>
                    <button class="exploreButton" style="padding: 0.7rem 1rem 0.8rem !important; width: 200px;">Browse
                        Integrations</button>
                </div>
                <div style="width:30%;color:rgb(9, 30, 66); font-weight: 500;" class="d-flex flex-column gap-4">
                    <img width="96px"
                        src="https://images.ctfassets.net/rz1oowkt5gyp/7wxRW93hvb7858bMsK4LSs/336a6acc2c9a7a515a37bd895b98d4f6/Autodev.svg"
                        alt="">
                    <span style="font-size: 1.5rem;line-height: 1.33333;">Butler Automation</span>
                    <span style="font-size:1.rem;">No-code automation is built into every Trello board. Focus on the
                        work that matters most and let the robots do the rest.</span>
                    <button class="exploreButton" style="padding: 0.7rem 1rem 0.8rem !important; width: 250px;">Get to
                        Know Automation</button>
                </div>
                <div style="width:30%;color:rgb(9, 30, 66); font-weight: 500;" class="d-flex flex-column gap-4">
                    <img width="96px"
                        src="https://images.ctfassets.net/rz1oowkt5gyp/2QHMr8zhoP0jlvvXC8k2am/0f2a100621210cc76e0298bd07bbc0ca/Project_management.svg"
                        alt="">
                    <span style="font-size: 1.5rem;line-height: 1.33333;">Card mirroring</span>
                    <span style="font-size:1.rem;">View your to-dos from different boards in more than one place.
                        Mirror a card to keep track of work wherever you need it!</span>
                </div>
            </div>
        </div>
        <br><br><br>
        <div class="d-flex justify-content-center flex-column align-items-center gap-3" style="width:100%">
            <span
                style="font-weight: 400;color: rgb(9, 30, 66);line-height: 1.5;text-size-adjust: 100%; font-size:1.25rem">Join
                a community of millions of users globally who are using Trello to get more done.</span>
            <img src="https://images.ctfassets.net/rz1oowkt5gyp/19rAABnbk8KNNuh3zJzsmr/210fb8ee51dea14595462f844b7c9beb/logos-horizontal-visa-coinbase-john-deere-zoom-grand-hyatt-fender.svg"
                alt="">
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div style="width:100%" class="d-flex align-items-center justify-content-center">
            <div style="width: 80%" class="d-flex flex-column align-items-center justify-content-center gap-4">
                <span style="font-size: 2.25rem;line-height: 1.33333; font-weight:500;color: rgb(9, 30, 66);">Get
                    started with Trello today
                </span>
                <div class="d-flex align-items-center justify-content-start gap-3" style="width: 50%">
                    <input
                        style="border-radius: 4px; width: 80%; color: black !important; border: 1px solid rgb(223, 225, 230);"
                        class="p-3 emailİnput" type="mail" placeholder="Email">
                    <a href="register" class="p-3 signUpButton" style="width: 35%"> Sign up - it's free!</a>
                </div>
            </div>
        </div>
        <br><br><br><br>
        <footer class="text-white p-3" style="background-color: rgb(23, 43, 77);">
            <div class="container">
                <div class="row  d-flex align-items-center justify-content-evenly">
                    <div class="col-md-1 d-flex flex-column justify-content-center gap-3">
                        <svg aria-label="Atlassian Trello" fill="#ffffff" width="105" role="img"
                            viewBox="0 0 312 105" width="312" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" class="Logo-sc-1anfgcw-0 gguOta">
                            <defs>
                                <linearGradient id="trello-logo-gradient-white" x1="49.992%" x2="49.992%"
                                    y1="100%" y2=".016%">
                                    <stop offset="0%" stop-color="#ffffff" stop-opacity=".5"></stop>
                                    <stop offset="15%" stop-color="#ffffff" stop-opacity=".65"></stop>
                                    <stop offset="30%" stop-color="#ffffff" stop-opacity=".78"></stop>
                                    <stop offset="46%" stop-color="#ffffff" stop-opacity=".88"></stop>
                                    <stop offset="62%" stop-color="#ffffff" stop-opacity=".95"></stop>
                                    <stop offset="80%" stop-color="#ffffff" stop-opacity=".99"></stop>
                                    <stop offset="100%" stop-color="#ffffff"></stop>
                                </linearGradient>

                            </defs>
                            <path d="M42.6 5.2 42.6 17.3 28.3 17.3 28.3 63 14.5 63 14.5 17.2.2 17.2.2 5.2z"
                                transform="translate(87 40)"></path>
                            <path
                                d="M60.2,63 L47.5,63 L47.5,18 L60.2,18 L60.2,26.6 C62.6,20.5 66.5,16.9 73.4,17.4 L73.4,30.7 C64.4,30 60.2,32.2 60.2,39.4 L60.2,63 Z"
                                transform="translate(87 40)"></path>
                            <path
                                d="M143,63.4 C134.6,63.4 129.4,59.4 129.4,49.9 L129.4,0.6 L142.2,0.6 L142.2,48.1 C142.2,50.8 144,51.8 146.2,51.8 C146.8,51.8 147.5,51.8 148.1,51.7 L148.1,62.8 C146.4,63.2 144.7,63.4 143,63.4 L143,63.4 Z"
                                transform="translate(87 40)"></path>
                            <path
                                d="M169.8,63.4 C161.4,63.4 156.2,59.4 156.2,49.9 L156.2,0.6 L169,0.6 L169,48.1 C169,50.8 170.8,51.8 173,51.8 C173.6,51.8 174.3,51.8 174.9,51.7 L174.9,62.8 C173.2,63.2 171.5,63.4 169.8,63.4 L169.8,63.4 Z"
                                transform="translate(87 40)"></path>
                            <path
                                d="M181,40.5 C181,26.6 189,17.1 202.8,17.1 C216.6,17.1 224.4,26.6 224.4,40.5 C224.4,54.4 216.5,64.1 202.8,64.1 C189.1,64.1 181,54.3 181,40.5 Z M193.5,40.5 C193.5,47.3 196.3,52.6 202.8,52.6 C209.3,52.6 211.9,47.2 211.9,40.5 C211.9,33.8 209.1,28.5 202.8,28.5 C196.5,28.5 193.5,33.7 193.5,40.5 Z"
                                transform="translate(87 40)"></path>
                            <path
                                d="M90.6,44.6 C94.2,45 97.8,45.2 101.3,45.2 C111.1,45.2 119.3,42.6 119.3,33.1 C119.3,23.9 110.8,17 100.6,17 C86.9,17 78.1,27 78.1,40.8 C78.1,55.2 85.7,63.8 102.8,63.8 C107.9,63.9 112.9,63 117.7,61.2 L117.7,50.4 C113.3,51.8 108.3,53.2 103.3,53.2 C96.5,53.3 91.8,51 90.6,44.6 L90.6,44.6 Z M100.4,26.9 C104,26.9 106.9,29.3 106.9,32.7 C106.9,37 102.3,38.4 97.1,38.4 C94.9,38.4 92.6,38.2 90.4,37.9 C90.6,35.8 91.2,33.8 92.2,31.9 C93.8,28.8 97,26.9 100.4,26.9 Z"
                                transform="translate(87 40)"></path>
                            <path fill="url(#trello-logo-gradient-white)"
                                d="M55.3,40.6 L7.8,40.6 C3.7,40.6 0.4,43.9 0.4,48 L0.4,95.6 C0.4,99.7 3.7,103 7.8,103 L55.3,103 C59.4,103 62.7,99.7 62.7,95.6 L62.7,48 C62.7,43.9 59.4,40.6 55.3,40.6 Z M27.2,85.5 C27.2,86.9 26.1,88 24.7,88 L14.3,88 C12.9,88 11.8,86.9 11.8,85.5 L11.8,54.6 C11.8,53.2 12.9,52.1 14.3,52.1 L24.7,52.1 C26.1,52.1 27.2,53.2 27.2,54.6 L27.2,85.5 Z M51.2,71.3 C51.2,72.7 50.1,73.8 48.8,73.8 L38.3,73.8 C36.9,73.8 35.8,72.7 35.8,71.3 L35.8,54.6 C35.8,53.2 36.9,52.1 38.3,52.1 L48.7,52.1 C50.1,52.1 51.2,53.2 51.2,54.6 L51.2,71.3 Z">
                            </path>
                            <g opacity=".7">
                                <path
                                    d="M98.9,16.7 C98.9,12.7 96.3,10.9 91.5,9.7 C88.5,8.9 87.8,8.3 87.8,7.3 C87.8,6.1 88.9,5.5 90.9,5.5 C93.3,5.6 95.7,6.2 97.9,7.3 L97.9,2.3 C95.8,1.3 93.4,0.8 91.1,0.8 C85.8,0.8 82.9,3.3 82.9,7.4 C82.9,11.3 85.5,13.3 89.9,14.3 C93,15 93.9,15.5 93.9,16.8 C93.9,17.8 93.2,18.6 90.9,18.6 C88.1,18.5 85.3,17.7 82.8,16.3 L82.8,21.6 C85.3,22.8 88,23.5 90.8,23.5 C96.2,23.5 98.9,20.8 98.9,16.7 L98.9,16.7 Z"
                                    transform="translate(94)"></path>
                                <path
                                    d="M159.3 1.2 159.3 23.2 164 23.2 164 6.4 166 10.8 172.6 23.1 178.5 23.1 178.5 1.1 173.8 1.1 173.8 15.3 172 11.2 166.7 1.1 159.3 1.1z"
                                    transform="translate(94)"></path>
                                <path d="M129.6 1.2 124.5 1.2 124.5 23.2 129.6 23.2z" transform="translate(94)"></path>
                                <path d="M43.2 1.2 43.2 23.2 53.7 23.2 55.3 18.4 48.3 18.4 48.3 1.2z"
                                    transform="translate(94)"></path>
                                <path d="M22.4 1.2 22.4 6 28.1 6 28.1 23.2 33.2 23.2 33.2 6 39.3 6 39.3 1.2z"
                                    transform="translate(94)"></path>
                                <path
                                    d="M15,1.2 L8.3,1.2 L0.6,23.2 L6.5,23.2 L7.6,19.5 C8.9,19.9 10.3,20.1 11.7,20.1 C13.1,20.1 14.5,19.9 15.8,19.5 L16.9,23.2 L22.8,23.2 L15,1.2 Z M11.6,15.5 C10.6,15.5 9.7,15.4 8.8,15.1 L11.6,5.5 L14.4,15.1 C13.5,15.4 12.6,15.5 11.6,15.5 Z"
                                    transform="translate(94)"></path>
                                <path
                                    d="M71.7,1.2 L65,1.2 L57.3,23.2 L63.2,23.2 L64.3,19.5 C65.6,19.9 67,20.1 68.4,20.1 C69.8,20.1 71.2,19.9 72.5,19.5 L73.6,23.2 L79.5,23.2 L71.7,1.2 Z M68.4,15.5 C67.4,15.5 66.5,15.4 65.6,15.1 L68.4,5.5 L71.2,15.1 C70.3,15.4 69.3,15.5 68.4,15.5 Z"
                                    transform="translate(94)"></path>
                                <path
                                    d="M148,1.2 L141.3,1.2 L133.6,23.2 L139.5,23.2 L140.6,19.5 C141.9,19.9 143.3,20.1 144.7,20.1 C146.1,20.1 147.5,19.9 148.8,19.5 L149.9,23.2 L155.8,23.2 L148,1.2 Z M144.6,15.5 C143.6,15.5 142.7,15.4 141.8,15.1 L144.6,5.5 L147.4,15.1 C146.5,15.4 145.6,15.5 144.6,15.5 Z"
                                    transform="translate(94)"></path>
                                <path
                                    d="M119.2,16.7 C119.2,12.7 116.6,10.9 111.8,9.7 C108.8,8.9 108.1,8.3 108.1,7.3 C108.1,6.1 109.2,5.5 111.1,5.5 C113.5,5.6 115.9,6.2 118.1,7.3 L118.1,2.3 C115.9,1.3 113.6,0.8 111.2,0.8 C105.9,0.8 103,3.3 103,7.4 C103,11.3 105.6,13.3 110,14.3 C113.1,15 114,15.5 114,16.8 C114,17.8 113.3,18.6 111,18.6 C108.2,18.5 105.4,17.7 102.9,16.3 L102.9,21.6 C105.4,22.8 108.1,23.5 110.9,23.5 C116.6,23.5 119.2,20.8 119.2,16.7 L119.2,16.7 Z"
                                    transform="translate(94)"></path>

                            </g>
                        </svg>
                        <a href="#" class="footer-a d-block mt-2">Log In</a>
                    </div>

                    <div class="col-md-2 footer-cards">
                        <h6 class="fw-semibold">About Trello</h6>
                        <p class="text-light">What's behind the boards.</p>
                    </div>

                    <div class="col-md-2 footer-cards">
                        <h6 class="fw-semibold">Jobs</h6>
                        <p class="text-light">Learn about open roles on the Trello team.</p>
                    </div>

                    <div class="col-md-2 footer-cards">
                        <h6 class="fw-semibold">Apps</h6>
                        <p class="text-light">Download the Trello App for your Desktop or Mobile devices.</p>
                    </div>

                    <div class="col-md-3 footer-cards">
                        <h6 class="fw-semibold">Contact us</h6>
                        <p class="text-light">Need anything? Get in touch and we can help.</p>
                    </div>
                </div>
            </div>

            <div class="footer-cizgi d-flex justify-content-evenly border-light mt-4 pt-3 text-center gap-3">
                <div class="d-flex justify-content-center align-items-center gap-5">
                    <div class="d-flex justify-content-center align-items-center gap-3">
                        <i class="bi bi-globe"></i>
                        <select name="" id="" class="footer-select">
                            <option value="" selected>English</option>
                            <option value="">Turkish</option>
                        </select>
                    </div>

                    <div style="font-size: 0.75rem; font-weight: 500;" class=" d-flex align-items-center gap-3">
                        <a href="#" class="footer-a">Your Privacy Choices</a>
                        <a href="#" class="footer-a"> Privacy Policy</a>
                        <a href="#" class="footer-a"> Terms</a>
                        <span class="text-light">Copyright © 2024 Atlassian</span>
                    </div>
                </div>

                <div class="d-flex justify-content-center gap-4">
                    <a href="#" class="footer-medya"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="footer-medya"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="footer-medya"><i class="bi bi-linkedin"></i></a>
                    <a href="#" class="footer-medya"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="footer-medya"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
        </footer>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>



{{-- @if (Route::has('login'))
<nav class="-mx-3 flex flex-1 justify-end">
    @auth
        <a
            href="{{ url('/dashboard') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            Dashboard
        </a>
    @else
        <a
            href="{{ route('login') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            Log in
        </a>

        @if (Route::has('register'))
            <a
                href="{{ route('register') }}"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
                Register
            </a>
        @endif
    @endauth
</nav>
@endif --}}
