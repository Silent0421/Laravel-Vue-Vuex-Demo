import AppComponent from './App'
import HomeComponent from "./components/Home/index";

const MAIN_PATH = '/app/home';
const NAME = 'App';

export default {
    registerRoutes(routes) {
        const appRoutes = {
            path: '/app',
            redirect: MAIN_PATH,
            component: AppComponent,
            children: []
        };
        HomeComponent.registerRoutes(appRoutes);
        routes.push(appRoutes);
        console.log(routes)
    },
    config() {
        return {
            redirectPath: MAIN_PATH,
            name: NAME,
            components: {
                name: 'Home',
                redirectPath: '/app/home',
            }
        }
    }
}
