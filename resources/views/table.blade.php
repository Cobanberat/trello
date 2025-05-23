@extends('layouts.app')
@section('table')
    <div class="d-flex flex-column justify-content-between w-100 h-100">
        <div class="table-container w-100">
            <div class="table-nav w-100 d-flex flex-column p-3">
                <div class="table-row w-100 d-flex align-items-center justify-content-between">
                    <span class="table-row-txt">Tablo</span>
                    <div class="table-row-filter d-flex align-items-center gap-2">
                        <svg width="17" height="17" role="presentation" focusable="false" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.61799 6C3.87461 6 3.39111 6.78231 3.72356 7.44721L3.99996 8H20L20.2763 7.44721C20.6088 6.78231 20.1253 6 19.3819 6H4.61799ZM10.8618 17.7236C10.9465 17.893 11.1196 18 11.309 18H12.6909C12.8803 18 13.0535 17.893 13.1382 17.7236L14 16H9.99996L10.8618 17.7236ZM17 13H6.99996L5.99996 11H18L17 13Z"
                                fill="currentColor"></path>
                        </svg>
                        <span>Filtreler</span>
                    </div>
                </div>
            </div>
            <div class="table-body p-3">
                <div class="table-nav-bottom">
                    <div class="d-flex w-100 align-items-center justify-content-between dv-color">
                        <span>Kart</span>
                        <span>Liste</span>
                        <span>Etiketler</span>
                        <span>Üyeler</span>
                        <span id="table-nav-hover" class="dv-color" data-bs-auto-close="outside" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Bitiş Tarihi
                            <svg width="12" height="12" role="presentation" focusable="false" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.2929 16.7071L4.22185 9.63606C3.83132 9.24554 3.83132 8.61237 4.22185 8.22185C4.61237 7.83133 5.24554 7.83133 5.63606 8.22185L12 14.5858L18.364 8.22185C18.7545 7.83132 19.3877 7.83132 19.7782 8.22185C20.1687 8.61237 20.1687 9.24554 19.7782 9.63606L12.7071 16.7071C12.3166 17.0977 11.6834 17.0977 11.2929 16.7071Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <ul class="dropdown-menu dropdown-endDate">
                            <div class="ust-text">
                                <div style="width:100px;"></div>
                                <div class="text-visibility-endDate">
                                    <span>Bitiş Tarihi</span>
                                </div>
                                <div class="exit-visibility-endDate " onclick="document.body.click();">
                                    <span> <i class="bi bi-x"></i> </span>
                                </div>
                            </div>
                            <div class="ort-text-endDate">
                                <div class="endDateBlsk">
                                    <span>Sıralama</span>
                                </div>
                                <div class="endDateCard w-100">
                                    <span>Artan şekilde sırala</span>
                                    <span>Azalan şekilde sırala</span>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="premium-container  d-flex align-items-center ">
            <div class="premium-column w-100 justify-content-between p-4 d-flex align-items-center">
                <div class="premium-img">
                    <img src="https://trello.com/assets/e541f2a5dfd254921e3e.svg" alt="" srcset="">
                </div>
                <div class="premium-txt d-flex flex-column gap-2">
                    <h2>Çalışma Alanı görünümleriyle daha da fazla perspektif elde edin</h2>
                    <span>Premium Çalışma Alanları; filtrelemek, sıralamak ve daha fazla iş halletmek için panoları Tablo ve
                        Takvim halinde birleştirebilir.</span>
                </div>
                <div class="premium-update-btn">
                    <button># Çalışma Alanını Premium'a Yükselt</button>
                </div>
            </div>
        </div>
    </div>
@endsection
