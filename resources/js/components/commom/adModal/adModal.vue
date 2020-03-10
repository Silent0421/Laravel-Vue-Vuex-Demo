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
                    <md-input v-validate="'required|email'" data-vv-name="email" v-model="description"/>

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
                    <md-input v-validate="'required'" data-vv-name="price" data-vv-as="price"
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
        async mounted() {
            try {
                this.categories = await Ad.getCategories();
            } catch(e) {
                console.log(e);
                this.categories = [];
            }
        },
        computed: {
            modalWidth() {
                return document.body.clientWidth > 350 ? 350 : document.body.clientWidth - 40;
            },
        },
        methods: {
            validate() {
                return !(
                    !this.title
                    || !this.description
                    || !this.state
                    || !this.price
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
                    Ad.createAd(ad).then(() => {
                        this.$emit('created', ad);
                    }).catch(e => {
                        console.log(e)
                    })
                } else {
                    Ad.updateAd(ad).then(() => {
                        this.$emit('updated', ad);
                    }).catch(e => {
                        console.log(e)
                    })
                }
                this.$emit('created', ad);
                this.$modal.hide('adModal')
            },
            hide() {
                this.$modal.hide('adModal')
            },
            async categorySelected(val) {
                try {
                    console.log(val)
                    this.subCategories = await Ad.getSubCategories(val);
                } catch(e) {
                    console.log(e);
                    this.subCategories = [];
                }
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
