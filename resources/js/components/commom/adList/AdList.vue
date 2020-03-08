<template>
    <div>
        <md-table>
            <md-table-row>
                <md-table-head md-numeric>#</md-table-head>
                <md-table-head>Title</md-table-head>
                <md-table-head>Description</md-table-head>
                <md-table-head>Category</md-table-head>
                <md-table-head>Sub Category</md-table-head>
                <md-table-head>State</md-table-head>
                <md-table-head>Price</md-table-head>
            </md-table-row>

            <md-table-row v-for="(ad, index) in this.ads.data" :key="ad.id">
                <md-table-cell md-numeric>{{index + 1}}</md-table-cell>
                <md-table-cell>{{ad.title}}</md-table-cell>
                <md-table-cell>{{ad.description}}</md-table-cell>
                <md-table-cell>{{ad.category.name}}</md-table-cell>
                <md-table-cell>{{ad.sub_category ? ad.sub_category.name : '-'}}</md-table-cell>
                <md-table-cell>{{ad.state}}</md-table-cell>
                <md-table-cell>{{ad.price}}</md-table-cell>
                <md-table-cell v-if="type === 'Home'">
                    <md-button class="md-icon-button md-primary">
                        <md-icon>edit</md-icon>
                    </md-button>
                </md-table-cell>
                <md-table-cell v-if="type === 'Home'">
                    <md-button class="md-icon-button md-accent">
                        <md-icon>delete</md-icon>
                    </md-button>
                </md-table-cell>
            </md-table-row>
        </md-table>
    </div>
</template>

<script>
    import Api from '../../../services/api'
    import Auth from '../../../services/auth'

    export default {
        name: "AdList",
        data() {
            return {
                ads: [],
            }
        },
        props: ['type'],
        async mounted() {
            const user = await Auth.getUser();
            const url = (this.type === 'Home') ? 'api/ads/user/' + user.id : 'api/ads';
            this.ads = await Api.call(url, 'get');
        }
    }
</script>

<style lang="scss">

</style>
