import {Component, OnInit, Output, EventEmitter, AfterViewInit} from '@angular/core';
import {Router} from "@angular/router";
import {NgForm} from "@angular/forms";
import {UserService} from "./user.service";

@Component({
  selector: 'lion-login',
  templateUrl: 'login.component.html',
  styleUrls: ['login.component.css'],
})
export class LoginComponent {

  private isLoading: boolean = true;
  private loggingIn: boolean = false;
  private noMatch: boolean;
  private response: any;
  private urlImage: string;

  user = {
    wNumber: '',
    password: ''
  };

  constructor(private _userService: UserService, private _router: Router) {}

  onSubmit(form: NgForm) {
    this.loggingIn = true;
    this.noMatch = false;
    console.log(form);

    setTimeout(() => {
      this.loggingIn = false;

      this._userService.Login(form.value.wNumber, form.value.password)
          .subscribe(result => {
              this.response = result;
              if(result.status = 200) {
                this._router.navigateByUrl('/Dashboard');
              } else {
                this.noMatch = true;
              }
          });

      //this.response = this._userService.LoginWithoutPermission(form.value.userData.wNumber, form.value.userData.password);

      if(!this.response) {
        this.noMatch = true;
      }
    }, 2000);
  }
}
