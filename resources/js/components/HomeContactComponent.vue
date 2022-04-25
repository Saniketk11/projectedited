<template>
    <section class="section-bg-dark">
        <div class="section-container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-content sm-p-20-auto"><h1 class="section-title mr-b-10 color-wt">
                        Lassen
                        Sie uns beginnen.</h1>
                        <p class="p-text mr-b-40 color-wt opacity-06">Projectimmo steht Ihnen stets zur
                            Seite. Kontaktieren Sie uns jederzeit.</p>
                        <div class="form-box">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-field "><input type="text" id="name"
                                                                         v-model="name"
                                                                         class="input-bar"
                                                                         placeholder="Name"></div>
                                        <small v-if="errors.includes('name')" class="error__message">Ihre Eingabe ist
                                            nicht
                                            korrekt</small>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-field "><input type="email" id="email"
                                                                         v-model="email"
                                                                         class="input-bar"
                                                                         placeholder="Email">
                                        </div>
                                        <small v-if="errors.includes('email')" class="error__message">Ihre Eingabe ist
                                            nicht
                                            korrekt</small>
                                    </div>
                                    <div class=" col-md-12">
                                        <div class="input-field">
                                            <input type="text" id="messege"
                                                   v-model="message"
                                                   class="input-bar"
                                                   placeholder="Your messege">
                                        </div>
                                        <small v-if="errors.includes('message')" class="error__message">Ihre Eingabe ist
                                            nicht
                                            korrekt</small>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <button type="button" @click="sendEmail"
                                class="btn btn-link color-wt text-decoration-none shadow-none d-inline">
                            <svg width="34" height="21" viewBox="0 0 34 21" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle cx="10.5" cy="10.5" r="9.85" stroke="#182430"
                                        stroke-width="1.3"></circle>
                                <path
                                    d="M33.4596 10.4596C33.7135 10.2058 33.7135 9.79422 33.4596 9.54038L29.323 5.40381C29.0692 5.14997 28.6576 5.14997 28.4038 5.40381C28.15 5.65765 28.15 6.0692 28.4038 6.32304L32.0808 10L28.4038 13.677C28.15 13.9308 28.15 14.3424 28.4038 14.5962C28.6576 14.85 29.0692 14.85 29.323 14.5962L33.4596 10.4596ZM7 10.65H33V9.35H7V10.65Z"
                                    fill="black"></path>
                            </svg>
                            <span>Kontakt</span>
                        </button>

                        <span v-if="is_disabled" style="margin-left: 15px"
                              class="spinner-border spinner-border-sm color-wt" role="status"
                              aria-hidden="true"></span>

                        <div class="adress-box">
                            <p class="p-text color-wt-06">Info@projectimmo.de</p>
                            <p class="p-text color-wt-06">Leon Sieg Schachinger Weg 8<br>
                                94469 Deggendorf<br>
                                +491708080162</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="/images/section-7-img.png" class="bg-img-align">
    </section>
</template>
<script>

export default {
    data() {
        return {
            errors: [],
            is_disabled: false,
            name: '',
            email: '',
            message: ''
        }
    },

    methods: {

        sendEmail() {
            this.errors = [];
            if (this.name === '' || this.name.length > 255) {
                this.errors.push('name');
            }

            if (this.email === '' || !this.isEmail(this.email) || this.email.length > 255) {
                this.errors.push('email');
            }

            if (this.message.trim() === '' || this.message.trim().length > 255) {
                this.errors.push('message');
            }

            if (this.errors.length === 0) {
                this.sendRequest();
            }
        },

        isEmail(email) {
            return /^[a-z0-9!#$%&'*+\/=?^_`{|}~.-]+@[a-z0-9-]+(\.[a-z0-9-]+)*$/.test(email);
        },

        sendRequest() {
            this.is_disabled = true;
            let formData = new FormData();
            formData.append('name', this.name.trim());
            formData.append('email', this.email.trim());
            formData.append('message', this.message.trim());

            axios.post('/send-contact-message',
                formData,
            ).then(res => {
                console.log('SUCCESS!!');
                this.name = "";
                this.email = "";
                this.message = "";
                this.is_disabled = false;
                iziToast.success({
                    position: 'topRight',
                    message: 'Ihre Nachricht wurde erfolgreich gesendet',
                });

            }).catch(function () {
                console.log('FAILURE!!');
            });
        },
    },
}
</script>
