@extends('layouts.app')

@section('profile')
    <div class="profile">
        <div class="profile-container scroller">
            <div class="profile-card">
                <div class="profile-display">
                    <div class="profile-logo">
                        <span>{{ $sonuc }}</span>
                    </div>
                    <div class="profile-inf">
                        <span class="profile-span-name ">{{ $user->name }}</span>
                        <span class="profile-span-mail">{{ $user->email }}</span>
                    </div>
                </div>
            </div>
            <div class="profile-navLinks">
                <div class="profile-navLinksDiv">
                    <div class="navLinks navLinksActive">
                        <span>Profil ve Görünürlük</span>
                    </div>
                    <div class="navLinks">
                        <span># Etkinlik</span>
                    </div>
                    <div class="navLinks">
                        <span># Kartlar</span>
                    </div>
                    <div class="navLinks">
                        <span># Ayarlar</span>
                    </div>

                </div>
            </div>

            <div class="profile-main">
                <div class="profile-main-container">
                    <div class="profile-main-container-inf">
                        <img class="profile-main-container-inf-img" src="https://trello.com/assets/eff3d701a9c3a71105ea.svg"
                            alt="">
                        <h1 class="profile-main-container-inf-h1">Kişisel bilgilerinizi yönetin</h1>
                        <p class="profile-main-container-inf-p">
                            <span>Bu bir Atlassian hesabıdır. Kişisel bilgilerinizi ve görünürlük ayarlarınızı Atlassian
                                profili üzerinden düzenleyin.</span>
                            <span>Daha fazlasını öğrenmek için Hizmet Kullanım Şartları veya Gizlilik Politikası kısmımıza
                                bakın.</span>
                        </p>
                        <h3 class="profile-main-container-inf-h3">Hakkında</h3>
                        <hr class="profile-main-container-inf-hr">
                        <div class="profile-main-container-inf-form">
                            <form class="profile-form" method="POST">
                                @csrf
                                <div class="profile-form-bslk">
                                    <label class="profile-form-bslk-label" for="username">Kullanıcı Adı</label>
                                    <div role="presentation">
                                        <div class="profile-form-bslk-text">
                                            <span>
                                                <svg width="17" height="17" role="presentation" focusable="false"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M11 18.9291V18C11 17.4477 10.5523 17 10 17C9.44772 17 9 16.5523 9 16V15L5.06227 11.0623C5.0212 11.369 5 11.682 5 12C5 15.5265 7.60771 18.4439 11 18.9291ZM14.9929 5.67024C14.9065 6.69513 14.0472 7.5 13 7.5H11V9C11 9.55228 10.5523 10 10 10H8V12H13C14.1046 12 15 12.8954 15 14V16H16C16.5198 16 16.9469 16.3966 16.9954 16.9037C18.2353 15.6407 19 13.9097 19 12C19 9.20479 17.3617 6.79224 14.9929 5.67024ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <span>Her Zaman Herkese Açık</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <input class="profile-form-input" type="text" name="name"
                                        value="{{ $user->name }}" placeholder=" {{ $user->name }}">
                                </div>
                                <input type="submit" value="Kaydet" class="profile-form-button">
                            </form>

                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
        
@endsection
