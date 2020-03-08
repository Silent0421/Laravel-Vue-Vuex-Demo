<template>
    <div class="page-container md-layout-column">
        <toolbar @left="showNavigation = true" @right="showSidepanel = true"/>
        <left-nav :show.sync="showNavigation" :authorized="isLoggedIn"/>
        <right-nav :show.sync="showSidepanel" :authorized="isLoggedIn"/>
        <md-content>
            <ad-list :type="'Home'"/>
        </md-content>
    </div>
</template>

<script>
    import LeftNav from "../../../commom/navs/LeftNav";
    import RightNav from "../../../commom/navs/RightNav";
    import Toolbar from "../../../commom/toolbar/Toolbar";
    import AdList from "../../../commom/adList/AdList";
    import auth from "../../../../services/auth";

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
            showSidepanel: false,
            isLoggedIn: auth.check()
        }),
    }
</script>

<style lang="scss">

</style>
