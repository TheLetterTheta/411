/**
 * Created by Coffin1 on 11/9/16.
 */
import { Injectable } from '@angular/core';
import { Router, CanActivate } from '@angular/router';
import {UserService} from "../Views/Login/user.service";


@Injectable()
export class LoggedInGuard implements CanActivate {

    constructor(private _router: Router, private _user: UserService) {}

    canActivate() {
        if(!this._user.isLoggedIn()) {
            this._router.navigate(['/Login']);
        }
        return this._user.isLoggedIn();
    }
}