<template>
    <div class="page-container md-layout-column">
        <toolbar :type="'Welcome'" @left="showNavigation = true" @right="showSidepanel = true"/>
        <left-nav :show.sync="showNavigation" :authorized="isLoggedIn"/>
        <right-nav :show.sync="showSidepanel" :authorized="isLoggedIn"/>
        <md-content>
            <ad-list :type="'Welcome'" @showAd="showAd($event)"/>
        </md-content>
        <ad-modal :type="'show'" :ad="ad"/>
    </div>
</template>

<script>
    import Toolbar from "../commom/toolbar/Toolbar";
    import LeftNav from "../commom/navs/LeftNav";
    import RightNav from "../commom/navs/RightNav";
    import AdList from "../commom/adList/AdList";
    import auth from "../../services/auth";
    import AdModal from '../commom/adModal/adModal';
    import EventBus from "../../services/EventBus";

    export default {
        name: "Welcome",
        components: {
            Toolbar,
            LeftNav,
            RightNav,
            AdList,
            AdModal
        },
        data() {
            return {
                showNavigation: false,
                showSidepanel: false,
                isLoggedIn: auth.check(),
                ad: {}
            }
        },
        mounted() {
            EventBus.$on('login:success', () => { this.isLength = true} );
            EventBus.$on('logout:success', () => { this.isLoggedIn = false} );
        },
        methods: {
            showAd(event) {
                this.ad = event;
                this.$modal.show('adModal')
            }
        }
    }
</script>

<style scoped>

</style>
