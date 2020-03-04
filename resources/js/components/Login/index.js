import LoginComponent from "./Login";

const MAIN_PATH = '/login';
const NAME = 'Go To Login';

export default {
    registerRoutes(routes) {
        routes.push({
            path: '/login',
            component: LoginComponent
        })
    },
    config() {
        return {
            redirectPath: MAIN_PATH,
            name: NAME
        }
    }
}
