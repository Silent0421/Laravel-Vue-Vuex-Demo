<template>
    <div class="page-container md-layout-column">
        <toolbar @left="showNavigation = true" @right="showSidepanel = true"/>
        <left-nav :show.sync="showNavigation" :authorized="isLoggedIn"/>
        <right-nav :show.sync="showSidepanel" :authorized="isLoggedIn"/>
        <md-content>
            <ad-list :type="'Welcome'"/>
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
