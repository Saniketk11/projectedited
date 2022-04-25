<template>
    <div>

        <step-header-component progress="50"></step-header-component>
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
                        Sind Fotos, Grundrisse oder andere Dokumente vorhanden?
                    </div>
                </div>

                <div class="steps__inner">
                    <div class="form-group form__group">
                        <label class="file__control" for="floorPlan">
                            <span class="choose-file">Grundrisse</span>
                            <span class="choose-count">
                                {{ VALUES.floor_plans_count === 0 ? 'Wähle Dateien' :
                                VALUES.floor_plans_count === 1 ? `${VALUES.floor_plans_count} Anhang` : `${VALUES.floor_plans_count} Anhänge` }}
                            </span>
                            <input id="floorPlan" name="floor_plans[]"
                                   accept="image/jpeg,image/gif,image/png,image/jpg,application/pdf"
                                   hidden
                                   @change="previewFiles($event.target.files, 'floor_plans')"
                                   multiple
                                   type="file"
                                   class="form__file">
                        </label>
                    </div>

                    <div class="form-group form__group">
                        <label class="file__control" for="photo">
                            <span class="choose-file">Fotos</span>
                            <span class="choose-count">
                                {{ VALUES.photos_count === 0 ? 'Wähle Dateien' :
                                VALUES.photos_count === 1 ? `${VALUES.photos_count} Anhang` : `${VALUES.photos_count} Anhänge` }}
                            </span>
                            <input id="photo" name="photos[]"
                                   accept="image/jpeg,image/gif,image/png,image/jpg"
                                   hidden
                                   @change="previewFiles($event.target.files, 'photos')"
                                   multiple
                                   type="file"
                                   class="form__file">
                        </label>
                    </div>

                    <div class="form-group form__group">
                        <label class="file__control" for="file">
                            <span class="choose-file">Anhänge</span>
                            <span class="choose-count">
                                {{ VALUES.attachments_count === 0 ? 'Wähle Dateien' :
                                VALUES.attachments_count === 1 ? `${VALUES.attachments_count} Anhang` : `${VALUES.attachments_count} Anhänge` }}
                            </span>
                            <input id="file" name="attachments[]"
                                   hidden
                                   @change="previewFiles($event.target.files, 'attachments')"
                                   multiple
                                   type="file"
                                   class="form__file">
                        </label>
                    </div>

                    <div class="form-group form__group">
                        <textarea class="form-control form__control form__control--textarea"
                                  placeholder="kommentar" cols="30" rows="10" @keyup="setValue('comment', $event.target.value)">{{ VALUES.comment }}</textarea>
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
    methods: {
        ...mapMutations([
            'UPDATE_STEP',
            'UPDATE_ALL_PROPERTIES',
            'UPDATE_VALUE'
        ]),

        previewFiles(files, type) {
            this.UPDATE_VALUE({
                type: type,
                value: files
            })
        },

        prevStep() {
            this.UPDATE_STEP(1);
        },

        goHome() {
            this.UPDATE_ALL_PROPERTIES();
        },

        setValue(type, value) {
            this.UPDATE_VALUE({
                type,
                value : value.trim()
            })
        },

        nextStep() {
            this.UPDATE_STEP(3);
        }
    },

    computed: {
        ...mapGetters([
            'VALUES',
        ]),
    }
}
</script>
