import {Injectable, Inject} from '@angular/core';
import {Headers, Http} from "@angular/http";
import 'rxjs/Rx';

@Injectable()
export class PlannerService {

  constructor(private http: Http, @Inject('ApiEndpoint') private apiUrl: string, @Inject(Headers) private headers: Headers) { }

  GetCoursesOffered() {
    return this.http.request('assets/data/classes.json')
        .map(res => res.json())
  }

}
