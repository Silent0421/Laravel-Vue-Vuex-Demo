<template>
    <md-toolbar class="md-primary">
        <md-button class="md-icon-button" @click="left">
            <md-icon>menu</md-icon>
        </md-button>
        <span class="md-title">My Ads</span>

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
