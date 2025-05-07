@extends('layouts.app')
@section('container')
    @php
        $user = App\Models\User::where('id', auth()->id())->first();
        $fullName = $user->name;
        $words = explode(' ', $fullName);
        $sonuc = '';

        foreach ($words as $word) {
            $sonuc .= strtoupper(substr($word, 0, 1));
        }
        $favs = App\Models\favories::with('favori')->where('user_id', Auth::id())->get();

    @endphp
    <div class="container-two">
        <div class="container-main">
            <div class="container-main-sidebar">
                <div class="container-sidebar-left">
                    <div class="project-title" id="projectTitleContainer">
                        <span id="panoName" data-card-id="{{ $panoName->id }}" class="clickable-text">
                            {{ $panoName->name }}
                        </span>
                    </div>
                    <input type="text" id="editPanoInput" class="d-none" value="{{ $panoName->name }}" />

                    <div class="project-logo-container">
                        <div class="project-fav">

                            <label class="star" style="cursor:pointer;">
                                <input type="checkbox" class="star-toggle" data-pano-id="{{ $panoName->id }}"
                                    @if ($isFavori) checked @endif style="display: none;">


                                <div class="ort-srcs">
                                    <svg class="star-fill" width="20" height="20" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.9999 18.6266L7.49495 20.995C6.739 21.3924 5.80401 21.1018 5.40658 20.3459C5.24833 20.0448 5.19372 19.7 5.25121 19.3649L6.11158 14.3485L2.46699 10.7959C1.85542 10.1998 1.84291 9.22074 2.43904 8.60917C2.67643 8.36564 2.98747 8.20715 3.32403 8.15825L8.36072 7.42637L10.6132 2.86236C10.9912 2.0965 11.9184 1.78206 12.6843 2.16003C12.9892 2.31054 13.2361 2.55739 13.3866 2.86236L15.6391 7.42637L20.6758 8.15825C21.5209 8.28106 22.1065 9.06576 21.9837 9.91094C21.9348 10.2475 21.7763 10.5585 21.5328 10.7959L17.8882 14.3485L18.7486 19.3649C18.893 20.2066 18.3276 21.006 17.4859 21.1504C17.1507 21.2079 16.8059 21.1533 16.5049 20.995L11.9999 18.6266Z"
                                            fill="currentColor" />
                                    </svg>

                                    <svg class="star-empty" width="20" height="20" fill="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.49495 20.995L11.9999 18.6266L16.5049 20.995C16.8059 21.1533 17.1507 21.2079 17.4859 21.1504C18.3276 21.006 18.893 20.2066 18.7486 19.3649L17.8882 14.3485L21.5328 10.7959C21.7763 10.5585 21.9348 10.2475 21.9837 9.91094C22.1065 9.06576 21.5209 8.28106 20.6758 8.15825L15.6391 7.42637L13.3866 2.86236C13.2361 2.55739 12.9892 2.31054 12.6843 2.16003C11.9184 1.78206 10.9912 2.0965 10.6132 2.86236L8.36072 7.42637L3.32403 8.15825C2.98747 8.20715 2.67643 8.36564 2.43904 8.60917C1.84291 9.22074 1.85542 10.1998 2.46699 10.7959L6.11158 14.3485L5.25121 19.3649C5.19372 19.7 5.24833 20.0448 5.40658 20.3459C5.80401 21.1018 6.739 21.3924 7.49495 20.995ZM19.3457 10.0485L15.6728 13.6287L16.5398 18.684L11.9999 16.2972L7.45995 18.684L8.327 13.6287L4.65411 10.0485L9.72993 9.31093L11.9999 4.71146L14.2699 9.31093L19.3457 10.0485Z"
                                            fill="currentColor" />
                                    </svg>
                                </div>
                            </label>

                        </div>
                        <div class="dropdown">
                            <div class="project-web" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <svg width="16" height="16" role="presentation" focusable="false" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.5048 5.67168C11.9099 5.32669 11.2374 5.10082 10.5198 5.0267C11.2076 3.81639 12.5085 3 14 3C16.2092 3 18 4.79086 18 7C18 7.99184 17.639 8.89936 17.0413 9.59835C19.9512 10.7953 22 13.6584 22 17C22 17.5523 21.5523 18 21 18H18.777C18.6179 17.2987 18.3768 16.6285 18.0645 16H19.917C19.4892 13.4497 17.4525 11.445 14.8863 11.065C14.9608 10.7218 15 10.3655 15 10C15 9.58908 14.9504 9.18974 14.857 8.80763C15.5328 8.48668 16 7.79791 16 7C16 5.89543 15.1046 5 14 5C13.4053 5 12.8711 5.25961 12.5048 5.67168ZM10 12C11.1046 12 12 11.1046 12 10C12 8.89543 11.1046 8 10 8C8.89543 8 8 8.89543 8 10C8 11.1046 8.89543 12 10 12ZM14 10C14 10.9918 13.639 11.8994 13.0412 12.5984C15.9512 13.7953 18 16.6584 18 20C18 20.5523 17.5523 21 17 21H3C2.44772 21 2 20.5523 2 20C2 16.6584 4.04879 13.7953 6.95875 12.5984C6.36099 11.8994 6 10.9918 6 10C6 7.79086 7.79086 6 10 6C12.2091 6 14 7.79086 14 10ZM9.99999 14C12.973 14 15.441 16.1623 15.917 19H4.08295C4.55902 16.1623 7.02699 14 9.99999 14Z"
                                        fill="currentColor"></path>
                                </svg>
                            </div>
                            <ul class="dropdown-menu dropdown-visibility">
                                <div class="ust-text">
                                    <div class="text-visibility">
                                        <span>Görünürlüğü Değiştir</span>
                                    </div>
                                    <div class="exit-visibility cursor-pointer"  onclick="document.body.click()">
                                        <span> <i class="bi bi-x"></i> </span>
                                    </div>
                                </div>
                                <div class="ort-option">
                                    <div class="option-baslik-act">
                                        <span>#</span>
                                        <span style="color:red">
                                            <svg width="16" height="16" role="presentation" focusable="false"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5 11C5 9.89543 5.89543 9 7 9H8H10H14H16H17C18.1046 9 19 9.89543 19 11V19C19 20.1046 18.1046 21 17 21H7C5.89543 21 5 20.1046 5 19V11ZM10 11H14H16H17V19H7V11H8H10ZM14 15C14 16.1046 13.1046 17 12 17C10.8954 17 10 16.1046 10 15C10 13.8954 10.8954 13 12 13C13.1046 13 14 13.8954 14 15Z"
                                                    fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.3817 5.69846C10.0982 6.10344 10 6.63103 10 7V9H8V7C8 6.36897 8.15175 5.39656 8.74327 4.55154C9.37523 3.64874 10.4367 3 12 3C13.5633 3 14.6248 3.64874 15.2567 4.55154C15.8482 5.39656 16 6.36897 16 7V9H14V7C14 6.63103 13.9018 6.10344 13.6183 5.69846C13.3752 5.35126 12.9367 5 12 5C11.0633 5 10.6248 5.35126 10.3817 5.69846Z"
                                                    fill="currentColor"></path>
                                            </svg></span>
                                        <span style="color:#172b4d;">Özel</span>
                                    </div>
                                    <div class="option-text">
                                        <span>Yalnızca pano üyeleri bu panoyu görebilir. Çalışma alanı yöneticileri
                                            panoyu
                                            kapatabilir veya üyeleri kaldırabilir.</span>
                                    </div>
                                </div>
                                <div class="ort-option">
                                    <div class="option-baslik-act">
                                        <span style="color:#44546f;">
                                            <svg width="17" height="17" role="presentation" focusable="false"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M12.5048 5.67168C11.9099 5.32669 11.2374 5.10082 10.5198 5.0267C11.2076 3.81639 12.5085 3 14 3C16.2092 3 18 4.79086 18 7C18 7.99184 17.639 8.89936 17.0413 9.59835C19.9512 10.7953 22 13.6584 22 17C22 17.5523 21.5523 18 21 18H18.777C18.6179 17.2987 18.3768 16.6285 18.0645 16H19.917C19.4892 13.4497 17.4525 11.445 14.8863 11.065C14.9608 10.7218 15 10.3655 15 10C15 9.58908 14.9504 9.18974 14.857 8.80763C15.5328 8.48668 16 7.79791 16 7C16 5.89543 15.1046 5 14 5C13.4053 5 12.8711 5.25961 12.5048 5.67168ZM10 12C11.1046 12 12 11.1046 12 10C12 8.89543 11.1046 8 10 8C8.89543 8 8 8.89543 8 10C8 11.1046 8.89543 12 10 12ZM14 10C14 10.9918 13.639 11.8994 13.0412 12.5984C15.9512 13.7953 18 16.6584 18 20C18 20.5523 17.5523 21 17 21H3C2.44772 21 2 20.5523 2 20C2 16.6584 4.04879 13.7953 6.95875 12.5984C6.36099 11.8994 6 10.9918 6 10C6 7.79086 7.79086 6 10 6C12.2091 6 14 7.79086 14 10ZM9.99999 14C12.973 14 15.441 16.1623 15.917 19H4.08295C4.55902 16.1623 7.02699 14 9.99999 14Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <span>Çalışma Alanı</span>
                                        <span style="color:#44546f;">
                                            <svg width="17" height="17" role="presentation" focusable="false"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.73534 12.3223C6.36105 11.9162 5.72841 11.8904 5.3223 12.2647C4.91619 12.639 4.89039 13.2716 5.26467 13.6777L8.87678 17.597C9.41431 18.1231 10.2145 18.1231 10.7111 17.6264C10.7724 17.5662 10.7724 17.5662 11.0754 17.2683C11.3699 16.9785 11.6981 16.6556 12.0516 16.3075C13.0614 15.313 14.0713 14.3169 15.014 13.3848L15.0543 13.3449C16.7291 11.6887 18.0004 10.4236 18.712 9.70223C19.0998 9.30904 19.0954 8.67589 18.7022 8.28805C18.309 7.90022 17.6759 7.90457 17.2881 8.29777C16.5843 9.01131 15.3169 10.2724 13.648 11.9228L13.6077 11.9626C12.6662 12.8937 11.6572 13.8889 10.6483 14.8825C10.3578 15.1685 10.0845 15.4375 9.83288 15.6851L6.73534 12.3223Z"
                                                    fill="currentColor"></path>

                                            </svg>
                                        </span>
                                    </div>
                                    <div class="option-text">
                                        <span>Trello Çalışma Alanı Çalışma Alanının tüm üyeleri bu panoyu görebilir ve
                                            düzenleyebilir.</span>
                                    </div>
                                </div>
                                <div class="none-element">
                                    <div class="option-baslik">
                                        <span>
                                            <svg width="17" height="17" role="presentation" focusable="false"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M7 5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V6H19V20H5V6H7V5ZM9 6H15V5H9V6ZM7 9C7 8.44772 7.44772 8 8 8H10C10.5523 8 11 8.44772 11 9V16C11 16.5523 10.5523 17 10 17H8C7.44772 17 7 16.5523 7 16V9ZM14 8C13.4477 8 13 8.44772 13 9V14C13 14.5523 13.4477 15 14 15H16C16.5523 15 17 14.5523 17 14V9C17 8.44772 16.5523 8 16 8H14Z"
                                                    fill="currentColor"></path>
                                                <path d="M4 6C2.89543 6 2 6.89543 2 8V18C2 19.1046 2.89543 20 4 20L4 6Z"
                                                    fill="currentColor"></path>
                                                <path d="M20 20V6C21.1046 6 22 6.89543 22 8V18C22 19.1046 21.1046 20 20 20Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <span>Organizasyon</span>
                                    </div>
                                    <div style="color: #caced6;" class="option-text">
                                        <span>Organizasyonun Tüm Üyeleri bu panoyu görebilir. Bunu Etkinleştirmek için
                                            pano
                                            bir kurumsal Çalışma Alanına eklenmelidir.</span>
                                    </div>
                                </div>
                                <div class="ort-option">
                                    <div class="option-baslik-act">
                                        <span>#</span>
                                        <span style="color:#22a06b">
                                            <svg width="17" height="17" role="presentation" focusable="false"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11 18.9291V18C11 17.4477 10.5523 17 10 17C9.44772 17 9 16.5523 9 16V15L5.06227 11.0623C5.0212 11.369 5 11.682 5 12C5 15.5265 7.60771 18.4439 11 18.9291ZM14.9929 5.67024C14.9065 6.69513 14.0472 7.5 13 7.5H11V9C11 9.55228 10.5523 10 10 10H8V12H13C14.1046 12 15 12.8954 15 14V16H16C16.5198 16 16.9469 16.3966 16.9954 16.9037C18.2353 15.6407 19 13.9097 19 12C19 9.20479 17.3617 6.79224 14.9929 5.67024ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <span>Herkese Açık</span>
                                    </div>
                                    <div class="option-text">
                                        <span>İnternet'teki herkes bu panoyu görebilir. Yalznıca pano üyeleri
                                            düzenleyebilir.</span>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <div class="project-logo-buttons">
                        <div class="project-button">
                            <svg width="17" height="17" role="presentation" focusable="false"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M2 7V15C2 16.1046 2.89543 17 4 17H6C7.10457 17 8 16.1046 8 15V7C8 5.89543 7.10457 5 6 5H4C2.89543 5 2 5.89543 2 7ZM4 7V15H6V7L4 7Z"
                                    fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9 7V13C9 14.1046 9.89543 15 11 15H13C14.1046 15 15 14.1046 15 13V7C15 5.89543 14.1046 5 13 5H11C9.89543 5 9 5.89543 9 7ZM11 7V13H13V7L11 7Z"
                                    fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M16 17V7C16 5.89543 16.8954 5 18 5H20C21.1046 5 22 5.89543 22 7V17C22 18.1046 21.1046 19 20 19H18C16.8954 19 16 18.1046 16 17ZM18 17V7L20 7V17H18Z"
                                    fill="currentColor"></path>
                            </svg>
                            <span>Pano</span>
                        </div>
                        <!-- #region <div class="project-table-left">
                                                                                                <svg width="17" height="17" role="presentation" focusable="false"
                                                                                                    viewBox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
                                                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                                        d="M1.66683 9.66665C0.93045 9.66665 0.333496 9.06969 0.333496 8.33331V1.66665C0.333496 0.930267 0.93045 0.333313 1.66683 0.333313H12.3335C13.0699 0.333313 13.6668 0.930267 13.6668 1.66665V8.33331C13.6668 9.06969 13.0699 9.66665 12.3335 9.66665H1.66683ZM12.3335 5.66665V4.33331H5.66683V5.66665H12.3335ZM12.3335 2.99998V1.66665H5.66683V2.99998H12.3335ZM12.3335 6.99998V8.33331H5.66683V6.99998H12.3335ZM1.66683 4.33331V5.66665H4.3335V4.33331H1.66683ZM1.66683 6.99998V8.33331H4.3335V6.99998H1.66683ZM1.66683 2.99998V1.66665H4.3335V2.99998H1.66683Z"
                                                                                                        fill="currentColor"></path>
                                                                                                </svg>
                                                                                                <span>Tablo</span>
                                                                                            </div>
                                                                                            -->
                        <div class="dropdown">
                            <div class="project-bottom-logo" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                style="cursor: pointer;">
                                <i class="bi bi-chevron-down"></i>
                            </div>
                            <ul class="dropdown-menu dropdown-appearance">
                                <div class="ust-text">
                                    <div class="text-visibility-appearance" style="width:90%">
                                        <span>Görünümler için Yükseltin</span>
                                    </div>
                                    <div class="exit-visibility cursor-pointer" onclick="document.body.click()">
                                        <span> <i class="bi bi-x"></i> </span>
                                    </div>
                                </div>
                                <div class="ort-option-appearance">
                                    <div class="option-baslik-act">
                                        <span>
                                            <svg width="24" height="24" viewBox="0 0 24 24" role="presentation">
                                                <g fill="currentcolor" fill-rule="evenodd">
                                                    <circle cx="10" cy="8" r="1"></circle>
                                                    <circle cx="14" cy="8" r="1"></circle>
                                                    <circle cx="10" cy="16" r="1"></circle>
                                                    <circle cx="14" cy="16" r="1"></circle>
                                                    <circle cx="10" cy="12" r="1"></circle>
                                                    <circle cx="14" cy="12" r="1"></circle>
                                                </g>
                                            </svg>
                                        </span>
                                        <span><input class="none-color" checked disabled type="checkbox"></span>
                                    </div>
                                    <div class="option-text-s-act">
                                        <span class="option-text-s-span">
                                            <svg width="17" height="17" role="presentation" focusable="false"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M2 7V15C2 16.1046 2.89543 17 4 17H6C7.10457 17 8 16.1046 8 15V7C8 5.89543 7.10457 5 6 5H4C2.89543 5 2 5.89543 2 7ZM4 7V15H6V7L4 7Z"
                                                    fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M9 7V13C9 14.1046 9.89543 15 11 15H13C14.1046 15 15 14.1046 15 13V7C15 5.89543 14.1046 5 13 5H11C9.89543 5 9 5.89543 9 7ZM11 7V13H13V7L11 7Z"
                                                    fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M16 17V7C16 5.89543 16.8954 5 18 5H20C21.1046 5 22 5.89543 22 7V17C22 18.1046 21.1046 19 20 19H18C16.8954 19 16 18.1046 16 17ZM18 17V7L20 7V17H18Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                            <span>Pano</span>
                                        </span>
                                        <span>
                                            <svg width="17" height="17" role="presentation" focusable="false"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5 11C5 9.89543 5.89543 9 7 9H8H10H14H16H17C18.1046 9 19 9.89543 19 11V19C19 20.1046 18.1046 21 17 21H7C5.89543 21 5 20.1046 5 19V11ZM10 11H14H16H17V19H7V11H8H10ZM14 15C14 16.1046 13.1046 17 12 17C10.8954 17 10 16.1046 10 15C10 13.8954 10.8954 13 12 13C13.1046 13 14 13.8954 14 15Z"
                                                    fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.3817 5.69846C10.0982 6.10344 10 6.63103 10 7V9H8V7C8 6.36897 8.15175 5.39656 8.74327 4.55154C9.37523 3.64874 10.4367 3 12 3C13.5633 3 14.6248 3.64874 15.2567 4.55154C15.8482 5.39656 16 6.36897 16 7V9H14V7C14 6.63103 13.9018 6.10344 13.6183 5.69846C13.3752 5.35126 12.9367 5 12 5C11.0633 5 10.6248 5.35126 10.3817 5.69846Z"
                                                    fill="currentColor"></path>

                                            </svg></span>
                                    </div>
                                </div>

                                <div class="ort-option-appearance">
                                    <div class="option-baslik">
                                        <span>
                                            <svg width="24" height="24" viewBox="0 0 24 24" role="presentation">
                                                <g fill="currentcolor" fill-rule="evenodd">
                                                    <circle cx="10" cy="8" r="1"></circle>
                                                    <circle cx="14" cy="8" r="1"></circle>
                                                    <circle cx="10" cy="16" r="1"></circle>
                                                    <circle cx="14" cy="16" r="1"></circle>
                                                    <circle cx="10" cy="12" r="1"></circle>
                                                    <circle cx="14" cy="12" r="1"></circle>
                                                </g>
                                            </svg>
                                        </span>
                                        <span><input type="checkbox" disabled></span>
                                    </div>
                                    <div class="option-text-s">
                                        <span class="option-text-s-span">
                                            <svg width="17" height="17" role="presentation" focusable="false"
                                                viewBox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M1.66683 9.66665C0.93045 9.66665 0.333496 9.06969 0.333496 8.33331V1.66665C0.333496 0.930267 0.93045 0.333313 1.66683 0.333313H12.3335C13.0699 0.333313 13.6668 0.930267 13.6668 1.66665V8.33331C13.6668 9.06969 13.0699 9.66665 12.3335 9.66665H1.66683ZM12.3335 5.66665V4.33331H5.66683V5.66665H12.3335ZM12.3335 2.99998V1.66665H5.66683V2.99998H12.3335ZM12.3335 6.99998V8.33331H5.66683V6.99998H12.3335ZM1.66683 4.33331V5.66665H4.3335V4.33331H1.66683ZM1.66683 6.99998V8.33331H4.3335V6.99998H1.66683ZM1.66683 2.99998V1.66665H4.3335V2.99998H1.66683Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                            <span>Tablo</span>
                                        </span>
                                        <span><svg width="17" height="17" role="presentation" focusable="false"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5 11C5 9.89543 5.89543 9 7 9H8H10H14H16H17C18.1046 9 19 9.89543 19 11V19C19 20.1046 18.1046 21 17 21H7C5.89543 21 5 20.1046 5 19V11ZM10 11H14H16H17V19H7V11H8H10ZM14 15C14 16.1046 13.1046 17 12 17C10.8954 17 10 16.1046 10 15C10 13.8954 10.8954 13 12 13C13.1046 13 14 13.8954 14 15Z"
                                                    fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.3817 5.69846C10.0982 6.10344 10 6.63103 10 7V9H8V7C8 6.36897 8.15175 5.39656 8.74327 4.55154C9.37523 3.64874 10.4367 3 12 3C13.5633 3 14.6248 3.64874 15.2567 4.55154C15.8482 5.39656 16 6.36897 16 7V9H14V7C14 6.63103 13.9018 6.10344 13.6183 5.69846C13.3752 5.35126 12.9367 5 12 5C11.0633 5 10.6248 5.35126 10.3817 5.69846Z"
                                                    fill="currentColor"></path>

                                            </svg></span>
                                    </div>
                                </div>
                                <div class="ort-option-appearance">
                                    <div class="option-baslik">
                                        <span>
                                            <svg width="24" height="24" viewBox="0 0 24 24" role="presentation">
                                                <g fill="currentcolor" fill-rule="evenodd">
                                                    <circle cx="10" cy="8" r="1"></circle>
                                                    <circle cx="14" cy="8" r="1"></circle>
                                                    <circle cx="10" cy="16" r="1"></circle>
                                                    <circle cx="14" cy="16" r="1"></circle>
                                                    <circle cx="10" cy="12" r="1"></circle>
                                                    <circle cx="14" cy="12" r="1"></circle>
                                                </g>
                                            </svg>
                                        </span>
                                        <span><input type="checkbox" disabled></span>
                                    </div>
                                    <div class="option-text-s">
                                        <span class="option-text-s-span">
                                            <svg width="17" height="17" role="presentation" focusable="false"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M6 4V5H4.995C3.892 5 3 5.893 3 6.994V19.006C3 20.106 3.893 21 4.995 21H19.005C20.108 21 21 20.107 21 19.006V6.994C21 5.895 20.107 5 19.005 5H18V4C18 3.448 17.552 3 17 3C16.448 3 16 3.448 16 4V5H8V4C8 3.448 7.552 3 7 3C6.448 3 6 3.448 6 4ZM5.25 9.571V17.718C5.25 18.273 5.694 18.714 6.243 18.714H17.758C18.3 18.714 18.75 18.268 18.75 17.718V9.571H5.25ZM9 13V10.999H7V13H9ZM17 10.999V13H15V10.999H17ZM11 13H13.001V10.999H11V13ZM7 17V15H9V17H7ZM11 17H13.001V15H11V17ZM17 15V17H15V15H17Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                            <span>Takvim</span>
                                        </span>
                                        <span><svg width="17" height="17" role="presentation" focusable="false"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5 11C5 9.89543 5.89543 9 7 9H8H10H14H16H17C18.1046 9 19 9.89543 19 11V19C19 20.1046 18.1046 21 17 21H7C5.89543 21 5 20.1046 5 19V11ZM10 11H14H16H17V19H7V11H8H10ZM14 15C14 16.1046 13.1046 17 12 17C10.8954 17 10 16.1046 10 15C10 13.8954 10.8954 13 12 13C13.1046 13 14 13.8954 14 15Z"
                                                    fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.3817 5.69846C10.0982 6.10344 10 6.63103 10 7V9H8V7C8 6.36897 8.15175 5.39656 8.74327 4.55154C9.37523 3.64874 10.4367 3 12 3C13.5633 3 14.6248 3.64874 15.2567 4.55154C15.8482 5.39656 16 6.36897 16 7V9H14V7C14 6.63103 13.9018 6.10344 13.6183 5.69846C13.3752 5.35126 12.9367 5 12 5C11.0633 5 10.6248 5.35126 10.3817 5.69846Z"
                                                    fill="currentColor"></path>

                                            </svg></span>
                                    </div>
                                </div>
                                <div class="ort-option-appearance">
                                    <div class="option-baslik">
                                        <span>
                                            <svg width="24" height="24" viewBox="0 0 24 24" role="presentation">
                                                <g fill="currentcolor" fill-rule="evenodd">
                                                    <circle cx="10" cy="8" r="1"></circle>
                                                    <circle cx="14" cy="8" r="1"></circle>
                                                    <circle cx="10" cy="16" r="1"></circle>
                                                    <circle cx="14" cy="16" r="1"></circle>
                                                    <circle cx="10" cy="12" r="1"></circle>
                                                    <circle cx="14" cy="12" r="1"></circle>
                                                </g>
                                            </svg>
                                        </span>
                                        <span>
                                            <input type="checkbox" disabled>
                                        </span>
                                    </div>
                                    <div class="option-text-s">
                                        <span class="option-text-s-span">
                                            <svg width="17" height="17" role="presentation" focusable="false"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M4.5 4H11.5C12.8807 4 14 5.11929 14 6.5C14 7.88071 12.8807 9 11.5 9H4.5C3.11929 9 2 7.88071 2 6.5C2 5.11929 3.11929 4 4.5 4ZM11.5 7C11.7761 7 12 6.77614 12 6.5C12 6.22386 11.7761 6 11.5 6H4.5C4.22386 6 4 6.22386 4 6.5C4 6.77614 4.22386 7 4.5 7H11.5Z"
                                                    fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M6.5 10H13.5C14.8807 10 16 11.1193 16 12.5C16 13.8807 14.8807 15 13.5 15H6.5C5.11929 15 4 13.8807 4 12.5C4 11.1193 5.11929 10 6.5 10ZM13.5 13C13.7761 13 14 12.7761 14 12.5C14 12.2239 13.7761 12 13.5 12H6.5C6.22386 12 6 12.2239 6 12.5C6 12.7761 6.22386 13 6.5 13H13.5Z"
                                                    fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M18.5 16H11.5C10.1193 16 9 17.1193 9 18.5C9 19.8807 10.1193 21 11.5 21H18.5C19.8807 21 21 19.8807 21 18.5C21 17.1193 19.8807 16 18.5 16ZM11.5 19C11.2239 19 11 18.7761 11 18.5C11 18.2239 11.2239 18 11.5 18H18.5C18.7761 18 19 18.2239 19 18.5C19 18.7761 18.7761 19 18.5 19H11.5Z"
                                                    fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M17.5 4H19.5C20.8807 4 22 5.11929 22 6.5C22 7.88071 20.8807 9 19.5 9H17.5C16.1193 9 15 7.88071 15 6.5C15 5.11929 16.1193 4 17.5 4ZM19.5 7C19.7761 7 20 6.77614 20 6.5C20 6.22386 19.7761 6 19.5 6H17.5C17.2239 6 17 6.22386 17 6.5C17 6.77614 17.2239 7 17.5 7H19.5Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                            <span>Zaman Çizelgesi</span>
                                        </span>
                                        <span><svg width="17" height="17" role="presentation" focusable="false"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5 11C5 9.89543 5.89543 9 7 9H8H10H14H16H17C18.1046 9 19 9.89543 19 11V19C19 20.1046 18.1046 21 17 21H7C5.89543 21 5 20.1046 5 19V11ZM10 11H14H16H17V19H7V11H8H10ZM14 15C14 16.1046 13.1046 17 12 17C10.8954 17 10 16.1046 10 15C10 13.8954 10.8954 13 12 13C13.1046 13 14 13.8954 14 15Z"
                                                    fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.3817 5.69846C10.0982 6.10344 10 6.63103 10 7V9H8V7C8 6.36897 8.15175 5.39656 8.74327 4.55154C9.37523 3.64874 10.4367 3 12 3C13.5633 3 14.6248 3.64874 15.2567 4.55154C15.8482 5.39656 16 6.36897 16 7V9H14V7C14 6.63103 13.9018 6.10344 13.6183 5.69846C13.3752 5.35126 12.9367 5 12 5C11.0633 5 10.6248 5.35126 10.3817 5.69846Z"
                                                    fill="currentColor"></path>

                                            </svg></span>
                                    </div>
                                </div>
                                <div class="ort-option-appearance">
                                    <div class="option-baslik">
                                        <span>
                                            <svg width="24" height="24" viewBox="0 0 24 24" role="presentation">
                                                <g fill="currentcolor" fill-rule="evenodd">
                                                    <circle cx="10" cy="8" r="1"></circle>
                                                    <circle cx="14" cy="8" r="1"></circle>
                                                    <circle cx="10" cy="16" r="1"></circle>
                                                    <circle cx="14" cy="16" r="1"></circle>
                                                    <circle cx="10" cy="12" r="1"></circle>
                                                    <circle cx="14" cy="12" r="1"></circle>
                                                </g>
                                            </svg>
                                        </span>
                                        <span><input type="checkbox" disabled></span>
                                    </div>
                                    <div class="option-text-s">
                                        <span class="option-text-s-span">
                                            <svg width="17" height="17" role="presentation" focusable="false"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M18.1586 10.6697C18.6953 11.6601 19 12.7945 19 14V15C19 15.5523 18.5523 16 18 16H6C5.44772 16 5 15.5523 5 15V14C5 10.134 8.13401 7 12 7C13.2055 7 14.3398 7.30472 15.3301 7.84134L16.2419 6.92954C16.447 6.72443 16.6856 6.57318 16.9401 6.4758C15.522 5.54283 13.8244 5 12 5C7.02944 5 3 9.02944 3 14V16C3 17.1046 3.89543 18 5 18H19C20.1046 18 21 17.1046 21 16V14C21 12.1756 20.4571 10.4779 19.5241 9.05977C19.4267 9.31425 19.2755 9.55284 19.0704 9.75796L18.1586 10.6697ZM13 9C13 9.55228 12.5523 10 12 10C11.4477 10 11 9.55228 11 9C11 8.44772 11.4477 8 12 8C12.5523 8 13 8.44772 13 9ZM16.1989 11.2152L12.7071 14.707C12.3166 15.0976 11.6834 15.0976 11.2929 14.707C10.9023 14.3165 10.9023 13.6833 11.2929 13.2928L16.949 7.63667C17.3395 7.24615 17.9727 7.24615 18.3632 7.63667C18.7538 8.0272 18.7538 8.66036 18.3632 9.05089L16.2152 11.1989L16.1989 11.2152ZM18 14C18 14.5523 17.5523 15 17 15C16.4477 15 16 14.5523 16 14C16 13.4477 16.4477 13 17 13C17.5523 13 18 13.4477 18 14ZM7 15C7.55228 15 8 14.5523 8 14C8 13.4477 7.55228 13 7 13C6.44772 13 6 13.4477 6 14C6 14.5523 6.44772 15 7 15ZM9.5 10.5C9.5 11.0523 9.05228 11.5 8.5 11.5C7.94772 11.5 7.5 11.0523 7.5 10.5C7.5 9.94772 7.94772 9.5 8.5 9.5C9.05228 9.5 9.5 9.94772 9.5 10.5Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                            <span>Gösterge Panosu</span>
                                        </span>
                                        <span><svg width="17" height="17" role="presentation" focusable="false"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5 11C5 9.89543 5.89543 9 7 9H8H10H14H16H17C18.1046 9 19 9.89543 19 11V19C19 20.1046 18.1046 21 17 21H7C5.89543 21 5 20.1046 5 19V11ZM10 11H14H16H17V19H7V11H8H10ZM14 15C14 16.1046 13.1046 17 12 17C10.8954 17 10 16.1046 10 15C10 13.8954 10.8954 13 12 13C13.1046 13 14 13.8954 14 15Z"
                                                    fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.3817 5.69846C10.0982 6.10344 10 6.63103 10 7V9H8V7C8 6.36897 8.15175 5.39656 8.74327 4.55154C9.37523 3.64874 10.4367 3 12 3C13.5633 3 14.6248 3.64874 15.2567 4.55154C15.8482 5.39656 16 6.36897 16 7V9H14V7C14 6.63103 13.9018 6.10344 13.6183 5.69846C13.3752 5.35126 12.9367 5 12 5C11.0633 5 10.6248 5.35126 10.3817 5.69846Z"
                                                    fill="currentColor"></path>

                                            </svg></span>
                                    </div>
                                </div>
                                <div class="ort-option-appearance">
                                    <div class="option-baslik">
                                        <span>
                                            <svg width="24" height="24" viewBox="0 0 24 24" role="presentation">
                                                <g fill="currentcolor" fill-rule="evenodd">
                                                    <circle cx="10" cy="8" r="1"></circle>
                                                    <circle cx="14" cy="8" r="1"></circle>
                                                    <circle cx="10" cy="16" r="1"></circle>
                                                    <circle cx="14" cy="16" r="1"></circle>
                                                    <circle cx="10" cy="12" r="1"></circle>
                                                    <circle cx="14" cy="12" r="1"></circle>
                                                </g>
                                            </svg>
                                        </span>
                                        <span><input type="checkbox" disabled></span>
                                    </div>
                                    <div class="option-text-s">
                                        <span class="option-text-s-span">
                                            <svg width="17" height="24" role="presentation" focusable="false"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M12 21C14.2802 21 18 12.3137 18 9C18 5.68629 15.3137 3 12 3C8.68629 3 6 5.68629 6 9C6 12.3137 9.71981 21 12 21ZM12 12C13.6081 12 14.9118 10.6964 14.9118 9.08823C14.9118 7.48011 13.6081 6.17647 12 6.17647C10.3919 6.17647 9.08824 7.48011 9.08824 9.08823C9.08824 10.6964 10.3919 12 12 12Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                            <span>Harita</span>
                                        </span>
                                        <span>
                                            <svg width="17" height="17" role="presentation" focusable="false"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5 11C5 9.89543 5.89543 9 7 9H8H10H14H16H17C18.1046 9 19 9.89543 19 11V19C19 20.1046 18.1046 21 17 21H7C5.89543 21 5 20.1046 5 19V11ZM10 11H14H16H17V19H7V11H8H10ZM14 15C14 16.1046 13.1046 17 12 17C10.8954 17 10 16.1046 10 15C10 13.8954 10.8954 13 12 13C13.1046 13 14 13.8954 14 15Z"
                                                    fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.3817 5.69846C10.0982 6.10344 10 6.63103 10 7V9H8V7C8 6.36897 8.15175 5.39656 8.74327 4.55154C9.37523 3.64874 10.4367 3 12 3C13.5633 3 14.6248 3.64874 15.2567 4.55154C15.8482 5.39656 16 6.36897 16 7V9H14V7C14 6.63103 13.9018 6.10344 13.6183 5.69846C13.3752 5.35126 12.9367 5 12 5C11.0633 5 10.6248 5.35126 10.3817 5.69846Z"
                                                    fill="currentColor"></path>

                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="alt-texts">
                                    <div class="alt-text-job">
                                        <span>İşinizi farklı şekillerde görün</span>
                                    </div>
                                    <div class="alt-text-job-info">
                                        <span>Trello Premium ile ana zaman çizelgelerini,görevleri,verileri ve daha
                                            fazlasını doğrudan Trello panonuzdan görüntüleyin.</span>
                                    </div>
                                    <div class="alt-text-premium-upgrade">
                                        <button># Çalışma Alanını Premium'a Yükselt</button>
                                    </div>
                                    <div class="alt-text-footer">
                                        <span>Trello premium hakkında daha fazlasını</span>
                                        <span>öğrenin</span>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container-sidebar-right">
                    <div class="container-sidebar-ll">
                        <div class="dropdown">
                            <div class="project-bottom-logo-right" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                style="cursor: pointer;">
                                <svg width="16" height="16" role="presentation" focusable="false"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.5009 2.65511C18.4967 2.5456 19.5352 2.80718 20.364 3.63597L18.9498 5.05019C18.6192 4.71958 18.2151 4.58335 17.7106 4.63884C17.1593 4.69947 16.4959 4.96246 15.7486 5.38541C15.0122 5.80221 14.272 6.32856 13.5675 6.8454C13.4614 6.92326 13.3548 7.00186 13.2485 7.08031C12.6795 7.50008 12.1166 7.91532 11.6552 8.18878C11.1608 8.48182 10.6363 8.46971 10.3204 8.43815C9.98837 8.40498 9.19934 8.39748 7.94353 8.81849C7.16614 9.07911 6.21617 9.69953 5.40597 10.3177L5.34387 10.3653C5.59079 10.4171 5.85122 10.4646 6.11263 10.5076C6.62099 10.5913 7.11123 10.6543 7.47593 10.6964C7.65774 10.7174 7.80708 10.7331 7.9103 10.7434C7.96189 10.7486 8.00189 10.7525 8.02858 10.755L8.0584 10.7578L8.06686 10.7585L8.96578 11.8603L8.96537 11.8658L8.96296 11.8884C8.96079 11.909 8.95758 11.9404 8.95366 11.9813C8.9458 12.0632 8.93516 12.1826 8.92441 12.3287C8.9028 12.6224 8.88136 13.0163 8.88048 13.4263C8.87958 13.8425 8.90011 14.2437 8.95265 14.563C8.9897 14.7881 9.03099 14.8963 9.04531 14.9338C9.04927 14.9442 9.05033 14.9497 9.05033 14.9497C9.05033 14.9497 9.05582 14.9507 9.06621 14.9547C9.10371 14.969 9.2119 15.0103 9.43702 15.0474C9.75627 15.0999 10.1575 15.1204 10.5737 15.1195C10.9837 15.1186 11.3777 15.0972 11.6714 15.0756L12.1391 15.0341L13.2414 15.933L13.3036 16.5241C13.3457 16.8888 13.4087 17.379 13.4924 17.8874C13.5354 18.1488 13.583 18.4092 13.6347 18.6561L13.6823 18.594C14.3005 17.7838 14.9209 16.8339 15.1815 16.0565C15.6025 14.8007 15.595 14.0116 15.5619 13.6796C15.5303 13.3637 15.5182 12.8392 15.8112 12.3448C16.0847 11.8834 16.4999 11.3206 16.9197 10.7515C16.9981 10.6452 17.0767 10.5386 17.1546 10.4325C17.6715 9.72798 18.1978 8.98784 18.6146 8.25143C19.0376 7.50416 19.3005 6.84067 19.3612 6.28939C19.4167 5.78487 19.2804 5.38079 18.9498 5.05019L20.364 3.63597C21.1928 4.46477 21.4544 5.50334 21.3449 6.4991C21.2405 7.4481 20.8244 8.39124 20.3504 9.22877C19.8702 10.0772 19.2817 10.9 18.762 11.6084C18.674 11.7284 18.5889 11.8439 18.5069 11.9552C18.0946 12.5148 17.7615 12.9669 17.5439 13.3284C17.5413 13.3535 17.5403 13.3991 17.5477 13.4727C17.6103 14.0997 17.58 15.1726 17.0735 16.6835C16.7017 17.7925 15.9064 18.9623 15.2669 19.8003C14.9374 20.2322 14.6293 20.6014 14.4034 20.8629C14.2902 20.9939 14.1971 21.0986 14.1314 21.1714C14.0985 21.2078 14.0725 21.2363 14.0543 21.2561L14.0267 21.286L14.0239 21.289C13.8388 21.4871 13.5813 21.6021 13.3108 21.6073C13.0403 21.6124 12.7798 21.5076 12.5889 21.3167C12.3731 21.1009 12.2313 20.8327 12.1361 20.6177C12.0339 20.3868 11.9481 20.1296 11.8751 19.8725C11.729 19.3576 11.6128 18.7648 11.5231 18.2197C11.4566 17.8154 11.4027 17.425 11.3611 17.0937C11.1199 17.1058 10.8496 17.1146 10.5694 17.1152C10.1037 17.1162 9.57892 17.0947 9.10468 17.0166C8.69213 16.9487 8.05261 16.7804 7.63611 16.3639C7.21962 15.9474 7.05129 15.3079 6.9834 14.8953C6.90535 14.4211 6.88378 13.8964 6.88478 13.4306C6.88539 13.1504 6.89426 12.8801 6.90635 12.6389C6.57502 12.5974 6.18466 12.5434 5.78029 12.4769C5.23522 12.3872 4.64237 12.271 4.12751 12.1249C3.8704 12.0519 3.61317 11.9661 3.38231 11.8639C3.16733 11.7687 2.89915 11.6269 2.68332 11.4111C2.49244 11.2202 2.38758 10.9597 2.39276 10.6892C2.39794 10.4187 2.51272 10.1614 2.71081 9.97631L2.71401 9.97332L2.72063 9.96718L2.74387 9.94573C2.76373 9.92748 2.79221 9.90147 2.82863 9.86862C2.90143 9.80296 3.00612 9.70979 3.13714 9.59661C3.39866 9.37069 3.76781 9.06262 4.19969 8.73309C5.03769 8.09367 6.20752 7.29836 7.31652 6.92656C8.8274 6.42004 9.90036 6.3897 10.5273 6.45233C10.6009 6.45968 10.6465 6.45871 10.6716 6.45614C11.0331 6.23853 11.4852 5.90543 12.0448 5.49314C12.1561 5.41114 12.2716 5.32601 12.3916 5.23804C13.1 4.71833 13.9228 4.12982 14.7712 3.64963C15.6088 3.1756 16.5519 2.75948 17.5009 2.65511Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M15.4143 8.58572C15.8048 8.97624 16.438 8.97624 16.8285 8.58572C17.219 8.1952 17.219 7.56203 16.8285 7.17151C16.438 6.78098 15.8048 6.78098 15.4143 7.17151C15.0238 7.56203 15.0238 8.1952 15.4143 8.58572Z"
                                        fill="currentColor"></path>
                                </svg>
                            </div>
                            <ul class="dropdown-menu dropdown-appearance">
                                <div class="ust-text">
                                    <div class="text-visibility-appearance">
                                        <span>Power-Up'lar</span>
                                    </div>
                                    <div class="exit-visibility cursor-pointer"  onclick="document.body.click()">
                                        <span> <i class="bi bi-x"></i> </span>
                                    </div>
                                </div>
                                <div class="powerUpUlBody">
                                    <div class="powerBody-img">
                                        <img src="https://trello.com/assets/42f8533548e4eeb72589.png" alt="">
                                    </div>
                                    <div class="powerBody-text">
                                        <span>Panolarınıza ek özellikler getirin ve Google Drive, Slack ve daha fazlası gibi
                                            uygulamalarla entegrasyon yapın.</span>
                                    </div>
                                    <div class="powerBody-button">
                                        <button>Power-Up'lar Ekle</button>
                                    </div>
                                </div>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <div class="project-bottom-logo-right dropdown-toggle" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside" style="cursor: pointer;">
                                <svg width="17" height="17" role="presentation" focusable="false"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.1838 4.78749C10.2664 4.61167 10.4433 4.49957 10.6375 4.5L17.0011 4.51406C17.1951 4.51449 17.3713 4.62709 17.4532 4.80294C17.5352 4.97879 17.508 5.18614 17.3835 5.33492L13.9446 9.44482H16.8597C17.0645 9.44482 17.2486 9.5697 17.3243 9.76C17.4 9.95029 17.352 10.1675 17.2032 10.3082L7.62319 19.3634C7.44433 19.5324 7.16903 19.5462 6.97421 19.3958C6.77938 19.2454 6.72297 18.9756 6.84122 18.7598L9.86254 13.2448H7C6.82891 13.2448 6.66969 13.1573 6.57795 13.0129C6.48621 12.8685 6.47469 12.6872 6.54741 12.5323L10.1838 4.78749Z"
                                        fill="currentColor"></path>
                                </svg>
                            </div>
                            <ul data-bs-auto-close="outside" class="dropdown-menu dropdown-appearance">
                                <div class="ust-text">
                                    <div class="text-visibility-appearance" style="padding-right:15px ">
                                        <span>Otomasyon</span>
                                    </div>
                                    <div class="exit-visibility cursor-pointer" onclick="document.body.click()">
                                        <span> <i class="bi bi-x"></i> </span>
                                    </div>
                                </div>
                                <div class="ort-text-body">
                                    <div class="ort-text-body-select">
                                        <div class="body-select-ust">
                                            #
                                            <svg width="17" height="17" role="presentation" focusable="false"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8 5C9.31173 5 10.4264 5.84116 10.8342 7.01368C10.8881 7.00468 10.9435 7 11 7H20C20.5523 7 21 7.44772 21 8C21 8.55228 20.5523 9 20 9H11C10.9435 9 10.8881 8.99532 10.8342 8.98632C10.4264 10.1588 9.31173 11 8 11C6.68827 11 5.57361 10.1588 5.1658 8.98632C5.11187 8.99532 5.05648 9 5 9H4C3.44772 9 3 8.55228 3 8C3 7.44772 3.44772 7 4 7H5C5.05648 7 5.11187 7.00468 5.1658 7.01368C5.57361 5.84116 6.68827 5 8 5ZM18.8342 15.0137C18.4264 13.8412 17.3117 13 16 13C14.6883 13 13.5736 13.8412 13.1658 15.0137C13.1119 15.0047 13.0565 15 13 15H4C3.44772 15 3 15.4477 3 16C3 16.5523 3.44771 17 4 17H13C13.0565 17 13.1119 16.9953 13.1658 16.9863C13.5736 18.1588 14.6883 19 16 19C17.3117 19 18.4264 18.1588 18.8342 16.9863C18.8881 16.9953 18.9435 17 19 17H20C20.5523 17 21 16.5523 21 16C21 15.4477 20.5523 15 20 15H19C18.9435 15 18.8881 15.0047 18.8342 15.0137ZM17 16C17 16.5527 16.5527 17 16 17C15.4473 17 15 16.5527 15 16C15 15.4473 15.4473 15 16 15C16.5527 15 17 15.4473 17 16ZM8 9C8.55272 9 9 8.55272 9 8C9 7.44728 8.55272 7 8 7C7.44728 7 7 7.44728 7 8C7 8.55272 7.44728 9 8 9Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                            <span>Kurallar</span>
                                        </div>
                                        <div class="body-select-text">
                                            <span>İşlemlere, çizelgelere veya bir kartın bitiş tarihine otomatik yanıt veren
                                                kurallar oluşturun.</span>
                                        </div>
                                    </div>
                                    <div class="ort-text-body-select">
                                        <div class="body-select-ust">
                                            #
                                            <svg width="17" height="17" role="presentation" focusable="false"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5 5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5H5ZM19 7H5V13H19V7ZM17 16C17 16.5523 17.4477 17 18 17C18.5523 17 19 16.5523 19 16C19 15.4477 18.5523 15 18 15C17.4477 15 17 15.4477 17 16ZM6 17C5.44772 17 5 16.5523 5 16C5 15.4477 5.44772 15 6 15H10C10.5523 15 11 15.4477 11 16C11 16.5523 10.5523 17 10 17H6Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                            <span>Düğmeler</span>
                                        </div>
                                        <div class="body-select-text">
                                            <span>Her kartın arkasında veya panonun en üstünde özel düğmeler
                                                oluşturun</span>
                                        </div>
                                    </div>
                                    <div class="ort-text-body-select">
                                        <div class="body-select-ust">
                                            #
                                            <svg width="17" height="17" role="presentation" focusable="false"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5 17V8.831L9.756 13.586C10.973 14.805 12.948 14.805 14.166 13.586L19 8.752V17H5ZM17.924 7L12.752 12.172C12.315 12.609 11.607 12.609 11.169 12.172L5.998 7H17.924ZM19 5H5C3.9 5 3 5.9 3 7V17C3 18.1 3.9 19 5 19H19C20.1 19 21 18.1 21 17V7C21 5.9 20.1 5 19 5Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                            <span>E-posta raporları</span>
                                        </div>
                                        <div class="body-select-text">
                                            <span>Bitiş tarihi 7 gün içinde olan tüm kartların haftalık özeti gibi e-posta
                                                raporları ayarlayın.</span>
                                        </div>
                                    </div>
                                    <div class="ort-text-body-select">
                                        <div class="body-select-ust">
                                            #
                                            <svg width="17" height="17" role="presentation" focusable="false"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18.7361 4.34202C19.34 4.16086 19.9475 4.57579 20.0169 5.1837L20.0234 5.29985V17.3102C20.0234 17.9406 19.4514 18.4033 18.8492 18.2951L18.7361 18.268L11.0234 15.9532V17.7999C11.0234 19.1806 9.90415 20.2999 8.52344 20.2999C7.19795 20.2999 6.1134 19.2683 6.02876 17.9642L6.02344 17.7999V15.3102C4.96908 15.3102 4.10527 14.4943 4.02892 13.4594L4.02344 13.3102V9.29985C4.02344 8.24549 4.83932 7.38168 5.87418 7.30534L6.02344 7.29985L8.87544 7.29919L18.7361 4.34202ZM8.87644 15.3092H8.02344V17.7999C8.02344 18.076 8.2473 18.2999 8.52344 18.2999C8.7689 18.2999 8.97305 18.123 9.01538 17.8897L9.02344 17.7999V15.3532L8.87644 15.3092ZM18.0234 6.64285L10.0234 9.04285V13.5659L18.0234 15.9659V6.64285ZM8.02344 9.29985H6.02344V13.3102L6.93934 13.3082L7.02344 13.3047L7.10644 13.3092L8.02344 13.3099V9.29985Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                            <span>Geri Bildirim Gönder</span>
                                        </div>
                                        <div class="body-select-text">
                                            <span>Otomasyonlarınızı geliştirmemize yardımcı olun.</span>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </div>

                        <div class="project-table" style="cursor: pointer;">
                            #
                            <svg width="17" height="17" role="presentation" focusable="false"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4.61799 6C3.87461 6 3.39111 6.78231 3.72356 7.44721L3.99996 8H20L20.2763 7.44721C20.6088 6.78231 20.1253 6 19.3819 6H4.61799ZM10.8618 17.7236C10.9465 17.893 11.1196 18 11.309 18H12.6909C12.8803 18 13.0535 17.893 13.1382 17.7236L14 16H9.99996L10.8618 17.7236ZM17 13H6.99996L5.99996 11H18L17 13Z"
                                    fill="currentColor"></path>
                            </svg>
                            <span>Filtreler</span>
                        </div>
                        <!--  <ul data-bs-auto-close="outside" class="dropdown-menu dropdown-appearance">
                                                                                                <div class="ust-text">
                                                                                                    <div class="text-visibility-appearance">
                                                                                                        <span></span>
                                                                                                    </div>
                                                                                                    <div class="exit-visibility">
                                                                                                        <span> <i class="bi bi-x"></i> </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </ul>
                                                                                            -->

                    </div>
                    <div class="brdr-ort"></div>
                    <div class="container-sidebar-rr">
                        <div class="profile-top dropdown ">
                            <button class="button-top dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ $sonuc }}
                            </button>
                            <div class="top-logo">

                            </div>
                            <ul class="dropdown-menu background-dropdown-profile">

                                <div class="profile-bg">
                                    <div class="top-logo-profile">{{ $sonuc }}</div>
                                    <div class="top-logo-profile-info">
                                        <span class="profile-info-name">{{ $fullName }}</span>
                                        <span class="profile-info-email">{{ $user->email }}</span>
                                    </div>
                                    <div class="profile-info-btns">
                                        <a href="/profile"> Profil bilgilerini değiştir</a>
                                        <div class="cizgi"></div>
                                        <a href="/"># Üye'nin Pano Hareketlerini Gör</a>
                                    </div>
                                </div>

                            </ul>
                        </div>
                        <div class="project-button-right">
                            #
                            <svg width="16" height="16" role="presentation" focusable="false"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 13C14.7614 13 17 10.7614 17 8C17 5.23858 14.7614 3 12 3C9.23858 3 7 5.23858 7 8C7 9.44777 7.61532 10.7518 8.59871 11.6649C5.31433 13.0065 3 16.233 3 20C3 20.5523 3.44772 21 4 21H12C12.5523 21 13 20.5523 13 20C13 19.4477 12.5523 19 12 19H5.07089C5.55612 15.6077 8.47353 13 12 13ZM15 8C15 9.65685 13.6569 11 12 11C10.3431 11 9 9.65685 9 8C9 6.34315 10.3431 5 12 5C13.6569 5 15 6.34315 15 8Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M17 14C17 13.4477 17.4477 13 18 13C18.5523 13 19 13.4477 19 14V16H21C21.5523 16 22 16.4477 22 17C22 17.5523 21.5523 18 21 18H19V20C19 20.5523 18.5523 21 18 21C17.4477 21 17 20.5523 17 20V18H15C14.4477 18 14 17.5523 14 17C14 16.4477 14.4477 16 15 16H17V14Z"
                                    fill="currentColor"></path>
                            </svg>
                            <span>Paylaş</span>
                        </div>

                        <div id="canvasSidebar" class="project-bottom-logo cursor-pointer">
                            <svg width="20" height="20" role="presentation" focusable="false"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5 14C6.10457 14 7 13.1046 7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14ZM12 14C13.1046 14 14 13.1046 14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14ZM21 12C21 13.1046 20.1046 14 19 14C17.8954 14 17 13.1046 17 12C17 10.8954 17.8954 10 19 10C20.1046 10 21 10.8954 21 12Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container-body">
            <div class="card-container">
                @foreach ($liste as $list)
                    <div class="sortable-container" data-list-id="{{ $list->id }}">
                        <div class="card" style="width: 17rem">
                            <div class="card-body">
                                <div class="card-title">
                                    <span class="editable" data-id="{{ $list->id }}">{{ $list->name }}</span>
                                    <input type="text" class="edit-input d-none" value="{{ $list->name }}"
                                        data-id="{{ $list->id }}">

                                    <div class="project-title-logo" id="dropdown{{ $list->id }}"
                                        data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                        <svg width="17" height="17" role="presentation" focusable="false"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5 14C6.10457 14 7 13.1046 7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14ZM12 14C13.1046 14 14 13.1046 14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14ZM21 12C21 13.1046 20.1046 14 19 14C17.8954 14 17 13.1046 17 12C17 10.8954 17.8954 10 19 10C20.1046 10 21 10.8954 21 12Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </div>

                                    <div class="dropdown-menu dropdown-menu-start firstDropMenu"
                                        aria-labelledby="dropdown{{ $list->id }}">
                                        <div class="text-center fw-light projectName">
                                            {{ $list->name }}
                                            <button type="button"  onclick="document.body.click()"
                                                class="btn-close shadow-none position-absolute end-0 px-3"
                                                data-bs-auto-close="outside" aria-label="close"></button>
                                        </div>
                                        <div class="px-3">
                                            <div>
                                                <hr class="dropdown-divider">
                                            </div>
                                        </div>
                                        <div class="list-group border-0" role="group">
                                            <a href=""
                                                class="list-group-item list-group-item-action d-flex align-items-center border-0 rounded-0 text-dark delete-list-btn"
                                                data-list-id="{{ $list->id }}">
                                                <div class="flex-fill px-2">Listeyi Kapat...</div>
                                                <div><i class="bi bi-chevron-right"></i></div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-text-body sortable">
                                    @php $card = App\Models\card::where('lists_id', $list->id)->get(); @endphp
                                    @foreach ($card as $row)
                                        <ul class="card-texts" data-card-id="{{ $row->id }}">
                                            <div class="cardColor {{ $row->backgrounds ? '' : 'd-none' }}" data-card-id="{{ $row->id }}"
                                                @if ($row->backgrounds) style="background-color:{{ $row->backgrounds->renk }}" @endif>
                                            </div>
                                            <div data-card-id='{{ $row->id }}'
                                            class="d-flex align-items-center justify-content-between w-100 pDiv {{ $row->backgrounds ? 'p-2' : '' }}">
                                                <span class="card-text-span">{{ $row->name }}</span>    
                                                <div>
                                                    <button class="düzenle_svg modalBtn" data-bs-toggle="modal"
                                                        data-bs-target="#btn{{ $row->id }}">
                                                        <svg fill="none" width="14" height="14"
                                                            viewBox="0 0 16 16" role="presentation">
                                                            <path stroke="currentcolor" stroke-linejoin="round"
                                                                stroke-width="1.5"
                                                                d="M6 1.751H3c-.69 0-1.25.56-1.25 1.25v10c0 .69.56 1.25 1.25 1.25h10c.69 0 1.25-.56 1.25-1.25V10m-.75-5 1.116-1.116a1.25 1.25 0 0 0 0-1.768l-.732-.732a1.25 1.25 0 0 0-1.768 0L11 2.5M13.5 5 9.479 9.021c-.15.15-.336.26-.54.318l-3.189.911.911-3.189a1.25 1.25 0 0 1 .318-.54L11 2.5M13.5 5 11 2.5">
                                                            </path>
                                                        </svg>
                                                    </button>

                                                    <div class="modal fade modalMenu2" id="btn{{ $row->id }}"
                                                        tabindex="-1">
                                                        <div class="modal-dialog position-absolute w-100 m-0">
                                                            <div class="modal-content bg-transparent border-0">
                                                                <button type="button"
                                                                    class="btn btn-secondary d-none closeModal"
                                                                    data-bs-dismiss="modal"></button>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <form class="modalEditForm" method="POST">
                                                                            @csrf
                                                                            <textarea name="name" class="form-control shadow-none mb-2" rows="4">{{ $row->name }}</textarea>
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
                                                                                                        <div  @if ($row->backgrounds) style="background-color:{{ $row->backgrounds->renk }}" @endif
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
                                                                                                        class="d-flex flex-column justify-content-end img-show-two gap-2"  @if ($row->backgrounds) style="background-color:{{ $row->backgrounds->renk }}" @endif>

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
                                                                                                        @for ($i = 1; $i <= 10; $i++)
                                                                                                        @php
                                                                                                            $colors = ['#4bce97', '#f5cd47', '#fea362', '#f87168', '#9f8fef', '#579dff', '#6cc3e0', '#94c748', '#e774bb', '#8590a2'];
                                                                                                            $colorCode = $colors[$i - 1];
                                                                                                        @endphp
                                                                                                        <span class="renk-button select-color @if($row->backgrounds && $row->backgrounds->renk == $colorCode) selected-color @endif"
                                                                                                              id="renk{{ $i }}"
                                                                                                              data-color="{{ $colorCode }}"
                                                                                                              data-card-id="{{ $row->id }}">
                                                                                                        </span>
                                                                                                    @endfor
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
                                                                                data-id="{{ $row->id }}">
                                                                                <i class="fa-solid fa-box-archive"></i> Sil
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </ul>
                                    @endforeach



                                    </ul>
                                </div>
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
                                <form class="card-add-form" method="POST">
                                    @csrf
                                    <div class="addCardDiv d-none">
                                        <span class="cardAddinpt">
                                            <textarea class="card-texts-inpt" name="name" placeholder="Bir başlık girin..."></textarea>
                                            <input type="hidden" name="lists_id" value="{{ $list->id }}">
                                        </span>
                                        <div class="card-add-btn">
                                            <button class="btn-card">Kart Ekle</button>
                                            <div class="btn-back-card">
                                                <svg width="17" height="17" role="presentation" focusable="false"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10.5858 12L5.29289 6.70711C4.90237 6.31658 4.90237 5.68342 5.29289 5.29289C5.68342 4.90237 6.31658 4.90237 6.70711 5.29289L12 10.5858L17.2929 5.29289C17.6834 4.90237 18.3166 4.90237 18.7071 5.29289C19.0976 5.68342 19.0976 6.31658 18.7071 6.70711L13.4142 12L18.7071 17.2929C19.0976 17.6834 19.0976 18.3166 18.7071 18.7071C18.3166 19.0976 17.6834 19.0976 17.2929 18.7071L12 13.4142L6.70711 18.7071C6.31658 19.0976 5.68342 19.0976 5.29289 18.7071C4.90237 18.3166 4.90237 17.6834 5.29289 17.2929L10.5858 12Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="listAdd">
                <div class="listAdd-button">
                    <svg width="17" height="17" role="presentation" focusable="false" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 3C11.4477 3 11 3.44772 11 4V11L4 11C3.44772 11 3 11.4477 3 12C3 12.5523 3.44772 13 4 13H11V20C11 20.5523 11.4477 21 12 21C12.5523 21 13 20.5523 13 20V13H20C20.5523 13 21 12.5523 21 12C21 11.4477 20.5523 11 20 11L13 11V4C13 3.44772 12.5523 3 12 3Z"
                            fill="currentColor"></path>
                    </svg>
                    Başka Liste Ekleyin
                </div>
                <div class="card List-add-form d-none">
                    <form class="formListAdd" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="List-add-inpt">
                                <input class="inpt-List" name="name" type="text"
                                    placeholder="Liste adını girin...">

                                <input type="hidden" name="pano_id" value="{{ request()->route('id') }}">
                            </div>
                            <div class="List-add-btn">
                                <button class="btn-List">Listeye Ekle</button>
                                <div class="btn-back">
                                    <svg width="17" height="17" role="presentation" focusable="false"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M10.5858 12L5.29289 6.70711C4.90237 6.31658 4.90237 5.68342 5.29289 5.29289C5.68342 4.90237 6.31658 4.90237 6.70711 5.29289L12 10.5858L17.2929 5.29289C17.6834 4.90237 18.3166 4.90237 18.7071 5.29289C19.0976 5.68342 19.0976 6.31658 18.7071 6.70711L13.4142 12L18.7071 17.2929C19.0976 17.6834 19.0976 18.3166 18.7071 18.7071C18.3166 19.0976 17.6834 19.0976 17.2929 18.7071L12 13.4142L6.70711 18.7071C6.31658 19.0976 5.68342 19.0976 5.29289 18.7071C4.90237 18.3166 4.90237 17.6834 5.29289 17.2929L10.5858 12Z"
                                            fill="currentColor"></path>

                                    </svg>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="canvas-sidebar">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Menü</h5>
            <div class="exit-hover-efect" id="canvasSidebarClose">
                <svg width="20" height="20" role="presentation" focusable="false" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M10.5858 12L5.29289 6.70711C4.90237 6.31658 4.90237 5.68342 5.29289 5.29289C5.68342 4.90237 6.31658 4.90237 6.70711 5.29289L12 10.5858L17.2929 5.29289C17.6834 4.90237 18.3166 4.90237 18.7071 5.29289C19.0976 5.68342 19.0976 6.31658 18.7071 6.70711L13.4142 12L18.7071 17.2929C19.0976 17.6834 19.0976 18.3166 18.7071 18.7071C18.3166 19.0976 17.6834 19.0976 17.2929 18.7071L12 13.4142L6.70711 18.7071C6.31658 19.0976 5.68342 19.0976 5.29289 18.7071C4.90237 18.3166 4.90237 17.6834 5.29289 17.2929L10.5858 12Z"
                        fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <div class="cizgi"></div>
        <div class="offcanvas-body">
            <div style="font-weight:400;" class="d-flex align-items-center gap-2 p-2">
                #
                <svg style=" color:#1f3253;" width="20" height="20" role="presentation" focusable="false"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                        fill="currentColor"></path>
                    <path
                        d="M11 11C11 10.4477 11.4477 10 12 10C12.5523 10 13 10.4477 13 11V16C13 16.5523 12.5523 17 12 17C11.4477 17 11 16.5523 11 16V11Z"
                        fill="currentColor"></path>
                    <path
                        d="M13 8C13 8.55228 12.5523 9 12 9C11.4477 9 11 8.55228 11 8C11 7.44772 11.4477 7 12 7C12.5523 7 13 7.44772 13 8Z"
                        fill="currentColor"></path>
                </svg>

                <li class="d-flex flex-column">
                    <span style="font-size: 14px; color:#1f3253;"> Bu Pano Hakkında</span>
                    <span style="font-size: 12px; color:#7a8699;"> Panonuza Açıklama Ekleyin</span>
                </li>
            </div>
            <div style="font-weight:400;" class="d-flex align-items-center gap-2 p-2">
                #
                <svg style=" color:#1f3253;" width="20" height="20" role="presentation" focusable="false"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M4 5C2.8955 5 2 5.89543 2 7C2 8.1045 2.89543 9 4 9C5.1045 9 6 8.10457 6 7C6 5.8955 5.10457 5 4 5Z"
                        fill="currentColor"></path>
                    <path
                        d="M4 13C2.8955 13 2 13.8954 2 15C2 16.1045 2.89543 17 4 17C5.1045 17 6 16.1046 6 15C6 13.8955 5.10457 13 4 13Z"
                        fill="currentColor"></path>
                    <path
                        d="M8 6C8 5.44772 8.44772 5 9 5H21C21.5523 5 22 5.44772 22 6C22 6.55228 21.5523 7 21 7H9C8.44772 7 8 6.55228 8 6Z"
                        fill="currentColor"></path>
                    <path
                        d="M9 9C8.44772 9 8 9.44772 8 10C8 10.5523 8.44771 11 9 11H18C18.5523 11 19 10.5523 19 10C19 9.44772 18.5523 9 18 9H9Z"
                        fill="currentColor"></path>
                    <path
                        d="M8 14C8 13.4477 8.44772 13 9 13H21C21.5523 13 22 13.4477 22 14C22 14.5523 21.5523 15 21 15H9C8.44772 15 8 14.5523 8 14Z"
                        fill="currentColor"></path>
                    <path
                        d="M9 17C8.44772 17 8 17.4477 8 18C8 18.5523 8.44771 19 9 19H18C18.5523 19 19 18.5523 19 18C19 17.4477 18.5523 17 18 17H9Z"
                        fill="currentColor"></path>
                </svg>
                <span style="font-size: 14px; color:#1f3253;"> Etkinlik</span>
            </div>
            <div style="font-weight:400;" class="d-flex align-items-center gap-2 p-2">
                #
                <svg style=" color:#1f3253;" width="20" height="20" role="presentation" focusable="false"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M3.03418 5.59621C2.98604 5.04603 3.39303 4.56099 3.94322 4.51286L19.8823 3.11837C20.4325 3.07023 20.9175 3.47722 20.9657 4.02741L21.0528 5.0236L3.12133 6.5924L3.03418 5.59621Z"
                        fill="currentColor"></path>
                    <path
                        d="M9 12.9999C9 12.4476 9.44772 11.9999 10 11.9999H14C14.5523 11.9999 15 12.4476 15 12.9999C15 13.5522 14.5523 13.9999 14 13.9999H10C9.44772 13.9999 9 13.5522 9 12.9999Z"
                        fill="currentColor"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M3 18.9999V7.99993H21V18.9999C21 20.1045 20.1046 20.9999 19 20.9999H5C3.89543 20.9999 3 20.1045 3 18.9999ZM5 9.99993H19V18.9999H5L5 9.99993Z"
                        fill="currentColor"></path>
                </svg>
                <span style="font-size: 14px; color:#1f3253;"> Arşivlenmiş Öğeler</span>
            </div>
            <div class="cizgi"></div>
            <div style="font-weight:400;" class="d-flex align-items-center gap-2 p-2">
                #
                <svg style=" color:#1f3253;" width="20" height="20" role="presentation" focusable="false"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12.0017 17.0009C9.23868 17.0009 6.99968 14.7609 6.99968 11.9989C6.99968 9.23586 9.23868 6.99686 12.0017 6.99686C14.7647 6.99686 17.0037 9.23586 17.0037 11.9989C17.0037 14.7609 14.7647 17.0009 12.0017 17.0009ZM20.3697 13.8839C19.5867 13.6119 19.0237 12.8749 19.0237 11.9989C19.0237 11.1229 19.5867 10.3859 20.3687 10.1139C20.6057 10.0319 20.7517 9.78086 20.6837 9.53986C20.4847 8.83586 20.2017 8.16886 19.8477 7.54686C19.7297 7.33886 19.4707 7.26186 19.2497 7.35186C18.8647 7.50986 18.4197 7.55086 17.9587 7.43286C17.2847 7.25886 16.7337 6.70986 16.5557 6.03686C16.4337 5.57386 16.4747 5.12686 16.6317 4.73986C16.7207 4.51986 16.6437 4.26086 16.4357 4.14286C15.8187 3.79386 15.1567 3.51386 14.4607 3.31686C14.2187 3.24886 13.9687 3.39386 13.8867 3.63086C13.6147 4.41386 12.8777 4.97686 12.0017 4.97686C11.1267 4.97686 10.3887 4.41386 10.1177 3.63186C10.0347 3.39486 9.78368 3.24886 9.54268 3.31686C8.83468 3.51686 8.16368 3.80186 7.53868 4.15886C7.33768 4.27386 7.25268 4.52586 7.34068 4.74086C7.48768 5.10186 7.53268 5.51386 7.43868 5.94386C7.28368 6.64986 6.72468 7.24086 6.02568 7.42786C5.56768 7.55086 5.12768 7.51186 4.74568 7.35986C4.52568 7.27186 4.26768 7.34986 4.15068 7.55586C3.79768 8.17786 3.51568 8.84586 3.31768 9.54986C3.24968 9.78886 3.39268 10.0369 3.62568 10.1219C4.39668 10.3999 4.94868 11.1319 4.94868 11.9989C4.94868 12.8659 4.39668 13.5979 3.62468 13.8759C3.39168 13.9599 3.24968 14.2079 3.31668 14.4469C3.49368 15.0739 3.73868 15.6729 4.03968 16.2369C4.15868 16.4589 4.43468 16.5349 4.66368 16.4299C5.25868 16.1569 6.00668 16.1659 6.76768 16.6679C6.88468 16.7449 6.99268 16.8529 7.06968 16.9689C7.59668 17.7679 7.58168 18.5489 7.26768 19.1559C7.15268 19.3789 7.21968 19.6569 7.43568 19.7839C8.08968 20.1679 8.79768 20.4709 9.54468 20.6809C9.78568 20.7489 10.0337 20.6049 10.1147 20.3679C10.3837 19.5819 11.1237 19.0149 12.0017 19.0149C12.8797 19.0149 13.6197 19.5819 13.8887 20.3679C13.9697 20.6039 14.2177 20.7489 14.4587 20.6809C15.1957 20.4739 15.8947 20.1749 16.5427 19.7979C16.7607 19.6709 16.8267 19.3899 16.7097 19.1669C16.3917 18.5589 16.3727 17.7739 16.9007 16.9719C16.9777 16.8559 17.0857 16.7469 17.2027 16.6699C17.9747 16.1589 18.7297 16.1569 19.3277 16.4399C19.5567 16.5479 19.8357 16.4729 19.9557 16.2499C20.2597 15.6859 20.5047 15.0859 20.6837 14.4569C20.7517 14.2159 20.6067 13.9659 20.3697 13.8839Z"
                        fill="currentColor"></path>
                </svg>
                <span style="font-size: 14px; color:#1f3253;"> Ayarlar</span>
            </div>
            <div style="font-weight:400;" class="d-flex align-items-center gap-2 p-2">
                #
                <span style="width:20px; height:20px; border-radius:3px; background-color:#cd5a91;"></span>
                <span style="font-size: 14px; color:#1f3253;"> Arkaplanı Değiştir</span>
            </div>
            <div style="font-weight:400;" class="d-flex align-items-center gap-2 p-2">
                #
                <svg style=" color:#1f3253;" width="20" height="20" role="presentation" focusable="false"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M3 6C2.44772 6 2 6.44772 2 7C2 7.55228 2.44772 8 3 8H11C11.5523 8 12 7.55228 12 7C12 6.44772 11.5523 6 11 6H3ZM4 16V12H20V16H4ZM2 12C2 10.8954 2.89543 10 4 10H20C21.1046 10 22 10.8954 22 12V16C22 17.1046 21.1046 18 20 18H4C2.89543 18 2 17.1046 2 16V12Z"
                        fill="currentColor"></path>
                </svg>
                <span style="font-size: 14px; color:#1f3253;"> Özel Alanlar</span>
            </div>
            <div style="font-weight:400;" class="d-flex align-items-center gap-2 p-2">
                #
                <svg style=" color:#1f3253;" width="20" height="20" role="presentation" focusable="false"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M13 3C13 3.55228 12.5523 4 12 4C11.4477 4 11 3.55228 11 3C11 2.44772 11.4477 2 12 2C12.5523 2 13 2.44772 13 3ZM4 7H20V17H4V7ZM2 7C2 5.89543 2.89543 5 4 5H20C21.1046 5 22 5.89543 22 7V17C22 18.1046 21.1046 19 20 19H4C2.89543 19 2 18.1046 2 17V7ZM8 9C8 8.44772 8.44772 8 9 8C9.55228 8 10 8.44772 10 9V11C10 11.5523 9.55228 12 9 12C8.44772 12 8 11.5523 8 11V9ZM14 9C14 8.44772 14.4477 8 15 8C15.5523 8 16 8.44772 16 9V11C16 11.5523 15.5523 12 15 12C14.4477 12 14 11.5523 14 11V9ZM12 16C12.5523 16 13 15.5523 13 15C13 14.4477 12.5523 14 12 14C11.4477 14 11 14.4477 11 15C11 15.5523 11.4477 16 12 16Z"
                        fill="currentColor"></path>
                </svg>
                <span style="font-size: 14px; color:#1f3253;"> Otomasyon</span>
            </div>
            <div style="font-weight:400;" class="d-flex align-items-center gap-2 p-2">
                #
                <svg style=" color:#1f3253;" width="20" height="20" role="presentation" focusable="false"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M17.5009 2.65511C18.4967 2.5456 19.5352 2.80718 20.364 3.63597L18.9498 5.05019C18.6192 4.71958 18.2151 4.58335 17.7106 4.63884C17.1593 4.69947 16.4959 4.96246 15.7486 5.38541C15.0122 5.80221 14.272 6.32856 13.5675 6.8454C13.4614 6.92326 13.3548 7.00186 13.2485 7.08031C12.6795 7.50008 12.1166 7.91532 11.6552 8.18878C11.1608 8.48182 10.6363 8.46971 10.3204 8.43815C9.98837 8.40498 9.19934 8.39748 7.94353 8.81849C7.16614 9.07911 6.21617 9.69953 5.40597 10.3177L5.34387 10.3653C5.59079 10.4171 5.85122 10.4646 6.11263 10.5076C6.62099 10.5913 7.11123 10.6543 7.47593 10.6964C7.65774 10.7174 7.80708 10.7331 7.9103 10.7434C7.96189 10.7486 8.00189 10.7525 8.02858 10.755L8.0584 10.7578L8.06686 10.7585L8.96578 11.8603L8.96537 11.8658L8.96296 11.8884C8.96079 11.909 8.95758 11.9404 8.95366 11.9813C8.9458 12.0632 8.93516 12.1826 8.92441 12.3287C8.9028 12.6224 8.88136 13.0163 8.88048 13.4263C8.87958 13.8425 8.90011 14.2437 8.95265 14.563C8.9897 14.7881 9.03099 14.8963 9.04531 14.9338C9.04927 14.9442 9.05033 14.9497 9.05033 14.9497C9.05033 14.9497 9.05582 14.9507 9.06621 14.9547C9.10371 14.969 9.2119 15.0103 9.43702 15.0474C9.75627 15.0999 10.1575 15.1204 10.5737 15.1195C10.9837 15.1186 11.3777 15.0972 11.6714 15.0756L12.1391 15.0341L13.2414 15.933L13.3036 16.5241C13.3457 16.8888 13.4087 17.379 13.4924 17.8874C13.5354 18.1488 13.583 18.4092 13.6347 18.6561L13.6823 18.594C14.3005 17.7838 14.9209 16.8339 15.1815 16.0565C15.6025 14.8007 15.595 14.0116 15.5619 13.6796C15.5303 13.3637 15.5182 12.8392 15.8112 12.3448C16.0847 11.8834 16.4999 11.3206 16.9197 10.7515C16.9981 10.6452 17.0767 10.5386 17.1546 10.4325C17.6715 9.72798 18.1978 8.98784 18.6146 8.25143C19.0376 7.50416 19.3005 6.84067 19.3612 6.28939C19.4167 5.78487 19.2804 5.38079 18.9498 5.05019L20.364 3.63597C21.1928 4.46477 21.4544 5.50334 21.3449 6.4991C21.2405 7.4481 20.8244 8.39124 20.3504 9.22877C19.8702 10.0772 19.2817 10.9 18.762 11.6084C18.674 11.7284 18.5889 11.8439 18.5069 11.9552C18.0946 12.5148 17.7615 12.9669 17.5439 13.3284C17.5413 13.3535 17.5403 13.3991 17.5477 13.4727C17.6103 14.0997 17.58 15.1726 17.0735 16.6835C16.7017 17.7925 15.9064 18.9623 15.2669 19.8003C14.9374 20.2322 14.6293 20.6014 14.4034 20.8629C14.2902 20.9939 14.1971 21.0986 14.1314 21.1714C14.0985 21.2078 14.0725 21.2363 14.0543 21.2561L14.0267 21.286L14.0239 21.289C13.8388 21.4871 13.5813 21.6021 13.3108 21.6073C13.0403 21.6124 12.7798 21.5076 12.5889 21.3167C12.3731 21.1009 12.2313 20.8327 12.1361 20.6177C12.0339 20.3868 11.9481 20.1296 11.8751 19.8725C11.729 19.3576 11.6128 18.7648 11.5231 18.2197C11.4566 17.8154 11.4027 17.425 11.3611 17.0937C11.1199 17.1058 10.8496 17.1146 10.5694 17.1152C10.1037 17.1162 9.57892 17.0947 9.10468 17.0166C8.69213 16.9487 8.05261 16.7804 7.63611 16.3639C7.21962 15.9474 7.05129 15.3079 6.9834 14.8953C6.90535 14.4211 6.88378 13.8964 6.88478 13.4306C6.88539 13.1504 6.89426 12.8801 6.90635 12.6389C6.57502 12.5974 6.18466 12.5434 5.78029 12.4769C5.23522 12.3872 4.64237 12.271 4.12751 12.1249C3.8704 12.0519 3.61317 11.9661 3.38231 11.8639C3.16733 11.7687 2.89915 11.6269 2.68332 11.4111C2.49244 11.2202 2.38758 10.9597 2.39276 10.6892C2.39794 10.4187 2.51272 10.1614 2.71081 9.97631L2.71401 9.97332L2.72063 9.96718L2.74387 9.94573C2.76373 9.92748 2.79221 9.90147 2.82863 9.86862C2.90143 9.80296 3.00612 9.70979 3.13714 9.59661C3.39866 9.37069 3.76781 9.06262 4.19969 8.73309C5.03769 8.09367 6.20752 7.29836 7.31652 6.92656C8.8274 6.42004 9.90036 6.3897 10.5273 6.45233C10.6009 6.45968 10.6465 6.45871 10.6716 6.45614C11.0331 6.23853 11.4852 5.90543 12.0448 5.49314C12.1561 5.41114 12.2716 5.32601 12.3916 5.23804C13.1 4.71833 13.9228 4.12982 14.7712 3.64963C15.6088 3.1756 16.5519 2.75948 17.5009 2.65511Z"
                        fill="currentColor"></path>
                    <path
                        d="M15.4143 8.58572C15.8048 8.97624 16.438 8.97624 16.8285 8.58572C17.219 8.1952 17.219 7.56203 16.8285 7.17151C16.438 6.78098 15.8048 6.78098 15.4143 7.17151C15.0238 7.56203 15.0238 8.1952 15.4143 8.58572Z"
                        fill="currentColor"></path>
                </svg>
                <span style="font-size: 14px; color:#1f3253;"> Power-Up'lar</span>
            </div>
            <div style="font-weight:400;" class="d-flex align-items-center gap-2 p-2">
                #
                <svg style=" color:#1f3253;" width="20" height="20" role="presentation" focusable="false"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M13.1213 2.80762C12.3403 2.02657 11.0739 2.02657 10.2929 2.80762L3.92891 9.17158C1.19524 11.9052 1.19524 16.3374 3.92891 19.0711C6.66258 21.8047 11.0947 21.8047 13.8284 19.0711L20.1924 12.7071C20.9734 11.9261 20.9734 10.6597 20.1924 9.87869L13.1213 2.80762ZM18.7782 11.2929L11.7071 4.22183L5.34313 10.5858C3.39051 12.5384 3.39051 15.7042 5.34313 17.6569C7.29575 19.6095 10.4616 19.6095 12.4142 17.6569L18.7782 11.2929ZM10 14C10 14.5523 9.55228 15 9 15C8.44772 15 8 14.5523 8 14C8 13.4477 8.44772 13 9 13C9.55228 13 10 13.4477 10 14ZM12 14C12 15.6569 10.6569 17 9 17C7.34315 17 6 15.6569 6 14C6 12.3431 7.34315 11 9 11C10.6569 11 12 12.3431 12 14Z"
                        fill="currentColor"></path>
                </svg>
                <span style="font-size: 14px; color:#1f3253;"> Etiketler</span>
            </div>
            <div style="font-weight:400;" class="d-flex align-items-center gap-2 p-2">
                #
                <svg style=" color:#1f3253;" width="20" height="20" role="presentation" focusable="false"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M11.9913 22C6.47244 21.9953 2 17.5199 2 12C2 6.47715 6.47715 2 12 2C17.5194 2 21.9944 6.47151 22 11.9896C22.0028 12.2553 21.8994 12.5149 21.7071 12.7071L12.7071 21.7071C12.5153 21.8989 12.2565 22.0023 11.9913 22ZM4 12C4 7.58172 7.58172 4 12 4C15.9888 4 19.2957 6.91917 19.901 10.7377C19.4642 10.6737 18.9449 10.625 18.375 10.625C16.7209 10.625 14.5466 11.0392 12.7929 12.7929C11.0392 14.5466 10.625 16.7209 10.625 18.375C10.625 18.9449 10.6737 19.4642 10.7377 19.901C6.91918 19.2957 4 15.9888 4 12ZM14.2071 14.2071C15.4534 12.9608 17.0292 12.625 18.375 12.625C18.5714 12.625 18.7609 12.6322 18.9412 12.6446L12.6446 18.9412C12.6322 18.7609 12.625 18.5714 12.625 18.375C12.625 17.0291 12.9608 15.4534 14.2071 14.2071Z"
                        fill="currentColor"></path>
                </svg>
                <span style="font-size: 14px; color:#1f3253;"> Çıkartmalar</span>
            </div>
            <div style="font-weight:400;" class="d-flex align-items-center gap-2 p-2">
                #
                <svg style=" color:#1f3253;" width="20" height="20" role="presentation" focusable="false"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5 3C3.89543 3 3 3.89543 3 5V7C3 7.55229 3.44772 8 4 8C4.55228 8 5 7.55229 5 7V5H7C7.55228 5 8 4.55229 8 4C8 3.44772 7.55228 3 7 3H5Z"
                        fill="currentColor"></path>
                    <path
                        d="M21 5C21 3.89543 20.1046 3 19 3H17C16.4477 3 16 3.44772 16 4C16 4.55228 16.4477 5 17 5H19V7C19 7.55228 19.4477 8 20 8C20.5523 8 21 7.55228 21 7V5Z"
                        fill="currentColor"></path>
                    <path
                        d="M5 21C3.89543 21 3 20.1046 3 19V17C3 16.4477 3.44772 16 4 16C4.55228 16 5 16.4477 5 17V19H7C7.55228 19 8 19.4477 8 20C8 20.5523 7.55228 21 7 21H5Z"
                        fill="currentColor"></path>
                    <path
                        d="M4 10C3.44772 10 3 10.4477 3 11V13C3 13.5523 3.44772 14 4 14C4.55228 14 5 13.5523 5 13V11C5 10.4477 4.55228 10 4 10Z"
                        fill="currentColor"></path>
                    <path
                        d="M11 5C10.4477 5 10 4.55228 10 4C10 3.44772 10.4477 3 11 3H13C13.5523 3 14 3.44772 14 4C14 4.55228 13.5523 5 13 5H11Z"
                        fill="currentColor"></path>
                    <path
                        d="M14 10C14 9.44771 14.4477 9 15 9C15.5523 9 16 9.44772 16 10V14H20C20.5523 14 21 14.4477 21 15C21 15.5523 20.5523 16 20 16H16V20C16 20.5523 15.5523 21 15 21C14.4477 21 14 20.5523 14 20V16H10C9.44771 16 9 15.5523 9 15C9 14.4477 9.44772 14 10 14H14V10Z"
                        fill="currentColor"></path>
                </svg>
                <span style="font-size: 14px; color:#1f3253;"> Şablon Yap</span>
            </div>
            <div class="cizgi"></div>
            <div style="font-weight:400;" class="d-flex align-items-center gap-2 p-2">
                #
                <svg style=" color:#1f3253;" width="20" height="20" role="presentation" focusable="false"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12.0006 18C7.46367 18 4.00142 13.74 4.00142 12C4.00142 9.999 7.45967 6 12.0006 6C16.3775 6 19.9988 9.973 19.9988 12C19.9988 13.74 16.5366 18 12.0006 18ZM12.0006 4C6.48003 4 2.00012 8.841 2.00012 12C2.00012 15.086 6.5771 20 12.0006 20C17.4241 20 22.0001 15.086 22.0001 12C22.0001 8.841 17.5212 4 12.0006 4ZM11.9775 13.9844C10.8745 13.9844 9.97752 13.0874 9.97752 11.9844C9.97752 10.8814 10.8745 9.9844 11.9775 9.9844C13.0805 9.9844 13.9775 10.8814 13.9775 11.9844C13.9775 13.0874 13.0805 13.9844 11.9775 13.9844ZM11.9775 7.9844C9.77152 7.9844 7.97752 9.7784 7.97752 11.9844C7.97752 14.1904 9.77152 15.9844 11.9775 15.9844C14.1835 15.9844 15.9775 14.1904 15.9775 11.9844C15.9775 9.7784 14.1835 7.9844 11.9775 7.9844Z"
                        fill="currentColor"></path>
                </svg>
                <span style="font-size: 14px; color:#1f3253;"> Takip Et</span>
            </div>
            <div style="font-weight:400;" class="d-flex align-items-center gap-2 p-2">
                #
                <svg style=" color:#1f3253;" width="20" height="20" role="presentation" focusable="false"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M5 17V8.831L9.756 13.586C10.973 14.805 12.948 14.805 14.166 13.586L19 8.752V17H5ZM17.924 7L12.752 12.172C12.315 12.609 11.607 12.609 11.169 12.172L5.998 7H17.924ZM19 5H5C3.9 5 3 5.9 3 7V17C3 18.1 3.9 19 5 19H19C20.1 19 21 18.1 21 17V7C21 5.9 20.1 5 19 5Z"
                        fill="currentColor"></path>
                </svg>
                <span style="font-size: 14px; color:#1f3253;"> E-postadan panoya</span>
            </div>
            <div style="font-weight:400;" class="d-flex align-items-center gap-2 p-2">
                #
                <svg style=" color:#1f3253;" width="20" height="20" role="presentation" focusable="false"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M5 16V4.99188C5 3.8918 5.90195 3 7.00853 3H14.9915L15 3.00002V5H7V16H5ZM8 19C8 20.1046 8.89543 21 10 21H18C19.1046 21 20 20.1046 20 19V8C20 6.89543 19.1046 6 18 6H10C8.89543 6 8 6.89543 8 8V19ZM10 8V19H18V8H10Z"
                        fill="currentColor"></path>
                </svg>
                <span style="font-size: 14px; color:#1f3253;"> Panoyu Kopyala</span>
            </div>
            <div style="font-weight:400;" class="d-flex align-items-center gap-2 p-2">
                #
                <svg style=" color:#1f3253;" width="20" height="20" role="presentation" focusable="false"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6 15C6.79565 15 7.55871 14.6839 8.12132 14.1213C8.68393 13.5587 9 12.7956 9 12C9 11.2043 8.68393 10.4413 8.12132 9.87867C7.55871 9.31606 6.79565 8.99999 6 8.99999C5.20435 8.99999 4.44129 9.31606 3.87868 9.87867C3.31607 10.4413 3 11.2043 3 12C3 12.7956 3.31607 13.5587 3.87868 14.1213C4.44129 14.6839 5.20435 15 6 15ZM6 13C5.73478 13 5.48043 12.8946 5.29289 12.7071C5.10536 12.5196 5 12.2652 5 12C5 11.7348 5.10536 11.4804 5.29289 11.2929C5.48043 11.1053 5.73478 11 6 11C6.26522 11 6.51957 11.1053 6.70711 11.2929C6.89464 11.4804 7 11.7348 7 12C7 12.2652 6.89464 12.5196 6.70711 12.7071C6.51957 12.8946 6.26522 13 6 13ZM18 21C18.7956 21 19.5587 20.6839 20.1213 20.1213C20.6839 19.5587 21 18.7956 21 18C21 17.2043 20.6839 16.4413 20.1213 15.8787C19.5587 15.3161 18.7956 15 18 15C17.2044 15 16.4413 15.3161 15.8787 15.8787C15.3161 16.4413 15 17.2043 15 18C15 18.7956 15.3161 19.5587 15.8787 20.1213C16.4413 20.6839 17.2044 21 18 21ZM18 19C17.7348 19 17.4804 18.8946 17.2929 18.7071C17.1054 18.5196 17 18.2652 17 18C17 17.7348 17.1054 17.4804 17.2929 17.2929C17.4804 17.1053 17.7348 17 18 17C18.2652 17 18.5196 17.1053 18.7071 17.2929C18.8946 17.4804 19 17.7348 19 18C19 18.2652 18.8946 18.5196 18.7071 18.7071C18.5196 18.8946 18.2652 19 18 19Z"
                        fill="currentColor"></path>
                </svg>
                <span style="font-size: 14px; color:#1f3253;"> Yazdır, dışa aktar ve paylaş</span>
            </div>
            <form action="{{ route('pano.destroy', $panoName->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" style="all:unset; cursor:pointer;" class="d-flex align-items-center gap-2 p-2">
                    <svg style=" color:#1f3253;" width="20" height="20" role="presentation"
                        focusable="false" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <rect x="3" y="11" width="18" height="2" rx="1" fill="currentColor"></rect>
                    </svg>
                    <span style="font-size: 14px; color:#1f3253;"> Panoyu Kapat</span>
                </button>
            </form>
        </div>
    </div>
@endsection
