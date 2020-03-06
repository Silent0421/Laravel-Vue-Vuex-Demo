<template>
    <div class="page-container md-layout-column">
        <toolbar @left="showNavigation = true" @right="showSidepanel = true"></toolbar>
        <left-nav :show.sync="showNavigation" :authorized="isLoggedIn"></left-nav>
        <right-nav :show.sync="showSidepanel" :authorized="isLoggedIn"></right-nav>
        <md-content>
            <ad-list :type="'Welcome'"></ad-list>
        </md-content>
    </div>
</template>

<script>
    import Toolbar from "../commom/toolbar/Toolbar";
    import LeftNav from "../commom/navs/LeftNav";
    import RightNav from "../commom/navs/RightNav";
    import AdList from "../commom/adList/AdList";
    import auth from "../../services/auth";

    export default {
        name: "Welcome",
        components: {
            Toolbar,
            LeftNav,
            RightNav,
            AdList
        },
        data() {
            return {
                showNavigation: false,
                showSidepanel: false,
                isLoggedIn: auth.check()
            }
        }
    }
</script>

<style scoped>

</style>
