import HomeComponent from "./Home";

export default {
    registerRoutes(routes) {
        console.log(routes)
        routes.children.push(
            {
                path: 'home',
                name: 'home',
                component: HomeComponent,
                children: []
            }
        )
        console.log(routes)
    }
}
