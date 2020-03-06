<template>
    <md-drawer :md-active.sync="showNavigation" md-swipeable>
        <md-toolbar class="md-transparent" md-elevation="0">
            <span class="md-title">My App name</span>
        </md-toolbar>

        <md-list>
            <md-list-item>
                <router-link v-if="authorized" class="md-list-item-link" :to="'/app/home'">My Ads</router-link>
            </md-list-item>
            <md-list-item>
                <router-link class="md-list-item-link" :to="'welcome'">All Ads</router-link>
            </md-list-item>
        </md-list>
    </md-drawer>
</template>

<script>
    export default {
        data() {
            return {
                showNavigation: false,
                // authorized: true
            }
        },
        props: ['show', 'authorized'],
        watch: {
            show(val) {
                this.showNavigation = val;
            },
            showNavigation(val) {
                if(!val) this.$emit('update:show', this.showNavigation)
            }
        },
        methods: {
            getAds() {
                this.$emit('get-ads')
            }
        }
    }
</script>

<style scoped>

</style>
