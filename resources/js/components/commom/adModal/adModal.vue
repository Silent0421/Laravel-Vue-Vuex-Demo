<template>
    <modal name="adModal" :adaptive="true" :draggable="false" transition="slide-fade-y"
           :pivotX="0.5" :reset="true" :pivotY="0.1" :clickToClose='false' height="auto"
           :scrollable="true" :delay="300" :width="modalWidth" class="modal-register">
        <div class="content" v-if="type === 'create' || type === 'update'">
            <div class="caption" v-if="type === 'create'">
                Create Ad
            </div>
            <div class="caption" v-else>
                Update Ad
            </div>
            <span v-show="backendErrors.error" class="common-error">
                <strong>{{backendErrors.name}}</strong>
            </span>
            <form novalidate @submit.stop.prevent="submit" @keyup.enter="submit">
                <md-field md-theme="default"
                          :class="{'md-invalid': backendErrors.title || $validator.errors.has('title')}">

                    <label class="input-label md-body-1">Title</label>
                    <md-input v-validate="'required'" data-vv-name="title" v-model="title"/>

                    <span v-show="backendErrors.title" class="md-error">
                        <strong>{{backendErrors.title}}</strong>
                    </span>
                    <span class="md-error">
                        <strong>{{ $validator.errors.first('title') }}</strong>
                    </span>

                </md-field>

                <md-field md-theme="default"
                          :class="{'md-invalid': backendErrors.description || $validator.errors.has('description')}">

                    <label class="input-label md-body-1">Description</label>
                    <md-input v-validate="'required'" data-vv-name="email" v-model="description"/>

                    <span v-show="backendErrors.description" class="md-error">
                        <strong>{{backendErrors.description}}</strong>
                    </span>
                    <span class="md-error">
                        <strong>{{ $validator.errors.first('description') }}</strong>
                    </span>

                </md-field>

                <md-field md-theme="default"
                          :class="{'md-invalid': backendErrors.category || $validator.errors.has('category')}">
                    <label class="input-label md-body-1" >Category</label>
                    <md-select v-validate="'required'" data-vv-name="category" v-model="category" name="category" @md-selected="categorySelected($event)">
                        <md-option v-for="category in categories" :key="category.id" :value="category.id">{{category.name}}</md-option>
                    </md-select>
                </md-field>

                <md-field md-theme="default"
                          :class="{'md-invalid': backendErrors.subCategory || $validator.errors.has('subCategory')}">
                    <label class="input-label md-body-1">Sub Category</label>
                    <md-select v-validate="'required'" data-vv-name="subCategory" v-model="subCategory" name="SubCategory">
                        <md-option v-for="subCategory in subCategories" :key="subCategory.id" :value="subCategory.id">{{subCategory.name}}</md-option>
                    </md-select>
                </md-field>

                <md-field md-theme="default"
                          :class="{'md-invalid': backendErrors.state || $validator.errors.has('state')}">
                    <label class="input-label md-body-1">State</label>
                    <md-input v-validate="'required'" data-vv-name="state"
                              autocomplete="off" v-model="state">
                    </md-input>

                    <span v-show="backendErrors.state" class="md-error">
                        <strong>{{backendErrors.state}}</strong>
                    </span>
                    <span v-show="$validator.errors.has('state')" class="md-error">
                        <strong>{{ $validator.errors.first('state') }}</strong>
                    </span>
                </md-field>

                <md-field md-theme="default"
                          :class="{'md-invalid': backendErrors.price || $validator.errors.has('price')}">
                    <label class="input-label md-body-1">Price</label>
                    <md-input v-validate="'required'" data-vv-name="price"
                              autocomplete="off" v-model="price">
                    </md-input>

                    <span v-show="backendErrors.price" class="md-error">
                        <strong>{{backendErrors.price}}</strong>
                    </span>
                    <span v-show="$validator.errors.has('price')" class="md-error">
                        <strong>{{ $validator.errors.first('price') }}</strong>
                    </span>
                </md-field>
            </form>
            <md-button @click="submit()" :disabled="!validate()" class="btn" v-if="type === 'create'">
                CREATE
            </md-button>
            <md-button @click="submit()" :disabled="!validate()" class="btn" v-if="type === 'update'">
                UPDATE
            </md-button>
            <md-button @click="hide()" class="btn lower-back">
                BACK
            </md-button>
        </div>
        <div class="content" v-if="type === 'show'">
            <div class="caption">
                Show Ad
            </div>
            <div class="adOption">
                Title: {{ad.title}}
            </div>
            <div>
                Description: {{ad.description}}
            </div>
            <div>
                Category: {{ad.category ? ad.category.name : '-'}}
            </div>
            <div>
                Sub Category: {{ad.sub_category ? ad.sub_category.name : '-'}}
            </div>
            <div>
                State: {{ad.state}}
            </div>
            <div>
                Price: {{ad.price}}
            </div>
            <md-button @click="hide()" class="btn">
                BACK
            </md-button>
        </div>
    </modal>
</template>compTy

<script>
    import Ad from '../../../services/ad';

    export default {
        name: "adModal",
        data() {
            return {
                title: '',
                description: '',
                state: '',
                price: '',
                category: 0,
                subCategory: 0,
                backendErrors: {},
                categories: [],
                subCategories: [],
            }
        },
        props: ['type', 'ad'],
        mounted() {
            Ad.getCategories().then(res => {
                this.categories = res;
            });
        },
        computed: {
            modalWidth() {
                return document.body.clientWidth > 350 ? 350 : document.body.clientWidth - 40;
            },
        },
        methods: {
            validate() {
                return !(
                    this.$validator.errors.any()
                    || !this.title
                    || !this.description
                    || !this.state
                    || !this.price
                    || this.backendErrors.title
                    || this.backendErrors.description
                    || this.backendErrors.state
                    || this.backendErrors.price
                )
            },
            submit() {
                const ad = {
                    'id': this.ad?.id,
                    'title': this.title,
                    'description': this.description,
                    'state': this.state,
                    'price': this.price,
                    'category_id': this.category,
                    'sub_category_id': +this.subCategory !== 0 ? this.subCategory : null,
                    'category': this.categories.find(cat => cat.id === +this.category),
                    'sub_category': this.subCategories.find(cat => cat.id === +this.subCategory)
                };
                if (this.type === 'create') {
                    Ad.createAd(ad).then((res) => {
                        ad.new_id = res.id;
                        this.$emit('created_updated', ad);
                        this.$modal.hide('adModal')
                    }).catch(e => {
                        this.updateBackendErrors(e)
                    })
                } else {
                    Ad.updateAd(ad).then(() => {
                        this.$emit('created_updated', ad);
                        this.$modal.hide('adModal')
                    }).catch(e => {
                        this.updateBackendErrors(e)
                    })
                }
            },
            hide() {
                this.$modal.hide('adModal')
            },
            updateBackendErrors(e) {

                if (e.errors?.title) {
                    this.$set(this.backendErrors, 'title', e.errors.title[0]);
                }
                if (e.errors?.description) {
                    this.$set(this.backendErrors, 'description', e.errors.description[0]);
                }
                if (e.errors?.state) {
                    this.$set(this.backendErrors, 'state', e.errors.state[0]);
                }
                if (e.errors?.price) {
                    this.$set(this.backendErrors, 'price', e.errors.price[0]);
                }
                if(!e.errors)
                {
                    this.$set(this.backendErrors, 'error', e.error);
                }
            },
            categorySelected(val) {
                this.subCategories = [];
                Ad.getSubCategories(val).then(res => {
                    this.subCategories = res;
                });
            }
        },
        watch: {
            title() {
                this.backendErrors = {}
            },
            description() {
                this.backendErrors = {}
            },
            state() {
                this.backendErrors = {}
            },
            price() {
                this.backendErrors = {}
            },
            ad(val) {
                if (_.isEmpty(val)) return;
                this.title = val.title;
                this.description = val.description;
                this.state = val.state;
                this.price = val.price;
                this.category_id = val.category_id;
                this.sub_category_id = val.sub_category_id;
                this.category = val.category.id;
                this.categorySelected(this.category);
                this.subCategory = val.sub_category ? val.sub_category.id : 0;
            }
        }
    }
</script>

<style lang="scss">
    .md-menu-content.md-select-menu {
        z-index: 1000!important;
    }

    .lower-back {
        margin-top: 10px!important;
    }
</style>
