@extends('layouts.app')

@section('main-sidebar')
    <div class="main-sidebar-container d-flex" style="backgorund-color:#9c446e;  color: white;">
        <div class="main-sidebar" style="width:250px">
            <div class="sdbr d-flex flex-column gap-2">
                <div class="sidebar-options gap-2">
                    <div class="rounded sidebar-active" id="sidebar-texts-main">
                        <a href="/dashboard" class="div-bslk">
                            <svg style="color:#fff" width="17" height="17" role="presentation" focusable="false"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3 5C3 3.89543 3.89543 3 5 3H19C20.1046 3 21 3.89543 21 5V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V5ZM5 6C5 5.44772 5.44772 5 6 5H10C10.5523 5 11 5.44772 11 6V16C11 16.5523 10.5523 17 10 17H6C5.44772 17 5 16.5523 5 16V6ZM14 5C13.4477 5 13 5.44772 13 6V12C13 12.5523 13.4477 13 14 13H18C18.5523 13 19 12.5523 19 12V6C19 5.44772 18.5523 5 18 5H14Z"
                                    fill="currentColor"></path>
                            </svg>
                            <span>Panolar</span>
                        </a>
                    </div>
                    <div class="rounded" id="sidebar-texts-main">
                        <div class="div-bslk">
                            <svg width="17" height="17" role="presentation" focusable="false" viewBox="0 0 24 24"
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
                            <span># Şablonlar</span>
                        </div>
                    </div>
                    <div class="rounded" id="sidebar-texts-main">
                        <a href="/main" class="div-bslk">
                            <i class="bi bi-activity"></i>
                            <span>Anasayfa</span>
                        </a>
                    </div>
                </div>
                <div class="cizgiwhite"></div>
                <div class="d-flex flex-column gap-2">
                    <div style="font-size:12px;font-weight:500; color: #cfcfcf;">
                        <span>Çalışma Alanları</span>
                    </div>
                    <div id="sidebar-texts-main" class="d-flex align-items-center p-2 justify-content-start rounded">
                        <div class="d-flex align-items-center gap-2">
                            <span class="main-s-alt-logo p-1">T</span>
                            <span style="font-weight:500;font-size:13px; color: #e4e3e3;">
                                Trello Çalışma Alanı
                            </span>
                        </div>
                        <div style="width:70px" class="d-flex justify-content-end">
                            <i style="font-size:12px" class="bi bi-chevron-up"></i>
                        </div>
                    </div>
                </div>
                <div class="">
                    <a href="/dashboard" id="sidebar-texts-main" class="d-flex align-items-center p-2 justify-content-start rounded">
                        <div class="d-flex align-items-center gap-2 ml-7">
                            <svg style="color:#fff" width="17" height="17" role="presentation" focusable="false"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3 5C3 3.89543 3.89543 3 5 3H19C20.1046 3 21 3.89543 21 5V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V5ZM5 6C5 5.44772 5.44772 5 6 5H10C10.5523 5 11 5.44772 11 6V16C11 16.5523 10.5523 17 10 17H6C5.44772 17 5 16.5523 5 16V6ZM14 5C13.4477 5 13 5.44772 13 6V12C13 12.5523 13.4477 13 14 13H18C18.5523 13 19 12.5523 19 12V6C19 5.44772 18.5523 5 18 5H14Z"
                                    fill="currentColor"></path>
                            </svg>
                            <span style="font-weight:500;font-size:13px; color: #e4e3e3;">
                                Panolar
                            </span>
                        </div>
                    </a>
                    <a href="/highlights" id="sidebar-texts-main" class="d-flex align-items-center p-2 justify-content-start rounded">
                        <div class="d-flex align-items-center gap-2 ml-7">
                            <svg width="20" height="20" role="presentation" focusable="false" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.18194 8.23223C5.20563 9.20854 5.20563 10.7915 6.18194 11.7678L12.1923 17.7782L18.2028 11.7678C19.1791 10.7915 19.1791 9.20854 18.2028 8.23223C17.2264 7.25592 15.6435 7.25592 14.6672 8.23223L12.8995 10C12.5089 10.3905 11.8758 10.3905 11.4852 10L9.71747 8.23223C8.74116 7.25592 7.15825 7.25592 6.18194 8.23223ZM4.76773 13.182C3.01037 11.4246 3.01037 8.57538 4.76773 6.81802C6.52509 5.06066 9.37433 5.06066 11.1317 6.81802L12.1923 7.87868L13.253 6.81802C15.0104 5.06066 17.8596 5.06066 19.617 6.81802C21.3743 8.57538 21.3743 11.4246 19.617 13.182L12.8995 19.8995C12.5089 20.29 11.8758 20.29 11.4852 19.8995L4.76773 13.182Z"
                                    fill="currentColor"></path>

                            </svg>
                            <span style="font-weight:500;font-size:13px; color: #e4e3e3;">
                                Öne Çıkanlar
                            </span>
                        </div>
                    </a>
                    <div id="sidebar-texts-main"
                        class="d-flex gorunum align-items-center p-2 justify-content-start rounded">
                        <div class="d-flex align-items-center gap-2 ml-7">
                            <svg width="20" height="20" role="presentation" focusable="false" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3 5C3 3.89543 3.89543 3 5 3H9C10.1046 3 11 3.89543 11 5V9C11 10.1046 10.1046 11 9 11H5C3.89543 11 3 10.1046 3 9V5ZM5 5H9V9H5V5Z"
                                    fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3 15C3 13.8954 3.89543 13 5 13H9C10.1046 13 11 13.8954 11 15V19C11 20.1046 10.1046 21 9 21H5C3.89543 21 3 20.1046 3 19V15ZM5 15H9V19H5V15Z"
                                    fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15 3C13.8954 3 13 3.89543 13 5V9C13 10.1046 13.8954 11 15 11H19C20.1046 11 21 10.1046 21 9V5C21 3.89543 20.1046 3 19 3H15ZM19 5H15V9H19V5Z"
                                    fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13 15C13 13.8954 13.8954 13 15 13H19C20.1046 13 21 13.8954 21 15V19C21 20.1046 20.1046 21 19 21H15C13.8954 21 13 20.1046 13 19V15ZM15 15H19V19H15V15Z"
                                    fill="currentColor"></path>
                            </svg>
                            <span style="font-weight:500;font-size:13px; color: #e4e3e3;">
                                Görünümler
                            </span>
                        </div>
                        <div style="width:120px" class="d-flex justify-content-end gap-4">
                            <i class="bi bi-chevron-right sls-gorunum"></i>
                        </div>
                    </div>
                    <div id="sidebar-texts-main"
                        class="d-flex uyeler align-items-center p-2 justify-content-start rounded">
                        <div class="d-flex align-items-center gap-2 ml-7">
                            <svg width="20" height="20" role="presentation" focusable="false"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12.5048 5.67168C11.9099 5.32669 11.2374 5.10082 10.5198 5.0267C11.2076 3.81639 12.5085 3 14 3C16.2092 3 18 4.79086 18 7C18 7.99184 17.639 8.89936 17.0413 9.59835C19.9512 10.7953 22 13.6584 22 17C22 17.5523 21.5523 18 21 18H18.777C18.6179 17.2987 18.3768 16.6285 18.0645 16H19.917C19.4892 13.4497 17.4525 11.445 14.8863 11.065C14.9608 10.7218 15 10.3655 15 10C15 9.58908 14.9504 9.18974 14.857 8.80763C15.5328 8.48668 16 7.79791 16 7C16 5.89543 15.1046 5 14 5C13.4053 5 12.8711 5.25961 12.5048 5.67168ZM10 12C11.1046 12 12 11.1046 12 10C12 8.89543 11.1046 8 10 8C8.89543 8 8 8.89543 8 10C8 11.1046 8.89543 12 10 12ZM14 10C14 10.9918 13.639 11.8994 13.0412 12.5984C15.9512 13.7953 18 16.6584 18 20C18 20.5523 17.5523 21 17 21H3C2.44772 21 2 20.5523 2 20C2 16.6584 4.04879 13.7953 6.95875 12.5984C6.36099 11.8994 6 10.9918 6 10C6 7.79086 7.79086 6 10 6C12.2091 6 14 7.79086 14 10ZM9.99999 14C12.973 14 15.441 16.1623 15.917 19H4.08295C4.55902 16.1623 7.02699 14 9.99999 14Z"
                                    fill="currentColor"></path>
                            </svg>
                            <span style="font-weight:500;font-size:13px; color: #e4e3e3;">
                                Üyeler
                            </span>
                        </div>
                        <div style="width:120px" class="d-flex justify-content-end gap-4">
                            <i style="font-size:14px;" class="bi bi-plus-lg"></i>
                            <i class="bi bi-chevron-right sls"></i>
                        </div>
                    </div>
                    <div id="sidebar-texts-main"
                        class="d-flex ayarlar align-items-center p-2 justify-content-start rounded">
                        <div class="d-flex align-items-center gap-2 ml-7">
                            <svg width="20" height="20" role="presentation" focusable="false"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12.0017 17.0009C9.23868 17.0009 6.99968 14.7609 6.99968 11.9989C6.99968 9.23586 9.23868 6.99686 12.0017 6.99686C14.7647 6.99686 17.0037 9.23586 17.0037 11.9989C17.0037 14.7609 14.7647 17.0009 12.0017 17.0009ZM20.3697 13.8839C19.5867 13.6119 19.0237 12.8749 19.0237 11.9989C19.0237 11.1229 19.5867 10.3859 20.3687 10.1139C20.6057 10.0319 20.7517 9.78086 20.6837 9.53986C20.4847 8.83586 20.2017 8.16886 19.8477 7.54686C19.7297 7.33886 19.4707 7.26186 19.2497 7.35186C18.8647 7.50986 18.4197 7.55086 17.9587 7.43286C17.2847 7.25886 16.7337 6.70986 16.5557 6.03686C16.4337 5.57386 16.4747 5.12686 16.6317 4.73986C16.7207 4.51986 16.6437 4.26086 16.4357 4.14286C15.8187 3.79386 15.1567 3.51386 14.4607 3.31686C14.2187 3.24886 13.9687 3.39386 13.8867 3.63086C13.6147 4.41386 12.8777 4.97686 12.0017 4.97686C11.1267 4.97686 10.3887 4.41386 10.1177 3.63186C10.0347 3.39486 9.78368 3.24886 9.54268 3.31686C8.83468 3.51686 8.16368 3.80186 7.53868 4.15886C7.33768 4.27386 7.25268 4.52586 7.34068 4.74086C7.48768 5.10186 7.53268 5.51386 7.43868 5.94386C7.28368 6.64986 6.72468 7.24086 6.02568 7.42786C5.56768 7.55086 5.12768 7.51186 4.74568 7.35986C4.52568 7.27186 4.26768 7.34986 4.15068 7.55586C3.79768 8.17786 3.51568 8.84586 3.31768 9.54986C3.24968 9.78886 3.39268 10.0369 3.62568 10.1219C4.39668 10.3999 4.94868 11.1319 4.94868 11.9989C4.94868 12.8659 4.39668 13.5979 3.62468 13.8759C3.39168 13.9599 3.24968 14.2079 3.31668 14.4469C3.49368 15.0739 3.73868 15.6729 4.03968 16.2369C4.15868 16.4589 4.43468 16.5349 4.66368 16.4299C5.25868 16.1569 6.00668 16.1659 6.76768 16.6679C6.88468 16.7449 6.99268 16.8529 7.06968 16.9689C7.59668 17.7679 7.58168 18.5489 7.26768 19.1559C7.15268 19.3789 7.21968 19.6569 7.43568 19.7839C8.08968 20.1679 8.79768 20.4709 9.54468 20.6809C9.78568 20.7489 10.0337 20.6049 10.1147 20.3679C10.3837 19.5819 11.1237 19.0149 12.0017 19.0149C12.8797 19.0149 13.6197 19.5819 13.8887 20.3679C13.9697 20.6039 14.2177 20.7489 14.4587 20.6809C15.1957 20.4739 15.8947 20.1749 16.5427 19.7979C16.7607 19.6709 16.8267 19.3899 16.7097 19.1669C16.3917 18.5589 16.3727 17.7739 16.9007 16.9719C16.9777 16.8559 17.0857 16.7469 17.2027 16.6699C17.9747 16.1589 18.7297 16.1569 19.3277 16.4399C19.5567 16.5479 19.8357 16.4729 19.9557 16.2499C20.2597 15.6859 20.5047 15.0859 20.6837 14.4569C20.7517 14.2159 20.6067 13.9659 20.3697 13.8839Z"
                                    fill="currentColor"></path>

                            </svg>
                            <span style="font-weight:500;font-size:13px; color: #e4e3e3;">
                                Ayarlar
                            </span>
                            <div style="width:120px" class="d-flex justify-content-end gap-4">
                                <i class="bi bi-chevron-right sls-ayar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
