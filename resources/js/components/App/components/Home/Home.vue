<template>
    <div class="page-container md-layout-column">
        <toolbar :type="'Home'" @left="showNavigation = true" @right="showSidepanel = true"/>
        <left-nav :show.sync="showNavigation" :authorized="isLoggedIn"/>
        <right-nav :show.sync="showSidepanel" :authorized="isLoggedIn"/>
        <md-content>
            <ad-list :type="'Home'"
                     @showAd="showAd(ad)"
                     @createAd="createAd()"
                     @updateAd="updateAd(ad)"
            />
        </md-content>
        <ad-modal :type="type" :ad="ad"/>
    </div>
</template>

<script>
    import LeftNav from "../../../commom/navs/LeftNav";
    import RightNav from "../../../commom/navs/RightNav";
    import Toolbar from "../../../commom/toolbar/Toolbar";
    import AdList from "../../../commom/adList/AdList";
    import auth from "../../../../services/auth";
    import AdModal from '../../../commom/adModal/adModal';

    export default {
        name: 'Home',
        components: {
            AdList,
            RightNav,
            LeftNav,
            Toolbar,
            AdModal
        },
        data() {
            return {
                showNavigation: false,
                showSidepanel: false,
                isLoggedIn: auth.check(),
                ad: {},
                type: 'show'
            }
        },
        methods: {
            showAd(ad) {
                this.ad = ad;
                this.type = 'show';
                this.$modal.show('adModal')
            },
            createAd() {
                this.type = 'create';
                this.$modal.show('adModal')
            },
            updateAd(ad) {
                this.ad = ad;
                this.type = 'update';
                this.$modal.show('adModal')
            }
        }
    }
</script>

<style lang="scss">

</style>
