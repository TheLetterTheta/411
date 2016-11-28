import {Injectable, Inject} from '@angular/core';
import {Headers, Http, RequestOptions, RequestMethod, Request} from "@angular/http";
import 'rxjs/Rx';

@Injectable()
export class PlannerService {

  constructor(private http: Http, @Inject('ApiEndpoint') private apiUrl: string, @Inject(Headers) private headers: Headers) { }

  GetCoursesOffered() {
    return this.http.request('assets/data/classes.json')
        .map(res => res.json())
  }

  GetPlanner() {
    var requestOptions = new RequestOptions({
      method: RequestMethod.Get,
      url: this.apiUrl + 'planner/' + localStorage.getItem('userId'),
      headers: this.headers,
    });
    return this.http.request(new Request(requestOptions))
        .map(res=>res.json())
  }

}
