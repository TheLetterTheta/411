import {Injectable, Inject} from '@angular/core';
import {Headers, Http, RequestOptions, RequestMethod, Request} from "@angular/http";
import 'rxjs/Rx';

@Injectable()
export class UserService {
  private loggedIn = false;
  private success: boolean;
  private apiKey: any;
  private userId: any;

  constructor(private http: Http, @Inject('ApiEndpoint') private apiUrl: string, @Inject(Headers) private headers: Headers) {
    this.loggedIn = !!localStorage.getItem('apiKey');
    this.apiKey = localStorage.getItem('apiKey');
    this.userId = localStorage.getItem('userId');
  }

  isLoggedIn() {
    return this.loggedIn;
  }

  Login(wNumber, password) {
    var requestOptions = new RequestOptions({
      method: RequestMethod.Post,
      url: this.apiUrl + 'user/login',
      headers: this.headers,
      body: JSON.stringify({ wNumber, password})
    });
    return this.http.request(new Request(requestOptions))
        .map(res=>res.json())
        .map((res) => {
          console.log(res);
          if(res.success) {
            localStorage.setItem('apiKey', res.apiKey);
            localStorage.setItem('userId', res.userId);
            this.loggedIn = true;
          } else {
            this.success = this.LoginWithoutPermission(wNumber, password);
            console.log(this.success);
          }

          if(this.success = true) {
            return res;
          } else {
            return null;
          }

        });
  }

  // This is for dev purposes only
  LoginWithoutPermission(wNumber: string, password: string) {
    if(wNumber == 'w0571092' && password == 'password') {
      this.loggedIn = true;
      localStorage.setItem('apiKey', '81818181');
      localStorage.setItem('userId', 'acoffin');
      return true;
    } else {
      return false;
    }
  }

  Logout() {
    localStorage.removeItem('apiKey');
    localStorage.removeItem('userId');
    this.loggedIn = false;
  }

  GetUserProfile() {
    var requestOptions = new RequestOptions({
      method: RequestMethod.Get,
      url: this.apiUrl + 'user/profile' + this.userId,
      headers: this.headers,
    });
    return this.http.request(new Request(requestOptions))
        .map(res=>res.json())
  }

  GetUserMajors() {
    var requestOptions = new RequestOptions({
      method: RequestMethod.Get,
      url: this.apiUrl + 'majorminor/getUserMajors' + this.userId,
      headers: this.headers,
    });
    return this.http.request(new Request(requestOptions))
        .map(res=>res.json())
  }

  GetUserMinors() {
    var requestOptions = new RequestOptions({
      method: RequestMethod.Get,
      url: this.apiUrl + 'majorminor/getUserMinors' + this.userId,
      headers: this.headers,
    });
    return this.http.request(new Request(requestOptions))
        .map(res=>res.json())
  }
}
