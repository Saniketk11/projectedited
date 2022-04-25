<template>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <a href="" class="header__logo">
                    <img src="/images/logo.svg" alt="">
                </a>
                <nav class="nav">
                    Schon über 350.000 Immobilienbewertungen
                </nav>
            </div>
        </div>
        <div class="progress">
            <div :style="`width: ${progress}%;`" class="progress-bar"></div>
        </div>
    </header>
</template>

<script>
    export default {
       props: [
           'progress'
       ],

       mounted() {
       }
    }
</script>
