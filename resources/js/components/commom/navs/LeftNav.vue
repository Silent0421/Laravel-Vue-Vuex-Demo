<template>
    <md-drawer :md-active.sync="showNavigation" md-swipeable>
        <md-toolbar class="md-transparent" md-elevation="0">
            <span class="md-title">My App name</span>
        </md-toolbar>

        <md-list>
            <md-list-item>
                <span class="md-list-item-text">My Ads</span>
            </md-list-item>
            <md-list-item>
                <span class="md-list-item-text">All Ads</span>
            </md-list-item>
        </md-list>
    </md-drawer>
</template>

<script>
    export default {
        data() {
            return {
                showNavigation: false,
            }
        },
        props: ['show'],
        watch: {
            show(val) {
                this.showNavigation = val;
            },
            showNavigation(val) {
                if(!val) this.$emit('update:show', this.showNavigation)
            }
        },
        methods: {
        }
    }
</script>

<style scoped>

</style>
