import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import {HttpModule, Headers} from '@angular/http';

import { AppComponent } from './app.component';
import { LoginComponent } from './Views/Login/login.component';
import { DashboardComponent } from './Views/Dashboard/dashboard.component';
import { routing } from "./app.routing";
import { SideNavbarComponent } from './Views/Common/side-navbar/side-navbar.component';
import { TopNavbarComponent } from './Views/Common/top-navbar/top-navbar.component';
import { ProgressBarModule } from 'ng2-progress-bar';
import { PlannerComponent } from './Views/Dashboard/planner/planner.component';
import { ProfileComponent } from './Views/Dashboard/profile/profile.component';
import { ClassesOfferedComponent } from './Views/Dashboard/classes-offered/classes-offered.component';
import { FinancialAidComponent } from './Views/Dashboard/financial-aid/financial-aid.component';
import { SettingsComponent } from './Views/Dashboard/settings/settings.component';
import { ClassHistoryComponent } from './Views/Dashboard/class-history/class-history.component';
import { ContactComponent } from './Views/Dashboard/contact/contact.component';
import { LocationStrategy, HashLocationStrategy } from "@angular/common";
import { UserService } from "./Views/Login/user.service";
import { LoggedInGuard } from "./shared/logged-in.guard";
import { PlannerService } from "./Views/Dashboard/planner.service";
import { DevelopersComponent } from './Views/Dashboard/developers/developers.component';

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    DashboardComponent,
    SideNavbarComponent,
    TopNavbarComponent,
    PlannerComponent,
    ProfileComponent,
    ClassesOfferedComponent,
    FinancialAidComponent,
    SettingsComponent,
    ClassHistoryComponent,
    ContactComponent,
    DevelopersComponent,
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpModule,
    routing,
    ProgressBarModule
  ],
  providers: [
    UserService,
    PlannerService,
    LoggedInGuard,
    {provide: 'ApiEndpoint', useValue: 'http://147.174.59.127/411/Phalcon/api/'},
    {provide: Headers, useValue: {'Content-Type': 'application/x-www-form-urlencoded'}},
    {provide: LocationStrategy, useClass: HashLocationStrategy}
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
