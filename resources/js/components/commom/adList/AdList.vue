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
            <md-table-row v-for="(ad, index) in this.ads" :key="ad.id" @click="showAd(ad)">
                <md-table-cell md-numeric>{{index + 1}}</md-table-cell>
                <md-table-cell>{{ad.title}}</md-table-cell>
                <md-table-cell>{{ad.description}}</md-table-cell>
                <md-table-cell>{{ad.category.name}}</md-table-cell>
                <md-table-cell>{{ad.sub_category ? ad.sub_category.name : '-'}}</md-table-cell>
                <md-table-cell>{{ad.state}}</md-table-cell>
                <md-table-cell>{{ad.price}}</md-table-cell>
                <md-table-cell v-if="type === 'Home'">
                    <md-button class="md-icon-button md-primary" @click.stop.prevent="updateAd(ad)">
                        <md-icon>edit</md-icon>
                    </md-button>
                </md-table-cell>
                <md-table-cell v-if="type === 'Home'">
                    <md-button class="md-icon-button md-accent" @click.stop.prevent="deleteAd(ad)">
                        <md-icon>delete</md-icon>
                    </md-button>
                </md-table-cell>
            </md-table-row>
        </md-table>
        <md-empty-state
            v-if="showEmpty"
            md-icon="devices_other"
            md-label="No Ads"
            md-description="There is no available ads. You can create a new one.">
        </md-empty-state>
        <md-button class="md-primary md-right" @click="createAd()" v-if="type === 'Home'">Create ad</md-button>
    </div>
</template>

<script>
    import Ad from '../../../services/ad';
    import Auth from '../../../services/auth';

    export default {
        name: "AdList",
        data() {
            return {
                ads: [],
                showEmpty: false
            }
        },
        props: ['type', 'ad'],
        updated() {
            this.ads.length === 0 ? this.showEmpty = true : this.showEmpty = false
        },
        async mounted() {
            try {
                const user = await Auth.getUser();
                this.ads = (this.type === 'Home') ?
                    await Ad.getUserAds(user.id) :
                    await Ad.getAllAds();
            } catch (e) {
                this.ads = [];
            }
        },
        methods: {
            showAd(ad) {
                this.$emit('showAd', ad)
            },
            updateAd(ad) {
                this.$emit('updateAd', ad)
            },
            createAd() {
                this.$emit('createAd')
            },
            deleteAd(ad) {
                Ad.deleteAd(ad.id).then(() => {
                    this.ads = this.ads.filter((item) => ad.id !== item.id)
                })
            }
        },
        watch: {
            ad(val) {
                if (!val.id) {
                    this.ads.push(val);
                } else {
                    const index = this.ads.indexOf(this.ads.find(ad => ad.id === val.id));
                    this.$set(this.ads, index, val)
                }
            }
        }
    }
</script>

<style lang="scss">

</style>
