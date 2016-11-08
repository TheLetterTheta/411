import {Routes} from "@angular/router";
import {PlannerComponent} from "./planner/planner.component";
import {ProfileComponent} from "./profile/profile.component";
import {FinancialAidComponent} from "./financial-aid/financial-aid.component";
import {ClassesOfferedComponent} from "./classes-offered/classes-offered.component";
import {SettingsComponent} from "./settings/settings.component";
import {ClassHistoryComponent} from "./class-history/class-history.component";
import {ContactComponent} from "./contact/contact.component";

export const DASHBOARD_ROUTES: Routes = [
  { path: '/', redirectTo: 'Profile', pathMatch: 'full' },
  { path: '', redirectTo: 'Profile', pathMatch: 'full' },
  { path: 'Planner', component: PlannerComponent },
  { path: 'Profile', component: ProfileComponent },
  { path: 'FinancialAid', component: FinancialAidComponent },
  { path: 'ClassesOffered', component: ClassesOfferedComponent },
  { path: 'ClassHistory', component: ClassHistoryComponent },
  { path: 'Settings', component: SettingsComponent },
  { path: 'Contact', component: ContactComponent },
  { path: '**', redirectTo: 'Profile', pathMatch: 'full' }
];
