<template>
    <md-toolbar class="md-primary">
        <md-button class="md-icon-button" @click="left">
            <md-icon>menu</md-icon>
        </md-button>

        <span class="md-title" v-if="type === 'Home'">My Ads</span>
        <span class="md-title" v-else>All Ads</span>

        <div class="md-toolbar-section-end">
            <md-button class="md-icon-button" @click="right">
                <md-icon>more_vert</md-icon>
            </md-button>
        </div>
    </md-toolbar>
</template>

<script>
    export default {
        name: "Toolbar",
        props: ['type'],
        methods: {
            left() {
                this.$emit('left')
            },
            right() {
                this.$emit('right')
            }
        }
    }
</script>

<style scoped>

</style>
