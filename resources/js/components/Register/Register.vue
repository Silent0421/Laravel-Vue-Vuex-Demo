<template>
    <modal name="register" :adaptive="true" :draggable="false" transition="slide-fade-y"
    :pivotX="0.5" :reset="true" :pivotY="0.1" :clickToClose='false' height="auto"
    :scrollable="true" :delay="300" :width="modalWidth" class="modal-register">
        <div class="content">
            <div class="register">
                <router-link :to="LoginComponent.config().redirectPath">
                    {{LoginComponent.config().name}}
                </router-link>
            </div>
            <div class="caption">
                Register
            </div>
            <span v-show="backendErrors.error" class="common-error">
                <strong>{{backendErrors.name}}</strong>
            </span>
            <form novalidate @submit.stop.prevent="submit" @keyup.enter="submit">
                <md-field md-theme="default"
                          :class="{'md-invalid': backendErrors.name || $validator.errors.has('name')}">

                    <label class="input-label md-body-1">NAME</label>
                    <md-input v-validate="'required'" data-vv-name="name" v-model="name"></md-input>

                    <span v-show="backendErrors.name" class="md-error">
                        <strong>{{backendErrors.name}}</strong>
                    </span>
                    <span class="md-error">
                        <strong>{{ $validator.errors.first('name') }}</strong>
                    </span>

                </md-field>

                <md-field md-theme="default"
                          :class="{'md-invalid': backendErrors.email || $validator.errors.has('email')}">

                    <label class="input-label md-body-1">EMAIL ADDRESS</label>
                    <md-input v-validate="'required|email'" data-vv-name="email" v-model="email"></md-input>

                    <span v-show="backendErrors.email" class="md-error">
                        <strong>{{backendErrors.email}}</strong>
                    </span>
                    <span class="md-error">
                        <strong>{{ $validator.errors.first('email') }}</strong>
                    </span>

                </md-field>

                <md-field md-theme="default" md-has-password
                          :class="['pass',{'md-invalid': backendErrors.password || $validator.errors.has('password')}]">
                    <label class="input-label md-body-1">PASSWORD</label>
                    <md-input v-validate="'required'" data-vv-name="password" type="password" ref="password"
                              autocomplete="off" v-model="password">
                    </md-input>

                    <span v-show="backendErrors.password" class="md-error">
                        <strong>{{backendErrors.password}}</strong>
                    </span>
                    <span v-show="$validator.errors.has('password')" class="md-error">
                        <strong>{{ $validator.errors.first('password') }}</strong>
                    </span>
                </md-field>

                <md-field md-theme="default" md-has-password
                          :class="['pass',{'md-invalid': backendErrors.confirmPassword || $validator.errors.has('confirmPassword')}]">
                    <label class="input-label md-body-1">CONFIRM PASSWORD</label>
                    <md-input v-validate="'required|confirmed:password'" data-vv-name="confirmPassword" type="password" data-vv-as="password"
                              autocomplete="off" v-model="confirmPassword">
                    </md-input>

                    <span v-show="backendErrors.confirmPassword" class="md-error">
                        <strong>{{backendErrors.confirmPassword}}</strong>
                    </span>
                    <span v-show="$validator.errors.has('confirmPassword')" class="md-error">
                        <strong>{{ $validator.errors.first('confirmPassword') }}</strong>
                    </span>
                </md-field>
            </form>
            <md-button @click="submit()" :disabled="!validate()" class="btn">
                REGISTER
            </md-button>
        </div>
    </modal>
</template>

<script>
    import LoginComponent from "../Login";
    import AppComponent from "../App";
    import Auth from '../../services/auth';

    export default {
        data() {
            return {
                name: '',
                email: '',
                password: '',
                confirmPassword: '',
                backendErrors: {},
                LoginComponent
            }
        },
        computed: {
            modalWidth() {
                return document.body.clientWidth > 350 ? 350 : document.body.clientWidth - 40;
            }
        },
        mounted() {
            this.$modal.show('register')
        },
        methods: {
            submit() {
                if (!this.validate()) return;
                Auth.register(this.name, this.email, this.password, this.confirmPassword).then(
                    () => {
                        this.$router.push(AppComponent.config().redirectPath);
                    },
                    (x) => {
                        if (x.errors?.name) {
                            this.$set(this.backendErrors, 'name', x.errors.name[0]);
                        } else if (x.errors?.email) {
                            this.$set(this.backendErrors, 'password', x.errors.email[0]);
                        } else if (x.errors?.password) {
                            this.$set(this.backendErrors, 'password', x.errors.password[0]);
                        } else if (x.errors?.confirmPassword) {
                            this.$set(this.backendErrors, 'confirmPassword', x.errors.confirmPassword[0]);
                        }else {
                            this.$set(this.backendErrors, 'error', x.error);
                        }
                    }
                );
            },
            validate() {
                return !(
                    this.$validator.errors.any()
                    || !this.name
                    || !this.email
                    || !this.password
                    || !this.confirmPassword
                    || this.password !== this.confirmPassword
                )
            }
        },
        beforeRouteEnter(to, from, next) {
            if(Auth.getUser()) {
                next(AppComponent.config().redirectPath)
            } else {
                next()
            }
        },
        watch: {
            name() {
                this.backendErrors = {}
            },
            email() {
                this.backendErrors = {}
            },
            password() {
                this.backendErrors = {}
            },
            confirmPassword() {
                this.backendErrors = {}
            }
        }
    }
</script>

<style lang="scss">
    .modal-register.v--modal-overlay.scrollable {
        padding-bottom: 50px;
    }

    .modal-register {
        .content {
            margin: 10px 25px 25px 20px;

            .register {
                font-size: 10pt;
                line-height: 16px;
                margin-bottom: 50px;
                font-weight: 600;
                text-decoration: underline;
                a {
                    color: black;
                }
            }

            .caption {
                text-align: center;
                font-size: 16pt;
                line-height: 20px;
                font-weight: 800;
                color: black;
                margin-bottom: 20px;
            }

            .input-label {
                font-size: 9pt;
                line-height: 20px;
                font-weight: 800;
            }

            .md-input {
                font-size: 16pt;
                line-height: 20px;
            }

            .md-field .md-error, .md-field .md-count {
                line-height: 20px;
            }

            .md-field label {
                color: black;
            }

            .pass {
                .md-input {
                    padding-left: 40px;
                }
                .md-toggle-password {
                    right: auto;
                    left: 0;
                    bottom: -7px;
                }
                &.md-has-value label, &.md-input-focused label {
                    left: 0;
                }
                label {
                    left: 40px;
                }
            }
        }

        .btn {
            font-size: 10pt;
            width: 100%;
            margin: 0;
            padding: 0;
            background-color: lightgray;
            font-weight: 700;
            border-radius: 4px;
            height: 40px;
        }

        .v--modal {
            border-radius: 6px;
        }
    }
</style>
