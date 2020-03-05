<template>
        <router-view></router-view>
</template>

<script>
    export default {
        name: 'App',
        data: () => ({

        })
    }
</script>

<style lang="scss">
    .eco-app {
        height: 100vh;
        overflow: hidden;
        display: flex;
        flex-flow: column;
        -moz-user-select: none; /* Mozilla Firefox */
        -ms-user-select: none; /* Internet Explorer (не поддерживается) */
        -o-user-select: none; /* Opera Presto (не поддерживается) */
        -webkit-user-select: none; /* Google Chrome, Opera Next, Safari */
    }
</style>
