import RegisterComponent from './Register'

const MAIN_PATH = '/register';
const NAME = 'Go to Register';

export default {
    registerRoutes(routes) {
        routes.push({
            path: '/register',
            component: RegisterComponent
        });
    },
    config() {
        return {
            redirectTo: MAIN_PATH,
            name: NAME
        }
    }
}
