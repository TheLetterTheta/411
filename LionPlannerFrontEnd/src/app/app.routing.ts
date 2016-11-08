import {Routes, RouterModule} from "@angular/router";
import {LoginComponent} from "./Views/login.component";
import {DashboardComponent} from "./Views/Dashboard/dashboard.component";
import {DASHBOARD_ROUTES} from "./Views/Dashboard/dashboard.routes";

const APP_ROUTES: Routes = [
  { path: '', redirectTo: 'Login', pathMatch: 'full' },
  { path: 'Login', component: LoginComponent },
  { path: 'Dashboard', component: DashboardComponent, children: DASHBOARD_ROUTES },
  { path: '**', redirectTo: 'Login', pathMatch: 'full' }
];

export const routing = RouterModule.forRoot(APP_ROUTES);
