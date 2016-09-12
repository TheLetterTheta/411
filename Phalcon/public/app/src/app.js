export class App {
    configureRouter(config, router) {
        config.title = 'Lion Planner';
        config.map([
            { route: ['','home'], name: 'home', moduleId: 'src/home/home' , nav: true , title:'Lion Planner'},
            { route: 'profile', name: 'profile', moduleId: 'src/profile/profile' , nav: true , title:'Lion Planner'}
        ]);
        this.router = router;
    }
}