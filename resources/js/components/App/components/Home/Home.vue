<template @left="test">
    <div class="page-container md-layout-column">
        <toolbar @left="showNavigation = true" @right="showSidepanel = true"></toolbar>
<!--        <md-toolbar class="md-primary">-->
<!--            <md-button class="md-icon-button" @click="showNavigation = true">-->
<!--                <md-icon>menu</md-icon>-->
<!--            </md-button>-->
<!--            <span class="md-title">My Ads</span>-->

<!--            <div class="md-toolbar-section-end">-->
<!--                <md-button class="md-icon-button" @click="showSidepanel = true">-->
<!--                    <md-icon>more_vert</md-icon>-->
<!--                </md-button>-->
<!--            </div>-->
<!--        </md-toolbar>-->
        <left-nav :show.sync="showNavigation" ></left-nav>
        <right-nav :show.sync="showSidepanel"></right-nav>
        <md-content>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error quibusdam, non molestias et! Earum magnam, similique, quo recusandae placeat dicta asperiores modi sint ea repudiandae maxime? Quae non explicabo, neque.
        </md-content>
    </div>
</template>

<script>
    import LeftNav from "../../../commom/navs/LeftNav";
    import RightNav from "../../../commom/navs/RightNav";
    import Toolbar from "../../../commom/toolbar/Toolbar";

    export default {
        name: 'Home',
        components: {
            RightNav,
            LeftNav,
            Toolbar
        },
        data: () => ({
            showNavigation: false,
            showSidepanel: false
        }),
        methods: {
        }
    }
</script>

<style scoped>

</style>
