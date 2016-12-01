import { Component, OnInit } from '@angular/core';
import {UserService} from "../../Login/user.service";
import {Router} from "@angular/router";

@Component({
  selector: 'lion-top-navbar',
  templateUrl: './top-navbar.component.html',
  styles: []
})
export class TopNavbarComponent {

  constructor(private _user: UserService, private _router: Router) { }

  onLogoutClicked() {
    this._user.Logout();
  }

}
