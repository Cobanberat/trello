<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"
        integrity="sha256-9zljDKpE/mQxmaR4V2cGVaQ7arF3CcXxarvgr7Sj8Uc=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>TRELLO</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>
    <div class="nav">
        <div class="header">
            <div class="left text-center">
                <div class="dropdown">
                    <div class="left-button-hover" id="dropdownMenuButton" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <svg width="20" color="#ffffff" height="20" role="presentation" focusable="false"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4 5C4 4.44772 4.44772 4 5 4H7C7.55228 4 8 4.44772 8 5V7C8 7.55228 7.55228 8 7 8H5C4.44772 8 4 7.55228 4 7V5ZM4 11C4 10.4477 4.44772 10 5 10H7C7.55228 10 8 10.4477 8 11V13C8 13.5523 7.55228 14 7 14H5C4.44772 14 4 13.5523 4 13V11ZM11 4C10.4477 4 10 4.44772 10 5V7C10 7.55228 10.4477 8 11 8H13C13.5523 8 14 7.5523 14 7V5C14 4.44772 13.5523 4 13 4H11ZM10 11C10 10.4477 10.4477 10 11 10H13C13.5523 10 14 10.4477 14 11V13C14 13.5523 13.5523 14 13 14H11C10.4477 14 10 13.5523 10 13V11ZM17 4C16.4477 4 16 4.44772 16 5V7C16 7.55228 16.4477 8 17 8H19C19.5523 8 20 7.55228 20 7V5C20 4.44772 19.5523 4 19 4H17ZM16 11C16 10.4477 16.4477 10 17 10H19C19.5523 10 20 10.4477 20 11V13C20 13.5523 19.5523 14 19 14H17C16.4477 14 16 13.5523 16 13V11ZM5 16C4.44772 16 4 16.4477 4 17V19C4 19.5523 4.44772 20 5 20H7C7.55228 20 8 19.5523 8 19V17C8 16.4477 7.5523 16 7 16H5ZM10 17C10 16.4477 10.4477 16 11 16H13C13.5523 16 14 16.4477 14 17V19C14 19.5523 13.5523 20 13 20H11C10.4477 20 10 19.5523 10 19V17ZM17 16C16.4477 16 16 16.4477 16 17V19C16 19.5523 16.4477 20 17 20H19C19.5523 20 20 19.5523 20 19V17C20 16.4477 19.5523 16 19 16H17Z"
                                fill="currentColor"></path>
                        </svg>
                    </div>
                    <div class="dropdown-menu logo-dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="down-class">
                            <div class="down-class-span">
                                <span>UYGULAMALARINIZ</span>
                            </div>
                            <div class="down-class-application">
                                <span class="Application-span">
                                    <span class="img-span" role="img">
                                        <svg fill="none" height="32" viewBox="0 0 32 32" focusable="false"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                                            <path fill="#FFFFFF"
                                                d="M27.545 24.378 16.96 3.208c-.208-.458-.417-.541-.667-.541-.208 0-.458.083-.708.5-1.5 2.375-2.167 5.125-2.167 8 0 4.001 2.042 7.752 5.042 13.795.334.666.584.791 1.167.791h7.335c.541 0 .833-.208.833-.625 0-.208-.042-.333-.25-.75M12.168 14.377c-.834-1.25-1.084-1.334-1.292-1.334s-.333.083-.708.834L4.875 24.46c-.167.334-.208.459-.208.625 0 .334.291.667.916.667h7.46c.5 0 .875-.416 1.083-1.208.25-1 .334-1.876.334-2.917 0-2.917-1.292-5.751-2.292-7.251">
                                            </path>
                                        </svg>
                                    </span>
                                    <span>Atlassian Anasayfası</span>
                                </span>
                                <span class="Application-span">
                                    <span class="img-span" role="img">
                                        <svg fill="none" height="33" viewBox="0 0 33 33" width="33"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <linearGradient id="a" gradientUnits="userSpaceOnUse" x1="16.0133"
                                                x2="16.0133" y1="28.68" y2="4.30798">
                                                <stop offset="0" stop-color="#fff" stop-opacity=".4" />
                                                <stop offset=".11" stop-color="#fff" stop-opacity=".54" />
                                                <stop offset=".25" stop-color="#fff" stop-opacity=".71" />
                                                <stop offset=".39" stop-color="#fff" stop-opacity=".83" />
                                                <stop offset=".52" stop-color="#fff" stop-opacity=".93" />
                                                <stop offset=".64" stop-color="#fff" stop-opacity=".98" />
                                                <stop offset=".75" stop-color="#fff" />
                                            </linearGradient>
                                            <path clip-rule="evenodd"
                                                d="m25.3013 4.30798h-18.57605c-.76843.00106-1.50503.30707-2.04802.85081s-.84798 1.28076-.84798 2.04919v18.57602c0 .7681.30512 1.5047.84822 2.0478.54311.5431 1.27972.8482 2.04778.8482h18.57605c.7684 0 1.5054-.305 2.0492-.848.5437-.543.8497-1.2796.8508-2.048v-18.57602c-.0011-.7688-.307-1.50581-.8506-2.04944-.5436-.54362-1.2806-.8495-2.0494-.85056zm-10.976 17.55602c.0005.1264-.024.2517-.072.3686s-.1186.2232-.2078.3128-.1952.1606-.3119.2091c-.1168.0485-.2419.0735-.3683.0735h-4.07605c-.1264 0-.25156-.025-.3683-.0735-.11673-.0485-.22274-.1195-.31194-.2091-.08919-.0896-.15982-.1959-.20783-.3128s-.07245-.2422-.07193-.3686v-12.09202c-.00052-.1264.02392-.25167.07193-.3686.04801-.11694.11864-.22324.20783-.31281.0892-.08956.19521-.16064.31194-.20913.11674-.04849.2419-.07346.3683-.07346h4.07605c.1264 0 .2515.02497.3683.07346.1167.04849.2227.11957.3119.20913.0892.08957.1598.19587.2078.31281.048.11693.0725.2422.072.3686zm9.376-5.552c0 .2557-.1016.5008-.2824.6816s-.426.2824-.6816.2824h-4.072c-.2557 0-.5009-.1016-.6817-.2824s-.2823-.4259-.2823-.6816v-6.54002c0-.25567.1015-.50086.2823-.68165.1808-.18078.426-.28235.6817-.28235h4.072c.2556 0 .5008.10157.6816.28235.1808.18079.2824.42598.2824.68165z"
                                                fill="url(#a)" fill-rule="evenodd" />
                                        </svg>

                                    </span>
                                    <span>Trello</span>

                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="left-text">
                    <div class="left-text-image">
                        <img src="/trello.gif" alt="TRELLO">
                    </div>
                    <div class="left-text-image-hover">
                        <img src="/trello-hover.gif" alt="TRELLO">
                    </div>
                </div>
            </div>
            <div class="ort">
                <div class="dropdown">
                    <div class="ort-text ort-calismaAlani" data-bs-toggle="dropdown">
                        <div class="ort-text-span">
                            <span>
                                Çalışma Alanları
                            </span>
                        </div>

                        <div class="ort-text-logo">
                            <span>
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </div>
                    </div>
                    <ul class="dropdown-menu dropdown-work">
                        <div class="dropdown-menu-container">
                            <div class="dropdown-work-area-click">
                                <div class="work-area-span">
                                    <span>Mevcut Çalışma Alanı</span>
                                </div>
                                <div class="work-area-span-logo">
                                    <span class="work-area-alt-logo">T</span>
                                    <span class="work-area-alt-span">
                                        Trello Çalışma Alanı
                                    </span>
                                </div>
                            </div>
                            <div class="cizgi"></div>
                            <div class="dropdown-work-area-click">
                                <div class="work-area-span">
                                    <span>Çalışma Alanlarınız</span>
                                </div>
                                <div class="work-area-span-logo">
                                    <span class="work-area-alt-logo">T</span>
                                    <span class="work-area-alt-span">
                                        Trello Çalışma Alanı
                                    </span>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>

                <div class="dropdown">
                    <div class="ort-text" data-bs-toggle="dropdown">
                        <div class="ort-text-span">
                            <span>Geçmiş</span>

                        </div>
                        <div class="ort-text-logo">
                            <span>
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </div>

                    </div>
                    <ul class="dropdown-menu dropdown-gecmis">
                        <div class="gecmis-container">
                            <div class="img-background"></div>
                            <div class="gecmis-text">
                                <span class="text-gecmis-span">ticket</span>
                                <span class="text-gecmis-workarea">Trello Çalışma Alanı</span>
                            </div>
                            <div class="gecmis-fav-logo">
                                <div class="workingas">
                                    <div class="src" style="margin-right:2px">
                                        <i class="bi bi-three-dots"></i>
                                    </div>
                                    <label class="star" for="star-input">
                                        <input type="checkbox" name="star-input" id="star-input">
                                        <div class="ort-srcs-star">
                                            <svg class="star-empty" width="17" height="17"
                                                fill="currentColor" role="presentation" focusable="false"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M7.49495 20.995L11.9999 18.6266L16.5049 20.995C16.8059 21.1533 17.1507 21.2079 17.4859 21.1504C18.3276 21.006 18.893 20.2066 18.7486 19.3649L17.8882 14.3485L21.5328 10.7959C21.7763 10.5585 21.9348 10.2475 21.9837 9.91094C22.1065 9.06576 21.5209 8.28106 20.6758 8.15825L15.6391 7.42637L13.3866 2.86236C13.2361 2.55739 12.9892 2.31054 12.6843 2.16003C11.9184 1.78206 10.9912 2.0965 10.6132 2.86236L8.36072 7.42637L3.32403 8.15825C2.98747 8.20715 2.67643 8.36564 2.43904 8.60917C1.84291 9.22074 1.85542 10.1998 2.46699 10.7959L6.11158 14.3485L5.25121 19.3649C5.19372 19.7 5.24833 20.0448 5.40658 20.3459C5.80401 21.1018 6.739 21.3924 7.49495 20.995ZM19.3457 10.0485L15.6728 13.6287L16.5398 18.684L11.9999 16.2972L7.45995 18.684L8.327 13.6287L4.65411 10.0485L9.72993 9.31093L11.9999 4.71146L14.2699 9.31093L19.3457 10.0485Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                            <svg class="star-fill" width="17" height="17" role="presentation"
                                                focusable="false" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.9999 18.6266L7.49495 20.995C6.739 21.3924 5.80401 21.1018 5.40658 20.3459C5.24833 20.0448 5.19372 19.7 5.25121 19.3649L6.11158 14.3485L2.46699 10.7959C1.85542 10.1998 1.84291 9.22074 2.43904 8.60917C2.67643 8.36564 2.98747 8.20715 3.32403 8.15825L8.36072 7.42637L10.6132 2.86236C10.9912 2.0965 11.9184 1.78206 12.6843 2.16003C12.9892 2.31054 13.2361 2.55739 13.3866 2.86236L15.6391 7.42637L20.6758 8.15825C21.5209 8.28106 22.1065 9.06576 21.9837 9.91094C21.9348 10.2475 21.7763 10.5585 21.5328 10.7959L17.8882 14.3485L18.7486 19.3649C18.893 20.2066 18.3276 21.006 17.4859 21.1504C17.1507 21.2079 16.8059 21.1533 16.5049 20.995L11.9999 18.6266Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>

                <div class="dropdown">
                    <div class="ort-text" data-bs-toggle="dropdown">
                        <div class="ort-text-span">
                            <span>Yıldızlı</span>

                        </div>
                        <div class="ort-text-logo">
                            <span>
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </div>

                    </div>
                    <ul class="dropdown-menu dropdown-gecmis">
                        <div class="gecmis-container">
                            <div class="img-background"></div>
                            <div class="gecmis-text">
                                <span class="text-gecmis-span">ticket</span>
                                <span class="text-gecmis-workarea">Trello Çalışma Alanı</span>
                            </div>
                            <div class="gecmis-fav-logo">
                                <div class="workingas">
                                    <div class="src" style="margin-right:2px">
                                        <i class="bi bi-three-dots"></i>
                                    </div>
                                    <label class="star" for="star-input">
                                        <input type="checkbox" name="star-input" id="star-input">
                                        <div class="ort-srcs-star">
                                            <svg class="star-empty" width="17" height="17"
                                                fill="currentColor" role="presentation" focusable="false"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M7.49495 20.995L11.9999 18.6266L16.5049 20.995C16.8059 21.1533 17.1507 21.2079 17.4859 21.1504C18.3276 21.006 18.893 20.2066 18.7486 19.3649L17.8882 14.3485L21.5328 10.7959C21.7763 10.5585 21.9348 10.2475 21.9837 9.91094C22.1065 9.06576 21.5209 8.28106 20.6758 8.15825L15.6391 7.42637L13.3866 2.86236C13.2361 2.55739 12.9892 2.31054 12.6843 2.16003C11.9184 1.78206 10.9912 2.0965 10.6132 2.86236L8.36072 7.42637L3.32403 8.15825C2.98747 8.20715 2.67643 8.36564 2.43904 8.60917C1.84291 9.22074 1.85542 10.1998 2.46699 10.7959L6.11158 14.3485L5.25121 19.3649C5.19372 19.7 5.24833 20.0448 5.40658 20.3459C5.80401 21.1018 6.739 21.3924 7.49495 20.995ZM19.3457 10.0485L15.6728 13.6287L16.5398 18.684L11.9999 16.2972L7.45995 18.684L8.327 13.6287L4.65411 10.0485L9.72993 9.31093L11.9999 4.71146L14.2699 9.31093L19.3457 10.0485Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                            <svg class="star-fill" width="17" height="17" role="presentation"
                                                focusable="false" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.9999 18.6266L7.49495 20.995C6.739 21.3924 5.80401 21.1018 5.40658 20.3459C5.24833 20.0448 5.19372 19.7 5.25121 19.3649L6.11158 14.3485L2.46699 10.7959C1.85542 10.1998 1.84291 9.22074 2.43904 8.60917C2.67643 8.36564 2.98747 8.20715 3.32403 8.15825L8.36072 7.42637L10.6132 2.86236C10.9912 2.0965 11.9184 1.78206 12.6843 2.16003C12.9892 2.31054 13.2361 2.55739 13.3866 2.86236L15.6391 7.42637L20.6758 8.15825C21.5209 8.28106 22.1065 9.06576 21.9837 9.91094C21.9348 10.2475 21.7763 10.5585 21.5328 10.7959L17.8882 14.3485L18.7486 19.3649C18.893 20.2066 18.3276 21.006 17.4859 21.1504C17.1507 21.2079 16.8059 21.1533 16.5049 20.995L11.9999 18.6266Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>

                <div class="dropdown">
                    <div class="ort-text ort-calismaAlani" data-bs-toggle="dropdown">
                        <div class="ort-text-span">
                            <span>
                                Şablonlar
                            </span>
                        </div>

                        <div class="ort-text-logo">
                            <span>
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </div>
                    </div>
                    <ul class="dropdown-menu dropdown-work">
                        <div class="dropdown-menu-container">
                            <div class="dropdown-sablon-info">
                                <div class="sablon-best-text">
                                    <span>En İyi Şablonlar</span>
                                </div>
                                <div class="sablon-best-button">
                                    <i class="bi bi-chevron-down"></i>
                                </div>
                            </div>
                            <div class="cizgi"></div>
                            <div class="sablon-trello-info">
                                <div class="trello-info-logo-text">
                                    <div class="trello-info-logo">
                                        <span><svg width="24" height="24" role="presentation"
                                                focusable="false" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7 3C7 2.44772 7.44772 2 8 2H9C9.55228 2 10 2.44772 10 3C10 3.55228 9.55228 4 9 4H8C7.44772 4 7 3.55228 7 3Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M3 7C2.44772 7 2 7.44772 2 8V9C2 9.55228 2.44772 10 3 10C3.55228 10 4 9.55228 4 9V8C4 7.44772 3.55228 7 3 7Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M2 12C2 11.4477 2.44772 11 3 11C3.55228 11 4 11.4477 4 12V13C4 13.5523 3.55228 14 3 14C2.44772 14 2 13.5523 2 13V12Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M2 16C2 15.4477 2.44772 15 3 15C3.55228 15 4 15.4477 4 16V19C2.89543 19 2 18.1046 2 17V16Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M12 2C11.4477 2 11 2.44772 11 3C11 3.55228 11.4477 4 12 4H13C13.5523 4 14 3.55228 14 3C14 2.44772 13.5523 2 13 2H12Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M15 3C15 2.44772 15.4477 2 16 2H17C18.1046 2 19 2.89543 19 4H16C15.4477 4 15 3.55228 15 3Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M4 2C2.89543 2 2 2.89543 2 4V5C2 5.55228 2.44772 6 3 6C3.55228 6 4 5.55228 4 5V4H5C5.55228 4 6 3.55228 6 3C6 2.44772 5.55228 2 5 2H4Z"
                                                    fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M7 5C5.89543 5 5 5.89543 5 7V19C5 20.1046 5.89543 21 7 21H19C20.1046 21 21 20.1046 21 19V7C21 5.89543 20.1046 5 19 5H7ZM8 7C7.44772 7 7 7.44771 7 8V17C7 17.5523 7.44772 18 8 18H11C11.5523 18 12 17.5523 12 17V8C12 7.44772 11.5523 7 11 7H8ZM14 8C14 7.44772 14.4477 7 15 7H18C18.5523 7 19 7.44772 19 8V13C19 13.5523 18.5523 14 18 14H15C14.4477 14 14 13.5523 14 13V8Z"
                                                    fill="currentColor"></path>

                                            </svg>
                                        </span>
                                    </div>
                                    <div class="trello-info-text">
                                        <span>Trello Topluluğundan Yüzlerce Şablon Görüntüleyin</span>
                                    </div>
                                </div>
                                <div class="trello-sablon-view-button">
                                    <button> Şablonları Keşfet</button>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>

                <div class="dropdown">
                    <div class="ort-button" data-bs-toggle="dropdown">
                        <button class="ort-text-button">
                            <span>Oluştur</span>
                        </button>
                    </div>
                    <ul class="dropdown-menu dropdown-work">
                        <div class="dropdown-menu-container">
                            <div class="sablon-trello-info-add">
                                <div class="trello-info-logo-text-add">
                                    <div class="trello-info-logo-add">
                                        <svg width="17" height="17" role="presentation" focusable="false"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M3 5C3 3.89543 3.89543 3 5 3H19C20.1046 3 21 3.89543 21 5V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V5ZM5 6C5 5.44772 5.44772 5 6 5H10C10.5523 5 11 5.44772 11 6V16C11 16.5523 10.5523 17 10 17H6C5.44772 17 5 16.5523 5 16V6ZM14 5C13.4477 5 13 5.44772 13 6V12C13 12.5523 13.4477 13 14 13H18C18.5523 13 19 12.5523 19 12V6C19 5.44772 18.5523 5 18 5H14Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </div>
                                    <div class="trello-info-text">
                                        <span>Pano Oluştur</span>
                                    </div>
                                </div>
                                <div class="pano-add-text">
                                    <span>Listelerde düzenlenen kartlardan bir pano oluşturulur. Projeleri yönetmek,
                                        bilgileri takip etmek veya bir şeyleri organize etmek için bunu
                                        kullanabilirsiniz.</span>
                                </div>
                            </div>
                            <div class="sablon-trello-info-add">
                                <div class="trello-info-logo-text-add">
                                    <div class="trello-info-logo-add">
                                        <svg width="17" height="17" role="presentation" focusable="false"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7 3C7 2.44772 7.44772 2 8 2H9C9.55228 2 10 2.44772 10 3C10 3.55228 9.55228 4 9 4H8C7.44772 4 7 3.55228 7 3Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M3 7C2.44772 7 2 7.44772 2 8V9C2 9.55228 2.44772 10 3 10C3.55228 10 4 9.55228 4 9V8C4 7.44772 3.55228 7 3 7Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M2 12C2 11.4477 2.44772 11 3 11C3.55228 11 4 11.4477 4 12V13C4 13.5523 3.55228 14 3 14C2.44772 14 2 13.5523 2 13V12Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M2 16C2 15.4477 2.44772 15 3 15C3.55228 15 4 15.4477 4 16V19C2.89543 19 2 18.1046 2 17V16Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M12 2C11.4477 2 11 2.44772 11 3C11 3.55228 11.4477 4 12 4H13C13.5523 4 14 3.55228 14 3C14 2.44772 13.5523 2 13 2H12Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M15 3C15 2.44772 15.4477 2 16 2H17C18.1046 2 19 2.89543 19 4H16C15.4477 4 15 3.55228 15 3Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M4 2C2.89543 2 2 2.89543 2 4V5C2 5.55228 2.44772 6 3 6C3.55228 6 4 5.55228 4 5V4H5C5.55228 4 6 3.55228 6 3C6 2.44772 5.55228 2 5 2H4Z"
                                                fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7 5C5.89543 5 5 5.89543 5 7V19C5 20.1046 5.89543 21 7 21H19C20.1046 21 21 20.1046 21 19V7C21 5.89543 20.1046 5 19 5H7ZM8 7C7.44772 7 7 7.44771 7 8V17C7 17.5523 7.44772 18 8 18H11C11.5523 18 12 17.5523 12 17V8C12 7.44772 11.5523 7 11 7H8ZM14 8C14 7.44772 14.4477 7 15 7H18C18.5523 7 19 7.44772 19 8V13C19 13.5523 18.5523 14 18 14H15C14.4477 14 14 13.5523 14 13V8Z"
                                                fill="currentColor"></path>

                                        </svg>
                                    </div>
                                    <div class="trello-info-text">
                                        <span>Bir Şabonla Başla</span>
                                    </div>
                                </div>
                                <div class="pano-add-text">
                                    <span>Bir pano şablonuyla daha hızlı başlayın</span>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>

            </div>
            <div class="right">
                <div class="right-premium-button">
                    <button class="button-premium">
                        15 gün kaldı
                        <svg width="17" height="17" viewBox="0 0 24 24" role="presentation">
                            <path fill="currentcolor" fill-rule="evenodd"
                                d="M9.276 4.382 7.357 9.247l-4.863 1.917a.78.78 0 0 0 0 1.45l4.863 1.918 1.919 4.863a.78.78 0 0 0 1.45 0h-.001l1.918-4.863 4.864-1.919a.781.781 0 0 0 0-1.45l-4.864-1.916-1.918-4.865a.78.78 0 0 0-.44-.438.78.78 0 0 0-1.01.438m8.297-2.03-.743 1.886-1.884.743a.56.56 0 0 0 0 1.038l1.884.743.743 1.886a.558.558 0 0 0 1.038 0l.745-1.886 1.883-.743a.557.557 0 0 0 0-1.038l-1.883-.743-.745-1.885a.55.55 0 0 0-.314-.314.56.56 0 0 0-.724.314m-.704 13.003-.744 1.883-1.883.744a.55.55 0 0 0-.316.314.56.56 0 0 0 .316.724l1.883.743.744 1.884c.057.144.17.258.314.315a.56.56 0 0 0 .724-.315l.744-1.884 1.883-.743a.557.557 0 0 0 0-1.038l-1.883-.744-.744-1.883a.55.55 0 0 0-.315-.316.56.56 0 0 0-.723.316">
                            </path>
                        </svg>
                    </button>
                </div>
                <div class="right-search">
                    <input class="input-srch" type="search" aria-label="Ara" placeholder="Ara">
                    <div class="right-search-div">
                        <i class="bi bi-search" style="font-size: 12px; left:8px"></i>
                    </div>
                </div>
                <div class="right-icon">
                    <div class="dropdown">
                        <button data-bs-toggle="dropdown" data-bs-auto-close="outside">
                            <svg width="25" height="25" viewBox="0 0 24 24" role="presentation">
                                <path fill="currentcolor" fill-rule="evenodd"
                                    d="M6.59 17.83a2 2 0 0 0 2.83 0L6.59 15a2 2 0 0 0 0 2.83m4.79-12.35A5.04 5.04 0 0 1 14.95 4c.97 0 1.95.28 2.79.84q.03-.04.07-.07a1.01 1.01 0 1 1 1.35 1.49 5.05 5.05 0 0 1-.64 6.36l-.72.73c-.78.78-1.81 2.21-2.31 3.21l-1.51 3.02c-.25.5-.77.58-1.17.19l-8.56-8.55c-.4-.4-.31-.92.19-1.17l3.02-1.51c.99-.49 2.42-1.53 3.21-2.31zm2.74 9.63c.52-.97 1.57-2.4 2.35-3.18l.73-.73a3.05 3.05 0 0 0 .39-3.83c-.19-.29-.72-.77-.86-.86A3.04 3.04 0 0 0 15.05 6c-.8 0-1.57.31-2.16.89l-.95.95c-.78.79-2.22 1.82-3.2 2.31L7 11.02l6.07 6.07z">
                                </path>
                            </svg>
                        </button>
                        <ul class="dropdown-menu dropdown-notification">
                            <div class="ntf-text">
                                <div class="ntf-right">
                                    <span class="bildirim-text">Bildirimler</span>
                                </div>
                                <div class="ntf-left">
                                    <div class="text-secenek">
                                        <span class="secenek-text">yalnızca okunmamış mesajları göster</span>
                                        <span class="secenek-button">
                                            <div class="form-check form-switch custom-switch">
                                                <label class="form-check-label" for="flexSwitchCheckChecked">
                                                    <i class="bi bi-check2"></i>
                                                    <input class="form-check-input shadow-none" type="checkbox"
                                                        id="flexSwitchCheckChecked" checked>
                                                    <i class="bi bi-x"></i>
                                                </label>
                                            </div>
                                        </span>
                                    </div>
                                    <span class="ayarlar-logo">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="notification-body">
                                <img src="kopek.svg" alt="">
                                <span>Okunmamış Bildirim Yok</span>
                            </div>
                        </ul>
                    </div>
                </div>
                <div class="right-icon">
                    <div class="dropdown">
                        <button data-bs-toggle="dropdown" data-bs-auto-close="outside">
                            <svg width="19" height="19" role="presentation" focusable="false"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M2 12C2 6.47667 6.47667 2 12 2C17.5233 2 22 6.47667 22 12C22 17.5233 17.5233 22 12 22C6.47667 22 2 17.5233 2 12ZM4 12C4 16.4188 7.58124 20 12 20C16.4188 20 20 16.4188 20 12C20 7.58124 16.4188 4 12 4C7.58124 4 4 7.58124 4 12ZM8 10C7.99999 7.48383 10.3214 5.51108 12.9389 6.10713C14.3829 6.43513 15.5569 7.60513 15.8899 9.04813C16.3809 11.1771 15.1719 13.0911 13.3589 13.7471C13.1549 13.8201 13.0099 14.0021 13.0099 14.2191V14.0001C13.0099 14.5521 12.5629 15.0001 12.0099 15.0001C11.4579 15.0001 11.0099 14.5521 11.0099 14.0001V12.9871C11.0179 12.4411 11.4599 12.0001 11.9999 12.0001C13.1029 12.0001 13.9999 11.1021 13.9999 10.0001C13.9999 8.89713 13.1029 8.00013 11.9999 8.00013C10.8959 8.00013 9.99935 8.92313 10.0004 10.0271C9.98522 10.5666 9.54291 11 9 11C8.47773 11 8.04856 10.599 8.00385 10.0882C8.00385 10.0882 8 10.0297 8 10ZM12 18C11.448 18 11 17.552 11 17C11 16.448 11.448 16 12 16C12.552 16 13 16.448 13 17C13 17.552 12.552 18 12 18Z"
                                    fill="currentColor"></path>
                            </svg>
                        </button>
                        <ul class="dropdown-menu dropdown-notification">
                            <div class="dropdown-info">
                                <div class="info-image">
                                    <img src="info.png" alt="">
                                </div>
                                <div class="info-text">
                                    <span>Trello Taktik Rehberiyle Takımınızı </span>
                                    <span>Harekete Geçirmek Çok kolay</span>
                                </div>
                                <div class="info-ipucu">
                                    <span>Yeni bir ipucu al.</span>
                                </div>
                                <div class="cizgi"></div>
                                <div class="info-footer">
                                    <div class="footer-text-1">
                                        <span>Ücretler</span>
                                        <span>Uygulamalar</span>
                                        <span>Blog</span>
                                        <span>Gizlilik</span>
                                    </div>
                                    <div class="footer-text-2">
                                        <span>Bilgi Toplama Uyarısı</span>
                                        <span style="color: black">Daha Fazla...</span>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </div>

                </div>
                <div class="right-icon" id="pf">
                    <div class="dropdown">
                        <button data-bs-toggle="dropdown" data-bs-auto-close="outside">
                            AU
                        </button>
                        <ul class="dropdown-menu dropdown-sidebar">
                            <div class="dropdown-sidebar-container">
                                <div class="dropdown-sidebar-user">
                                    <div class="dropdown-user-text">
                                        <span>HESAP</span>
                                    </div>
                                    <div class="user-button-info">
                                        <button class="userProfileButton" data-bs-toggle="dropdown"
                                            data-bs-auto-close="outside">
                                            AU
                                        </button>
                                        <div class="sidebar-button-info-text">
                                            <span id="info-name">apk usta</span>
                                            <span id="info-email">cobanberat71@gmail.com</span>
                                        </div>
                                    </div>
                                    <div class="nav-item-sidebar">
                                        <ul>Hesap Değiştir</ul>
                                        <ul class="ul-yönet">Hesabı Yönet<svg width="17" height="17"
                                                viewBox="0 0 24 24" role="presentation">
                                                <g fill="currentcolor">
                                                    <path
                                                        d="M5 19.01V19zM5 4.99V5zM19 19v-6h2v6a2 2 0 0 1-1.99 2H5a2 2 0 0 1-2-1.99V4.99C3 3.89 3.9 3 5 3h6v2H5v14zM5 4.99V5zM11 5H5v14h14v-6h2v6a2 2 0 0 1-1.99 2H5a2 2 0 0 1-2-1.99V4.99C3 3.89 3.9 3 5 3h6zm8 0v3a1 1 0 0 0 2 0V4a1 1 0 0 0-1-1h-4a1 1 0 0 0 0 2z">
                                                    </path>
                                                    <path
                                                        d="m12.707 12.707 8-8a1 1 0 1 0-1.414-1.414l-8 8a1 1 0 0 0 1.414 1.414">
                                                    </path>
                                                </g>
                                            </svg>
                                        </ul>
                                    </div>
                                </div>
                                <br>
                                <div class="cizgi"></div>
                                <div class="dropdown-sidebar-trello">
                                    <div class="trello-sidebar-container">
                                        <div class="trello-text">
                                            <span>TRELLO</span>
                                        </div>
                                        <div class="trello-nav">
                                            <div class="trello-nav-item">
                                                <span>Profil ve Görünürlük</span>
                                            </div>
                                            <div class="trello-nav-item">
                                                <span>Etkinlik</span>
                                            </div>
                                            <div class="trello-nav-item">
                                                <span>Kartlar</span>
                                            </div>
                                            <div class="trello-nav-item">
                                                <span>Ayarlar</span>
                                            </div>
                                            <div class="trello-nav-item">
                                                <span>Tema <i class="bi bi-chevron-right"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="cizgi"></div>
                                <div class="dropdown-sidebar-calisma-add">
                                    <span class="trello-nav-item-add">
                                        <svg width="17" height="17" role="presentation" focusable="false"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12.5048 5.67168C11.9099 5.32669 11.2374 5.10082 10.5198 5.0267C11.2076 3.81639 12.5085 3 14 3C16.2092 3 18 4.79086 18 7C18 7.99184 17.639 8.89936 17.0413 9.59835C19.9512 10.7953 22 13.6584 22 17C22 17.5523 21.5523 18 21 18H18.777C18.6179 17.2987 18.3768 16.6285 18.0645 16H19.917C19.4892 13.4497 17.4525 11.445 14.8863 11.065C14.9608 10.7218 15 10.3655 15 10C15 9.58908 14.9504 9.18974 14.857 8.80763C15.5328 8.48668 16 7.79791 16 7C16 5.89543 15.1046 5 14 5C13.4053 5 12.8711 5.25961 12.5048 5.67168ZM10 12C11.1046 12 12 11.1046 12 10C12 8.89543 11.1046 8 10 8C8.89543 8 8 8.89543 8 10C8 11.1046 8.89543 12 10 12ZM14 10C14 10.9918 13.639 11.8994 13.0412 12.5984C15.9512 13.7953 18 16.6584 18 20C18 20.5523 17.5523 21 17 21H3C2.44772 21 2 20.5523 2 20C2 16.6584 4.04879 13.7953 6.95875 12.5984C6.36099 11.8994 6 10.9918 6 10C6 7.79086 7.79086 6 10 6C12.2091 6 14 7.79086 14 10ZM9.99999 14C12.973 14 15.441 16.1623 15.917 19H4.08295C4.55902 16.1623 7.02699 14 9.99999 14Z"
                                                fill="currentColor"></path>
                                        </svg>
                                        <span>Çalışma Alanı Oluştur</span>
                                    </span>
                                </div>
                                <div class="cizgi"></div>
                                <div class="dropdown-sidebar-help">
                                    <div class="trello-nav-item">
                                        <span>Yardım</span>
                                    </div>
                                    <div class="trello-nav-item">
                                        <span>Kısayollar</span>
                                    </div>
                                </div>
                                <div class="cizgi"></div>
                                <div class="dropdown-sidebar-exit">
                                    <div class="trello-nav-item">
                                        <span>Çıkış Yap</span>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="main">
        @yield('sidebar')
        @yield('container')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
