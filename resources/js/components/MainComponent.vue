<template>
    <div class="my-container">
        <home-component v-if="IS_HOME"></home-component>

        <apartment-component v-if="PROPERTIES.apartment.show && STEP === 1"></apartment-component>

        <house-component v-if="PROPERTIES.house.show && STEP === 1"></house-component>

        <multi-apartment-house-component
            v-if="PROPERTIES.multi_apartment_house.show && STEP === 1"></multi-apartment-house-component>

        <business-component v-if="PROPERTIES.business.show && STEP === 1"></business-component>

        <property-component v-if="PROPERTIES.property.show && STEP === 1"></property-component>

        <file-component v-if="STEP === 2"></file-component>

        <address-component v-if="STEP === 3"></address-component>

        <contact-component v-if="STEP === 4"></contact-component>
    </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    components: {},

    mounted() {

    },

    computed: {
        ...mapGetters([
            'IS_HOME',
            'PROPERTIES',
            'STEP'
        ]),
    }
}
</script>
