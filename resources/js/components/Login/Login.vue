<template>
    <modal name="login" :adaptive="true" :draggable="false" transition="slide-fade-y"
           :pivotX="0.5" :reset="true" :pivotY="0.1" :clickToClose='false' height="auto"
           :scrollable="true" :delay="300" :width="modalWidth" class="modal-login">
        <div class="content">
            <div class="login">
                <router-link :to="RegisterComponent.config().redirectTo">
                    {{RegisterComponent.config().name}}
                </router-link>
            </div>
            <div class="caption">
                Login
            </div>
            <span v-show="backendErrors.error" class="common-error">
                <strong>{{backendErrors.error}}</strong>
            </span>
            <form v-if="!recoveryStatus" novalidate @submit.stop.prevent="submit" @keyup.enter="submit">
                <md-field md-theme="default"
                                    :class="{'md-invalid': backendErrors.email || $validator.errors.has('email')}">

                    <label class="input-label md-body-1">EMAIL ADDRESS</label>
                    <md-input v-validate="'required|email'" data-vv-name="email" v-model="email"/>

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
                    <md-input v-validate="'required'" data-vv-name="password" type="password"
                              autocomplete="off" v-model="password">
                    </md-input>

                    <span v-show="backendErrors.password" class="md-error">
                        <strong>{{backendErrors.password}}</strong>
                    </span>
                    <span v-show="$validator.errors.has('password')" class="md-error">
                        <strong>{{ $validator.errors.first('password') }}</strong>
                    </span>

                </md-field>
                <a class="forgot-pass" href="#" @click.prevent="recoveryStatus = !recoveryStatus">
                    Forgot Password?
                </a>
            </form>
            <form v-if="recoveryStatus" novalidate @submit.stop.prevent="recovery" @keyup.enter="recovery">
                <md-field md-theme="default"
                                    :class="{'md-invalid': backendErrors.email || $validator.errors.has('email')}">

                    <label class="input-label md-body-1">EMAIL ADDRESS</label>

                    <md-input v-validate="'required|email'" data-vv-name="email" v-model="email"/>

                    <span v-show="backendErrors.email" class="md-error">
                        <strong>{{backendErrors.email}}</strong>
                    </span>
                    <span v-show="$validator.errors.has('email')" class="md-error">
                        <strong>{{ $validator.errors.first('email') }}</strong>
                    </span>

                </md-field>
                <a class="forgot-pass" href="#" @click.prevent="recoveryStatus = !recoveryStatus">
                    Login
                </a>
            </form>
            <md-button v-if="!recoveryStatus" @click="submit()" :disabled="!validate()" class="btn">
                LOG IN
            </md-button>
            <md-button v-if="recoveryStatus" @click="recovery()" :disabled="!email" class="btn">
                Recovery password
            </md-button>
        </div>
    </modal>
</template>

<script>
    import RegisterComponent from '../Register';
    import Auth from '../../services/auth';
    import AppComponent from "../App";

    export default {
        data() {
            return {
                email: '',
                password: '',
                backendErrors: {},
                recoveryStatus: false,
                RegisterComponent,
                AppComponent
            }
        },
        computed: {
            modalWidth() {
                return document.body.clientWidth > 350 ? 350 : document.body.clientWidth - 40;
            }
        },
        mounted() {
            this.$modal.show('login');
        },
        methods: {
            submit() {
                if (!this.validate()) return;
                Auth.login(this.email, this.password).then(
                    () => {
                        this.$router.push(AppComponent.config().redirectPath);
                    },
                    (x) => {
                        if (x.errors?.email) {
                            this.$set(this.backendErrors, 'password', x.errors.email[0]);
                        } else if (x.errors?.password) {
                            this.$set(this.backendErrors, 'password', x.errors.password[0]);
                        } else {
                            this.$set(this.backendErrors, 'error', x.error);
                        }
                    }
                );
            },
            recovery() {

            },
            validate() {
                return !(
                    this.$validator.errors.any()
                    || !this.email
                    || !this.password
                    || this.backendErrors.email
                    || this.backendErrors.password
                )
            }
        },
        watch: {
            email() {
                this.backendErrors = {};
            },
            password() {
                this.backendErrors = {};
            }
        },
        beforeRouteEnter(to, from, next) {
            if(Auth.getUser()) {
                next(AppComponent.config().redirectPath)
            } else {
                next()
            }
        },
    }
</script>

<style lang="scss">
    .common-error {
        color:red;
    }

    .modal-login.v--modal-overlay.scrollable {
        padding-bottom: 50px;
    }

    .modal-login {
        .content {
            margin: 10px 25px 25px 20px;

            .login {
                font-size: 10pt;
                line-height: 16px;
                margin-bottom: 50px;
                font-weight: 600;
                text-decoration: underline;
                a {
                    color: black;
                }
            }
            .forgot-pass {
                font-size: 9pt;
                line-height: 12px;
                text-decoration: underline !important;
                color: black;
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
