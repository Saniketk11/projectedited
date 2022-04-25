<template>
    <div>
        <step-header-component progress="25"></step-header-component>

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
                        Beschreiben Sie Ihre Immobilie
                    </div>
                </div>

                <div class="steps__inner">
                    <div class="form-group form__group">
                        <div class="position-relative">
                            <input type="number" placeholder="Fläche"
                                   @keyup="setValue('surface', $event.target.value)"
                                   name="surface"
                                   :value="VALUES.surface"
                                   :class="{'form-control': true, 'form__control': true, 'error' : errors.includes('surface')}">
                            <span class="m2">m²</span>
                        </div>
                        <small v-if="errors.includes('surface')" class="error__message">Ihre Eingabe ist nicht
                            korrekt</small>
                    </div>

                    <div class="form-group form__group">
                        <div class="position-relative">
                            <input type="number" placeholder="Baujahr"
                                   @keyup="setValue('construction_year', $event.target.value)"
                                   name="construction_year"
                                   :value="VALUES.construction_year"
                                   :class="{'form-control': true, 'form__control': true, 'error' : errors.includes('construction_year')}">
                        </div>
                        <small v-if="errors.includes('construction_year')" class="error__message">Ihre Eingabe ist nicht
                            korrekt</small>
                    </div>

                    <div class="form-group form__group">
                        <div class="position-relative">
                            <input type="number" placeholder="Stockwerke"
                                   @keyup="setValue('floors', $event.target.value)"
                                   :value="VALUES.floors"
                                   :class="{'form-control': true, 'form__control': true, 'error' : errors.includes('floors')}">
                        </div>
                        <small v-if="errors.includes('surface')" class="error__message">Ihre Eingabe ist nicht
                            korrekt</small>
                    </div>

                    <div class="form-group form__group mb-4">
                        <div class="position-relative">
                            <input type="number" placeholder="Zimmer"
                                   @keyup="setValue('room', $event.target.value)"
                                   name="room"
                                   :value="VALUES.room"
                                   :class="{'form-control': true, 'form__control': true, 'error' : errors.includes('room')}">
                        </div>
                        <small v-if="errors.includes('room')" class="error__message">Ihre Eingabe ist nicht
                            korrekt</small>
                    </div>

                    <div class="form-group w-100">
                        <p>Erbpacht</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="radio__wrapper mt-0">
                                    <input type="radio" name="select2"
                                           @change="setValue('is_leasehold', 1)"
                                           id="option-1" :checked="VALUES.is_leasehold">
                                    <label for="option-1" class="option">
                                        <b class="radio__dot"></b>
                                        <span>Ja</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="radio__wrapper mt-0">
                                    <input type="radio" name="select2" id="option-2"
                                           @change="setValue('is_leasehold', 0)"
                                           :checked="!VALUES.is_leasehold">
                                    <label for="option-2" class="option">
                                        <b class="radio__dot"></b>
                                        <span>Nein</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="steps__arrow steps__arrow--footer">
                    <button type="button" class="btn btn-link" @click="goHome()">&lt; Zurück</button>
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

        nextStep() {
            this.errors = [];
            if (this.VALUES.surface === '' || this.VALUES.surface > 999999) {
                this.errors.push('surface');
            }

            if (this.VALUES.construction_year === '' || this.VALUES.construction_year < 1900 ||
                this.VALUES.construction_year > 2099) {
                this.errors.push('construction_year')
            }

            if (this.VALUES.room === '') {
                this.errors.push('room')
            }

            if (this.VALUES.floors === '') {
                this.errors.push('floors')
            }

            if (this.errors.length === 0) {
                this.UPDATE_STEP(2)
            }
        },

        setValue(type, value) {
            this.UPDATE_VALUE({
                type,
                value
            })
        },

        goHome() {
            this.UPDATE_ALL_PROPERTIES();
        }
    },

    computed: {
        ...mapGetters([
            'VALUES',
        ]),
    }

}
</script>
