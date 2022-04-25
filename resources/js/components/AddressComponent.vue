<template>
    <div>
        <step-header-component progress="75"></step-header-component>
        <div class="container">
            <div class="steps">
                <div class="steps__header">
                    <div class="steps__arrow">
                        <button type="button" class="btn btn-link" @click="goHome()">
                            SCHLIESSEN &times;
                        </button>
                    </div>

                    <div class="steps__image">
                        <img src="/images/eva-frank.jpg" alt="jpg">
                    </div>
                    <div class="steps__name">
                        Wo befindet sich das Objekt?
                    </div>
                </div>

                <div class="steps__inner">
                    <div class="form-group form__group">
                        <div>
                            <input type="text" placeholder="Bundesland"
                                   :value="VALUES.state"
                                   @keyup="setValue('state', $event.target.value)"
                                   :class="{'form-control': true, 'form__control': true, 'error' : errors.includes('state')}">
                        </div>
                        <small v-if="errors.includes('state')" class="error__message">Ihre Eingabe ist nicht
                            korrekt</small>
                    </div>

                    <div class="form-group form__group">
                        <div>
                            <input type="text" placeholder="Postleitzahl"
                                   :value="VALUES.postal_code"
                                   @keyup="setValue('postal_code', $event.target.value)"
                                   :class="{'form-control': true, 'form__control': true, 'error' : errors.includes('postal_code')}">
                        </div>
                        <small v-if="errors.includes('postal_code')" class="error__message">Ihre Eingabe ist nicht
                            korrekt</small>
                    </div>

                    <div class="form-group form__group">
                        <div>
                            <input type="text" placeholder="Straße und Hausnummer"
                                   :value="VALUES.address"
                                   @keyup="setValue('address', $event.target.value)"
                                   class="form-control form__control">
                        </div>
                    </div>
                </div>

                <div class="steps__arrow steps__arrow--footer">
                    <button type="button" class="btn btn-link" @click="prevStep()">&lt; Zurück</button>
                    <button type="button" class="btn-next" @click="nextStep()">Weiter</button>
                </div>
            </div>
        </div>

        <step-footer-component></step-footer-component>

    </div>
</template>
<script>

import {mapGetters, mapMutations} from "vuex";

export default {
    data() {
        return {
            errors: [],
        }
    },

    methods: {
        ...mapMutations([
            'UPDATE_STEP',
            'UPDATE_ALL_PROPERTIES',
            'UPDATE_VALUE'
        ]),


        prevStep() {
            this.UPDATE_STEP(2);
        },

        goHome() {
            this.UPDATE_ALL_PROPERTIES();
        },

        setValue(type, value) {
            this.UPDATE_VALUE({
                type,
                value
            })
        },

        nextStep() {
            this.errors = [];
            if (this.VALUES.state === '') {
                this.errors.push('state');
            }

            if (this.VALUES.postal_code === '' || !this.isGermanZipCode(this.VALUES.postal_code)) {
                this.errors.push('postal_code');
            }

            if (this.errors.length === 0) {
                this.UPDATE_STEP(4)
            }
        },

        isGermanZipCode(str) {
            return /^\d{5}$/.test(str);
        }

    },

    computed: {
        ...mapGetters([
            'VALUES',
        ]),
    }
}
</script>
