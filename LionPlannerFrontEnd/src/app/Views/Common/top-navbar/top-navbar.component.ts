import { Component, OnInit } from '@angular/core';
import {UserService} from "../../Login/user.service";

@Component({
  selector: 'lion-top-navbar',
  templateUrl: './top-navbar.component.html',
  styles: []
})
export class TopNavbarComponent {

  constructor(private _user: UserService) { }

  onLogoutClicked() {
    this._user.Logout();
  }

}
