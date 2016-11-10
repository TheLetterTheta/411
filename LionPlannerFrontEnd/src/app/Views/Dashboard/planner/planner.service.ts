import {Injectable, Inject} from '@angular/core';
import {Headers, Http, RequestOptions, RequestMethod, Request} from "@angular/http";
import 'rxjs/Rx';

@Injectable()
export class PlannerService {


  constructor(private http: Http, @Inject('ApiEndpoint') private apiUrl: string, @Inject(Headers) private headers: Headers) { }




}
