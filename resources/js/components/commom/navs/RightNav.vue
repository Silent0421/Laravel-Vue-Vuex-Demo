<template>
    <md-drawer class="md-right" :md-active.sync="showNavigation">
        <md-toolbar class="md-transparent" md-elevation="0">
            <span class="md-title">Actions</span>
        </md-toolbar>

        <md-list>
            <md-list-item v-if="!authorized">
                <md-button class="md-icon-button">
                    <md-icon class="md-primary">log_in</md-icon>
                </md-button>
                <router-link class="md-list-item-text" :to="'/login'">Login</router-link>
            </md-list-item>

            <md-list-item v-if="!authorized">
                <md-button class="md-icon-button">
                    <md-icon class="md-primary">person_add</md-icon>
                </md-button>
                <router-link class="md-list-item-text" :to="'/register'">Register</router-link>
            </md-list-item>

            <md-list-item v-if="authorized">
                <md-button class="md-icon-button">
                    <md-icon class="md-primary">logout</md-icon>
                </md-button>
                <span class="md-list-item-text" @click="logout($event)"><a>Logout</a></span>
            </md-list-item>
        </md-list>
    </md-drawer>
</template>

<script>
    import auth from "../../../services/auth";

    export default {
        data() {
            return {
                showNavigation: false,
            }
        },
        props: ['show', 'authorized'],
        watch: {
            show(val) {
                this.showNavigation = val;
            },
            showNavigation(val) {
                if(!val) this.$emit('update:show', this.showNavigation)
            }
        },
        methods: {
            logout(e) {
                e.preventDefault();
                e.stopPropagation();
                auth.logout();
                this.$router.push('/welcome')
            }
        }
    }
</script>

<style scoped>

</style>
