import {Routes, RouterModule} from "@angular/router";
import {LoginComponent} from "./Views/Login/login.component";
import {DashboardComponent} from "./Views/Dashboard/dashboard.component";
import {DASHBOARD_ROUTES} from "./Views/Dashboard/dashboard.routes";
import {LoggedInGuard} from "./shared/logged-in.guard";

const APP_ROUTES: Routes = [
  { path: '', redirectTo: 'Login', pathMatch: 'full' },
  { path: 'Login', component: LoginComponent },
  { path: 'Dashboard', component: DashboardComponent, children: DASHBOARD_ROUTES, canActivate: [LoggedInGuard] },
  { path: '**', redirectTo: 'Login', pathMatch: 'full' }
];

export const routing = RouterModule.forRoot(APP_ROUTES);
