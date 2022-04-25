<template>
    <section>
        <div class="section-container pd-r-70">
            <div class="section-row sm-column-reverse">
                <div class="img-colm wd-40-pt sm-wd-100-pt">
                    <img src="/images/section-1-img.jpg"
                         class="header-img">
                </div>
                <div class="content-colm wd-60-pt sm-wd-100-pt">
                    <div class="section-content"><h1 class="section-title mr-b-10 ">Hier geht’s zur
                        Potentialanalyse</h1>
                        <p class="p-text mr-b-40">Jetzt Ihre Immobilie kostenlos bewerten lassen</p><a href="tel:085619186035"
                                                                                                       class="btn-link">
                            <svg width="34" height="21" viewBox="0 0 34 21" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle cx="10.5" cy="10.5" r="9.85" stroke="#182430"
                                        stroke-width="1.3"></circle>
                                <path
                                    d="M33.4596 10.4596C33.7135 10.2058 33.7135 9.79422 33.4596 9.54038L29.323 5.40381C29.0692 5.14997 28.6576 5.14997 28.4038 5.40381C28.15 5.65765 28.15 6.0692 28.4038 6.32304L32.0808 10L28.4038 13.677C28.15 13.9308 28.15 14.3424 28.4038 14.5962C28.6576 14.85 29.0692 14.85 29.323 14.5962L33.4596 10.4596ZM7 10.65H33V9.35H7V10.65Z"
                                    fill="black"></path>
                            </svg>
                            <span>ERSTGESPRÄCH SICHERN</span>
                        </a>
                    </div>
                    <div class="flex-bar space-between mr-l-68 mr-t-40 ">
                        <div class="vertical-icon-box" @click="chooseProperty('apartment')">
                            <img src="/images/box-icon-1.svg" class="icon-box-icon">
                            <p class="text">Wohnung</p>
                        </div>
                        <div class="vertical-icon-box" @click="chooseProperty('house')">
                            <img src="/images/box-icon-2.svg" class="icon-box-icon">
                            <p class="text">Haus</p>
                        </div>
                        <div class="vertical-icon-box" @click="chooseProperty('multi_apartment_house')">
                            <img src="/images/box-icon-3.svg" class="icon-box-icon">
                            <p class="text">Mehrfamilienhaus</p>
                        </div>
                        <div class="vertical-icon-box" @click="chooseProperty('business')">
                            <img src="/images/box-icon-4.svg" class="icon-box-icon">
                            <p class="text">Gewerbe</p>
                        </div>
                        <div class="vertical-icon-box" @click="chooseProperty('property')">
                            <img src="/images/building.svg" class="icon-box-icon">
                            <p class="text">Grundstück</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>

<script>
import {mapMutations} from "vuex";

export default {
    mounted() {

    },

    methods: {
        ...mapMutations([
            'UPDATE_IS_HOME',
            'UPDATE_PROPERTY',
            'UPDATE_STEP',
            'UPDATE_VALUE'
        ]),

        chooseProperty(property) {
            this.UPDATE_IS_HOME(false);
            this.UPDATE_PROPERTY(property);
            this.UPDATE_STEP(1);
            this.UPDATE_VALUE({
                type: 'type',
                value: property
            })
        }
    }
}
</script>
