@extends('layouts.app')

@section('sidebar')
    <div class="sidebar">
        <div class="sidebar-main">
            <a href="#">
                <div class="sidebar-main-logo">
                    T
                </div>
            </a>
            <div class="sidebar-main-text">
                <span class="TCS">Trello Çalışma Alanı</span>
                <span class="PRM">Premium</span>
            </div>
            <div class="sidebar-main-button">
                <i class="bi bi-chevron-left"
                    style="color: #fff; font-size: 10px; text-shadow: 1px 0 0 #fff, -1px 0 0 #fff, 0 1px 0 #fff, 0 -1px 0 #fff;"></i>
            </div>
        </div>
        <div class="sidebar-down">
            <div class="sidebar-options">
                <a href="/dashboard" class="panolar" id="sidebar-texts">
                    <div class="div-bslk">
                        <svg style="color:#fff" width="17" height="17" role="presentation" focusable="false"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M3 5C3 3.89543 3.89543 3 5 3H19C20.1046 3 21 3.89543 21 5V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V5ZM5 6C5 5.44772 5.44772 5 6 5H10C10.5523 5 11 5.44772 11 6V16C11 16.5523 10.5523 17 10 17H6C5.44772 17 5 16.5523 5 16V6ZM14 5C13.4477 5 13 5.44772 13 6V12C13 12.5523 13.4477 13 14 13H18C18.5523 13 19 12.5523 19 12V6C19 5.44772 18.5523 5 18 5H14Z"
                                fill="currentColor"></path>
                        </svg>
                        <span>Panolar</span>
                    </div>
                </a>
                <div class="uyeler" id="sidebar-texts">
                    <div class="div-bslk">
                        <i class="bi bi-person"></i>
                        <span>Üyeler</span>
                    </div>
                    <div id="sidebar-main-button" style="margin-right:5px;">
                        <svg style="color:#fff;" width="17" height="17" role="presentation" focusable="false"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 3C11.4477 3 11 3.44772 11 4V11L4 11C3.44772 11 3 11.4477 3 12C3 12.5523 3.44772 13 4 13H11V20C11 20.5523 11.4477 21 12 21C12.5523 21 13 20.5523 13 20V13H20C20.5523 13 21 12.5523 21 12C21 11.4477 20.5523 11 20 11L13 11V4C13 3.44772 12.5523 3 12 3Z"
                                fill="currentColor"></path>
                        </svg>
                    </div>
                </div>
                <div class="workingarea" id="sidebar-texts">
                    <div class="div-bslk">
                        <svg style="color: #fff" width="17" height="17" role="presentation" focusable="false"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.0017 17.0009C9.23868 17.0009 6.99968 14.7609 6.99968 11.9989C6.99968 9.23586 9.23868 6.99686 12.0017 6.99686C14.7647 6.99686 17.0037 9.23586 17.0037 11.9989C17.0037 14.7609 14.7647 17.0009 12.0017 17.0009ZM20.3697 13.8839C19.5867 13.6119 19.0237 12.8749 19.0237 11.9989C19.0237 11.1229 19.5867 10.3859 20.3687 10.1139C20.6057 10.0319 20.7517 9.78086 20.6837 9.53986C20.4847 8.83586 20.2017 8.16886 19.8477 7.54686C19.7297 7.33886 19.4707 7.26186 19.2497 7.35186C18.8647 7.50986 18.4197 7.55086 17.9587 7.43286C17.2847 7.25886 16.7337 6.70986 16.5557 6.03686C16.4337 5.57386 16.4747 5.12686 16.6317 4.73986C16.7207 4.51986 16.6437 4.26086 16.4357 4.14286C15.8187 3.79386 15.1567 3.51386 14.4607 3.31686C14.2187 3.24886 13.9687 3.39386 13.8867 3.63086C13.6147 4.41386 12.8777 4.97686 12.0017 4.97686C11.1267 4.97686 10.3887 4.41386 10.1177 3.63186C10.0347 3.39486 9.78368 3.24886 9.54268 3.31686C8.83468 3.51686 8.16368 3.80186 7.53868 4.15886C7.33768 4.27386 7.25268 4.52586 7.34068 4.74086C7.48768 5.10186 7.53268 5.51386 7.43868 5.94386C7.28368 6.64986 6.72468 7.24086 6.02568 7.42786C5.56768 7.55086 5.12768 7.51186 4.74568 7.35986C4.52568 7.27186 4.26768 7.34986 4.15068 7.55586C3.79768 8.17786 3.51568 8.84586 3.31768 9.54986C3.24968 9.78886 3.39268 10.0369 3.62568 10.1219C4.39668 10.3999 4.94868 11.1319 4.94868 11.9989C4.94868 12.8659 4.39668 13.5979 3.62468 13.8759C3.39168 13.9599 3.24968 14.2079 3.31668 14.4469C3.49368 15.0739 3.73868 15.6729 4.03968 16.2369C4.15868 16.4589 4.43468 16.5349 4.66368 16.4299C5.25868 16.1569 6.00668 16.1659 6.76768 16.6679C6.88468 16.7449 6.99268 16.8529 7.06968 16.9689C7.59668 17.7679 7.58168 18.5489 7.26768 19.1559C7.15268 19.3789 7.21968 19.6569 7.43568 19.7839C8.08968 20.1679 8.79768 20.4709 9.54468 20.6809C9.78568 20.7489 10.0337 20.6049 10.1147 20.3679C10.3837 19.5819 11.1237 19.0149 12.0017 19.0149C12.8797 19.0149 13.6197 19.5819 13.8887 20.3679C13.9697 20.6039 14.2177 20.7489 14.4587 20.6809C15.1957 20.4739 15.8947 20.1749 16.5427 19.7979C16.7607 19.6709 16.8267 19.3899 16.7097 19.1669C16.3917 18.5589 16.3727 17.7739 16.9007 16.9719C16.9777 16.8559 17.0857 16.7469 17.2027 16.6699C17.9747 16.1589 18.7297 16.1569 19.3277 16.4399C19.5567 16.5479 19.8357 16.4729 19.9557 16.2499C20.2597 15.6859 20.5047 15.0859 20.6837 14.4569C20.7517 14.2159 20.6067 13.9659 20.3697 13.8839Z"
                                fill="currentColor"></path>
                        </svg>
                        <span>Çalışma Alanı ayarları</span>
                    </div>
                    <div id="sidebar-main-buttons" style="margin-right:10px">
                        <i class="bi bi-chevron-down"></i>
                    </div>
                </div>

            </div>

            <div class="sidebar-display">
                <div class="sidebar-premium">
                    PREMIUM
                </div>
            </div>

            <div class="workingarea" id="sidebar-tt">
                <div class="div-bslk" id="div-displays">
                    <span class="t">Çalışma Alanı Görünümleri</span>
                    <span class="s">Çalışma Alanı Görünüm...</span>
                </div>
                <div class="sidebar-main-buttons" id="trs" style="margin-right:2px">
                    <i class="bi bi-three-dots"></i>
                </div>
                <div class="sidebar-main-buttons" style="margin-right:5px">
                    <i class="bi bi-plus-lg"></i>
                </div>
            </div>
            <div class="tabledate">
                <div class="workingareas" id="sidebar-texts">
                    <div class="div-bslk">
                        <svg width="17" height="17" role="presentation" focusable="false" viewBox="0 0 14 10"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.66683 9.66665C0.93045 9.66665 0.333496 9.06969 0.333496 8.33331V1.66665C0.333496 0.930267 0.93045 0.333313 1.66683 0.333313H12.3335C13.0699 0.333313 13.6668 0.930267 13.6668 1.66665V8.33331C13.6668 9.06969 13.0699 9.66665 12.3335 9.66665H1.66683ZM12.3335 5.66665V4.33331H5.66683V5.66665H12.3335ZM12.3335 2.99998V1.66665H5.66683V2.99998H12.3335ZM12.3335 6.99998V8.33331H5.66683V6.99998H12.3335ZM1.66683 4.33331V5.66665H4.3335V4.33331H1.66683ZM1.66683 6.99998V8.33331H4.3335V6.99998H1.66683ZM1.66683 2.99998V1.66665H4.3335V2.99998H1.66683Z"
                                fill="currentColor"></path>
                        </svg>
                        <span># Tablo</span>
                    </div>
                    <div class="src" style="margin-right:2px">
                        <i class="bi bi-three-dots"></i>
                    </div>
                </div>
                <div class="workingareas" id="sidebar-texts">
                    <div class="div-bslk">
                        <svg width="17" height="17" role="presentation" focusable="false" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M6 4V5H4.995C3.892 5 3 5.893 3 6.994V19.006C3 20.106 3.893 21 4.995 21H19.005C20.108 21 21 20.107 21 19.006V6.994C21 5.895 20.107 5 19.005 5H18V4C18 3.448 17.552 3 17 3C16.448 3 16 3.448 16 4V5H8V4C8 3.448 7.552 3 7 3C6.448 3 6 3.448 6 4ZM5.25 9.571V17.718C5.25 18.273 5.694 18.714 6.243 18.714H17.758C18.3 18.714 18.75 18.268 18.75 17.718V9.571H5.25ZM9 13V10.999H7V13H9ZM17 10.999V13H15V10.999H17ZM11 13H13.001V10.999H11V13ZM7 17V15H9V17H7ZM11 17H13.001V15H11V17ZM17 15V17H15V15H17Z"
                                fill="currentColor"></path>
                        </svg>
                        <span># Takvim</span>
                    </div>
                    <div class="src" style="margin-right:2px">
                        <i class="bi bi-three-dots"></i>
                    </div>
                </div>
            </div>
            <div class="workingarea" id="sidebar-tt">
                <div class="div-bslk" id="div-displays">
                    <span class="t">Panolarınız</span>
                    <span class="s">Panolarınız</span>
                </div>
                <div class="workinga">
                    <div class="sidebar-main-buttons" id="trs" style="margin-right:2px">
                        <i class="bi bi-three-dots"></i>
                    </div>
                    <div class="sidebar-main-buttons" style="margin-right:5px">
                        <i class="bi bi-plus-lg"></i>
                    </div>
                </div>
            </div>
            <div class="tabledate">
                @foreach ($pano as $row)
                    @php
                        $aktifId = request()->segment(2);
                    @endphp
                    <a href="/board/{{ $row->id }}" class=" {{ $aktifId == $row->id ? 'workingareasx' : '' }}"
                        id="sidebar-texts">
                        <div class="div-bslk">
                            <div class="pano">

                            </div>
                            <span>{{ $row->name }}</span>
                        </div>
                        <div class="workingas">
                            <div class="src" style="margin-right:2px">
                                <i class="bi bi-three-dots"></i>
                            </div>
                            <label class="star" style="cursor:pointer;">
                                <input type="checkbox" class="star-toggle" data-pano-id="{{ $row->id }}"
                                    @if (isset($row->favori->pano_id)) checked @endif style="display: none;">

                                <div class="srcs">
                                    <svg class="star-fill" width="17" height="17" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.9999 18.6266L7.49495 20.995C6.739 21.3924 5.80401 21.1018 5.40658 20.3459C5.24833 20.0448 5.19372 19.7 5.25121 19.3649L6.11158 14.3485L2.46699 10.7959C1.85542 10.1998 1.84291 9.22074 2.43904 8.60917C2.67643 8.36564 2.98747 8.20715 3.32403 8.15825L8.36072 7.42637L10.6132 2.86236C10.9912 2.0965 11.9184 1.78206 12.6843 2.16003C12.9892 2.31054 13.2361 2.55739 13.3866 2.86236L15.6391 7.42637L20.6758 8.15825C21.5209 8.28106 22.1065 9.06576 21.9837 9.91094C21.9348 10.2475 21.7763 10.5585 21.5328 10.7959L17.8882 14.3485L18.7486 19.3649C18.893 20.2066 18.3276 21.006 17.4859 21.1504C17.1507 21.2079 16.8059 21.1533 16.5049 20.995L11.9999 18.6266Z"
                                            fill="currentColor" />
                                    </svg>

                                    <svg class="star-empty" width="17" height="17" fill="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.49495 20.995L11.9999 18.6266L16.5049 20.995C16.8059 21.1533 17.1507 21.2079 17.4859 21.1504C18.3276 21.006 18.893 20.2066 18.7486 19.3649L17.8882 14.3485L21.5328 10.7959C21.7763 10.5585 21.9348 10.2475 21.9837 9.91094C22.1065 9.06576 21.5209 8.28106 20.6758 8.15825L15.6391 7.42637L13.3866 2.86236C13.2361 2.55739 12.9892 2.31054 12.6843 2.16003C11.9184 1.78206 10.9912 2.0965 10.6132 2.86236L8.36072 7.42637L3.32403 8.15825C2.98747 8.20715 2.67643 8.36564 2.43904 8.60917C1.84291 9.22074 1.85542 10.1998 2.46699 10.7959L6.11158 14.3485L5.25121 19.3649C5.19372 19.7 5.24833 20.0448 5.40658 20.3459C5.80401 21.1018 6.739 21.3924 7.49495 20.995ZM19.3457 10.0485L15.6728 13.6287L16.5398 18.684L11.9999 16.2972L7.45995 18.684L8.327 13.6287L4.65411 10.0485L9.72993 9.31093L11.9999 4.71146L14.2699 9.31093L19.3457 10.0485Z"
                                            fill="currentColor" />
                                    </svg>
                                </div>
                            </label>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sidebar-open-button d-none">
        <div class="button-svg">
            <i class="bi bi-chevron-right"
                style="color: #fff; font-size: 8px; text-shadow: 1px 0 0 #fff, -1px 0 0 #fff, 0 1px 0 #fff, 0 -1px 0 #fff;"></i>
        </div>
    </div>
@endsection

@section('main-sidebar')
@endsection
