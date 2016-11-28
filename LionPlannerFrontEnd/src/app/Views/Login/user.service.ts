import {Injectable, Inject} from '@angular/core';
import {Headers, Http, RequestOptions, RequestMethod, Request} from "@angular/http";
import 'rxjs/Rx';
import {Observable} from "rxjs";

@Injectable()
export class UserService {
  private loggedIn = false;
  private success: boolean;
  private apiKey: any;
  private userId: any;

  constructor(private http: Http, @Inject('ApiEndpoint') private apiUrl: string, @Inject(Headers) private headers: Headers) {
    this.loggedIn = !!localStorage.getItem('apiKey');
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
          localStorage.setItem('apiKey', res.apiKey);
          localStorage.setItem('userId', res.userId);
          return res;
        })
        .catch((error:any) => Observable.throw(error.json().error || 'Server error'));
  }

  // This is for dev purposes only
  LoginWithoutPermission(wNumber: string, password: string) {
    if(wNumber == '0571092' && password == 'password') {
      this.loggedIn = true;
      localStorage.setItem('apiKey', 'A@^BfgXghbfG58122');
      localStorage.setItem('userId', '1');
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
      url: this.apiUrl + 'user/profile/' + localStorage.getItem('userId'),
      headers: this.headers,
    });
    return this.http.request(new Request(requestOptions))
        .map(res=>res.json())
  }

  GetUserMajors() {
    var requestOptions = new RequestOptions({
      method: RequestMethod.Get,
      url: this.apiUrl + 'majorminor/getUserMajors/' + localStorage.getItem('userId'),
      headers: this.headers,
    });
    return this.http.request(new Request(requestOptions))
        .map(res=>res.json())
  }

  GetUserMinors() {
    var requestOptions = new RequestOptions({
      method: RequestMethod.Get,
      url: this.apiUrl + 'majorminor/getUserMinors/' + localStorage.getItem('userId'),
      headers: this.headers,
    });
    return this.http.request(new Request(requestOptions))
        .map(res=>res.json())
  }
}
