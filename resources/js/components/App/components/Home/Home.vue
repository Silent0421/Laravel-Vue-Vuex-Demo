<template>
    <div class="page-container md-layout-column">
        <toolbar @left="showNavigation = true" @right="showSidepanel = true"></toolbar>
        <left-nav :show.sync="showNavigation"></left-nav>
        <right-nav :show.sync="showSidepanel"></right-nav>
        <md-content>
            <ad-list :type="'Home'"></ad-list>
        </md-content>
    </div>
</template>

<script>
    import LeftNav from "../../../commom/navs/LeftNav";
    import RightNav from "../../../commom/navs/RightNav";
    import Toolbar from "../../../commom/toolbar/Toolbar";
    import AdList from "../../../commom/adList/AdList";

    export default {
        name: 'Home',
        components: {
            AdList,
            RightNav,
            LeftNav,
            Toolbar
        },
        data: () => ({
            showNavigation: false,
            showSidepanel: false
        }),
    }
</script>

<style lang="scss">

</style>
