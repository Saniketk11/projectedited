<template>
    <header>
        <div class="main-nav">
            <div class="nav-contianer">
                <nav class="navbar navbar-expand-lg navbar-light ">
                    <div class="nav-flex-area"><a class="navbar-brand logo-box" href="#"><img
                        src="/images/logo.svg"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false"
                                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarText">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Start
                                    <svg width="10" height="7" viewBox="0 0 10 7" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L5 5L9 1" stroke="black" stroke-width="1.5"></path>
                                    </svg>
                                </a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Leistungen
                                    <svg width="10" height="7" viewBox="0 0 10 7" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L5 5L9 1" stroke="black" stroke-width="1.5"></path>
                                    </svg>
                                </a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Unternehmen
                                    <svg width="10" height="7" viewBox="0 0 10 7" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L5 5L9 1" stroke="black" stroke-width="1.5"></path>
                                    </svg>
                                </a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Kontakt</a></li>
                            </ul>
                            <div class="justify-content-center" id="loader" style="display: none;">
                                <div class="spinner-border" role="status"><span
                                    class="visually-hidden">Loading...</span></div>
                            </div>
                            <div class="navbar-text">
                                <div class="btn-grp"><a href="#" class="link-btn"> Login </a><a
                                    class="link-btn fill-btn" href="/Wizard"> Konsultieren </a></div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
</template>

<script>
    export default {
       mounted() {
       }
    }
</script>
