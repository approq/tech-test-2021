<template>
    <b-container fluid>
        <b-card class="mt-5" bg-variant="light">
            <b-card-body>
                <b-row v-for="law in laws" :key="law.uuid">
                    <b-col cols="12" md="4">
                        <h3>{{law.title}}</h3>
                        <b-list-group v-for="chapter in law.chapters" :key="chapter.uuid" class="mt-1">
                            <b-list-group-item role="button" class="d-flex justify-content-between align-items-center" @click="openChapter(chapter.uuid)">
                                {{chapter.number}}
                                <b-badge variant="primary" pill>
                                    {{ chapter.paragraphs.length }} paragraph{{chapter.paragraphs.length > 1 ? 's' : ''}}
                                </b-badge>
                            </b-list-group-item>
                            <div v-show="chapterOpened === chapter.uuid" class="mt-1 ml-3 mr-3">
                                <b-list-group-item role="button"
                                                   class="d-flex justify-content-between align-items-center"
                                                   v-for="paragraph in chapter.paragraphs" :key="paragraph.uuid"
                                                   @click="openParagraph(paragraph)">
                                    {{paragraph.number}} {{paragraph.title}}
                                </b-list-group-item>
                            </div>
                        </b-list-group>
                    </b-col>
                    <b-col cols="12" md="8" v-if="paragraphOpened">
                       <b-card border-variant="dark"
                               :header="paragraphOpened.title"
                               header-bg-variant="dark"
                               header-text-variant="white">
                           <b-card-text v-for="(subparagraph, index) in paragraphOpened.subparagraphs" :key="index">
                               {{subparagraph}}
                           </b-card-text>
                       </b-card>
                    </b-col>
                </b-row>

                <div class="overflow-auto mt-4">
                    <b-pagination
                        v-model="currentPage"
                        :total-rows="paginateLaws.total"
                        :per-page="1"
                        align="center"
                        @input="changePage(currentPage)"
                        first-text="First"
                        prev-text="Prev"
                        next-text="Next"
                        last-text="Last"/>
                </div>
            </b-card-body>
        </b-card>
    </b-container>
</template>

<script>
import {mapActions, mapGetters} from "vuex"

export default {
    name: "Home.vue",

    data() {
        return {
            currentPage: 1,
            chapterOpened: null,
            paragraphOpened: null
        }
    },

    created() {
      this.changePage();
    },

    computed: {
        ...mapGetters({
            paginateLaws: 'Laws/getLaws',
        }),

        laws() {
            return this.paginateLaws.data;
        }
    },

    methods: {
        ...mapActions({
            getLaws: 'Laws/getLaws',
        }),

        openChapter(uuid) {
            this.chapterOpened = uuid === this.chapterOpened ? null : uuid;
        },

        openParagraph(paragraph) {
            this.paragraphOpened = paragraph;
        },

        changePage(page = 1) {
            this.getLaws(page).then(() => {
                this.chapterOpened = this.laws.length > 0 && this.laws[0].chapters.length ? this.laws[0].chapters[0] : null;
                this.paragraphOpened = this.chapterOpened.paragraphs.length > 0 ? this.chapterOpened.paragraphs[0] : null;
                this.chapterOpened = this.chapterOpened.uuid;
            });
        }
    }
}
</script>
