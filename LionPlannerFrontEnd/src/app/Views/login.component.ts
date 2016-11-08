import {Component, OnInit, Output, EventEmitter, AfterViewInit} from '@angular/core';
import {Router} from "@angular/router";

@Component({
  selector: 'lion-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  private isLoading: boolean = true;
  private loggingIn: boolean = false;

  constructor(private router: Router) {

  }

  ngOnInit() {

  }

  ngAfterContentInit() {

  }

  onLogin() {
    this.loggingIn = true;

    setTimeout(() => {
      this.loggingIn = false;
      this.router.navigateByUrl('/Dashboard');
    }, 2000);
  }
}
