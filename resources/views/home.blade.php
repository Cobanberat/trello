@extends('layouts.app')

@section('home')
    @php
        $favs = App\Models\favories::with('favori')->where('user_id', Auth::id())->get();
    @endphp
    <div class="d-flex home-container p-5">
        <div class="main-div">
            <div class="main-img-text">
                <img src="https://trello.com/assets/e55b3540e5c1f06a51d7.svg" class="main-image">
                <div class="main-text">
                    <div class="main-text-bslk">
                        <span>Güncel ve iletişimde kalın</span>
                    </div>
                    <div class="main-text-mtn">
                        <span>Panolara ve kartlara insanları davet edin, yorum yapın,
                            bitiş tarihi ekleyin ve size buradaki en önemli aktiviteyi gösterelim.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-left-nav overflow-visible">
            @if ($favs->count() > 0)
                <div class="main-nav-div" id="yildizli">
                    <div class="main-nav-title">
                        <div class="main-nav-title-logo">

                            <svg width="16" height="16" role="presentation" focusable="false" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.49495 20.995L11.9999 18.6266L16.5049 20.995C16.8059 21.1533 17.1507 21.2079 17.4859 21.1504C18.3276 21.006 18.893 20.2066 18.7486 19.3649L17.8882 14.3485L21.5328 10.7959C21.7763 10.5585 21.9348 10.2475 21.9837 9.91094C22.1065 9.06576 21.5209 8.28106 20.6758 8.15825L15.6391 7.42637L13.3866 2.86236C13.2361 2.55739 12.9892 2.31054 12.6843 2.16003C11.9184 1.78206 10.9912 2.0965 10.6132 2.86236L8.36072 7.42637L3.32403 8.15825C2.98747 8.20715 2.67643 8.36564 2.43904 8.60917C1.84291 9.22074 1.85542 10.1998 2.46699 10.7959L6.11158 14.3485L5.25121 19.3649C5.19372 19.7 5.24833 20.0448 5.40658 20.3459C5.80401 21.1018 6.739 21.3924 7.49495 20.995ZM19.3457 10.0485L15.6728 13.6287L16.5398 18.684L11.9999 16.2972L7.45995 18.684L8.327 13.6287L4.65411 10.0485L9.72993 9.31093L11.9999 4.71146L14.2699 9.31093L19.3457 10.0485Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                        <div class="main-nav-title-text">
                            <span>Yıldızlı </span>
                        </div>
                    </div>
                    @foreach ($favs as $fav)
                        <div class="main-nav-project">
                            <a href="#" class="main-nav-project-a">
                                <div class="project-background-tema"></div>
                                <div class="main-project-name">
                                    <span class="project-name-bslk">{{ $fav->favori->name }}</span>
                                    <span class="project-name-text">Trello Çalışma Alanı</span>
                                </div>
                                <div class="gecmis-fav-logo">
                                    <div class="workingas">
                                        <div class="src" style="margin-right:2px">
                                            <i class="bi bi-three-dots"></i>
                                        </div>
                                        <label class="star" style="cursor:pointer;">
                                            <input type="checkbox" class="star-toggle" data-pano-id="{{ $fav->favori->id }}"
                                                checked style="display: none;">

                                            <div class="ort-srcs-star">
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
                                </div>

                            </a>

                        </div>
                    @endforeach
                </div>
            @else
                 <div class="main-nav-div" id="sonG">
                        <div class="main-nav-title">
                            <div class="main-nav-title-logo">
                                <svg width="16" height="16" role="presentation" focusable="false" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13 6C13 5.44772 12.5523 5 12 5C11.4477 5 11 5.44772 11 6V12C11 12.2652 11.1054 12.5196 11.2929 12.7071L13.7929 15.2071C14.1834 15.5976 14.8166 15.5976 15.2071 15.2071C15.5976 14.8166 15.5976 14.1834 15.2071 13.7929L13 11.5858V6Z"
                                        fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20Z"
                                        fill="currentColor"></path>
                                </svg>
                            </div>
                            <div class="main-nav-title-text">
                                <span>Son Görüntülenenler </span>
                            </div>
                        </div>
                        <div class="main-nav-project">
                            <a href="#" class="main-nav-project-a">
                                <div class="project-background-tema"></div>
                                <div class="main-project-name">
                                    <span class="project-name-bslk">proje</span>
                                    <span class="project-name-text">Trello Çalışma Alanı</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    
            @endif
            <div class="main-nav-div">
                <div class="main-nav-title">
                    <div class="main-nav-title-text">
                        <span>Bağlantılar</span>
                    </div>
                </div>
                <div class="main-nav-project">
                    <div class="btn-group dropstart">
                        <button href="#" class="main-nav-project-button dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false" data-bs-auto-close="outside">
                            <div class="main-nav-project-add-icon"><i class="bi bi-plus"></i></div>
                            <div class="main-nav-project-add-span"><span>Pano Oluştur</span></div>
                        </button>
                        <div class="pano-add-form dropdown-menu" data-bs-auto-close="outside">
                            <form action="{{ route('pano.add') }}" method="post">
                                @csrf
                                <div class="d-flex flex-column gap-2">
                                    <div class="ust-text">
                                        <div class="text-visibility-pano">
                                            <span>Pano Oluştur</span>
                                        </div>
                                        <div class="exit-visibility-pano">
                                            <span> <i class="bi bi-x"></i> </span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="trl-img">
                                            <img src="https://trello.com/assets/14cda5dc635d1f13bc48.svg" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <span class="arkpln-text">Arkaplan</span>
                                    <div class="d-flex flex-column">
                                        <div class="d-flex flex-column gap-2">
                                            <div class="d-flex justify-content-center gap-2">
                                                <span class="özel-button" id="image1">
                                                    <span class="secili-btn">
                                                        <svg width="24" height="24" role="presentation"
                                                            focusable="false" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6.73534 12.3223C6.36105 11.9162 5.72841 11.8904 5.3223 12.2647C4.91619 12.639 4.89039 13.2716 5.26467 13.6777L8.87678 17.597C9.41431 18.1231 10.2145 18.1231 10.7111 17.6264C10.7724 17.5662 10.7724 17.5662 11.0754 17.2683C11.3699 16.9785 11.6981 16.6556 12.0516 16.3075C13.0614 15.313 14.0713 14.3169 15.014 13.3848L15.0543 13.3449C16.7291 11.6887 18.0004 10.4236 18.712 9.70223C19.0998 9.30904 19.0954 8.67589 18.7022 8.28805C18.309 7.90022 17.6759 7.90457 17.2881 8.29777C16.5843 9.01131 15.3169 10.2724 13.648 11.9228L13.6077 11.9626C12.6662 12.8937 11.6572 13.8889 10.6483 14.8825C10.3578 15.1685 10.0845 15.4375 9.83288 15.6851L6.73534 12.3223Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </span>
                                                <span class="özel-button" id="image2"></span>
                                                <span class="özel-button" id="image3"></span>
                                                <span class="özel-button" id="image4"></span>
                                            </div>
                                            <div class="d-flex justify-content-center gap-2">
                                                <span class="renk-secenek" id="renk-secenek1"></span>
                                                <span class="renk-secenek" id="renk-secenek2"></span>
                                                <span class="renk-secenek" id="renk-secenek3"></span>
                                                <span class="renk-secenek" id="renk-secenek4"></span>
                                                <span class="renk-secenek" id="renk-secenek5"></span>
                                                <span class="renk-secenek" id="renk-secenek6">
                                                    <svg width="17" height="17" role="presentation"
                                                        focusable="false" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5 14C6.10457 14 7 13.1046 7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14ZM12 14C13.1046 14 14 13.1046 14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14ZM21 12C21 13.1046 20.1046 14 19 14C17.8954 14 17 13.1046 17 12C17 10.8954 17.8954 10 19 10C20.1046 10 21 10.8954 21 12Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <div class="pano_add_input">
                                                <label for="">Pano Başlığı<span
                                                        style="color: red;">*</span></label>
                                                <input class="panoBasligi_inpt" type="text" name="name">
                                                <span class="nameSpan">👋 Pano başlığı gerekli</span>
                                            </div>
                                            <div class="pano_add_input">
                                                <label for="">Görünürlük</label>
                                                <select class="panoBasligi_inpt" name="görünürlük" id="">
                                                    <option value="1">Özel</option>
                                                    <option value="2" selected>Çalışma Alanı</option>
                                                    <option value="1">Herkese Açık</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div style="padding: 10px" class="d-flex flex-column gap-1">
                                            <button class="pano-add-button none-button">Oluştur</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>




        @endsection
