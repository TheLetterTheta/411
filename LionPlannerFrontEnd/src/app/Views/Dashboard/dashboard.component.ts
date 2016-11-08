import {Component, OnInit, AfterViewInit, ViewChild} from '@angular/core';

declare var jQuery:any;

@Component({
  selector: 'lion-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements AfterViewInit {

  constructor() {

  }

  ngAfterViewInit() {
    jQuery(".button-collapse").sideNav();
    jQuery(".collapsible").collapsible();

  }
}
