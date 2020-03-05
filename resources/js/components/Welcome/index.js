import WelcomeComponent from './Welcome'

const MAIN_PATH = '/welcome';
const NAME = 'Welcome';

export default {
    registerRoutes(routes) {
        routes.push({
            path: '/welcome',
            component: WelcomeComponent
        })
    },
    config() {
        return {
            redirectPath: MAIN_PATH,
            name: NAME
        }
    }
}
