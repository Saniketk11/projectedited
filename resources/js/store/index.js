import Vue from 'vue'

import Vuex from 'vuex'

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        isHome: true, step: null, properties: {
            apartment: {
                show: false
            }, house: {
                show: false
            }, multi_apartment_house: {
                show: false
            }, business: {
                show: false
            }, property: {
                show: false
            }
        },

        values: {
            type: '',
            surface: '',
            construction_year: '',
            room: '',
            is_leasehold: 1,
            is_declaration_of_division: 1,
            is_development_possible: 1,
            floor_plans: {},
            floor_plans_count: 0,
            photos: {},
            photos_count: 0,
            attachments: {},
            attachments_count: 0,
            comment: '',
            state: '',
            postal_code: '',
            address: '',
            price: '',
            phone_number: '',
            email: '',
            floors: '',
            apartment_count: ''
        },
    },

    mutations: {
        UPDATE_IS_HOME(state, data) {
            state.isHome = data;
        },

        UPDATE_PROPERTY(state, data) {
            state.properties[data].show = true;
        },

        UPDATE_STEP(state, data) {
            state.step = data;
        },

        UPDATE_ALL_PROPERTIES(state) {
            for (const [key] of Object.entries(state.properties)) {
                state.properties[key].show = false;
            }

            for (const [key] of Object.entries(state.values)) {
                if (key === 'is_leasehold' || key === 'is_declaration_of_division' || key === 'is_development_possible') {
                    state.values[key] = 1;
                } else {
                    state.values[key] = '';
                }

                if (key === 'floor_plans') {
                    state.values['floor_plans'] = {};
                    state.values['floor_plans_count'] = 0;
                }

                if (key === 'photos') {
                    state.values['photos'] = {};
                    state.values['photos_count'] = 0;
                }

                if (key === 'attachments') {
                    state.values['attachments'] = {};
                    state.values['attachments_count'] = 0;
                }
            }

            state.step = null;
            state.isHome = true;
        },

        UPDATE_VALUE(state, data) {
            state.values[data['type']] = data['value'];

            if (data['type'] === 'floor_plans') {
                state.values.floor_plans_count = data['value'].length;
            }

            if (data['type'] === 'photos') {
                state.values.photos_count = data['value'].length;
            }

            if (data['type'] === 'attachments') {
                state.values.attachments_count = data['value'].length;
            }
        }
    },

    actions: {},

    getters: {
        IS_HOME(state) {
            return state.isHome
        },

        PROPERTIES(state) {
            return state.properties
        },

        STEP(state) {
            return state.step
        },

        VALUES(state) {
            return state.values
        }

    }
});
