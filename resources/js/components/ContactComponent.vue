<template>
    <div>
        <step-header-component progress="100"></step-header-component>
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
                        Gib uns noch etwas mehr Details...
                    </div>
                </div>

                <div class="steps__inner">

                    <div class="form-group form__group">
                        <div>
                            <input type="number" placeholder="Was ist ihr Wunschpreis?"
                                   :value="VALUES.price"
                                   @keyup="setValue('price', $event.target.value)"
                                   :class="{'form-control': true, 'form__control': true, 'error' : errors.includes('price')}">
                        </div>
                        <small v-if="errors.includes('price')" class="error__message">Ihre Eingabe ist nicht
                            korrekt</small>
                    </div>


                    <div class="form-group form__group">
                        <div>
                            <input type="text" placeholder="Email"
                                   :value="VALUES.email"
                                   @keyup="setValue('email', $event.target.value)"
                                   :class="{'form-control': true, 'form__control': true, 'error' : errors.includes('email')}">
                        </div>
                        <small v-if="errors.includes('email')" class="error__message">Ihre Eingabe ist nicht
                            korrekt</small>
                    </div>


                    <div class="form-group form__group">
                        <div>
                            <input type="number" placeholder="Telefonnummer"
                                   :value="VALUES.phone_number"
                                   @keyup="setValue('phone_number', $event.target.value)"
                                   :class="{'form-control': true, 'form__control': true, 'error' : errors.includes('phone_number')}">
                        </div>
                        <small v-if="errors.includes('phone_number')" class="error__message">Ihre Eingabe ist nicht
                            korrekt</small>
                    </div>
                </div>

                <div class="steps__arrow steps__arrow--footer">
                    <button type="button" class="btn btn-link" @click="prevStep()">&lt; Zurück</button>
                    <button type="button" :disabled="is_disabled" class="btn-next" @click="nextStep()">
                        <span v-if="is_disabled" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Senden
                    </button>
                </div>
            </div>
        </div>

        <step-footer-component></step-footer-component>

    </div>
</template>
<script>

import {PhoneNumberUtil} from "google-libphonenumber";

import {mapGetters, mapMutations} from "vuex";

export default {
    data() {
        return {
            errors: [],
            is_disabled: false
        }
    },

    methods: {
        ...mapMutations([
            'UPDATE_STEP',
            'UPDATE_ALL_PROPERTIES',
            'UPDATE_VALUE'
        ]),


        prevStep() {
            this.UPDATE_STEP(3);
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
            if (this.VALUES.price === '') {
                this.errors.push('price');
            }

            if (this.VALUES.email === '' || !this.isEmail(this.VALUES.email)) {
                this.errors.push('email');
            }

            if (this.VALUES.phone_number === '' || !this.isGermanPhoneNumber(this.VALUES.phone_number)) {
                this.errors.push('phone_number');
            }

            if (this.errors.length === 0) {
                this.sendRequest();
            }
        },

        isGermanPhoneNumber(str) {

            if (str === '' || str.length > 15) {
                return false
            }

            const phoneUtil = PhoneNumberUtil.getInstance();

            const number = phoneUtil.parseAndKeepRawInput(str, 'DE');

            return phoneUtil.isValidNumberForRegion(number, 'DE')
        },

        isEmail(email) {
            return /^[a-z0-9!#$%&'*+\/=?^_`{|}~.-]+@[a-z0-9-]+(\.[a-z0-9-]+)*$/.test(email);
        },

        sendRequest() {
            this.is_disabled = true;
            let formData = new FormData();
            formData.append('address', this.VALUES.address);
            formData.append('comment', this.VALUES.comment);
            formData.append('construction_year', this.VALUES.construction_year);
            formData.append('email', this.VALUES.email);
            formData.append('is_leasehold', this.VALUES.is_leasehold);
            formData.append('phone_number', this.VALUES.phone_number);
            formData.append('postal_code', this.VALUES.postal_code);
            formData.append('price', this.VALUES.price);
            formData.append('room', this.VALUES.room);
            formData.append('state', this.VALUES.state);
            formData.append('surface', this.VALUES.surface);
            formData.append('type', this.VALUES.type);
            formData.append('floors', this.VALUES.floors);
            formData.append('is_declaration_of_division', this.VALUES.is_declaration_of_division);
            formData.append('apartment_count', this.VALUES.apartment_count);
            formData.append('is_development_possible', this.VALUES.is_development_possible);

            for (const [key, value] of Object.entries(this.VALUES.floor_plans)) {
                formData.append('floor_plans[]', value);
            }

            for (const [key, value] of Object.entries(this.VALUES.photos)) {
                formData.append('photos[]', value);
            }

            for (const [key, value] of Object.entries(this.VALUES.attachments)) {
                formData.append('attachments[]', value);
            }

            axios.post('/send-request',
                formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            ).then(res => {
                console.log('SUCCESS!!');
                this.goHome();
                this.is_disabled = false;
                iziToast.success({
                    position: 'topRight',
                    message: 'Vielen Dank für deine Immobilie! Unser Team wird sich bald ' +
                        'möglichst mit dir in Verbindung setzen und dir deine Möglichkeiten präsentieren.',
                });

            })
                .catch(function () {
                    console.log('FAILURE!!');
                });
        },
    },

    computed: {
        ...mapGetters([
            'VALUES',
        ]),
    }
}
</script>
