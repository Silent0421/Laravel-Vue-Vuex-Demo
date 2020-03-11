import TestVuex from "./TestVuex";

const MAIN_PATH = '/vuex';
const NAME = 'vuex';

export default {
    registerRoutes(routes) {
        routes.push({
            path: '/vuex',
            component: TestVuex
        })
    },
    config() {
        return {
            redirectPath: MAIN_PATH,
            name: NAME
        }
    }
}
