import HomeComponent from "./Home";

export default {
    registerRoutes(routes) {
        routes.children.push(
            {
                path: 'home',
                name: 'home',
                component: HomeComponent,
                children: []
            }
        )
    }
}
